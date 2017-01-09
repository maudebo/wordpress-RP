<?php
namespace stockTicker;

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function sp_dismiss_notice() {
    update_option('stock_'.SP_TYPE.'_notice_text', ''); //don't delete cause there is no point forcing the db to make new auto-increments for this
}
add_action( 'wp_ajax_'.SP_TYPE.'_dismiss_notice', NS.'sp_dismiss_notice' );

function stock_plugin_notice_helper($text, $type = 'updated', $auto_fade = true) {
    //border color types
    //notice-error:   red
    //notice-info:    blue
    //notice-warning: yellow/orange
    //error:          red
    //updated:        green
    
    //is-dismissible: automatically add a close box, but will NOT prevent this notice from showing up again next page-load
    
    echo "<div class='is-dismissible notice {$type}'><p>{$text}</p>";

    if ($auto_fade)
        echo "<script type='text/javascript'>fadeNotification();</script>";
    else
        echo "<span class='dismiss_notice'><a id='sp_ajax_dismiss' class='".SP_TYPE."_dismiss_notice' href='javascript:'>Dismiss</a></span>";
    
    echo "</div>";
}


//another helper function for use registering as an action for admin_notices
function stock_plugin_popup_notice() {

    //if (isset($_GET['page']) && strpos($_GET['page'], 'stock_'.SP_TYPE) === false) {return;} //do not run on other admin pages
    //if (strpos($hook, 'stock_'.SP_TYPE) === false) {error_log("not the right hook: " . print_r($hook, true));return;} //do not run on other admin pages
    
    $notice_text = get_option('stock_'.SP_TYPE.'_notice_text');
    //NOTE: we could add_option() for the notice_text if it is missing, but I don't think it matters
    if ($notice_text === false || $notice_text === '') return; // do nothing

    stock_plugin_notice_helper($notice_text, 'notice-info', false);

} 
add_action( 'admin_notices', NS.'stock_plugin_popup_notice' ); //NOTE: just have it display on ALL admin pages why not


function stock_plugin_create_stock_list_input($id, $stocks_string) {
    echo <<<LABEL
        <br/>
        <textarea
            id="input_{$id}_stocks"
            name="stocks_for_{$id}"
            placeholder="AAPL, GOOG, XMPL, DEMO"
            rows="10"
            style="width:100%;"
            >{$stocks_string}</textarea>
LABEL;
}

function stock_plugin_section_helper($sectionNum, $title, $wrapped_html) {
    $plugin_type = SP_TYPE;
    
    // stores cookies within {SP_TYPE}sec[#]
    $the_cookie = (isset ($_COOKIE["{$plugin_type}sec"][$sectionNum]) ? $_COOKIE["{$plugin_type}sec"][$sectionNum] : 'none');

    echo "<div class='sp-options-subsection'>";
    echo "<div class='section_toggle' id='{$plugin_type}sec[{$sectionNum}]'>" . ($the_cookie == "none" ? '+' : '-') . "</div>";
    echo "<h4>{$title}</h4>";
    echo "<div class='section-options-display' style='display: {$the_cookie}';>{$wrapped_html}</div></div>";
}

function stock_plugin_create_stock_list_section($settings) {
    $stock_list = $settings['stock_list'];
    if (empty($stock_list )) {
        if ($settings['id'] == 1) { //default settings gets a different error message
            echo "<br/><span style='font-weight:bold;'>NOTE:</span><br/>If Default Settings Stock List is left blank, then all stock tables without a stock list will be disabled.<br/>";
        } else { //standard error message
        echo "<br/><span style='font-weight:bold;'>NOTE:</span><br/>If Stock List is left blank, then this shortcode will use the stocks from 'Default Settings'.<br/>";
    }
    }
    stock_plugin_create_stock_list_input('shortcode', $stock_list);
}

function stock_plugin_validate_stock_list($the_stock_list) {
    $stock_str = preg_replace('/\s+/', '', strtoupper($the_stock_list)); //capitalize the stock values, and remove spaces
    $stock_arr = explode(',', $stock_str);
        
    $cache_output = stock_plugin_get_data(array_unique($stock_arr));
    $invalid_stocks = $cache_output['invalid_stocks']; //only need the invalid_stocks so we can remove them before saving
    
    if (!empty($invalid_stocks)) {
        echo "<p style='font-size:14px;font-weight:bold;'>The following stocks were not found (and were automatically removed):<br />" . implode(', ', $invalid_stocks) . "</p>";
    }
    
    return implode(',', array_diff($stock_arr, $invalid_stocks));
}

//helper functions for using the table storage. 
function convert_bitmask($to_convert, $num = 6) {
    //expects to convert an array of bits into an integer representation and vice versa
    //array(0,0,0,0,0,0,0,0,0,0,0), //    1024,512,256,128,64,32,16,8,4,2,1
    if (is_array($to_convert)) { // binary array to integer
        return bindec(implode('', $to_convert));
    }
    elseif (is_int($to_convert)) { // integer to array
        $tmp = sprintf( "%0{$num}d", decbin($to_convert));
        return str_split($tmp);
    }
    else
        return false; //for error detection
}

//=============================
//functions for interfacing with WPDB

function sp_get_next_row_id() {
    global $wpdb;
    $table_name = SP_TABLE_NAME;
    
    //SHOW TABLE STATUS LIKE 'wp_users';   get next auto increment value
    $sql = "SHOW TABLE STATUS LIKE '{$table_name}'";
    $result = $wpdb->get_results($sql, ARRAY_A);

    return $result[0]['Auto_increment'];
}

function sp_setup_where($args) { //don't allow to be empty
    $wheres = array();
    
    $where  = (array_key_exists('where',  $args) && !empty($args['where'])  ? $args['where']  : array(0 => 0));
    $w_type = (array_key_exists('w_type', $args) && !empty($args['w_type']) ? $args['w_type'] : 'like');
    $joiner = (array_key_exists('w_or',   $args) ? 'OR' : 'AND'); //if present use OR instead of AND
    //options are like, rlike, >, >=, <, <=, !=, equals (default).   ignored for numerical values
    
    foreach ( $where as $field => $value ) {
        if ('' === $value) {
            continue; //skip empty WHERE values
        }
        elseif (is_numeric($value)) {
            //IN FUTURE: add in >, >=, <, <=, != opperators
            $wheres[] = "{$field} = {$value}";
        }
        elseif ($w_type == 'like') {
            $wheres[] = "{$field} like '%{$value}%'";
        }
        elseif ($w_type == 'rlike') {
            $wheres[] = "{$field} rlike '{$value}'";
        }
        else { //make any other options exactly equal =
            $wheres[] = "{$field} = '{$value}'";
        }
    }
    return "WHERE " . implode(" {$joiner} ", $wheres);
}

//returns true or false
function sp_name_used($name) {
    global $wpdb;
    $table_name = SP_TABLE_NAME;
    
    $args = array(
        'where'  => array('name' => $name),
        'w_type' => '='
    );
    $wheres = sp_setup_where($args);
    
    $sql = "SELECT COUNT(*) FROM {$table_name} {$wheres}";
    $result = $wpdb->get_results($sql, ARRAY_N);
    
    //echo $sql;
    //print_r($result);
    
    if     (!isset($result[0][0])) return null; //some kinda error condition
    elseif ($result[0][0] > 0)     return true;
    else                           return false;
}

//returns FALSE or NEW ROW ID
function sp_add_row($values) {
    global $wpdb;
    $table_name = SP_TABLE_NAME;
    
    if (isset($values['data_display']) && is_array($values['data_display'])) { //if this is not defined it is false
        $values['data_display'] = convert_bitmask($values['data_display'],DATA_ITEM_COUNT);
    }
    
    //unset($values['id']); //We need to be able to set this upon initial activation
    if (!isset($values['name'])) {
        $new_id = sp_get_next_row_id();
        $values['name'] = "(untitled) {$new_id}";
    }
                    //insert(table_name, data)
    $status = $wpdb->insert($table_name, $values);
    //false on error, otherwise returns 1 row updated
    
    //NOTE: if we need the new auto_increment id its here $wpdb->insert_id
    
    if ($status === false) return false;
    
    return $wpdb->insert_id;
}

//returns FALSE or NUMBER ROWS UPDATED (which can be 0)
function sp_update_row($values, $where) {
    global $wpdb;
    $table_name = SP_TABLE_NAME;
    
    if (isset($values['data_display']) && is_array($values['data_display'])) {
        $values['data_display'] = convert_bitmask($values['data_display'],DATA_ITEM_COUNT);
    }
    
    unset($values['id']); //remove if it exists
    
                   //update(table_name, data, where)
    $status = $wpdb->update($table_name, $values, $where); //NOTE: if blocked by duplicate key, prints error to the screen
    //false on error, number of rows updated otherwise
    return $status;
}

//returns NULL or ROW CONTENTS
function sp_get_row($value, $type = 'name') {
    global $wpdb;
    $table_name = SP_TABLE_NAME;
    
    $args = array(
        'where'  => array($type => $value),
        'w_type' => '=',
    );
    $wheres = sp_setup_where($args);

    $sql = "SELECT * FROM {$table_name} {$wheres}";
    $result = $wpdb->get_row($sql, ARRAY_A); //returns 
    
    if ($result === null) return null;
    //NOTE: everything that comes out of mysql is a string
    $result['data_display'] = convert_bitmask((int)$result['data_display'],DATA_ITEM_COUNT);

    return $result; //don't forget to check for NULL if nothing returned
}

//NOTE: if function called without any filters, returns all entried sorted by id field.
//NOTE: limit determined by screen options and pagination
//returns ARRAY no matter what.
function sp_multi_get_row($args = array()) {
    global $wpdb;
    $table_name = SP_TABLE_NAME;
    
    $wheres = sp_setup_where($args);
    $sort  = (array_key_exists('sort',  $args) && !empty($args['sort'])  ? $args['sort']  : array('id' => '')); //NOTE: ascending by default
    $limit = (array_key_exists('limit', $args) && !empty($args['limit']) ? $args['limit'] : array(0, 10));
    
    foreach ( $sort as $field => $value ) {
        $sorts[] = "{$field}" . ( strtoupper($value) === 'DESC' ? " DESC" : "");
    }
    $sql = "SELECT * FROM {$table_name} {$wheres} ORDER BY " . implode(", ", $sorts) . " LIMIT " . implode(",", $limit);
    $result = $wpdb->get_results($sql, ARRAY_A);
    
    return $result;
}

//returns false or ROW COUNT
function sp_count_rows($args = array()) { //Needed for pagination
    global $wpdb;
    $table_name = SP_TABLE_NAME;
    
    $wheres = sp_setup_where($args);
    
    $sql = "SELECT COUNT(*) FROM {$table_name} {$wheres}";
    $result = $wpdb->get_results($sql, ARRAY_N);
    //returns NULL if input error, returns empty array/obj if error or nothing found
    
    if (!isset($result[0][0])) return false;
    
    return $result[0][0];
}

//returns FALSE or TRUE
function sp_delete_rows($ids = array()) { //no need for a single delete and a multi delete
    global $wpdb;
    $table_name = SP_TABLE_NAME;
    
    //NOTE: does nothing if not given an array of Ids
    if (gettype($ids) != 'array' || empty($ids)) {
        stock_plugin_notice_helper("No ids were supplied!");
        return false;
    }

    if (in_array('1', $ids)) {//id #1 is special do not allow it to be removed
        stock_plugin_notice_helper("Cannot remove Default settings (id 1)! No changes made.", 'error');
        return false;
    }

    $sql = "DELETE FROM {$table_name} WHERE id IN (" . implode(',', $ids) . ")";
    $result = $wpdb->query($sql);
    
    if ($result > 0) {
        stock_plugin_notice_helper("Deleted {$result} rows. IDs: " . implode(', ', $ids));
    }
    else {
        stock_plugin_notice_helper("Cannot delete! Ids do not exist. IDs: " . implode(', ', $ids), 'error');
    }
    return true;
}

//returns NEW_ID or false
function sp_clone_row($id) { //for copying a row as baseline for a new one
    $values = sp_get_row($id, 'id'); //get then shove in as a new one
    if ($values !== NULL) {
        unset($values['id']); //throw this out, we want to use the auto incrementor
        $new_id = sp_get_next_row_id();
        //prepend the ID to avoid issues with duplicate long names in DB
        $values['name'] = "({$new_id})" . ' ' . $values['name']; 
        $status = sp_add_row($values);
        
        return $status; //return the new id if we successfully updated everything
    }
    return false;
}
//=============================

if ( ! class_exists( '\WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

//WARNING: WP_List_Table is not intended for use by plugin and theme developers as it is subject to change without warning in any future WordPress release
// Recommended to make a copy of this class as is and include it with the plugin files.
//KNOWN WORKING with version 4.1.1 of Wordpress wp-admin/includes/class-wp-list-table.php
//GUIDE: http://wpengineer.com/2426/wp_list_table-a-step-by-step-guide/

class stock_shortcode_List_Table extends \WP_List_Table {
    //FOR FUTURE: What other columns would be nice to have? font size?
    //HOW to add widget/ticker/engine specific columns?
    // ^^^ just extend the class in the admin.php!
    
    //To add additional columns:
    // - add the column header to get_columns
    // - add to column_defaults or add individual functions
    // - add to get_sortable_columns (if applies)

    //NOTE: $wp_special = array('_title', 'cb', 'comment', 'media', 'name', 'title', 'username', 'blogname');
    function get_columns() {
        $columns = array( //NOTE: don't need to declare an ID column ID is reserved and expected
            'cb'             => '<input type="checkbox" />',
            'name'           => 'Name',
            'width'          => 'Width',
            'height'         => 'Height',
            'display_number' => '<span title="Number of Stocks to Display">#</span>',
            'shortcode'      => 'Shortcode',
            'stock_list'     => 'Stock List'
        );
        return $columns;
    }
        
    function prepare_items() { //this so far looks a lot simpler
      $args = array(); //used both for sp_multi_get_row() and for sp_count_rows()
      //NOTE: default behavior, sorting a column returns us to page 1 of results

      $this->_column_headers = $this->get_column_info();
      
      //First we get the search params (from the search box) because these effect both the count and the query
      $search_term = array_key_exists('s', $_GET) ? $_GET['s'] : false;
      if ($search_term) {
          //Eventually we either want an advanced search, or to search for this value in many fields not just name
          $args['where']  = array('name' => $search_term);
          $args['w_type'] = 'like';
          //NOTE: if performing an advanced search, allow toggle between OR and AND
          //IDEA, copy the form from php-myadmin
      }
      
      //Second we get the total rows via sp_count_rows()
      //IN FUTURE: what other options do we want? Add to args as necessary
      $per_page     = $this->get_items_per_page('shortcodes_per_page', 10);
      $current_page = $this->get_pagenum();
      $total_items  = sp_count_rows($args);
      $total_pages  = ceil( $total_items / $per_page );

      $this->set_pagination_args( array(
            'total_items' => $total_items,
            'total_pages' => $total_pages,
            'per_page'    => $per_page ) );
      $args['limit'] = array(($current_page - 1) * $per_page, $per_page);
      
      //Third we add in the order parameters because these are only used by sp_multi_get_row()
      
      //NOTE: no built in way to sort by more than 1 column at a time
      $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'id';
      //NOTE: If no order, default to asc = blank string in mysql
      $order   = ( ! empty($_GET['order']    ) ) ? $_GET['order']   : '';
      
      $args['sort'] = array($orderby => $order);    
      
      $this->items = sp_multi_get_row($args);
    }
    
    //NOTE: Need one function per column name (uses column_default if specific function not found)
    function column_default( $item, $column_name ) {
      switch( $column_name ) { 
        case 'display_number':
            return $item[$column_name];
        case 'width': 
        case 'height':
            return $item[$column_name] . "px"; //pixel based columns
        default:
            return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
      }
    }
    
    function column_name($item) {
      $actions = array(
            'copy'      => sprintf('<a href="?page=%s&action=%s&shortcode=%s">Copy</a>',  $_REQUEST['page'],'copy',  $item['id']), //needs a nonce? hopefully not necessary
            'edit'      => sprintf('<a href="?page=%s&action=%s&shortcode=%s">Edit</a>',  $_REQUEST['page'],'edit',  $item['id']),
      );
      if ($item['id'] != '1') { //skip default settings
          $actions['delete'] = sprintf('<a href="?page=%s&action=%s&shortcode=%s" onclick="return showNotice.warn()">Delete</a>',$_REQUEST['page'],'delete',$item['id']); //needs a nonce? hopefully not necessary
      }

      return sprintf('%1$s %2$s', $item['name'], $this->row_actions($actions) );
    }
    
    function column_cb($item) {
        if ($item['id'] != '1') {
            return sprintf('<input type="checkbox" name="shortcode[]" value="%s" />', $item['id']);    
        }
        else
            return '';
    }
    
    function column_shortcode($item) {
        $plugin_type = SP_TYPE;
        if ($item['id'] != '1') {
            return sprintf("<input type='text' onfocus='this.select();' readonly='readonly' value='[stock-{$plugin_type} name=&quot;%s&quot;]' class='shortcode-in-list-table wp-ui-text-highlight code shortcode' \>", $item['name']);
        }
        else
            return "<input type='text' onfocus='this.select();' readonly='readonly' value='[stock-{$plugin_type}]' class='shortcode-in-list-table wp-ui-text-highlight code shortcode' \>";
    }
   
    function column_stock_list($item) { //hope this works with the extra underscore
        $stock_list = $item['stock_list'];
        //if ($item['id'] == 1) $stock_list = "...edit to view and configure...";
        //in case we need to squish this section
        /*$len = strlen($stock_list);
        if ($len > 60) {
            $tmp = strrpos($stock_list, ',', 60 - $len); //reverse str position if negative
            $stock_list = substr($stock_list, 0, $tmp) . '...';
        }*/
        return sprintf('<input type="text" readonly="readonly" value="%s" class="stocklist" \>', $stock_list);    
    }
    
    function get_sortable_columns() {
      $sortable_columns = array(
        'name'           => array('name',          false),
        'width'          => array('width',         false),
        'height'         => array('height',        false),
        'display_number' => array('display_number',false)
      );
      return $sortable_columns;
    }
    
    function usort_reorder( $a, $b ) {
      // If no sort, default to title
      $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'name';
      // If no order, default to asc
      $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
      // Determine sort order
      if (is_string($a[$orderby])) {
          $result = strcmp( $a[$orderby], $b[$orderby] );
      }
      elseif (is_numeric($a[$orderby])) {
          $result = ($a[$orderby] > $b[$orderby] ? 1 : ($a[$orderby] < $b[$orderby] ? -1 : 0) );
      }
      // Send final sort direction to usort
      return ( $order === 'asc' ) ? $result : -$result;
    }
    
    function get_bulk_actions() {
        $actions = array(
                'delete' => 'Delete'
        );

        return $actions;
    }
}

/* for reference, taken from somewhere.
class stock_shortcode_List_Table extends \WP_List_Table {

    function __construct($type, $screen) { //type is either widget or ticker
            $this->type = $type;
            //$this->screen = $screen;
            parent::__construct( array( //This fires the constructor of the WP_List_Table ?
                    'singular' => 'post',
                    'plural'   => 'posts',
                    'ajax'     => false,
                    'screen'   => $screen ) );  // where is the screen setup? The parent expects to have the screen chosen
                                                //NOTE: This is different from ctf7
    }
}
*/

?>

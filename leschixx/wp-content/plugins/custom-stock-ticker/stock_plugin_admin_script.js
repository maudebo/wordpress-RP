//TODO: if plugin version missmatch, this file might error for 1 or the other plugin --- needs fixing

jQuery(document).ready(function() {
    var admin_options_toggle = jQuery('.section_toggle');
    var option_display = jQuery('.section-options-display');
    //option_display.toggle();
        

    var toggle_option = function(target) {
        if(target.text() == "+"){
            target.text('-');
        }else{
            target.text('+');
        }
        target.siblings('.section-options-display').toggle(200);
    }
    admin_options_toggle.click(function(event) {
        toggle_option(jQuery(this));
        toggleSection(event.target.id);
    });
});

function enhanceTypeRange(rangeId, rangeTextId) {
        var html5Range = document.createElement("input"); // test compatibility for html5 range input attribute
        html5Range.setAttribute("type", "range");
        html5Range = html5Range.type !== "text";
        if(html5Range === true) { // if range attribute is supported, change opacity text inputs into opacity range (slider) inputs
                var typeRange = document.getElementById(rangeId);
                typeRange.setAttribute("step", "0.05"); // default step is 1, not useful for opacity slider
                typeRange.setAttribute("min", "0"); // 0 percent opacity is 0
                typeRange.setAttribute("max", "1"); // 100 percent opacity is 1
                typeRange.setAttribute("type", "range"); // type is set to range last due to compatibility issues
                typeRange.style.width="130px";
                document.getElementById(rangeTextId + "0").innerHTML = ""; // clean up 0-1 span from text box
                document.getElementById(rangeTextId + "1").innerHTML = "0%"; // add in values on either end of the slider for clarity
                document.getElementById(rangeTextId + "2").innerHTML = "100%";
        }
}

function enhanceTypeColor(colorId, colorTextId) {
        var html5Color = document.createElement("input"); // test compatibility for html5 color input attribute
        html5Color.setAttribute("type", "color");
        html5Color = html5Color.type !== "text";
        
        if(html5Color === true) { // if color attribute is supported, change color text inputs into html5 color pickers
                document.getElementById(colorId).setAttribute("type", "color");
                document.getElementById(colorTextId).innerHTML = "";
        }
}

function parseQuery(query) { //using ; or & allows this to work for cookies too
    var pairs, pair, i,
        params = {},
        uesc = decodeURIComponent;

    //NOTE: even if in the URL string ampersands are encoded this apparently still works
    //      &amp; or &#038; get translated before even being sent into this function
    if (query) {
        pairs = query.split(/; *|&/);      // cookies might have spaces or not, url params will NOT
        for (i=0; i < pairs.length; ++i) {
            pair = pairs[i].split('=');
            if (!pair) { continue; }        // if the split failed for any reason skip it
            if (pair.length >= 2) {
                params[uesc(pair[0])] = uesc(pair.slice(1).join('='));      //in case there was an extra = in the value portion
            } else {
                params[uesc(pair[0])] = true;
        }
        }
        params.length = i; //add a quick length attribute for usefulness
    }
    return params;
}
if (window.cookie_params === undefined) {
   window.cookie_params = parseQuery(document.cookie);
}


function toggleSection(sectionToToggle) {
    sec = window.cookie_params[sectionToToggle];

    if (sec && sec == 'none') {                      //if the cookie exists, and was set to none
        document.cookie = sectionToToggle + "block"; //uncollapse it
        cookie_params[sectionToToggle]    = "block";
    } else {                                         //if cookie did not exist, or was set to block
        document.cookie = sectionToToggle + "none";  //collapse it
        cookie_params[sectionToToggle]    = "none";
    }
}

jQuery(document).on('click', '#sp_ajax_dismiss', function() {
    jQuery.ajax({
        url: ajaxurl,
        data: { action: this.classList[0] } //class is being used to pass in the callback function
    });
    fadeNotification(this.parentElement.parentElement);
    return false;
});

function fadeNotification(elm) {
    //NOTE: .error  are not supposed to fade out ever
    // jQuery('.updated').delay(5000).animate({height:'hide', marginTop:'hide', marginBottom:'hide'}, 1000)   // slides notifacation up, I dont like how this looks
    if (elm === undefined) jQuery('.updated').delay(5000).fadeTo(1000,0) // fades good notification out //TODO: make this specific to OUR notices only
    else                   jQuery(elm).animate({height:'hide', marginTop:'hide', marginBottom:'hide'}, 500); 
    //NOTE: currently relies on elm being the element we actually want to hide
}

<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'radiopirate');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'goFdJ.pn+jj.zCAiEUDz^6-O1GJPQ>k*cjIn?Jm5(f(=o*C;lJ_`H,XJG_yqPT_t');
define('SECURE_AUTH_KEY',  'GW2[/[~=|=2HEpNWWDa9|QR,N#j`II}{HwaA7O1PDG&lIZ`BPC$*3Ul?XcQRQk?H');
define('LOGGED_IN_KEY',    'Yn&AH 5:<5DW^*v!qkqZ9n(u2axN#>IW(K}6fV:USciCkv#h*c$/56uaTvU<]+Je');
define('NONCE_KEY',        ':DSt*2:Jp.M]aB[a4oJ2*s~=423O,qlryqu6~c+2zQ?n+(C,v-A&HzGbM!,~zUua');
define('AUTH_SALT',        'TzjJEK~-<9G#-a8D&,TEPPYLttJsfe`&0v/U|}`L]0|4t@-)=Fa<1R3Qb1G?0g9q');
define('SECURE_AUTH_SALT', 'YbLQE}0vxQRS&GWntJ6&a15NO5:DSF60D[i2Y|9XPIy!m)1Ta%WZOTQe<%DT#^(W');
define('LOGGED_IN_SALT',   '~?_ap%V[yQp;LcI;U>y]ofL-R_THWLsGY~dEVpjFO2P1&RKB9P_A`]z?M0EZY p!');
define('NONCE_SALT',       '.eL#W.d^0{4{*;pk5}Bkh6,fEZ1:-Qh3L}!_e[):N3MAvTmz0l#zj&V,&4~JZ^H>');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'radiopirate_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
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
define('DB_NAME', 'lepatechinois');

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
define('AUTH_KEY',         'YI1x);BGZDy;ytSH(Q<&xbFCuk6@,8?(d~jP].gwIk:uSH#SJ4N#eHIpX@31*`rx');
define('SECURE_AUTH_KEY',  'be;{8,t;IdTET$d)s7s GCB]IUaTQ`LpQTEX5 ;W@T)ux]M`]&L4FcFU)XlJ$$#%');
define('LOGGED_IN_KEY',    ';>103ZwZXmg=?V-{.w($+=6^<,WYgFvP)L/sIco3*MY6q{sO&6oXn`5IBh92vR00');
define('NONCE_KEY',        'FJ#)4y3<PMlPhK1|aw<_2?;YKY1>+KHA:+w_CsOo#lC#e5-[rRjjMlY1&gh5`HQD');
define('AUTH_SALT',        ';Bm(M%Wvehw1F3iMt-w+[B?nM>F,)]d U^fLzRgWR7%yQ_>B-O4lxd<n+oSgG8S~');
define('SECURE_AUTH_SALT', '}CSjj_ZVKS(iA@!;hV!M[/F8OELe}^?Qt|[<*ITf%[~_0}z 1vpH9SC%)]IPa0/7');
define('LOGGED_IN_SALT',   'v*J6}Lk@Iy/sytOu,rmV@jV.WO[nN^?CaXB4kM%}Z3$/Cg`5d,2m8^^I2PK@Z8`Q');
define('NONCE_SALT',       '``DKu:6`-7<`8-_@[*q/AYlyxdR9/Sgf[9vAl7y&eF%d&1d(_js17i8ivFN@+rhh');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'lepatechinois_';

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
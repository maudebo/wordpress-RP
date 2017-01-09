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
define('DB_NAME', 'leschixx');

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
define('AUTH_KEY',         'Fa;Jw.&{5BWA-km JbYHkr_f1At*L27o/h7#7b-G)`*VbT&QZK<Knxg~C~(Jd@:+');
define('SECURE_AUTH_KEY',  ':8UeQ!<.:n5oxLu8@9/(N1F(mV4E7R/uD< h-WORRkGRF#)]0e#j1C]Gw;W+7q8_');
define('LOGGED_IN_KEY',    'QS3v1qWI>:C@CqhP^%RyAJ,[:18l1lqtwNTEx6^.%LrU<4_/YM6T LZK~@1BW5Rh');
define('NONCE_KEY',        'p`5XCA`_z`de53cvL3zyHn6AoOtgZC(OcBy=(+Z7G{w|goe<~1?m98MM25 tB[t.');
define('AUTH_SALT',        'd:u~AC aq+Dxk/R2e<>L[YjzpYEz>k7{tFi*oO353Z!7]eBrTJFx;kJRB)`Tv53v');
define('SECURE_AUTH_SALT', '<wVA&e!q*{f7M)),+Wph;Rr>HH?[J)^O}XJ`bMREu4`ynS9#F_#Eq* ]HY?9tsc%');
define('LOGGED_IN_SALT',   'kF50qFc3xlO@>Bm/kn@o]OYw)]&E4GD%?r*l>3uPK]!}a[++};i x zd1s}Qe-ox');
define('NONCE_SALT',       '7S<5%_Pgnmhm}3Q@{`nz=-vnfES?.yp<keA@[#!/M6%8VDUBk&SC>SoD=!)QLTuV');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'leschixx_';

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
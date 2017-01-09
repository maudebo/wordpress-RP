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
define('DB_NAME', 'maniacdesports');

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
define('AUTH_KEY',         '!qoZ9 T=hASAn{_db$Sshl`ntw3A:loco_<.G+**,xD-A:ujwRY/O{n|`hAyKMNg');
define('SECURE_AUTH_KEY',  'pWR$C-Up)GyK)df7$L,PT04f)Y*j!h_^~?2,0Ge9t50Vn|KeO3S*u;;$J+&X{yhC');
define('LOGGED_IN_KEY',    ',-MX#X*4Kv.{:(q|b->8lFH=OM}P<*IEF8K9O]Uo)l&tmQoNA${LeP3z.@{X}7!D');
define('NONCE_KEY',        ']>k5iUah419p4:#P@uj>&,mQ!x(Ly(q!1W,B-CxYp|k[92,wHwM5@Zv.q<U6n~=&');
define('AUTH_SALT',        '9bt&NA1>v@s?})Gd-1,ZGdA,?Jv&]id_cX],oA@e^]KfsUz5P|XQ<o]PK2Jn82S-');
define('SECURE_AUTH_SALT', '088C#gmdzhjrmG;7U3i%@I*v`dyvuLY+t}F<+0Ty<l%?mMr<rP<Eo*3mUp$hF]4a');
define('LOGGED_IN_SALT',   'HvZNNLNMFe~!!i&*6no}s^+/|crbn,$0[0cg-)Zh6:.iti#-%n0f_O|[AFTgwF@B');
define('NONCE_SALT',       'lcg^K9Rt(C7WT0uSDqfZm.Z/&Ik}+{|=1-L0t/0 %,10 qBEkK;eY*9mthtwrw]/');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'maniacdesports_';

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
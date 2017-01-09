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
define('DB_NAME', 'brut44');

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
define('AUTH_KEY',         'SI$D3 dY%Xgmk<TM1TV/Yjho*hbRng,bf(s;eD Jt]hsc8n2@zohg=D(ffl_otJH');
define('SECURE_AUTH_KEY',  'G>pv<Tx:=-[fVAjtauAJXg;h.O-|!N0m!*Dp|IAtgXoPhAD[zi#Y4:o.o]pcxTOi');
define('LOGGED_IN_KEY',    '5~o@Gw3)+WwLPrz:`*}*pdc#CCICIXv/U}th+oz9 [r*h9Q8oBqV>^;[@yr]}RyP');
define('NONCE_KEY',        'C$cH1wLGDwGcW8_WJ4uTuB4aXJQWL~il81*u]>6Q+#D}g{{1*g/~DXodnVW>+`J^');
define('AUTH_SALT',        'e^BwJ&IZ=|;$I^7=Sqb{G,ZF$TW[nz.*0s(6 V6]INQ}bbs*D+4___2k[#U!W7q9');
define('SECURE_AUTH_SALT', '8t#}mp(BVL#sAaN!gg!](lSP-}MjVSN:f]P=#B`3(Yxo4vKciElE(IBjL)R*r:J&');
define('LOGGED_IN_SALT',   '3_pqMoG*}zqS:(gG&*B[M QY[4RURXJ)5`]*BTFRAX_UO-gU0/]TKi |qM<[q] x');
define('NONCE_SALT',       'yF={Jf/B^qN_>Isd8iJIm-Jc]dNpBhkp;ZD{Ag=~%Nw.#CS:BPg[.sKp|)<R@7,f');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'brut44_';

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
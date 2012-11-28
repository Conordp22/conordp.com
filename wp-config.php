<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wordpress');
define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME']);

define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content');

// ** MySQL settings - You can get this info from your web host ** //
if (isset($_SERVER["DATABASE_URL"])) {
  $db = parse_url($_SERVER["DATABASE_URL"]);
  define("DB_NAME", trim($db["path"],"/"));
  define("DB_USER", $db["user"]);
  define("DB_PASSWORD", $db["pass"]);
  define("DB_HOST", $db["host"]);
}
else {
  die("Your heroku DATABASE_URL does not appear to be correctly specified.");
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+Gh+O%C0|%;}3I=e]AZ(w/6%[6-idR`|jZ+?1R:`D3C/De[ilZ|C#ts2xmij#}Q,');
define('SECURE_AUTH_KEY',  '!R @-U-;Y(xcMrybjC_~akL4w:!>#.}Xiv?yg`zj)_wY+Ji1`$Z6rwAO#e*69r6)');
define('LOGGED_IN_KEY',    'DOsEwOnbHUvZ+-,Qf/N$h+nkX#XgV^~9qd]hD}yZ<IrwOL+$tgYZ&fD?#~>~[Q{J');
define('NONCE_KEY',        'D:iA+}|O2]P&1$*M:nBO^^h>Yj1hLyU^PVt=qRf_GCZ3$^$dX7LzXtF?~$;aZycC');
define('AUTH_SALT',        'UYc 2;-c-^}{e5(-<V4hO?LCPx~P$:[zb*6V<Lt5@JwR(3q4$>[#qBDEyn5([7B&');
define('SECURE_AUTH_SALT', '5NTw0-cuQf+(1yh{Y+oq]AC?/9Y-EXk?W~+Cw(BsL!i2/;-r!cV;C+o_66^NTr,,');
define('LOGGED_IN_SALT',   '^Emh4g8|O-Dw+k2KTH<RH([|AEa5#$nS`in+.-_`un@m%gkI)`$#:t*cE4hQL$p`');
define('NONCE_SALT',       '7nr0v`d^`U[F}o1?&+- =jo9#|C6dH[re,W&-HVH8@MXL.`!A5yyn5}G<DrTe42V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

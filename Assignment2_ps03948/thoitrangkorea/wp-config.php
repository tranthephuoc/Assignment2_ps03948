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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'test_korea_fashion');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'E*[)JW/~{K/+[0k6XdCYf_y>Ks5B2$oHe%mlJU?2o9N22h}&W|Q7CZh#%1]{/#!6');
define('SECURE_AUTH_KEY',  'a1|EUw|9hfsHd.mPBU|eZUMO!qC|HP;dBh4QPUpe@Ruz^-RA64@8w5l}^/|5DnCt');
define('LOGGED_IN_KEY',    '*]z/_A(G#b&z1oX.ol-tV]y|#IpmH 7NmeRRVA~7$5_m[e2;kB)M :rb%(tNQp3D');
define('NONCE_KEY',        'H6 j{e3%#.6r(>dk_{[BZM=]K)`S`mot0_x=M2sxaQd~dts)bLY7:xa5uhD;-eFp');
define('AUTH_SALT',        't&*D%_%LDt^ .JP{&uF~j]k-=jpql$d2-.l<~XZcFHKpdxQ+]0F7#0NZjuyE])ri');
define('SECURE_AUTH_SALT', 'sUx!L98t0{b#U.L^lI!In]UQlCNeS2[P`KIw!K.7hnO3kyxzt_BEfwyV>Xip~BE1');
define('LOGGED_IN_SALT',   'p}gh&1KGwu]Cm[gmqC@cK*-5D1ckS)e>E!,_MOeWTMzu Kn@gU9hLB@v<A|yKaVm');
define('NONCE_SALT',       'Q/|`?.$ZcsdahKW]F!r+M^TxoCJzpOLGBQZb_[z/IisDJ}6%n-y8WDn?Y>M~6U1/');

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

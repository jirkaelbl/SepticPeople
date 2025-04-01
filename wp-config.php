<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'VmV:VDq__l%CUozlLl&G?5UydPLth{3fhYW(ao$pc*JB8}hR|O|qr=MLjq}nGrH/' );
define( 'SECURE_AUTH_KEY',  'qJ*#6maI]M%&b$b?;pq#m#K%9rc*59{4}&hVJwhJ)<PKo}_>vQwM4$o5_4>eebiE' );
define( 'LOGGED_IN_KEY',    'd[]4./7jq(lL@RJ(T0@IAM<R]8c]id%L=1R Q)`qUZpm*j 1:[0@8nvA#Ubpi.Z#' );
define( 'NONCE_KEY',        'ac0>Gzx-Gt/xI1-84;mVD|Ohz3N|ho|v8.$;L;-ce}F:vJ9jJ!o*}-4<9WiNp5rI' );
define( 'AUTH_SALT',        'Mb{h]Lh`S0u{4V=6B&~](K:CXufS%=HWI@89L}kQm>m.J4uqo0d*6|h|-xt$Gwe`' );
define( 'SECURE_AUTH_SALT', '4u<OxdB5&-m~4BQ? zgt`7BS-yhL#N}Cug#,nb&5r}OPPh.1G`gDsq~XAA!GC^0)' );
define( 'LOGGED_IN_SALT',   '!T7Rd66JAK:)m0e`X~l5BmUp;De&%<svnK@Um(w^DEOg$TPD#:&M<8bYW/MFU.kL' );
define( 'NONCE_SALT',       '`AXm[.;1VW9aLdfLQ5QFlR|tUnhLd}3gq{rFE5nFlU]pKknEGuL)F:l*QSZLUETA' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

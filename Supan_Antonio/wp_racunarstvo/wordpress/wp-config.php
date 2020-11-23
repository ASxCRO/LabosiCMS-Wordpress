<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'PKZ%CPx&ShZOei/V ^HCh^&zk}/&;d)nTEA/;Dk#Y06cuEZi</_o&`_w,@UU|ocP' );
define( 'SECURE_AUTH_KEY',  '8t6@@=*J;Yc5eXH1lAB7{uspA;f9FI[?hFG|s$iZM=yb* _:;Pz3[<`ehp1q;=Yn' );
define( 'LOGGED_IN_KEY',    '!G5Q(HNPy?}NIkx&pUjT?1N|0|D$L*_qRYbz@&G#6lxaBJcj~TtU*xO9N8lNNNEL' );
define( 'NONCE_KEY',        'NR_,a=1?Z1N*3uGM]mGW@[FE[0 p?S*f,^~/UTwQvR8j;6cy3cZ0q[]hS]Rs(g/t' );
define( 'AUTH_SALT',        'AHptyspT$v2wh[BC]cnaPwQ`6NISDM:w[#SG_{8>g<oIw^ oJeRHxDDEaX:*X-7N' );
define( 'SECURE_AUTH_SALT', 'A>&/*AY?:yUQ`6~oBFPUi@mF:;* ;wirMS>bjQ!(WB55D ;3BOf|{G<4498lIJEg' );
define( 'LOGGED_IN_SALT',   '{[?GmRuPPBPetn~Cv/i>Z;pH5.s,XaxsVQ^_cW6e5-;5.;f>{`900>zXG)v2tCU&' );
define( 'NONCE_SALT',       'xNg3a2wWV*vBOM3v@M79P*;WKRiysNJrT1$$U)-j{PCX<!V83?$|;Yi]pKdZ MRt' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

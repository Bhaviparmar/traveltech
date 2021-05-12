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
define( 'DB_NAME', 'traveltech' );

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
define( 'AUTH_KEY',         'y1i?mVYiJxQy5DzY55OH}jq6>F2 {k4|>RJeY3HVMA_@+u0=Nx}<efT1V0U@h<}q' );
define( 'SECURE_AUTH_KEY',  '=.v$y7nY,X2eL~?fK2JjA`^d}DDE)?j:r]pZ8428cD/|`U{FehjTRsn3]mV2#@*F' );
define( 'LOGGED_IN_KEY',    '2~lb^hA8Q/WjCfnPS+Y>Q$f*`>(+rb~YI#Y3gF*n4zI+pX.2QIZZv98iq@9$DaG/' );
define( 'NONCE_KEY',        '!ykK-%61/Xb&z:SD=xv];%{=2eSk]!k`OzIt*g 0Ynu=]O!Co+*,n6u&$ZCP-()+' );
define( 'AUTH_SALT',        'DzmxNLu9At@OS!f,4a *@mX}MnKxk*hs7/SF}CI5A)d^BV(o<7qhKL99xsHe&<d5' );
define( 'SECURE_AUTH_SALT', 'r_w/);sH?o;I+(X?81wIB7lPO/@9loT?laI-?g)nSAtCpL.>}0#R$S*TMqz%O:xi' );
define( 'LOGGED_IN_SALT',   'V!aLtj>07CNG&uC{XK]u8Uc$0jxxNBWew4!WZVo~cduIpk&c[<`gv)[R[a: GE9x' );
define( 'NONCE_SALT',       '3$4C||{~#w-y>l!Ew!!wh>Rx5=wc/nRR7I0y;01xk./|#Men~+5s(ML|<i/F139s' );

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

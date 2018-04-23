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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'z[:Wi<<i9B5< qv&n/8GXNS4rVz 6ljLID)lX<4@CFt4rtQ~tQEVNBkT TzIv#WG');
define('SECURE_AUTH_KEY',  '?1=Oc6/,#Y]XVX@6Cz,ligqb4`:CJ w5DyOFT)X66T~N~ZL#_Qin0H~aFGY~ESMj');
define('LOGGED_IN_KEY',    'CR?.l4e N~nnzav;I-&&.zx!nA9*(`ih<0<O`tcE@gaie}Nou1Tl4h#D=`e/K.h$');
define('NONCE_KEY',        'Os ;C#_az%NZrwL}Wl9Jb9a|XV/9?kQpEP&@@tNx*>Y+z4IA)b)drObs`Lh;Fpc<');
define('AUTH_SALT',        '*#l0%l|5U}>zboqoo*Qy(W1/%GvHe`X)a/93j$Zx#|T vgY x<Ry?Y13iP,]eyX|');
define('SECURE_AUTH_SALT', '@e^_;qzv6@EnJl`yuRoYh=pnc.*ACaUt-wBi3dY~pGv,s}F?qa&V8o(I:8]K_?7o');
define('LOGGED_IN_SALT',   'u|k}-Zl%`l$uQ6hvRy$I0dp!fX07xU76KJ yqr4}%9RJYnWC(hdsUbGR)2ZiVf@L');
define('NONCE_SALT',       '~b];895T#vl85bxRUY=dijUFg47O@y0(hjTuyT}V(ziz>dp>UW|EoiqrJo$%Emvf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
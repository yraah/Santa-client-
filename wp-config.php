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
define( 'DB_NAME', 'santa' );

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
define( 'AUTH_KEY',         '7fyGL@4Hj(eLi?S3S}1<6ftGO:4Vk/7o|sQ{UIb|~2lrV=j=@.]>.6ViP[;$w?/G' );
define( 'SECURE_AUTH_KEY',  'gy[d6O8}?T]L-$@tt_y[*aMK[iZjv; V2Pa4TVI-,,9q[)ZE *m])6MeBCSwn<[z' );
define( 'LOGGED_IN_KEY',    '+ja=i;e}m/>_`9-:_,&x{Ee11Ei5Tn)CcRZi,:J.kIkJhFC=28B[X%OB41BD,@M5' );
define( 'NONCE_KEY',        'uX5,*H}|LN ~jFu^]C%YDD5(W[Q}B4^t _d+/[CCMhIp>c9vt&t|p%{N47Q4J=iW' );
define( 'AUTH_SALT',        '@QvgB5trGh<{*A(I)<#)r&rMUwv{r+uLdxO.NWbj-YD||fL76-b%U~uvX_CxQnT,' );
define( 'SECURE_AUTH_SALT', 'E*>xuS`|Dly=0(Y[PP1$a0`6kK_E!kKe=V3P1,J-FUwL,tXI=:4$5Xt7H=Ql;oc<' );
define( 'LOGGED_IN_SALT',   'l8i30bLg{{)6$[]AU!%:}0:N$z~3~g]~U,he*~9u/IJ2/Nb9nN2uY*F8B+sU`&+<' );
define( 'NONCE_SALT',       '.3+z>2?rsRALfLqLvJegrfL0s]PVd1yiWU*P/v)U&SG6z2+az=tGD&hk0]zPm4dH' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

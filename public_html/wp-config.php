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
define('DB_NAME', 'bobby');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'fr1ck0ff');

/** MySQL hostname */
define('DB_HOST', 'doap-restore2.clrweg9qtztw.us-west-1.rds.amazonaws.com');
//define('DB_HOST', 'old-mysql.doap.com');

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
define('AUTH_KEY',         '6v[(?;0+2]p!ia&4dgww.[//WtbU^>e?+5*;|[Ff05)9(+H.}MOu:MMc!$S.Mn)n');
define('SECURE_AUTH_KEY',  '9~q_qbO%(rJ(gzf,N,XJ!BE5fC@TSo}Q8t9KS_yiB$P|b-taU7?!c~uYwRxC}R$!');
define('LOGGED_IN_KEY',    'pf[q+sOo`P,8[c>Olr))5O7,E6$qr1_xQ$Hcv|-|=1PK;u,W= %h+oK>Q4lVV+ux');
define('NONCE_KEY',        '%}1hiiWH0uoS=LM<66Tysh-(vN8xC<c6]m((@z~<[b4=UPy/<W9Z+Y5!0Cz2)k}_');
define('AUTH_SALT',        'q11l~_:8yWqP>gj-H`T->#w@^7MmgSfeaHnek0&@~5vTnU^+83D FHI{88+(zYaQ');
define('SECURE_AUTH_SALT', 'QS_l$4~&HXI]s],~li_)Fms5,&V}wp$,{jWky|UlDnY5j i*q^`e9nebu1iFkK0s');
define('LOGGED_IN_SALT',   '8c].v!{PG%3e@$h7|Uz*7YG97cHEzY2+wS6kG,^8F8m %O=+nxi-fJ;.0N>_vwRG');
define('NONCE_SALT',       '`:7475lPdO(~@xwF ^fN60oezTM1vXY<UaP!Z><2|f<=NKjT41hql17K_?chJ63w');

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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

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

if(is_admin()) {
        add_filter('filesystem_method', create_function('$a', 'return "direct";' ));
        define( 'FS_CHMOD_DIR', 0751 );
}


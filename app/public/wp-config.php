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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'GzY4SAMXpVzrbMJUXPNH4I77MdtAaTVpBYY37e7MxAGCE0AYg7PmLTxBENjQ7qCpDEXtV3lhYUJGSNUJLJlRbg==');
define('SECURE_AUTH_KEY',  'Z7MG+UBU4yVQhIcHWnhuawJBB9NJ6fsR/0DwOGgYe0OKHKPeUkQeh70k9gEbQ4QXrGPWH/3xJCFzbQvRr6t07A==');
define('LOGGED_IN_KEY',    'w8ted84x+3DFAp6Nh4Csq1GW+QLxCtl9Om5Zy61U8mZVFz57Y5qJsCjoObHuAdmuUwWgPmOuSWA/S2qx2rGXjA==');
define('NONCE_KEY',        '1cj0L/IoFSP+Dfs0IUodmd/75k8Byr4AzKMH6M3dACbbsmBRVghL4HbhO94w5+auJA6UkmLCM7m++kRANimSAQ==');
define('AUTH_SALT',        'F0Z+96hydZGjNRfid+mo0nyLEd8s4tNrXP7u5jH6VcHKKsnYPT2+Emc70hD4BfzqHGOgJAQOS1q9gmFbpZUvWQ==');
define('SECURE_AUTH_SALT', '2AhtXm490yTHbwJNy17RW7xzgJYifmG1d0GP57NHkcOyrPV+oRd0f8CB2E1FgojXSyEslRyiWMgVeaJNln9MpQ==');
define('LOGGED_IN_SALT',   'fjIvU/cYIVXfUOjhUCfSEy7jhNN//VCpxib6z4v6o5VabLVyYW6SkFtyazWgqasTFED97kYUhOrXDzh84Ms2Ag==');
define('NONCE_SALT',       'j9bAUyv3DwMkq4889dkIESenvk9V53lENfo4Q+eEl8l4eyv3HolV8/UMuHSu2cxRND5yDc9ckFMseZYp0zP0/A==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

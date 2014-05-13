<?php

/*
 * Paths
 * 
 * make sure you provide a TRAILING SLASH at the end of EVERY PATH!
 */

// path for the project
// IMPORTANT: when changing the path make sure you edit the .htaccess RewriteBase
define('URL', 'http://localhost/mvc/');

// path for library folder
define('LIBS', 'libs/');


define('DEFAULT_FILE', 'index.php');
define('ERROR_FILE', 'error.php');
define('MODEL_PATH', '/models');
define('CONTROLLER_PATH', '/controllers');

//------------------------------------------------------------------------------


/*
 * All constants used in the application
 */

// sitewide hashkey, do not change as it's used for passwords
define('HASH_PASSWORD_KEY', 'hZSeV1aDnp9mWWurZoMA');

// general-use key
define('HASH_GENERAL_KEY', 'tMlhULk9QsKWplDkMI7v');


//------------------------------------------------------------------------------


/*
 * Database settings
 */

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'MVC');
define('DB_USER', 'root');
define('DB_PASS', '');






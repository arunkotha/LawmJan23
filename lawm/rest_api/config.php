<?php

error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('ENV','DEV');
switch(ENV)
{
    case 'DEV':
        $base_host = sprintf('%s://%s/',$_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http',$_SERVER['SERVER_NAME'])."";

        /* site urls starts */
        define('BASE_URL', 'http://localhost/lawm/');
        define('WEB_BASE_URL', $base_host);
        define('REST_API_URL', $base_host.'rest/');
        define('PAGING_LIMIT', '10');
        /* site urls ends */

        /* database configuration starts*/
        define('DB_HOST', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', 'root');
        define('DB_NAME', 'lawmsac_lawyer');
        /* database configuration ends*/

        define('EXCEL_UPLOAD_SIZE','2097152');

        break;

    case 'STAGE':
        $base_host = sprintf('%s://%s/',$_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http',$_SERVER['SERVER_NAME'])."rest_api/";

        /* site urls starts */
        define('BASE_URL', 'http://lawm.sa/');
        define('WEB_BASE_URL', $base_host);
        define('REST_API_URL', $base_host.'rest/');
        define('PAGING_LIMIT', '10');
        /* site urls ends */

        /* database configuration starts*/
        define('DB_HOST', 'localhost');
        define('DB_USERNAME', 'lawmsac_user');
        define('DB_PASSWORD', 'lawmsac@123');
        define('DB_NAME', 'lawmsac_lawyer');
        /* database configuration ends*/
        define('EXCEL_UPLOAD_SIZE','2097152');

        break;
}

?>

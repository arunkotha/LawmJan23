<?php
ini_set('display_errors','off');
define('ENV','local');
switch(ENV){
    case'local':
        define('BASE_URL','http://localhost/lawm/');
        define('ADMIN_BASE_URL','http://localhost/lawm/admin/');
        define('DB_HOST','localhost');
        define('DB_NAME', 'lawmsac_lawyer');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', 'root');
        define('PAGING_LIST', 12);

        /*Email Config*/
        define('SMTP_EMAIL','app.mazic@gmail.com');
        define('SMTP_PASSWORD','app_mazic.');

        /*Twitter Configuration*/
        define('CONSUMER_KEY', 'KQN7vB0uyVA1SKt0TdTtvuNu0');
        define('CONSUMER_SECRET', 'whgrsNMKBrbxEKDhBJmOpfgMNgOo7ba37fDzPuDDnoRVSMSFP9');
        define('ACCESS_TOKEN', '151041674-lvcPFVGss8zei8jRuiSH0pm6tkuHIpiU2X0c81R6');
        define('ACCESS_TOKEN_SECRET', 'um1B6YtERz3fERPI8z7uEPmqfLY8KfATLR5nDigWOMy9R');

        break;

    case 'live':
        define('BASE_URL','http://lawm.sa/');
        define('ADMIN_BASE_URL','http://lawm.sa/admin/');
        define('DB_HOST', 'localhost');
        define('DB_USERNAME', 'lawmsac_user');
        define('DB_PASSWORD', 'lawmsac@123');
        define('DB_NAME', 'lawmsac_lawyer');
        define('PAGING_LIST', 12);

        /*Email Config*/
        define('SMTP_EMAIL','app.mazic@gmail.com');
        define('SMTP_PASSWORD','app_mazic.');

        /*Twitter Configuration*/
        define('CONSUMER_KEY', 'kBbeVrwmddZl1UEU1L7HcZfTh');
        define('CONSUMER_SECRET', 'uvnHWuYW98v85JRe7Wj45wBTcwOiwjgm5vxR0GWECuKT4O81fW');
        define('ACCESS_TOKEN', '724851448073338880-pDbP8IpOxeMCgYazmRS2ji6KdkQvbte');
        define('ACCESS_TOKEN_SECRET', '3ynDhvfd6Z4kQON8PZEFPQEKDqp4kK2pcdo5G8deuIhxm');

}
?>
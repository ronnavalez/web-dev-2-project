<?php
// Define admin credentials
define('ADMIN_LOGIN', 'wally');
define('ADMIN_PASSWORD', 'mypass');

// Check if the page requires authentication
if (isset($requiresAdmin) && $requiresAdmin === true) {
    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
        ($_SERVER['PHP_AUTH_USER'] != ADMIN_LOGIN) ||
        ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD)) {
        
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Tri Builders Corp Admin"');
        exit("Access Denied: Username and password required.");
    }
}
?>

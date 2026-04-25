<?php
// router.php for local PHP development server
if (php_sapi_name() == 'cli-server') {
    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $file = __DIR__ . $path;

    // If the requested file exists, serve it directly
    if (file_exists($file) && !is_dir($file)) {
        return false; // Serve static file
    }

    // Check if the file exists with .php extension
    if (file_exists($file . '.php')) {
        require $file . '.php';
        return;
    }
}

// Fallback (usually 404, but let the server handle it if we return false)
return false;
?>

<?php
require_once __DIR__ . '/vendor/autoload.php';

// ------------------------------
// 1️⃣ Handle internal routing fallback
// ------------------------------
// When Apache tries to load a non-existent file (e.g. /login),
// PHP won't be invoked by default unless .htaccess rewrites it.
// To make it work on Render (without .htaccess), we check if
// the requested file exists and serve index.php as fallback.

if (php_sapi_name() === 'cli-server') {
    // If using PHP built-in server (php -S ...), allow static files.
    $requested = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (is_file($requested)) {
        return false;
    }
}

// ------------------------------
// 2️⃣ Twig setup
// ------------------------------
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => '/tmp/twig_cache', // Writable on Render
    'auto_reload' => true,
]);

// ------------------------------
// 3️⃣ Router
// ------------------------------
function route($path, $twig) {
    $routes = [
        '/' => ['template' => 'landingpage.twig', 'title' => 'Landing Page - Twig Starter Template'],
        '/login' => ['template' => 'login.twig', 'title' => 'Login Page - Twig Starter Template'],
        '/register' => ['template' => 'register.twig', 'title' => 'Register Page - Twig Starter Template'],
        '/dashboard' => ['template' => 'dashboard.twig', 'title' => 'Dashboard - Twig Starter Template'],
        '/active-tickets' => ['template' => 'active_tickets.twig', 'title' => 'Active Tickets Page - Twig Starter Template'],
        '/all-tickets' => ['template' => 'all_tickets.twig', 'title' => 'All Tickets Page - Twig Starter Template'],
        '/create-ticket' => ['template' => 'create_ticket.twig', 'title' => 'Create Ticket - Twig Starter Template'],
    ];

    // Dynamic route for edit-ticket/{id}
    if (preg_match('#^/edit-ticket/(\d+)$#', $path, $matches)) {
        $id = $matches[1];
        echo $twig->render('edit_ticket.twig', [
            'title' => 'Edit Ticket - Twig Starter Template',
            'ticket_id' => $id,
        ]);
        return;
    }

    // Static routes
    if (isset($routes[$path])) {
        echo $twig->render($routes[$path]['template'], ['title' => $routes[$path]['title']]);
    } else {
        http_response_code(404);
        echo $twig->render('404.twig', ['title' => '404 Not Found - Twig Starter Template']);
    }
}

// ------------------------------
// 4️⃣ Get and normalize path
// ------------------------------
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Normalize trailing slashes
if ($path !== '/' && substr($path, -1) === '/') {
    $path = rtrim($path, '/');
}

// ------------------------------
// 5️⃣ Run the router
// ------------------------------
route($path, $twig);

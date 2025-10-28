<?php
require_once __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/../cache/twig',
    'auto_reload' => true,
]);

function route($path, $twig) {
    // Define routes in an associative array
    $routes = [
        '/' => ['template' => 'landingpage.twig', 'title' => 'Landing Page - Twig Starter Template'],
        '/login' => ['template' => 'login.twig', 'title' => 'Login Page - Twig Starter Template'],
        '/register' => ['template' => 'register.twig', 'title' => 'Register Page - Twig Starter Template'],
        '/dashboard' => ['template' => 'dashboard.twig', 'title' => 'Dashboard - Twig Starter Template'],
        '/active-tickets' => ['template' => 'active_tickets.twig', 'title' => 'Active Tickets Page - Twig Starter Template'],
        '/all-tickets' => ['template' => 'all_tickets.twig', 'title' => 'All Tickets Page - Twig Starter Template'],
        '/create-ticket' => ['template' => 'create_ticket.twig', 'title' => 'Create Ticket - Twig Starter Template'],
    ];

    // Handle /edit-ticket/{id} dynamically
    if (preg_match('#^/edit-ticket/(\d+)$#', $path, $matches)) {
        $id = $matches[1];
        echo $twig->render('edit_ticket.twig', [
            'title' => 'Edit Ticket - Twig Starter Template',
            'ticket_id' => $id,  // Pass the ID to Twig
        ]);
        return;
    }

    if (isset($routes[$path])) {
        echo $twig->render($routes[$path]['template'], ['title' => $routes[$path]['title']]);
    } else {
        echo $twig->render('404.twig', ['title' => '404 Not Found - Twig Starter Template']);
    }
}

// Get the current path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Call the router
route($path, $twig);
?>


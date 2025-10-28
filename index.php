<?php
require_once __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;


$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);


echo $twig->render('all_tickets.twig', []);
// echo $twig->render('landingpage.twig', []);
// Simple router based on URL path
// $page = $_GET['page'] ?? 'home'; // Default to 'home'

// // Whitelist allowed pages
// $allowed_pages = ['home', 'about', 'contact'];

// // Check if the requested page exists
// if (in_array($page, $allowed_pages)) {
//     echo $twig->render("$page.twig");
// } else {
//     // Render 404 page if not found
//     echo $twig->render('404.twig', ['page' => $page]);
// }

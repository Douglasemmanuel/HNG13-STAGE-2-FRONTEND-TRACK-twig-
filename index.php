<?php
require_once __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Point Twig to your templates folder
$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

// Render a template
echo $twig->render('hello_world.twig', ['name' => 'World']);


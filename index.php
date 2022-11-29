<?php
namespace App;

spl_autoload_register(function ($class) {
    $class = str_replace(__NAMESPACE__ . '\\', '', $class);
    $class = str_replace('\\', '/', $class);
    require __DIR__ . '/' . $class . '.php';
});
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon blog</title>
</head>
<body>

<?php

use App\Models\Database;
use App\Models\Post;
use App\Views\Single;

/**
 * Cette page fait office de controller pour la démo, mais dans un projet réel, le controller serait dans une classe séparée avec son namespace. Il y aurait alors sur cette page un router qui redirigerait sur l'URL voulue.
 */

Database::$host = "localhost";
Database::$user = "root";
Database::$pass = "";
Database::$dbName = "blog";

Database::connect();

// Router
if (isset($_GET["post_id"]))
{
    $id = $_GET["post_id"];

    if (empty($id)) {
        echo "<h1>Error 404 : cette page n'existe pas.</h1>";
        return;
    }

    $post = new Post();
    $post = $post->getPost($id);

    if (empty($post))
    {
        echo "<h1>Error 404 : cette page n'existe pas.</h1>";
    }
    else
    {
        $post = $post[0];
        render("Views/single", compact("post"));
    }
}
else
{
    echo "<h1>Page d'accueil</h1>";
}

function render ($view, $data = []): void
{
    extract($data);
    require $view . ".php";
}
?>

</body>
</html>

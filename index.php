<?php
namespace App;

spl_autoload_register(function ($class) {
    $class = str_replace(__NAMESPACE__ . '\\', '', $class);
    $class = str_replace('\\', '/', $class);
    var_dump(__DIR__ . '/' . $class . '.php');
    echo "<br>";
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

require "views/post.php";

$db = new Database("127.0.0.1:8889", "root", "blog", "root");
$db->connect();
$post = new Post();
echo "<pre>";
var_dump($post->getPost(1));
echo "</pre>";

?>

</body>
</html>

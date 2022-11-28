<?php
namespace App\Views;

$post = $data["post"];
?>

<article>
    <h1><?= $post["title"]?></h1>
    <time><?= $post["created_at"]?></time>
    <p><?= $post["content"]?></p>
</article>

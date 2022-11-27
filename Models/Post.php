<?php
namespace App\Models;

use App\Models\Database;

class Post
{
    public function getPost (int $id)
    {
        $params = [
            "id" => $id
        ];
        Database::connect->prepReq("SELECT * FROM post WHERE id = :id", $params);
        return Database::$connexion->fetchData();
    }
}
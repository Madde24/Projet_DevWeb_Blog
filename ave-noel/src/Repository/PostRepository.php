<?php

namespace App\src\repository;

use App\src\config\Database;
use App\src\model\Post;

class PostRepository
{
    public function getPosts()
    {
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->query("SELECT post.id, post.id_client, post.title, post.created_at, post.updated_at, post.content, client.username, client.avatar_path FROM post,client WHERE post.id_client=client.id  AND post.deleted_at IS NULL ORDER BY post.id DESC");
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertPost(Post $post)
    {
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare('INSERT INTO post (id_client, content, title, created_at, updated_at, deleted_at) VALUES (:id_client, :content, :title, :created_at, :updated_at, :deleted_at)');
        $result->bindValue(':id_client', $post->getIdClient(), \PDO::PARAM_INT);
        $result->bindValue(':content', $post->getContent(), \PDO::PARAM_STR);
        $result->bindValue(':title', $post->getTitle(), \PDO::PARAM_STR);
        $result->bindValue(':created_at', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $result->bindValue(':updated_at', NULL);
        $result->bindValue(':deleted_at', NULL);
        $result->execute();
    }

    public function getPostsClient(int $idClient){
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->query("SELECT * FROM post WHERE id_client=$idClient AND deleted_at IS NULL ORDER BY id DESC");
        return $result->fetchALL(\PDO::FETCH_ASSOC);
    }

   

    public function updatePost(Post $post)
    {
        $database = new Database();
        $db = $database->checkConnection();
        $result = $db->prepare('UPDATE post SET content = :content, title = :title, updated_at = :updatedAt WHERE id = :id ');
        $result->bindValue(':id', $post->getId(), \PDO::PARAM_INT);
        $result->bindValue(':content', $post->getContent(), \PDO::PARAM_STR);
        $result->bindValue(':title', $post->getTitle(), \PDO::PARAM_STR);
        $result->bindValue(':updatedAt', $post->getUpdatedAt(), \PDO::PARAM_STR);
        $result->execute();
    }

    public function deletePost(Post $post){
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare('UPDATE post SET deleted_at = :deletedAt WHERE id = :id ');
        $result->bindValue(':id', $post->getId(), \PDO::PARAM_INT);
        $result->bindValue(':deletedAt', $post->getDeletedAt(), \PDO::PARAM_STR);
        $result->execute();
    }
}
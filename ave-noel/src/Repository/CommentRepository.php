<?php

namespace App\src\Repository;

use App\src\config\Database;
use App\src\model\Comment;

class CommentRepository
{
    public function insertComment(Comment $comment)
    {
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare('INSERT INTO comment (id_client, id_post, text_comment, created_at, deleted_at, updated_at) VALUES (:id_client, :id_post, :text_comment, :created_at, :deleted_at, :updated_at)');
        $result->bindValue(':id_client', $comment->getIdClient(), \PDO::PARAM_INT);
        $result->bindValue(':id_post', $comment->getIdPost(), \PDO::PARAM_INT);
        $result->bindValue(':text_comment', $comment->getContent(), \PDO::PARAM_STR);
        $result->bindValue(':created_at', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $result->bindValue(':deleted_at', NULL);
        $result->bindValue(':updated_at', NULL);
        $result->execute();
    }

    public function updateComment(Comment $comment)
    {
        $database = new Database();
        $db = $database->checkConnection();
        $result = $db->prepare('UPDATE comment SET text_comment = :text_comment, updated_at = :updatedAt WHERE id = :id ');
        $result->bindValue(':id', $comment->getId(), \PDO::PARAM_INT);
        $result->bindValue(':text_comment', $comment->getContent(), \PDO::PARAM_STR);
        $result->bindValue(':updatedAt', $comment->getUpdatedAt(), \PDO::PARAM_STR);
        $result->execute();
    }

    public  function getCommentsPost(int $idPost){
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->query("SELECT comment.id, comment.id_client, comment.text_comment, comment.created_at,client.username, client.avatar_path FROM comment,client WHERE comment.id_client=client.id AND comment.id_post=$idPost AND comment.deleted_at IS NULL ORDER BY comment.id DESC");
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteComment(Comment $comment){
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare('UPDATE comment SET deleted_at = :deletedAt WHERE id = :id ');
        $result->bindValue(':id', $comment->getId(), \PDO::PARAM_INT);
        $result->bindValue(':deletedAt', $comment->getDeletedAt(), \PDO::PARAM_STR);
        $result->execute();
    }
}
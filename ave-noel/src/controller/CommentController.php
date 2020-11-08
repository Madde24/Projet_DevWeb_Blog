<?php 

namespace App\src\controller;


use App\src\Repository\CommentRepository;
use App\src\config\Session;
use App\src\model\comment;

class CommentController
{
    public function liste()
    {
        $postRepository = new CommentRepository;
        $posts = $postRepository->getComments();
    }

    public function create()
    {    
        $session = new Session;
        $commentRepository = new CommentRepository;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment = new Comment;
            $comment->setIdPost($_POST['idPost']);
            $comment->setIdClient($session->get('id'));
            $comment->setContent($_POST['content']);
            $commentRepository->insertComment($comment);
        }
        header('Location: ?page=post&&action=liste');
        
    
    }

    public function read()
    {   
        $commentRepository = new CommentRepository;
        $session = new Session;
        return $commentRepository->getCommentsPost($session->get('idPost'));
    }

    public function update()
    {
        $commentRepository = new CommentRepository;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $comment = new Comment();
            $comment->setId($_POST['idComment']);
            $comment->setContent($_POST['content']);
            $comment->setUpdatedAt(date('Y-m-d H:i:s'));
            $commentRepository->updateComment($comment);
        }

        header('Location: ?page=post&&action=liste');
    }

    public function delete()
    {
        $commentRepository = new CommentRepository;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment = new Comment();
            $comment->setId($_POST['idComment']);
            $comment->setDeletedAt(date('Y-m-d H:i:s'));
            $commentRepository->deleteComment($comment);
            header('Location: ?page=post&&action=liste');
        }
        
    }
}
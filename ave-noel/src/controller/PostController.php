<?php

namespace App\src\controller;

use App\src\Repository\PostRepository;

use App\src\Repository\CommentRepository;

use App\src\config\Session;

use App\src\model\post;

class PostController
{
    public function liste()
    {
        
        $session = new Session;
        $postRepository = new PostRepository;
        $commentRepository = new CommentRepository;
        ob_start(); 
        $posts = $postRepository->getPosts();
        foreach($posts as &$postClient){
            $commentsList = $commentRepository->getCommentsPost($postClient['id']);
            include 'templates/viewPostComments.php';
        }
        $content = ob_get_clean();
        require 'templates/showposts.php';
        
    }

    public function create()
    {    
        
        $postRepository = new PostRepository;
        $session = new Session;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = new Post;
            $post->setIdClient($session->get('id'));
            $post->setContent($_POST['content']);
            $post->setTitle($_POST['title']);
            $postRepository->insertPost($post);
            header('Location: ?action=create&&page=post');
        }
        $postClient = $this->read();
        require 'templates/newpost.php';
        
    
    }

    public function readComments(){
        $commentRepository = new CommentRepository;
        $session = new Session; 
        return $commentRepository->getCommentsPost($postClient['id']);
    }

    public function read()
    {   
        $postRepository = new PostRepository;
        $session = new Session;
        return $postRepository->getPostsClient($session->get('id'));
    }

    public function update()
    {
        $postRepository = new PostRepository;
        $session = new Session;
        if (isset($_POST['idPost'])) {
            $post = new Post();
            $post->setId($_POST['idPost']);
            $post->setContent($_POST['content']);
            $post->setTitle($_POST['title']);
            $post->setUpdatedAt(date('Y-m-d H:i:s'));
            $postRepository->updatePost($post);
            header('Location: ?action=create&&page=post');
        }

        require 'templates/newpost.php';
    }

    public function delete()
    {
        $postRepository = new PostRepository;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = new Post();
            $post->setId($_POST['idPost']);
            $post->setDeletedAt(date('Y-m-d H:i:s'));
            $postRepository->deletePost($post);
            header('Location: ?action=create&&page=post');
        }
        require 'templates/newpost.php';
    }
}
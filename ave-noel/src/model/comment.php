<?php
namespace App\src\model;

require_once('vendor\autoload.php');

class Comment
{

    private $id;
    private $idClient;
    private $idPost;
    private $textComment;
    private $createdAt;
    private $updatedAt;
    private $deletedAt;


    public function getId()
    {
        return $this->id;
    }

    public function getIdClient()
    {
        return (int)$this->idClient;
    }

    public function getIdPost()
    {
        return (int)$this->idPost;
    }


    public function getContent()
    {
        return $this->textComment;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
        return $this;
    }

    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;
        return $this;
    }


    public function setContent($textComment)
    {
        $this->textComment = $textComment;
        return $this;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }
}
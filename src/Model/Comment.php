<?php

namespace App\Model;

use DateTime;

class Comment
{
    const WAITING_VALIDATION = 0;
    const PUBLISHED = 1;

    private $id;
    private $pseudo;
    private $content;
    private $created_at;
    private $status = self::WAITING_VALIDATION;
    private $post_id;
    private $user_id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getCreatedAt(): DateTime
    {
        return new DateTime($this->created_at);
    }

    public function setCreatedAt(string $date): self
    {
        $this->created_at = $date;
        return $this;
    }

    public function getStatus()
    {
        return (int)$this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getPostId()
    {
        return $this->post_id;
    }

    public function setPostId($id)
    {
        $this->post_id = $id;
    }
}
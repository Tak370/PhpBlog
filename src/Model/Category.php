<?php

namespace App\Model;

class Category
{
    private $id;

    private $name;

    private $slug;

    private $post_id;

    private $post;

    /**
     * @return mixed
     */
    public function getID(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return mixed
     */
    public function getPostID(): ?int
    {
        return $this->post_id;
    }

    public function setPost(Post $post)
    {
        $this->post = $post;
    }

}
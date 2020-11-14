<?php

namespace App\Model;

use App\Helper\Text;
use \DateTime;

class Post {

    private $id;

    private $name;

    private $content;

    private $created_at;

    private $slug;

    private $categories = [];

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getFormattedContent(): ?string
    {
        return nl2br(e($this->content));
    }

    /**
     * @return string|null
     */
    public function getExcerpt(): ?string
    {
        if ($this->content === null) {
            return null;
        }
        return nl2br(e(Text::excerpt($this->content, 60)));
    }

    /**
     * @return mixed
     */
    public function getCreatedAt(): DateTime
    {
        return new DateTime($this->created_at);
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

}
<?php

namespace App\Validator;

use App\Table\CommentTable;

class CommentValidator extends AbstractValidator
{
    public function __construct(array $data, CommentTable $table, ?int $postID = null)
    {
        parent::__construct($data);
        $this->validator->rule('required', ['pseudo', 'content']);
        $this->validator->rule('lengthBetween', ['pseudo', 'content'], 3, 200);
    }

}
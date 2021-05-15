<?php

namespace App\Table;

use App\Model\Comment;
use Exception;
use PDO;

final class CommentTable extends Table
{
    protected $table = "comment";
    protected $class = Comment::class;

    public function hydratePosts(array $posts): void
    {
        $postsById = [];
        foreach ($posts as $post) {
            $postsById[$post->getId()] = $post;
        }
        $comments = $this->pdo
            ->query('SELECT c.*
            FROM comment c
            WHERE c.post_id IN (' . implode(',', array_keys($postsById)) . ')'
            )->fetchAll(PDO::FETCH_CLASS, $this->class);
        foreach ($comments as $comment) {
            $postsById[$comment->getPostId()]->addComment($comment);
        }
    }

    public function createComment(Comment $comment): void
    {
        $id = $this->create([
            'pseudo' => $comment->getPseudo(),
            'status' => $comment->getStatus(),
            'content' => $comment->getContent(),
            'post_id' => $comment->getPostId()
        ]);
        $comment->setId($id);
    }

}
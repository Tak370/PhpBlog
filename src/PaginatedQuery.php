<?php

namespace App;

use Exception;
use PDO;

class PaginatedQuery
{
    private $query;
    private $queryCount;
    private $pdo;
    private $perPage;
    private $count;
    private $items;

    public function __construct(
        string $query,
        string $queryCount,
        ?PDO $pdo = null,
        int $perPage = 12
    )
    {
        $this->query = $query;
        $this->queryCount = $queryCount;
        $this->pdo = $pdo ?: Connection::getPDO();
        $this->perPage = $perPage;
    }

    public function getItems(string $classMapping): array
    {
        if ($this->items === null) {
            $currentPage = $this->getCurrentPage();
            $nbPages = $this->getNbPages();
            if ($currentPage > $nbPages) {
                throw new Exception('Cette page n\'existe pas');
            }
            $offset = ($currentPage - 1) * $this->perPage;
            $this->items = $this->pdo->query(
                $this->query .
                " LIMIT {$this->perPage} OFFSET $offset"
            )
                ->fetchAll(PDO::FETCH_CLASS, $classMapping);
        }
        return $this->items;
    }

    public function previousLink (string $link): ?string
    {
        $currentPage = $this->getCurrentPage();
        if ($currentPage <= 1) {
            return null;
        }
        if ($currentPage > 2) {
            $link .= "?page=" . ($currentPage - 1);
        }
        return <<<HTML
            <a href="{$link}" class="btn btn-info">&laquo; Page précédente</a>
HTML;
    }

    public function nextLink (string $link): ?string
    {
        $currentPage = $this->getCurrentPage();
        $nbPages = $this->getNbPages();
        if ($currentPage >= $nbPages) {
            return null;
        }
        $link .= "?page=" . ($currentPage + 1);
        return <<<HTML
            <a href="{$link}" class="btn btn-info ml-auto">&raquo; Page suivante</a>
HTML;
    }

    private function getCurrentPage (): int
    {
        return RequestManager::getPositiveInt('page', 1);
    }

    private function getNbPages (): int
    {
        if ($this->count === null) {
            $this->count = (int)$this->pdo
                ->query($this->queryCount)
                ->fetch(PDO::FETCH_NUM)[0];
        }

        return ceil($this->count / $this->perPage);
    }

}
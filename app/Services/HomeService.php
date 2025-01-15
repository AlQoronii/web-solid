<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\BookRepositoryInterface;
use App\Repositories\ArticleRepositoryInterface;

class HomeService
{
    protected $bookRepository;
    protected $articleRepository;

    public function __construct(BookRepositoryInterface $bookRepository, ArticleRepositoryInterface $articleRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->articleRepository = $articleRepository;
    }

    public function getLatestBooks(): Collection
    {
        return $this->bookRepository->getLatestBooks();
    }

    public function getLatestArticles(): Collection
    {
        return $this->articleRepository->getLatestArticles();
    }
}
?>
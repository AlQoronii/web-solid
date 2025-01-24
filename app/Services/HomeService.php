<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\BookRepositoryInterface;
use App\Repositories\ArticleRepositoryInterface;

class HomeService
{
    protected $bookRepository;
    protected $bookService;
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

    public function getAllBooks(): Collection
    {
        return $this->bookRepository->getAll();
    }

    public function getBookbyCategory(string $category): Collection{
        return $this->bookRepository->getBookbyCategory($category);
    }

    public function searchBook($search): Collection{
        return $this->bookService->searchBook($search);
    }
}

?>
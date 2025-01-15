<?php
namespace App\Services;

use App\Models\Book;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class HomeServiceImplementation implements HomeService {
    public function getLatestBooks(): Collection {
        try{
            return Book::where('book_status', 'PUBLISHED')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function getLatestArticles(): Collection {
        return Article::where('article_status', 'PUBLISHED')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }
}

?>
<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticlesTable extends Component
{
    public function render()
    {
        $articles = Article::paginate(10);

    return view('livewire.articles-table', ['articles' => $articles]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticlesTable extends Component
{
    use WithPagination;

    public $perPage = 5; // Default jumlah item per halaman

    public function render()
    {
        $articles = Article::paginate($this->perPage); // Pastikan model Article sudah diimpor
        // dd($this->perPage);
        return view('livewire.articles-table', compact('articles'));
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }
}

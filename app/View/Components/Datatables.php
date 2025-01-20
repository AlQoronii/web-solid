<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datatables extends Component
{
    public $layoutTop2Start;
    public $id;
    public $url;
    public $columns;
    public $aksi;
    public $filter;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    // public function __construct($layoutTop2Start, $id, $url, $columns, $aksi, $filter)
    // {
    //     $this->layoutTop2Start = $layoutTop2Start;
    //     $this->id = $id;
    //     $this->url = $url;
    //     $this->columns = $columns;
    //     $this->aksi = $aksi;
    //     $this->filter = $filter;
    // }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.datatables');
    }
}
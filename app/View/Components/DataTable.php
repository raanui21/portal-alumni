<?php

namespace App\View\Components;


use Illuminate\View\Component;

class DataTable extends Component
{
    public $headers;
    public $records;
    public $title;
    public $searchRoute;
    public $createRoute;
    public $editRoute;
    public $deleteRoute;

    // kalo gabisa biasanya nama parameternya
    public function __construct($headers, $records, $title, $searchRoute, $createRoute, $editRoute, $deleteRoute)
    {
        $this->headers = $headers;
        $this->records = $records;
        $this->title = $title;
        $this->searchRoute = $searchRoute;
        $this->createRoute = $createRoute;
        $this->editRoute = $editRoute;
        $this->deleteRoute = $deleteRoute;
    }

    public function render()
    {
        return view('components.data-table');
    }
}
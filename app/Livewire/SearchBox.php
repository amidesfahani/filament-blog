<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBox extends Component
{
    public $search = '';

    public function updatedSearch()
    {
        $this->dispatch('search', $this->search);
    }

    /**
     * a method for button
     */
    public function update()
    {
        $this->dispatch('search', $this->search);
    }

    public function render()
    {
        return view('livewire.search-box');
    }
}

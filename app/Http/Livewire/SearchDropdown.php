<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];

        if (strlen($this->search) >= 2) {
          

            $searchResults =   Http::get('https://api.themoviedb.org/3/search/movie?query='.$this->search.'&api_key=7aa7d869b149038d61b3eee1162c20b0')->json()['results'];
        }

        // dump($searchResults);

        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(7),
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Product;
use Livewire\Component;

class SearchProduct extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $products = Product::query();

        if ($this->search) {
            $products->where('name', 'like', '%' . $this->search . '%');
        }

        return view('livewire.search-product', [
            'products' => $products->paginate(8)
        ]);
    }
}

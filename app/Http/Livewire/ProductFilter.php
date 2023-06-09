<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class ProductFilter extends Component
{
    use WithPagination;

    public $categories;
    public $name;
    public $category = [];
    public $condition = [];
    public $minprice;
    public $maxprice;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        $products = $this->getFilteredProducts();

        return view('livewire.product-filter', [
            'products' => $products
        ]);
    }

    public function updated()
    {
        $this->resetPage();
    }

    private function getFilteredProducts()
    {
        $query = Product::query();

        if ($this->name) {
            $query = $query->where('name', 'like', '%' . $this->name . '%');
        }

        if (!empty($this->category) && !in_array('all', $this->category)) {
            $query = $query->whereIn('category_id', $this->category);
        }

        if (!empty($this->condition)) {
            $query = $query->whereIn('condition', $this->condition);
        }

        if (!empty($this->minprice) && !empty($this->maxprice)) {
            $query = $query->whereBetween('price', [$this->minprice, $this->maxprice]);
        } elseif (!empty($this->minprice)) {
            $query = $query->where('price', '>=', $this->minprice);
        } elseif (!empty($this->maxprice)) {
            $query = $query->where('price', '<=', $this->maxprice);
        }

        return $query->paginate(5);
    }
}

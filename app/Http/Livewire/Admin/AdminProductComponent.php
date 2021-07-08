<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{

    use  WithPagination;
    public function deleteCategory($id)
    {
        $category = Product::find($id);
        $category->delete();
        Session()->flash('message', 'Product Deleted');
    }
    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.admin.admin-product-component', ['products' => $products])->layout('layouts.base');
    }
}
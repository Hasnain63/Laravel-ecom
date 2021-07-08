<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_discription;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = '0';
    }
    public function generateslug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    public function addProduct()
    {
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_discription = $this->short_discription;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->SKU = $this->SKU;
        $product->quantity = $this->quantity;
        $product->category_id = $this->category_id;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;
        $product->save();
        Session()->flash('message', 'Product Created Successfully');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component', ['categories' => $categories])->layout('layouts.base');
    }
}
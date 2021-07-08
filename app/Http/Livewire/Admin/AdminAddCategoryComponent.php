<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
// use session;
use Illuminate\Support\Facades\Session;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function storeCategory()
    {
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        Session()->flash('message', 'Category Created Successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CategoryCreate extends Component
{
    public $name; // state o variable para guardar los datos a llenar

    public $category;

    protected $rules = [
        'name' => 'required|string|min:2|max:255'
    ];

    public function render()
    {
        return view('livewire.category-create');
    }

    public function submit()
    {
        // validations
        $this->validate(); // redirecciona automaticamente en caso de error

        // save
        Category::create([
            'name' => $this->name
        ]);

        // muestre un Banner de exito
        // banner con livewire o con jetstream
        session()->flash('flash.banner', 'Usuario creado con éxito!');

        return redirect()->route('categories.index');
    }
}

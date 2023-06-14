<?php

namespace App\Http\Livewire;

use App\Models\Category; // importando la clase categoria
use Livewire\Component;

class CategoryIndex extends Component
{
    public function render()
    {
        // SELECT * FROM categories
        $category = Category::paginate(10); // pagina los elementos de 10 en 10
        return view('livewire.category-index', [
            'categorias' => $category
        ]);
    }
}

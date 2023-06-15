<?php

namespace App\Http\Livewire;

use App\Models\Category; // importando la clase categoria
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CategoryIndex extends Component
{

    public $deleteToggle = false;

    public $categorySelected;

    public function render()
    {
        // SELECT * FROM categories
        $category = Category::paginate(10); // pagina los elementos de 10 en 10
        return view('livewire.category-index', [
            'categorias' => $category
        ]);
    }

    public function deleteConfirmation($categoryId)
    {
        $this->deleteToggle = true;
        $this->categorySelected = $categoryId;
    }

    public function delete()
    {
        $category = Category::find($this->categorySelected);
        $category->delete();

        session()->flash('flash.banner', 'La categoría ha sido borrada');
        return redirect()->route('categories.index');
    }
}

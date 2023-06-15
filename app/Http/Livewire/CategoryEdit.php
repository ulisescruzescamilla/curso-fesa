<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CategoryEdit extends Component
{
    public $category;

    public $name;

    protected $rules = [
        'name' => 'required|string|min:2|max:255'
    ];

    public function mount($category)
    {
        // Search category
        $this->category = Category::find($category);
        $this->name = $this->category->name;  // autorelleno
    }

    public function render()
    {
        return view('livewire.category-edit', [
            'category' => $this->category
        ]);
    }

    public function editCategory()
    {
        DB::beginTransaction();
        try {
            // $this->category ya contiene la categoria que consultamos
            // $this->category->update([
            //     'name' => $this->name
            // ]); // overflow

            $this->category->name = $this->name;
            $this->category->save();


            session()->flash('flash.banner', 'Usuario actualizado con éxito!');

            DB::commit(); // guarda cambios
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            DB::rollBack(); // deshace los cambios
            session()->flash('style', 'danger');
            session()->flash('flash.banner', 'Algo salió mal');
            // redireccion
            // guardar un mensaje de error en la bitacora
            // responder con un mensaje controlado
            // woops algo salió mal
        }
    }
}

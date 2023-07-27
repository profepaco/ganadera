<?php

namespace App\Http\Livewire\Productos;

use App\Models\Precio;
use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;

class Create extends Component
{

    public $clave;
    public $nombre;
    public $descripcion;
    public $categoria_id;
    public $valor;

    protected $rules = [
        'clave'=>'required|max:10',
        'nombre'=>'required',
        'descripcion'=>'required',
        'categoria_id'=>'required',
        'valor'=>'required'
    ];

    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.productos.create',['categorias'=>$categorias]);
    }

    public function store()
    {
        $data = $this->validate();

        $producto = new Producto;
        $producto->clave = $data['clave'];
        $producto->nombre = $data['nombre'];
        $producto->descripcion = $data['descripcion'];
        $producto->categoria_id = $data['categoria_id'];
        $producto->save();

        $precio = new Precio;
        $precio->valor = $data['valor'];
        $precio->es_ultimo = true;
        $precio->producto_id = $producto->id;
        $precio->save();

        session()->flash('message','El producto se registro correctamente');
        return redirect()->route('productos.index');
    }
}

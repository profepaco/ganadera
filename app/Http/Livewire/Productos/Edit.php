<?php

namespace App\Http\Livewire\Productos;

use App\Models\Precio;
use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;

class Edit extends Component
{
    
    public $producto_id;
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

    public function mount(Producto $producto){
        $this->producto_id = $producto->id;
        $this->clave = $producto->clave;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->categoria_id = $producto->categoria_id;
        $this->valor = $producto->ultimoPrecio()->valor;
    }

    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.productos.edit',['categorias'=>$categorias]);
    }

    public function update()
    {
        $data = $this->validate();

        $producto = Producto::find($this->producto_id);
        $precioActual = $producto->ultimoPrecio();
        $producto->clave = $data['clave'];
        $producto->nombre = $data['nombre'];
        $producto->descripcion = $data['descripcion'];
        $producto->categoria_id = $data['categoria_id'];
        
        if($this->valor!=$precioActual->valor){
            $precioActual->es_ultimo = false;

            $precio = new Precio;
            $precio->valor = $data['valor'];
            $precio->es_ultimo = true;
            $precio->producto_id = $producto->id;

            $precioActual->save();
            $precio->save();
        }
        $producto->save();

        session()->flash('message','El producto se actualizó correctamente');
        return redirect()->route('productos.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\ProductosExport;
use App\Http\Requests\ProductoEditRequest;
use App\Http\Requests\ProductoRequest;
use App\Models\categoriaModel;
use App\Models\productoModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class productoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $productos = productoModel::with('categoria')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nombre', 'LIKE', "%{$search}%")
                        ->orWhere('descripcion', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString(); // mantiene el search en la paginación

        $categorias = categoriaModel::orderBy('nombre')->get();

        return view('productos.index', compact('productos', 'categorias', 'search'));
    }
    public function exportExcel()
    {
        return Excel::download(new ProductosExport, 'productos.xlsx');
    }

    /**
     * Guardar producto
     */
    public function store(ProductoRequest $request)
    {
        try {

            $path = null;

            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('productos', 'public');
            }


            // dd($path);
            productoModel::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'cantidad' => $request->cantidad,
                'categoria_id' => $request->categoria_id,
                'img' => $path, //CORRECTO
            ]);

            //dd($create);

            return redirect()
                ->route('productos.index')
                ->with('success', 'Producto creado correctamente');

        } catch (\Exception $e) {

            return back()
                ->withInput()
                ->with('error', 'Error al crear el producto');
        }
    }

    /**
     * Editar producto (opcional si usas modal)
     */
    public function edit($id)
    {
        $producto = productoModel::with('categoria')->findOrFail($id);
        return $producto; // para pruebas / JSON
    }

    /**
     * Actualizar producto
     */
    public function update(ProductoEditRequest $request, $id)
    {
        try {

            $producto = productoModel::findOrFail($id);

            $data = [
                'nombre' => $request->nombreEdit,
                'descripcion' => $request->descripcionEdit,
                'precio' => $request->precioEdit,
                'cantidad' => $request->cantidadEdit,
                'categoria_id' => $request->categoria_idEdit,
            ];

            if ($request->hasFile('imagenEdit')) {


                $data['img'] = $request->file('imagenEdit')->store('productos', 'public');
            }

            $producto->update($data);

            return redirect()
                ->route('productos.index')
                ->with('success', 'Producto actualizado correctamente');

        } catch (\Exception $e) {

            return back()->with('error', 'Error al actualizar el producto');
        }
    }

    /**
     * Eliminar producto
     */
    public function destroy($id)
    {
        try {

            $producto = productoModel::findOrFail($id);



            $producto->delete();

            return redirect()
                ->route('productos.index')
                ->with('success', 'Producto eliminado correctamente');

        } catch (\Exception $e) {

            return back()->with('error', 'Error al eliminar el producto');
        }
    }
}

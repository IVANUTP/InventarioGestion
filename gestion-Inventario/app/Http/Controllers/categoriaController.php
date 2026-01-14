<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaEditRequest;
use App\Http\Requests\CategoriaRequest;
use App\Models\categoriaModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class categoriaController extends Controller
{
    //

    public function index(Request $request)
    {
        $search = $request->search;

        $categorias = categoriaModel::when($search, function ($query, $search) {
            $query->where('nombre', 'like', "%{$search}%")
                ->orWhere('descripcion', 'like', "%{$search}%");
        })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        return view('categoria.index', compact('categorias'));
    }
    public function store(CategoriaRequest $request)
    {


        try {

            $path = null;
            if ($request->hasFile('img')) {
                $path = $request->file('img')->store('imagenes', 'public');
            }
            $categoria = categoriaModel::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'img' => $path

            ]);

            $categoria->save();

            return redirect()
                ->route('categoria.index')
                ->with([
                        'type' => 'success',
                        'message' => 'Categoría creada exitosamente'
                    ]);


        } catch (\Exception $e) {

            return back()->with([
                'type' => 'error',
                'message' => 'Error al crear la categoría'
            ]);


        }


    }
    public function edit($id)
    {
        $categoria = categoriaModel::findOrFail($id);
        return $categoria;
    }

    public function update(CategoriaEditRequest $request, $id)
    {
        try {

            $categoria = categoriaModel::findOrFail($id);

            $data = [
                'nombre' => $request->nombreEdit,
                'descripcion' => $request->descripcionEdit,
            ];

            if ($request->hasFile('imgEdt')) {
                $data['imgEdit'] = $request->file('imgEdit')->store('imagenes', 'public');
            }

            $categoria->update($data);

            return redirect()
                ->route('categoria.index')
                ->with([
                        'type' => 'success',
                        'message' => 'Categoría actualizada correctamente'
                    ]);

        } catch (\Exception $e) {
            return back()->with([
                'type' => 'error',
                'message' => 'Error al actualizar la categoría'
            ]);

        }
    }
    public function destroy($id)
    {
        try {

            $categoria = categoriaModel::findOrFail($id);
            $categoria->delete();

            return redirect()
                ->route('categoria.index')
                ->with([
                        'type' => 'success',
                        'message' => 'Categoría eliminada correctamente'
                    ]);

        } catch (QueryException $e) {

            // Error por relación (foreign key)
            if ($e->getCode() == 23000) {
                return back()->with([
                    'type' => 'warning',
                    'message' => 'No se pudo eliminar la categoría porque tiene productos asociados.'
                ]);
            }

            return back()->with([
                'type' => 'error',
                'message' => 'Error al eliminar la categoría.'
            ]);
        }
    }


}

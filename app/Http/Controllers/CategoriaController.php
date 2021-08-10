<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    private $rules = [
        'titulo' => 'required|min:5',
        'cor' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $categorias = Categoria::with('videos')->paginate(10);;
        return response()->json($categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) return response()->json(['erros' => $validator->errors()], 400);

        $categoria = Categoria::create($request->all());
        return response()->json(['categoria' => $categoria], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $categoria = Categoria::find($id);
        return response()->json(['categoria' => $categoria ?? 'Não encontrada.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) return response()->json(['erros' => $validator->errors()], 400);

        $categoria = Categoria::find($id);

        if (!$categoria) return response()->json(['categoria' => 'Categoria não encontrada'], 400);

        $categoria->update($request->all());
        $categoria = Categoria::find($id);
        return response()->json(['categoria' => $categoria]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $status = $categoria->delete();
        return response()->json(['categoria' => $status ? 'Registro removido com sucesso.' : 'Falha ao remover registro.'], $status ? 200 : 400);
    }

}

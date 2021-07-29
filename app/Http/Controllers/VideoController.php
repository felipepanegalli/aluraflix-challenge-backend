<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    private $rules = [
        'titulo' => 'required|min:5',
        'descricao' => 'required|min:5',
        'url' => 'required|min:5|url',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $videos = Video::all();

        return response()->json(['videos' => $videos]);
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

        $video = Video::create($request->all());
        return response()->json(['video' => $video], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $video = Video::find($id);
        return response()->json(['video' => $video ?? 'Não encontrado.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {git init
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) return response()->json(['erros' => $validator->errors()], 400);

        $video = Video::find($id);

        if (!$video) return response()->json(['video' => 'Vídeo não encontrado'], 400);

        $video->update($request->all());
        $video = Video::find($id);
        return response()->json(['video' => $video]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $status = $video->delete();
        return response()->json(['video' => $status ? 'Video removido com sucesso.' : 'Falha ao remover vídeo.'], $status ? 200 : 400);
    }
}

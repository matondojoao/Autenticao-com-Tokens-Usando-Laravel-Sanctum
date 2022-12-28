<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $product=Product::paginate(10);
       return response()->json([
        'data'=>$product
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       try {
           $product= Product::create($request->all());
           return response()->json([
            'msg'=>'Produto criado com sucesso'
        ],200);
       } catch (\Throwable $th) {
           return response()->json([
            'error'=>$th->getMessage()
        ],401);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $product=Product::findOrFail($id);
            return response()->json(['data'=>$product],200);
        } catch (\Throwable $th) {
            return response()->json(['error'=>$th->getMessage()],401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $product=Product::findOrFail($id)->update($request->all());
            return response()->json([
            'msg'=>'Produto atualizado com sucesso'
            ],200);
        } catch (\Throwable $th) {
           return response()->json(['error'=>$th->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

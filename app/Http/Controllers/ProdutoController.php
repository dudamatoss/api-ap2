<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
 //criar
 public function criar(Request $request)
 {
     $validator = Validator::make($request->all(), [
         'nome' => 'required|string|max:200',
         'preco' =>'required|numeric'
     ]);

     if ($validator->fails()) {
         return ApiResponse::error($validator->errors(), 'validation error');
     }

     $customer = Produto::create($request->all());
     return ApiResponse::ok('Produto salvo com sucesso', $customer);
 }
 public function listarTodos()
 {
     $customer = Produto :: all();
     return ApiResponse::ok('Lista de Produtos', $customer);
 }
 //listar pelo id
 public function listarPeloId(int $id)
 {
     $customer = Produto::findOrFail($id);
     return ApiResponse::ok('Produto Selecionado',$customer);
 }
 public function editar(Request $request, int $id)
 {
     $validator = Validator::make($request->all(), [
     'nome' => 'required|string|max:200',
     'preco' =>'required|numeric'
      
     ]);
     if($validator->fails()){
         return ApiResponse::error($validator->errors(), 'validation error');

     }
     $customer = Produto::findOrFail($id);
     $customer->update($request->all());
     
     return ApiResponse::ok('Produto Atualizado Com Sucesso', $customer);
 }
 //remover
 public function remover(Request $request, int $id)
 {
 $customer = Produto::findOrFail($id);
 $customer->delete();

 return ApiResponse::ok('Produto excluido com sucesso',$customer);
 }

}

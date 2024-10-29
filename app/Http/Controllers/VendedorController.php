<?php

namespace App\Http\Controllers;


use App\Models\Vendedor;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendedorController extends Controller
{

    //criar
    public function criar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'cpf' => 'required|numeric',
            'ano_nascimento' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'validation error');
        }

        $customer = Vendedor::create($request->all());
        return ApiResponse::ok('Vendedor salvo com sucesso', $customer);
    }
    //listar todos
    public function listarTodos()
    {
        $customer = Vendedor :: all();
        return ApiResponse::ok('Lista de Vendedores', $customer);
    }
    //listar pelo id
    public function listarPeloId(int $id)
    {
        $customer = Vendedor::findOrFail($id);
        return ApiResponse::ok('Vendedor Selecionado',$customer);
    }
    //editar
    public function editar(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
        'nome' => 'required|string|max:200',
        'cpf' => 'required|numeric',
        'ano_nascimento' => 'required|numeric',   
        ]);
        if($validator->fails()){
            return ApiResponse::error($validator->errors(), 'validation error');

        }
        $customer = Vendedor::findOrFail($id);
        $customer->update($request->all());
        
        return ApiResponse::ok('Vendedor Atualizado Com Sucesso', $customer);
    }

    //remover
    public function remover(Request $request, int $id)
    {
    $customer = Vendedor::findOrFail($id);
    $customer->delete();

    return ApiResponse::ok('Vendedor excluido com sucesso',$customer);
    }


}
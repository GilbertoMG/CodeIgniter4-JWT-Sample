<?php
namespace App\Controllers;

use App\Controllers\Base;

class Clientes extends Base
{

    public function index()
    {
        $clienteModel = model('App\Models\ClientesModel', false);
        $clientes = $clienteModel->findAll();
        return $this->respond($clientes, 200);
    }

    public function edit($id)
    {
        $clienteModel = model('App\Models\ClientesModel', false);
        $cliente = $clienteModel->find($id);
        return $this->respond([
            $cliente
        ], 200);
    }

    public function delete($id)
    {
        $clienteModel = model('App\Models\ClientesModel', false);

        if ($clienteModel->delete($id)) {
            return $this->respond([
                'messages' => 'Registro excluido'
            ], 200);
        }
    }

    public function create()
    {
        $clienteModel = model('App\Models\ClientesModel', false);
        $dados = $this->request->getJSON();

        if ($clienteModel->save($dados)) {
            return $this->respond([
                $dados
            ], 201);
        } else {
            return $this->respond([
                'messages' => 'Ocorreu um erro'
            ], 500);
        }
    }
}

<?php
namespace App\Controllers;

use App\Controllers\Base;

class Clientes extends Base
{

    private $model;

    public function __construct()
    {
        $this->model = model('App\Models\ClientesModel', false);
    }

    public function index()
    {
        $clientes = $this->model->findAll();
        return $this->respond($clientes, 200);
    }

    public function edit($id)
    {
        $cliente = $this->model->find($id);
        return $this->respond([
            $cliente
        ], 200);
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            return $this->respond([
                'messages' => 'Registro excluido'
            ], 200);
        }
    }

    public function create()
    {
        $dados = $this->request->getJSON();

        if ($this->model->save($dados)) {
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

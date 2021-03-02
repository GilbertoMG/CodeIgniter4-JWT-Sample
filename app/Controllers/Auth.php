<?php
namespace App\Controllers;

use Firebase\JWT\JWT;
use App\Controllers\Base;

class Auth extends Base
{

    public function index()
    {
        return $this->failUnauthorized('Acesso negado');
    }

    public function create()
    {
        $dados = $this->request->getJSON();

        // Chama o model da autenticação e retorna se válido ou não

        if ($dados->email == 'email@test.com' && $dados->senha == '123') {

            $key = API_KEY;

            $payload = [
                'aud' => 'http://192.168.56.1/estudo-api/api2/public',
                'iat' => time(),
                'nbf' => strtotime('NOW'), // não válido antes de
                'exp' => strtotime('+3 WEEK') // Não válido após
            ];

            $jwt = JWT::encode($payload, $key);

            return $this->respond([
                'userName' => 'Gilberto',
                'token' => $jwt
            ], 201);
        } else {

            return $this->respond([
                'messages' => 'Credenciais inválidas'
            ], 401);
        }
    }
}

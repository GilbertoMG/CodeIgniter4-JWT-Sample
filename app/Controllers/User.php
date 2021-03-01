<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Firebase\JWT\JWT;

class User extends ResourceController
{

    public function index()
    {
        $token = $this->request->getGet('token');
        $key = $this->request->getGet('key');

        return Services::response()->setStatusCode(200)->setJSON([
                    $token,
                    $key
        ]);

        $exampleUser = [
            'id' => $id ?? 0,
            'name' => 'example user ffff',
            'address' => 'example addressfff '
        ];
        // return Services::response()->setStatusCode(200)->setJSON($this->request->getServer());
        /*
         * Access-Control-Allow-Origin: *
         * Access-Control-Allow-Methods: GET, POST, PUT, DELETE
         * Access-Control-Allow-Headers: Authorization
         */
        return $this->response->setHeader('Access-Control-Allow-Origin', '*')
                        ->setHeader('Content-type', 'application/json')
                        ->setHeader('access-control-allow-credentials', true)
                        ->setHeader('Access-Control-Allow-Methods', 'HEAD, POST, PUT, DELETE, CONNECT, OPTIONS, TRACE, PATCH')
                        ->setHeader('Access-Control-Allow-Headers', 'authorization,Origin, X-Requested-With, Content-Type, Accept')
                        ->setHeader('Access-Control-Expose-Headers', 'Access-Token, Uid')
                        ->setStatusCode(200)
                        ->setJSON($exampleUser);

        // return Services::response()->setStatusCode(200)->setJSON($exampleUser);
    }

}

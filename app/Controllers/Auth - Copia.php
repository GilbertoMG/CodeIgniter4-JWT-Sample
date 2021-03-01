<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Firebase\JWT\JWT;

class Auth extends ResourceController
{

	protected $format = 'json';


public function index()
	{
		
		
		// fetch records from db as per requirements
		$exampleUser = [
		[   'id'=>1,
			'name' => 'example user',
			'address' => 'example address',
			'sou o auth get'=>'simmmmmmm'
		],
		[   'id'=>2,
			'name' => 'example user 2',
			'address' => 'example address',
			'sou o auth get'=>'simmmmmmm'
		],
		];
		/*
		if ($id != null) {
			$exampleUser['id'] = $id;
		}
		*/
return Services::response()->setStatusCode(200)->setJSON($exampleUser);
		//return $this->respond($exampleUser, 200);
	}
	public function create()
	{		
	
	
		
		 
		$dados = $this->request->getJSON();	
						
		/**
		 * JWT claim types
		 * https://auth0.com/docs/tokens/concepts/jwt-claims#reserved-claims
		 */

		$email = $dados->email;//$this->request->getPost('email');
		$password = $dados->password;//$this->request->getPost('password');
		
		//$email = $this->request->getPost('email');
		//$password = $this->request->getPost('password');
		
		// add code to fetch through db and check they are valid
		// sending no email and password also works here because both are empty
		if ($email == 'gilbmg@gmail.com' && $password == '123') {
			$key = Services::getSecretKey();
			$payload = [
				'aud' => 'http://localhost/estudo-api/api2/public/api/',
				'iat' => 1356999524,
				'nbf' => 1357000000,
			];

			/**
			 * IMPORTANT:
			 * You must specify supported algorithms for your application. See
			 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
			 * for a list of spec-compliant algorithms.
			 */
			$jwt = JWT::encode($payload, $key);
			//return $this->respond(['token' => $jwt], 200);
		return $this->response
		->setHeader('Access-Control-Allow-Origin','*')
		->setHeader('Content-type','application/json')
		->setHeader('access-control-allow-credentials',true)		
		->setHeader('Access-Control-Allow-Methods', 'HEAD, POST, PUT, DELETE, CONNECT, OPTIONS, TRACE, PATCH')
		->setHeader('Access-Control-Allow-Headers','Custom-Header,Origin, X-Requested-With, Content-Type, Accept')
		->setHeader('Access-Control-Expose-Headers','Authorization,Access-Token, Uid')
		->setStatusCode(200)->setJSON(['cliente_id'=>1315464698,'id'=>1,'name'=>'Gilberto','token' => $jwt]);	
		
		return Services::response()->setStatusCode(200)->setJSON(['cliente_id'=>1315464698,'id'=>1,'name'=>'Gilberto','token' => $jwt]);
		}
        return Services::response()->setStatusCode(401)->setJSON(['message' => 'Erro no login, verifique seus dados' . $email . ' '. $password ]);
		
	}
}

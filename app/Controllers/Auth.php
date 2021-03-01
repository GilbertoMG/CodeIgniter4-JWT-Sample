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
		/*
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
		
		
        return $this->respond($exampleUser);
		*/
		
		//dbug
		//return $this->respondCreated(['status'=>401,$this->request->getServer(),$this->request->getJSON()]);
		
		$dados = $this->request->getJSON();
				
		// Chama o model da autenticação e retorna se válido ou não
		
		if ($dados->email == 'gilbmg@gmail.com' && $dados->senha == '123') {
			
			$key = API_KEY;
			
			$payload = [
				'aud' => 'http://192.168.56.1/estudo-api/api2/public',
				'iat' => time(),
				'nbf' => strtotime('NOW'),
				'exp' => strtotime('+3 WEEK')
			];

		    $jwt = JWT::encode($payload, $key);
					
			
			//return $this->respondCreated(['cliente_id'=>1315464698,'id'=>1,'name'=>'Gilberto','token' => $jwt]);
			//return $this->respondCreated(['userName'=>'Gilberto','token' => $jwt],201);
			//return Services::response()->setStatusCode(201)->setJSON(['userName'=>'Gilberto','token' => $jwt]);
			return $this->respond(['userName'=>'Gilberto','token' => $jwt],201);
			
		} else {
			
			return $this->respond(['messages' => $this->request->getJSON()],401);
			//return $this->respondCreated(['status'=>401,'dados'=>$this->request->getServer(),'token' => '']);
			//return $this->failUnauthorized('Credenciais inválidas');
		}		
	}	
    
}
<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;
use Firebase\JWT\JWT;

class AuthFilter implements FilterInterface
{


	public function before(RequestInterface $request,$arguments = null)
	{
		
		//die('caiu no filtro');
				
		$key = API_KEY;
		
		$authHeader = $request->getServer('HTTP_AUTHORIZATION');
		
		//return Services::response()->setStatusCode(200)->setJSON(['messages'=>$request->getServer()]);
		
		if ($authHeader == null) {
			
		    return Services::response()->setStatusCode(401)->setJSON(['messages'=>'token inexistente']);
           			
		 
		}
		
		try
		{
			JWT::decode(trim($authHeader), $key, ['HS256']);
			
			//var_dump(JWT::decode($authHeader, $key, ['HS256']));
			
			//JWT::decode($token, $key, ['HS256']);
		}
		catch (\Exception $e)
		{
			
			return Services::response()->setStatusCode(401)->setJSON(['messages'=>'Invalid token','token'=>$request->getServer('HTTP_AUTHORIZATION')]);
			
		}		
		
	}

	//--------------------------------------------------------------------
   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		// Do something here
	}
}

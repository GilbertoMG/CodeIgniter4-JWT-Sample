<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;
use Firebase\JWT\JWT;
use CodeIgniter\API\ResponseTrait;

class AuthFilter implements FilterInterface
{
	use ResponseTrait;

	public function before(RequestInterface $request,$arguments = null)
	{
		
		$key        = Services::getSecretKey();
		
		$authHeader = $request->getServer('HTTP_AUTHORIZATION');
		
		if ($authHeader == null) {
			
			return Services::response()->setStatusCode(401)->setJSON(['message'=>'token inexistente']);
			die();
			
		 
		}
		/*
		$arr        = explode(' ', $authHeader);
		$token      = $arr[1];
        */
		
		
		try
		{
			JWT::decode($authHeader, $key, ['HS256']);
			//var_dump(JWT::decode($authHeader, $key, ['HS256']));
			
			//JWT::decode($token, $key, ['HS256']);
		}
		catch (\Exception $e)
		{
			return Services::response()->setJSON(['message'=>'Invalid token']);
			die();
			//return Services::response()->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
		}
	}

	//--------------------------------------------------------------------
   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		// Do something here
	}
}

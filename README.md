# CodeIgniter4-JWT-Basic-Sample

CodeIgniter 4 JWT Exemplo Simples

[POST] hostcwb.com.br/webservice/public/auth para teste de login - [POST] json data 

Enviar Header Content-Type:application/json

{
"email":"email@test.com",
"senha":"123"
}


Checagem do token em \App\Filters\AuthFilter.php

Enviar Header Authorization:token + Content-Type:application/json

[GET] hostcwb.com.br/webservice/public/clientes para listagem de clientes

[GET] hostcwb.com.br/webservice/public/produtos para listagem de produtos

Use resource routes em CI 4. Veja https://codeigniter.com/user_guide/incoming/restful.html?highlight=resource#resource-routes

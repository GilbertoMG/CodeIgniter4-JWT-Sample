# CodeIgniter4-JWT-Basic-Sample

CodeIgniter 4 JWT Exemplo Simples

[POST] hostcwb.com.br/webservice/public/auth para teste de login - [POST] json data 

{
"email":"email@test.com",
"senha":"123"
}


Checagem do token em \App\Filters\AuthFilter.php

Enviar Header Authorization + token

[GET] hostcwb.com.br/webservice/public/clientes para listagem de clientes

Use resource routes em CI 4. Veja https://codeigniter.com/user_guide/incoming/restful.html?highlight=resource#resource-routes

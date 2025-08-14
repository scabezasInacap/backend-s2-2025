<?php

// configuracion general de mi API

$_metodo = $_SERVER['REQUEST_METHOD']; //get, post, put, patch, delete
$_uri = $_SERVER['REQUEST_URI']; //lo que esta despues del host

header("Access-Control-Allow-Origin: *"); // restriccion de acceso desde otros servidores
header("Access-Control-ALlow-Methods: GET"); // metodos permitidos
header("Content-Type: application/json; charset=UTF-8");

//Authorization Bearer
// capturamos el header que nos deberia llegar desde el front
$_header = null;
try {
    if (isset(getallheaders()['Authorization'])) {
        $_header = getallheaders()['Authorization'];
    }
    if ($_header === null) {
        throw new Exception('No tiene autorizacion');
    }
} catch (Exception $e) {
    http_response_code(401); // el codigo 401 en http significa no autorizado
    echo json_encode(['error' => $e->getMessage()]);
    die();
}

//Tokens
$_token_get_servicios = 'Bearer inacap';
$_token_get_nosotros = 'Bearer inacap';
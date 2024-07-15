<?php

function view($templateName, $data = array(), $statusCode = 200)
{
	http_response_code($statusCode);
	extract($data);
	require 'views/' . $templateName . '.php';
}

function redirect($path, $statusCode = 200)
{
	http_response_code($statusCode);
	header("Location: $path");
	exit;
}

// function validateJSONData($inputData = null)
// {
// 	if ($inputData === null && json_last_error() !== JSON_ERROR_NONE) {
// 		Response::badRequest("Error decoding JSON data")->send();
// 	}
// }

// function getJSONData()
// {
// 	$inputData = json_decode(file_get_contents("php://input"));
// 	validateJSONData($inputData);
// 	return $inputData;
// }

function generateRandomToken($length = 64)
{
	$randomBytes = random_bytes($length);
	$token = bin2hex($randomBytes);
	return $token;
}

// function exceptionHandler($exception)
// {
// 	if ($exception instanceof InvalidArgumentException) {
		
// 	} else {
// 		Response::serverError($exception->getMessage())->send();
// 	}
// }

// // Регистриране на exceptionHandler като handler за изключения
// set_exception_handler("exceptionHandler");

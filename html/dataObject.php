<?php

$objeto = new stdClass();
$objeto->usuario = $_POST["usuario"];
$objeto->numero = 1 ;
$objeto->nombre = "prueba ";

$objeto->otros_datos = array("primero", "segundo", "tercero");


echo json_encode($objeto);
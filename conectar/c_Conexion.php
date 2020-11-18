<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Conexion {
    public static function Conectar() {
        define('servidor','192.99.46.110');
        define('nombre_bd','reality2_postalmarketing');
        define('usuario','postalmarketing');
        define('password','Samsung5#');
        

        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password,$opciones);
            return $conexion;
        }catch (Exception $e){
            die("el error de Conexion es: ". $e->getMessage());
        }
    }
}





?>
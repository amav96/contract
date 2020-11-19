<?php 

class PersonaCliente {

    public $identificacion;
    public $codigoPostalBusco;
    public $nombreCliente;
    public $provinciaCliente;
    public $direccionCliente;
    public $localidadCliente;
    public $emailCliente;
    public $horaRecogida;
    public $diaRecogida;
    public $cantidadRecogida;
    public $caracteristicaRecogida;
    public $numeroRecogida;
    public $domicilioAltRecogida;
    public $emailAltRecogida;
    
    public $fechaE;
    

    public function __construct(){

        $this->identificacion=$_POST["identificacionBusco"];
        $this->codigoPostalBusco=$_POST["codigoPostalBusco"];
        $this->nombreCliente=$_POST["nombreCliente"];
        $this->provinciaCliente=$_POST["provinciaCliente"];
        $this->direccionCliente=$_POST["direccionCliente"];
        $this->localidadCliente=$_POST["localidadCliente"];
        $this->emailCliente=$_POST["emailCliente"];
        $this->horaRecogida=$_POST["horaRecogida"];
        $this->diaRecogida=$_POST["diaRecogida"];
        $this->cantidadRecogida=$_POST["cantidadRecogida"];
        $this->caracteristicaRecogida=$_POST["caracteristicaRecogida"];
        $this->numeroRecogida=$_POST["numeroRecogida"];
        $this->domicilioAltRecogida=$_POST["domicilioAltRecogida"];
        $this->emailAltRecogida=$_POST["emailAltRecogida"];
        $this->fechaE=$_POST["fechaE"];
        

    }
}


?>
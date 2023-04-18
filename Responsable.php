<?php
/**
*Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, 
*numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. 
*También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV
*que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable
*de realizar el viaje.


*(1)Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero.
*(2)Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos.
*(3)Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. 
*(4)De la misma forma cargue la información del responsable del viaje.
 */

class Responsable{

    //ATRIBUTOS
    private $nombreResp;
    private $apellidoResp;
    private $numeroEmpleado;
    private $numeroLicencia;


    //METODOS
    public function __construct($nombre, $apellido, $numEmpleado, $numLicencia){
        $this->nombreResp = $nombre;
        $this->apellidoResp = $apellido;
        $this->numeroEmpleado = $numEmpleado;
        $this->numeroLicencia = $numLicencia;
    }


    //PARA PODER VER
    public function getNombreResp(){
        return $this->nombreResp;
    }

    public function getApellidoResp(){
        return $this->apellidoResp;
    }

    public function getNumeroEmpleado(){
        return $this->numeroEmpleado;
    }

    public function getNumeroLicencia(){
        return $this->numeroLicencia;
    }


    //PARA PODER MODIFICAR
    public function setNombreResp($nombre){
        $this->nombreResp = $nombre;
    }

    public function setApellidoResp($apellido){
        $this->apellidoResp = $apellido;
    }

    public function setNumeroEmpleado($nroEmpleado){
        $this->numeroEmpleado = $nroEmpleado;
    }

    public function setNumeroLicencia($nroLicencia){
        $this->numeroLicecia = $nroLicencia;
    }


    //PARA IMPRIMIR
    public function __toString(){
        $cadena = "\nNOMBRE RESPONSABLE: " . $this->getNombreResp()."|".
                  " APELLIDO RESPONSABLE: " . $this->getApellidoResp()."|".
                  " NUMERO DE EMPLEADO: " . $this->getNumeroEmpleado()."|".
                  " NUMERO DE LICENCIA: " . $this->getNumeroLicencia()."|" ;
        
        return $cadena;
    }
}
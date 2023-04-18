<?php
/**
*Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, 
*numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. 
*También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV
*que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable
*de realizar el viaje.


*Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero.
*Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos.
*Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información 
*del responsable del viaje.
*/

/**
 * profe la coleccion de pasajeros se crea en la nueva clase pasajero? o lo creamos en la clase viaje con la info de la clase pasajero
 *Malapi — hoy a las 19:18
 *Se crea en la clase viaje, poniendo objeto de tipo pasajero en su colección,  en lugar del array asociativo que se usaba antes
 */

class Pasajero{

    //ATRIBUTOS
    private $nombre;
    private $apellido;
    private $nroDocumento;
    private $telefono;


    //METODOS
    public function __construct($nombre, $apellido, $nroDocumento, $telefono){
        $this->nombre= $nombre;
        $this->apellido= $apellido;
        $this->nroDocumento= $nroDocumento;
        $this->telefono= $telefono;

    }
    
    //PARA PODER VER
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getNroDocumento(){
        return $this->nroDocumento;
    }
    public function getTelefono(){
        return $this->telefono;
    }


    //PARA PODER MODIFICAR
    public function setNombre($nombreNuevo){
        $this->nombre = $nombreNuevo;
    }
    public function setApellido($apellidoNuevo){
        $this->apellido = $apellidoNuevo;
    }
    public function setNroDocumento($dni){
        $this->nroDocumento = $dni;
    }
    public function setTelefono($tel){
        $this->telefono = $tel;
    }

 /** 
  * public function mostrarPasajeros($pasajeros){
        *tring $arregloPasajeros
        *$arregloPasajeros = null;
        *for ($i=0; $i < (count($this->pasajeros)) ; $i++) { 
         *   $nombre= $this->pasajeros[$i]['nombre'];
          *  $apellido= $this->pasajeros[$i]['apellido'];
           * $dni= $this->pasajeros[$i]['dni'];
            *$telefono= $this->pasajeros[$i]['telefono'];
            *$arregloPasajeros = $arregloPasajeros . "PASAJERO N: " . $i ."\nNOMBRE: " . $nombre . "\nAPELLIDO: " . $apellido.
            *"\nNUMERO DE DOCUMENTO: " . $dni . "\nTELEFONO: " . $telefono;
        *}
        *return $arregloPasajeros;
    }*/
    


    public function __toString(){
        $cadena = "\nNOMBRE: " . $this->getNombre()."|". 
                  " APELLIDO: " . $this->getApellido()."|".
                  " NUMERO DE DOCUMENTO: " . $this->getNroDocumento()."|".
                  " TELEFONO: " . $this->getTelefono()."|" ;
        return $cadena;
    }
}
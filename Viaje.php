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

 class Viaje{

    //ATRIBUTOS
    private $codigoViaje;
    private $destinoViaje;
    private $cantidadMax;
    private $coleccionPasajeros;
    private $objResponsable;


    //metodos
    public function __construct($codigoViaje, $destinoViaje, $cantidadMax, $pasajeros, $responsable){
        $this->codigoViaje = $codigoViaje;
        $this->destinoViaje = $destinoViaje;
        $this->cantidadMax = $cantidadMax;
        $this->coleccionPasajeros = $pasajeros;
        $this->objResponsable = $responsable;
    }


    //PARA PODER VER
    public function getCodigoViaje(){
        return $this->codigoViaje;
    }


    public function getDestinoViaje(){
        return $this->destinoViaje;
    }


    public function getCantidadMax(){
        return $this->cantidadMax;
    }


    public function getColeccionPasajeros (){
        return $this->coleccionPasajeros;
    }


    public function getObjResponsable(){
        return $this->objResponsable;
    }


    //PARA PODER MODIFICAR
    public function setCodigoViaje ($codigo){
        $this->codigoViaje =  $codigo;
    }


    public function setDestinoViaje ($destino){
        $this->destinoViaje =  $destino;
    }


    public function setCantidadMax ($cantMax){
        $this->cantidadMax =  $cantMax;
    }


    public function setColeccionPasajeros ($pasajeros){
        $this->coleccionPasajeros =  $pasajeros;
    }


    public function setObjResponsable ($responsa){
        $this->objResponsable =  $responsa;
    }



    public function verificarNumeroEmpleado($numeroEmpleado){
        //bolean $numeroIgual
        $numeroIgual = false;
        if ($numeroEmpleado == ($this->getObjResponsable())->getNumeroEmpleado()){
            $numeroIgual = true;
        }
        
        return $numeroIgual;
    }



    public function mostrarPasajeros($coleccionPasajeros){
        //string $arregloPasajeros
        $arregloPasajeros = null;
        for ($i=0; $i < (count($this->coleccionPasajeros)) ; $i++) { 
            $pasajero = $this->coleccionPasajeros[$i];
            $arregloPasajeros = $arregloPasajeros . $pasajero;
        }
        return $arregloPasajeros;
    }


    public function buscarPasajero($dniBuscado){
        //boolean $encontrado
        $encontrado = false;
        $i = 0;
        //($this->getObjResponsable())->getNumeroEmpleado()
        while($i<count($this->getColeccionPasajeros()) && !$encontrado){
            $colPasajeros = $this->getColeccionPasajeros()[$i];
            if($dniBuscado == $colPasajeros->getNroDocumento()){
                $encontrado = true;
            }
            $i++;
        }
        return $encontrado;
    }


    public function modificarDatosPasajero($dniBuscado, $nombre, $apellido, $telefono){
        $encontrado = false;
        $i = 0;
        while($i<count($this->getColeccionPasajeros()) && !$encontrado){
            $colPasajeros = $this->getColeccionPasajeros()[$i];
            if($dniBuscado == $colPasajeros->getNroDocumento()){
                $encontrado = true;
                $coleccionPasajeros[$i]->setNombre($nombre);
                $coleccionPasajeros[$i]->setApellido($apellido);
                $coleccionPasajeros[$i]->setTelefono($telefono);
            }
            $i++;
        }
        return $coleccionPasajeros;
    }


    public function __toString(){
        //string $arregloPasajeros
        $arregloPasajeros = null;
        for ($i=0; $i < (count($this->coleccionPasajeros)) ; $i++) { 
            $pasajero = $this->coleccionPasajeros[$i];
            $arregloPasajeros = $arregloPasajeros . $pasajero;
        }

        $cadena = "\nCODIGO DE VIAJE: " .$this->getCodigoViaje().
                  "\nDESTINO: " .$this->getDestinoViaje().
                  "\nCANTIDAD MAXIMA DE PASAJEROS: " .$this->getCantidadMax(). "\n".
                  "\nCOLECCION DE PASAJEROS: " . $arregloPasajeros . "\n" . 
                  "\nRESPONSABLE DEL VIAJE: " .$this->getObjResponsable(). "\n";
        return $cadena;

    }
 }
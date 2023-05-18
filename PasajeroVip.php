<?php
include_once('Pasajero.php');

class PasajeroVIP extends Pasajero{

    private $numViajeroFrecuente;
    private $cantMillasPasajero;


    public function __construct($numeroViajero, $cantidadMillas,$nombre, $apellido, $nroDocumento, $telefono, $numAsiento, $numTicket, $costo){
        $this->numViajeroFrecuente = $numeroViajero;
        $this->cantMillasPasajero = $cantidadMillas;
        parent:: __construct($nombre, $apellido, $nroDocumento, $telefono, $numAsiento, $numTicket, $costo);
    }

    
    public function getNumViajeroFrecuente(){
        return $this->numViajeroFrecuente;
    }

    public function getCantMillasPasajero(){
        return $this->cantMillasPasajero;
    }


    public function setNumViajeroFrecuente($numViajero){
        $this->numViajeroFrecuente = $numeroViajero;
    }

    public function setCantMillasPasajero($cantMillas){
        $this->cantMillasPasajero = $cantMillas;
    }


    public function darPorcentajeIncremento(){
        if($this->getCantMillasPasajero>300){
            $incremento = $this->getCosto() + ($this->getCosto()*0.30);
            $this->setCosto($incremento);
        }
        else{
            $incremento = $this->getCosto() + ($this->getCosto()*0.35);
            $this->setCosto($incremento);
        }
        return $this->getCosto();
    }


    public function __toString(){
        $cadena = parent::__toString();
        $cadena.= "\nNUMERO DE VIAJERO FRECUENTE: " .$this->getNumViajeroFrecuente(). "|".
                  "CANTIDAD DE MILLAS DE PASAJERO: " .$this->getCantMillasPasajero()."|";
        return $cadena;
    }

}
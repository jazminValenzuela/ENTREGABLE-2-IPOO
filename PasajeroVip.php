<?php

class PasajeroVIP extends Pasajero{

    private $numViajeroFrecuente;
    private $cantMillasPasajero;


    public function __construct($numeroViajero, $cantidadMillas, $nombre, $numAsiento, $numTicket){
        $this->numViajeroFrecuente = $numeroViajero;
        $this->cantMillasPasajero = $cantidadMillas;
        parent:: __construct($nombre, $numAsiento, $numTicket);
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


    public function __toString(){
        $cadena = parent::__toString();
        $cadena.= "\nNUMERO DE VIAJERO FRECUENTE: " .$this->getNumViajeroFrecuente().
                  "\nCANTIDAD DE MILLAS DE PASAJERO: " .$this->getCantMillasPasajero();
        return $cadena;
    }

}
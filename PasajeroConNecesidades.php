<?php

class PasajeroConNecesidades extends Pasajero{  
    //variables booleanas
    private $sillaDeRueda;
    private $asistenciaEmbarque;
    private $comidaEspecial;

    public function __construct($sillaDeRueda, $asistenciaEmbarque, $comidaEspecial, $nombre, $apellido, $nroDocumento, $telefono, $numAsiento, $numTicket, $costo){
        $this->sillaDeRueda= $sillaDeRueda;
        $this->asistenciaEmbarque= $asistenciaEmbarque;
        $this->comidaEspecial= $comidaEspecial;
        parent::__construct($nombre, $apellido, $nroDocumento, $telefono, $numAsiento, $numTicket, $costo);
    }

    public function getSillaDeRueda(){
        return $this->sillaDeRueda;
    }
    public function getAsistenciaEmbarque(){
        return $this->asistenciaEmbarque;
    }
    public function getComidaEspecial(){
        return $this->comidaEspecial;
    }


    public function setSillaDeRueda($sillaDeRueda){
        $this->sillaDeRueda= $sillaDeRueda;
    }
    public function setAsistenciaEmbarque($asistenciaEmbarque){
        $this->asistenciaEmbarque= $asistenciaEmbarque;
    }
    public function setComidaEspecial($comidaEspecial){
        $this->comidaEspecial= $comidaEspecial;
    }


    public function __toString(){
        $cadena = parent::__toString();
        $cadena.= "\nSILLA DE RUEDA: " .$this->getSillaDeRueda(). "|".
                 "ASISTENCIA DE EMBARQUE Y DESEMBARQUE: " .$this->getAsistenciaEmbarque(). "|".
                 "COMIDA ESPECIAL: " .$this->getComidaEspecial(). "|";
        return $cadena;
    }
}
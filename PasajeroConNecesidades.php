<?php
include_once('Pasajero.php');

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


    public function darPorcentajeIncremento(){
        if($this->getSillaDeRueda()== true && $this->getAsistenciaEmbarque()==true && $this->getComidaEspecial()==true){
            $incremento = $this->getCosto() + ($this->getCosto()*0.30);
            $this->setCosto($incremento);
        }
        elseif($this->getSillaDeRueda()== true && $this->getAsistenciaEmbarque()==false && $this->getComidaEspecial()==false){
            $incremento = $this->getCosto() + ($this->getCosto()*0.15);
            $this->setCosto($incremento);
        }
        elseif($this->getSillaDeRueda()== false && $this->getAsistenciaEmbarque()==false && $this->getComidaEspecial()==true){
            $incremento = $this->getCosto() + ($this->getCosto()*0.15);
            $this->setCosto($incremento);
        }
        elseif($this->getSillaDeRueda()== false && $this->getAsistenciaEmbarque()==true && $this->getComidaEspecial()==false){
            $incremento = $this->getCosto() + ($this->getCosto()*0.15);
            $this->setCosto($incremento);
        }
        else{
            $incremento = $this->getCosto() + ($this->getCosto()*0.30);
            $this->setCosto($incremento);
        }
        return $this->getCosto();
    }


    public function __toString(){
        $cadena = parent::__toString();
        if($this->getSillaDeRueda()==true){
            $this->setSillaDeRueda("SI");
        }
        elseif ($this->getSillaDeRueda()==false) {
            $this->setSillaDeRueda("NO");
        }
        if($this->getAsistenciaEmbarque()==true){
            $this->setAsistenciaEmbarque("SI");
        }
        elseif ($this->getAsistenciaEmbarque()==false) {
            $this->setAsistenciaEmbarque("NO");
        }
        if($this->getComidaEspecial()==true){
            $this->setComidaEspecial("SI");
        }
        elseif ($this->getComidaEspecial()==false) {
            $this->setComidaEspecial("NO");
        }

        $cadena.= "\nSILLA DE RUEDA: " .$this->getSillaDeRueda(). "|".
                 "ASISTENCIA DE EMBARQUE Y DESEMBARQUE: " .$this->getAsistenciaEmbarque(). "|".
                 "COMIDA ESPECIAL: " .$this->getComidaEspecial(). "|";
        return $cadena;
    }
}
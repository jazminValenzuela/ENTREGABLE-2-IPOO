<?php
include_once('Viaje.php');
include_once('PasajeroConNecesidades.php');
include_once('PasajeroVip.php');
include_once('Responsable.php');
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

 /**
  * MENU DE OPCIONES
  * return int
  */
  function menu(){
     //int $eleccion
     echo "\n*******************MENÚ DE OPCIONES*******************\n" ;
     echo "1.MODIFICAR DATOS DEL PASAJERO \n";
     echo "2.AGREGAR PASAJEROS AL VIAJE \n";
     echo "3.CARGAR LA INFORMACION DEL RESPONSABLE DEL VIAJE \n";
     echo "4.MOSTRAR INFORMACION COMPLETA \n";
     echo "5.SALIR \n";
     echo "\nIngrese su opción: ";
     $eleccion = trim(fgets(STDIN));
     return $eleccion;
  }


  $objPasajero1 = new PasajeroVip(3591, 900, "jazmin", "valenzuela", 43530680, 2994584611, 101, 159753, 15000);
  $objPasajero2 = new PasajeroVip(4257,250, "nicolas", "torres", 43575236, 2994448596, 102, 159723, 14000);
  $objPasajero3 = new PasajeroConNecesidades(false, true, true, "nicolas", "bucarey", 41911258, 2994573646, 131, 159798, 10000);
  $objPasajero4 = new PasajeroConNecesidades(true, false, true, "victoria", "gimenez", 42457832, 2992563144, 141, 159003, 17000);
  
  $arregloPasajeros=[];
  $arregloPasajeros[0]= $objPasajero1;
  $arregloPasajeros[1]= $objPasajero2;
  $arregloPasajeros[2]= $objPasajero3;
  $arregloPasajeros[3]= $objPasajero4;


  $objResponsable =  new Responsable("juan", "torres", 4322, 43530);


  $objViaje = new Viaje(46598, "brasil", 10, $arregloPasajeros, $objResponsable);

  
  do{
    $eleccion = menu();
    switch ($eleccion) {
        case 1:
            echo $objViaje->mostrarPasajeros($arregloPasajeros)."\n";
            echo "\nINGRESE EL DNI DEL PASAJERO QUE DESEA MODIFICAR: ";
            $dniBuscado = trim(fgets(STDIN));
            $encontro = $objViaje->buscarPasajero($dniBuscado);
            if($encontro){
                echo "PASAJERO ENCONTRADO!\n";
                echo "MODIFICAR NOMBRE: ";
                $nombreNuevo=trim(fgets(STDIN));
                echo "MODIFICAR APELLIDO: ";
                $apellidoNuevo=trim(fgets(STDIN));
                echo "MODIFICAR TELEFONO: ";
                $telefonoNuevo=trim(fgets(STDIN));
                $arregloModificado= $objViaje->modificarDatosPasajero($dniBuscado, $nombreNuevo, $apellidoNuevo, $telefonoNuevo);
                echo "\nARREGLO MODIFICADO\n". $objViaje->mostrarPasajeros($arregloModificado);
            }
            else{
                echo "NO SE ENCONTRO A UN PASAJERO CON ESE DNI!\n";
            }
            break;

        case 2:
            echo "INGRESE LA CANTIDAD DE PASAJEROS QUE DESEA AGREGAR: ";
            $cantPasajeros = trim(fgets(STDIN));

            for ($i=0; $i < $cantPasajeros ; $i++) {
                echo "INGRESE NOMBRE: ";
                $nombre = trim(fgets(STDIN));
                echo "INGRESE APELLIDO: ";
                $apellido = trim(fgets(STDIN));
                echo "INGRESE NRO DOCUMENTO: ";
                $dni = trim(fgets(STDIN));
                while($objViaje->buscarPasajero($dni)){
                    echo "el dni ingresado ya se encuentra, por favor ingresar otro: ";
                    $dni = trim(fgets(STDIN));
                }
                echo "INGRESE TELEFONO: ";
                $telefono = trim(fgets(STDIN));
                $objPasajero5 = new Pasajero($nombre, $apellido, $dni, $telefono);
                $arregloPasajeros[]=$objPasajero5;
                $objViaje->setColeccionPasajeros($arregloPasajeros);
            }

            echo "\nARREGLO MODIFICADO\n". $objViaje->mostrarPasajeros($arregloPasajeros);
            break;

        case 3:
            echo "******MODIFIQUE LOS DATOS DEL RESPONSABLE DEL VIAJE******";
            echo "\nMODIFICAR NOMBRE DEL RESPONSABLE: ";
            $nombreResp = trim(fgets(STDIN));
            echo "MODIFICAR APELLIDO DEL RESPONSABLE: ";
            $apellidoResp = trim(fgets(STDIN));
            echo "MODIFICAR NUMERO DE EMPLEADO: ";
            $numeroEmpleado = trim(fgets(STDIN));
            while($objViaje->verificarNumeroEmpleado($numeroEmpleado)){
                echo "el número de empleado ingresado es igual al anterior, por favor ingresar otro: ";
                $numeroEmpleado = trim(fgets(STDIN));
            }
            echo "MODIFICAR NUMERO DE LICENCIA: ";
            $numeroLicencia = trim(fgets(STDIN));
            $objResponsable = new Responsable($nombreResp, $apellidoResp, $numeroEmpleado, $numeroLicencia);
            $objViaje->setObjResponsable($objResponsable);
            echo "\nLOS DATOS DEL RESPONSABLE HAN SIDO MODIFICADOS CON EXITO\n";
            echo "\n". $objViaje->getObjResponsable();
            break;

        case 4:
            echo "\n" . $objViaje ;
            break;
        
    }
  }while($eleccion!=5);


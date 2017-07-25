<?php

require_once (__DIR__.'/../Modelo/aerolinea.php');

if(!empty($_GET['action'])){
    AerolineaController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
    }

class AerolineaController
{
    static function main($action){
        if ($action == "crear"){
            AerolineaController::crear();
        }else if ($action == "editar"){
            AerolineaController::editar();
        }else if ($action == "buscarID"){
            AerolineaController::buscarID();
        }else if ($action == "gestionarAerolinea"){
            AerolineaController::gestionarAerolinea();

        }
    }

    static public function crear ()
    {
        
        try {
            $arrayAerolinea = array();
            $arrayAerolinea['Razon_Social'] = $_POST['Razon_Social'];
            $arrayAerolinea['Nit'] = $_POST['Nit'];
            $arrayAerolinea['Direccion'] = $_POST['Direccion'];
            $arrayAerolinea['Correo'] = $_POST['Correo'];
            $arrayAerolinea['Telefono'] = $_POST['Telefono'];
            $Aerolinea = new aerolinea ($arrayAerolinea);
            $Aerolinea->insertar();
            header("Location: ../Vista/crearAerolinea.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/crearAerolinea.php?respuesta=error");
        }
    }


    static public function editar (){
        try {
            $arrayVacuna = array();
            $arrayVacuna['Nombre'] = $_POST['Nombre'];
            $arrayVacuna['Laboratorio'] = $_POST['Laboratorio'];
            $arrayVacuna['idVacuna'] = $_POST['idVacuna'];
            $vacuna = new Vacuna($arrayVacuna);
            var_dump($arrayVacuna);
            $vacuna->editar();
            //header("Location: ../Vista/editarEspecialidad.php?respuesta=correcto");
        } catch (Exception $e) {
            //header("Location: ../Vista/editarEspecialidad.php?respuesta=error");
        }
    }

        static public function buscarID ($id){
            try {
                return aerolinea::buscarForId($id);
            } catch (Exception $e) {
                //header("Location: ../gestionarEspecialidades.php?respuesta=error");
            }
        }


        static public function gestionarAerolinea (){
            $arrayAerolinea = aerolinea::getAll();
            //var_dump($arrayAerolinea);
            $htmlTable ="";

            foreach ($arrayAerolinea as $ObjAerolinea){
                $htmlTable .= "<tr>";
                $htmlTable .= "<td>".$ObjAerolinea->getIdAerolinea()."</td>";
                $htmlTable .= "<td>".$ObjAerolinea->getRazonSocial()."</td>";
                $htmlTable .= "<td>".$ObjAerolinea->getNit()."</td>";
                $htmlTable .= "<td>".$ObjAerolinea->getDireccion()."</td>";
                $htmlTable .= "<td>".$ObjAerolinea->getCorreo()."</td>";
                $htmlTable .= "<td>".$ObjAerolinea->getTelefono()."</td>";
                //$htmlTable .= "<td>";
                //$htmlTable .= "<a class='btn btn-primary'href='crearAerolinea.php'><i class='icon_plus_alt2'></i>Agregar Avion</a>";
                //$htmlTable .= "</td>";
                $htmlTable .= "</tr>";

            }
            return $htmlTable;
       }

        static public function SelectAerolinea ($isRequired=true, $id="idAerolinea", $nombres="idAerolinea", $class=""){
            $arrayAerolinea = aerolinea::getAll(); /*  */
            $htmlSelect = "";
            $htmlSelect .= "<select ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombres."' class='".$class."'>";
            foreach ($arrayAerolinea as $ObjAerolinea){
                $htmlSelect .= "<option value='".$ObjAerolinea->getIdAerolinea()."' id='".$ObjAerolinea->getIdAerolinea()."'>".$ObjAerolinea->getRazonSocial()."</option>";                                                              ;
            }
            $htmlSelect .= "</select>";
            return $htmlSelect;
        }



























}
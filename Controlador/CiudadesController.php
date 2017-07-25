<?php

require_once (__DIR__.'/../Modelo/Ciudades.php');

if(!empty($_GET['action'])){
    CiudadesController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
class CiudadesController
{

    static function main($action){
        if ($action == "crear"){
            CiudadesController::crear();
        }else if ($action == "editar"){
            CiudadesController::editar();
        }else if ($action == "buscarID"){
            CiudadesController::buscarID();
        }else if ($action == "gestionarCiudades"){
            CiudadesController::gestionarCiudades();

        }
    }


    static public function crear()
    {
echo "entro al metodo";
        try {
            $arrayCiudades = array();

            $arrayCiudades['Departamento'] = $_POST['Departamento'];
            $arrayCiudades['Ciudad'] = $_POST['Ciudad'];
            $Ciudades = new Ciudades ($arrayCiudades);
            $Ciudades->insertar();
            header("Location: ../Vista/gestionarCiudades.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarCiudades.php?respuesta=error");
            echo "error";
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
            header("Location: ../Vista/editarEspecialidad.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/editarEspecialidad.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return Vacuna::buscarForId($id);
        } catch (Exception $e) {
            //header("Location: ../gestionarEspecialidades.php?respuesta=error");
        }
    }


    static public function gestionarCiudades(){
        $arrayCiudades = ciudades::getAll();

        $htmlTable ="";

        if (count($arrayCiudades) >=1) {
            foreach ($arrayCiudades as $ObjCiudades) {
                $htmlTable .= "<tr>";
                $htmlTable .= "<td>" . $ObjCiudades->getIdCiudades() . "</td>";
                $htmlTable .= "<td>" . $ObjCiudades->getDepartamento() . "</td>";
                $htmlTable .= "<td>" . $ObjCiudades->getCiudad() . "</td>";
                $htmlTable .= "</tr>";

            }
            return $htmlTable;
        }else{
            $htmlTable .= "<tr style='color: #009da7; background-color: #0e2e42'>";
            $htmlTable .= "<td>No hay Ciudades Disponibles </td>";
            $htmlTable .= "</tr>";
            return $htmlTable;
        }
    }

    static public function SelectCiudades ($isRequired=true, $id="idCiudades", $nombres="idCiudades", $class=""){
        $arrayCiudades = ciudades::getAll(); /*  */
        $htmlSelect = "";
        $htmlSelect .= "<select ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombres."' class='".$class."'>";

        if (count($arrayCiudades)>=1) {
            foreach ($arrayCiudades as $ObjCiudades) {
                $htmlSelect .= "<option value='" . $ObjCiudades->getIdCiudades() . "' id='" . $ObjCiudades->getIdCiudades() . "'>" . $ObjCiudades->getCiudad() . "</option>";;
            }
            $htmlSelect .= "</select>";
            return $htmlSelect;
        }else {
                $htmlSelect .= "<option>No hay Ciudades Disponibles</option>";
                $htmlSelect .= "</select>";
                return $htmlSelect;
            }
    }





}
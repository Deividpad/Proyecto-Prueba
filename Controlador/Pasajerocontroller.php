<?php
session_start();
require_once (__DIR__.'/../Modelo/personal.php');

if(!empty($_GET['action'])){
    PersonaController::main($_GET['action']);
     echo "Hola entro a crear pasajero";
}else{
    echo "No se encontro ninguna accion...";
    }

class PersonaController
{

    static function main($action)
    {

        if ($action == "crear") {
            PersonaController::crear();
        } else if ($action == "editar") {
            PersonaController::editar();
        } else if ($action == "buscarID") {
            PersonaController::buscarID();
        } else if ($action == "gestionarPersonal") {
            PersonaController::gestionarPersonal();

        }
    }

    static public function crear()
    {
       
        //echo "<div>$i<input type='text' name='$proporcion[$i]' value='$i'></div></br> ";
        /*if ($_POST['idPersonal'] == "Seleccione") {
            header("Location: ../Vista/crearPersona.php?respuesta=error");
        } else {


            try {

                $arrayPersonal = array();
                $arrayPersonal['Tipo_Documento'] = $_POST['Tipo_Documento'];
                $arrayPersonal['Documento'] = $_POST['Documento'];
                $arrayPersonal['Nombre'] = $_POST['Nombre'];
                $arrayPersonal['Apellido'] = $_POST['Apellido'];
                $arrayPersonal['Telefono'] = $_POST['Telefono'];
                $arrayPersonal['Direccion'] = $_POST['Direccion'];
                $arrayPersonal['Correo'] = $_POST['Correo'];
                $arrayPersonal['Cargo'] = $_POST['Cargo'];
                $arrayPersonal['Rh'] = $_POST['Rh'];
                $personal = new personal($arrayPersonal);
                // var_dump($personal);
                $personal->insertar();
                header("Location: ../Vista/crearPersona.php?respuesta=correcto");
            } catch (Exception $e) {
                header("Location: ../Vista/crearPersona.php?respuesta=error");

            }

        }*/
    }

    static public function editar()
    {

        try {
            $arrayPersonal = array();
            $arrayPersonal['Tipo_Documento'] = $_POST['Tipo_Documento'];
            $arrayPersonal['Documento'] = $_POST['Documento'];
            $arrayPersonal['Nombre'] = $_POST['Nombre'];
            $arrayPersonal['Apellido'] = $_POST['Apellido'];
            $arrayPersonal['Telefono'] = $_POST['Telefono'];
            $arrayPersonal['Direccion'] = $_POST['Direccion'];
            $arrayPersonal['Correo'] = $_POST['Correo'];
            $arrayPersonal['Cargo'] = $_POST['Cargo'];
            $arrayPersonal['Rh'] = $_POST['Rh'];
            $personal = new personal($arrayPersonal);
            $personal->editar();

        } catch (Exception $e) {
            header("Location: ../Vista/crearPersona.php?respuesta=error");
        }
    }


    static public function buscarID($id)
    {
        try {
            return personal::buscarForId($id);
        } catch (Exception $e) {
           header("Location: ../gestionarPersonal.php?respuesta=error");
        }
    }


    static public function gestionarPersonal()
    {
        $arrayPersonal = personal::getAll();

        $htmlTable = "";

        if (count($arrayPersonal) >=1) {
            foreach ($arrayPersonal as $Objpersonal) {
                $htmlTable .= "<tr>";
                $htmlTable .= "<td>" . $Objpersonal->getNombre() . "</td>";
                $htmlTable .= "<td>" . $Objpersonal->getApellido() . "</td>";
                $htmlTable .= "<td>" . $Objpersonal->getCargo() . "</td>";
                $htmlTable .= " <td> <a class=\"btn btn-success btn-sm\" href=\"asignarVuelos.php\" title=\"Bootstrap 3 themes generator\">Asignar Vuelo</a></td>";
                $htmlTable .= "</tr>";

            }
            return $htmlTable;
        }else{
            $htmlTable .= "<tr style='color: #009da7; background-color: #0e2e42'>";
            $htmlTable .= "<td>No hay Aviones Disponibles </td>";
            $htmlTable .= "</tr>";
            return $htmlTable;
        }
    }

}







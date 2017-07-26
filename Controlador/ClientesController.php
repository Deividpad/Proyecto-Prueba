<?php
session_start();
require_once (__DIR__.'/../Modelo/Clientes.php');

if(!empty($_GET['action'])){
    PersonaController::main($_GET['action']);
     echo "Hola entro a crear pasajero";
}else{
    echo "No se encontro ninguna accion...";
    }

class ClientesController
{

    static function main($action)
    {

        if ($action == "crear") {
            PersonaController::crear();
        } else if ($action == "editar") {
            PersonaController::editar();
        } else if ($action == "buscarID") {
            PersonaController::buscarID();
        } else if ($action == "gestionarClientes") {
            ClientesController::gestionarClientes();

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


    static public function gestionarClientes()
    {
        $arrayClientes = Clientes::getAll();
        $htmlTable = "";

        if (count($arrayClientes) >=1) {
            foreach ($arrayClientes as $Objpersonal) {
                $htmlTable .= "<tr>";
                $htmlTable .= "<td>" . $Objpersonal->getIdPasajero() . "</td>";
                $htmlTable .= "<td>" . $Objpersonal->getDocumento() . "</td>";
                $htmlTable .= "<td>" . $Objpersonal->getNombre() . "</td>";
                $htmlTable .= "<td>" . $Objpersonal->getApellido() . "</td>";
                $htmlTable .= "<td>" . $Objpersonal->getTelefono() . "</td>";
                $htmlTable .= " <td> <a class=\"btn btn-success btn-sm\" href=\"asignarVuelos.php\" title=\"Bootstrap 3 themes generator\">Ir a Tiquete</a></td>";
                $htmlTable .= "</tr>";

            }
            return $htmlTable;
        }else{
            $htmlTable .= "<tr style='color: #009da7; background-color: #0e2e42'>";
            $htmlTable .= "<td>No hay Clientes  </td>";
            $htmlTable .= "</tr>";
            return $htmlTable;
        }
    }

}







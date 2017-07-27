<?php
session_start();
require_once (__DIR__.'/../Modelo/Clientes.php');

if(!empty($_GET['action'])){
    ClientesController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
    }

class ClientesController
{

    static function main($action)
    {

        if ($action == "crear") {
            ClientesController::crear();
        } else if ($action == "editar") {
            ClientesController::editar();
        } else if ($action == "sessionunset") {
            ClientesController::sessionunset();
        } else if ($action == "gestionarClientes") {
            ClientesController::gestionarClientes();

        }
    }

    static public function sessionunset()
    {
        //echo "La variable del ultimo cliente".$_SESSION['idCliente'];

        $_SESSION["idc2"]= $_GET["idc"];
        //header("Location: ../Vista/crearTiquete.php");
    }

    static public function crear()
    {


            try {

                $arrayCliente = array();
                $arrayCliente['Tipo_Documento'] = $_POST['Tipo_Documento'];
                $arrayCliente['Documento'] = $_POST['Documento'];
                $arrayCliente['Nombre'] = $_POST['Nombre'];
                $arrayCliente['Apellido'] = $_POST['Apellido'];
                $arrayCliente['Telefono'] = $_POST['Telefono'];
                $arrayCliente['Direccion'] = $_POST['Direccion'];
                $cliente = new Clientes($arrayCliente);



                // var_dump($personal);
                //$cliente->insertar();
                //$id = Clientes::getid();
                //$_SESSION['idCliente']= $id;

                //$id = Clientes::Ultimoid();
                //echo "El ultimo id".$id;
                //header("Location: ../Vista/crearTiquete.php?respuesta=correcto");
            } catch (Exception $e) {
                //header("Location: ../Vista/crearCliente.php?respuesta=error");
                echo "error";
            }

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
                $htmlTable .= " <td> <a class='btn btn-success btn-sm' href='../Controlador/ClientesController.php?action=sessionunset&idc=".$Objpersonal->getIdPasajero()." ' title='Ir a Tiquete'>Ir a Tiquete</a></td>";
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







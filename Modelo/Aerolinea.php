<?php

require_once('db_abstract_class.php');

class aerolinea extends db_abstract_class
{
    private $idAerolinea;
    Private $Razon_Social;
    private $Nit;
    private $Direccion;
    private $Correo;
    private $Telefono;



    public function __construct($aerolinea_data = array())
    {

        parent::__construct();
        if (count($aerolinea_data) > 1) { //
            foreach ($aerolinea_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        } else {
            $this->idAerolinea = "";
            $this->Razon_Social = "";
            $this->Nit = "";
            $this->Direccion = "";
            $this->Correo = "";
            $this->Telefono = "";
        }
    }

    function __destruct()
    {
        $this->Disconnect();
        unset($this);
    }

    public static function buscarForId($id)
    {
        $idAerolinea = new aerolinea();
        if ($id > 0) {
            $getrow = $idAerolinea->getRow("SELECT * FROM aerolinea WHERE idAerolinea =?", array($id));
            $idAerolinea->idAerolinea = $getrow['idAerolinea'];
            $idAerolinea->Razon_Social = $getrow['Razon_Social'];
            $idAerolinea->Nit = $getrow['Nit'];
            $idAerolinea->Direccion = $getrow['Direccion'];
            $idAerolinea->Correo = $getrow['Correo'];
            $idAerolinea->Telefono = $getrow['Telefono'];
            $idAerolinea->Disconnect();
            return $idAerolinea;
        } else {
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayAerolinea = array();
        $tmp = new aerolinea();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Aerolinea = new aerolinea();
            $Aerolinea->idAerolinea = $valor['idAerolinea'];
            $Aerolinea->Razon_Social = $valor['Razon_Social'];
            $Aerolinea->Nit = $valor['Nit'];
            $Aerolinea->Direccion = $valor['Direccion'];
            $Aerolinea->Correo = $valor['Correo'];
            $Aerolinea->Telefono = $valor['Telefono'];
            array_push($arrayAerolinea, $Aerolinea);
        }
        $tmp->Disconnect();
        return $arrayAerolinea;
    }

    public static function getAll()
    {
        return aerolinea::buscar("SELECT * FROM aerolinea");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO aerolinea.aerolinea VALUES (NULL, ?,?,?,?,?)", array(

                $this->Razon_Social,
                $this->Nit,
                $this->Direccion,
                $this->Correo,
                $this->Telefono,
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE aerolinea.idAerolinea SET Nit = ?,Razon_Social = ? WHERE idAerolinea = ?", array(
            $this->idAerolinea,
            $this->Razon_Social,
            $this->Nit,
            $this->Direccion,
            $this->Correo,
            $this->Telefono,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
    /**
     * @return string
     */
    public function getIdAerolinea()
    {
        return $this->idAerolinea;
    }

    /**
     * @param string $idAerolinea
     */
    public function setIdAerolinea($idAerolinea)
    {
        $this->idAerolinea = $idAerolinea;
    }

    /**
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->Razon_Social;
    }

    /**
     * @param string $Razon_Social
     */
    public function setRazonSocial($Razon_Social)
    {
        $this->Razon_Social = $Razon_Social;
    }

    /**
     * @return string
     */
    public function getNit()
    {
        return $this->Nit;
    }

    /**
     * @param string $Nit
     */
    public function setNit($Nit)
    {
        $this->Nit = $Nit;
    }

    /**
     * @return string
     */
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @param string $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }

    /**
     * @return string
     */
    public function getCorreo()
    {
        return $this->Correo;
    }

    /**
     * @param string $Correo
     */
    public function setCorreo($Correo)
    {
        $this->Correo = $Correo;
    }

    /**
     * @return string
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * @param string $Telefono
     */
    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;
    }

}
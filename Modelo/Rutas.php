<?php
require_once('db_abstract_class.php');

class Rutas extends db_abstract_class
{

    private $idRutas;
    private $Origen;
    private $Destino;
    private $Duracion;
    private $Estado;


    public function __construct($persona_data=array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($persona_data)>1){ //
            foreach ($persona_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idRutas = "";
            $this->Origen = "";
            $this->Destino = "";
            $this->Duracion = "";
            $this->Estado = "";
        }
    }

    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }


    public static function buscarForId($id)
    {

        $Rutas = new Rutas();
        if ($id > 0) {
            $getrow = $Rutas->getRow("SELECT * FROM rutas WHERE idRutas =?", array($id));
            $Rutas->idRutas = $getrow['idRutas'];
            $Rutas->Origen = $getrow['Origen'];
            $Rutas->Destino = $getrow['Destino'];
            $Rutas->Duracion = $getrow['Duracion'];
            $Rutas->Estado = $getrow['Estado'];
            $Rutas->Disconnect();
            return $Rutas;
        } else {
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayRutas = array();
        $tmp = new rutas();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Rutas = new rutas();
            $Rutas->idRutas = $valor['idRutas'];
            $Rutas->Origen = $valor['Origen'];
            $Rutas->Destino = $valor['Destino'];
            $Rutas->Duracion = $valor['Duracion'];
            $Rutas->Estado = $valor['Estado'];
            array_push($arrayRutas, $Rutas);
        }
        $tmp->Disconnect();
        return $arrayRutas;
    }

    public static function getAll()
    {
        return rutas::buscar("SELECT * FROM rutas");
    }

    public function insertar()
    {
        echo "Entro a insertar";
        $this->insertRow("INSERT INTO aerolinea.rutas VALUES (NULL, ?,?,?,?)", array(

                $this->Origen,
                $this->Destino,
                $this->Duracion,
                $this->Estado,
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $arrUser = (array) $this;
        $this->updateRow("UPDATE aerolinea.rutas SET Origen = ?, Destino = ?, Duracion = ?,
          Estado = ? WHERE idRutas = ?", array(
            $this->Origen,
            $this->Destino,
            $this->Duracion,
            $this->Estado,
            $this->idRutas,
        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
    /**
     * @return string
     */
    public function getIdRutas()
    {
        return $this->idRutas;
    }

    /**
     * @param string $idRutas
     */
    public function setIdRutas($idRutas)
    {
        $this->idRutas = $idRutas;
    }

    /**
     * @return string
     */
    public function getOrigen()
    {
        return $this->Origen;
    }

    /**
     * @param string $Origen
     */
    public function setOrigen($Origen)
    {
        $this->Origen = $Origen;
    }

    /**
     * @return string
     */
    public function getDestino()
    {
        return $this->Destino;
    }

    /**
     * @param string $Destino
     */
    public function setDestino($Destino)
    {
        $this->Destino = $Destino;
    }

    /**
     * @return string
     */
    public function getDuracion()
    {
        return $this->Duracion;
    }

    /**
     * @param string $Duracion
     */
    public function setDuracion($Duracion)
    {
        $this->Duracion = $Duracion;
    }

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param string $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }



}


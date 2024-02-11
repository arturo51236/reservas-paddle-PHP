<?php 

class Reserva {
    private $id;
    private $idusuario;
    private $idtramo;
    private $fecha;

    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of idusuario
     */
    public function getIdusuario() {
        return $this->idusuario;
    }

    /**
     * Set the value of idusuario
     */
    public function setIdusuario($idusuario): self {
        $this->idusuario = $idusuario;
        return $this;
    }

    /**
     * Get the value of idtramo
     */
    public function getIdtramo() {
        return $this->idtramo;
    }

    /**
     * Set the value of idtramo
     */
    public function setIdtramo($idtramo): self {
        $this->idtramo = $idtramo;
        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha() {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     */
    public function setFecha($fecha): self {
        $this->fecha = $fecha;
        return $this;
    }
}
?>
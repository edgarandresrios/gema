<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuarios") 
 */
class Usuario {

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(length=45)
     */
    private $nombre;

    /**
     * @ORM\Column(length=45)
     */
    private $apellido;

    /**
     * @ORM\Column(length=45)
     */
    private $email;

    /**
     * @ORM\Column(name="codigo", type="integer")
     */
    private $codigo;

    public function __construct($id = null, $nombre = null, $apellido = null, $email = null, $codigo = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->codigo = $codigo;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getEmail() {
        return $this->email;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

}

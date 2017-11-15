<?php

namespace AppBundle\Servicio;

use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Usuario;

class ValidarArchivo {

    private $errores;
    private $extension;
    private $registros;
    private $cantErr;
    private $usuarios;

    public function __construct($file) {
        $this->cantErr = 0;
        $this->errores = new ArrayCollection;
        $this->extension = $file->guessExtension();
        $this->registros = file($file);
        $this->usuarios = new ArrayCollection;
        $this->validarExtension();
    }

    public function validarExtension() {


        if ($this->getExtension() == "txt") {
            $this->leerArchivo();
        } else {
            $this->addError("La extension del archivo debe ser txt");
        }
    }

    public function addError($error) {
        $this->errores->add($error);
        $this->cantErr++;
    }

    public function leerArchivo() {
        foreach ($this->getRegistros() as $num_reg => $registro) {
            $col = explode(",", $registro);
            if (count($col) != 4) {
                $this->addError("los separadores ',' no estan bien definidos");
                return;
            } else {
                $usr = new Usuario();
                foreach ($col as $key => $value) {
                    $this->validarCampos($value, $key, $num_reg);
                }
                if ($this->getCantErr() == 0) {
                    $usr->setEmail($col[0]);
                    $usr->setNombre($col[1]);
                    $usr->setApellido($col[2]);
                    $usr->setCodigo($col[3]);
                    $this->addUsuario($usr);
                }
            }
        }
    }

    public function validarCampos($value, $key, $num_reg) {
        if ($key == 0) {

            if ($value == null || empty($value)) {

                $this->addError("email vacio en registro: " . ($num_reg + 1));
            }
        } elseif ($key == 1) {
            
        } elseif ($key == 2) {
            
        } elseif ($key == 3) {
            if ($value == 1 || $value == 2 || $value == 3) {
                
            } else {
                $this->addError("el codigo no es correcto para el registro: " . ($num_reg + 1));
            }
        } else {
            $this->addError("los separadores ',' no estan bien definidos");
            return;
        }
    }

    public function addUsuario(Usuario $user) {
        $this->usuarios->add($user);
    }

    public function getErrores() {
        return $this->errores;
    }

    public function getRegistros() {
        return $this->registros;
    }

    public function getCantErr() {
        return $this->cantErr;
    }

    function getExtension() {
        return $this->extension;
    }

    function getUsuarios() {
        return $this->usuarios;
    }

}

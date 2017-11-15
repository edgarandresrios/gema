<?php

namespace AppBundle\Model\Dao;
use AppBundle\Entity\Usuario;

interface IUsuarioDao {

    public function obtenerTodos();

    public function obtenerPorId($id);

    public function guardar(Usuario $usuarios);
}

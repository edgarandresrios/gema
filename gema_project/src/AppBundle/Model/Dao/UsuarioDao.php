<?php

namespace AppBundle\Model\Dao;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Usuario;

class UsuarioDao implements IUsuarioDao {

    private $entityManager;

    function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    function getEntityManager() {
        return $this->entityManager;
    }

    public function obtenerTodos() {
        return $this->getEntityManager()
                        ->createQuery('SELECT p FROM AppBundle:Usuario p ORDER BY p.id ASC')->getResult();
    }

    public function obtenerPorId($id) {
        return $this->getEntityManager()->find(Usuario::class, $id);
    }

    public function guardar(Usuario $usuario) {
        if (!$usuario->getId()) {
            $this->getEntityManager()->persist($usuario);
        } else {
            $this->getEntityManager()->merge($usuario);
        }
        $this->getEntityManager()->flush();
    }

}

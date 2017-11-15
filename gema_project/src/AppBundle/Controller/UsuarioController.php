<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use AppBundle\Form\UsuarioType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Servicio\ValidarArchivo;

class UsuarioController extends Controller {

    public function getUsuarioDao() {
        return $this->get('usuario_dao');
    }

    /**
     * @Route("/usuario", name="usuario.listar")
     */
    public function listarAction() {

        return $this->render('usuario/listar.html.twig', [
                    'usuarios' => $this->getUsuarioDao()->obtenerTodos(),
                    'titulo' => 'Lista de Usuarios',
        ]);
    }

    /**
     * @Route("/usuario/crear/{id}",
     * defaults={"id" = 0},
     * name="usuario.crear")
     */
    public function crearAction($id) {

        if ($id) {
            $usuario = $this->getUsuarioDao()->obtenerPorId($id);
            $titulo = "Editar Usuario";
        } else {
            $usuario = new Usuario();
            $titulo = "Crear Usuario";
        }

        $form = $this->createForm(UsuarioType::class, $usuario);

        return $this->render('usuario/form.html.twig', [
                    'form' => $form->createView(),
                    'titulo' => $titulo,
        ]);
    }

    /**
     * @Route("/usuario/guardar", name="usuario.guardar")
     */
    public function guardarAction(Request $request) {
        if (!$request->isMethod('POST')) {
            return $this->redirectToRoute('usuario.listar');
        }

        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);

        $form->handleRequest($request);

        $file = $form['nombre']->getData();
        $obj = new ValidarArchivo($file);


        if ($form->isValid() && $obj->getCantErr() == 0) {

            foreach ($obj->getUsuarios() as $usr) {
                $this->getUsuarioDao()->guardar($usr);
            }
            $this->addFlash('success', "Archivo cargado con exito");
            return $this->redirectToRoute('usuario.listar');
        } else {
            $this->addFlash('error', 'Hay errores en el archivo seleccionado, por favor revisar los datos!');
            $this->addFlash('error', "Total de errores: " . $obj->getCantErr());
            foreach ($obj->getErrores() as $error) {
                $this->addFlash('error', $error);
            }

            return $this->render('usuario/form.html.twig', [
                        'form' => $form->createView(),
                        'titulo' => 'Crear Usuario',]);
        }
    }

}

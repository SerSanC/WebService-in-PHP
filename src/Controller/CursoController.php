<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Entity\Curso;

class CursoController extends AbstractController
{
    /**
     * @Route("/curso/{idCurso}", name="curso_alumnos", methods={"POST"})
     * Exceptions: {
     *  500: El curso no existe
     * }
     * Description: Devuelve un listado de alumnos por nombre y apellido de un curso
     *  obtenido por una id
     * Return: Json
     */
    public function cursoAlumno(int $idCurso): Response
    {
        $curso = $this->getDoctrine()
            ->getRepository(Curso::class)
            ->find($idCurso);

        if (!isset($curso)) {
            throw new \Exception('El curso no existe');
        }

        $alumnos = $curso->getAlumnos();

        $data = [];
        foreach ($alumnos as $alumno) {
            $data[] = [
                'nombre' => $alumno->getNombre(),
                'apellidos' => $alumno->getApellidos(),
            ];
        }

        return $this->json($data, $status = 200, $headers = [], $context = []);
    }
}

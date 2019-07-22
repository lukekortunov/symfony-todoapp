<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/", name="home")
     *
     * @return Response
     */
    public function index(): Response
    {
        
        $tasks = $this->getDoctrine()->getRepository( Task::class )->findBy([], [
            'id' => 'DESC'
        ]);

        return $this->render( 'index.html.twig', [
            'tasks' => $tasks
        ] );
       
    }
    
    
    /**
     * @Route("/create", name="create_task", methods={"POST"})
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function create( Request $request )
    {
    
        $title = trim( $request->get('title') );
        
        if(empty($title)) return $this->redirectToRoute('home');
        
        $manager = $this->getDoctrine()->getManager();
        
        $task = new Task;
        $task->setTitle( $title );
        
        $manager->persist( $task );
        $manager->flush();
        
        return $this->redirectToRoute( 'home' );
        
    }
    
    
    /**
     * @Route("/switch/{id}", name="switch_task", methods={"GET"})
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function switch(int $id)
    {
        
        $manager = $this->getDoctrine()->getManager();
        $task = $this->getDoctrine()->getRepository( Task::class )->find($id);
        $task->setStatus( ! $task->getStatus() );
        
        $manager->persist( $task );
        $manager->flush();
        
        return $this->redirectToRoute('home');
        
    }
    
    
    /**
     * @Route("/delete/{id}", name="delete_task", methods={"GET"})
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function delete( int $id )
    {
        
        $manager = $this->getDoctrine()->getManager();
        
        $task = $this->getDoctrine()->getRepository(Task::class)->find($id);
        
        $manager->remove($task);
        $manager->flush();
        
        return $this->redirectToRoute('home');
        
    }
    
}

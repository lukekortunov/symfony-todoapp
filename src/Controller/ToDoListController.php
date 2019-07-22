<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
       
        return $this->render( 'index.html.twig' );
       
    }
    
    
    /**
     * @Route("/create", name="create_task", methods={"POST"})
     *
     * @param Request $request
     */
    public function create( Request $request )
    {
        
        dump( $request );
        
        exit('to do: create a new task!');
        
    }
    
    
    /**
     * @Route("/switch/{id}", name="switch_task", methods={"GET"})
     *
     * @param int $id
     * @param Request $request
     */
    public function switch(int $id, Request $request)
    {
        
        dump( [ $id, $request ] );
        
        exit('switch status of existing to do');
        
    }
    
    
    /**
     * @Route("/delete/{id}", name="delete_task", methods={"GET"})
     *
     * @param int $id
     */
    public function delete( int $id )
    {
        
        dump( [ $id ] );
        
        exit('delete item of existing to do');
        
    }
    
}

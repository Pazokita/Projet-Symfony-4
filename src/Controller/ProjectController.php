<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectFormType;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    private $project_repository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->project_repository = $projectRepository;
    }

    /**
     * @Route("/projects", name="projects")
     */
    public function index()
    {
        $projects =$this->project_repository->findAll();
//        dd($projects);
        return $this->render('project/index.html.twig', [
            'projects' => $projects,
        ]);
    }

    /**
     * @Route("/project/show/{id}", name="project_show")
     */

    public function show(Project $project){
//        dd($project);
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }
//    même chose que ci-dessous / autre manière d'écrire
//    public function show(Request $request){
//        $project = $this->project_repository->find($request->get('id'));
//        dd($project);
//    }

    /**
     * @Route("/project/add", name="project_add")
     */
    public function add(Request $request){
        $project= new Project();
        $project->setProposePar($this->getUser());
        $form = $this ->createForm(ProjectFormType::class, $project);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();
            $this->addFlash('success', 'Le projet a bien été proposé');
            return $this->redirectToRoute("main");

        }
        return $this->render('project/add.html.twig', ['form' =>$form->createView()]);

    }
}

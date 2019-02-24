<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Passeport;
use App\Entity\Observation;
use App\Entity\Lot;
use App\Repository\PasseportRepository;// Injection de dépendance(pour eviter de re-instanicier l'entité Passeport)
use App\Form\FormPasseportType;

class Base5Controller extends AbstractController
{
    /**
     * @Route("/base5", name="base5")
     */
    public function index()
    {
        return $this->render('base5/index.html.twig', [
            'controller_name' => 'Base5Controller',
        ]);
    }

    /**
     * @Route("/nouveauPasseport", name="new_passeport")
     */
    public function nouveauPasseport(Request $request, ObjectManager $manager)
    {
        $passeport = new Passeport();      
        //appel du formulaire (déjà  generé en ligne de commande)
        $form = $this->createForm(FormPasseportType::class, $passeport);
        $form->handleRequest($request);
        //dump($request);
        
        if($form->isSubmitted() && $form->isValid()){          
            ($passeport->getDossierExpedie()) ? $passeport->setDossierExpedie('Envois'): $passeport->setDossierExpedie('NON'); 
            ($passeport->getPasseportArrive()) ? $passeport->setPasseportArrive('Retours'): $passeport->setPasseportArrive('NON');
            ($passeport->getPasseportLivre()) ? $passeport->setPasseportLivre('Distribué'): $passeport->setPasseportLivre('NON');                  
            $manager->persist($passeport);
            $manager->flush();
            //return $this->redirectToRoute('suite_article', ['id'=>$article->getId()]);
        }
        //dump($passeport);
 
    
        return $this->render('base5/index.html.twig',[
            'formPasseport'=>$form->createView(),
            'lastName' =>$passeport->getPrenomDemandeur()             
        ]); 
    }
}

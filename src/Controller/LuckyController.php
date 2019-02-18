<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Formation;
use App\Entity\Loisirs;
use App\Entity\Experiences;

class LuckyController extends Controller
{
    public function number()
    {
        $number = random_int(0, 100);
        
        $formation = $this->getDoctrine()
        ->getRepository(Formation::class)
        ->findAll();
        
        $loisirs = $this->getDoctrine()
        ->getRepository(Loisirs::class)
        ->findAll();

        $experiences = $this->getDoctrine()
        ->getRepository(Experiences::class)
        ->findAll();
        // return new Response(
        //    '<html><body>Lucky number: '.$number.'</body></html>'
        // );
        
         return $this->render('lucky/number.html.twig', array(
            'number' => $number,
            'formation' => $formation,
            'loisirs' => $loisirs,
            'experiences' => $experiences,
            
        
        ));
    }



public function create () {
    
    $form = new Formation();
    $form->setName('Ma Formation');
    $eManager = $this->getDoctrine()->getManager();
    $eManager->persist($form);
    $eManager->flush();
    
    
    $form = new Loisirs();
    $form->setName('Loisirs');
    $eManager = $this->getDoctrine()->getManager();
    $eManager->persist($form);
    $eManager->flush();
    
      $form = new Experiences();
    $form->setName('Experiences');
    $eManager = $this->getDoctrine()->getManager();
    $eManager->persist($form);
    $eManager->flush();

    }
    
    
}
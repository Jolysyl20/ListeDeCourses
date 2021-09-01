<?php

namespace App\Controller;

use App\Entity\Listes;
use App\Repository\ListesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/listes", name="api_liste", methods={"GET"})
     */
    public function Liste(ListesRepository $repo): Response
    {
       $tab = $repo->findAll();
       return $this->json($tab);
    }
        /**
     * @Route("/api/listes", name="Ajouter_listes", methods={"POST"})
     */
    public function Ajouter(EntityManagerInterface $em,Request $req): Response
    {
       $body = json_decode($req->getContent());
       $listes = new Listes;
       $listes->setTitle($body->title);
       $listes->setIsBought(false);
       $em->persist($listes);
       $em->flush();
       
       return $this->json($listes);
    }
        /**
     * @Route("/api/listes/{id}", name="supprimer_listes", methods={"DELETE"})
     */
    public function Supprimer(Listes $listes,EntityManagerInterface $em): Response
    {
      $em->remove($listes);
      $em->flush();
      
      return $this->json($listes);
    }
        /**
     * @Route("/api/listes/{id}", name="acheter_listes", methods={"PUT"})
     */
    public function Modifier(Listes $listes,EntityManagerInterface $em): Response
    {
       $nouvel_etat = !$listes->getIsBought();
       $listes->setIsBought($nouvel_etat);
       $em->flush();
       return $this->json($listes);
    }
}

<?php

namespace App\Controller;

use App\Entity\Cas;
use App\Repository\CasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//Ce controlleur sert à ajouter de nouveaux cas

class AddcasController extends AbstractController
{
     /**
     *@Route("/api/addcas", name="addcas",methods={"POST"})
     */
    public function Addcas(Request $request, EntityManagerInterface $entityManager,CasRepository $cas_repo)
    {
        //Ici on recupère la requête de l'utilisateur
        $values=json_decode($request->getContent());
        if(
            //On vérifie si l'utilisateur a rempli tous les champs
            isset(
                $values->nouveauCas, $values->nouveauDeces, $values->date , $values->nouveauxGueris,$values->nouveauxcontacts,$values->nouveaucommunautaire,$values->nouveauximportes) 
                )
        {
            $allcase=$cas_repo->findAll();
            $last_one=$cas_repo->findOneById(count($allcase));

            $totalcas=$last_one->getTotalCas();   
            $totaldeces=$last_one->getTotalDeces(); 
            $totalgueris=$last_one->getTotalGueris(); 
            $totalcontacts=$last_one->getTotalContacts(); 
            $totalcascommunautaire=$last_one->getTotalcommunautaire();
            $totalimportes=$last_one->getTotalimportes();

            $cas=new Cas();

            $cas->setNouveauCas($values->nouveauCas);
            $cas->setTotalCas($values->nouveauCas+$totalcas);

            $cas->setNouveauDeces($values->nouveauDeces);
            $cas->setTotalDeces($values->nouveauDeces+$totaldeces);

            $cas->setDate(new \DateTime());

            $cas->setNouveauxGueris($values->nouveauxGueris);
            $cas->setTotalGueris($values->nouveauxGueris+$totalgueris);

            $cas->setNouveauxcontacts($values->nouveauxcontacts);
            $cas->setTotalcontacts($values->nouveauxcontacts+$totalcontacts);

            $cas->setNouveaucommunautaire($values->nouveaucommunautaire);$cas->setTotalcommunautaire($values->nouveaucommunautaire+$totalcascommunautaire);
            
            $cas->setNouveauximportes($values->nouveauximportes);
            $cas->setTotalimportes($values->nouveauximportes+$totalimportes);

            $entityManager->persist($cas);
            $entityManager->flush();

            $data=[
                'status'=>201,
                'message'=>'L\'enrégistrement a réussi'
            ];
            return new JsonResponse($data, 201);
    }
    else
    {
        $data=[
            'status'=>500,
            'message'=>'L\'enrégistrement a échoué'
        ];
        return new JsonResponse($data, 500);
    }
}
}       
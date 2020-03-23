<?php

namespace App\Controller;

use App\Entity\VerifierSuspect;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//C'est l'algorithme qui permet aux utilisateurs de faire un pré test en ligne

class TesterController extends AbstractController
{
    /**
     * @Route("/api/tester", name="tester")
     */
    public function tester(Request $request, EntityManagerInterface $entityManager)
    {
        //Ici on recupère la requête de l'utilisateur
        $values=json_decode($request->getContent());
        if(
            //On vérifie si l'utilisateur a rempli tous les champs
            isset(
                $values->malDeTete, $values->toux, $values->gorgeIrritee,
                $values->fievre, $values->sentimentGeneralDeMalaise ,$values->geneRespiratoire, $values->fatigueInnabituelle,$values->alimentationDifficile, $values->courbature, $values->voyage ,$values->enContact) 
                )
        {
            //On initialise notre compteur cmpt à 0 au début
            $cmpt=0;
            /*On parcourt notre objet $values et on vérifie à chaque élément 
            si l'utilisateur a les symptomes ou pas
            */
            foreach($values as $value=>$symptome){
            if($symptome==true){
                //S'il répond qu'il a un symptome on incrémente le compteur cmpt
                $cmpt++; 
            }
    }
    /*Au sortie de la boucle on vérifie la valeur de cmpt si cmpt est compris entre 12(le nombre total de symptome qu'on a répertorier) et 6(la moitié des symptomes répertoriés),
    on avertit l'utilisateur que son cas est suspect et qu'on lui recommande fortement d'appeler le numéro vert pour plus d'infos
    */
    if($cmpt<=12 && $cmpt>=6){
        $data=[
            'status'=>200,
            'message'=>'Votre cas semble suspect.Nous vous recommandons fortement d\'appeler le numero vert 800 00 50 50 pour plus d\'infos',
            'cmpt'=>$cmpt
        ];
        return new JsonResponse($data,201);
    }
    /*Si l'utilisateur n'a pas la moitié des symptomes ,on lui dit que son cas n'est pas suspect
    mais s'il sent quelque chose d'anormal ,il appelle le numéro vert
    */
    else{
        $data=[
            'status'=>200,
            'message'=>'Votre cas ne semble pas suspect.Cependant si tu sens des signes anormaux n\'hesite pas a appeler le numero vert: 800 00 50 50 pour plus d\'infos',
            'cmpt'=>$cmpt
        ];
        return new JsonResponse($data,201);
}
        }
        //Si l'utilisateur n'a pas répondu à toutes les questions ,on lui envoie un message d'erreur
        else{
            $data=[
                'status'=>200,
                'message'=>'Veuillez remplir tous les champs s\'il vous plait',
                'cmpt'=>$cmpt
            ];
            return new JsonResponse($data,201);
        }
}
}
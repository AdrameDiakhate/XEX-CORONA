<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OptimiseController extends AbstractController
{
    /**
     * @Route("/api/test", name="test")
     */
    public function test(Request $request, EntityManagerInterface $entityManager)
    {
        //Ici on recupère la requête de l'utilisateur
        $values=json_decode($request->getContent());
        if( 
            isset($values->fievre,$values->toux,$values->anosmie,$values->gorge_et_courbature,$values->diarrhee,$values->fatigue,$values->sous_alimentation,$values->manque_souffle,$values->age,$values->taille,$values->poids,$values->cardio_tension,$values->diabete,$values->cancer,$values->maladie_respiratoire,$values->insuffisance_renale,$values->foie,$values->enceinte,$values->diminue_deffense,$values->immunosuppresseur) 
        )
        {
            if( $values->age<15 ){
                $data=[
                    'status'=>200,
                    'message'=>'Cette application n’est pour l’instant pas adaptée aux personnes de moins de 15 ans. En cas d’urgence : appelez le 800 00 50 50 ou le 15 15.',
                ];
                return new JsonResponse($data,201);
            }
//Création d'un tableau contenant uniquement les symptômes qui font varier le facteur mineur
            $mineurs=[$values->fievre,$values->fatigue];
            
            //Initialisation du facteur de gravité majeur à 0
            $fact_mineur=0;
            foreach($mineurs as $mineur){
                if( ($values->fievre <35.5 && $values->fievre >=39) || ($values->fatigue==true)){
                    $fact_mineur++;
                }
            }
//Création d'un tableau contenant uniquement les symptômes qui font varier le facteur majeur
            $majeurs=[$value->manque_souffle,$value->sous_alimentation];
            //Initialisation  du facteur de gravité majeur à 0
            $fact_majeur=0;
            foreach($majeurs as $majeur){
                if( ($values->manque_souffle==true) || ($values->sous_alimentation) ){
                    $fact_majeur++;
                }
/*
Création d'un tableau contenant uniquement les symptômes qui font varier le facteur pronostique
*/
                $pronostiques =[$values->diabete,$values->cancer,$values->cardio_tension,$values->maladie_respiratoire,$values->insuffisance_renale,$values->foie,$values->enceinte,$values->diminue_deffense,$values->immunosuppresseur];
                
                //Calcul de l'indice de masse corporel
                $IMC=$values->poids/($values->taille**2);

                //Initialisation  du facteur pronostique à 0
                $fact_pronostic=0;
                if( ($values->age > 65) || ($IMC >=30 ) ){
                    $fact_pronostic++;
                }
                foreach($pronostiques as $pronostique){
                    if( ($pronostique==true) ){
                        $fact_pronostic++;
                    }
                }
                if($fact_majeur>=1){
                    $data=[
                        'message'=>'Nous vous rappeler recommandation d appeler le SAMU au 15 15',
                        'status'=>201
                    ];
                    return new JsonResponse($data,201);
                }
                if($value->fievre==true && $value->toux==true){
                    if($fact_pronostic==0){
                        $data=[
                            'message'=>'Votre situation peut relever d’un Covid-19.
                            Demandez une téléconsultation ou un médecin généraliste ou une visite
                            à domicile (SOS médecins, etc.)
                            En attendant et pour casser les chaînes de transmission, nous vous
                            conseillons de vous isoler et de respecter les gestes barrières pour
                            protéger vos proches.',
                            'status'=>201
                        ];
                        return new JsonResponse($data,201);
                    }
                    elseif($fact_pronostic>=1){
                        if($fact_mineur<2){
                            $data=[
                                'message'=>'Votre situation peut relever d’un Covid-19.
                                Demandez une téléconsultation ou un médecin généraliste ou une visite
                                à domicile (SOS médecins, etc.)
                                En attendant et pour casser les chaînes de transmission, nous vous
                                conseillons de vous isoler et de respecter les gestes barrières pour
                                protéger vos proches.',
                                'status'=>201
                            ];
                            return new JsonResponse($data,201);
                        }
                        elseif($fact_mineur>=2){
                            $data=[
                                'message'=>'Votre situation peut relever d’un Covid-19.
                                Demandez une téléconsultation ou un médecin généraliste ou une visite
                                à domicile.  Si vous n arrivez pas à obtenir de consultation, appelez
                                le 15.En attendant et pour casser les chaînes de transmission, nous vous
                                conseillons de vous isoler et de respecter les gestes barrières pour
                                protéger vos proches.',
                                'status'=>201
                            ];
                            return new JsonResponse($data,201);
                        }
                    }
                    elseif( ($values->fievre==true) || ($values->diarrhee==true || ($values->diarrhee==true || ($values->toux==true && $values->douleur==true) || ($values->toux==true && $values->anasomie==true)) ||($values->douleur==true && $values->anasomie==true) ) )
                {
                    if($fact_pronostic==0){
                        if($fact_mineur==0 && $values->age<50){
                            $data=[
                                'message'=>'Votre situation peut relever d’un COVID 19.
                                Demandez une téléconsultation ou un médecin généraliste ou une visite
                                à domicile (SOS médecins, etc.)                            
                                En attendant et pour casser les chaînes de transmission, nous vous
                                conseillons de vous isoler et de respecter les gestes barrières pour
                                protéger vos proches.',
                                'status'=>201
                            ];
                            return new JsonResponse($data,201);
                        }
                        if($fact_mineur==0 && $values->age>=50){
                            $data=[
                                'message'=>'Votre situation peut relever d’un Covid-19.
                                Demandez une téléconsultation ou un médecin généraliste ou une visite à domicile.           
                                Appelez le 15 si une gêne respiratoire ou des difficultés importantes
                                pour vous alimenter ou boire apparaissent pendant plus de 24 heures.   
                                En attendant et pour casser les chaînes de transmission, nous vous
                                conseillons de vous isoler et de respecter les gestes barrières pour
                                protéger vos proches.',
                                'status'=>201
                            ];
                            return new JsonResponse($data,201);
                        }
                        if($fact_mineur>=1){
                            $data=[
                                'message'=>'Votre situation peut relever d’un Covid-19.
                                Demandez une téléconsultation ou un médecin généraliste ou une visite
                                à domicile.
                                Appelez le 15 si une gêne respiratoire ou des difficultés importantes
                                pour vous alimenter ou boire apparaissent pendant plus de 24 heures.
                                En attendant et pour casser les chaînes de transmission, nous vous
                                conseillons de vous isoler et de respecter les gestes barrières pour
                                protéger vos proches.',
                                'status'=>201
                            ];
                            return new JsonResponse($data,201);
                        }
                    }
                    elseif($fact_pronostic>=1){
                        if($fact_mineur<2){
                        $data=[
                            'message'=>'Votre situation peut relever d’un Covid-19.
                            Demandez une téléconsultation ou un médecin généraliste ou une visite
                            à domicile.
                            Appelez le 15 si une gêne respiratoire ou des difficultés importantes
                            pour vous alimenter ou boire apparaissent pendant plus de 24 heures.
                            En attendant et pour casser les chaînes de transmission, nous vous
                            conseillons de vous isoler et de respecter les gestes barrières pour
                            protéger vos proches.',
                            'status'=>201
                        ];
                        return new JsonResponse($data,201);
                    }
                    elseif($fact_mineur>=2){
                        $data=[
                            'message'=>'Votre situation peut relever d’un Covid-19.
                            Demandez une téléconsultation ou un médecin généraliste ou une visite
                            à domicile.
                            Si vous n arrivez pas à obtenir de consultation, appelez le 15.   
                            En attendant et pour casser les chaînes de transmission, nous vous
                            conseillons de vous isoler et de respecter les gestes barrières pour
                            protéger vos proches.',
                            'status'=>201
                        ];
                        return new JsonResponse($data,201);
                    }
                    }
                }
                elseif($values->fievre==false && ( ($values->toux==true)||($values->douleur==true)||($values->anosmie==true) )){
                    if($fact_pronostic>=1){
                        $data=[
                            'message'=>'Votre situation peut relever d’un COVID 19.
                            Demandez une téléconsultation ou un médecin généraliste.  
                            Au moindre doute, appelez le 15. En attendant et pour casser les
                            chaînes de transmission, nous vous conseillons de vous isoler et de
                            respecter les gestes barrières pour protéger vos proches.',
                            'status'=>201
                        ];
                        return new JsonResponse($data,201);
                    }
                    elseif($fact_pronostic==0){
                        $data=[
                            'message'=>'Votre situation peut relever d’un COVID 19.
                            Demandez une téléconsultation ou un médecin généraliste ou une visite
                            à domicile (SOS médecins, etc.)                    
                            En attendant et pour casser les chaînes de transmission, nous vous
                            conseillons de vous isoler et de respecter les gestes barrières pour
                            protéger vos proches.',
                            'status'=>201
                        ];
                        return new JsonResponse($data,201);
                    }
                }
                elseif( ($values->toux==false) && ($values->douleur==false) && ($values->anosmie==false) ){
                    $data=[
                        'message'=>'Votre situation ne relève probablement pas du Covid-19.

                        N’hésitez pas à contacter votre médecin en cas de doute.   
                        Vous pouvez refaire le test en cas de nouveau symptôme pour réévaluer
                        la situation.     
                        Pour toute information concernant le Covid-19, composer le 0 800 130 000.',
                        'status'=>201
                    ];
                    return new JsonResponse($data,201);
                }
            }
        }
    }
}
}
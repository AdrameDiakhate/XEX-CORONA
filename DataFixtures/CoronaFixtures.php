<?php

namespace App\DataFixtures;

use App\Entity\FAQ;
use App\Entity\Sensibilisation;
use App\Entity\Cas;
use App\Entity\Lieu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CoronaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $faq = new FAQ();
         $faq->setQuestion("Comment se transmet le coronavirus?");
         $faq->setReponse("Elle se transmet par contact avec une personne porteuse du covid.");         
         $manager->persist($faq);

         $sensibilisation=new Sensibilisation();

         //$sensibilisation->setPhoto("/media/corna.jpg");
         $sensibilisation->setTexte("
         Alors que le bilan de l'épidémie du coronavirus en Chine est monté mercredi à près de 500 morts sur plus de 24 000 cas confirmés dans le pays et que le coronavirus s'est propagé à une vingtaine de pays, où quelque 200 cas de contamination ont été enregistrés, l'Afrique s'organise pour y faire face. L'Institut Pasteur de Dakar, désigné par l'Union africaine comme un des deux centres de référence en Afrique pour la détection du nouveau coronavirus apparu en Chine, reçoit en fin de semaine des experts de 15 pays du continent afin de les préparer à faire face à la maladie. L'Afrique est pour l'heure épargnée, mais les gouvernements du continent ont renforcé les mesures de prévention, notamment dans les ports et les aéroports.
         ");

         $manager->persist($sensibilisation);

         $lieu=new Lieu();
         $lieu->setRegion("Dakar");
               $manager->persist($lieu);
         $lieu=new Lieu();
         $lieu->setRegion("Dioubel");
              $manager->persist($lieu);
        $lieu=new Lieu();
               $lieu->setRegion("Fatick");
               $manager->persist($lieu);
        $lieu=new Lieu();
               $lieu->setRegion("Kaffrine");
               $manager->persist($lieu);
        $lieu=new Lieu();
               $lieu->setRegion("Kaolack");
               $manager->persist($lieu);
        $lieu=new Lieu();
               $lieu->setRegion("Kédougou");
               $manager->persist($lieu);
        $lieu=new Lieu();
               $lieu->setRegion("Kolda");
               $manager->persist($lieu);
        $lieu=new Lieu();
               $lieu->setRegion("Louga");
               $manager->persist($lieu);
        $lieu=new Lieu();
               $lieu->setRegion("Matam");
               $manager->persist($lieu);
        $lieu=new Lieu();
               $lieu->setRegion("Saint-Louis");
               $manager->persist($lieu);
        $lieu=new Lieu();
               $lieu->setRegion("Sédhiou");
               $manager->persist($lieu);
        $lieu=new Lieu();
               $lieu->setRegion("Tambacounda");
               $manager->persist($lieu);
        $lieu=new Lieu();
               $lieu->setRegion("Thiès");
               $manager->persist($lieu);
        $lieu=new Lieu();
               $lieu->setRegion("Ziguinchor");
         $manager->persist($lieu);

         $cas=new Cas();
              $cas->setTotalGueris("30");
              $cas->setLieu($lieu);
              $cas->setNewCaseToday(5);
              $cas->setTotalCases(34);
              $cas->setNewDeathToday(0);
              $cas->setTotalDeaths(0);
        $manager->persist($cas);


        $manager->flush();
    }
}
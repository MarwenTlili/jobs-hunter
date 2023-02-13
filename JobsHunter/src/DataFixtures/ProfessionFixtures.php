<?php
namespace App\DataFixtures;

use App\Entity\Profession;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfessionFixtures extends Fixture{
    public const INFORMATIQUE = "informatique-ref";
    public const INGENIERIE = "ingenierie-ref";
    public const FINANCE = "finance-ref";
    public const SANTE = "Sante-ref";
    public const ADMINISTRATION = "Administration-ref";

    public function load(ObjectManager $manager){
        $informatique = new Profession();
        $informatique->setName('Informatique');

        $industrie = new Profession();
        $industrie->setName('Industrie');

        $vente = new Profession();
        $vente->setName('Vente');

        $gestion = new Profession();
        $gestion->setName('Gestion');

        $resources_humaines = new Profession();
        $resources_humaines->setName('Resources Humaines');

        $textile = new Profession();
        $textile->setName('Textile');

        $mecanique = new Profession();
        $mecanique->setName('Mécanique');


        $centre_appel = new Profession();
        $centre_appel->setName('Centre d\'appels');
        
        $commerce = new Profession();
        $commerce->setName('Commerce');

        $finance = new Profession();
        $finance->setName('Finance');

        $administration = new Profession();
        $administration->setName('Administration');

        $automobile = new Profession();
        $automobile->setName('Automobile');

        $electronique = new Profession();
        $electronique->setName('Electronique');

        $banque = new Profession();
        $banque->setName('Banque');


        $ingenierie = new Profession();
        $ingenierie->setName('Ingénierie');

        $marketing = new Profession();
        $marketing->setName('Marketing');

        $comptabilite = new Profession();
        $comptabilite->setName('Comptabilité');

        $hotellerie_tourisme = new Profession();
        $hotellerie_tourisme->setName('Hotellerie et Tourisme');
        
        $sante = new Profession();
        $sante->setName('Sante');

        $immobilier = new Profession();
        $immobilier->setName('Immobilier');

        $pharmaceutique = new Profession();
        $pharmaceutique->setName('Pharmaceutiques');


        $tech_information = new Profession();
        $tech_information->setName('Technologies de l\'information');
        
        $telecommunication = new Profession();
        $telecommunication->setName('Télécommunication');

        $design = new Profession();
        $design->setName('Design');

        $consulting = new Profession();
        $consulting->setName('Consulting');

        $construction = new Profession();
        $construction->setName('Construction');

        $assurance = new Profession();
        $assurance->setName('Assurance');


        $manager->persist($informatique);
        $manager->persist($industrie);
        $manager->persist($vente);
        $manager->persist($gestion);
        $manager->persist($resources_humaines);
        $manager->persist($textile);
        $manager->persist($mecanique);
        
        $manager->persist($centre_appel);
        $manager->persist($commerce);
        $manager->persist($finance);
        $manager->persist($administration);
        $manager->persist($automobile);
        $manager->persist($electronique);
        $manager->persist($banque);
        
        $manager->persist($ingenierie);
        $manager->persist($marketing);
        $manager->persist($comptabilite);
        $manager->persist($hotellerie_tourisme);
        $manager->persist($sante);
        $manager->persist($immobilier);
        $manager->persist($pharmaceutique);

        $manager->persist($tech_information);
        $manager->persist($telecommunication);
        $manager->persist($design);
        $manager->persist($consulting);
        $manager->persist($construction);
        $manager->persist($assurance);

        $manager->flush();

        $this->addReference(self::INFORMATIQUE, $informatique);
        $this->addReference(self::SANTE, $sante);
        $this->addReference(self::ADMINISTRATION, $administration);
        $this->addReference(self::FINANCE, $finance);
        $this->addReference(self::INGENIERIE, $ingenierie);

    }
}
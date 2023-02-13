<?php
namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CompanyFixtures extends Fixture implements DependentFixtureInterface{
    protected $faker;

    public const COMPANY1 = "company1";
    public const COMPANY2 = "company2";
    public const COMPANY3 = "company3";
    public const COMPANY4 = "company4";
    public const COMPANY5 = "company5";
    public const TRAINING_COMPANY1 = "TRAINING_COMPANY1";
    public const TRAINING_COMPANY2 = "TRAINING_COMPANY2";
    public const TRAINING_COMPANY3 = "TRAINING_COMPANY3";
    public const TRAINING_COMPANY4 = "TRAINING_COMPANY4";
    public const TRAINING_COMPANY5 = "TRAINING_COMPANY5";



    public function load(ObjectManager $manager){
        $this->faker = Factory::create();

        ////////////////////////////////////////////////////////////////////////////////
        // Companies
        $company1 = new Company();
        $company1->setFirstName($this->faker->firstName())
        ->setLastName($this->faker->lastName)
        ->setName($this->getReference(UserFixtures::USER1_COMPANY)->getUsername())
        ->setAddress($this->faker->address)
        ->setPhone($this->faker->e164PhoneNumber)
        ->setWebsite("www.".$this->getReference(UserFixtures::USER1_COMPANY)->getUsername().".com")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setTrn("...")
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER1_COMPANY));

        $company2 = new Company();
        $company2->setFirstName($this->faker->firstName())
        ->setLastName($this->faker->lastName)
        ->setName($this->getReference(UserFixtures::USER2_COMPANY)->getUsername())
        ->setAddress($this->faker->address)
        ->setPhone($this->faker->e164PhoneNumber)
        ->setWebsite("www.".$this->getReference(UserFixtures::USER2_COMPANY)->getUsername().".com")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setTrn("...")
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER2_COMPANY));

        $company3 = new Company();
        $company3->setFirstName($this->faker->firstName())
        ->setLastName($this->faker->lastName)
        ->setName($this->getReference(UserFixtures::USER3_COMPANY)->getUsername())
        ->setAddress($this->faker->address)
        ->setPhone($this->faker->e164PhoneNumber)
        ->setWebsite("www.".$this->getReference(UserFixtures::USER3_COMPANY)->getUsername().".com")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setTrn("...")
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER3_COMPANY));

        $company4 = new Company();
        $company4->setFirstName($this->faker->firstName())
        ->setLastName($this->faker->lastName)
        ->setName($this->getReference(UserFixtures::USER4_COMPANY)->getUsername())
        ->setAddress($this->faker->address)
        ->setPhone($this->faker->e164PhoneNumber)
        ->setWebsite("www.".$this->getReference(UserFixtures::USER4_COMPANY)->getUsername().".com")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setTrn("...")
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER4_COMPANY));

        $company5 = new Company();
        $company5->setFirstName($this->faker->firstName())
        ->setLastName($this->faker->lastName)
        ->setName($this->getReference(UserFixtures::USER5_COMPANY)->getUsername())
        ->setAddress($this->faker->address)
        ->setPhone($this->faker->e164PhoneNumber)
        ->setWebsite("www.".$this->getReference(UserFixtures::USER5_COMPANY)->getUsername().".com")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setTrn("...")
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER5_COMPANY));
        ////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////
        // Training Companies
        $training_company1 = new Company();
        $training_company1->setFirstName($this->faker->firstName())
        ->setLastName($this->faker->lastName)
        ->setName($this->getReference(UserFixtures::USER1_TRAINING_COMPANY)->getUsername())
        ->setAddress($this->faker->address)
        ->setPhone($this->faker->e164PhoneNumber)
        ->setWebsite("www.".$this->getReference(UserFixtures::USER1_TRAINING_COMPANY)->getUsername().".com")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setTrn("...")
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER1_TRAINING_COMPANY));

        $training_company2 = new Company();
        $training_company2->setFirstName($this->faker->firstName())
        ->setLastName($this->faker->lastName)
        ->setName($this->getReference(UserFixtures::USER2_TRAINING_COMPANY)->getUsername())
        ->setAddress($this->faker->address)
        ->setPhone($this->faker->e164PhoneNumber)
        ->setWebsite("www.".$this->getReference(UserFixtures::USER2_TRAINING_COMPANY)->getUsername().".com")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setTrn("...")
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER2_TRAINING_COMPANY));

        $training_company3 = new Company();
        $training_company3->setFirstName($this->faker->firstName())
        ->setLastName($this->faker->lastName)
        ->setName($this->getReference(UserFixtures::USER3_TRAINING_COMPANY)->getUsername())
        ->setAddress($this->faker->address)
        ->setPhone($this->faker->e164PhoneNumber)
        ->setWebsite("www.".$this->getReference(UserFixtures::USER3_TRAINING_COMPANY)->getUsername().".com")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setTrn("...")
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER3_TRAINING_COMPANY));

        $training_company4 = new Company();
        $training_company4->setFirstName($this->faker->firstName())
        ->setLastName($this->faker->lastName)
        ->setName($this->getReference(UserFixtures::USER4_TRAINING_COMPANY)->getUsername())
        ->setAddress($this->faker->address)
        ->setPhone($this->faker->e164PhoneNumber)
        ->setWebsite("www.".$this->getReference(UserFixtures::USER4_TRAINING_COMPANY)->getUsername().".com")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setTrn("...")
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER4_TRAINING_COMPANY));

        $training_company5 = new Company();
        $training_company5->setFirstName($this->faker->firstName())
        ->setLastName($this->faker->lastName)
        ->setName($this->getReference(UserFixtures::USER5_TRAINING_COMPANY)->getUsername())
        ->setAddress($this->faker->address)
        ->setPhone($this->faker->e164PhoneNumber)
        ->setWebsite("www.".$this->getReference(UserFixtures::USER5_TRAINING_COMPANY)->getUsername().".com")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setTrn("...")
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER5_TRAINING_COMPANY));
        ////////////////////////////////////////////////////////////////////////////////

        
        $manager->persist($company1);
        $manager->persist($company2);
        $manager->persist($company3);
        $manager->persist($company4);
        $manager->persist($company5);

        $manager->persist($training_company1);
        $manager->persist($training_company2);
        $manager->persist($training_company3);
        $manager->persist($training_company4);
        $manager->persist($training_company5);


        $manager->flush();

        $this->addReference(self::COMPANY1, $company1);
        $this->addReference(self::COMPANY2, $company2);
        $this->addReference(self::COMPANY3, $company3);
        $this->addReference(self::COMPANY4, $company4);
        $this->addReference(self::COMPANY5, $company5);

        $this->addReference(self::TRAINING_COMPANY1, $training_company1);
        $this->addReference(self::TRAINING_COMPANY2, $training_company2);
        $this->addReference(self::TRAINING_COMPANY3, $training_company3);
        $this->addReference(self::TRAINING_COMPANY4, $training_company4);
        $this->addReference(self::TRAINING_COMPANY5, $training_company5);
    }

    public function getDependencies(){
        return [
            UserFixtures::class,
            CountryFixtures::class,
            ProfessionFixtures::class
        ];
    }
}
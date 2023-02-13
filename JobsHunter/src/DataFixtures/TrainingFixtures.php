<?php
namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\Training;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use DateTimeImmutable;

class TrainingFixtures extends Fixture implements DependentFixtureInterface{
    protected $faker;

    public const TRAINING1 = "TRAINING1";
    public const TRAINING2 = "TRAINING2";
    public const TRAINING3 = "TRAINING3";
    public const TRAINING4 = "TRAINING4";
    public const TRAINING5 = "TRAINING5";
    // public const TRAINING6 = "TRAINING6";
    // public const TRAINING7 = "TRAINING7";
    // public const TRAINING8 = "TRAINING8";
    // public const TRAINING9 = "TRAINING9";
    // public const TRAINING10 = "TRAINING10";

    public function load(ObjectManager $manager){
        $this->faker = Factory::create();

        $training1 = new Training();
        $training1->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
            ->setAddress($this->faker->address)
            ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
            ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
            ->setAbout($this->faker->paragraphs($nb = 3, $asText = true))
            ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
            ->setCompany($this->getReference(CompanyFixtures::TRAINING_COMPANY3))
        ;

        $training2 = new Training();
        $training2->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
            ->setAddress($this->faker->address)
            ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
            ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
            ->setAbout($this->faker->paragraphs($nb = 3, $asText = true))
            ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
            ->setCompany($this->getReference(CompanyFixtures::TRAINING_COMPANY1))
        ;

        $training3 = new Training();
        $training3->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
            ->setAddress($this->faker->address)
            ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
            ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
            ->setAbout($this->faker->paragraphs($nb = 3, $asText = true))
            ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
            ->setCompany($this->getReference(CompanyFixtures::TRAINING_COMPANY3))
        ;

        $training4 = new Training();
        $training4->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
            ->setAddress($this->faker->address)
            ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
            ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
            ->setAbout($this->faker->paragraphs($nb = 3, $asText = true))
            ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
            ->setCompany($this->getReference(CompanyFixtures::TRAINING_COMPANY2))
        ;

        $training5 = new Training();
        $training5->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
            ->setAddress($this->faker->address)
            ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
            ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
            ->setAbout($this->faker->paragraphs($nb = 3, $asText = true))
            ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
            ->setCompany($this->getReference(CompanyFixtures::TRAINING_COMPANY5))
        ;

        $manager->persist($training1);
        $manager->persist($training2);
        $manager->persist($training3);
        $manager->persist($training4);
        $manager->persist($training5);

        $manager->flush();

        $this->addReference(self::TRAINING1, $training1);
        $this->addReference(self::TRAINING2, $training2);
        $this->addReference(self::TRAINING3, $training3);
        $this->addReference(self::TRAINING4, $training4);
        $this->addReference(self::TRAINING5, $training5);

    }

    public function getDependencies(){
        return [
            CountryFixtures::class,
            CompanyFixtures::class,
        ];
    }
}
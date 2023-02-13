<?php
namespace App\DataFixtures;

use App\Entity\Seeker;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Provider\fr_FR\Address;

class SeekerFixtures extends Fixture implements DependentFixtureInterface{
    protected $faker;

    public const SEEKER1 = "SEEKER1";
    public const SEEKER2 = "SEEKER2";
    public const SEEKER3 = "SEEKER3";
    public const SEEKER4 = "SEEKER4";


    public function load(ObjectManager $manager){
        $this->faker = Factory::create('fr_FR');
        $this->faker->addProvider(new Address($this->faker));

        $seeker1 = new Seeker();
        $seeker1->setFirstName($this->faker->firstName)
        ->setLastName($this->faker->lastName)
        ->setCivility($this->faker->title)
        ->setBirthDate(DateTimeImmutable::createFromMutable($this->faker->dateTimeBetween($startDate = '-50 years', $endDate = '-20 years', $timezone = null)))
        ->setAddress($this->faker->address)
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER1_SEEKER));

        $seeker2 = new Seeker();
        $seeker2->setFirstName($this->faker->firstName)
        ->setLastName($this->faker->lastName)
        ->setCivility($this->faker->title)
        ->setBirthDate(DateTimeImmutable::createFromMutable($this->faker->dateTimeBetween($startDate = '-50 years', $endDate = '-20 years', $timezone = null)))
        ->setAddress($this->faker->address)
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER2_SEEKER));

        $seeker3 = new Seeker();
        $seeker3->setFirstName($this->faker->firstName)
        ->setLastName($this->faker->lastName)
        ->setCivility($this->faker->title)
        ->setBirthDate(DateTimeImmutable::createFromMutable($this->faker->dateTimeBetween($startDate = '-50 years', $endDate = '-20 years', $timezone = null)))
        ->setAddress($this->faker->address)
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER3_SEEKER));

        $seeker4 = new Seeker();
        $seeker4->setFirstName($this->faker->firstName)
        ->setLastName($this->faker->lastName)
        ->setCivility($this->faker->title)
        ->setBirthDate(DateTimeImmutable::createFromMutable($this->faker->dateTimeBetween($startDate = '-50 years', $endDate = '-20 years', $timezone = null)))
        ->setAddress($this->faker->address)
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::USER4_SEEKER));

        $manager->persist($seeker1);
        $manager->persist($seeker2);
        $manager->persist($seeker3);
        $manager->persist($seeker4);

        $manager->flush();

        $this->addReference(self::SEEKER1, $seeker1);
        $this->addReference(self::SEEKER2, $seeker2);
        $this->addReference(self::SEEKER3, $seeker3);
        $this->addReference(self::SEEKER4, $seeker4);

    }

    public function getDependencies(){
        return [
            CountryFixtures::class,
            UserFixtures::class
        ];
    }
}
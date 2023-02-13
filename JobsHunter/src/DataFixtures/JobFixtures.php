<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use DateTimeImmutable;

class JobFixtures extends Fixture implements DependentFixtureInterface{
    protected $faker;

    public const JOB1 = "JOB1";
    public const JOB2 = "JOB2";
    public const JOB3 = "JOB3";
    public const JOB4 = "JOB4";
    public const JOB5 = "JOB5";
    public const JOB6 = "JOB6";
    public const JOB7 = "JOB7";
    public const JOB8 = "JOB8";
    public const JOB9 = "JOB9";
    public const JOB10 = "JOB110";

    public function load(ObjectManager $manager){
        $this->faker = Factory::create();

        $job_types = ['CDD', 'CDI', 'SIVP', 'KARAMA'];

        $job1 = new Job();
        $job1->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
        ->setAddress($this->faker->address)
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setExpireAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setPostsNumber($this->faker->numberBetween($min = 1, $max = 5))
        ->setType($job_types[array_rand($job_types)])
        ->setExperienceMin($this->faker->numberBetween($min = 0, $max = 3))
        ->setExperienceMax($this->faker->numberBetween($min = 3, $max = 10))
        ->setEducationLevel("DESS, DEA, Master, Bac + 5, Grandes Ecoles")
        ->setSalaryMin($this->faker->numberBetween($min = 1000, $max = 1500))
        ->setSalayMax($this->faker->numberBetween($min = 1500, $max = 3500))
        ->setRequiredLanguages("Français, anglais")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setRequirements($this->faker->paragraphs($nb = 3, $asText = true))
        ->setCompany($this->getReference(CompanyFixtures::COMPANY1))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->addTag($this->getReference(TagFixtures::PHP_REF))
        ->addTag($this->getReference(TagFixtures::SYMFONY_REF))
        ->addProfession($this->getReference(ProfessionFixtures::INFORMATIQUE));

        $job2 = new Job();
        $job2->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
        ->setAddress($this->faker->address)
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setExpireAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setPostsNumber($this->faker->numberBetween($min = 1, $max = 5))
        ->setType($job_types[array_rand($job_types)])
        ->setExperienceMin($this->faker->numberBetween($min = 0, $max = 3))
        ->setExperienceMax($this->faker->numberBetween($min = 3, $max = 10))
        ->setEducationLevel("DESS, DEA, Master, Bac + 5, Grandes Ecoles")
        ->setSalaryMin($this->faker->numberBetween($min = 1000, $max = 1500))
        ->setSalayMax($this->faker->numberBetween($min = 1500, $max = 3500))
        ->setRequiredLanguages("Français, anglais")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setRequirements($this->faker->paragraphs($nb = 3, $asText = true))
        ->setCompany($this->getReference(CompanyFixtures::COMPANY2))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->addTag($this->getReference(TagFixtures::PHP_REF))
        ->addTag($this->getReference(TagFixtures::SYMFONY_REF))
        ->addProfession($this->getReference(ProfessionFixtures::ADMINISTRATION));

        $job3 = new Job();
        $job3->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
        ->setAddress($this->faker->address)
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setExpireAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setPostsNumber($this->faker->numberBetween($min = 1, $max = 5))
        ->setType($job_types[array_rand($job_types)])
        ->setExperienceMin($this->faker->numberBetween($min = 0, $max = 3))
        ->setExperienceMax($this->faker->numberBetween($min = 3, $max = 10))
        ->setEducationLevel("DESS, DEA, Master, Bac + 5, Grandes Ecoles")
        ->setSalaryMin($this->faker->numberBetween($min = 1000, $max = 1500))
        ->setSalayMax($this->faker->numberBetween($min = 1500, $max = 3500))
        ->setRequiredLanguages("Français, anglais")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setRequirements($this->faker->paragraphs($nb = 3, $asText = true))
        ->setCompany($this->getReference(CompanyFixtures::COMPANY3))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->addTag($this->getReference(TagFixtures::PHP_REF))
        ->addTag($this->getReference(TagFixtures::SYMFONY_REF))
        ->addProfession($this->getReference(ProfessionFixtures::SANTE));

        $job4 = new Job();
        $job4->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
        ->setAddress($this->faker->address)
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setExpireAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setPostsNumber($this->faker->numberBetween($min = 1, $max = 5))
        ->setType($job_types[array_rand($job_types)])
        ->setExperienceMin($this->faker->numberBetween($min = 0, $max = 3))
        ->setExperienceMax($this->faker->numberBetween($min = 3, $max = 10))
        ->setEducationLevel("DESS, DEA, Master, Bac + 5, Grandes Ecoles")
        ->setSalaryMin($this->faker->numberBetween($min = 1000, $max = 1500))
        ->setSalayMax($this->faker->numberBetween($min = 1500, $max = 3500))
        ->setRequiredLanguages("Français, anglais")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setRequirements($this->faker->paragraphs($nb = 3, $asText = true))
        ->setCompany($this->getReference(CompanyFixtures::COMPANY4))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->addTag($this->getReference(TagFixtures::PHP_REF))
        ->addTag($this->getReference(TagFixtures::SYMFONY_REF))
        ->addProfession($this->getReference(ProfessionFixtures::FINANCE));

        $job5 = new Job();
        $job5->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
        ->setAddress($this->faker->address)
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setExpireAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setPostsNumber($this->faker->numberBetween($min = 1, $max = 5))
        ->setType($job_types[array_rand($job_types)])
        ->setExperienceMin($this->faker->numberBetween($min = 0, $max = 3))
        ->setExperienceMax($this->faker->numberBetween($min = 3, $max = 10))
        ->setEducationLevel("DESS, DEA, Master, Bac + 5, Grandes Ecoles")
        ->setSalaryMin($this->faker->numberBetween($min = 1000, $max = 1500))
        ->setSalayMax($this->faker->numberBetween($min = 1500, $max = 3500))
        ->setRequiredLanguages("Français, anglais")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setRequirements($this->faker->paragraphs($nb = 3, $asText = true))
        ->setCompany($this->getReference(CompanyFixtures::COMPANY1))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->addTag($this->getReference(TagFixtures::PHP_REF))
        ->addTag($this->getReference(TagFixtures::SYMFONY_REF))
        ->addProfession($this->getReference(ProfessionFixtures::INFORMATIQUE));

        $job6 = new Job();
        $job6->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
        ->setAddress($this->faker->address)
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setExpireAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setPostsNumber($this->faker->numberBetween($min = 1, $max = 5))
        ->setType($job_types[array_rand($job_types)])
        ->setExperienceMin($this->faker->numberBetween($min = 0, $max = 3))
        ->setExperienceMax($this->faker->numberBetween($min = 3, $max = 10))
        ->setEducationLevel("DESS, DEA, Master, Bac + 5, Grandes Ecoles")
        ->setSalaryMin($this->faker->numberBetween($min = 1000, $max = 1500))
        ->setSalayMax($this->faker->numberBetween($min = 1500, $max = 3500))
        ->setRequiredLanguages("Français, anglais")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setRequirements($this->faker->paragraphs($nb = 3, $asText = true))
        ->setCompany($this->getReference(CompanyFixtures::COMPANY3))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->addTag($this->getReference(TagFixtures::PHP_REF))
        ->addTag($this->getReference(TagFixtures::SYMFONY_REF))
        ->addProfession($this->getReference(ProfessionFixtures::INFORMATIQUE));

        $job7 = new Job();
        $job7->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
        ->setAddress($this->faker->address)
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setExpireAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setPostsNumber($this->faker->numberBetween($min = 1, $max = 5))
        ->setType($job_types[array_rand($job_types)])
        ->setExperienceMin($this->faker->numberBetween($min = 0, $max = 3))
        ->setExperienceMax($this->faker->numberBetween($min = 3, $max = 10))
        ->setEducationLevel("DESS, DEA, Master, Bac + 5, Grandes Ecoles")
        ->setSalaryMin($this->faker->numberBetween($min = 1000, $max = 1500))
        ->setSalayMax($this->faker->numberBetween($min = 1500, $max = 3500))
        ->setRequiredLanguages("Français, anglais")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setRequirements($this->faker->paragraphs($nb = 3, $asText = true))
        ->setCompany($this->getReference(CompanyFixtures::COMPANY1))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->addTag($this->getReference(TagFixtures::PHP_REF))
        ->addTag($this->getReference(TagFixtures::SYMFONY_REF))
        ->addProfession($this->getReference(ProfessionFixtures::INFORMATIQUE))
        ->addProfession($this->getReference(ProfessionFixtures::INGENIERIE));

        $job8 = new Job();
        $job8->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
        ->setAddress($this->faker->address)
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setExpireAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setPostsNumber($this->faker->numberBetween($min = 1, $max = 5))
        ->setType($job_types[array_rand($job_types)])
        ->setExperienceMin($this->faker->numberBetween($min = 0, $max = 3))
        ->setExperienceMax($this->faker->numberBetween($min = 3, $max = 10))
        ->setEducationLevel("DESS, DEA, Master, Bac + 5, Grandes Ecoles")
        ->setSalaryMin($this->faker->numberBetween($min = 1000, $max = 1500))
        ->setSalayMax($this->faker->numberBetween($min = 1500, $max = 3500))
        ->setRequiredLanguages("Français, anglais")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setRequirements($this->faker->paragraphs($nb = 3, $asText = true))
        ->setCompany($this->getReference(CompanyFixtures::COMPANY1))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->addTag($this->getReference(TagFixtures::PHP_REF))
        ->addTag($this->getReference(TagFixtures::SYMFONY_REF))
        ->addProfession($this->getReference(ProfessionFixtures::INFORMATIQUE));

        $job9 = new Job();
        $job9->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
        ->setAddress($this->faker->address)
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setExpireAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setPostsNumber($this->faker->numberBetween($min = 1, $max = 5))
        ->setType($job_types[array_rand($job_types)])
        ->setExperienceMin($this->faker->numberBetween($min = 0, $max = 3))
        ->setExperienceMax($this->faker->numberBetween($min = 3, $max = 10))
        ->setEducationLevel("DESS, DEA, Master, Bac + 5, Grandes Ecoles")
        ->setSalaryMin($this->faker->numberBetween($min = 1000, $max = 1500))
        ->setSalayMax($this->faker->numberBetween($min = 1500, $max = 3500))
        ->setRequiredLanguages("Français, anglais")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setRequirements($this->faker->paragraphs($nb = 3, $asText = true))
        ->setCompany($this->getReference(CompanyFixtures::COMPANY2))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->addTag($this->getReference(TagFixtures::PHP_REF))
        ->addTag($this->getReference(TagFixtures::SYMFONY_REF))
        ->addProfession($this->getReference(ProfessionFixtures::SANTE));

        $job10 = new Job();
        $job10->setTitle($this->faker->sentence($nbWords = 6, $variableNbWords = true))
        ->setAddress($this->faker->address)
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setExpireAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)))
        ->setPostsNumber($this->faker->numberBetween($min = 1, $max = 5))
        ->setType($job_types[array_rand($job_types)])
        ->setExperienceMin($this->faker->numberBetween($min = 0, $max = 3))
        ->setExperienceMax($this->faker->numberBetween($min = 3, $max = 10))
        ->setEducationLevel("DESS, DEA, Master, Bac + 5, Grandes Ecoles")
        ->setSalaryMin($this->faker->numberBetween($min = 1000, $max = 1500))
        ->setSalayMax($this->faker->numberBetween($min = 1500, $max = 3500))
        ->setRequiredLanguages("Français, anglais")
        ->setDescription($this->faker->paragraphs($nb = 3, $asText = true))
        ->setRequirements($this->faker->paragraphs($nb = 3, $asText = true))
        ->setCompany($this->getReference(CompanyFixtures::COMPANY4))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->addTag($this->getReference(TagFixtures::PHP_REF))
        ->addTag($this->getReference(TagFixtures::SYMFONY_REF))
        ->addProfession($this->getReference(ProfessionFixtures::ADMINISTRATION));

        $manager->persist($job1);
        $manager->persist($job2);
        $manager->persist($job3);
        $manager->persist($job4);
        $manager->persist($job5);
        $manager->persist($job6);
        $manager->persist($job7);
        $manager->persist($job8);
        $manager->persist($job9);
        $manager->persist($job10);

        $manager->flush();

        $this->addReference(self::JOB1, $job1);
        $this->addReference(self::JOB2, $job2);
        $this->addReference(self::JOB3, $job3);
        $this->addReference(self::JOB4, $job4);
        $this->addReference(self::JOB5, $job5);
        $this->addReference(self::JOB6, $job6);
        $this->addReference(self::JOB7, $job7);
        $this->addReference(self::JOB8, $job8);
        $this->addReference(self::JOB9, $job9);
        $this->addReference(self::JOB10, $job10);

    }

    public function getDependencies(){
        return [
            CompanyFixtures::class,
            CountryFixtures::class,
            TagFixtures::class
        ];
    }
}

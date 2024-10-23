<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker\Factory;

class UserFixtures extends Fixture{
    private $passwordEncoder;
    protected $faker;

    public const USER = "user";
    public const ADMIN = "admin";
    public const USER1_COMPANY = "USER1_COMPANY";
    public const USER2_COMPANY = "USER2_COMPANY";
    public const USER3_COMPANY = "USER3_COMPANY";
    public const USER4_COMPANY = "USER4_COMPANY";
    public const USER5_COMPANY = "USER5_COMPANY";
    public const USER1_TRAINING_COMPANY = "USER1_TRAINING_COMPANY";
    public const USER2_TRAINING_COMPANY = "USER2_TRAINING_COMPANY";
    public const USER3_TRAINING_COMPANY = "USER3_TRAINING_COMPANY";
    public const USER4_TRAINING_COMPANY = "USER4_TRAINING_COMPANY";
    public const USER5_TRAINING_COMPANY = "USER5_TRAINING_COMPANY";
    public const USER1_SEEKER = "USER1_SEEKER";
    public const USER2_SEEKER = "USER2_SEEKER";
    public const USER3_SEEKER = "USER3_SEEKER";
    public const USER4_SEEKER = "USER4_SEEKER";


    public function __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager){
        $this->faker = Factory::create();

        $user = new User();
        $user->setEmail("user@gmail.com")
        ->setUsername("user")
        ->setRoles(["ROLE_USER"])
        ->setPassword($this->passwordEncoder->encodePassword($user, 'user'))
        ->setIsVerified(true)
        ->setCreatedAt(new \DateTimeImmutable());

        $admin = new User();
        $admin->setEmail("admin@gmail.com")
        ->setUsername("admin")
        ->setRoles(["ROLE_ADMIN"])
        ->setPassword($this->passwordEncoder->encodePassword($admin, "admin"))
        ->setIsVerified(true)
        ->setCreatedAt(new \DateTimeImmutable());

        ////////////////////////////////////////////////////////////////////////////////
        // Companies
        $username = $this->faker->userName;
        $company1 = new User();
        $company1->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_COMPANY"])
        ->setPassword($this->passwordEncoder->encodePassword($company1, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));

        $username = $this->faker->userName;
        $company2 = new User();
        $company2->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_COMPANY"])
        ->setPassword($this->passwordEncoder->encodePassword($company2, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));

        $username = $this->faker->userName;
        $company3 = new User();
        $company3->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_COMPANY"])
        ->setPassword($this->passwordEncoder->encodePassword($company3, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));

        $username = $this->faker->userName;
        $company4 = new User();
        $company4->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_COMPANY"])
        ->setPassword($this->passwordEncoder->encodePassword($company4, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));

        $username = $this->faker->userName;
        $company5 = new User();
        $company5->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_COMPANY"])
        ->setPassword($this->passwordEncoder->encodePassword($company5, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));
        ////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////
        // Training Companies
        $username = $this->faker->userName;
        $training_company1 = new User();
        $training_company1->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_COMPANY"])
        ->setPassword($this->passwordEncoder->encodePassword($training_company1, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));

        $username = $this->faker->userName;
        $training_company2 = new User();
        $training_company2->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_COMPANY"])
        ->setPassword($this->passwordEncoder->encodePassword($training_company2, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));

        $username = $this->faker->userName;
        $training_company3 = new User();
        $training_company3->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_COMPANY"])
        ->setPassword($this->passwordEncoder->encodePassword($training_company3, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));

        $username = $this->faker->userName;
        $training_company4 = new User();
        $training_company4->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_COMPANY"])
        ->setPassword($this->passwordEncoder->encodePassword($training_company4, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));

        $username = $this->faker->userName;
        $training_company5 = new User();
        $training_company5->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_COMPANY"])
        ->setPassword($this->passwordEncoder->encodePassword($training_company5, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));
        ////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////
        // Seekers
        $username = $this->faker->userName;
        $seeker1 = new User();
        $seeker1->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_SEEKER"])
        ->setPassword($this->passwordEncoder->encodePassword($seeker1, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));

        $username = $this->faker->userName;
        $seeker2 = new User();
        $seeker2->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_SEEKER"])
        ->setPassword($this->passwordEncoder->encodePassword($seeker2, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));

        $username = $this->faker->userName;
        $seeker3 = new User();
        $seeker3->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_SEEKER"])
        ->setPassword($this->passwordEncoder->encodePassword($seeker3, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));

        $username = $this->faker->userName;
        $seeker4 = new User();
        $seeker4->setEmail($this->faker->email)
        ->setUsername($username)
        ->setRoles(["ROLE_SEEKER"])
        ->setPassword($this->passwordEncoder->encodePassword($seeker3, $username))
        ->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTimeThisDecade($max = 'now', $timezone = null)));
        ////////////////////////////////////////////////////////////////////////////////

        $manager->persist($user);
        $manager->persist($admin);

        $manager->persist($company1);
        $manager->persist($company2);
        $manager->persist($company3);
        $manager->persist($company4);

        $manager->persist($seeker1);
        $manager->persist($seeker2);
        $manager->persist($seeker3);
        $manager->persist($seeker4);

        $manager->flush();

        $this->addReference(self::USER, $user);
        // $this->addReference(self::ADMIN, $admin);

        $this->addReference(self::USER1_COMPANY, $company1);
        $this->addReference(self::USER2_COMPANY, $company2);
        $this->addReference(self::USER3_COMPANY, $company3);
        $this->addReference(self::USER4_COMPANY, $company4);
        $this->addReference(self::USER5_COMPANY, $company5);

        $this->addReference(self::USER1_TRAINING_COMPANY, $training_company1);
        $this->addReference(self::USER2_TRAINING_COMPANY, $training_company2);
        $this->addReference(self::USER3_TRAINING_COMPANY, $training_company3);
        $this->addReference(self::USER4_TRAINING_COMPANY, $training_company4);
        $this->addReference(self::USER5_TRAINING_COMPANY, $training_company5);

        $this->addReference(self::USER1_SEEKER, $seeker1);
        $this->addReference(self::USER2_SEEKER, $seeker2);
        $this->addReference(self::USER3_SEEKER, $seeker3);
        $this->addReference(self::USER4_SEEKER, $seeker4);

    }
}

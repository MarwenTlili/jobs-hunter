<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture {
    public const PHP_REF = "php-tag";
    public const SYMFONY_REF = "symfony-tag";
    public const JAVA_REF = "java-tag";
    public const JEE_REF = "jee-tag";
    public const MYSQL_REF = "mysql-tag";

    public const DEV_REF = "dev-tag";
    public const WEB_REF = "web-tag";
    public const MOBILE_REF = "mobile-tag";
    public const GIT_REF = "git-tag";

    public function load(ObjectManager $manager){
        $symfony_tag = new Tag();
        $symfony_tag->setName("Symfony");

        $jee = new Tag();
        $jee->setName("JEE");

        $mysql = new Tag();
        $mysql->setName("MySQL");

        $java = new Tag();
        $java->setName("Java");

        $php = new Tag();
        $php->setName("PHP");

        $dev = new Tag();
        $dev->setName("Développeur");

        $web = new Tag();
        $web->setName("Web");

        $mobile = new Tag();
        $mobile->setName("Mobile");

        $git = new Tag();
        $git->setName("Git");


        $manager->persist($php);
        $manager->persist($symfony_tag);
        $manager->persist($java);
        $manager->persist($jee);
        $manager->persist($git);
        $manager->persist($dev);
        $manager->persist($web);
        $manager->persist($mobile);
        $manager->persist($mysql);

        $manager->flush();

        $this->addReference(self::PHP_REF, $php);
        $this->addReference(self::SYMFONY_REF, $symfony_tag);
        $this->addReference(self::JAVA_REF, $java);
        $this->addReference(self::JEE_REF, $jee);
        $this->addReference(self::GIT_REF, $git);
        $this->addReference(self::DEV_REF, $dev);
        $this->addReference(self::WEB_REF, $web);
        $this->addReference(self::MOBILE_REF, $mobile);
        $this->addReference(self::MYSQL_REF, $mysql);

    }

}

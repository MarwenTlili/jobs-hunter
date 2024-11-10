<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ContactFixtures extends Fixture {
  private $faker;

  public function load(ObjectManager $manager) {
    $this->faker = Factory::create();

    for ($i = 0; $i < 30; $i++) {
      $contact = new Contact();
      $firstName = $this->faker->firstName;
      $lastName = $this->faker->lastName;

      $contact->setFullName($firstName . ' ' . $lastName);
      $contact->setEmail(strtolower($firstName) . '.' . strtolower($lastName) . '@example.com');
      $contact->setMessage($this->faker->text);
      $contact->setIsOpen(false);

      $manager->persist($contact);
      $manager->flush();
    }
  }
}

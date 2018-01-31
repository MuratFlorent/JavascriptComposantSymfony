<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Disponibility;

class LoadDisponibilities extends Fixture
{
	public function load(ObjectManager $manager)
	{

		$date = new \DateTime();
		for($i = 0; $i<200; $i++){

			$heure = new \DateTime();
			$disponibility = new Disponibility();
			$disponibility->setDate($date);
			$disponibility->setHeure($heure);
			$heure = $heure->modify("+30 minutes");

			$manager->persist($disponibility);
			$manager->flush();
		}
	}	
}
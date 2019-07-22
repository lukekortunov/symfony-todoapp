<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TaskFixtures extends Fixture
{
    
    public function load( ObjectManager $manager )
    {
        
        /** @var Generator $faker */
        $faker = Factory::create();
    
        for( $i = 0; $i < 500; $i++ ) {
            
            $task = new Task;
            $task->setTitle( $faker->sentence );
            $task->setStatus( $faker->boolean );
            
            $manager->persist( $task );
            
        }
        
        $manager->flush();
    
    }
    
}

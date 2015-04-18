<?php
// ./module/Domain/src/Domain/Fixture/LoadBookData.php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineModule\Stdlib\Hydrator\Strategy;

class LoadBookData extends AbstractFixture  implements OrderedFixtureInterface, FixtureInterface
{

    private $em;

    public function getOrder()
    {
        return 1;
    }

    public function load(ObjectManager $em)
    {
        $data = $this->getBooksArray();

    	foreach ($data as $row) {

    		$book = new \Domain\Entity\Book;
            $hydrator = new DoctrineHydrator($em, $book);
            $book = $hydrator->hydrate($row, $book);

		    $em->persist($book);
            //$this->addReference($row['reference'], $association);
            //
    	}
        $em->flush();
    }


    public function getBooksArray()
    {
    	return array(
            array(
                "title" => "The Hobbit",
                "description" => "In a hole in the ground there lived a hobbit. Not a nasty, dirty, wet hole, filled with the ends of worms and an oozy smell, nor yet a dry, bare, sandy hole with nothing in it to sit down on or to eat: it was a hobbit-hole, and that means comfort.",
                "isbn" => "0618260307",
                "isbn13" => "9780618260300",
                "language" => "English",
                "published" => "15-08-2002",
                "publisher" => "Houghton Mifflin"
            ),
            array(
                "title" => "The Fellowship of the Ring",
                "description" => "Frodo Baggins knew the Ringwraiths were searching for him - and the Ring of Power he bore that would enable Sauron to destroy all that was good in Middle-earth. Now it was up to Frodo and his faithful servant Sam to carry the Ring to where it could be detroyed - in the very center of Sauron's dark kingdom.",
                "isbn" => "0618346252",
                "isbn13" => "9780618346257",
                "language" => "English",
                "published" => "05-09-2003",
                "publisher" => "Houghton Mifflin Harcourt"
            ),
            array(
                "title" => "The Return of the King",
                "description" => "Concluding the story begun in The Hobbit, this is the final part of Tolkien's epic masterpiece, The Lord of the Rings. The armies of the Dark Lord are massing as his evil shadow spreads ever wider. Men, Dwarves, Elves and Ents unite forces to do battle agains the Dark. Meanwhile, Frodo and Sam struggle further into Mordor in their heroic quest to destroy the One Ring.",
                "isbn" => "0345339738",
                "isbn13" => "9780345339737",
                "language" => "English",
                "published" => "12-07-1986",
                "publisher" => "Houghton Mifflin Harcourt"
            ),
        );
    }
}
<?php

namespace App\DataFixtures;

use \Bluemmb\Faker\PicsumPhotosProvider;
use App\Entity\Category;
use App\Entity\Product;
use Faker\Factory as FakerFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    protected $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }
    public function load(ObjectManager $manager): void
    {
        $fake = FakerFactory::create('fr_FR');
        $fake->addProvider(new PicsumPhotosProvider($fake));
        for ($c = 0; $c < 3; $c++) {
            $category = new Category;
            $category->setName($fake->sentence())
                ->setSlug(strtolower($this->slugger->slug($category->getName())));
            $manager->persist($category);
            for ($p = 0; $p < mt_rand(15, 20); $p++) {

                $product = new Product;
                $product->setName($fake->sentence())
                    ->setDescription($fake->sentence())
                    ->setImgUrl($fake->imageUrl(400, 400, true))
                    ->setPrice(mt_rand(100, 300))
                    ->setSlug(strtolower($this->slugger->slug($product->getName())))
                    ->setCategory($category);
                $manager->persist($product);
            }
        }

        $manager->flush();
    }
}

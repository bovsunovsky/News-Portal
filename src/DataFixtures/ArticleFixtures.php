<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends AbstractFixture
{
    private const ARTICLES_COUNT = 15;

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < self::ARTICLES_COUNT; ++$i) {
            $article = $this->create();

            if ($this->faker->boolean(80)) {
                $article->publish();
            }

            $manager->persist($article);
        }

        $manager->flush();
    }

    private function create(): Article
    {
        $article = new Article($this->generateTitle());

        return $article
                ->addImage($this->faker->imageUrl())
                ->addShortDescription($this->generateShortDescription())
                ->addBody($this->generateBody());
    }

    private function generateTitle(): string
    {
        $title = $this->faker->words(
            $this->faker->numberBetween(1, 4),
            true
        );

        return $title;
    }

    public function generateShortDescription(): string
    {
        $shortDescription = $this->faker->words(
            $this->faker->numberBetween(3, 7),
            true
        );
        $shortDescription = \ucfirst($shortDescription);

        return $shortDescription;
    }

    private function generateBody(): string
    {
        $body = $this->faker->words(
            $this->faker->numberBetween(100, 200),
            true
        );
        $body = \ucfirst($body);

        return $body;
    }
}

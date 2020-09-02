<?php

declare(strict_types=1);

namespace App\Service;

use App\Collection\HomePageArticles;
use App\ViewModel\HomePageArticle;
use Faker\Factory;
use Faker\Generator;

class HomePageArticlesFakeProvider implements HomePageArticlesProviderInterface
{
    private Generator $faker;

    private const ARTICLES_COUNT = 10;
    private const CATEGORIES = [
        'World',
        'Sport',
        'IT',
        'Science',
    ];

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function getList(): HomePageArticles
    {
        $articles = [];
        for ($i = 0; $i < self::ARTICLES_COUNT; ++$i) {
            $articles[] = $this->createArticle($i + 1);
        }

        return new HomePageArticles(...$articles);
    }

    private function createArticle(int $id): HomePageArticle
    {
        $title = $this->faker->words(
            $this->faker->numberBetween(1, 4),
            true
        );
        $title = \ucfirst($title);

        $body = $this->faker->words(
            $this->faker->numberBetween(100, 200),
            true
        );
        $body = \ucfirst($body);

        return new HomePageArticle(
            $id,
            $this->faker->randomElement(self::CATEGORIES),
            $title,
            \DateTimeImmutable::createFromMutable($this->faker->dateTimeThisYear),
            $this->faker->imageUrl(),
            $this->faker->words(
                $this->faker->numberBetween(3, 7),
                true
            ),
            $body,
        );
    }

    public function getOneArticle(int $id): HomePageArticle
    {
        return $this->createArticle($id);
    }
}

<?php

declare(strict_types=1);

namespace App\Service;

use App\ViewModel\Article;
use Faker\Factory;
use Faker\Generator;

class ArticleFakeProvider implements ArticleProviderInterface
{
    private Generator $faker;

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


    private function createArticle(int $id): Article
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

        return new Article(
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

    public function getArticle(int $id): Article
    {
        return $this->createArticle($id);
    }
}

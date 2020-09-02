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

    private function create(int $id): Article
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
            $body,
        );
    }

    public function getById(int $id): Article
    {
        return $this->create($id);
    }
}

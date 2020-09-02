<?php

declare(strict_types=1);

namespace App\ViewModel;

final class Article
{
    private int $id;
    private string $categoryTitle;
    private string $title;
    private \DateTimeImmutable $publicationDate;
    private string $body;

    public function __construct(
        int $id,
        string $categoryTitle,
        string $title,
        \DateTimeImmutable $publicationDate,
        string $body)
    {
        $this->id = $id;
        $this->categoryTitle = $categoryTitle;
        $this->title = $title;
        $this->publicationDate = $publicationDate;
        $this->body = $body;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategoryTitle(): string
    {
        return $this->categoryTitle;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPublicationDate(): \DateTimeImmutable
    {
        return $this->publicationDate;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}

<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\ArticleRepository;
use App\ViewModel\FullArticle;

final class ArticleProviderService implements ArticleProviderInterface
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function getById(int $id): FullArticle
    {
        $article = $this->articleRepository->getById($id);

        return $article->getArticle();
    }
}

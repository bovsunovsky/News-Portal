<?php

declare(strict_types=1);

namespace App\Service;

use App\ViewModel\FullArticle;

interface ArticleProviderInterface
{
    public function getById(int $id): FullArticle;
}

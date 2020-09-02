<?php

declare(strict_types=1);

namespace App\Service;

use App\ViewModel\Article;

interface ArticleProviderInterface
{
    public function getById(int $id): Article;
}

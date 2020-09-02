<?php

declare(strict_types=1);

namespace App\Service;

interface ArticleProviderInterface
{
    public function getArticle(int $id);
}

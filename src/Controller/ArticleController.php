<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ArticleProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ArticleController extends AbstractController
{
    private ArticleProviderInterface $articleProvider;

    public function __construct(ArticleProviderInterface $articleProvider)
    {
        $this->articleProvider = $articleProvider;
    }

    /**
     * @Route ("/article/{id}", methods={"GET"}, name="app_article")
     * @param int $id
     * @return Response
     */
    public function article(int $id): Response
    {
        $article = $this->articleProvider->getArticle($id);

        return $this->render('article/article.html.twig', [
            'article' => $article,
        ]);
    }
}

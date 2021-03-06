<?php

namespace App\Http\Controllers\PhpReboot\Magazine;

use App\Http\Controllers\Controller;
use App\Services\ArticleService;
use App\Services\MagazineService;

/**
 * Class MagazineController contains common controllers for magazine.
 * @package App\Http\Controllers\PhpReboot\Magazine
 */
class MagazineController extends Controller
{
    public function monthPage($shortName, MagazineService $magazineService, ArticleService $articleService)
    {
        $magazine = $magazineService->getMagazineByShortName($shortName);
        $articles = $articleService->getCategorizedArticlesByMagazine($magazine->id);

        $viewData = [
            'magazine' => $magazine,
            'articles' => $articles,
            'menu' => 'magazine',
            'contentTitleSmall' => $magazine->name . ' issue.',
        ];

        return view('PhpReboot.Magazine.monthPage', $viewData);
    }

    public function articleDetails($articleId, ArticleService $articleService)
    {
        $article = $articleService->getArticle($articleId);

        $viewData = [
            'article' => $article,
            'menu' => 'magazine',
            'contentTitleSmall' => $article->magazine->name . ' issue.',
        ];

        return view('PhpReboot.Magazine.articleDetails', $viewData);
    }
}

<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ArticleServiceInterface;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleServiceInterface $articleService)
    {
        $this->articleService = $articleService;
    }

    public function show(Request $request, $id)
    {
        return view('site.article-details', [
            'data' => $this->articleService->find($id)
        ]);
    }
}

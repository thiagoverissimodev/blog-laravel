<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ArticleServiceInterface;
use App\Services\Contracts\ContentServiceInterface;
use App\Services\Contracts\GalleryServiceInterface;
use App\Services\Contracts\SectionServiceInterface;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $sectionService;
    protected $galleryService;
    protected $articleService;
    protected $contentService;
    
    public function __construct(
        SectionServiceInterface $sectionService, 
        GalleryServiceInterface $galleryService, 
        ArticleServiceInterface $articleService, 
        ContentServiceInterface $contentService
        )
    {
        $this->sectionService = $sectionService;
        $this->galleryService = $galleryService;
        $this->articleService = $articleService;
        $this->contentService = $contentService;
    }

    public function makePages()
    {
        
    }

    public function index()
    {
        return view('welcome', [
            'gallery'        => $this->galleryService->whereSimple('status', 1)->where('category_id', 1)->first(),
            'gallery_video'  => $this->galleryService->whereSimple('status', 1)->where('category_id', 2)->first(),
            'contents'       => $this->contentService->whereSimple('section_id', 3)->orderBy('priority', 'asc')->get(),
            'menu'           => $this->sectionService->whereSimple('menu', 1)->get(),
            'articles'       => $this->articleService->allWithPaginate(4)
        ]);
    }

    public function articles(){
        return view('site.article', [
            'menu'           => $this->sectionService->whereSimple('menu', 1)->get(),
            'articles'       => $this->articleService->all()
        ]);
    }
}

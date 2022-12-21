<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CategoryServiceInterface;
use App\Services\Contracts\GalleryServiceInterface;
use App\Services\Contracts\SectionServiceInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    protected $galleryService;
    protected $sectionService;
    protected $categoryService;

    public function __construct(
        GalleryServiceInterface $galleryService, 
        SectionServiceInterface $sectionService, 
        CategoryServiceInterface $categoryService
    )
    {
        $this->galleryService = $galleryService;
        $this->sectionService = $sectionService;
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    { 
        $paginate     = ($request->input('per_page')) ? $request->input('per_page') : 10;
        $orderByField = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';
        return view('dashboard.gallery.index', [
            'galleries' => $this->galleryService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }

    public function create()
    {
        return view('dashboard.gallery.show',[
            'sectionsParents' => $this->sectionService->whereSimple('menu','2')->pluck('name','id'),
            'categories' => $this->categoryService->all()->pluck('name', 'id')
        ]);
    }

    public function store(Request $request)
    {
        try{
            $this->galleryService->createWithStorage(
                $request->all(), 
                [
                    [
                        'name' => 'image', 
                        'file' => $request->file('image')
                    ]
                ], 
                'Galerias'
            );
            Alert::success('Galeria', 'Cadastro realizado com sucesso!');
        }catch(\Exception $e)
        {
            Alert::error('Galeria', $e->getMessage());
        }
        return redirect(route('dashboard.gallery'));
    }    

    public function show($id)
    {
        return view('dashboard.gallery.show', [
            'data' => $this->galleryService->find($id),
            'categories' => $this->categoryService->all()->pluck('name','id')
        ]);
    }

    public function update(Request $request, $id)
    {
       
        try{
            $this->galleryService->updateWithStorage(
                $request->all(),
                $id, 
                [
                    [
                        'name' => 'image', 
                        'file' => $request->file('image')
                    ]
                ], 
                'Galerias'
            );
            Alert::success('Galeria', 'Cadastro atualizado com sucesso!');
        }catch(\Exception $e)
        {
            Alert::error('Galeria', $e->getMessage());
        }
        return redirect(route('dashboard.gallery'));
    }
    
    public function destroy($id)
    {
        try{
            $this->galleryService->destroy($id);
            Alert::success('Galeria','Excluída com sucesso!');
        }catch(\Exception $e){
            Alert::error('Galeria', $e->getMessage());
        }
        return redirect(route('dashboard.gallery'));
    }
}



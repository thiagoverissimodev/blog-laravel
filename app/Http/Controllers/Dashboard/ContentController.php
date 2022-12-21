<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ContentServiceInterface;
use App\Services\Contracts\SectionServiceInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContentController extends Controller
{
    protected $contentService;
    protected $sectionService;

    public function __construct(ContentServiceInterface $contentService, SectionServiceInterface $sectionService)
    {
        $this->contentService = $contentService;
        $this->sectionService = $sectionService;
    }
    
    public function index(Request $request)
    {
        $paginate = ($request->input('per_page')) ? $request->input('per_page') : 10;
        $orderByField = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';

        return view('dashboard.content.index', [
            'contents' => $this->contentService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }

    
    public function create()
    {
        return view('dashboard.content.show', [
            'sectionsParents' => $this->sectionService->whereSimple('menu','2')->pluck('name','id')
        ]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'section_id' => 'required',
            'image_cover' => 'mimes:jpg,png,webp',
            'image_content' => 'mimes:jpg,png,webp',
            'status' => 'required'
        ]);
        
        try{
            $this->contentService->createWithStorage(
                $request->all(),
                [
                    [
                        'name' => 'image_content',
                        'file' => $request->file('image_content')
                    ],
                    [
                        'name' => 'image_cover',
                        'file' => $request->file('image_cover')
                    ]
                    ],
                    'Conteudo'
                );

            Alert::success('Conteúdo', 'Cadastro realizado com sucesso!');
        }catch(\Exception $e){
            Alert::error('Conteúdo', $e->getMessage());
        }
        return redirect(route('dashboard.content'));
    }

    
    public function show($id)
    {
        return view('dashboard.content.show', [
            'data' => $this->contentService->find($id),
            'sectionsParents' => $this->sectionService->whereSimple('menu','2')->pluck('name','id')
        ]);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'section_id' => 'required',
            'image_cover' => 'mimes:jpg,png,webp',
            'image_content' => 'mimes:jpg,png,webp',
            'status' => 'required'
        ]);

        try{
            $this->contentService->updateWithStorage(
                $request->all(),
                $id, 
                [
                    [
                        'name' => 'image_content', 
                        'file' => $request->file('image_content')
                    ],
                    [ 
                        'name' => 'image_cover', 
                        'file' => $request->file('image_cover')
                    ]
                ], 
                'Conteúdos'
            );
        
        Alert::success('Conteúdos', 'Atualizado com sucesso!');
    }catch(\Exception $e){
        Alert::error('Conteúdos', $e->getMessage());
    }
    return redirect(route('dashboard.content'));

    }

    
    public function destroy($id)
    {
        try{
            $this->contentService->destroy($id);
            Alert::success('Conteúdo', 'Conteúdo excluído com sucesso!');
        }catch(\Exception $e){
            Alert::error('Conteúdo', $e->getMessage());
        }

        return redirect(route('dashboard.content'));
    }
}

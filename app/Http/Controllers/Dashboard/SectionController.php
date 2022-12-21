<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Services\Contracts\SectionServiceInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SectionController extends Controller
{
    protected $sectionService;
    
    public function __construct(SectionServiceInterface $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    public function index(Request $request)
    {
        $paginate     = ($request->input('per_page')) ? $request->input('per_page') : 10;
        $orderByField = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';

        return view('dashboard.section.index', [
            'sections' => $this->sectionService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }

    
    public function create()
    {
        return view('dashboard.section.show', [
            'sectionsParents' => $this->sectionService->whereSimple('menu','2')->pluck('name','id')
        ]);
    }

    
    public function store(Request $request)
    {
        try{
            $this->sectionService->createWithStorage(
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
                'Seções'
            );
            Alert::success('Seção', 'Cadastro realizado com sucesso!');
        }catch(\Exception $e)
        {
            Alert::error('Seção', $e->getMessage());
        }
        return redirect(route('dashboard.section'));
    }

    
    public function show($id)
    {
        return view('dashboard.section.show', [
            'data' => $this->sectionService->find($id),
            'sectionsParents' => $this->sectionService->whereSimple('menu','2')->pluck('name','id')
        ]);
    }

    public function edit(Section $section)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{
                $this->sectionService->updateWithStorage(
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
                    'Seções'
                );
            
            Alert::success('Seção', 'Atualizado com sucesso!');
        }catch(\Exception $e){
            Alert::error('Seção', $e->getMessage());
        }
        return redirect(route('dashboard.section'));
    }

    public function destroy($id)
    {
        try{
            $this->sectionService->destroy($id);
            Alert::success('Seção','Excluído com sucesso!');
        }catch(\Exception $e){
            Alert::error('Seção', $e->getMessage());
        }
        return redirect(route('dashboard.section'));
    }
}

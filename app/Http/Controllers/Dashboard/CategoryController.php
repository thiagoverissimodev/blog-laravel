<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CategoryServiceInterface;
use App\Services\Contracts\SectionServiceInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $sectionService;

    public function __construct(CategoryServiceInterface $categoryService, SectionServiceInterface $sectionService)
    {
        // parent::__construct($categoryService);
        $this->categoryService = $categoryService;
    }
   
    public function index(Request $request)
    {
        $paginate     = ($request->input('per_page')) ? $request->input('per_page') : 10;
        $orderByField = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';
        return view('dashboard.category.index', [
            'categories' => $this->categoryService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }

    public function create()
    {
        return view('dashboard.category.show');
    }

    public function store(Request $request)
    {
        try{
            $this->categoryService->createWithStorage(
                $request->all(), 
                [
                    [
                        'name' => 'image', 
                        'file' => $request->file('image')
                    ]
                ], 
                'Categoria'
            );
            Alert::success('Categoria', 'Cadastro realizado com sucesso!');
        }catch(\Exception $e)
        {
            Alert::error('Categoria', $e->getMessage());
        }
        return redirect(route('dashboard.category'));
    }

    public function show($id)
    {
        return view('dashboard.category.show', 
            [
              'data' => $this->categoryService->find($id) 
            ]
        );
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{
            $this->categoryService->updateWithStorage(
                $request->all(),
                $id, 
                [
                    [
                        'name' => 'image', 
                        'file' => $request->file('image')
                    ]
                ], 
                'Categoria'
            );
            Alert::success('Categoria', 'Cadastro atualizado com sucesso!');
        }catch(\Exception $e)
        {
            Alert::error('Categoria', $e->getMessage());
        }
        return redirect(route('dashboard.category'));
    }

    public function destroy($id)
    {
        try{
            $this->categoryService->destroy($id);
            Alert::success('Categoria', 'Categoria excluída com sucesso!');
        }catch(\Exception $e){
            Alert::error('Categoria', $e->getMessage());
        }

        return redirect(route('dashboard.category'));
    }
}

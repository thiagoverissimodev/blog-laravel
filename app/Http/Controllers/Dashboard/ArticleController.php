<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ArticleServiceInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleServiceInterface $articleService)
    {
        $this->articleService = $articleService;
    }
    
    public function index(Request $request)
    {
        $paginate     = ($request->input('per_page')) ? $request->input('per_page') : 10;
        $orderByField = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';
        return view('dashboard.article.index', [
            'articles' => $this->articleService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }
    
    public function create()
    {
        return view('dashboard.article.show');
    }

    public function store(Request $request)
    {
        try{
            $this->articleService->createWithStorage(
                $request->all(),
                [
                    [
                        'name' => 'image',
                        'file' => $request->file('image')
                    ]
                ],
                'Artigos'
            );
            Alert::success('Artigos', 'Cadastro realizado com sucesso!');
        }catch(\Exception $e){
            Alert::error('Artigos', $e->getMessage());
        }

        return redirect(route('dashboard.articles'));
    }

    public function show($id)
    {
        return view('dashboard.article.show', [
            'data' => $this->articleService->find($id)
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{
            $this->articleService->updateWithStorage(
                $request->all(),
                $id,
                [
                    [
                        'name' => 'image',
                        'file' => $request->file('image')
                    ]
                ],
                'Artigos'
            );
            Alert::success('Artigos', 'Atualização realizada com sucesso!');
        }catch(\Exception $e){
            Alert::error('Artigos', $e->getMessage());
        }

        return redirect(route('dashboard.articles'));
    }

    public function destroy($id)
    {
        try{
            $this->articleService->destroy($id);
            Alert::success('Artigos', 'Excluído com sucesso!');
        }catch(\Exception $e){
            Alert::error('Artigos', $e->getMessage());
        }
        return redirect(route('dashboard.articles'));
    }
}

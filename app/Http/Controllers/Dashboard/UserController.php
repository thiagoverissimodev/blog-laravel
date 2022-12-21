<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    public function index(Request $request)
    { 
        $paginate     = ($request->input('per_page')) ? $request->input('per_page') : 10;
        $orderByField = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';
        return view('dashboard.user.index', [
            'users' => $this->userService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }

    public function create()
    {
        return view('dashboard.user.show', [
            'user' => null
        ]);
    }

    public function store(Request $request)
    {
        try{
            $this->userService->createWithStorage(
                $request->all(), 
                [
                    [
                        'name' => 'image',
                        'file' => $request->file('image')
                    ]
                ], 
                'Usuários'
            );
            Alert::success('Usuários', 'Cadastro realizado com sucesso!');
        }catch(\Exception $e){
            Alert::error('Usuários', $e->getMessage());
        }
        return redirect(route('dashboard.user'));
    }

    public function show($id)
    {
        return view('dashboard.user.show',[
            'user' => $this->userService->find($id)
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{
            $this->userService->updateWithStorage($request->all(), $id, $request->file('image'), 'Usuários');
            Alert::success('Usuários', 'Atualizado com sucesso!');
        }catch(\Exception $e){
            Alert::error('Usuários', $e->getMessage());
        }
        return redirect(route('dashboard.user'));
    }

    public function destroy($id)
    {
        try{
            $this->userService->destroy($id);
            Alert::success('Usuários','Excluído com sucesso');
        }catch(\Exception $e){
            Alert::error('Usuários', $e->getMessage());
        }
        return redirect(route('dashboard.user'));
    }
}

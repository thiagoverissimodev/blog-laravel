<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Contracts\GalleryServiceInterface;
use App\Services\Contracts\ImageServiceInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ImageController extends Controller
{
    protected $imageService;
    protected $galleryService;

    public function __construct(ImageServiceInterface $imageService, GalleryServiceInterface $galleryService)
    {
        $this->imageService   = $imageService;
        $this->galleryService = $galleryService;
    }

    public function index(Request $request)
    {
        $paginate         = ($request->input('per_page')) ? $request->input('per_page') : 10;
        $orderByField     = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder     = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';

        return view('dashboard.image.index', [
            'images' => $this->imageService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }

    public function create()
    {
        return view('dashboard.image.show', [
            'galleries' => $this->galleryService->all()->pluck('name','id')
        ]);
    }

    public function store(Request $request)
    {
        try{
            $this->imageService->createWithStorage(
                $request->all(),
                [
                    [
                        'name' => 'image',
                        'file' => $request->file('image')
                    ]
                ],
                'Image'
            );

            Alert::success('Imagem', 'Imagem cadastrada com sucesso!');
        }catch(\Exception $e){
            Alert::error('Imagem', $e->getMessage());
        }
        return redirect(route('dashboard.image'));
    }

    public function show($id)
    {
        return view('dashboard.image.show',[
           'data' => $this->imageService->find($id),
           'galleries' => $this->galleryService->all()->pluck('name','id')
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{
            $this->imageService->updateWithStorage(
                $request->all(),
                $id,
                [
                    [
                        'name' => 'image',
                        'file' => $request->file('image')
                    ]
                ],
                'Imagem'
            );

            Alert::success('Imagem', 'Imagem editada com sucesso!');
        }catch(\Exception $e){
            Alert::error('Imagem', $e->getMessage());
        }
        return redirect(route('dashboard.image'));
    }

    public function destroy($id)
    {
        try{
            $this->imageService->destroy($id);
            Alert::success('Imagem', 'Excluído com sucesso');
        }catch(\Exception $e){
            Alert::error('Imagem',$e->getMessage());
        }

        return redirect(route('dashboard.image'));
    }
}

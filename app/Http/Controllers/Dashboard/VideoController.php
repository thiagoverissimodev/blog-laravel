<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Contracts\GalleryServiceInterface;
use App\Services\Contracts\SectionServiceInterface;
use App\Services\Contracts\VideoServiceInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VideoController extends Controller
{
    protected $videoService;
    protected $galleryService;

    public function __construct(VideoServiceInterface $videoService, GalleryServiceInterface $galleryService)
    {
        $this->videoService   = $videoService;
        $this->galleryService = $galleryService;
    }
    
    public function index(Request $request)
    {
        $paginate       = ($request->input('page')) ? $request->input('page') : 10;
        $orderByField   = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder   = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';

        return view('dashboard.video.index',[
            'videos' => $this->videoService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }

    
    public function create()
    {
        return view('dashboard.video.show', [
            'galleries' => $this->galleryService->all()->pluck('name','id')
        ]);
    }

    public function store(Request $request)
    {
        try{
            $this->videoService->createWithStorage(
                $request->all(),
                [
                    [
                        'name' => 'image',
                        'file' => $request->file('image')
                    ]
                ],
                'Videos'
            );
            Alert::success('Videos', 'Cadastro realizado com sucesso!');

        }catch(\Exception $e){
            Alert::error('Videos', $e->getMessage());
        }
        return redirect(route('dashboard.video'));
    }


    public function show($id)
    {
        return view('dashboard.video.show',[
            'data'      => $this->videoService->find($id),
            'galleries' => $this->galleryService->all()->pluck('name', 'id')
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{
            $this->videoService->updateWithStorage(
                $request->all(),
                $id,
                [
                    [
                        'name' => 'image',
                        'file' => $request->file('image')
                    ]
                ],
                'Videos'
            );
            Alert::success('Videos', 'Cadastro realizado com sucesso!');

        }catch(\Exception $e){
            Alert::error('Videos', $e->getMessage());
        }

        return redirect(route('dashboard.video'));
    }

    public function destroy($id)
    {
        //
    }
}

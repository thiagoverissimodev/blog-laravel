@extends('layouts.dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Conteúdos do Site</h1>
        <p class="mb-4">Todas os conteúdos do sistema estão listados aqui nesta página.</p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pesquisar conteúdos</h6>
            </div>
            <div class="container">
                {!! Form::model(Request::input(), ['route' => ['dashboard.content', http_build_query(Request::input())], 'method' => 'get'])!!}
                <div class="row">
                    <div class="col-6">
                        <div class="col-12">{!! Form::label('name', 'Nome', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                        <div class="col-12">{!! Form::text('name',null, ['class' => 'form-control','placeholder' => 'Nome']) !!}</div>
                        @if (!empty($errors->first('name')))
                            <label class="invalid-feedback d-block">{!!$errors->first('name')!!}</label>
                        @endif
                    </div>
                    <div class="col-6">
                        <div class="col-12">{!! Form::label('description', 'Descrição', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                        <div class="col-12">{!! Form::text('description',null, ['class' => 'form-control','placeholder' => 'Descrição']) !!}</div>
                        @if (!empty($errors->first('description')))
                            <label class="invalid-feedback d-block">{!!$errors->first('description')!!}</label>
                        @endif
                    </div>
                    <div class="col-12 text-right py-4 px-4">
                        <a href="{!! route('dashboard.content.create') !!}" class="btn btn-success"><i class="fas fa-plus"></i> Novo</a>
                        <button type="submit" class="btn btn-primary btn-color"><i class="fas fa-search"></i> Pesquisar</button>
                        <a href="{!! route('dashboard.content') !!}" class="btn cur-p btn-warning btn-color"><i class="fas fa-eraser"></i> Limpar Pesquisa</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div> 
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Conteúdos cadastrados</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th colspan="2"  class="text-center">Ação</th>
                            </tr>
                        </thead>
                        @if(count($contents) > 0)
                            @if (count($contents) > 10)    
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Status</th>
                                    <th colspan="2"  class="text-center">Ação</th>
                                </tr>
                            </tfoot>
                            @endif
                        @foreach ($contents as $data)
                            <tbody>
                                <tr>
                                    <td>{!!$data->id !!}</td>
                                    <td>{!!$data->name !!}</td>
                                    <td>{!!$data->description !!}</td>
                                    <td>{!! ($data->status == 2 ? 'Inativo': 'Ativo') !!}</td>
                                    <td colspan="2" class="text-center">
                                        <a href="{!! route('dashboard.content.update',$data->id) !!}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                        <a href="{!! route('dashboard.content.delete',$data->id) !!}" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        @endforeach
                        @else
                            <tbody>
                                <tr>
                                <td colspan="5" class="text-center"><strong>Não possui registro.</strong></td>
                                </tr>
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
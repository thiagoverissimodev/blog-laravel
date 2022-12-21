@extends('layouts.dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Usuários</h1>
        <p class="mb-4">Todos os usuários do sistema estão listados aqui nesta página.</p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pesquisar usuários</h6>
            </div>
            <div class="container">
                {!! Form::model(Request::input(), ['route' => ['dashboard.user', http_build_query(Request::input())], 'method' => 'get'])!!}
                <div class="row">
                    <div class="col-6">
                        <div class="col-12">{!! Form::label('name', 'Nome', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                        <div class="col-12">{!! Form::text('name',null, ['class' => 'form-control','placeholder' => 'Nome']) !!}</div>
                        @if (!empty($errors->first('name')))
                            <label class="invalid-feedback d-block">{!!$errors->first('name')!!}</label>
                        @endif
                    </div>
                    <div class="col-6">
                        <div class="col-12">{!! Form::label('email', 'E-mail', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                        <div class="col-12">{!! Form::text('email',null, ['class' => 'form-control','placeholder' => 'E-mail']) !!}</div>
                        @if (!empty($errors->first('email')))
                            <label class="invalid-feedback d-block">{!!$errors->first('email')!!}</label>
                        @endif
                    </div>
                    <div class="col-12 text-right py-4 px-4">
                        <a href="{!! route('dashboard.user.create') !!}" class="btn btn-success"><i class="fas fa-plus"></i> Novo</a>
                        <button type="submit" class="btn btn-primary btn-color"><i class="fas fa-search"></i> Pesquisar</button>
                        <a href="{!! route('dashboard.user') !!}" class="btn cur-p btn-warning btn-color"><i class="fas fa-eraser"></i> Limpar Pesquisa</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div> 
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Usuários cadastrados</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Status</th>
                                <th colspan="2"  class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Status</th>
                                <th colspan="2"  class="text-center">Ação</th>
                            </tr>
                        </tfoot>
                        @if(isset($users))
                        @foreach ($users as $user)
                            <tbody>
                                <tr>
                                    <td>{!!$user->id !!}</td>
                                    <td>{!!$user->name !!}</td>
                                    <td>{!!$user->email !!}</td>
                                    <td>{!! ($user->status == 2 ? 'Inativo': 'Ativo') !!}</td>
                                    <td colspan="2" class="text-center">
                                        <a href="{!! route('dashboard.user.update',$user->id) !!}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                        <a href="{!! route('dashboard.user.delete',$user->id) !!}" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a>
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
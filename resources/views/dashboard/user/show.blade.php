@extends('layouts.dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Formulário de Usuário</h1>
        {{-- <p class="mb-4">Todos os usuários do sistema estão listados aqui nesta página.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cadastrar/Editar Usuário</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    @if (isset($user))
                    {!! Form::model($user, ['method' => 'put', 'autocomplete' => false, 'route' => ['dashboard.user.update', $user->id, http_build_query(Request::input())], 'class' => $errors->any() ? 'was-validated' : '', 'novalidate']) !!}
                    @else
                    {!! Form::open(['method' => 'post', 'autocomplete' => false, 'route' => ['dashboard.user.create', http_build_query(Request::input())], 'class' => $errors->any() ? 'was-validated' : '', 'novalidate']) !!}
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12">{!! Form::label('name', 'Nome',['class' => 'col-form-label font-weight-bold']) !!}</div>
                            <div class="col-12"> {!! Form::text('name',null, ['class' => 'form-control','placeholder' => 'Nome', 'required'] ) !!}
                                @if (!empty($errors->first('name')))
                                <label class="invalid-feedback d-block">{!!$errors->first('name')!!}</label>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                        <div class="col-12">{!! Form::label('email', 'E-mail',['class' => 'col-form-label font-weight-bold']) !!}</div>
                        <div class="col-12"> {!! Form::text('email',null, ['class' => 'form-control','placeholder' => 'E-mail', 'required'] ) !!}
                            @if (!empty($errors->first('email')))
                            <label class="invalid-feedback d-block">{!!$errors->first('email')!!}</label>
                            @endif
                        </div>
                        </div>
                        <div class="col-12">
                            <div class="col-12">{!! Form::label('password', 'Senha',['class' => 'col-form-label font-weight-bold']) !!}</div>
                            <div class="col-12"> {!! Form::password('password', ['class' => 'form-control','placeholder' => 'Senha', 'required'] ) !!}
                                @if (!empty($errors->first('password')))
                                <label class="invalid-feedback d-block">{!!$errors->first('password')!!}</label>
                                @endif
                            </div>
                        </div>
                        @if(isset($user))
                            <div class="col-12">
                                <div class="col-12">{!! Form::label('image', 'Imagem cadastrada') !!}</div>
                                <div class="col-7"> <img src="{!! asset($user->image) !!}" alt="" class="img-fluid"/>
                                </div>
                            </div>
                        @endif
                            <div class="col-12">
                                <div class="col-12">{!! Form::label('image', 'Imagem', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::file('image', ['class' => 'form-control', 'placeholder' => 'Imagem']) !!}
                                    @if (!empty($errors->first('image')))
                                        <label class="invalid-feedback d-block">{!! $errors->first('image') !!}</label>
                                    @endif
                                </div>
                            </div>
                        <div class="col-12 text-right py-4">
                            <a href="{!!route('dashboard.user')!!}" class="btn btn-primary btn-color"><i class="fas fa-arrow-left"></i> Voltar</a>
                            <button type="submit" class="btn btn-success btn-color"><i class="fas fa-save"></i> Salvar</button>
                        </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
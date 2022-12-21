@extends('layouts.dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Formulário de Artigos</h1>
        {{-- <p class="mb-4">Todos os usuários do sistema estão listados aqui nesta página.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cadastrar/Editar Artigos</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    @if (isset($data))
                                {!! Form::model($data, ['method' => 'put', 'enctype' => 'multipart/form-data', 'autocomplete' => false, 'route' => ['dashboard.articles.update', $data->id, http_build_query(Request::input())], 'class' => $errors->any() ? 'was-validated' : '', 'novalidate',]) !!}
                            @else
                                {!! Form::open(['method' => 'post', 'enctype' => 'multipart/form-data', 'autocomplete' => false, 'route' => ['dashboard.articles.create', http_build_query(Request::input())], 'class' => $errors->any() ? 'was-validated' : '', 'novalidate',]) !!}
                            @endif
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-12">{!! Form::label('title', 'Título', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título', 'required']) !!}
                                        @if (!empty($errors->first('title')))
                                        <label class="invalid-feedback d-block">{!! $errors->first('title') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-12">{!! Form::label('description', 'Descrição', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> 
                                        <textarea class="form-control"  id="editor" name="description"  placeholder="Descrição">{{ old('description', !empty($data->description) ? $data->description : '') }}</textarea>
                                        @if (!empty($errors->first('description')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('description') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12">{!! Form::label('status', 'Status', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::select('status', ['1' => 'Ativo', '2' => 'Inativo'], null, ['class' => 'form-control', 'placeholder' => 'Status']) !!}
                                        @if (!empty($errors->first('status')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('status') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12">{!! Form::label('reading_time', 'Tempo de leitura', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::time('reading_time', null, ['class' => 'form-control', 'placeholder' => 'Data', 'required']) !!}
                                        @if (!empty($errors->first('reading_time')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('reading_time') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                @if(isset($data))
                                <div class="col-12">
                                    <div class="col-12">{!! Form::label('image', 'Imagem cadastrada') !!}</div>
                                    <div class="col-7"> <img src="{!! asset($data->image) !!}" alt="" class="img-fluid"/>
                                    </div>
                                </div>
                                @endif
                                <div class="col-12">
                                    <div class="col-12">{!! Form::label('image', 'Imagem', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::file('image', ['class' => 'form-control', 'placeholder' => 'Imagem de fundo']) !!}
                                        @if (!empty($errors->first('image')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('image') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 text-right py-4">
                                    <button type="submit" class="btn btn-primary btn-color"><i class="fas fa-save"></i>
                                        Salvar</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
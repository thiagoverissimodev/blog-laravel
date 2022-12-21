@extends('layouts.app')

@section('content')
<div class="container">
    <div class="background">
        <div class="shape" style="background: url('{!!asset('assets/image/aeternum-removebg-preview.png')!!}'); background-size:cover;"></div>
        <div class="shape" style="background: url('{!!asset('assets/image/aeternum-removebg-preview.png')!!}'); background-size:cover;"></div>
    </div>
    {!!Form::open(['method' => 'post', 'autocomplete' => 'off', 'route' => ['login', http_build_query(Request::input())], 'id' => 'form-login', 'class' => ($errors->any()) ? 'was-validated': '' ,'novalidate'])!!}
        <img src="{!! asset('assets/image/aeternum.png')!!}" alt="Logo Aeternum">    
    
        <h3>Faça login</h3>
    
        <label for="username">Login</label>
        <input type="text" name="email" placeholder="Informe seu e-mail" id="username" required>
    
        <label for="password">Senha</label>
        <input type="password" name="password" placeholder="Digite sua senha" id="password" required>
    
        <button class="mt-5" type="submit">Acessar</button>
    
    {!! Form::close() !!}
</div>
@endsection

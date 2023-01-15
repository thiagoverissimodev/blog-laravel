@extends('layouts.app-site')
@section('content')
<section id="banner" style="background: url('{!!asset($data->image)!!}'); background-size:cover; height: 40vh;">
</section>
<section class="bg-gray-600">
  <div class="container">
    <div class="row justify-content-center ">
      <div class="divider"></div>
    </div>
  </div>
</section>
<section class="d-block p-3" style="overflow: hidden">
    <section class="row pt-3">
        <div class="col-12 col-md-8">
            <div class="container">
               {{$data}}
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card text-center bg-green-500 bg-gradient">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
    </section>
</section>
@endsection

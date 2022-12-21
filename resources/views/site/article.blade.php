@extends('layouts.app-site')
@section('content')
<section id="banner" style="background: url('{!!asset('assets/image/banner-dark-articles.png')!!}'); background-size:cover; height: 40vh;">
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
                @foreach($articles as $item)
                  <div class="card mb-3 bg-black-custom bg-gradient border-0">
                    <div class="row g-5">
                      <div class="col-md-4">
                        <img src="{!!asset($item->image)!!}" class="img-fluid rounded-start img-card-articles" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{!! $item->title !!}</h5>
                          <p class="card-text"><?php echo substr(strip_tags($item->description), 0, 120); ?></p>
                          <p class="card-text"><small class="text-muted">Tempo de leitura: {!! date("H:i", strtotime($item->reading_time)) !!}</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
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

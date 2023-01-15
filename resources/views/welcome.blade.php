

{{-- <div class="flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
  @if (Route::has('login'))
      <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
          @auth
              <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
          @else
              <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

              @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
              @endif
          @endauth
      </div>
  @endif
</div> --}}
@extends('layouts.app-site')

@section('content')    
@include('layouts.inc.site-carousel')
<section id="video-institucional" class="d-flex justify-content-center bg-gray-600">
@if(count($gallery_video->videos) > 0)    
  @foreach ($gallery_video->videos as $item)
    @php
      $embed = ($item->embed) ? $item->embed : 'Y92iLjZMN9M'
    @endphp
    <iframe class="border-radius-15 shadow-green-main over-another border-color-custom" width="1110" height="624" src="{!! 'https://www.youtube.com/embed/'.$embed !!}" 
      title="Site básico | Thiago Verissimo" frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
    </iframe>
  @endforeach
@else
  <iframe class="border-radius-15 shadow-green-main over-another border-color-custom" width="1110" height="624" src="https://www.youtube.com/embed/RCWmN0nN-VE" 
    title="Site básico | Thiago Verissimo" frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
  </iframe>
@endif  
</section>
<section class="py-5">
  <div class="col-12 d-flex justify-content-center py-3">
    <div class="gradient-divisor"></div>
  </div>
  <div class="col-12">
    <div class="container">
      <div class="col-12 d-flex justify-content-center px-3">
        <h1 class="display-4 fw-bold d-flex text-shadow-main text-center text-white py-3 transition-to-top">{!!getTextByOrder($contents, 1);!!}</h1>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center ">
      <div class="divider"></div>
    </div>
  </div>
</section>
<section class="py-5">
  <div class="container">
    <h6 class="text-center">{!!getTextByOrder($contents, 3)!!}</h6>
    <h1 class="text-uppercase text-white text-center text-shadow-main pb-5">{!!getTextByOrder($contents, 2)!!}</h1>
    <div class="row">
      @if(!empty($articles))
        @foreach($articles as $item)
        <div class="col-12 col-md-3">
          <div class="card border-0 p-2 position-relative over-flow-hidden bg-gradient-before shadow-green-main-sm" 
          style="background: url('{!!asset($item->image)!!}'); background-size:cover; height: 26rem;">
              <h5 class="text-uppercase fw-bold text-center">{!!$item->title!!}</h5>
              <a href="#" class="text-decoration-none text-uppercase fs-custom-08rem text-white text-center">Ler mais</a>
          </div>
        </div>
        @endforeach
      @endif
    </div>
    <div class="divider"></div>
  </div>
</section>
<section class="py-5 bg-gradient-gray-600-to-bottom" style="background: url('{!!asset('assets/image/developer-for-desk.png')!!}'); background-size:cover; height: 40rem;">
  <div class="container py-5">
    <div class="row d-flex align-items-center h-75">
      <div class="col-12 col-md-6">
        <div class="row">
          <h1 class="text-white text-start display-4 fw-bold text-shadow-main">{!!getTextByOrder($contents, 4)!!}</h1>
          <p class="text-white text-shadow fs-4">{!!getTextByOrder($contents, 4,true)!!}</p>
        </div>
      </div>
      <div class="col-12 col-md-6"></div>
    </div>
  </div>
</section>
<section id="divider-for-footer" class="bg-gray-600">
  <div class="divider-footer"></div>
</section>
@endsection

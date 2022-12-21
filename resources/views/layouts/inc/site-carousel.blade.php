<section id="carousel-main">

    <div id="carouselBlogMain" class="carousel slide" data-bs-ride="false">
        @php
            $j = 0;
        @endphp
        <div class="carousel-indicators py-5 mb-5">
          @foreach($gallery->images as $key => $image)
            <button type="button" data-bs-target="#carouselBlogMain" data-bs-slide-to="{{$j}}" @php if ($j == 0){echo '" class="active" aria-current="true"';}  @endphp></button>
            @php
                $j++;
            @endphp
          @endforeach
        </div>
        @php
          $i = 0;
        @endphp
        <div class="carousel-inner">
          @foreach($gallery->images as $key => $image)
            <div class="carousel-item @php if($i == 0){echo 'active';}@endphp">
              <img src="{!!asset($image->image)!!}" class="d-block w-100 imagem-carrosel" alt="...">
              <div class="carousel-caption d-none d-md-block h-50">
                <h1 class="font-main display-4 fw-bolder text-shadow-main">{!! $image->description !!}</h1>
              </div>
            </div>
            @php
                $i++;
            @endphp
          @endforeach
        </div>
        {{-- <div class="carousel-item">
          <img src="{!! asset('assets/image/group-developers-green-gradient.jpg') !!}" class="d-block w-100 imagem-carrosel" alt="...">
          <div class="carousel-caption d-none d-md-block h-50">
            <h1 class="font-main display-4 fw-bolder text-shadow-main">Second slide label</h1>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{!! asset('assets/image/macpro-green-gradient.jpg') !!}" class="d-block w-100 imagem-carrosel" alt="...">
          <div class="carousel-caption d-none d-md-block h-50">
            <h1 class="font-main display-4 fw-bolder text-shadow-main">Third slide label</h1>
          </div>
        </div> --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBlogMain" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBlogMain" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </section>
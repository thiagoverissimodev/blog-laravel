<header>
    <nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-main bg-glassmorphim change-color-scroll">
      <div class="container">
        <a class="navbar-brand pt-0" href="{!!route('home')!!}"><img src="{{ asset('assets/image/aeternum.png') }}" class="size-logo img-logo" alt="Logo Technology In Aeternum"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
          <ul class="navbar-nav ms-auto">
            @foreach($menu as $item)
              <li class="nav-item">
                <a class="nav-link fs-6 fw-bold text-white text-shadow-main hover-boder-inline" href="{!! url($item->url) !!}">{!!$item->name!!}</a>
                {{-- <a class="nav-link fs-6 fw-bold text-white text-shadow-main hover-boder-inline" href="#">Artigos</a> --}}
              </li>
            @endforeach
            <button type="button" class="btn btn-dark ms-3" data-bs-toggle="modal" data-bs-target="#modal-contato">Contato</button>
          </ul>
        </div>
      </div>
    </nav>
</header>
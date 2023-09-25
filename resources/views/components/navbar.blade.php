<div class=" sticky-top">
  <a class="btn btn-offCanvas position-absolute top-0 end-0 m-3 d-md-none sticky-top " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
    <i class="fa-solid fa-bars"></i>
  </a>
  
  <div class="offcanvas offcanvas-end w-75 bg-body-tertiary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header bg-Offcanvas">
      <img class="w-50" src="/media/Presto-Logo.png" alt="">
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="row">
        <div class="col-12 d-flex justify-content-center my-3 px-4">
          {{-- Searchbar --}}
          <form role="search" action="{{route('products.search')}}" method='GET'>
            @csrf
            <div class="search-container">
              <i class="fa fa-search"></i>
              <input  name="searched" class="search-input hiderInput text-black mt-2" placeholder="Search...">
            </div>
          </form>
          {{-- Fine Searchbar --}}
        </div>
        <div class="col-12 ">
          <ul class="d-flex flex-column align-items-end pe-3">
            <li class="nav-item my-2">
              <a class="nav-link active" aria-current="page" href="{{route('home')}}">{{ __('ui.home')}}</a>
            </li>
            @auth
            <li class="nav-item my-2">
              <a class="nav-link" href="{{route('products.create')}}">{{ __('ui.productsCreates')}}</a>
            </li>
            @if(Auth::user()->is_revisor)
            <li class="nav-item my-2 ">
              <a class="nav-link btn-outline-success btn-sm position-relative" href="{{route('revisor.index')}}">{{ __('ui.reviewerArea')}}
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{App\Models\Product::toBeRevisionedCount()}}
                  <span class="visually-hidden">{{ __('ui.message')}}</span>
                </span>
              </a>
            </li>
            @endif
            @else
            <li class="nav-item my-2">
              <a class="nav-link" href="{{route('login')}}">{{ __('ui.productsCreates')}}</a>
            </li>
            @endauth
            <li class="nav-item my-2 dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ __('ui.categories')}}
              </a>
              <ul class="dropdown-menu">
                @foreach($categories as $category)
                @if(App::isLocale('it'))
                <li>
                  <a class="dropdown-item" href={{route('categoryShow',compact('category'))}}>{{($category->name)}}</a>
                </li>
                @elseif(App::isLocale('en'))
                <li>
                  <a class="dropdown-item" href={{route('categoryShow',compact('category'))}}>{{__('ui.category-' . $category->id)}}</a>
                </li>
                @else
                <li>
                  <a class="dropdown-item" href={{route('categoryShow',compact('category'))}}>{{__('ui.category-' . $category->id)}}</a>
                </li>
                @endif
                @endforeach
              </ul>
            </li>
            <li class="nav-item my-2">
              <a class="nav-link" href="{{route('products.index')}}">{{ __('ui.allAnnouncements')}}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <nav id="barrone" class="container-fluid">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-4 col-12 d-flex mb-2 mb-md-0">
        {{-- Cambio Lingua --}}
        <ul class="list-inline d-flex mb-0 bandiere">
          <li class="list-inline-item">
            <x-_locale lang="it"/>
          </li>
          <li class="list-inline-item">
            <x-_locale lang="en"/>
          </li>
          <li class="list-inline-item">
            <x-_locale lang="es"/>
          </li>
        </ul>
        {{-- Fine Cambio Lingua --}}
      </div>
      
      {{-- Revisore --}}
      <div class="col-md-4 col-12 d-flex justify-content-center mb-2 mb-md-0">
        <a href="{{route('mail.revisor')}}" class="text-decoration-none text-white">{{ __('ui.makeRev')}}</a>
      </div>
      {{-- Fine Revisore --}}
      
      {{-- Login-Registrati / Logout --}}
      <div class="col-md-4 col-12 d-flex justify-content-end">
        @auth
        <p class="nav-item dropdown text-white pe-3 pe-md-5 mb-0 align-self-center">{{ __('ui.welcome')}} {{Auth::user()->name}}</p>
        <form action="{{route('logout')}}" method="POST" class="align-self-center">
          @csrf
          <button class="btn btn-link text-white marginAuth" style="text-decoration:none">{{ __('ui.logout')}}</button>
        </form>            
        @else
        <p class="nav-item dropdown text-white pe-3 pe-md-4 mb-0 align-self-center ">{{ __('ui.welcomeUser')}}
          <a class="btn btn-link text-white" style="text-decoration:none" href="{{route('register')}}">{{ __('ui.register')}}</a>
          <a class="btn btn-link text-white marginGuest" style="text-decoration:none" href="{{route('login')}}">{{ __('ui.login')}}</a>
        </p>
        @endauth
      </div>
      {{-- Fine Login-Registrati / Logout --}}
    </div>
  </nav>
  
  
  <nav class="bg-body-tertiary d-none d-md-block">
      <div class="container bg-body-tertiary">
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <a class="navbar-brand" href="{{route('home')}}"><img class="logo" src="/media/Presto-Logo.png" alt=""></a>
        </div>
        <div class="col-12 d-flex justify-content-center my-3">
          {{-- Searchbar --}}
          <form role="search" action="{{route('products.search')}}" method='GET'>
            @csrf
            <div class="search-container">
              <i class="fa fa-search"></i>
              <input  name="searched" class="search-input hiderInput text-black mt-2" placeholder="Search...">
            </div>
          </form>
          {{-- Fine Searchbar --}}
        </div>
        <div class="col-12 ">
          <ul class="d-flex justify-content-between p-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('home')}}">{{ __('ui.home')}}</a>
            </li>
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{route('products.create')}}">{{ __('ui.productsCreates')}}</a>
            </li>
            @if(Auth::user()->is_revisor)
            <li class="nav-item ">
              <a class="nav-link btn-outline-success btn-sm position-relative" href="{{route('revisor.index')}}">{{ __('ui.reviewerArea')}}
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{App\Models\Product::toBeRevisionedCount()}}
                  <span class="visually-hidden">{{ __('ui.message')}}</span>
                </span>
              </a>
            </li>
            @endif
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">{{ __('ui.productsCreates')}}</a>
            </li>
            @endauth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ __('ui.categories')}}
              </a>
              <ul class="dropdown-menu">
                @foreach($categories as $category)
                @if(App::isLocale('it'))
                <li>
                  <a class="dropdown-item" href={{route('categoryShow',compact('category'))}}>{{($category->name)}}</a>
                </li>
                @elseif(App::isLocale('en'))
                <li>
                  <a class="dropdown-item" href={{route('categoryShow',compact('category'))}}>{{__('ui.category-' . $category->id)}}</a>
                </li>
                @else
                <li>
                  <a class="dropdown-item" href={{route('categoryShow',compact('category'))}}>{{__('ui.category-' . $category->id)}}</a>
                </li>
                @endif
                @endforeach
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('products.index')}}">{{ __('ui.allAnnouncements')}}</a>
            </li>
          </ul>
        </div>
      </div> 
      </div>
  </nav>
</div>


{{-- fine nuova navbar --}}



<x-layout>
  {{-- Header Tutti gli articoli --}}
  <div class="container-fluid bg-img">
    <div class="row align-items-center justify-content-center ">
      <div class="col-12 d-flex align-items-center sfondoAnnunci justify-content-center">
        <h1 id="logo" class=" my-5 titoloAnnunci" data-text="">{{ __('ui.allProducts')}}</h1>
      </div>
    </div>
  </div>
  {{-- endheader Articoli --}}
  
  {{-- Cornice --}}
  <div  class="container mt-5">
    <div class="row text-center justify-content-center align-items-start">
      <div class="col-12">
        <img class="cornice"src="/media/cornice.png" alt="">
      </div>
    </div>
  </div>    
  {{-- Fine Cornice --}}
  <div class="shell">
    <div class="container" >
      <div class="row justify-content-center">
        @forelse($products as $product)
        <div class=" col-12 col-md-3">
          <div class="wsk-cp-product">
            <div class="wsk-cp-img">
              <img src="{{!$product->images()->get()->isEmpty() ? Storage::url($product->images()->first()->path) : '/media/default-alto.png'}}" class="card-img-top" alt="...">
            </div>
            <div class="wsk-cp-text">
              <div class="menu">
                <span> 
                  @if (App::isLocale('it'))                    
                  <a href="{{ route('categoryShow', ['category' => $product->category]) }}">{{ $product->category->name }}</a>
                  @elseif(App::isLocale('en'))                    
                  <a href="{{ route('categoryShow', ['category' => $product->category]) }}">{{ __('ui.category-' . $product->category->id) }}</a>
                  @else                    
                  <a href="{{ route('categoryShow', ['category' => $product->category]) }}">{{ __('ui.category-' . $product->category->id) }}</a>
                  @endif
                </span>
              </div>
              <div class="title-product font-titoli">
                <h3>{{$product->title}}</h3>
              </div>
              <div class="description-prod font-scritta">
                <p>{{$product->description}}</p>
              </div>
              <div class="card-footer">
                <div class="wcf-left"><span class="price font-titoli">{{$product->price}} €</span>
                  <div class=" font-scritta">{{__('ui.publicated')}} : {{$product->created_at->format('d/m/Y')}}</div>
                </div>                
                <div class="wcf-right"><a href="{{route('products.show', compact('product'))}}"class="buy-btn"><i class="fa-solid fa-circle-info fa-2xl" style="color: #212529;"></i></a></div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div col-12 col-md-8>
          <div class="lead">
            {{ __('ui.noResearch')}}
          </div>
        </div>            
        @endforelse             
        {{$products->links()}}
      </div>
    </div>  
  </div>
</x-layout>

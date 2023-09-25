<x-layout>
  <div class="container-fluid Width 100%">
    <div class="row align-items-center justify-content-center detailProducts">
      <div class="col-12 d-flex align-items-center justify-content-center">
        <h1 id="logo" class="detailProduct my-3" data-text="Dettaglio Prodotto">{{ __('ui.detailsProd')}}</h1>
      </div>
    </div>
  </div>
  <div class="container dprodotto mt-5">
    <div class="row">
      <div class="col-12 col-md-8 mt-3">
        {{-- Thumbnail --}}      
        <div class="thumbnail-gallery">
          <div class="main-image">
            <img id="mainImage" class="img-fluid" src="{{ $productToShow->images->isNotEmpty() ? $productToShow->images[0]->getUrl(500, 500) : '/media/default.png' }}" alt="Main Image">
          </div>       
          <div class="thumbnail-list">  
            @if (!empty($productToShow->images))
              @foreach ($productToShow->images as $image)
                <img src="{{ $image->getUrl(500,500) }}" alt="Thumbnail">
              @endforeach
            @else
              <img src="/media/default.png" alt="Thumbnail 1">
            @endif
          </div>
        </div>
      </div>
      <div id="dettaglioProdotto" class="col-12 col-md-4 mt-3">
        <h6 class="font-scritta"><a href="{{ route('home') }}" class="text-decoration-none text-dark">{{ __('ui.home')}}</a></h6>
        <h3 class="py-3 font-titoli">{{ $productToShow->title }}</h3>
        <h2 class="font-scritta">{{ App::isLocale('it') ? $productToShow->category->name : __('ui.category-' . $productToShow->category->id) }}</h2>
        <h2 class="font-scritta">€{{ $productToShow->price }}</h2>
        <h4 class="mt-3 mb-3 font-titoli">{{ __('ui.detailsProd') }}</h4>
        <span class="font-scritta me-5">{{ $productToShow->description }}</span>
      </div>
    </div>
  </div>
  <div id="featured" class="my-5">
    <div id="Correlati" class="container text-center font-scritta py-3">
      <h3 class="font-titoli">{{ __('ui.related') }}</h3>
      <hr>
    </div>
    <div class="row mx-auto">
      @foreach ($relatedProducts as $relatedProductItem)
      @if ($relatedProduct && $relatedProductItem->id === $relatedProduct->id)
        @continue
      @endif            
      <div class="col-6 col-md-3 product text-center mb-4">
        <span>
          <img class="relatedPic img-fluid" src="{{ !$relatedProductItem->images()->get()->isEmpty() ? Storage::url($relatedProductItem->images()->first()->path) : 'https://picsum.photos/150/225' }}" alt="foto-card">
        </span>
        <h5 class="p-nome font-titoli">{{ $relatedProductItem->title }}</h5>
        <h4 class="p-prezzo font-scritta">€{{ $relatedProductItem->price }}</h4>
        <button class="btn btn-dark compra font-scritta">
          <a class="text-decoration-none text-white" href="{{ route('products.show', ['product' => $productToShow->id, 'relatedProduct' => $relatedProductItem->id]) }}">Info</a>
        </button>
      </div>
    @endforeach    
    </div>
  </div>   
</x-layout>
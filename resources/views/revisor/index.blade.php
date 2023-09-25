<x-layout>    
    <div class='container-fluid titoloRevisore shadow '>
        <!-- Intestazione con sfondo -->
        <div class="row">
            <div class="col-12 p-5">
                <!-- Titolo -->
                <h1 class="display-2">
                    {{$product_to_check ? __('ui.revMsg') : __('ui.revMsg+')}} <!-- Messaggio di revisione -->
                </h1>
            </div>
        </div>
    </div>
    <!-- Se c'è un prodotto da revisionare -->
    @if($product_to_check)
    <div class="container ">
        <div class="row justify-content-center">
            <div  id="caroselloRevisore" class="col-12">
                @if($product_to_check->images && count($product_to_check->images) > 0)       
                <!-- Carosello delle immagini -->
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($product_to_check->images as $index => $image)                        
                        <div class="carousel-item @if($loop->first) active @endif">
                            <div class="container" style="min-height: 700px;">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-5">
                                        <img src="{{$image->getUrl(500, 500)}}" class="p-3 rounded img-fluid" alt="...">
                                    </div>
                                    <div class="col-5">                                
                                        <div class="col-12">
                                            <h5 class="">{{ __('ui.imgReview') }}</h5>
                                            <p>{{ __('ui.adult') }}: <span class="{{$image->adult}}"> </span></p>
                                            <p>{{ __('ui.satire') }}: <span class="{{$image->spoof}}"> </span></p>
                                            <p>{{ __('ui.medicine') }}: <span class="{{$image->medical}}"> </span></p>
                                            <p>{{ __('ui.violence') }}: <span class="{{$image->violence}}"> </span></p>
                                            <p>{{ __('ui.winkContent') }}: <span class="{{$image->racy}}"> </span></p>
                                        </div>
                                        <div class="col-12">
                                            <h5 class="">{{ __('ui.tags') }}</h5>
                                           
                                                <div class="row">
                                                    @if (isset($image->labels))
                                                    @foreach ($image->labels as $label)
                                                        <div class="col-4">
                                                            <p class="">{{$label}}</p>
                                                        </div>                                                    
                                                    @endforeach
                                                    @endif                                                    
                                                </div>                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach                            
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                        <i class="fa-solid fa-arrow-left fa-2xl" style="color: #000000;"></i>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                        <i class="fa-solid fa-arrow-right fa-2xl" style="color: #000000;"></i>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- Fine Carosello delle immagini -->
                @else
                <!-- Nessuna immagine presente, default -->
                <img src="/media/default.png" alt="">
                @endif
                
                <!-- Dettagli Prodotto -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-title font-titoli">{{ __('ui.title')}}: {{$product_to_check->title}}</h5>
                            <p class="card-text font-scritta">{{ __('ui.description')}}: {{$product_to_check->description}}</p>
                            <p class="card-text font-titoli">{{ __('ui.price') }}: {{$product_to_check->price}} €</p>
                            <p class="card-footer font-scritta">{{ __('ui.publicated')}} : {{$product_to_check->created_at->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </div>
                <!-- Fine Dettagli Prodotto -->
                
                <!-- Pulsanti di accettazione e rifiuto del prodotto -->
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 d-flex justify-content-center">
                        <form action="{{route('revisor.accept_product',['product'=>$product_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success font-scritta shadow mb-5">{{ __('ui.accept')}}</button>
                        </form>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-center">
                        <form action="{{route('revisor.reject_product',['product'=>$product_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger font-scritta shadow mb-5">{{ __('ui.reject')}}</button>
                        </form>
                    </div>
                </div>
                <!-- Fine Pulsanti di accettazione e rifiuto del prodotto -->
            </div>
        </div>
    </div>
    @endif

    <!-- Intestazione del layout -->
    @if($product_to_check == false)
    <div class="container vh-X">
        <div class="row">
            <div class="col-12 ">
            </div>
        </div>
    </div>
    @endif 

</x-layout>

<x-layout>
    <div class="container-fluid lastwo">
        <div class="row">
            <div class="col-12">
                @if (App::isLocale('it'))
                <h1 class="display-2 text-center my-5">{{ __('ui.explore') }} {{ $category->name }}</h1>
                @elseif(App::isLocale('en'))
                <h1 class="display-2 text-center my-5">{{ __('ui.explore') }}
                    {{ __('ui.category-' . $category->id) }}</h1>
                    @else
                    <h1 class="display-2 text-center my-5">{{ __('ui.explore') }}
                        {{ __('ui.category-' . $category->id) }}</h1>
                        @endif
                    </div>
                </div>
            </div>
            {{-- Cornice --}}
            <div  class="container mt-5">
                <div class="row text-center justify-content-center align-items-start">
                    <div class="col-12">
                        <img class="cornice"src="/media/cornice.png" alt="">
                    </div>
                </div>
            </div>    
            {{-- Fine Cornice --}}
            <div class="container">
                <div class="row justify-content-center">
                    @forelse($category->acceptedProducts as $product)
                    <div class="col-12 col-md-3">
                        <div class="shell">
                            <div class="wsk-cp-product">
                                <div class="wsk-cp-img">
                                    <img src="{{ $product->images()->count() > 0 ? Storage::url($product->images()->first()->path) : '/media/default.png' }}"
                                    alt="foto-card">
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
                                    <div class="title-product">
                                        <h3>{{ $product->title }}</h3>
                                    </div>
                                    <div class="description-prod">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="wcf-left"><span class="price">{{ $product->price }} €</span>
                                            <div>{{ __('ui.publicated') }}:{{ $product->created_at->format('d/m/Y') }}</div>
                                        </div>
                                        <div class="wcf-right"><a href="{{ route('products.show', compact('product')) }}"
                                            class="buy-btn"><i class="fa-solid fa-circle-info fa-2xl"
                                            style="color: #212529;"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <h1 class="display-1 text-center my-5">{{ __('ui.notAnnouncements') }}</h1>
                        </div>
                        <div class="btn-text-class mb-3">
                            <a href="{{ route('products.create') }}"><span
                                class="btn btn-font btn-dark text-center">{{ __('ui.create') }}</span></a>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </x-layout>
                
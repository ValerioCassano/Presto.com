<div class="container-fluid mt-5 ">
    <div class="row">
        <div class="col-12 mb-5">
            <h1 class="font-c-annuncio">{{ __('ui.createAnnouncement') }}</h1>
        </div>
    </div>
    <!-- Messaggio di sessione -->
    <div class="row">
        <div class="col-12">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
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
    {{-- nuovo form --}}
    <div class="row">
        <div class="col-md-12">
            <form wire:submit.prevent='store' id="crea-annuncio">
                @csrf
                <fieldset>
                    {{-- nome prodotto --}}
                    <label for="title" class="form-label font-scritta">{{ __('ui.nameProd') }}</label>
                    <input wire:model="title" type="text" class="form-control" id="productTitle"
                    class='@error('title') is-invalid @enderror'>
                    @error('title')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- fine nome prodotto --}}
                    {{-- descrizione --}}
                    <label for="description" class="form-label font-scritta">{{ __('ui.descProd') }}</label>
                    <input wire:model="description" type="text" class="form-control" id="productDescription"
                    class='@error('description') is-invalid @enderror'>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- fine descrizione --}}
                    {{-- prezzo --}}
                    <label for="price" class="form-label font-scritta">{{ __('ui.price')}}</label>
                    <input wire:model="price" type="text" class="form-control" id="productPrice" class='@error('price') is-invalid @enderror'>
                    @error('price')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    {{-- fine prezzo --}}
                    {{-- categoria --}}
                    <label for="category" class="font-scritta">{{ __('ui.category')}}</label>
                    <select wire:model.defer='category' id="category"  class="font-scritta">
                        <option value="">{{ __('ui.theCate')}}</option>
                        @foreach ($categories as $category)
                        @if (App::isLocale('it'))
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @elseif(App::isLocale('en'))
                        <option value="{{$category->id}}">{{__('ui.category-' . $category->id)}}</option>
                        @else
                        <option value="{{$category->id}}">{{__('ui.category-' . $category->id)}}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('category')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    {{-- fine categoria --}}
                    {{-- img preview --}}
                    <input wire:model="temporary_images" type="file" name="images" multiple class="from-control font-scritta shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
                    @error('temporary_images.*')
                    <p class="text-danger mt-2">{{$message}}</p>
                    @enderror
                    @if (!empty($images))
                    <div class="row">
                        <div class="col-12">
                                <p class="text-white font-titoli">{{ __('ui.photo')}}:</p>
                                <div class="row border border-4 border-dark rounded shadow p-4"> 
                                    @foreach ($images as $key => $image)
                                    <div class="col-3 my-3">
                                        <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}}); background-position:center; background-size:cover; background-repeat: no-repeat;"></div> 
                                        <button type="button" class="btn btn-danger font-scritta shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">{{ __('ui.cancel')}}</button>
                                    </div> 
                                    @endforeach 
                                </div>
                            </div> 
                        </div>
                        @endif
                        {{-- fine img preview --}}
                    </fieldset>
                    <button class="btn btn-dark font-scritta my-3" type="submit">{{ __('ui.anotherCreate')}}</button>
                </form>
            </div>
        </div>
        {{-- fine nuovo form --}}
    </div>
</div>
    
    
    
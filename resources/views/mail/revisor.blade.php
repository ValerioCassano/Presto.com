<x-layout>
    <div class="container-fluid my-5 colorato">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 p-5">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="text-center"><h1 class="font-h1">{{ __('ui.racc')}}!</h1></div>
                     {{-- Cornice --}}
                     <div  class="container mt-5">
                        <div class="row text-center justify-content-center align-items-start">
                            <div class="col-12">
                                <img class="cornice"src="/media/cornice.png" alt="">
                            </div>
                        </div>
                    </div>    
                    {{-- Fine Cornice --}}
                <form action="{{route('become.revisor')}}" method="post" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <label for="usermessage" class="form-label"></label>
                        <textarea name="body" id="usermessage" cols="30" rows="10" class="form-control font-scritta" placeholder="{{__('ui.write')}}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark compra font-scritta">{{ __('ui.submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
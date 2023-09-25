<x-layout>
    <div class="vh-75">
        <div>
            {{-- Cornice --}}
            <div class="container mt-5">
                <div class="row text-center justify-content-center align-items-start">
                    <div class="col-12">
                        <img class="cornice" src="/media/cornice.png" alt="">
                    </div>
                </div>
            </div>
        </div>    
        {{-- Fine Cornice --}}
        <form id="msform" action="{{route('login')}}" method="POST">
            @csrf       
            <fieldset class="mt-3">
                <h2 class="fs-title mb-5 mt-2 font-titoli">{{ __('ui.log')}}</h2>
                <label for="userEmail" class="form-label"></label>
                <input type="email" name="email" id="userEmail" aria-describedby="emailHelp" placeholder="Email" />
                <label for="userPassword" class="form-label"></label>
                <input type="password" name="password" id="userPassword" placeholder="Password" />
                    <button class="mt-4 btn btn-dark font-scritta">{{ __('ui.log')}}</button>
            </fieldset>
        </form>

    </div>
</x-layout>

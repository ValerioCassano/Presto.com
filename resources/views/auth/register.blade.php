<x-layout>
    <div class="d-flex flex-column justify-content-center vh-75">
        {{-- Cornice --}}
        <div class="container ">
            <div class="row text-center justify-content-center align-items-start">
                <div class="col-12">
                    <img class="cornice"  src="/media/cornice.png" alt="">
                </div>
            </div>
        </div>    
        {{-- Fine Cornice --}}
        <form id="msform" action="{{route('register')}}" method="POST">
            @csrf       
            <fieldset>
                <h2 class="fs-title mb-5 mt-2 font-titoli">{{ __('ui.reg')}}</h2>
                <label for="userName" class="form-label text-white"></label>
                <input type="text" name="name" id="userName" required="required" placeholder="Nome Utente">
                <label for="userEmail" class="form-label"></label>
                <input type="email" name="email" id="userEmail" aria-describedby="emailHelp" required="required" placeholder="Email">
                <label for="userPassword" class="form-label"></label>
                <input type="password"  name="password" id="userPassword" required="required" placeholder="Password">
                <label for="userPasswordConfirmation" class="form-label"></label>
                <input type="password" name="password_confirmation" id="passwordConfirmation" required="required" placeholder="Conferma Password">
                    <button class="mt-4 btn btn-dark font-scritta">{{ __('ui.reg')}}</button>

            </fieldset>
        </form>
    </div>
</x-layout>
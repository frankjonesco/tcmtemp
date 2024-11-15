<x-layout.app :pageHeadings="$pageHeadings">
   
    <x-cards.form class="form-sm">

        <form action="/users/store" method="POST">
        
            @csrf
            @method('POST')

            @include('includes.form.input-first-name')
            @include('includes.form.input-last-name')
            @include('includes.form.input-email')
            @include('includes.form.input-password')
            @include('includes.form.input-password-confirmation')
            
            @include('includes.form.buttons-register')

        </form>

        <p class="text-center mb-0 mt-6 text-sm">
            Already have an account? <a href="/login" class="underline">Log in</a>
        </p>

    </x-cards.form>

</x-layout.app>
<x-layout.app :pageHeadings="$pageHeadings">

    <x-cards.form class="form-sm">

        <form action="/authenticate" method="post">
            
            @csrf
            @method('POST')

            @include('includes.form.input-username')
            @include('includes.form.input-password')
            
            @include('includes.form.buttons-login')

        </form>

        <p class="text-center mb-0 mt-6 text-sm">
            Dont have an account yet? <a href="/register" class="underline">Register</a>
        </p>

    </x-cards.form>
    

</x-layout.app>
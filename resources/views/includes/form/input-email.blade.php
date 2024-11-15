<div class="field">

    <label for="email">
        Email
    </label>

    <input 
        type="email"
        name="email"
        placeholder="Email"
        value="{{$errors->has('email') ? null : old('email')}}"
        {{$errors->has('email') ? 'autofocus' : null}}
    >

    <x-elements.validation-error element="email" />

</div>
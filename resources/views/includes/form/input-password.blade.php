<div class="field">

    <label for="password">
        Password
    </label>

    <input 
        type="password"
        name="password"
        placeholder="Password"
        {{$errors->has('password') ? 'autofocus' : null}}
    >

    <x-elements.validation-error element="password" />

</div>
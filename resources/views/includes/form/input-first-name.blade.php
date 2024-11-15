<div class="field">

    <label for="first_name">
        First name
    </label>

    <input
        type="text"
        name="first_name"
        placeholder="First name"
        value="{{$errors->has('first_name') ? null : old('first_name')}}"
        {{$errors->has('first_name') ? 'autofocus' : null}}
    >

    <x-elements.validation-error element="first_name" />

</div>
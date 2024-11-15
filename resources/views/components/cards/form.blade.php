@if($errors->any())
    <x-elements.alert :form-error="$error->first()" />
@endif

<div {{$attributes->merge(['class' => 'card form'])}}>
    {{$slot}}
</div>
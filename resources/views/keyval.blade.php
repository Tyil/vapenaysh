@php(list($key, $value) = explode("\n", $slot))

@component('input')
    @slot('id', $id ?? "keyval-$key")
    @slot('class', 'form-control-plaintext')
    @slot('attributes', 'readonly')
    @slot('label', trim($key))
    @slot('default', trim($value))
@endcomponent

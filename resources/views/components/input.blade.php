@props([
    'title',
    'name',
    'defaultValue' => ''
])
<div>
    <p>{{ $title }}</p><br>
    <input name="{{ $name }}" value="{{ $errors->any() ? old('title') : $defaultValue }}">
</div>
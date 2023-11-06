@props([
    'options',
    'name',
    'currentoption' => NULL
])
<select name="{{ $name }}">
    <option value="">---не выбрано---</option>
    @foreach($options as $key => $value)
        <option value="{{ $key }}" @if ($currentoption == $key) selected @endif>{{ $value }}</option>
    @endforeach
</select>
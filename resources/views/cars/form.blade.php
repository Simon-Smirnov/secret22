<div class="mb-3">
    <x-form-input name="manufacturer" label="Manufacturer"/>
</div>
<div class="mb-3">
    <x-form-input name="model" label="Model"/>
</div>
<div class="mb-3">
    <x-form-input name="price" label="Price"/>
</div>
<div class="mb-3">
    <x-form-input name="vin" label="Vin code"/>
</div>
<div class="mb-3">
    <x-form-select name="transmissions" label="Transmission" :options="$transmissions" placeholder="not chosen"/>
</div>
<div class="mb-3">
    <button class="btn btn-success">Create/Update</button>
</div>
<div class="mb-3">
    <x-form-select name="brand_id" label="Brand" :options="$brands" placeholder="dont change"/>
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
    <x-form-select name="transmissions" label="Transmission" :options="$transmissions" placeholder="--not chosen--"/>
</div>
<div class="mb-3">
    <x-form-select name="tags[]" label="Tag" :options="$tags" :size="$tags->count()" multiple many-relation/>
</div>
<div class="mb-3">
    <button class="btn btn-success">Create/Update</button>
</div>
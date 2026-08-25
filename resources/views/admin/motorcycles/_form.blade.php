<div class="form-group">
    <label for="brand_id">Merk</label>
    <select id="brand_id" name="brand_id" required>
        <option value="">-- Selecteer merk --</option>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}" {{ old('brand_id', optional($motorcycle)->brand_id) == $brand->id ? 'selected' : '' }}>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="name">Naam</label>
    <input type="text" id="name" name="name" value="{{ old('name', optional($motorcycle)->name) }}" required>
</div>

<div class="form-group">
    <label for="type">Type</label>
    <select id="type" name="type" required>
        @foreach(['sport','naked','touring','cruiser','offroad','scooter'] as $t)
            <option value="{{ $t }}" {{ old('type', optional($motorcycle)->type) === $t ? 'selected' : '' }}>
                {{ ucfirst($t) }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="price">Prijs (€)</label>
    <input type="number" id="price" name="price" step="0.01" min="0"
           value="{{ old('price', optional($motorcycle)->price) }}" required>
</div>

<div class="form-group">
    <label for="cc">Cilinderinhoud (cc)</label>
    <input type="number" id="cc" name="cc" min="50"
           value="{{ old('cc', optional($motorcycle)->cc) }}" required>
</div>

<div class="form-group">
    <label for="stock">Voorraad</label>
    <input type="number" id="stock" name="stock" min="0"
           value="{{ old('stock', optional($motorcycle)->stock ?? 0) }}" required>
</div>

<div class="form-group">
    <label for="image_url">Afbeelding URL (optioneel)</label>
    <input type="url" id="image_url" name="image_url"
           value="{{ old('image_url', optional($motorcycle)->image_url) }}" placeholder="https://...">
</div>

<div class="form-group">
    <label for="description">Beschrijving (optioneel)</label>
    <textarea id="description" name="description" rows="4">{{ old('description', optional($motorcycle)->description) }}</textarea>
</div>

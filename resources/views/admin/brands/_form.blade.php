<div class="form-group">
    <label for="name">Naam</label>
    <input type="text" id="name" name="name"
           value="{{ old('name', optional($brand)->name) }}" required>
</div>

<div class="form-group">
    <label for="country">Land (optioneel)</label>
    <input type="text" id="country" name="country"
           value="{{ old('country', optional($brand)->country) }}">
</div>

<div class="form-group">
    <label for="description">Beschrijving (optioneel)</label>
    <textarea id="description" name="description" rows="3">{{ old('description', optional($brand)->description) }}</textarea>
</div>

<div class="card-body">
    <div class="form-group">
        <label for="brandInputTitle">Название бренда</label>
        <input name="name" type="text" class="form-control" id="brandInputTitle" value="{{ old("title", $brand->name) }}">
        @error("name")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    @error("slug")
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>


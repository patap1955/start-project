<div class="card-body">
    <div class="form-group">
        <label for="categoryInputTitle">Название категории</label>
        <input name="title" type="text" class="form-control" id="categoryInputTitle" value="{{ old("title", $category->title) }}">
        @error("title")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label>Родительская категория</label>
        <select name="parent_id" class="form-control">
            <option value="0">Без родителя</option>
            @foreach($category->categoriesAll() as $cat)
                <option value="{{ $cat->id }}" {{ ($category->parent_id === $cat->id) ? "selected" : null }}>{{ $cat->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Краткое описание</label>
        <textarea name="description" class="form-control" rows="3">{{ old("description", $category->description) }}</textarea>
        @error("description")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    @error("slug")
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>


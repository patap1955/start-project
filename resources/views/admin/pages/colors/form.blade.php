<div class="card-body">
    <div class="form-group">
        <label for="categoryInputTitle">Название цвета</label>
        <input name="title" type="text" class="form-control" id="colorInputTitle" value="{{ old("title", $color->title) }}">
        @error("title")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="categoryInputTitle">Код цвета</label>
        <input name="code" type="text" class="form-control" id="colotInputCode" value="{{ old("code", $color->code) }}">
        @error("code")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>



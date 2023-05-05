<div class="card-body">
    <div class="form-group">
        <label for="brandInputTitle">Наименование продукта</label>
        <input
            name="title"
            type="text"
            class="form-control"
            id="brandInputTitle"
            value="{{ old("title",  $product->title) }}"
        >
        @error("name")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label>Краткое описание продукта</label>
        <textarea
            name="description"
            class="form-control"
            rows="3">{{ old("title",  $product->description) }}</textarea>
    </div>
    <div class="form-group">
        @if($product->card_img !== null)
            <div class="col-lg-3">
                <div id="productCardImg">
                    <p><strong>Изображение на карточке товара</strong></p>
                    <img width="100%" src="{{ asset($product->card_img) }}">
                    <button
                        data-product-id="{{ $product->id }}"
                        data-route="{{ route('deleteProductCardImg', $product->id) }}"
                        id="deleteCardImg"
                        class="btn btn-danger mt-3"
                    >
                        Удалить
                    </button>
                </div>
                <div id="productInputCardImg" style="display: none">
                    <label>Изображение на карточке товара</label>
                    <input type="file" name="card_img">
                </div>

            </div>
        @else
            <label>Изображение на карточке товара</label>
            <input type="file" name="card_img">
            @error("card_img")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        @endif
    </div>
    <div class="form-group">
        <label>Категория товара</label>
        <select
            name="category_id"
            class="form-control select2 select2-hidden-accessible"
            style="width: 100%;"
            tabindex="-1"
            aria-hidden="true"
        >
            @foreach($product->allCategories() as $item)
                <option
                    value="{{ $item->id }}"
                    {{ ($item->id === $product->category_id) ? "selected" : null }}
                >
                    {{ $item->title }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="row">

    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Бренд товара</label>
                <select
                    name="brand_id"
                    class="form-control select2 select2-hidden-accessible"
                    style="width: 100%;"
                    tabindex="-1"
                    aria-hidden="true"
                >
                    @foreach($product->allBrands() as $brand)
                        <option value="{{ $brand->id }}" {{ ($brand->id === $product->brand_id) ? "selected" : null }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Цвет товара</label>
                <select
                    name="color_id"
                    class="form-control select2 select2-hidden-accessible"
                    style="width: 100%;"
                    tabindex="-1"
                    aria-hidden="true"
                >
                    @foreach($product->allColors() as $color)
                        <option value="{{ $color->id }}" {{ ($color->id === $color->color_id) ? "selected" : null }}>
                            {{ $color->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="form-group clearfix">
        <div class="icheck-primary d-inline">
            <input
                name="new"
                type="checkbox"
                id="productCheckboxNew"
                {{ ($product->new || $product->new === null) ? "checked" : null}}
            >
            <label for="productCheckboxNew">Новинка</label>
        </div>
        <div class="icheck-primary d-inline ml-4">
            <input
                name="sale"
                type="checkbox"
                id="productCheckboxSale"
                {{ ($product->sale) ? "checked" : null}}
            >
            <label for="productCheckboxSale">
                Распродажа
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="brandInputCount">Кол-во на складе</label>
                <input
                    name="count"
                    type="text"
                    class="form-control"
                    id="brandInputCount"
                    value="{{ old("count",  $product->count) }}"
                >
                @error("count")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="brandInputPrice">Цена</label>
                <input
                    name="price"
                    type="text"
                    class="form-control"
                    id="brandInputPrice"
                    value="{{ old("count",  $product->price) }}"
                >
                @error("price")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="brandInputPrice">Скидка в %</label>
                <input
                    name="discount"
                    type="number"
                    min="0"
                    max="99"
                    class="form-control"
                    id="brandInputPrice"
                    value="{{ old("count",  $product->discount) }}"
                >
                @error("price")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Характеристики</label>
        <textarea
            name="specifications"
            class="form-control"
            rows="3">{{ old("specifications",  $product->specifications) }}</textarea>
    </div>
    <div class="form-group">
        <label>Полное описание товара</label>
        <textarea id="productTextEditor" name="text" class="form-control" rows="3">{{ old("text",  $product->text) }}</textarea>
    </div>
    <div class="form-group">
        <label>Изображения товара</label>
        <input type="file" name="img[]" multiple>
        @if($errors->get("img.*"))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->get("img.*") as $messages)
                        @foreach($messages as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        @endif
        @error("img")
        <p class="text-danger">{{ $message }}</p>
        @enderror
        @if($product->imgProducts->isNotEmpty())
            <div class="col-12 product-image-thumbs">
                @foreach($product->imgProducts as $image)
                    <div id="imgProduct-{{ $image->id }}">
                        <div class="product-image-thumb">
                            <img src="{{ asset($image->path )}}" alt="{{ $image->alt }}">
                        </div>
                        <div>
                            <button
                                class="btn btn-danger mt-3 deleteImageProduct"
                                data-image-id="{{ $image->id }}"
                                data-route = "{{ route('deleteProductImage', $image->id) }}"
                            >
                                Удалить
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <div class="form-group clearfix">
        <div class="icheck-primary d-inline">
            <input
                name="view_status"
                type="checkbox"
                id="productCheckboxViewStatus"
                {{ ($product->view_status || $product->view_status === null) ? "checked" : null}}
            >
            <label for="productCheckboxViewStatus">
                Показывать продукт
            </label>
        </div>
        <div class="icheck-primary d-inline ml-4">
            <input
                name="order_status"
                type="checkbox"
                id="productCheckboxViewOrder"
                {{ ($product->order_status) ? "checked" : null}}
            >
            <label for="productCheckboxViewOrder">
                Доступен под заказ
            </label>
        </div>
    </div>

    @error("slug")
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

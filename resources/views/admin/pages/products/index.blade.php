@extends("admin")
@section("title", "Продукты")
@section("css")
@endsection

@section("content")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield("title")</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <section class="content">
        @include("admin.layouts.session-success")
            <div class="container-fluid">
                @include("admin.layouts.session-success")
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список продуктов</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <a href="{{ route("products.create") }}" class="btn btn-primary btn-sm mt-3 mb-3 ml-3">Добавить продукт</a>
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                №
                            </th>
                            <th style="width: 40%">
                                Наименование
                            </th>
                            <th>
                                Категория
                            </th>
                            <th class="text-center">
                                Статус
                            </th>
                            <th style="width: 28%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>
                                {{ $product->title }}
                                <br>
                                <small>
                                    {{ $product->created_at }}
                                </small>
                            </td>
                            <td>
                                <?php
                                    $countCategories = count($product->parentCategories($product->category));
                                    if ($countCategories === 1) $countCategories = 0;
                                ?>
                                @foreach($product->parentCategories($product->category) as $category)
                                    {{ $category->title }} {{ ($countCategories > 0) ? " -> " : null}}
                                    @php($countCategories = -1)
                                @endforeach
                            </td>
                            <td class="project-state">
                                @if($product->view_status)
                                    <span class="badge badge-success">Опубликован</span>
                                @else
                                    <span class="badge badge-warning">Не опубликован</span>
                                @endif

                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="{{ route("products.show", $product->id) }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Смотреть
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route("products.edit", $product->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Редактировать
                                </a>
                                <button type="submit" form="deleteProductForm-{{$product->id}}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash">
                                    </i>
                                    Удалить
                                </button>
                                <form
                                    id="deleteProductForm-{{$product->id}}"
                                    method="post"
                                    action="{{ route("products.destroy", $product->id) }}"
                                >
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </td>
                        </tr>
                            <?php $i++ ?>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route("products.create") }}" class="btn btn-primary btn-sm mt-3 mb-3 ml-3">Добавить продукт</a>
                </div>
            </div>
        </section>
    </div>


@endsection

@section("scripts")

@endsection








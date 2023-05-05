@extends("admin")
@section("title", "Категории")
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
        <!-- Default box -->
            <div class="container-fluid">
                @include("admin.layouts.session-success")
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список категорий</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <a href="{{ route("categories.create") }}" class="btn btn-primary btn-sm mt-3 mb-3 ml-3">Добавить категорию</a>
                    <table class="table table-striped projects">
                        <thead>

                        <tr>
                            <th style="width: 1%">
                                №
                            </th>
                            <th style="width: 20%">
                                Название
                            </th>
                            <th style="width: 20%">
                                Родительска категория
                            </th>
                            <th>
                                Краткое описание
                            </th>
                            <th style="width: 20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ ($category->parent_id !== 0) ? $category->parentCategory()->title : "Нет родителя" }}</td>
                            <td>{{ $category->description }}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ route("categories.edit", $category->id) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                    Редактировать
                                </a>
                                <button type="submit" form="categoryDeleteForm-{{ $category->id }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                    Удалить
                                </button>
                                <form method="post" id="categoryDeleteForm-{{ $category->id }}" action="{{ route("categories.destroy", $category->id) }}">
                                    @csrf @method("DELETE")
                                </form>
                            </td>
                        </tr>
                            <?php $i++;?>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route("categories.create") }}" class="btn btn-primary btn-sm mt-3 mb-3 ml-3">Добавить категорию</a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>


@endsection

@section("scripts")

@endsection







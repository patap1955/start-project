@extends("admin")
@section("title", "Бренды")
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
                    <h3 class="card-title">Список брендов</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <a href="{{ route("brands.create") }}" class="btn btn-primary btn-sm mt-3 mb-3 ml-3">Добавить бренд</a>
                    <table class="table table-striped projects">
                        <thead>

                        <tr>
                            <th style="width: 1%">
                                №
                            </th>
                            <th style="width: 20%">
                                Название
                            </th>
                            <th style="width: 20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $brand->name }}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route("brands.edit", $brand->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                        Редактировать
                                    </a>
                                    <button type="submit" form="brandDeleteForm-{{ $brand->id }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        Удалить
                                    </button>
                                    <form method="post" id="brandDeleteForm-{{ $brand->id }}" action="{{ route("brands.destroy", $brand->id) }}">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </td>
                            </tr>
                            <?php $i++;?>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route("brands.create") }}" class="btn btn-primary btn-sm mt-3 mb-3 ml-3">Добавить бренд</a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>


@endsection

@section("scripts")

@endsection








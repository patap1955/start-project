@extends("admin")
@section("title", "Добавление категории")
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
{{--            <div class="container-fluid">--}}
{{--                @include("admin.layouts.session-success")--}}
{{--            </div>--}}
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
                    <form method="post" action="{{ route("categories.store") }}">
                        @csrf
                        @include("admin.pages.categories.form")
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>


@endsection

@section("scripts")

@endsection








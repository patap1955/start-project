@extends("admin")
@section("title", "Редактирование бренда " . $brand->name)
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Форма редактирования</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <form method="post" action="{{ route("brands.update", $brand->id) }}">
                        @csrf
                        @method("PATCH")
                        @include("admin.pages.brands.form")
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>


@endsection

@section("scripts")

@endsection









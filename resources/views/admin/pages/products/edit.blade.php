@extends("admin")
@section("title", "Редактирование продукта " . $product->title)
@section("css")
    <link rel="stylesheet" href="{{ asset("assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/plugins/select2/css/select2.min.css") }}">
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
                    <h3 class="card-title">Форма добавления</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <form id="productForm" method="post" action="{{ route("products.update", $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        @include("admin.pages.products.form")
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset("assets/admin/plugins/select2/js/select2.full.min.js") }}"></script>
    <script src="{{ asset("assets/admin/plugins/ckeditor/ckeditor.js") }}"></script>
    <script src="{{ asset("assets/admin/js/components/deleteProducCardImg.js") }}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('productTextEditor', options);

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            $('.select3').select2()
        })
    </script>
@endsection











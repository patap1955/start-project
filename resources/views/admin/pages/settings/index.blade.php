@extends("admin")
@section("title", "Настройки сайта")
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
    <div class="card">
        <div class="card-body">
            <div class="tab-content">

                <div class="tab-pane active" id="settings">
                    <form class="form-horizontal" method="post" action="{{ route("setting.update", ["setting" => $settings->id]) }}">
                        @csrf
                        @method("PATCH")
                        <div class="form-group row">
                            <label for="inputSiteName" class="col-sm-2 col-form-label">Название сайта</label>
                            <div class="col-sm-10">
                                <input required name="site_name" type="text" class="form-control" id="inputSiteName" value="{{ old("site_name", $settings->site_name) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCompanyName" class="col-sm-2 col-form-label">Название компании</label>
                            <div class="col-sm-10">
                                <input name="company_name" type="text" class="form-control" id="inputCompanyName" value="{{ old("site_name", $settings->company_name) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPhone" class="col-sm-2 col-form-label">Телефон</label>
                            <div class="col-sm-10">
                                <input required name="phone" type="phone" class="form-control" id="inputPhone" value="{{ old("phone", $settings->phone) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Электронная почта</label>
                            <div class="col-sm-10">
                                <input required name="email" type="text" class="form-control" id="inputEmail" value="{{ old("email", $settings->email) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAddress" class="col-sm-2 col-form-label">Адрес</label>
                            <div class="col-sm-10">
                                <textarea required name="address" class="form-control" id="inputAddress">{{ old("address", $settings->address) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputDescription" class="col-sm-2 col-form-label">Краткое описание сайта</label>
                            <div class="col-sm-10">
                                <textarea name="descriptions" class="form-control" id="inputDescription">{{ old("description", $settings->descriptions) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
@endsection

@section("scripts")
    <script src="{{ asset("assets/admin/plugins/ckeditor/ckeditor.js") }}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('articleTextEditor', options);
    </script>
    </script>
@endsection





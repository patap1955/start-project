@extends("admin")
@section("title", "Редактирование статьи " . $article->title)
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

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Форма редактирования</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <a href="{{ route("article.index") }}" class="btn btn-primary btn-sm mt-3 mb-3 ml-3">Список статей</a>

                    <form method="post" action="{{ route("article.update", ["article" => $article->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <div class="card-body">
                            <div class="form-group">
                                <label for="articleInputTitle">Заголовок статьи</label>
                                <input name="title" type="text" class="form-control" id="articleInputTitle" value="{{ old("title", $article->title) }}" required>
                                @error("title")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="articleInputDesc">Краткое орисание</label>
                                <input name="description" type="text" class="form-control" id="articleInputDesc"  value="{{ old("description", $article->description) }}">
                                @error("description")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Миниатюра статьи</label>
                                <div class="input-group" >
                                    <div
                                        class="custom-file"
                                        style="display: {{ ($article->img !== null) ? 'none' : 'block' }}"
                                        id="imgArticleInput"
                                    >
                                        <input name="img" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Выбрать</label>
                                        @error("img")
                                        <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                    @if($article->img !== null)
                                    <div id="imgArticleBlock" style="width: 300px">
                                        <img src="{{ asset("storage/" . $article->img) }}" style="width: 100%">
                                        <button
                                            type="button"
                                            id="deleteImgArticle"
                                            class="btn btn-danger mt-3"
                                            data-src="{{ $article->img }}"
                                            data-article-id="{{ $article->id }}"
                                        >
                                            Удалить
                                        </button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-check">
                                <input name="status_view" type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                                <label class="form-check-label" for="exampleCheck1">Показывать на сайте?</label>
                            </div>
                            <div class="form-group mt-3">
                                <label for="summernote">Текс статьи</label>
                                <textarea name="text" id="articleTextEditor" style="display: none;">{{ $article->text }}</textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset("assets/admin/js/components/images.js") }}"></script>
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
@endsection





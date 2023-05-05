@extends("admin")
@section("title", "Все сертификаты")

@section("css")
    <link rel="stylesheet" href="{{ asset("assets/admin/plugins/dropzone/min/dropzone.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/component/gallery.css") }}">
@endsection

@section("content")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield("title")</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route("admin.index") }}">Главная</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Предворительный просмотр</h3>
                </div>
                <div class="card-body">
                    <div id="actions" class="row">
                        <div>
                            <a href="{{ route("certificate.create") }}" class="btn btn-block btn-primary btn-sm">Добавить сертификат</a>
                        </div>
                    </div>

                    <div class="foto-gallery">
                        <div class="foto-gallery__list">
                            @foreach($galleries as $gallery)
                                <div class="foto-gallery__item" id="galleryItem-{{ $gallery->id }}">
                                    <div class="img-block">
                                        <img src="{{ asset("storage/" . $gallery->img) }}" alt="{{ $gallery->alt }}">
                                    </div>
                                    <div class="input-block">
                                        <form class="sendGallery" id="sendGallery-{{ $gallery->id }}">
                                            @csrf
                                            @method("PATCH")
                                            <div class="custom-control custom-checkbox">
                                                <input
                                                    class="custom-control-input"
                                                    name="status_gallary"
                                                    type="checkbox"
                                                    id="checkboxGallery{{ $gallery->id }}"
                                                    {{ ($gallery->status_gallary) ? "checked" : null }}
                                                >
                                                <label for="checkboxGallery{{ $gallery->id }}" class="custom-control-label">Добавить в блок Портфолио?</label>
                                            </div>
                                            <input name="id_gallery" type="hidden" value="161">
                                            <div class="form-group">
                                                <label>Описание изображения</label>
                                                <input class="form-control" type="text" name="alt" id="inputAltGallery{{ $gallery->id }}" value="{{ $gallery->link }}">
                                            </div>
                                            <button
                                                type="button"
                                                class="btn btn-block btn-info btn-sm"
                                                data-gallery="{{ $gallery->id }}"
                                                onclick="formOnSubmit({{ $gallery->id }})"
                                            >
                                                Сохранить
                                            </button>
                                        </form>
                                        <form class="mt-3">
                                            @csrf
                                            @method("DELETE")
                                            <button type="button" class="btn btn-block btn-danger btn-sm deleteGallery" data-gallery="{{ $gallery->id }}" >
                                                Удалить
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="row">
                        <div class="mt-3">
                            <a href="{{ route("certificate.create") }}" class="btn btn-block btn-primary btn-sm">Добавить сертификат</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset("assets/admin/js/components/certificateGallery.js") }}"></script>
@endsection


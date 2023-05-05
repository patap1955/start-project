@extends("admin")
@section("title", "Список статей")
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
            <div class="container">
                @include("admin.layouts.session-success")
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Весь список</h3>

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
                    <a href="{{ route("article.create") }}" class="btn btn-primary btn-sm mt-3 mb-3 ml-3">Добавить статью</a>
                    @if($articles->isNotEmpty())
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 10%">
                                #
                            </th>
                            <th style="width: 50%">
                                Название статьи
                            </th>
                            <th style="width: 8%" class="text-center">
                                Статус
                            </th>
                            <th style="width: 32%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>
                                <img style="width: 100%" src="{{ asset("storage/" . $article->img) }}">
                            </td>
                            <td>
                                <a href="{{ route("article.edit", ["article" => $article->id]) }}">
                                    {{ $article->title }}
                                </a>
                            </td>
                            <td class="project-state">
                                @if($article->status_view)
                                <span class="badge badge-success">Опублекованна</span>
                                @else
                                    <span class="badge badge-warning">не опублекованна</span>
                                @endif
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Редактировать
                                </a>
                                <button
                                    type="submit"
                                    form="deleteArticleForm"
                                    class="btn btn-danger btn-sm"
                                >
                                    <i class="fas fa-trash">
                                    </i>
                                    Удалить
                                </button>
                                <form
                                    id="deleteArticleForm"
                                    method="post"
                                    action="{{ route("article.destroy", ["article" => $article->id]) }}"
                                >
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <h3 class="ml-3">Список статей пуст</h3>
                    @endif
                    <a href="{{ route("article.create") }}" class="btn btn-primary btn-sm mt-3 mb-3 ml-3">Добавить статью</a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>
@endsection

@section("scripts")
@endsection



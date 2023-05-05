@extends("admin")
@section("title", "Добавление роли")
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
                    <form method="post" action="{{ route("roles.store") }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="roleInputTitle">Название роли</label>
                                <input name="title" type="text" class="form-control" id="roleInputTitle">
                            </div>

                            <div class="form-group">
                                <label for="roleInputName">Уникальная ссылка</label>
                                <input name="name" type="text" class="form-control" id="roleInputName">
                            </div>

                            <div class="form-group">
                                <strong>Доступные права</strong>
                                <br/>
                                @foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->title }}</label>
                                    <br/>
                                @endforeach
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Добавить</button>
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








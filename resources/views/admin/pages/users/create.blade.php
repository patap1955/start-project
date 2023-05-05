@extends("admin")
@section("title", "Добавление пользователя")
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


    <div class="container">
        @include("admin.layouts.session-success")
    </div>


    <div class="content">
        <section class="content">

            <!-- Default box -->
            <div class="container">
                @include("admin.layouts.session-success")
            </div>
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
                    <form method="post" action="{{ route("users.store") }}">
                        @csrf
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Имя:</strong>
                                <input type="text" class="form-control" name="name" >
                            </div>
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="email" class="form-control" name="email" >
                            </div>
                            <div class="form-group">
                                <strong>Пароль:</strong>
                                <input type="password" class="form-control" name="password" >
                            </div>
                            <div class="form-group">
                                <strong>Повторите пароль:</strong>
                                <input type="password" class="form-control" name="confirm-password" >
                            </div>
                            <div class="form-group">
                                <p><strong>Роль пользователя:</strong></p>
                                @foreach($roles as $role)
                                    <label class="mr-1">{{ $role->title }}</label>
                                    <input type="checkbox" class="mr-3" value="{{ $role->name }}">
                                @endforeach
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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







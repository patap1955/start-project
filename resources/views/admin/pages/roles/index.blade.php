@extends("admin")
@section("title", "Роли")
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
                    <h3 class="card-title">Список ролей</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <a href="{{ route("roles.create") }}" class="btn btn-primary btn-sm mt-3 mb-3 ml-3">Добавить роль</a>
                    <table class="table table-bordered">
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Уникальная ссылка</th>
                            <th>Действие</th>
                        </tr>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->title }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('role-edit')
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Редактировать</a>
                                    @endcan
                                    @if($role->name !== "admin")
                                        @can('role-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {!! $roles->render() !!}
                    <a href="{{ route("roles.create") }}" class="btn btn-primary btn-sm mt-3 mb-3 ml-3">Добавить роль</a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>


@endsection

@section("scripts")

@endsection






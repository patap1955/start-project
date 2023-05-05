@extends("admin")
@section("title", "Пользователи")
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
                    <h3 class="card-title">Список пользователей</h3>

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
                    <a href="{{ route("users.create") }}" class="btn btn-primary btn-sm mt-3 mb-3 ml-3">Добавить пользователя</a>

                    <table class="table table-bordered">
                        <tr>
                            <th>№</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Роль</th>
                            <th >Действие</th>
                        </tr>
                        @foreach ($data as $key => $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleTitle() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Смотреть</a>
                                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Редактировать</a>
                                    @if(!$user->hasRole(["Admin"]))
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>


                    {!! $data->render() !!}

                    <a href="{{ route("users.create") }}" class="btn btn-primary btn-sm mt-3 mb-3 ml-3">Добавить пользователя</a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>


@endsection

@section("scripts")

@endsection






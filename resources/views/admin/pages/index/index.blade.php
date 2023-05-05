@extends("admin")

@section("title", "Админ-панель")

@section("css")
@endsection

@section("content")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield("title")</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="small-box bg-gradient-info">
                        <div class="inner">
                            <h3>Статистика</h3>
                            <p>Кол-во просмотров</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="small-box-footer">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Переод</th>
                                    <th>Посещения</th>
                                    <th>Просмотры</th>
                                    <th>Новые посетители</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>За сегодня</td>
                                    <td>{{ $today['visits'] }}</td>
                                    <td>{{ $today['count_views'] }}</td>
                                    <td>{{ $today['unic_visits'] }}</td>
                                </tr>
                                <tr>
                                    <td>За неделю</td>
                                    <td>{{ $week['visits'] }}</td>
                                    <td>{{ $week['count_views'] }}</td>
                                    <td>{{ $week['unic_visits'] }}</td>
                                </tr>
                                <tr>
                                    <td>За месяяц</td>
                                    <td>{{ $month['visits'] }}</td>
                                    <td>{{ $month['count_views'] }}</td>
                                    <td>{{ $month['unic_visits'] }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
@endsection

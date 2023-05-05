<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route("admin.index") }}" class="brand-link">
        <img src="{{ asset("admin/img/AdminLTELogo.png") }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @hasanyrole('admin|manager')
                    <li class="nav-item">
                        <a href="{{ route("admin.index") }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Главная
                            </p>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route("admin.contacts") }}" class="nav-link">--}}
{{--                            <i class="nav-icon fas fa-th"></i>--}}
{{--                            <p>--}}
{{--                                Заявки--}}
{{--                                --}}{{--                            <span class="right badge badge-danger">New</span>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route("gallery.index") }}" class="nav-link">--}}
{{--                            <i class="nav-icon fas fa-th"></i>--}}
{{--                            <p>--}}
{{--                                Галерея--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route("categories.index") }}" class="nav-link">--}}
{{--                            <i class="nav-icon fas fa-th"></i>--}}
{{--                            <p>--}}
{{--                                Категории--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route("article.index") }}" class="nav-link">--}}
{{--                            <i class="nav-icon fas fa-th"></i>--}}
{{--                            <p>--}}
{{--                                Статьи--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a href="{{ route("news.index") }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Новости
                            </p>
                        </a>
                    </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route("certificate.index") }}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-th"></i>--}}
{{--                        <p>--}}
{{--                            Сертификаты--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route("metrica.index") }}" class="nav-link">--}}
{{--                            <i class="nav-icon fas fa-th"></i>--}}
{{--                            <p>--}}
{{--                                Метрика--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                @endhasanyrole
                @role("admin")
                    <li class="nav-item">
                        <a href="{{ route("setting.index") }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Настройки
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("roles.index") }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Роли
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("users.index") }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Пользователи
                            </p>
                        </a>
                    </li>
                @endrole
                @role("customer")
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Мои заказы
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Профиль
                        </p>
                    </a>
                </li>
                @endrole
            </ul>
        </nav>
    </div>
</aside>

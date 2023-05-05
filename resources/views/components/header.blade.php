<header class="fixedHeader">
    <div id="fixedHeader" class="header">
        <div class="header__content containers">
            <div class="header__logo">
                <a href="{{ route('index') }}">
                    <img class="svg" src="{{ asset('assets/img/logo.svg') }}" alt="">
                </a>
            </div>
            <div class="header__nav">
                <ul class="nav nav__list-header">
                    <li class="nav__item-header"><a href="@if($_SERVER['REQUEST_URI'] !== "/"){{ route('index') }}@endif#about">О компании</a></li>
                    <li class="nav__item-header"><a href="@if($_SERVER['REQUEST_URI'] !== "/"){{ route('index') }}@endif#baths">Бани</a></li>
                    <li class="nav__item-header"><a href="@if($_SERVER['REQUEST_URI'] !== "/"){{ route('index') }}@endif#laundry">Прачечная</a></li>
                    <li class="nav__item-header"><a href="{{ route('news-index') }}">Информация</a></li>
                    <li class="nav__item-header"><a href="@if($_SERVER['REQUEST_URI'] !== "/"){{ route('index') }}@endif#contacts">Контакты</a></li>
                </ul>
            </div>
{{--            <a class="header__phone" href="tel:+7 920 007-65-26">+7 920 007-65-26</a>--}}
        </div>
    </div>
</header>

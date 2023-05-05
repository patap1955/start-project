<footer id="footer">
    <div class="footer containers">
        <div class="footer__block1">
            <div class="footer__logo">
                <a href="{{ route("index") }}">
                    <img class="svg" src="{{ asset('assets/img/logo-footer.svg') }}" alt="">
                </a>
            </div>
            <div class="footer__rights">© <?php echo date('Y'); ?> , Все права защищены</div>
        </div>
        <div class="footer__block2">
            <nav class="footer__nav">
                <ul>
                    <li><a href="@if($_SERVER['REQUEST_URI'] !== "/"){{ route('index') }}@endif#about">О компании</a></li>
                    <li><a href="@if($_SERVER['REQUEST_URI'] !== "/"){{ route('index') }}@endif#baths">Бани</a></li>
                    <li><a href="@if($_SERVER['REQUEST_URI'] !== "/"){{ route('index') }}@endif#laundry">Прачечная</a></li>
                    <li><a href="{{ route('news-index') }}">Информация</a></li>
                    <li><a href="@if($_SERVER['REQUEST_URI'] !== "/"){{ route('index') }}@endif#contacts">Контакты</a></li>
                </ul>
            </nav>
            <div class="footer__block2-pa">
                <div class="footer__block2-pa-policy"><a href="{{ route("politics") }}">Политика конфиденциальности</a></li></div>
                <div class="footer__block2-pa-alexmedia">Сайт разработан компанией <a href="https://alex-media.ru/">ALEX–MEDIA</a> </div>
            </div>
        </div>
        <div class="footer__disclaimer">Цены на сайте не являются публичной офертой</div>
    </div>
    @include('layouts.popupBath')
    @include('layouts.popupRoom1')
    @include('layouts.popupRoom2')
    @include('layouts.popupLaundry')
</footer>

<section id="info">
    <div class="info containers">
        <h2>Важная информация</h2>
        <div class="info__cards">
            <?php $i=0 ?>
            @foreach($news as $new)
                <div class="info__card @if($i === 0)info__card-important @endif">
                    @if($i === 0)
                        <picture info__card-img>
                            <source srcset="{{ asset('assets/img/important1920.jpg') }}" media="(min-width: 1025px)">
                            <source srcset="{{ asset('assets/img/important1024.jpg') }}" media="(min-width: 1024px)">
                            <source srcset="{{ asset('assets/img/important768.jpg') }}" media="(min-width: 768px)">
                            <source srcset="{{ asset('assets/img/important480.jpg') }}" media="(min-width: 480px)">
                            <source srcset="{{ asset('assets/img/important360.jpg') }}" media="(min-width: 360px)">
                            <img src="{{ asset('assets/img/important-img.jpg') }}" alt="">
                        </picture>
                    @endif
                    <div class="info__card-text">
                        <p class="bold @if($i === 0)important-header @endif">{{ $new->title }}</p>
                        <p style="padding-bottom: 20px; margin-bottom: auto">{{ cropStr($new->description) }}</p>
                        <a href="{{ route('show-news', ['news' => $new->slug]) }}" class="info__card-text-details">Подробнее</a>
                    </div>
                </div>
                <?php $i++ ?>
            @endforeach
{{--            <div class="info__card">--}}
{{--                <div class="info__card-text">--}}
{{--                    <p class="bold">График работы на 8 марта</p>--}}
{{--                    <p style="padding-bottom: 20px; margin-bottom: auto">Мы работаем для вас с 10:00 до 19:00! Если у вас намечается большое застолье,</p>--}}
{{--                    <a href="" class="info__card-text-details">Подробнее</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="info__card">--}}
{{--                <div class="info__card-text">--}}
{{--                    <p class="bold">Ищем нового сотрудника</p>--}}
{{--                    <p style="padding-bottom: 20px; margin-bottom: auto">Ищем сотрудника в баню на постоянную работу в центре города. Требования: Опыт…</p>--}}
{{--                    <a href="" class="info__card-text-details">Подробнее</a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</section>

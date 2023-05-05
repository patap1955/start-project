<section id="bath2">
    <div class="bath containers">
        <div class="bath__content">
            <div class="animate__animated bath__text">
                <h3>Городская баня № 2</h3>
                <h4>г. Арзамас, ул. Калинина, д. 32</h4>
                <p>Русская парная, веники, массажное кресло, парикмахерская, буфет, душевое отделение</p>
                <div class="bath__schedule">
                    <div class="bath__schedule-column">
                        <h4>График работы</h4>
                        <p class="bold"> Пн: выходной</p>
                        <p class="bold">Вт: санитарный день</p>
                        <p class="bold">Ср-Вс: круглосуточно</p>
                    </div>
                    <div class="bath__schedule-column">
                        <h4>Ежедневные сеансы</h4>
                        <p class="bold">с 12.00 до 14.00</p>
                        <p class="bold">с 14.30 до 16.30 </p>
                        <p class="bold">с 17.00 до 19.00 </p>
                        <p class="bold">с 19.30 до 21.30</p>
                    </div>
                </div>
                <button id="popUp" class="btn bath__btn">
                    Стоимость
                </button>
            </div>
            <div class="animate__animated bath__image">
                {{-- <img src="{{ asset('assets/img/bath1-1.jpg') }}" alt=""> --}}
                @include('../components/swiperBath2')
            </div>
        </div>
    </div>
</section>

<section id="rooms">
    <div class="rooms containers">
        <h2>Номерные отделения</h2>
        <div class="rooms__cards">
            <div class="rooms__card animate__animated" id="room1">
                <div class="rooms__img">
                    <picture>
                        <source srcset="{{ asset('assets/img/room1-1920.jpg') }}" media="(min-width: 1025px)">
                        <source srcset="{{ asset('assets/img/room1-1024.jpg') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('assets/img/room1-768.jpg') }}" media="(min-width: 768px)">
                        <source srcset="{{ asset('assets/img/room1-480.jpg') }}" media="(min-width: 480px)">
                        <source srcset="{{ asset('assets/img/room1-360.jpg') }}" media="(min-width: 360px)">
                        <img src="{{ asset('assets/img/room1-1920.jpg') }}" alt="">
                    </picture>
                </div>
                <div class="rooms__text">
                    <h4>Русская парная + бассейн</h4>
                    <button id="popUp"  class="btn">Стоимость</button>
                </div>
            </div>
            <div class="rooms__card animate__animated" id="room2">
                <div class="rooms__img">
                    <picture>
                        <source srcset="{{ asset('assets/img/room2-1920.jpg') }}" media="(min-width: 1025px)">
                        <source srcset="{{ asset('assets/img/room2-1024.jpg') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('assets/img/room2-768.jpg') }}" media="(min-width: 768px)">
                        <source srcset="{{ asset('assets/img/room2-480.jpg') }}" media="(min-width: 480px)">
                        <source srcset="{{ asset('assets/img/room2-360.jpg') }}" media="(min-width: 360px)">
                        <img src="{{ asset('assets/img/room2-1920.jpg') }}" alt="">
                    </picture>
                </div>
                <div class="rooms__text">
                    <h4>Русская парная + обливная бочка</h4>
                    <button id="popUp" class="btn">Стоимость</button>
                </div>
            </div>
        </div>
    </div>
</section>

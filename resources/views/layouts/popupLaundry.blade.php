<div id="laundryPopUp" class="modalForm">
    <div class="modal-content-form laundry__popup popup"> <span class="closeForm">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9.12485 12.0106L0 2.87786L2.85522 0.0201559L11.9801 9.15293L21.125 0L24 2.87745L14.855 12.0304L23.959 21.1423L21.1038 24L11.9998 14.8881L2.89619 23.9996L0.0212416 21.1221L9.12485 12.0106Z"
                    fill="#C4CDDE" />
            </svg>
        </span>
        <div class="table-container">
        <h2>ПРАЧЕЧНАЯ САМООБСЛУЖИВАНИЯ</h2>

            <table>
                <tr>
                    <th>Услуга</th>
                    <th>Загрузка машины 7 кг</th>
                    <th>Загрузка машины 9 кг</th>
                    <th>Загрузка машины 15 кг</th>
                </tr>
                <tr>
                    <td>Стирка и сушка белья</td>
                    <td>400</td>
                    <td>500</td>
                    <td>800</td>
                </tr>
                <tr>
                    <td>Стирка и сушка белья для льготной категории (-10%)</td>
                    <td>360</td>
                    <td>450</td>
                    <td>720</td>
                </tr>
                <tr>
                    <td>Стирка белья</td>
                    <td>300</td>
                    <td>350</td>
                    <td>450</td>
                </tr>
                <tr>
                    <td>Стирка белья для льготной категории (-10%)</td>
                    <td>270</td>
                    <td>315</td>
                    <td>405</td>
                </tr>
            </table>
            <p>*К льготной категории относятся: участники, инвалиды ВОВ, вдовы участников ВОВ и лица к ним приравненные;
                инвалиды 1, 2 групп; труженики тыла; <a href="{{ asset("storage/downloads/documents/doc-2.pdf") }}">(ссылка на постановление)</a> </p>
            </div>



        {{-- мишина форма обратной связи, не удаляй, вдруг понадобится --}}
        {{-- <h3 class="modal-title">Оставьте заявку, мы обязательно свяжемся с вами!</h3>
        <p class="modal-text">Оставьте свой номер телефона, и мы поможем воплотить вашу мечту в реальность</p>
        <form class="modal-form">
            <input class="modal-form-input" type="text" name="name" placeholder="Имя" id="inputName" required>
            <input class="modal-form-input" type="text" name="phone" placeholder="Телефон" id="inputPhone" required>
            <div class="modal-checkbox">
                <input type="checkbox" id="checkbox">
                <label>Согласен на обработку персональный данных</label>
            </div>
            <div class="modal-button">
                <button class="btn btn-cta" id="sendMail" disabled>Оставить заявку</button>
            </div>
        </form> --}}
    </div>
</div>

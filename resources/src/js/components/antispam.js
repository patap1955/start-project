import axios from "axios";
import Toast from "toastr";
import MicroModal from "micromodal";
(function () {

    const contactsButton = document.getElementById("contactInputButton");
    const modalForm = document.getElementById("myQuestions")
    const inputName = document.getElementById("contactInputName");
    const inputPhone = document.getElementById("contactInputPhone");
    const close = document.querySelector(".closeForm")
    const questionButton = document.getElementById("questionButton");
    const inputModal = document.getElementById("inputModal");
    const errorAnswerQuestion = document.querySelector(".errorAnswerQuestion");
    let randQuestions = null
    let errorInputs = "";

    function openModal() {
        const questions = [
            ["Сколько будет два плюс два? (Ответ напишите цифрой)", 4],
            //["Назовите столицу России? ", "Москва"],
            ["Какой сейчас век? (Ответ напишите цифрой)", 21]
        ];

        let rand = Math.floor(Math.random()*questions.length);
        randQuestions = questions[rand];

        MicroModal.show('modal-2')
        // window.onclick = (event) => {
        //     MicroModal.close('modal-2')
        // };

        let modelQuestions = document.getElementById("modelQuestions");
        modelQuestions.innerText = randQuestions[0];
    }

    if (contactsButton) {
        contactsButton.addEventListener("click", (e) => {
            e.preventDefault();
            errorInputs = "";
            let error = false;
            if (inputName && inputPhone) {
                if (inputName.value === "") {
                    error = true;
                    inputName.classList.add('is-invalid')
                    // document.getElementById('formInputNameError').innerText = "Вы не ввели свое Имя"
                    errorInputs += "<p style='color: red'>Вы не ввели свое имя</p>";
                } else {
                    inputName.classList.remove('is-invalid')
                }

                if (inputPhone.value === "") {
                    error = true;
                    inputPhone.classList.add('is-invalid')
                    // document.getElementById('formInputPhoneError').innerText = "Вы не ввели номер телефона"
                    errorInputs += "<p style='color: red'>Вы не ввели номер телефона</p>";
                } else {
                    inputPhone.classList.remove('is-invalid')
                }
            }

            if (error) {
                document.getElementById("errorInputForm").innerHTML = errorInputs;
            } else {
                inputName.classList.remove('is-invalid')
                inputPhone.classList.remove('is-invalid')
                document.getElementById("errorInputForm").innerHTML = "";
                openModal()
            }
        })
    }

    if (questionButton) {
        questionButton.addEventListener("click", (e) => {
            errorInputs = "";
            if (inputModal.value === "") errorInputs = "Вы не ответили на вопрос";
            if (inputModal.value != randQuestions[1]) errorInputs = "Ответ на вопрос не верный, попробуйте еще раз";

            if (errorInputs == "") {
                errorAnswerQuestion.innerText = "";
                questionButton.setAttribute("disabled", "disabled");
                axios.post('/form-contacts', {
                    name: inputName.value,
                    phone: inputPhone.value
                })
                    .then(function (response) {
                        if (response) {
                            inputModal.value = "";
                            MicroModal.close('modal-2')
                            questionButton.removeAttribute("disabled");
                            document.getElementById("formContacts").reset();
                            Toast.success("Ваше сообщение успешно отправленно", {interval: 3000});
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            } else {
                errorAnswerQuestion.innerText = errorInputs;
            }
        })
    }

    document.querySelectorAll('.modal__close').forEach(((val) => {
        val.addEventListener('click', () => {
            MicroModal.close('modal-2')
        })
    }))
})();

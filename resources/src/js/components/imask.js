import IMask from "imask";

// маска для ввода телефона
let element = document.querySelector(".form-phone");
let maskOptions = {
    mask: "+{7}(000)000-00-00",
};
let mask = IMask(element, maskOptions);
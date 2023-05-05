import inputMask from "inputmask";
(() => {
    const inputMaskPhone = document.getElementById("inputPhone");
    if (inputMaskPhone) inputMask("+7 (999) 999 99-99").mask(inputMaskPhone)
})()

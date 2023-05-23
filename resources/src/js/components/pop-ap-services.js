(function () {
    const buttons = document.querySelectorAll('.popAp')
    const modalForm = document.getElementById('servicesPopAp')
    const close = document.querySelector(".closeForm")

    function openModal() {

        modalForm.style.display = "block";
        document.querySelector('body').classList.add('lock')
        close.onclick = () => {
            modalForm.style.display = "none";
            document.querySelector('body').classList.remove('lock')
        }

        window.onclick = (event) => {
            if (event.target === modalForm) {
                modalForm.style.display = "none";
                document.querySelector('body').classList.remove('lock')
            }

        };
    }

    buttons.forEach((val) => {
        val.addEventListener('click', (e) => {
            e.preventDefault()
            openModal()

        })
    })
})()

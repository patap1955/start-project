(function () {
    const buttons = document.querySelectorAll("#popUp");

    function openModal(modalForm) {
        modalForm.style.display = "block";
        document.body.classList.add("lock");
        const close = modalForm.querySelector(".closeForm");
        close.onclick = () => {
            modalForm.style.display = "none";
            document.body.classList.remove("lock");
        };

        window.onclick = (event) => {
            if (event.target === modalForm) {
                modalForm.style.display = "none";
                document.body.classList.remove("lock");
            }
        };
    }

    buttons.forEach((val) => {
        val.addEventListener("click", (e) => {
            e.preventDefault();
            switch (e.target.closest("section").id) {
                case "bath2":
                case "bath3":
                    openModal(document.getElementById("bathPopUp"));
                    break;
                case "rooms":
                    if (e.target.closest(".rooms__card").id === "room1") {
                        openModal(document.getElementById("room1PopUp"));
                    } else {
                        openModal(document.getElementById("room2PopUp"));
                    }
                    break;
                case "laundry":
                    openModal(document.getElementById("laundryPopUp"));
                    break;
                default:
                    console.log("no such section");
                    break;
            }
        });
    });
})();

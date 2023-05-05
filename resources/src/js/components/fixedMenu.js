const navbar = document.querySelector(".fixedHeader");

const mQuery = window.matchMedia("(min-width: 1025px)");

function handleWitdhChange() {
    if (mQuery.matches) {
        if (window.scrollY >= 200) {
            scrollMenu();
        }

        window.addEventListener("scroll", (e) => {
            scrollMenu();
        });
    } else {
        navbar.classList.remove("navbar_scrolled");
    }

    function scrollMenu() {
        if (scrollY > 200 && window.innerWidth >= 1025) {
            navbar.classList.add("navbar_scrolled");
        } else {
            navbar.classList.remove("navbar_scrolled");
        }
    }
}
if (navbar) {
    handleWitdhChange();
    mQuery.addEventListener("change", handleWitdhChange);
}

(() => {
    const navbar = document.getElementById("fixedHeader");

    const mQuery = window.matchMedia('(min-width: 1024px)')

    if (mQuery.matches) {
        if (window.scrollY >= 200) {
            scrollMenu();
        }

        window.addEventListener("scroll", e => {
            scrollMenu();
        })
    }

    function scrollMenu () {
        if(scrollY > 200) {
            navbar.classList.add("navbar_scrolled");
        } else {
            navbar.classList.remove("navbar_scrolled");
        }
    }
})()

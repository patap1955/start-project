(function() {
    const burger = document.querySelector(".burger");
    const headerFixed = document.querySelector(".headerFixed");
    const headerNav = document.querySelector('.header__nav')
    const header = document.querySelector('.header')
    const navListHeader = document.querySelector('.nav-list-header')
    const headerButton = document.querySelector('.header__contacts')
    // const mobileMenu = document.querySelector(".mobile-menu");
    // const mobileNav = document.querySelector(".mobile__nav");
    const navLink = document.querySelectorAll('.nav-link')
    const burgerSpan = document.querySelectorAll(".burger-span")

    burger.addEventListener('click', (e) => {
        // mobileMenu.classList.toggle("active");
        // mobileNav.classList.toggle("active");
        headerFixed.classList.toggle('active')
        headerNav.classList.toggle('active')
        header.classList.toggle('active')
        navListHeader.classList.toggle('active')
        headerButton.classList.toggle('active')
        navLink.forEach((val) => {
            val.classList.toggle('active')
        })

        document.querySelector(".burger").classList.toggle("active");
        document.querySelector("body").classList.toggle("lock");

        burgerSpan.forEach((val) => {
            val.classList.toggle("active");
        });
    })

    navLink.forEach((val) => {
      val.addEventListener("click", (e) => {
          // mobileMenu.classList.remove("active");
          // mobileNav.classList.remove("active");
          navLink.forEach((val) => {
              navListHeader.classList.remove('active')
              document.querySelector(".burger").classList.remove("active");
              document.querySelector("body").classList.remove("lock");
              headerNav.classList.remove('active')
              headerFixed.classList.remove('active')
              header.classList.remove('active')
              val.classList.remove('active')
          })

          document.querySelector(".burger").classList.remove("active");
          document.querySelector("body").classList.remove("lock");

          burgerSpan.forEach((val) => {
              val.classList.remove("active");
          });

      })
  })
})();

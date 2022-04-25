/*
=============
Navigation
=============
 */
const navOpen = document.querySelector(".nav__hamburger");
const navClose = document.querySelector(".close__toggle");
const menu = document.querySelector(".nav__menu");
const scrollLink = document.querySelectorAll(".scroll-link");
const navContainer = document.querySelector(".nav__menu");

navOpen.addEventListener("click", () => {
    menu.classList.add("open");
    document.body.classList.add("active");
    navContainer.style.left = "0";
    navContainer.style.width = "30rem";
});

navClose.addEventListener("click", () => {
    menu.classList.remove("open");
    document.body.classList.remove("active");
    navContainer.style.left = "-30rem";
    navContainer.style.width = "0";
});

/*
=============
PopUp
=============
 */
const popup = document.querySelector(".popup");
const closePopup = document.querySelector(".popup__close");

if (popup) {
    closePopup.addEventListener("click", () => {
        popup.classList.add("hide__popup");
    });

    window.addEventListener("load", () => {
        setTimeout(() => {
            popup.classList.remove("hide__popup");
        }, 500);
    });
}
$(function() {
    $(document).on('hidden.bs.modal', function(e) {
        var target = $(e.target);
        target.removeData('bs.modal').find(".modal-content").html('');
    });


});
/*
=============
Fixed Navigation
=============
 */

const navBar = document.querySelector(".navigation");
const gotoTop = document.querySelector(".goto-top");

// Smooth Scroll
Array.from(scrollLink).map(link => {
    link.addEventListener("click", e => {
        // Prevent Default
        e.preventDefault();

        const id = e.currentTarget.getAttribute("href").slice(1);
        const element = document.getElementById(id);
        const navHeight = navBar.getBoundingClientRect().height;
        const fixNav = navBar.classList.contains("fix__nav");
        let position = element.offsetTop - navHeight;

        if (!fixNav) {
            position = position - navHeight;
        }

        window.scrollTo({
            left: 0,
            top: position,
        });
        navContainer.style.left = "-30rem";
        document.body.classList.remove("active");
    });
});

// Fix NavBar

window.addEventListener("scroll", e => {
    const scrollHeight = window.pageYOffset;
    const navHeight = navBar.getBoundingClientRect().height;
    if (scrollHeight > navHeight) {
        navBar.classList.add("fix__nav");
    } else {
        navBar.classList.remove("fix__nav");
    }

    if (scrollHeight > 300) {
        gotoTop.classList.add("show-top");
    } else {
        gotoTop.classList.remove("show-top");
    }
});

$(document).ready(function() {
    let process = document.getElementById('process').value;
    if (process == "aviso") {
        let id_tipo_aviso_array = document.getElementById('id_tipo_aviso').value;
        var array_tipo_aviso = id_tipo_aviso_array.split(',');
        array_tipo_aviso.forEach(element => {
            let constante = document.getElementById("glidef_" + element);
            if (constante) {
                new Glide("#glidef_" + element, {
                    type: "carousel",
                    startAt: 0,
                    perView: 4,
                    rewin: false,
                    animationDuration: 800,
                    animationTimingFunc: "cubic-bezier(0.165, 0.840, 0.440, 1.000)",
                    breakpoints: {
                        1200: {
                            perView: 3,
                        },
                        768: {
                            perView: 2,
                        },
                    },
                }).mount();
            }

        });
    } else {
        let id_tipo_promocion_array = document.getElementById('id_tipo_promocion').value;
        var array_tipo_promocion = id_tipo_promocion_array.split(',');
        array_tipo_promocion.forEach(element => {
            let constante = document.getElementById("glidex_" + element);
            if (constante) {
                new Glide("#glidex_" + element, {
                    type: "carousel",
                    startAt: 0,
                    perView: 4,
                    rewin: false,
                    animationDuration: 800,
                    animationTimingFunc: "cubic-bezier(0.165, 0.840, 0.440, 1.000)",
                    breakpoints: {
                        1200: {
                            perView: 3,
                        },
                        768: {
                            perView: 2,
                        },
                    },
                }).mount();
            }

        });
    }

})
document.addEventListener("DOMContentLoaded", () => {

    /***************** Animation menu principal *******************/
    let menuLink = document.querySelectorAll('.menu ul li a');

    menuLink.forEach(link => {
        link.addEventListener("mouseover", () => {
            link.classList.add("link-animation");
        });
    });

    /***************** Parallaxe élément de fond *******************/
    let cercle = document.querySelector('.sp3');

    function backgroundParallax() {
        let scrollPos = window.scrollY;
        cercle.style.top = 320 + scrollPos*0.6 + 'px';
    }

    window.addEventListener('scroll', backgroundParallax);
    
});



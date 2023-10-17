document.addEventListener("DOMContentLoaded", () => {

    /***************** Animation menu principal *******************/
    let menuLink = document.querySelectorAll('.menu ul li a');

    menuLink.forEach(link => {
        link.addEventListener("mouseover", () => {
            link.classList.add("link-animation");
        });
    });
    
});



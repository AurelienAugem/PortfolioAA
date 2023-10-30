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

    /***************** Barre de progression des compétences *******************/
    let html = 90;
    let css = 90;
    let javascript = 75;
    let php = 70;
    let wordpress = 60;

    function colorSelection(value) {
        let color;
        if (value <= 30) {
            color = "red";
        }else if (value <= 70) {
            color = "gold";
        }else {
            color = "green";
        }
        return color;
    }

    let progressionBars = document.querySelectorAll('.progression');
    //Modifie le niveau de complétion et la couleur des barres de progression
    progressionBars.forEach(progression => {
        let label = progression.closest('.skills-block').querySelector('.skills-label').textContent.trim();
        let width;

        switch (label) {
            case "HTML":
                width = html;
                break;
            case "CSS":
                width = css;
                break;
            case "javascript":
                width = javascript;
                break;
            case "PHP":
                width = php;
                break;
            case "WordPress":
                width = wordpress
                break;
        
            default:
                break;
        }

        let progressColor = colorSelection(width);
        progression.style.width = width + "%"; 
        progression.style.backgroundColor = progressColor;
    });
    
});



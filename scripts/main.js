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
        cercle.style.top = 320 + scrollPos*0.3 + 'px';
    }

    function animationParallax(){
        requestAnimationFrame(backgroundParallax);
    }

    window.addEventListener('scroll', backgroundParallax);

    /***************** Animation des sections *******************/
    let sectionSkills = document.querySelector('.skills');
    let sectionProject = document.querySelector('.project-gallery');

    const sectionObserver = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("animate-section");
                entry.target.classList.remove("opacity-none");
            }
        });
    }, {threshold: 0.5});

    sectionObserver.observe(sectionSkills);
    sectionObserver.observe(sectionProject);

    /***************** Barre de progression des compétences *******************/
    let html = 90;
    let css = 90;
    let javascript = 80;
    let php = 75;
    let wordpress = 80;

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

        let spanPercent = document.createElement("span");
        progression.parentNode.after(spanPercent);
        spanPercent.textContent = width + '%';
        spanPercent.style.color = progressColor;
    });

    /***************** Menu principal en responsive *******************/
    function mainMenuResponsive() {
        
        let screenSize = window.innerWidth;
        let dataLink = document.querySelector('.data-link');
        let themePath = dataLink.getAttribute("data-link");

        if (screenSize <= 780) {
            menuLink.forEach(link => {
                let linkContent = link.textContent.trim();
                switch (linkContent) {
                    case "Accueil":
                        link.innerHTML = "";
                        let homeImage = document.createElement("img");
                        homeImage.classList.add('menu-btn');
                        homeImage.width = 48;
                        homeImage.height = 48;
                        homeImage.src = themePath + '/assets/images/home.svg';
                        link.appendChild(homeImage);
                        link.classList.add('home-button');
                        break;
                    case "Contact":
                        link.innerHTML = "";
                        let contactImage = document.createElement("img");
                        contactImage.classList.add('menu-btn');
                        contactImage.width = 48;
                        contactImage.height = 48;
                        contactImage.src = themePath + '/assets/images/mail.svg';
                        link.appendChild(contactImage);
                        link.classList.add('contact-button');
                        break;

                    default:
                        break;
                }
            });
        }else{
            menuLink.forEach(link => {
                let image = link.querySelector('.menu-btn');
                if (image !== null) {
                    let imagePath = image.getAttribute("src");
                    switch (imagePath) {
                        case themePath + '/assets/images/home.svg':
                            image.remove();
                            link.innerHTML = "Accueil";
                            link.classList.remove('home-button');
                            break;
                        case themePath + '/assets/images/mail.svg' :
                            image.remove();
                            link.innerHTML = "Contact";
                            link.classList.remove('contact-button');
                            break;

                        default:
                            break;
                    }
                }
            })
        }
    }

    function resizingWindow() {
        mainMenuResponsive();
    }

    window.addEventListener('resize', resizingWindow);

    window.addEventListener('load', mainMenuResponsive);

});



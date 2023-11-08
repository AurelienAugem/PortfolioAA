document.addEventListener("DOMContentLoaded", () => {

    //Filtre des projets en fonction de leur type
    function projectFilter(button){
        let slug = button.dataset.slug;
        let ajaxUrl = button.dataset.adminurl;
        let gallery = document.querySelector('.gallery');
        gallery.innerHTML='';

        let formData = new FormData();
        formData.append('action','portfolio_project_filter');
        formData.append('projectType', slug);

        let request = {
            method: "POST",
            body: formData
        };

        switch (slug) {
            case "formation":
            case "pro":
            case "perso":
                fetch(ajaxUrl, request)
                .then(function (response) {
                    return response.text(); 
                })
                .then(function (response) {
                    gallery.innerHTML = response;
                })
                .catch(error => alert(error));
                break;  
            default:
                break;
        }
    }

    let buttons = document.querySelectorAll('.filter-button');
    buttons.forEach(btn => {
        btn.addEventListener('click', function () {
            projectFilter(btn); 
        });
    });

});
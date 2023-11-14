const popupOpenButton = document.getElementById('open-popup');
const popupContainer = document.getElementById('popup-container');
const popup = document.getElementById('popup');
const popupCloseButton = document.getElementById('close-popup');

/* ABRIR POP-UP PARA REGISTRAR UNA NUEVA EMPRESA */

popupOpenButton.addEventListener('click', function(){
    popupContainer.classList.add('active');
    popup.classList.add('active');
});

popupCloseButton.addEventListener('click', function(e){
    e.preventDefault();
    popupContainer.classList.remove('active');
    popup.classList.remove('active');
});

/* CARGAR PÁGINA DE DETALLE DE LA EMPRESA QUE CLICKEMOS */

document.addEventListener('click', function (event) {
    if (event.target.classList.contains('meteordg-company')) {
        const companyName = event.target.getAttribute('data-company');
        console.log('Hiciste clic en: ' + companyName);
        redirectToCompanyDetails(companyName);
    }
});

function redirectToCompanyDetails(company) {
    const companyPage = 'company-details.php'; // Coloca aquí la URL de la página de detalles
    if (companyPage) {
        window.location.href = companyPage;
    }
}

/*function redirectToCompanyPage(companyName) {
    // Comprueba si la compañía existe en el objeto companyPages
    if (companyName in companyPages) {
        // Obtén la URL de la compañía
        const companyURL = `companies-logos/${companyPages[companyName]}`;
        // Redirige a la página de la compañía
        window.location.href = companyURL;
    } else {
        // Si la compañía no se encuentra en la lista, puedes redirigir a una página de error o hacer algo apropiado.
        console.log(`No se encontró la compañía: ${companyName}`);
    }
} */



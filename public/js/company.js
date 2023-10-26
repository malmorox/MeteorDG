document.addEventListener('click', function (event) {
    if (event.target.classList.contains('meteordg-company')) {
        const companyName = event.target.getAttribute('data-company');
        redirectToCompanyPage(companyName);
    }
});

function redirectToCompanyPage(companyName) {
    // Define un objeto que mapea el nombre de la compañía a la URL correspondiente
    const companyPages = {
        'BMW': 'bmw.html',
        'KFC': 'kfc.html',
        // Agrega más compañías y URL correspondientes aquí
    };

    // Obtén la URL correspondiente al nombre de la compañía
    const companyURL = companyPages[companyName];

    // Redirige a la página de la compañía
    if (companyURL) {
        window.location.href = companyURL;
    }
}

/*function redirectToCompanyPage(companyName) {
    // Comprueba si la compañía existe en el objeto companyPages
    if (companyName in companyPages) {
        // Obtén la URL de la compañía
        const companyURL = `companies/${companyPages[companyName]}`;
        // Redirige a la página de la compañía
        window.location.href = companyURL;
    } else {
        // Si la compañía no se encuentra en la lista, puedes redirigir a una página de error o hacer algo apropiado.
        console.log(`No se encontró la compañía: ${companyName}`);
    }
} */
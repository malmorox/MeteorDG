const step1 = document.querySelector(".first-step");
const step2 = document.querySelector(".second-step");

const button = document.getElementById("continue");
button.addEventListener("click", function(event) {
    event.preventDefault(); // Evita el envío por defecto del formulario

    // Comprueba si estás en el primer paso
    if (step1.style.display !== "none") {
        // Oculta el primer paso
        step1.style.display = "none";
        // Muestra el segundo paso
        step2.style.display = "block";
    } else {
        // En este ejemplo, el formulario está en el segundo paso, pero puedes agregar más pasos y lógica según tus necesidades.
        // Aquí, podrías enviar los datos o realizar otras acciones relacionadas con el registro.
        alert("Registro completado"); // Muestra un mensaje de confirmación
    }
});



/*
let form = document.querySelector('.form-register');
let progressOptions = document.querySelectorAll('.progressbar__option');

form.addEventListener('click', function(e) {
   let element = e.target;
   let isButtonNext = element.classList.contains('step__button--next');
   let isButtonBack = element.classList.contains('step__button--back');
   if (isButtonNext || isButtonBack) {
       let currentStep = document.getElementById('step-' + element.dataset.step);
       let jumpStep = document.getElementById('step-' + element.dataset.to_step);
       currentStep.addEventListener('animationend', function callback() {
           currentStep.classList.remove('active');
           jumpStep.classList.add('active');
           if (isButtonNext) {
               currentStep.classList.add('to-left');
               progressOptions[element.dataset.to_step - 1].classList.add('active');
           } else {
               jumpStep.classList.remove('to-left');
               progressOptions[element.dataset.step - 1].classList.remove('active');
           }
           currentStep.removeEventListener('animationend', callback);
       });
       currentStep.classList.add('inactive');
       jumpStep.classList.remove('inactive');
   }
});*/
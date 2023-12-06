document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formulario');
    const contra1 = document.getElementById('contra1');
    const contra2 = document.getElementById('contra2');
   

    form.addEventListener('submit', function(event) {
        if (contra1.value !== contra2.value) {
            event.preventDefault(); // Evita que se envíe el formulario
            mostrarAlerta('Las contraseñas no coinciden.', 'error');
        }


        
    });

    function mostrarAlerta(mensaje, tipo) {
        Swal.fire({
            title: tipo === 'error' ? 'Error' : 'Advertencia',
            text: mensaje,
            icon: tipo,
            confirmButtonText: 'Ok'
        });
    }
});

function verificarCheckbox() {
    var checkbox = document.getElementById("voto");
    if (!checkbox.checked) {
      Swal.fire({
          title: "Oops...",
          text: "Por favor, seleccione el checkbox 'Voto' antes de enviar.",
          icon: "error",
      });
      return false;
    } else {
            Swal.fire({
                title: "Gracias...",
                text: "Su Voto A Sido Registrado Con Exito?",
                icon: "success",
            });
      return true;
    }

  }
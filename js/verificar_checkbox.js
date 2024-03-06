function verificarCheckbox() {
    var checkbox = document.getElementById("voto");
    if (!checkbox.checked) {
      alert("Por favor, seleccione el checkbox 'Voto' antes de enviar.");
      return false;
    } else {
      alert("Gracias. Su Voto A Sido Registrado Con Exito?");
      return true;
    }

  }
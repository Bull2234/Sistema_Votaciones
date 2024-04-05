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

  ///////////////////////////////////
  ////////////////////////////////////////
      function codcandidato() {
          let cod = document.getElementById("id_candidato").value;

          // Hacer una petición AJAX a PHP
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                  // La petición ha sido completada y la respuesta está lista
                  // Aquí puedes manejar la respuesta del servidor
                  document.getElementById("nombre_candidato").value =
                      this.responseText;
              }
          };
          xhttp.open("GET", "Nombrescan.php?cod=" + cod, true);
          xhttp.send();

          // Hacer una petición AJAX para fotoscan.php
          var xhttp2 = new XMLHttpRequest();
          xhttp2.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                  // Manejar la respuesta de fotoscan.php
                  var fotoUrl = this.responseText;
                  document.getElementById("foto_candidato").innerHTML =
                      "<img src='" +
                      fotoUrl +
                      "' alt='Foto del candidato' style='width: 120px; height: 150px;'>";
              }
          };
          xhttp2.open("GET", "fotoscan.php?cod=" + cod, true);
          xhttp2.send();
      }
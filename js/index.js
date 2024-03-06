function mostrarcandidatos(tipo) {
    event.preventDefault();
    console.log('Button clicked, tipo:', tipo);
    window.location.href = "mostrar_candidato.php?tipo=" + tipo;

}

function eliminarFila(id) {
    if (confirm("¿Estás seguro de que deseas eliminar esta fila?")) {
        window.location.href = "eliminar.php?id=" + id; // Redirecciona a eliminar.php con el ID
    }
}

function actualizarFila(id) {
    if (confirm("¿Estás seguro de que deseas actualizar esta fila?")) {
        window.location.href = "actualizar.php?id=" + id;
    }
}

function Publicar(id) {
    console.log(id); // Agrega esta línea para depurar
    if (confirm("¿Estás seguro de que deseas publicar esta votación?")) {
        window.location.href = "publicar.php?id=" + id; // Redirecciona a publicar.php con el ID
    }
}
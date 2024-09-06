document.addEventListener("DOMContentLoaded", (event) => {
  
  cargarTodo();

// Agregar event listener para el botón con ID Nissan
});

function cargarTodo(){
  fetch(`tareas.php`)
    .then((response) => response.text())
    .then((data) => {
      let divTareas = document.getElementById("tareas");
      divTareas.innerHTML = data;
    })
    .catch((error) => console.error("Error:", error));
}
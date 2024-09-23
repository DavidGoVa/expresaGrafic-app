document.addEventListener("DOMContentLoaded", function () {
    
  });

  function cargarCategorias() {
    fetch("APIproductosconregistro.php")
      .then((response) => response.text())
      .then((data) => {
        let selectElement = document.getElementById("categoria");
        selectElement.innerHTML = data;
        cargarSubcategorias();
      })
      .catch((error) => console.error("Error:", error));
  }
  function cargarSubcategorias() {
    let selected = document.getElementById("categoria");
    let option = selected.selectedOptions[0];
    let opcionSeleccionada = option.value;
    fetch(
      "APIsubcategorias.php?categoria=" + encodeURIComponent(opcionSeleccionada)
    )
      .then((response) => response.text())
      .then((data) => {
        let selectElement = document.getElementById("subcategoria");
        selectElement.innerHTML = data;
        let categorias = document.getElementById("categoriaSelect");
        categorias.innerHTML = data;
        
      })
      .catch((error) => console.error("Error:", error));
  }
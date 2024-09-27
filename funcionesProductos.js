document.addEventListener("DOMContentLoaded", function () {
    cargarCategoriasP();
  });

  function cargarCategoriasP() {
    fetch("APIproductosconregistro.php")
      .then((response) => response.text())
      .then((data) => {
        let selectElement = document.getElementById("categoriaSelect");
        selectElement.innerHTML = data;
        cargarSubcategoriasP();
      })
      .catch((error) => console.error("Error:", error));
  }
  function cargarSubcategoriasP() {
    let selected = document.getElementById("categoriaSelect");
    let option = selected.selectedOptions[0];
    let opcionSeleccionada = option.value;
    fetch(
      "APIsubcategorias.php?categoria=" + encodeURIComponent(opcionSeleccionada)
    )
      .then((response) => response.text())
      .then((data) => {
        let selectElement = document.getElementById("subcategoriaSelect");
        selectElement.innerHTML = data;
      })
      .catch((error) => console.error("Error:", error));
  }
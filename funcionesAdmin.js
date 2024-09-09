document.addEventListener('DOMContentLoaded', function() {

  cargarClientesRegistrados();

});

function mostrarOpcion() {
  // Obtener las referencias a los elementos
  let divClienteNoRegistrado = document.getElementById("divCNR");
  let divClienteRegistrado = document.getElementById("divCR");
  let divClienteEmpresa = document.getElementById("divE");

  let selectedCliente = document.getElementById("opcionCliente").value;

  if(selectedCliente === "CNR"){
    divClienteNoRegistrado.style.display = "flex";
    divClienteRegistrado.style.display = "none";
    divClienteEmpresa.style.display = "none";
  }else if(selectedCliente === "CR"){
    divClienteNoRegistrado.style.display = "none";
    divClienteRegistrado.style.display = "flex";
    divClienteEmpresa.style.display = "none";
  }else if(selectedCliente === "E"){
    divClienteNoRegistrado.style.display = "none";
    divClienteRegistrado.style.display = "none";
    divClienteEmpresa.style.display = "flex";
  }else{
    alert("no sabes nada");
  }

}


function mostrarProd(selectedProdType) {
  // Obtener las referencias a los elementos
  let divTextoProductoLibre = document.getElementById("productoLibre");
  let divCategoriaProducto = document.getElementById("productoCategoria");
  let divSubcategoriaProducto = document.getElementById("productoSubcategoria");
  let divNombreProducto = document.getElementById("productoNombre");
  let divBusquedaPorNombre = document.getElementById("busquedaNombre");
  let divResultadosBusqueda = document.getElementById("prodsBusqueda");


  if(selectedProdType === "PNR"){
    divTextoProductoLibre.style.display = "flex";
    divCategoriaProducto.style.display = "none";
    divSubcategoriaProducto.style.display = "none";
    divNombreProducto.style.display = "none";
    divBusquedaPorNombre.style.display = "none";
    divResultadosBusqueda.style.display = "none";
  }else if(selectedProdType === "PR"){
    divTextoProductoLibre.style.display = "none";
    divCategoriaProducto.style.display = "flex";
    divSubcategoriaProducto.style.display = "flex";
    divNombreProducto.style.display = "flex";
    divBusquedaPorNombre.style.display = "none";
    divResultadosBusqueda.style.display = "none";
  }else if(selectedProdType === "PB"){
    divTextoProductoLibre.style.display = "none";
    divCategoriaProducto.style.display = "none";
    divSubcategoriaProducto.style.display = "none";
    divNombreProducto.style.display = "none";
    divBusquedaPorNombre.style.display = "flex";
    divResultadosBusqueda.style.display = "flex";
  }

}

let productos = [];

function agregarProducto() {
  // Obtener valores de los inputs
  const nombre = document.getElementById('textProductoLibre').value;
  const precioUnitario = parseFloat(document.getElementById('precio').value);
  const cantidad = parseFloat(document.getElementById('cantidad').value);

 
  // Validar los valores
  if (!nombre || !precioUnitario || !cantidad) {
      alert('Por favor, ingrese valores válidos.');
      return;
  }

  // Calcular subtotal
  const subtotal = precioUnitario * cantidad;

  // Crear una nueva fila en la tabla
  const tabla = document.getElementById('tablaCotizacion').getElementsByTagName('tbody')[0];
  const nuevaFila = tabla.insertRow();

  nuevaFila.insertCell().textContent = nombre;
  nuevaFila.insertCell().textContent = precioUnitario.toFixed(2);
  nuevaFila.insertCell().textContent = cantidad;
  nuevaFila.insertCell().textContent = subtotal.toFixed(2);

  // Agregar el registro al array
  productos.push([nombre, cantidad, precioUnitario.toFixed(2), subtotal.toFixed(2)]);

  // Limpiar los inputs
  document.getElementById('textProductoLibre').value = '';
  document.getElementById('precio').value = '';
  document.getElementById('cantidad').value = '';
}

function generarPDF() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  // Agregar la imagen en la posición (0, 0) con tamaño (30 x 30.81)
  const img = new Image();
  img.src = 'img/logojunto.png';
  img.onload = function() {
    doc.addImage(img, 'PNG', 10, 5, 30, 30.81);

    // Encabezado - Información de la empresa
    doc.setFontSize(18);
    doc.setTextColor(0, 0, 0); // Negro para el nombre de la empresa
    doc.text("Expresagrafic", 200, 10, { align: "right" });

    // Información de contacto en gris
    doc.setFontSize(10);
    doc.setTextColor(105, 105, 105); // Gris
    doc.text("Albania, Tirane ish-Dogana, Durres 2001", 200, 18, { align: "right" });
    doc.text("(+355) 069 11 11 111", 200, 23, { align: "right" });
    doc.text("email@example.com", 200, 28, { align: "right" });
    doc.text("info@example.al", 200, 33, { align: "right" });
    doc.text("www.example.al", 200, 38, { align: "right" });

    doc.line(5, 42, 205, 42 )

    // Información del cliente y fecha
    doc.setFontSize(12);
    doc.setTextColor(0, 0, 0); // Negro
    doc.text("Cliente: Juan Pérez", 10, 50);
    doc.text("Fecha: 2024-09-08", 10, 55);

    

    doc.autoTable({
      head: [['Descripción', 'Cantidad', 'Precio Unitario', 'Monto']],
      body: productos,
      startY: 70
    });

    // Totales
    doc.setFontSize(12);
    doc.text("Subtotal: $265.00", 140, doc.previousAutoTable.finalY + 10);
    doc.text("Impuesto (16%): $42.40", 140, doc.previousAutoTable.finalY + 15);
    doc.text("Total: $307.40", 140, doc.previousAutoTable.finalY + 20);

    // Generar el PDF
    doc.save("factura.pdf");
  };
}

function cargarClientesRegistrados() {
  fetch('APIclientesconregistro.php')
      .then((response) => response.text())
      .then((data) => {
          let selectElement = document.getElementById("CR");
          selectElement.innerHTML = data;
      })
      .catch((error) => console.error("Error:", error));
}




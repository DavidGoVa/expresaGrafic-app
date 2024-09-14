document.addEventListener('DOMContentLoaded', function() {

  cargarClientesRegistrados();
  
  cargarClientesEmpresariales();
  cargarDatosClientes();
  cargarCategorias();
  mostrarProd();
});

let tipoClienteSeleccionado = 1;
let tipoProducto = 1;

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
    document.getElementById("precio").value = "";
    tipoProducto = 1;
  }else if(selectedProdType === "PR"){
    cargarCategorias();
    divTextoProductoLibre.style.display = "none";
    divCategoriaProducto.style.display = "flex";
    divSubcategoriaProducto.style.display = "flex";
    divNombreProducto.style.display = "flex";
    divBusquedaPorNombre.style.display = "none";
    divResultadosBusqueda.style.display = "none";
    cargarSubcategorias();
    precioProd();
    tipoProducto = 2;
  }else if(selectedProdType === "PB"){
    divTextoProductoLibre.style.display = "none";
    divCategoriaProducto.style.display = "none";
    divSubcategoriaProducto.style.display = "none";
    divNombreProducto.style.display = "none";
    divBusquedaPorNombre.style.display = "flex";
    divResultadosBusqueda.style.display = "flex";
    tipoProducto = 3;
    document.getElementById("precio").value = "";
  }

}

let productos = [];

function calcularSubtotal() {
  // Inicializar subtotal a 0 cada vez que se llame la función
  let subtotalInput = 0;

  // Iterar sobre los productos y sumar sus subtotales
  productos.forEach(producto => {
    subtotalInput += parseFloat(producto[3]);
  });

  // Actualizar el valor del input con el subtotal calculado
  document.getElementById("subtotal").value = subtotalInput.toFixed(2);
}


let filaSeleccionada = null; // Variable para almacenar la fila seleccionada

function agregarProducto() {
  let nombre = "";
  if(tipoProducto === 1){
    nombre = document.getElementById("textProductoLibre").value;
  }else if(tipoProducto === 2){
    let selectElement = document.getElementById("nombre");
    let selectedOption = selectElement.selectedOptions[0];
    nombre = selectedOption.value;
  }else if(tipoProducto === 3){
    let searchedElement = docuemnt.getElementById("prodsEnc");
    let selectedPro = searchedElement.selectedOptions[0];
    nombre = selectedPro.value;
  }else{
    nombre = "";
  }

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

  // Agregar celdas con el contenido
  nuevaFila.insertCell().textContent = cantidad;
  nuevaFila.insertCell().textContent = nombre;
  nuevaFila.insertCell().textContent = precioUnitario.toFixed(2);
  nuevaFila.insertCell().textContent = subtotal.toFixed(2);

  // Agregar el registro al array y obtener el índice
  const idProducto = productos.length; // Usar un identificador único
  productos.push([cantidad, nombre,precioUnitario.toFixed(2),subtotal.toFixed(2) ]);

  // Asignar el identificador al dataset de la fila
  nuevaFila.dataset.id = idProducto;

  // Limpiar los inputs
  document.getElementById('textProductoLibre').value = '';
  document.getElementById('precio').value = '';
  document.getElementById('cantidad').value = '';

  // Agregar el evento de clic para seleccionar la fila
  nuevaFila.addEventListener('click', function() {
    if (filaSeleccionada) {
      // Revertir el estilo de la fila previamente seleccionada
      filaSeleccionada.style.outline = '';
      filaSeleccionada.style.backgroundColor = '';
    }
    // Cambiar el estilo de la fila seleccionada
    nuevaFila.style.outline = '2px solid #007bff'; // Borde azul
    nuevaFila.style.backgroundColor = '#f0f8ff'; // Fondo ligeramente azul
    filaSeleccionada = nuevaFila; // Establecer la fila seleccionada
  });

  calcularSubtotal();
}

// Función para eliminar la fila seleccionada
function eliminarFila() {
  if (filaSeleccionada) {
    if (confirm('¿Estás seguro de que quieres eliminar esta fila?')) {
      // Obtener el identificador del producto desde el dataset de la fila
      const id = filaSeleccionada.dataset.id;

      // Obtener la tabla
      const tabla = document.getElementById('tablaCotizacion').getElementsByTagName('tbody')[0];

      // Eliminar la fila de la tabla
      tabla.deleteRow(filaSeleccionada.rowIndex-1);

      // También eliminar el producto del array
      let index = productos.findIndex(producto => producto.id === id);

      // Si el producto existe, eliminarlo usando 'splice'
      
        productos.splice(index-1, 1);
      

      // Recalcular los subtotales
      calcularSubtotal();

      // Limpiar la selección
      filaSeleccionada = null;
    }
  } else {
    alert('No has seleccionado ninguna fila para eliminar.');
  }
}

/*function agregarProducto() {
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

  // Agregar celdas con el contenido
  nuevaFila.insertCell().textContent = nombre;
  nuevaFila.insertCell().textContent = precioUnitario.toFixed(2);
  nuevaFila.insertCell().textContent = cantidad;
  nuevaFila.insertCell().textContent = subtotal.toFixed(2);

  // Agregar el registro al array y obtener el índice
  const indexProducto = productos.length; // Este será el índice del nuevo producto
  productos.push([nombre, cantidad, precioUnitario.toFixed(2), subtotal.toFixed(2)]);

  // Asignar el índice al dataset de la fila
  nuevaFila.dataset.index = indexProducto;

  // Limpiar los inputs
  document.getElementById('textProductoLibre').value = '';
  document.getElementById('precio').value = '';
  document.getElementById('cantidad').value = '';

  // Agregar el evento de clic para seleccionar la fila
  nuevaFila.addEventListener('click', function() {
    // Obtener todas las filas del cuerpo de la tabla
    const filas = tabla.getElementsByTagName('tr');
  
    // Recorrer todas las filas y quitar el estilo de resaltado
    for (let i = 0; i < filas.length; i++) {
      filas[i].style.outline = ''; // Quitar el borde de resaltado
      filas[i].style.backgroundColor = ''; // Quitar el color de fondo
    }
  
    // Agregar el estilo de resaltado a la fila seleccionada
    nuevaFila.style.outline = '2px solid #007bff'; // Borde azul
    nuevaFila.style.backgroundColor = '#f0f8ff'; // Fondo ligeramente azul

    selectedRowIndex = nuevaFila.dataset.index; 
  });
  

  calcularSubtotal();
}

// Función para eliminar el producto seleccionado
function eliminarProducto() {
  if (selectedRowIndex !== null) {
    const tabla = document.getElementById('tablaCotizacion').getElementsByTagName('tbody')[0];

    // Eliminar el producto del array
    const index = selectedRowIndex; // Restar 1 porque rowIndex incluye el encabezado
    productos.splice(index, 1);

    // Eliminar la fila de la tabla
    tabla.deleteRow(index);

    // Resetear la variable selectedRowIndex
    selectedRowIndex = null;

    // Recalcular subtotales
    calcularSubtotal();
  } else {
    alert('Por favor, selecciona una fila para eliminar.');
  }
}*/



function cargarDatosClientes(){

  let inputRFC = document.getElementById("rfc");
  let inputDomicilio = document.getElementById("domicilio");
  let inputTelefono = document.getElementById("telefono");
  let inputMail = document.getElementById("mail");
  let inputRegimen = document.getElementById("regimen");

  if(tipoClienteSeleccionado === 1){
    inputRFC.value = "";
    inputDomicilio.value = "";
    inputTelefono.value = "";
    inputMail.value = "";
    inputRegimen.value = "";
  }else if(tipoClienteSeleccionado === 2){
    let selectedElement = document.getElementById("CR");
    let clienteEscogido = selectedElement.selectedOptions[0];
    inputRFC.value = clienteEscogido.dataset.rfc;
    inputDomicilio.value = clienteEscogido.dataset.domicilio;
    inputTelefono.value = clienteEscogido.dataset.telefono;
    inputMail.value = clienteEscogido.dataset.mail;
    inputRegimen.value = clienteEscogido.dataset.regimen;
  }else if(tipoClienteSeleccionado === 3){
    let selectedElement = document.getElementById("E");
    let clienteEscogido = selectedElement.selectedOptions[0];
    inputRFC.value = clienteEscogido.dataset.rfc;
    inputDomicilio.value = clienteEscogido.dataset.domicilio;
    inputTelefono.value = clienteEscogido.dataset.telefono;
    inputMail.value = clienteEscogido.dataset.mail;
    inputRegimen.value = clienteEscogido.dataset.regimen;
  }
}

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
    tipoClienteSeleccionado = 1;
    cargarDatosClientes();
  }else if(selectedCliente === "CR"){
    divClienteNoRegistrado.style.display = "none";
    divClienteRegistrado.style.display = "flex";
    divClienteEmpresa.style.display = "none";
    tipoClienteSeleccionado = 2;
    cargarDatosClientes();
  }else if(selectedCliente === "E"){
    divClienteNoRegistrado.style.display = "none";
    divClienteRegistrado.style.display = "none";
    divClienteEmpresa.style.display = "flex";
    tipoClienteSeleccionado = 3;
    cargarDatosClientes();
  }else{
    alert("no sabes nada");
  }

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

function cargarClientesEmpresariales() {
  fetch('APIclientesempresariales.php')
      .then((response) => response.text())
      .then((data) => {
          let selectElement = document.getElementById("E");
          selectElement.innerHTML = data;
      })
      .catch((error) => console.error("Error:", error));
}

function cargarCategorias() {
  fetch('APIproductosconregistro.php')
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
  fetch('APIsubcategorias.php?categoria='+encodeURIComponent(opcionSeleccionada))
      .then((response) => response.text())
      .then((data) => {
          let selectElement = document.getElementById("subcategoria");
          selectElement.innerHTML = data;
          cargarNombreProductos();
      })
      .catch((error) => console.error("Error:", error));

      
}
function cargarNombreProductos() {
  let selectedSub = document.getElementById("subcategoria");
  let option = selectedSub.selectedOptions[0];
  let productoSeleccionado = option.value;
  fetch('APIproductosnombres.php?subcategoria='+encodeURIComponent(productoSeleccionado))
      .then((response) => response.text())
      .then((data) => {
          let selectElement = document.getElementById("nombre");
          selectElement.innerHTML = data;
      })
      .catch((error) => console.error("Error:", error));
}
function buscarProducto() {
  let productoBuscado = document.getElementById("busquedaName").value;
  fetch('APIproductosBusqueda.php?nombreBusqueda='+encodeURIComponent(productoBuscado))
      .then((response) => response.text())
      .then((data) => {
          let selectElement = document.getElementById("prodsEnc");
          selectElement.innerHTML = data;
          console.log("ya");
      })
      .catch((error) => console.error("Error:", error));
}

function precioProd() {
  let selectElement = document.getElementById("nombre");
  let selectedOption = selectElement.selectedOptions[0];
  let precio = selectedOption.dataset.precio;
  document.getElementById("precio").value = precio;
}

function generarPDF() {

  let nombreCliente = tipoClienteSeleccionado === 1 
    ? document.getElementById("CNR").value 
    : tipoClienteSeleccionado === 2 
    ? document.getElementById("CR").value 
    : tipoClienteSeleccionado === 3 
    ? document.getElementById("E").value 
    : 'Cliente No Registrado';

  let fechaSeleccionada = document.getElementById("fechaEntrega").value !== "" 
    ? "Fecha Aproximada de Entrega: " + document.getElementById("fechaEntrega").value 
    : "";

  let clienteDomicilio = tipoClienteSeleccionado === 1 
    ? "" 
    : tipoClienteSeleccionado === 2 
    ? document.getElementById("domicilio").value 
    : tipoClienteSeleccionado === 3 
    ? document.getElementById("domicilio").value 
    : 'Domicilio no disponible';

  let clienteTelefono = tipoClienteSeleccionado === 1 
    ? "" 
    : tipoClienteSeleccionado === 2 
    ? document.getElementById("telefono").value 
    : tipoClienteSeleccionado === 3 
    ? document.getElementById("telefono").value 
    : 'Teléfono no disponible';

let clienteCorreo = tipoClienteSeleccionado === 1 
    ? "" 
    : tipoClienteSeleccionado === 2 
    ? document.getElementById("mail").value 
    : tipoClienteSeleccionado === 3 
    ? document.getElementById("mail").value 
    : 'Email no disponible';

    let subtotal = parseFloat(document.getElementById("subtotal").value) || 0;
    let totalIVA = subtotal * 1.16;
    totalIVA = totalIVA.toFixed(2);
    

/*let clienteRegimen = tipoClienteSeleccionado === 1 
    ? "" 
    : tipoClienteSeleccionado === 2 
    ? document.getElementById("regimen").value 
    : tipoClienteSeleccionado === 3 
    ? document.getElementById("regimen").value 
    : 'Régimen no disponible';

let clienteRFC = tipoClienteSeleccionado === 1 
    ? "" 
    : tipoClienteSeleccionado === 2 
    ? document.getElementById("rfc").value 
    : tipoClienteSeleccionado === 3 
    ? document.getElementById("rfc").value 
    : 'RFC no disponible';*/

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
    doc.text("Casa Amarilla 117, col. Reforma Pensil, Miguel Hidalgo, CDMX", 200, 18, { align: "right" });
    doc.text("(+52) 55 4357 5320", 200, 23, { align: "right" });
    doc.text("ventasexpresa@yahoo.com", 200, 28, { align: "right" });
    doc.text("ventas@expresagrafic.com.mx", 200, 33, { align: "right" });
    doc.text("www.expresagrafic.com.mx", 200, 38, { align: "right" });

    doc.line(5, 42, 205, 42 )

    // Información del cliente y fecha
    doc.setFontSize(10);
    doc.setTextColor(105, 105, 105); // Gris
    doc.text(`Cotización emitida a:`, 10, 50);
    doc.setFontSize(14);
    doc.setTextColor(0, 0, 0);
    doc.text(`${nombreCliente}`, 10, 55);
    doc.setFontSize(10);
    doc.setTextColor(105, 105, 105); // Gris
    doc.text(`${clienteDomicilio}`, 10, 60);
    doc.text(`${clienteTelefono}`, 10, 65);
    doc.text(`${clienteCorreo}`, 10, 70);
    doc.text(fechaSeleccionada, 200, 62,  { align: "right" });
    doc.setFontSize(14);
    doc.setTextColor(0, 0, 0);
    doc.text(`Cotización #: 801 `, 200, 55, { align: "right" });

    

    doc.autoTable({
      head: [['Cantidad', 'Producto', 'Precio Unitario', 'Monto']],
      body: productos,
      startY: 75
    });

    // Totales
    doc.setFontSize(12);
    doc.text(`Total: $${subtotal}`, 140, doc.previousAutoTable.finalY + 10);
    
    doc.text(`Total + IVA: $${totalIVA}`, 140, doc.previousAutoTable.finalY + 20);

    // Generar el PDF
    doc.save("factura.pdf");
  };
}


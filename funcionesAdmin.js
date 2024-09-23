document.addEventListener("DOMContentLoaded", function () {
  cargarClientesRegistrados();

  cargarClientesEmpresariales();
  cargarDatosClientes();
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
  let divCategorias = document.getElementById("divdivC");


  if (selectedProdType === "PNR") {
    divTextoProductoLibre.style.display = "flex";
    divCategoriaProducto.style.display = "none";
    divSubcategoriaProducto.style.display = "none";
    divNombreProducto.style.display = "none";
    divBusquedaPorNombre.style.display = "none";
    divResultadosBusqueda.style.display = "none";
    document.getElementById("precio").value = "";
    divCategorias.style.display = "none";
    tipoProducto = 1;
  } else if (selectedProdType === "PR") {
    cargarCategorias();
    divTextoProductoLibre.style.display = "none";
    divCategoriaProducto.style.display = "flex";
    divSubcategoriaProducto.style.display = "flex";
    divNombreProducto.style.display = "flex";
    divBusquedaPorNombre.style.display = "none";
    divResultadosBusqueda.style.display = "none";
    divCategorias.style.display = "flex";
    divCategorias.style.justifyContent = "space-around";
    cargarSubcategorias();
    precioProd();
    tipoProducto = 2;
  } else if (selectedProdType === "PB") {
    divTextoProductoLibre.style.display = "none";
    divCategoriaProducto.style.display = "none";
    divSubcategoriaProducto.style.display = "none";
    divNombreProducto.style.display = "none";
    divBusquedaPorNombre.style.display = "flex";
    divResultadosBusqueda.style.display = "flex";
    divCategorias.style.display = "none";
    tipoProducto = 3;
    document.getElementById("precio").value = "";
  }
}

let productos = [];

function calcularSubtotal() {
  // Inicializar subtotal a 0 cada vez que se llame la función
  let subtotalInput = 0;

  // Iterar sobre los productos y sumar sus subtotales
  productos.forEach((producto) => {
    subtotalInput += parseFloat(producto[3]);
  });

  // Actualizar el valor del input con el subtotal calculado
  document.getElementById("subtotal").value = subtotalInput.toFixed(2);
}

let filaSeleccionada = null; // Variable para almacenar la fila seleccionada

function agregarProducto() {
  let nombre = "";
  if (tipoProducto === 1) {
    nombre = document.getElementById("textProductoLibre").value;
  } else if (tipoProducto === 2) {
    let selectElement = document.getElementById("nombre");
    let selectedOption = selectElement.selectedOptions[0];
    nombre = selectedOption.value;
  } else if (tipoProducto === 3) {
    let searchedElement = docuemnt.getElementById("prodsEnc");
    let selectedPro = searchedElement.selectedOptions[0];
    nombre = selectedPro.value;
  } else {
    nombre = "";
  }

  const precioUnitario = parseFloat(document.getElementById("precio").value);
  const cantidad = parseFloat(document.getElementById("cantidad").value);

  // Validar los valores
  if (!nombre || !precioUnitario || !cantidad) {
    alert("Por favor, ingrese valores válidos.");
    return;
  }

  // Calcular subtotal
  const subtotal = precioUnitario * cantidad;

  // Crear una nueva fila en la tabla
  const tabla = document
    .getElementById("tablaCotizacion")
    .getElementsByTagName("tbody")[0];
  const nuevaFila = tabla.insertRow();

  // Agregar celdas con el contenido
  nuevaFila.insertCell().textContent = cantidad;
  nuevaFila.insertCell().textContent = nombre;
  nuevaFila.insertCell().textContent = precioUnitario.toFixed(2);
  nuevaFila.insertCell().textContent = subtotal.toFixed(2);

  // Agregar el registro al array y obtener el índice
  const idProducto = productos.length; // Usar un identificador único
  productos.push([
    cantidad,
    nombre,
    precioUnitario.toFixed(2),
    subtotal.toFixed(2),
  ]);

  // Asignar el identificador al dataset de la fila
  nuevaFila.dataset.id = idProducto;

  // Limpiar los inputs
  document.getElementById("textProductoLibre").value = "";
  document.getElementById("precio").value = "";
  document.getElementById("cantidad").value = "";

  // Agregar el evento de clic para seleccionar la fila
  nuevaFila.addEventListener("click", function () {
    if (filaSeleccionada) {
      // Revertir el estilo de la fila previamente seleccionada
      filaSeleccionada.style.outline = "";
      filaSeleccionada.style.backgroundColor = "";
    }
    // Cambiar el estilo de la fila seleccionada
    nuevaFila.style.outline = "2px solid #007bff"; // Borde azul
    nuevaFila.style.backgroundColor = "#f0f8ff"; // Fondo ligeramente azul
    filaSeleccionada = nuevaFila; // Establecer la fila seleccionada
  });

  calcularSubtotal();
}

// Función para eliminar la fila seleccionada
function eliminarFila() {
  if (filaSeleccionada) {
    if (confirm("¿Estás seguro de que quieres eliminar esta fila?")) {
      // Obtener el identificador del producto desde el dataset de la fila
      const id = filaSeleccionada.dataset.id;

      // Obtener la tabla
      const tabla = document
        .getElementById("tablaCotizacion")
        .getElementsByTagName("tbody")[0];

      // Eliminar la fila de la tabla
      tabla.deleteRow(filaSeleccionada.rowIndex - 1);

      // También eliminar el producto del array
      let index = productos.findIndex((producto) => producto.id === id);

      // Si el producto existe, eliminarlo usando 'splice'

      productos.splice(index - 1, 1);

      // Recalcular los subtotales
      calcularSubtotal();

      // Limpiar la selección
      filaSeleccionada = null;
    }
  } else {
    alert("No has seleccionado ninguna fila para eliminar.");
  }
}

function ensenarCrearProducto(){
  document.getElementById("editarP").style.display = "none";
  document.getElementById("crearP").style.display = "block";
  document.getElementById("ecp").disabled = true;
  document.getElementById("eep").disabled = false;
}
function ensenarEditarProducto(){
  document.getElementById("editarP").style.display = "block";
  document.getElementById("crearP").style.display = "none";
  document.getElementById("eep").disabled = true;
  document.getElementById("ecp").disabled = false;
  cargarProductosModificar();
}

function mostrarInputCategoria() {
  let checkbox = document.getElementById("oC");
  let labelC = document.getElementById("labelCat");
  let labeloC = document.getElementById("oLabelCat");
  let selectC = document.getElementById("categoriaSelect");
  let inputC = document.getElementById("categoria");

  if (checkbox.checked) {
    labelC.style.display = "none";
    selectC.style.display = "none";
    labeloC.style.display = "flex";
    inputC.style.display = "flex";
  } else {
    labelC.style.display = "flex";
    selectC.style.display = "flex";
    labeloC.style.display = "none";
    inputC.style.display = "none";
  }
}
function mostrarInputSubCategoria() {
  let checkbox = document.getElementById("osC");
  let labelsC = document.getElementById("labelSubcategoria");
  let selectsC = document.getElementById("subcategoriaSelect");
  let labeloSub = document.getElementById("labeloSub");
  let inputsC = document.getElementById("subcategoria");

  if (checkbox.checked) {
    labelsC.style.display = "none";
    selectsC.style.display = "none";
    labeloSub.style.display = "flex";
    inputsC.style.display = "flex";
  } else {
    labelsC.style.display = "flex";
    selectsC.style.display = "flex";
    labeloSub.style.display = "none";
    inputsC.style.display = "none";
  }
}

function cargarDatosClientes() {
  let inputRFC = document.getElementById("rfc");
  let inputDomicilio = document.getElementById("domicilio");
  let inputTelefono = document.getElementById("telefono");
  let inputMail = document.getElementById("mail");
  let inputRegimen = document.getElementById("regimen");

  if (tipoClienteSeleccionado === 1) {
    inputRFC.value = "";
    inputDomicilio.value = "";
    inputTelefono.value = "";
    inputMail.value = "";
    inputRegimen.value = "";
  } else if (tipoClienteSeleccionado === 2) {
    let selectedElement = document.getElementById("CR");
    let clienteEscogido = selectedElement.selectedOptions[0];
    inputRFC.value = clienteEscogido.dataset.rfc;
    inputDomicilio.value = clienteEscogido.dataset.domicilio;
    inputTelefono.value = clienteEscogido.dataset.telefono;
    inputMail.value = clienteEscogido.dataset.mail;
    inputRegimen.value = clienteEscogido.dataset.regimen;
  } else if (tipoClienteSeleccionado === 3) {
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

  if (selectedCliente === "CNR") {
    divClienteNoRegistrado.style.display = "flex";
    divClienteRegistrado.style.display = "none";
    divClienteEmpresa.style.display = "none";
    tipoClienteSeleccionado = 1;
    cargarDatosClientes();
  } else if (selectedCliente === "CR") {
    divClienteNoRegistrado.style.display = "none";
    divClienteRegistrado.style.display = "flex";
    divClienteEmpresa.style.display = "none";
    tipoClienteSeleccionado = 2;
    cargarDatosClientes();
  } else if (selectedCliente === "E") {
    divClienteNoRegistrado.style.display = "none";
    divClienteRegistrado.style.display = "none";
    divClienteEmpresa.style.display = "flex";
    tipoClienteSeleccionado = 3;
    cargarDatosClientes();
  } else {
    alert("no sabes nada");
  }
}

function actualizarDatos(iterador) {
  document.getElementById("nombreFormulario" + iterador).value = document.getElementById("nombreInputModificar" + iterador).value;
  document.getElementById("precioFormulario" + iterador).value = document.getElementById("precioInputModificar" + iterador).value;
  document.getElementById("categoriaFormulario" + iterador).value = document.getElementById("categoriaInputModificar" + iterador).value;
  document.getElementById("subcategoriaFormulario" + iterador).value = document.getElementById("subcategoriaInputModificar" + iterador).value;
}


function cargarClientesRegistrados() {
  fetch("APIclientesconregistro.php")
    .then((response) => response.text())
    .then((data) => {
      let selectElement = document.getElementById("CR");
      selectElement.innerHTML = data;
    })
    .catch((error) => console.error("Error:", error));
}

function cargarClientesEmpresariales() {
  fetch("APIclientesempresariales.php")
    .then((response) => response.text())
    .then((data) => {
      let selectElement = document.getElementById("E");
      selectElement.innerHTML = data;
    })
    .catch((error) => console.error("Error:", error));
}

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
      cargarNombreProductos();
    })
    .catch((error) => console.error("Error:", error));
}
function cargarNombreProductos() {
  let selectedSub = document.getElementById("subcategoria");
  let option = selectedSub.selectedOptions[0];
  let productoSeleccionado = option.value;
  fetch(
    "APIproductosnombres.php?subcategoria=" +
      encodeURIComponent(productoSeleccionado)
  )
    .then((response) => response.text())
    .then((data) => {
      let selectElement = document.getElementById("nombre");
      selectElement.innerHTML = data;
    })
    .catch((error) => console.error("Error:", error));
}
function buscarProducto() {
  let productoBuscado = document.getElementById("busquedaName").value;
  fetch(
    "APIproductosBusqueda.php?nombreBusqueda=" +
      encodeURIComponent(productoBuscado)
  )
    .then((response) => response.text())
    .then((data) => {
      let selectElement = document.getElementById("prodsEnc");
      selectElement.innerHTML = data;
      console.log("ya");
    })
    .catch((error) => console.error("Error:", error));
}
function cargarProductosModificar() {
  fetch("traerProductosModificar.php")
    .then((response) => response.text())
    .then((data) => {
      let tabla = document.getElementById("productosEnTabla");
      tabla.innerHTML = data;
    })
    .catch((error) => console.error("Error:", error));
}
function cargarProductosBusqueda() {
  let busqueda = document.getElementById("busquedaProductoTabla").value;
  fetch("traerProductosBusqueda.php?busqueda="+encodeURIComponent(busqueda))
    .then((response) => response.text())
    .then((data) => {
      let tabla = document.getElementById("productosEnTabla");
      tabla.innerHTML = data;
    })
    .catch((error) => console.error("Error:", error));
}

function buscarEnLaTabla(){
  let busqueda = document.getElementById("busquedaProductoTabla").value;
  if(!busqueda){
    cargarProductosModificar();
  }else{
    cargarProductosBusqueda();
  }
}

function precioProd() {
  let selectElement = document.getElementById("nombre");
  let selectedOption = selectElement.selectedOptions[0];
  let precio = selectedOption.dataset.precio;
  document.getElementById("precio").value = precio;
}

function generarPDF() {
  let nombreCliente =
    tipoClienteSeleccionado === 1
      ? document.getElementById("CNR").value
      : tipoClienteSeleccionado === 2
      ? document.getElementById("CR").value
      : tipoClienteSeleccionado === 3
      ? document.getElementById("E").value
      : "Cliente No Registrado";

  let fechaSeleccionada =
    document.getElementById("fechaEntrega").value !== ""
      ? "Fecha Aproximada de Entrega: " +
        document.getElementById("fechaEntrega").value
      : "";

  let clienteDomicilio =
    tipoClienteSeleccionado === 1
      ? ""
      : tipoClienteSeleccionado === 2
      ? document.getElementById("domicilio").value
      : tipoClienteSeleccionado === 3
      ? document.getElementById("domicilio").value
      : "Domicilio no disponible";

  let clienteTelefono =
    tipoClienteSeleccionado === 1
      ? ""
      : tipoClienteSeleccionado === 2
      ? document.getElementById("telefono").value
      : tipoClienteSeleccionado === 3
      ? document.getElementById("telefono").value
      : "Teléfono no disponible";

  let clienteCorreo =
    tipoClienteSeleccionado === 1
      ? ""
      : tipoClienteSeleccionado === 2
      ? document.getElementById("mail").value
      : tipoClienteSeleccionado === 3
      ? document.getElementById("mail").value
      : "Email no disponible";

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
  img.src = "img/logojunto.png";
  img.onload = function () {
    doc.addImage(img, "PNG", 10, 5, 30, 30.81);

    // Encabezado - Información de la empresa
    doc.setFontSize(18);
    doc.setTextColor(0, 0, 0); // Negro para el nombre de la empresa
    doc.text("Expresagrafic", 200, 10, { align: "right" });

    // Información de contacto en gris
    doc.setFontSize(10);
    doc.setTextColor(105, 105, 105); // Gris
    doc.text(
      "Casa Amarilla 117, col. Reforma Pensil, Miguel Hidalgo, CDMX",
      200,
      18,
      { align: "right" }
    );
    doc.text("(+52) 55 4357 5320", 200, 23, { align: "right" });
    doc.text("ventasexpresa@yahoo.com", 200, 28, { align: "right" });
    doc.text("ventas@expresagrafic.com.mx", 200, 33, { align: "right" });
    doc.text("www.expresagrafic.com.mx", 200, 38, { align: "right" });

    doc.line(5, 42, 205, 42);

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
    doc.text(fechaSeleccionada, 200, 62, { align: "right" });
    doc.setFontSize(14);
    doc.setTextColor(0, 0, 0);
    doc.text(`Cotización #: 801 `, 200, 55, { align: "right" });

    doc.autoTable({
      head: [["Cantidad", "Producto", "Precio Unitario", "Monto"]],
      body: productos,
      startY: 75,
    });

    // Totales
    doc.setFontSize(12);
    doc.text(`Total: $${subtotal}`, 150, doc.previousAutoTable.finalY + 5);

    doc.text(
      `Total + IVA: $${totalIVA}`,
      150,
      doc.previousAutoTable.finalY + 10
    );

    let previousTableEnd = doc.lastAutoTable.finalY;
    

// Crear la segunda tabla 50 unidades debajo de la anterior
doc.autoTable({
  head: [["PAGOS CON FACTURA", "PAGOS SIN FACTURA"]],
  body: [[
  `SERGIO JULIAN GOMEZ MORENO
  BANCO: BANORTE CTA.: 0586324183
  CLABE TRANSFERENCIA: 072180005863241836
  NO SE PROCESA NINGÚN TRABAJO QUE NO TENGA ANTICIPO O PAGO`,
  
  `BANCO:NVIO
  BENEFICIARIO: SERGIO JULIAN GOMEZ MORENO
  CLABE: 710969000012983630`]],
  startY: previousTableEnd + 15,
  headStyles: {
    fillColor: [211, 211, 211], // Color de fondo en RGB (en este caso azul)
    textColor: [0, 0, 0],
  },
});
let scaleFactor = 0.8; // Escala del 80%

doc.autoTable({
  head: [[
    { content: `Términos y Condiciones EXPRESAGRAFIC`, styles: { halign: 'center' } },
    { content: `Términos y Condiciones Proyect Laser MX`, styles: { halign: 'center' } },
    { content: `Garantías`, styles: { halign: 'center' } }
  ]],
  body: [[
    { content: `La aceptación de la presente requiere confirmación por parte del cliente, aceptando los materiales, textos, o gráficos aquí especificados, por lo que se solicita leer atentamente la descripción. Cualquier cambio una vez iniciados los trabajos tendrán un costo que deberá ser cubierto por el cliente. La política de pago es 50% de anticipo para iniciar la producción y 50% en la entrega.
    No se realizan pantones y la igualación debe ser aprobada por el cliente en el material físico. La impresión offset tiene una variación de tono según sea el tiraje o el diseño, por lo que no se aceptarán reclamaciones por variación de tono.
    Una vez recibido el material por el cliente, no se aceptan devoluciones. La vigencia de esta cotización es de 10 días.`, styles: { halign: 'justify' } },
    { content: `Las condiciones de pago son 70% anticipo y 30% contra aviso de entrega.
    El costo está basado en el volumen acordado, cualquier cambio requiere nueva cotización. Se solicita que el cliente proporcione los dibujos (vectorizados y a escala real) en formato DXF, DWG (AutoCad). Si no los tiene y requiere el trabajo, el desarrollo de los dibujos tiene un costo y este depende de su complejidad.
    No se aceptan reclamaciones por diseños enviados a escala o vectores que no se hayan hecho en nuestro estudio. Toda modificación tiene costo. No hay reembolso en materiales. Esta cotización tiene vigencia de 10 días.`, styles: { halign: 'justify' } },
    { content: `Solo hay garantía al presentar por escrito la solicitud, en un plazo de 72 hrs.
    EXPRESAGRAFIC y Proyect Laser Mx no se responsabilizan en materiales ajenos a nuestra compañía.
    La garantía no aplica si falta material o este viene enmendado o maltratado. No hay devolución de dinero, solo de servicio o productos que proveemos. La producción de las garantías tiene un tiempo de entrega de 30 días hábiles.`, styles: { halign: 'justify' } }
  ]],
  startY: doc.lastAutoTable.finalY + 5,
  headStyles: {
    fillColor: [211, 211, 211], // Color de fondo gris claro
    textColor: [0, 0, 0], // Color del texto
    fontStyle: 'bold', // Estilo de texto en negrita
  },
  styles: {
    
    fontSize: 10 * scaleFactor, // Reducir el tamaño de la fuente
  },
  columnStyles: {
    0: { cellWidth: 80 * scaleFactor }, // Ajustar el ancho de la columna 1
    1: { cellWidth: 80 * scaleFactor }, // Ajustar el ancho de la columna 2
    2: { cellWidth: 80 * scaleFactor }, // Ajustar el ancho de la columna 3
  },
});



    // Generar el PDF
    doc.save("factura.pdf");
  };
}
function generarPDF() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  // Encabezado
  doc.setFontSize(24);
  doc.text("Cotización", 105, 20, null, null, "center");

  // Definir columnas y filas de la tabla
  const columnas = ["Descripción", "Cantidad", "Precio Unitario", "Total"];
  const filas = [
      ["Servicio de Diseño Gráfico", "5", "$100.00", "$500.00"],        ["Impresión", "10", "$50.00", "$500.00"],
      ["Marketing", "2", "$200.00", "$400.00"]
    ];

    // Generar la tabla con `autotable`
   doc.autoTable({
      head: [columnas],  // Encabezados de la tabla
      body: filas,       // Datos de la tabla
      startY: 30,        // Posición inicial en Y
      theme: 'striped',  // Tema de la tabla (striped, grid, plain)
      headStyles: { fillColor: [0, 255, 0] },  // Color de fondo del encabezado
      styles: { halign: 'center' },  // Alinear todo el texto al centro
    });

    // Pie de página
  doc.setFontSize(10);
  doc.text("Gracias por confiar en nuestros servicios", 105, doc.internal.pageSize.height - 20, null, null, "center");
  doc.text("Expresagrafic | contacto@expresagrafic.com.mx | Tel: +52 123 456 7890", 105, doc.internal.pageSize.height - 10, null, null, "center");

  // Guardar el PDF
  doc.save("cotizacion_con_tabla.pdf");
}

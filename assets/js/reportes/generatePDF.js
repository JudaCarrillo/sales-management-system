function generatePDF(result, title) {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  const margin = 10;
  let startY = 20;

  // Títulos y estilos del documento
  doc.setFontSize(18);
  doc.text(title, 105, startY, null, null, "center");
  startY += 10;

  doc.setFontSize(12);
  doc.setTextColor(0, 0, 255);

  // Dibujar encabezado de tabla
  doc.setFontSize(10);
  doc.setFillColor(200, 200, 200);
  doc.rect(margin, startY, 190, 10, "F");
  doc.setTextColor(0, 0, 0);
  doc.text("Código", margin + 2, startY + 7);
  doc.text("Cliente", margin + 30, startY + 7);
  doc.text("Fecha", margin + 70, startY + 7);
  doc.text("Divisa", margin + 110, startY + 7);
  doc.text("Importe Total", margin + 150, startY + 7);
  startY += 10;

  // Añadir datos de la tabla
  result.forEach((row) => {
    doc.rect(margin, startY, 190, 10); // Dibujar rectángulo alrededor de cada fila
    doc.text(row.code, margin + 2, startY + 7);
    doc.text(row.name, margin + 30, startY + 7);
    doc.text(row.date.split(" ")[0], margin + 70, startY + 7);
    doc.text(row.currency, margin + 110, startY + 7);
    doc.text(row.final_price, margin + 150, startY + 7);
    startY += 10;
  });

  doc.save("reporte.pdf");
}

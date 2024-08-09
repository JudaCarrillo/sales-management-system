document.addEventListener("DOMContentLoaded", function () {
  var customerSelect = document.getElementById("order");
  if (customerSelect) {
    customerSelect.addEventListener("change", function () {
      var selectedOption = this.options[this.selectedIndex];
      if (this.value === "") {
        // Si se selecciona la opción por defecto, limpia todos los campos
        document.getElementById("code").value = "";
        document.getElementById("customer_dni").value = "";
        document.getElementById("customer_address").value = "";
        document.getElementById("date").value = "";
        document.getElementById("currency").value = "";
        document.getElementById("branch_office").value = "";
        document.getElementById("pay_method").value = "";
      } else {
        // Si se selecciona un cliente, llena los campos con la información correspondiente
        document.getElementById("code").value = selectedOption.dataset.code;
        document.getElementById("customer_dni").value =
          selectedOption.dataset.customerDni;
        document.getElementById("customer_address").value =
          selectedOption.dataset.customerAddress;
        document.getElementById("customer_name").value =
          selectedOption.dataset.customername;

        // Extraer la fecha y hora del dataset
        let dateTime = selectedOption.dataset.date;
        let date = new Date(dateTime);
        let year = date.getFullYear();
        let month = ("0" + (date.getMonth() + 1)).slice(-2); // Añadir cero si es necesario
        let day = ("0" + date.getDate()).slice(-2); // Añadir cero si es necesario
        let formattedDate = `${year}-${month}-${day}`;

        // Asignar la fecha formateada al valor del elemento con id 'date'
        document.getElementById("date").value = formattedDate;
        document.getElementById("currency").value =
          selectedOption.dataset.currency;
        document.getElementById("branch_office").value =
          selectedOption.dataset.branchOffice;
        document.getElementById("pay_method").value =
          selectedOption.dataset.payMethod;

        document.getElementById("totalBruto").textContent =
          selectedOption.dataset.gross_price;
        document.getElementById("igv").textContent = selectedOption.dataset.igv;
        document.getElementById("totalFinal").textContent =
          selectedOption.dataset.final_price;
      }
    });
  }
});

function saveOrder() {
  const product = {
    sales_order_id: document.getElementById("order").value,
    customer_dni: document.getElementById("customer_dni").value,
    customer_name: document.getElementById("customer_name").value,
    address: document.getElementById("customer_address").value,
    date_issue: document.getElementById("date").value,
    igv: document.getElementById("igv").textContent,
    final_price: document.getElementById("totalFinal").textContent,
    currency: document.getElementById("currency").value,
  };

  fetch("../../controllers/ventas/saveBills.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(product),
  })
    .then((response) => response.json())
    .then((data) => {
      
      if (!data.success) {
        alert("Error al guardar la factura de venta: " + data.message);
      }
      
      alert("Factura de venta guardada con éxito");
      resetForm();
    })
    .catch((error) => {     
      console.error("Error:", error);
      alert("Error al guardar la factura de venta");
    });
}

function resetForm() {
  document.getElementById("totalBruto").textContent = 0;
  document.getElementById("igv").textContent = 0;
  document.getElementById("totalFinal").textContent = 0;
  document.getElementById("customer_dni").value = "";
  document.getElementById("customer_address").value = "";
  document.getElementById("customer_name").value = "";
  document.getElementById("date").value = "";
  document.getElementById("branch_office").value = "";
  document.getElementById("currency").value = "";
  document.getElementById("pay_method").value = "";
  document.getElementById("code").value = "";
  document.getElementById("order").value = "";
}

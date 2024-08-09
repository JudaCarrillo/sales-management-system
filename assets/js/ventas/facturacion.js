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

/* //Mostrar los Detalles de Ventas
    function loadSalesDetails(salesOrderId) {
        fetch(`../../controllers/ventas/getSalesDetails.php?sales_order_id=${salesOrderId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateProductTable(data.details);
                    calculateTotals();
                } else {
                    console.error('Error al cargar los detalles:', data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }

    function updateProductTable(details) {
        const tbody = document.getElementById('productTableBody');
        tbody.innerHTML = '';

        details.forEach(detail => {
            const row = tbody.insertRow();
            row.innerHTML = `
            <td>${detail.product_id}</td>
            <td>${detail.product_name}</td>
            <td>${detail.quantity}</td>
            <td>${parseFloat(detail.product_sales_price).toFixed(2)}</td>
            <td>${parseFloat(detail.total_price).toFixed(2)}</td>
        `;
        });
    }

    function calculateTotals() {
        const rows = document.getElementById('productTableBody').rows;
        let totalNeto = 0;
        for (let row of rows) {
            totalNeto += parseFloat(row.cells[4].textContent);
        }
        const igv = totalNeto * 0.18;
        const totalFinal = totalNeto + igv;

        document.getElementById('totalNeto').textContent = totalNeto.toFixed(2);
        document.getElementById('igv').textContent = igv.toFixed(2);
        document.getElementById('totalFinal').textContent = totalFinal.toFixed(2);
    } */

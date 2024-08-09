//Autorellenar formulario Cliente
document.addEventListener("DOMContentLoaded", function () {
  var customerSelect = document.getElementById("customer");
  if (customerSelect) {
    customerSelect.addEventListener("change", function () {
      var selectedOption = this.options[this.selectedIndex];
      if (this.value === "") {
        // Si se selecciona la opción por defecto, limpia todos los campos
        document.getElementById("address").value = "";
        document.getElementById("dni").value = "";
        document.getElementById("currency").value = "";
        document.getElementById("paymentType").value = "";
      } else {
        // Si se selecciona un cliente, llena los campos con la información correspondiente
        document.getElementById("address").value =
          selectedOption.dataset.address || "";
        document.getElementById("dni").value = selectedOption.dataset.dni || "";
        document.getElementById("currency").value = "PEN";
        document.getElementById("paymentType").value = "Efectivo";
      }
    });
  }
});
//Autorellenar formulario Vendedor
document.addEventListener("DOMContentLoaded", function () {
  var employeeSelect = document.getElementById("employee");
  if (employeeSelect) {
    employeeSelect.addEventListener("change", function () {
      var selectedOption = this.options[this.selectedIndex];
      if (this.value === "") {
        // Si se selecciona la opción por defecto, limpia todos los campos
        document.getElementById("branch_office").value = "";
        document.getElementById("date").value = "";
      } else {
        // Si se selecciona un empleado, llena los campos con la información correspondiente
        document.getElementById("branch_office").value = "Lima";
        document.getElementById("date").value = new Date()
          .toISOString()
          .split("T")[0];
      }
    });
  }
});
//Autorellenar formulario Producto
document.addEventListener("DOMContentLoaded", function () {
  var productSelect = document.getElementById("product");
  if (productSelect) {
    productSelect.addEventListener("change", function () {
      var selectedOption = this.options[this.selectedIndex];
      if (this.value === "") {
        // Si se selecciona la opción por defecto, limpia todos los campos
        document.getElementById("quantity").value = "";
        document.getElementById("price").value = "";
        document.getElementById("stock").value = "";
      } else {
        // Si se selecciona un producto, llena los campos con la información correspondiente
        document.getElementById("quantity").value = "";
        document.getElementById("stock").value =
          selectedOption.dataset.stock || "";
        document.getElementById("price").value =
          selectedOption.dataset.price || "";
      }
    });
  }
});

let products = [];

function addProduct() {
  const productSelect = document.getElementById("product");

  const quantity = document.getElementById("quantity").value;
  const price = document.getElementById("price").value;

  if (!productSelect.value || !quantity || !price) {
    alert("Por favor, complete todos los campos del producto");
    return;
  }

  const selectedOption = productSelect.options[productSelect.selectedIndex];
  const product = {
    product_id: selectedOption.dataset.productid,
    code: productSelect.value,
    name: selectedOption.text,
    quantity: parseInt(quantity),
    stock: parseInt(selectedOption.dataset.stock),
    price: parseFloat(price),
    total: parseFloat(quantity) * parseFloat(price),
  };

  products.push(product);
  updateProductTable();
  calculateTotals();
  clearProductForm();
}

function updateProductTable() {
  const tbody = document.getElementById("productTableBody");
  tbody.innerHTML = "";

  products.forEach((product) => {
    const row = tbody.insertRow();
    row.innerHTML = `
            <td>${product.code}</td>
            <td>${product.name}</td>
            <td>${product.quantity}</td>
            <td>${product.price.toFixed(2)}</td>
            <td>${product.total.toFixed(2)}</td>
        `;
  });
}

function calculateTotals() {
  const totalNeto = products.reduce((sum, product) => sum + product.total, 0);
  const igv = totalNeto * 0.18;
  const totalFinal = totalNeto + igv;

  document.getElementById("totalNeto").textContent = totalNeto.toFixed(2);
  document.getElementById("igv").textContent = igv.toFixed(2);
  document.getElementById("totalFinal").textContent = totalFinal.toFixed(2);
}

function clearProductForm() {
  document.getElementById("product").value = "";
  document.getElementById("quantity").value = "";
  document.getElementById("price").value = "";
  document.getElementById("stock").value = "";
}

function saveOrder() {
  // Recopilar datos del formulario principal
  const orderData = {
    code: document.getElementById("code").value,
    customer_id: document.getElementById("customer").value,
    employee_id: document.getElementById("employee").value,
    customer_dni: document.getElementById("dni").value,
    customer_address: document.getElementById("address").value,
    pay_method: document.getElementById("paymentType").value,
    currency: document.getElementById("currency").value,
    branch_office: document.getElementById("branch_office").value,
    date: document.getElementById("date").value,
    notes: document.getElementById("notes").value,
    totalNeto: document.getElementById("totalNeto").innerText,
    igv: document.getElementById("igv").innerText,
    final_price: document.getElementById("totalFinal").innerText,
    products: products, // Array de productos que ya tienes
  };

  // path dinamico
  fetch("../../controllers/ventas/savesSalesOrder.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(orderData),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        alert("Orden de venta guardada con éxito");
        // Limpiar el formulario o redirigir a una nueva página
      } else {
        alert("Error al guardar la orden de venta: " + data.message);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Error al guardar la orden de venta");
    });
}

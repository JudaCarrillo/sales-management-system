// customer-form.js
document.addEventListener('DOMContentLoaded', function() {
    var customerSelect = document.getElementById('customer');
    if (customerSelect) {
        customerSelect.addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            if (this.value === "") {
                // Si se selecciona la opción por defecto, limpia todos los campos
                document.getElementById('address').value = '';
                document.getElementById('dni').value = '';
                document.getElementById('currency').value = '';
                document.getElementById('paymentType').value = '';
            } else {
                // Si se selecciona un cliente, llena los campos con la información correspondiente
                document.getElementById('address').value = selectedOption.dataset.address || '';
                document.getElementById('dni').value = selectedOption.dataset.dni || '';
                document.getElementById('currency').value = 'PEN';
                document.getElementById('paymentType').value = 'Efectivo';
            }
        });
    }
});

document.getElementById('customer').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    document.getElementById('address').value = selectedOption.dataset.address || '';
    document.getElementById('dni').value = selectedOption.dataset.dni || '';
    document.getElementById('currency').value = 'PEN';
    document.getElementById('paymentType').value = 'Efectivo';
});
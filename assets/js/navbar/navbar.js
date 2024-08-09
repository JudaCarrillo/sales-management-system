// Archivo JavaScript: script.js

document.addEventListener('DOMContentLoaded', function () {
    // Seleccionar todos los menús desplegables
    var dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(function (dropdown) {
        // Obtener el enlace del menú dentro del desplegable
        var menuLink = dropdown.querySelector('.menu-link');

        // Agregar un event listener al enlace del menú
        menuLink.addEventListener('click', function (event) {
            event.preventDefault(); // Prevenir la acción por defecto

            // Obtener el contenido del dropdown
            var dropdownContent = dropdown.querySelector('.dropdown-content');

            // Verificar si el contenido del dropdown está visible
            var isOpen = dropdownContent.style.display === 'block';

            // Cerrar todos los dropdowns
            closeAllDropdowns();

            // Si el dropdown no estaba abierto, abrirlo
            if (!isOpen) {
                dropdownContent.style.display = 'block';
            }
        });
    });

    // Función para cerrar todos los dropdowns
    function closeAllDropdowns() {
        dropdowns.forEach(function (dropdown) {
            var dropdownContent = dropdown.querySelector('.dropdown-content');
            dropdownContent.style.display = 'none';
        });
    }

    // Cerrar el dropdown si se hace clic fuera de él
    window.addEventListener('click', function (event) {
        if (!event.target.matches('.menu-link')) {
            closeAllDropdowns();
        }
    });
    // navbar.js
    document.getElementById('userImage').addEventListener('click', function () {
        var menu = document.getElementById('dropdownMenu');
        menu.classList.toggle('show');
    });

    document.addEventListener('click', function (event) {
        var menu = document.getElementById('dropdownMenu');
        var userImage = document.getElementById('userImage');
        if (!menu.contains(event.target) && event.target !== userImage) {
            menu.classList.remove('show');
        }
    });

});

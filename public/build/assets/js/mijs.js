function actualizarHora() {
    const horaElement = document.getElementById('hora-actual');
    const horaActual = new Date();

    // Formatea la hora en el formato deseado
    const horaFormateada = horaActual.getHours().toString().padStart(2, '0');
    const minutosFormateados = horaActual.getMinutes().toString().padStart(2, '0');
   

    horaElement.textContent = `${horaFormateada}:${minutosFormateados}`;
}

// Actualiza la hora cada segundo
setInterval(actualizarHora, 1000);

// Llama a la función para mostrar la hora actual al cargar la página
actualizarHora();

document.addEventListener('DOMContentLoaded', function() {
    // Hacer una solicitud AJAX a '/ajaxProd' para obtener los datos de los productos
    $.ajax({
        url: '/fran-24/public/ajaxProd',
        method: 'GET',
        success: function(response) {
            var productos = response.productosJson;

            const searchInput = document.getElementById('search-input');
            const resultsList = document.getElementById('results-list');

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value;
                resultsList.innerHTML = '';

                if (searchTerm.trim() === "") {
                    resultsList.style.display = 'none'; // Oculta la lista de resultados si searchTerm está vacío
                } else {
                    resultsList.style.display = 'block'; // Muestra la lista de resultados si hay entrada en searchTerm
                }

                productos.forEach(producto => {
                    if (producto.nombre.toLowerCase().includes(searchTerm)) {
                        const listItem = document.createElement('ul');
                        listItem.textContent = `${producto.nombre} - $${producto.precio.toFixed(2)}`;

                        listItem.addEventListener('click', function() {
                            const selectedId = producto.id_producto;
                            alert(`Has seleccionado el producto con ID ${selectedId}`);
                        });

                        resultsList.appendChild(listItem);
                    }
                });
            });

            // Agrega un controlador de eventos para la tecla "Esc" (código de tecla 27)
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    searchInput.value = ''; // Borra el contenido del campo de búsqueda
                    resultsList.style.display = 'none'; // Oculta la lista de resultados
                }
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
})();




               
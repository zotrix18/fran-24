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

function mostrarFechaHora() {
    const diaSemanaElement = document.getElementById('dia-semana');
    const fechaElement = document.getElementById('fecha');
    const fechaHoraActual = new Date();

    // Obtiene el día de la semana
    const diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    const diaSemana = diasSemana[fechaHoraActual.getDay()];

    // Obtiene el día y mes en formato dd/mm
    const dia = fechaHoraActual.getDate().toString().padStart(2, '0');
    const mes = (fechaHoraActual.getMonth() + 1).toString().padStart(2, '0');

    diaSemanaElement.textContent = `Día de la semana: ${diaSemana}`;
    fechaElement.textContent = `Fecha: ${dia}/${mes}`;
}

// Llama a la función para mostrar la fecha y hora actual al cargar la página
mostrarFechaHora();

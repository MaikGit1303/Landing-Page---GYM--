// Espera a que el DOM esté completamente cargado antes de ejecutar el script
document.addEventListener('DOMContentLoaded', () => {

    // --- 1. Funcionalidad para la Barra Lateral (responsive) ---
    // En un diseño real, la barra lateral se ocultaría o se mostraría
    // con un botón de hamburguesa en pantallas pequeñas.
    // Vamos a simular un toggle para el ejemplo, asumiendo que en CSS
    // ya tienes media queries para ocultarla/mostrarla.

    // Si tuvieras un botón de hamburguesa en el HTML:
    // const sidebarToggleBtn = document.getElementById('sidebar-toggle-btn');
    // const sidebar = document.querySelector('.sidebar');
    // const mainContent = document.querySelector('.main-content');

    // if (sidebarToggleBtn && sidebar && mainContent) {
    //     sidebarToggleBtn.addEventListener('click', () => {
    //         sidebar.classList.toggle('collapsed'); // Añade una clase para colapsar
    //         mainContent.classList.toggle('expanded'); // Y expandir el contenido principal
    //     });
    // }

    // --- 2. Gráficos Interactivos con Chart.js ---
    // Primero, asegúrate de haber incluido la librería Chart.js en tu HTML.
    // Añade esto en el <head> o justo antes de cerrar el </body> en index.html:
    // <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    // Gráfico de Progreso de Miembros (Líneas)
    const memberProgressCtx = document.getElementById('memberProgressChart');
    if (memberProgressCtx) {
        new Chart(memberProgressCtx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Miembros Activos',
                    data: [1100, 1120, 1150, 1180, 1200, 1250, 1230, 1280, 1300, 1320, 1350, 1400],
                    borderColor: 'rgba(233, 69, 96, 0.8)', // accent-red del CSS
                    backgroundColor: 'rgba(233, 69, 96, 0.2)', // Fondo translúcido
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3 // Curva suave
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Permite que el gráfico no mantenga su relación de aspecto predeterminada
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)', // Color de las líneas de la cuadrícula
                            borderColor: 'rgba(255, 255, 255, 0.2)'
                        },
                        ticks: {
                            color: 'rgba(224, 224, 224, 0.8)' // Color de los números del eje Y
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.2)'
                        },
                        ticks: {
                            color: 'rgba(224, 224, 224, 0.8)' // Color de los meses del eje X
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: 'rgba(224, 224, 224, 0.9)' // Color de la leyenda
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(40, 40, 60, 0.9)', // Fondo del tooltip
                        titleColor: 'white',
                        bodyColor: 'white',
                        borderColor: 'rgba(233, 69, 96, 0.8)',
                        borderWidth: 1
                    }
                }
            }
        });
    }

    // Gráfico de Uso de Equipos (Barras)
    const equipmentUsageCtx = document.getElementById('equipmentUsageChart');
    if (equipmentUsageCtx) {
        new Chart(equipmentUsageCtx, {
            type: 'bar',
            data: {
                labels: ['Cintas', 'Bicicletas', 'Pesas Libres', 'Máquinas', 'Elípticas'],
                datasets: [{
                    label: 'Horas de Uso Semanal',
                    data: [85, 70, 120, 95, 60],
                    backgroundColor: [
                        'rgba(233, 69, 96, 0.7)', // accent-red
                        'rgba(0, 204, 102, 0.7)', // accent-green
                        'rgba(0, 123, 255, 0.7)', // accent-blue
                        'rgba(255, 159, 64, 0.7)', // Naranja
                        'rgba(153, 102, 255, 0.7)' // Púrpura
                    ],
                    borderColor: [
                        'rgba(233, 69, 96, 1)',
                        'rgba(0, 204, 102, 1)',
                        'rgba(0, 123, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.2)'
                        },
                        ticks: {
                            color: 'rgba(224, 224, 224, 0.8)'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.2)'
                        },
                        ticks: {
                            color: 'rgba(224, 224, 224, 0.8)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // No necesitamos leyenda para una sola serie de barras
                    },
                    tooltip: {
                        backgroundColor: 'rgba(40, 40, 60, 0.9)',
                        titleColor: 'white',
                        bodyColor: 'white'
                    }
                }
            }
        });
    }

    // Gráfico de Miembros Nuevos (Barras)
    const newMembersCtx = document.getElementById('newMembersChart');
    if (newMembersCtx) {
        new Chart(newMembersCtx, {
            type: 'bar', // Tipo de gráfico: barras
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Miembros Nuevos',
                    data: [30, 45, 50, 35, 60, 55],
                    backgroundColor: 'rgba(0, 204, 102, 0.7)', // Verde para positivo
                    borderColor: 'rgba(0, 204, 102, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.2)'
                        },
                        ticks: {
                            color: 'rgba(224, 224, 224, 0.8)',
                            stepSize: 10 // Intervalo de 10 en el eje Y
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.2)'
                        },
                        ticks: {
                            color: 'rgba(224, 224, 224, 0.8)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(40, 40, 60, 0.9)',
                        titleColor: 'white',
                        bodyColor: 'white'
                    }
                }
            }
        });
    }


    // --- 3. Activar/Desactivar Clase de Navegación (para demostración) ---
    // En un entorno de aplicación real, esto se manejaría con un router
    // o al cargar diferentes componentes.

    const navLinks = document.querySelectorAll('.main-nav a');

    navLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            // Previene el comportamiento por defecto del enlace (navegar a #)
            event.preventDefault();

            // Remueve la clase 'active' de todos los enlaces
            navLinks.forEach(item => item.parentElement.classList.remove('active'));

            // Añade la clase 'active' al elemento 'li' padre del enlace clickeado
            this.parentElement.classList.add('active');

            // En una aplicación real, aquí cargarías el contenido de la sección correspondiente
            // Por ejemplo: loadDashboardContent('dashboard');
            // O si cada enlace lleva a una página diferente, el navegador haría el trabajo.
        });
    });

});
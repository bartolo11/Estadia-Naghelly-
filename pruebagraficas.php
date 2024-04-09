<?php
include "modelo/conexion.php";


$idPreguntaEspecifica = 2; // Aquí debes poner el ID de la pregunta específica

// Consulta SQL para contar las ocurrencias de cada nivelS para la pregunta específica y el usuario específico
$sql = "SELECT nivelS, COUNT(*) as conteo FROM respuesta WHERE idPregunta = $idPreguntaEspecifica GROUP BY nivelS";

$result = $conexion->query($sql);

// Array para almacenar los niveles y sus conteos
$niveles = [];
$conteos = [];

// Procesar los resultados de la consulta
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $niveles[] = $row["nivelS"];
        $conteos[] = $row["conteo"];
    }
} else {
    echo "No se encontraron resultados.";
}

// Colores de las secciones del gráfico de pastel
$colores = [
    'rgba(255, 99, 132, 0.5)',
    'rgba(54, 162, 235, 0.5)',
    'rgba(255, 206, 86, 0.5)',
    'rgba(75, 192, 192, 0.5)',
    'rgba(153, 102, 255, 0.5)',
    'rgba(255, 159, 64, 0.5)'
];

// Cerrar conexión
$conexion->close();
?>

<!-- Aquí empieza tu código HTML y JavaScript para mostrar el gráfico utilizando Chart.js -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfico de Niveles</title>
    <!-- Enlace a Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Contenedor del gráfico -->
    <div style="width: 400px; height: 400px;">
        <canvas id="graficoNiveles"></canvas>
    </div>

    <script>
        // Datos para el gráfico
        var niveles = <?php echo json_encode($niveles); ?>;
        var conteos = <?php echo json_encode($conteos); ?>;
        var colores = <?php echo json_encode($colores); ?>;

        // Configuración del gráfico
        var config = {
            type: 'pie', // Cambiar el tipo de gráfico a pie
            data: {
                labels: niveles,
                datasets: [{
                    label: 'Número de ocurrencias',
                    data: conteos,
                    backgroundColor: colores, // Usar los colores definidos
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        };

        // Crear el gráfico
        var ctx = document.getElementById('graficoNiveles').getContext('2d');
        var myChart = new Chart(ctx, config);
    </script>
</body>
</html>
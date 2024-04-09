<?php
include "modelo/conexion.php";

// ID del usuario específico
$idUsuarioEspecifico = 1; // Aquí debes poner el ID del usuario específico

// Consulta SQL para contar las ocurrencias de cada categoría para el usuario específico
$sql = "SELECT categoria, COUNT(*) as conteo FROM rtest WHERE idUsuario = $idUsuarioEspecifico GROUP BY categoria";

$result = $conexion->query($sql);

// Array para almacenar las categorías y sus conteos
$categorias = [];
$conteos = [];

// Procesar los resultados de la consulta
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $categorias[] = $row["categoria"];
        $conteos[] = $row["conteo"];
    }
} else {
    echo "No se encontraron resultados.";
}

// Colores de las barras (puedes ajustar estos colores según tus preferencias)
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
    <title>Gráfico de Categorías</title>
    <!-- Enlace a Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Contenedor del gráfico -->
    <div style="width: 400px; height: 400px;">
        <canvas id="graficoCategorias"></canvas>
    </div>

    <script>
        // Datos para el gráfico
        var categorias = <?php echo json_encode($categorias); ?>;
        var conteos = <?php echo json_encode($conteos); ?>;
        var colores = <?php echo json_encode($colores); ?>;

        // Configuración del gráfico
        var config = {
            type: 'bar',
            data: {
                labels: categorias,
                datasets: [{
                    label: 'Número de ocurrencias',
                    data: conteos,
                    backgroundColor: colores, // Usar los colores definidos
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Crear el gráfico
        var ctx = document.getElementById('graficoCategorias').getContext('2d');
        var myChart = new Chart(ctx, config);
    </script>
</body>
</html>
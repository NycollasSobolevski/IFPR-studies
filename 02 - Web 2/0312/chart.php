<?php

require_once './models/aluno.php';
require_once './models/connection.php';

$conn = (new DBConnection())->getConnection();
$aluno = new Aluno($conn);
$alunos = $aluno->getAll();

$idades = [];
foreach ($alunos as $a) {
    $idades[] = $a['idade'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Grafico de Idade dos Alunos</h1>
    <canvas id='idadeChart' width="400" height="200"></canvas>

    
    <script>
        var ctx = document.getElementById('idadeChart').getContext('2d');
        var chart = new Chart(ctx, {
            type:'bar',
            data: {
                labels: <?= json_encode(array_column($alunos, 'nome')) ?>,
                datasets: [{
                    label: 'Idade',
                    data: <?= json_encode($idades) ?>,
                    backgroundColor: 'rgba(54,162,235,0.2)',
                    borderColor:  'rgba(54,162,235,1)',
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
        })
    </script>

</body>
</html>
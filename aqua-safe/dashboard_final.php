<?php
$id = $_GET['id'];

if (!file_exists(__DIR__ . '/data')) {
    header("Location: form.php");
    exit;
}

$pessoas = [];
if (file_exists(__DIR__ . '/data/pessoas.json')) {
    $pessoas = json_decode(file_get_contents(__DIR__ . '/data/pessoas.json'), true);
    if ($pessoas === null) {
        header("Location: form.php");
        exit;
    }
} else {
    header("Location: form.php");
    exit;
}

$tem = true;
foreach ($pessoas as $p) {
    if ($id == $p['id']) {
        $pessoa = [
            'nome' => $p['nome'],
            'end' => $p['endereco'],
            'id' => $id
        ];
        $tem = false;
        break;
    }
}

if ($tem) {
    header("Location: form.php");
    exit;
}

// Verifica a existência do arquivo de monitoramento
$relatorios = [];
if (file_exists(__DIR__ . '/data/monitoramento.json')) {
    $relatorios = json_decode(file_get_contents(__DIR__ . '/data/monitoramento.json'), true);
    if ($relatorios === null) {
        header("Location: form.php");
        exit;
    }
} else {
    header("Location: form.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Dispositivos</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <ul class="menu">
                <li class="active">
                    <a href="perfil"> 
                        <i class="fas fa-user"></i>
                        <span>Meu Dispositivo</span>
                    </a>
                </li>
                <li>
                    <a href="sensores.html">
                        <i class="fas fa-chart-bar"></i>
                        <span>Sensores</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <h2>Dispositivos CaiAqua</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" id="search" placeholder="Pesquise...">
                </div>
                <img src="assets/img/ciclo-da-agua.png" alt="">
            </div>
        </div>

        <div class="stats-section">
            <div class="stat-item">
                <i class="fas fa-microchip"></i>
                <p>Sensores Ativos: 15</p>
            </div>
            <div class="stat-item">
                <i class="fas fa-water"></i>
                <p>Turbidez Média: 4 NTU</p>
            </div>
        </div>

        <div class="container">
            <div class="activity-header">
                <h1 class="activity-title">Porto Aqua</h1>
            </div>

            <div class="info-section">        
                <div class="info-item">
                    <p><i class="fas fa-user"></i> <strong>Pessoa Responsável: </strong> <?php echo htmlspecialchars($pessoa['nome']); ?></p>
                </div>
                <div class="info-item">
                    <p><i class="fa-solid fa-location-dot"></i> <strong>Endereço: </strong> <?php echo htmlspecialchars($pessoa['end']); ?></p>
                </div>
                <?php
                // Exibe os dados mais recentes do monitoramento para a pessoa
                foreach (array_reverse($relatorios) as $relatorio) {
                    if ($relatorio['id'] == $pessoa['id']) {
                        ?>
                        <div class="info-item">
                            <p><i class="fas fa-thermometer-half"></i> <strong>Sensor Temperatura:</strong> <?php echo htmlspecialchars($relatorio['temperatura']); ?>°C</p>
                        </div>
                        <div class="info-item">
                            <p><i class="fas fa-water"></i> <strong>Sensor Turbidez:</strong> <?php echo htmlspecialchars($relatorio['turbides']); ?> NTU</p>
                        </div>
                        <div class="info-item">
                            <p><i class="fas fa-clock"></i> <strong>Última atualização:</strong> <?php echo htmlspecialchars($relatorio['data']); ?></p>
                        </div>
                        <?php
                        break; 
                    }
                }
                ?>
            </div>

            <div class="buttons-section">
                <button class="register-button" onclick="visualizarGraficos()">Visualizar Gráficos</button>
            </div>
        </div>
        
    </div>

    <script>
        function visualizarGraficos() {
            alert("Redirecionando para os gráficos do sensor...");
        }
    </script>
</body>
</html>

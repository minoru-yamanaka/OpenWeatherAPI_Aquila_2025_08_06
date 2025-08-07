<!-- 🖥️ 3. Arquivo index.php -->

<?php
require_once 'classes/WeatherService.php';

// Sua chave da API do OpenWeather (pode ser colocada em um .env ou constante)
$apiKey = '64e1a43beea0ccd8308742e5814fa338';
$weatherService = new WeatherService($apiKey);

$city = isset($_GET['city']) ? $_GET['city'] : 'São Paulo';
$weather = $weatherService->getWeather($city);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clima - MundoLivre</title>
</head>
<body>
    <h1>Consulta de Clima</h1>
    <form method="get">
        <label for="city">Cidade:</label>
        <input type="text" name="city" id="city" value="<?= htmlspecialchars($city) ?>">
        <button type="submit">Buscar</button>
    </form>

    <hr>

    <?php
    if ($weather) {
        $weather->exibir();
    } else {
        echo "<p>Não foi possível obter o clima para a cidade informada.</p>";
    }
    ?>
</body>
</html>

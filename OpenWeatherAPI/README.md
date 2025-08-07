A **solução em PHP orientada a objetos (PPO)** para consumir uma **API pública**, seguindo os critérios do desafio.

Abaixo, está o exemplo completo com PHP, usando:

* Cliente fictício: **Agência de Viagens "MundoLivre"**
* API escolhida: **OpenWeather** (clima por cidade)
* Documentação da API escolhida: **Documentação da API OpenWeather** (clima por cidade)


## 📁 Estrutura do Projeto

```
projeto-api/
├── classes/
│   ├── WeatherInfo.php
│   └── WeatherService.php
├── index.php
└── .env (ou API KEY diretamente no código)
```


## 🧱 1. Classe `WeatherInfo.php`

```php
<?php
class WeatherInfo {
    private $city;
    private $description;
    private $temperature;

    public function __construct($city, $description, $temperature) {
        $this->city = $city;
        $this->description = $description;
        $this->temperature = $temperature;
    }

    public function exibir() {
        echo "<h2>Clima em {$this->city}</h2>";
        echo "<p>Descrição: {$this->description}</p>";
        echo "<p>Temperatura: {$this->temperature}°C</p>";
    }
}
?>
```


## 🌐 2. Classe `WeatherService.php`

```php
<?php
require_once 'WeatherInfo.php';

class WeatherService {
    private $apiKey;
    private $baseUrl = "https://api.openweathermap.org/data/2.5/weather";

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getWeather($city) {
        $url = $this->baseUrl . "?q=" . urlencode($city) . "&appid=" . $this->apiKey . "&units=metric&lang=pt";

        $response = file_get_contents($url);
        if (!$response) {
            return null;
        }

        $data = json_decode($response, true);
        if (!isset($data['weather'][0]['description'])) {
            return null;
        }

        $description = ucfirst($data['weather'][0]['description']);
        $temperature = $data['main']['temp'];

        return new WeatherInfo($city, $description, $temperature);
    }
}
?>
```


## 🖥️ 3. Arquivo `index.php`

```php
<?php
require_once 'classes/WeatherService.php';

// Sua chave da API do OpenWeather (pode ser colocada em um .env ou constante)
$apiKey = 'SUA_API_KEY_AQUI';
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
```

## ✅ O que essa solução aplica

* ✅ **Programação Orientada a Objetos** (PPO): classes, encapsulamento
* ✅ **Consumo de API REST** com `file_get_contents`
* ✅ **HTTP GET + JSON**
* ✅ **Apresentação via formulário simples**


## 🔐 Onde pegar a API Key?

Cadastre-se gratuitamente em:
🌐 [https://openweathermap.org/api](https://openweathermap.org/api)
Use a opção "Current Weather Data".


## 🔄 Próximos Passos

Possibilidades:

* adicionar **câmbio de moedas** (com ExchangeRate ou CurrencyAPI)
* simular uma **integração com tela em Bootstrap**
* gerar um **.pptx com os requisitos + prints do protótipo**
* publicar no GitHub ou apresentar



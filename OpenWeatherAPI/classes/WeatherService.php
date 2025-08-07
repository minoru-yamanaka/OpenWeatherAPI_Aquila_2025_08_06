<!-- 🌐 2. Classe WeatherService.php -->
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



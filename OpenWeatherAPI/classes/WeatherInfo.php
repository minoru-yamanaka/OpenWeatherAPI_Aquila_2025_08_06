<!-- 🧱 1. Classe WeatherInfo.php -->
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

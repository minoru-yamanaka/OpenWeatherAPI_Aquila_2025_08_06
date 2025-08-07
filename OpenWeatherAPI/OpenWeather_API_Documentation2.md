A OpenWeather API **não possui endpoints POST**, ela é basicamente uma API REST pública para consulta (GET requests). Ou seja:

---

# OpenWeather API — Métodos suportados

| Método HTTP | Uso                                                           |
| ----------- | ------------------------------------------------------------- |
| GET         | Buscar dados (clima, previsão, poluição)                      |
| POST        | **Não suportado** (não há criação/alteração de dados via API) |

---

# Como usar os GETs e interpretar as respostas

### Exemplo prático para GET clima atual:

```http
GET https://api.openweathermap.org/data/2.5/weather?q=São Paulo&appid=SEU_API_KEY&units=metric&lang=pt
```

---

### Como a resposta JSON vai chegar (exemplo simplificado):

```json
{
  "weather": [
    {
      "id": 800,
      "main": "Clear",
      "description": "céu limpo",
      "icon": "01d"
    }
  ],
  "main": {
    "temp": 23.5,
    "feels_like": 24.0,
    "temp_min": 22.0,
    "temp_max": 25.0,
    "pressure": 1012,
    "humidity": 40
  },
  "wind": {
    "speed": 3.1,
    "deg": 180
  },
  "name": "São Paulo",
  "cod": 200
}
```

---

### Interpretação básica dos dados retornados:

| Campo                    | Descrição                                        |
| ------------------------ | ------------------------------------------------ |
| `weather[0].description` | Descrição textual do clima (ex: "céu limpo")     |
| `main.temp`              | Temperatura atual em Celsius (se `units=metric`) |
| `main.humidity`          | Umidade relativa do ar (%)                       |
| `wind.speed`             | Velocidade do vento (m/s)                        |
| `name`                   | Nome da cidade consultada                        |
| `cod`                    | Código HTTP da resposta (200 para sucesso)       |

---

# Outros exemplos GET

### Previsão 5 dias / 3 horas

```http
GET https://api.openweathermap.org/data/2.5/forecast?q=São Paulo&appid=SEU_API_KEY&units=metric&lang=pt
```

**Resposta JSON (resumo da lista):**

```json
{
  "list": [
    {
      "dt_txt": "2025-08-06 15:00:00",
      "main": {
        "temp": 26.3
      },
      "weather": [
        {
          "description": "nuvens dispersas"
        }
      ]
    },
    ...
  ],
  "city": {
    "name": "São Paulo"
  }
}
```

---

### Dados de poluição do ar

```http
GET https://api.openweathermap.org/data/2.5/air_pollution?lat=-23.55&lon=-46.63&appid=SEU_API_KEY
```

**Resposta JSON:**

```json
{
  "list": [
    {
      "main": {
        "aqi": 2
      },
      "components": {
        "pm2_5": 10.5,
        "pm10": 20.3,
        "no2": 15.1
      },
      "dt": 1628253600
    }
  ]
}
```

---

# Documentação da API OpenWeather

## 1. Obter clima atual da cidade

**Endpoint:**  
`GET https://api.openweathermap.org/data/2.5/weather`

**Descrição:**  
Retorna as condições meteorológicas atuais (temperatura, clima, umidade, etc.) para uma cidade informada.

**Parâmetros de Requisição:**

| Parâmetro | Tipo   | Obrigatório | Descrição                                  | Exemplo           |
| --------- | ------ | ----------- | ------------------------------------------| ----------------- |
| q         | string | Sim         | Nome da cidade (pode incluir país)         | `q=São Paulo,BR`  |
| appid     | string | Sim         | Chave de API (API key)                      | `appid=SEU_API_KEY` |
| units     | string | Opcional    | Unidade de medida (`metric`, `imperial`, `standard`) | `units=metric`   |
| lang      | string | Opcional    | Idioma da resposta (`pt`, `en`, etc.)       | `lang=pt`         |

**Exemplo de requisição:**

```http
GET https://api.openweathermap.org/data/2.5/weather?q=São Paulo&appid=SEU_API_KEY&units=metric&lang=pt
````

**Exemplo de resposta (JSON):**

```json
{
  "weather": [
    {
      "description": "céu limpo"
    }
  ],
  "main": {
    "temp": 23.5,
    "humidity": 40
  },
  "name": "São Paulo"
}
```

**Códigos de status HTTP:**

| Código | Significado                     |
| ------ | ------------------------------- |
| 200    | Sucesso — dados retornados      |
| 401    | Não autorizado — chave inválida |
| 404    | Cidade não encontrada           |
| 429    | Limite de requisições excedido  |

---

## 2. Obter previsão do tempo (5 dias / 3 horas)

**Endpoint:**
`GET https://api.openweathermap.org/data/2.5/forecast`

**Descrição:**
Retorna a previsão meteorológica para os próximos 5 dias, com dados a cada 3 horas.

**Parâmetros de Requisição:**

| Parâmetro | Tipo   | Obrigatório | Descrição                                            | Exemplo               |
| --------- | ------ | ----------- | ---------------------------------------------------- | --------------------- |
| q         | string | Sim         | Nome da cidade (pode incluir país)                   | `q=Rio de Janeiro,BR` |
| appid     | string | Sim         | Chave de API (API key)                               | `appid=SEU_API_KEY`   |
| units     | string | Opcional    | Unidade de medida (`metric`, `imperial`, `standard`) | `units=metric`        |
| lang      | string | Opcional    | Idioma da resposta (`pt`, `en`, etc.)                | `lang=pt`             |

**Exemplo de requisição:**

```http
GET https://api.openweathermap.org/data/2.5/forecast?q=Rio de Janeiro&appid=SEU_API_KEY&units=metric&lang=pt
```

**Exemplo de resposta (JSON) (resumo):**

```json
{
  "list": [
    {
      "dt_txt": "2025-08-06 12:00:00",
      "main": {
        "temp": 28.3
      },
      "weather": [
        {
          "description": "nuvens dispersas"
        }
      ]
    },
    {
      "dt_txt": "2025-08-06 15:00:00",
      "main": {
        "temp": 29.1
      },
      "weather": [
        {
          "description": "sol com poucas nuvens"
        }
      ]
    }
  ],
  "city": {
    "name": "Rio de Janeiro"
  }
}
```

**Códigos de status HTTP:**
(*mesmos do endpoint anterior*)

---

## 3. Obter dados de poluição do ar

**Endpoint:**
`GET https://api.openweathermap.org/data/2.5/air_pollution`

**Descrição:**
Retorna dados de qualidade do ar para uma localização específica.

**Parâmetros de Requisição:**

| Parâmetro | Tipo   | Obrigatório | Descrição                | Exemplo             |
| --------- | ------ | ----------- | ------------------------ | ------------------- |
| lat       | float  | Sim         | Latitude da localização  | `lat=-22.9068`      |
| lon       | float  | Sim         | Longitude da localização | `lon=-43.1729`      |
| appid     | string | Sim         | Chave de API             | `appid=SEU_API_KEY` |

**Exemplo de requisição:**

```http
GET https://api.openweathermap.org/data/2.5/air_pollution?lat=-22.9068&lon=-43.1729&appid=SEU_API_KEY
```

**Exemplo de resposta (JSON):**

```json
{
  "list": [
    {
      "main": {
        "aqi": 2
      },
      "components": {
        "pm2_5": 12.34,
        "pm10": 23.45,
        "no2": 15.67
      },
      "dt": 1628253600
    }
  ]
}
```

---

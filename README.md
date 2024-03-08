# Bienvenido al Desafio IDESA

## Para avanzar con tu proceso de Seleccion realiza los siguientes bugfix 

### Desafio #1
 * Ejecuta  el script DesafioUno.php
 * Realiza las correciones Necesarias en la funcion getClientDebt a fin del que el json que devuelva de la siguiente manera:

  {
  "status": true,
  "message": "Tienes Lotes para cobrar",
  "data": {
    "total": 570000,
    "detail": [
      {
        "id": 6,
        "lote": "00148",
        "precio": 190000,
        "clientID": "123456",
        "vencimiento": "2022-12-01"
      },
      {
        "id": 7,
        "lote": "00148",
        "precio": 190000,
        "clientID": "123456",
        "vencimiento": "2023-01-01"
      },
      {
        "id": 8,
        "lote": "00148",
        "precio": 190000,
        "clientID": "123456",
        "vencimiento": "2023-02-01"
      }
    ]
  }
}

### Desafio #2
 * Ejecuta el script DesafiaDos.php
 *  Realiza las correciones Necesarias en la funcion retriveLotes y en la funcion getLotes a fin del que el json que devuelva de la siguiente manera:

 [
  {
    "id": 4,
    "lote": "00148",
    "precio": 130000,
    "clientID": 123456,
    "vencimiento": "2022-10-01"
  },
  {
    "id": 5,
    "lote": "00148",
    "precio": 145000,
    "clientID": 123456,
    "vencimiento": null
  },
  {
    "id": 6,
    "lote": "00148",
    "precio": 190000,
    "clientID": 123456,
    "vencimiento": "2022-12-01"
  },
  {
    "id": 7,
    "lote": "00148",
    "precio": 190000,
    "clientID": 123456,
    "vencimiento": "2023-01-01"
  },
  {
    "id": 8,
    "lote": "00148",
    "precio": 190000,
    "clientID": 123456,
    "vencimiento": "2023-02-01"
  }
]
 
### Desafio #3
* Realiza un Servicio REST que retorne todos los lotes datos de un lote segun el id enviado como parametro, utilizando la base idesa.db del Archivo Database.php



# Exitos!
LAravel 8

-La aplicación tiene sus migracisones y seeders correspondientes, el sseder para el usuario agrega 1 registro el cual se necesita para generar un token jwt.
-Hay una migracion para la tabla data en el cual esta guardada la inf del csv, esta tabla no tiene seeder ya que exporte los primero 1000 registros del csv.
-en la carpeta raiz\database se encuentra un sql con la base de datos ya cargada con la info necesaria para utilizarla.
-La aplicacion cuenta con la seguridad de un jwt el cual se necesita tener en el header de la petición, este es uno válido: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xOTIuMTY4LjEuMTEwOjgwODNcL21ha2VfdG9rZW4iLCJpYXQiOjE2MzQ2NjY1MDMsIm5iZiI6MTYzNDY2NjUwMywianRpIjoiMUh5U0R0M1cwTU11aWxuOSIsImFjdGlvbiI6IlNJT1BCUkEiLCJ1c2VyX2lkIjoxLCJ0b2tlbiI6IjA1MTE5MiJ9.xaj1rrrIe2OYwdlQOzIKBcHOZ2tSR99goqeTfXFXTBk

-en el .env hay una variable de entorno el cual le indica a la aplicacion si se encuentra en desarrollo o producción, 0 o 1, 0 para desarrollo 1 para produccion,
en desarrollo se habilita una url /make_token el cual permite generar tokens validos sin expiración con el que se puede probar la api.

url local de pruebas: http://localhost:8000/api/price-m2/zip-codes/7800/aggregate/max?construction_type=3
url web de pruebas: https://earthy-guideline.000webhostapp.com/api/price-m2/zip-codes/7800/aggregate/max?construction_type=3
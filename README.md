# Laravel Advance Filters 

Este proyecto permite realizar busquedas personalizadas al ingresar diversos parametros para obtener resultados de una base de datos relacional. Mediante la introducción de criterios específicos, los usuarios pueden acceder a información detallada y relevante, optimizando así la búsqueda y facilitando el acceso a datos específicos según sus necesidades.

## Pre-Requisitos

- Sistema operativo Window 10
- Postman for Windows Version 10.21.11
- Xampp Version 3.3.0
- MySQL Version 8.0.2
- Laravel Framework 9.52.16
- Visual Studio Code
- Composer version 2.4.4

## Instalación

Clonar repositorio 
```bash
git clone https://github.com/WillianAbrego/Advanced-Filters-Search.git
```
Ingresar al folder
```bash
cd Advanced-Filters-Search
```
Abrir con visual studio code
```bash
code .
```
Actualizar composer 
```bash
composer install or composer update
```

Copiar archivo .env.example y renombrarlo como .env
```bash
cp .env.example .env
```

Configurar base de datos en archivo .env
 ```
 DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={name_db}
DB_USERNAME={user_db}
DB_PASSWORD={pass_db}
 ```


```bash
php artisan key:generate
```
 
***
Reiniciar la base de datos de la aplicación Laravel
```bash
php artisan migrate:fresh --seed
```

## Nota:
Asegúrate de haber definido las migraciones y semillas necesarias antes de ejecutar este comando. Además, ten en cuenta que este comando eliminará todos los datos actuales de la base de datos.
***

Iniciar el servidor de desarrollo integrado de Laravel
```bash
 php artisan serve
```
Una vez ejecutado, puedes acceder a tu aplicación en el navegador a través de la URL http://localhost:8000.
***
## Base de datos


![ER](https://github.com/WillianAbrego/Advanced-Filters-Search/blob/main/assets/searchdb.png?raw=true)

***

## Ejecutando las pruebas

Prueba realizada para el endpoint http://127.0.0.1:8000/filter utilizando postman para poder ingresar los parametros que seran el criterio para filtrar

![ejemplo](https://github.com/WillianAbrego/Advanced-Filters-Search/blob/main/assets/prueba.png)
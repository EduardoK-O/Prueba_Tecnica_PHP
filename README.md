# Prueba_Tecnica_PHP

Para ejecutar la aplicación, en la raiz del proyecto se deberán seguir los siguientes pasos:

- Instalar Composer:
```sh
composer install
```
- ejecutar el docker:
```sh
docker compose -up
```
- Crear la base de datos con el nombre 'php_test', o ejecutar el script php_test_database.sql que se encuentra en la raiz del proyecto. El docker ejecuta mySql user:root password:password en el puerto 3306:
```sh
CREATE DATABASE `php_test` /*!40100 COLLATE 'armscii8_bin' */;
```
- Por último, se deberán ejecutar las migraciones de laravel:
```sh
php artisan migrate:fresh
```
El proyecto se ejecuta en http://localhost:8000/
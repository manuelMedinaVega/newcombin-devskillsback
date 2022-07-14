1. clonar el proyecto
2. ir al folder del proyecto
3. ejecutar: composer install
4. ejecutar: php artisan key:generate
5. crear dentro de la carpeta database un archivo vacío llamado database.sqlite
6. ejecutar: php artisan migrate
7. ejecutar: php artisan serve
8. probar los distintos request usando postman o similar:
9. post: create-tax, pay-tax
10. get: list-pending-taxes/{service_type?}, list-transactions/{init_date}/{end_date}

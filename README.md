1. clonar el proyecto
2. ir al folder del proyecto
3. ejecutar: composer install
4. ejecutar: php artisan key:generate
5. ejecutar: php artisan migrate
6. ejecutar: php artisan serve
7. probar los distintos request usando postman o similar:
8. post: create-tax, pay-tax
9. get: list-pending-taxes/{service_type?}, list-transactions/{init_date}/{end_date}

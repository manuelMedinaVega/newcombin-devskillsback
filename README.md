1. clonar el proyecto
2. ir al folder del proyecto
3. ejecutar: composer install
4. ejecutar: php artisan key:generate
5. ejecutar: php artisan serve
6. probar los distintos request usando postman o similar:
    post: create-tax, pay-tax
    get: list-pending-taxes/{service_type?}, list-transactions/{init_date}/{end_date}
# /migrate

Revisar las migraciones pendientes y ejecutarlas.

1. Mostrar qué migraciones están pendientes con `php artisan migrate:status`
2. Pedir confirmación antes de correr
3. Ejecutar `php artisan migrate`
4. Si hay seeders relacionados al cambio, preguntar si correrlos también

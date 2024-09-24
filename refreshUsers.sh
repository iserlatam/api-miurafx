# !/bin/bash

php artisan migrate --path="database/migrations/2024_08_21_145428_create_permission_tables.php"
php artisan migrate --path="database/migrations/2024_09_05_165325_create_clientes_table.php"
php artisan migrate --path="database/migrations/2024_09_09_183614_create_asignacions_table.php"
php artisan migrate --path="database/migrations/2014_10_12_000000_create_users_table.php"
php artisan db:seed RolesSeeder
php artisan db:seed AdminSeeder

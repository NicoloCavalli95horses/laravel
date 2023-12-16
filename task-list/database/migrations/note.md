# Migrations

Migrations are a kind of version control of the database schema in Laravel
they let you create, modify and delete database rows and columns using PHP instead of sql
they are implementation of models

while models represent the logic of the database and are connected to the application logic,
migrations define the database structure itself

migrations create or update database schemas incrementally over time

apply the migration with: php artisan migrate
rollback the last migration with: php artisan migrate:rollback

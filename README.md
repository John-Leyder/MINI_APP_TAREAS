# Mis Tareas

Mini-aplicación CRUD de gestión de tareas personales construida con Laravel.

## Nombre del proyecto

Mis Tareas

## Nombre completo

jhon stiven colorado

## Versiones usadas

- PHP: 8.0.30
- Laravel: 9.52.21

## Pasos para correr el proyecto localmente

1. Clona este repositorio.
2. Entra a la carpeta del proyecto:

```bash
cd "CRUD_PRUEBA TECNICA"
```

3. Instala las dependencias:

```bash
composer install
```

4. Crea el archivo de entorno:

```bash
copy .env.example .env
```

5. Configura la base de datos en `.env`.

Ejemplo si vas a usar MySQL con XAMPP:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mis_tareas
DB_USERNAME=root
DB_PASSWORD=
```

Antes de migrar, crea la base de datos `mis_tareas` en tu gestor de MySQL.

6. Genera la llave de la aplicación:

```bash
php artisan key:generate
```

7. Ejecuta las migraciones:

```bash
php artisan migrate
```

8. Levanta el servidor local:

```bash
php artisan serve
```

9. Abre la aplicación en `http://127.0.0.1:8000`.

## Pruebas

Para ejecutar las pruebas automatizadas:

```bash
php artisan test
```

## Deploy

No aplica por el momento.

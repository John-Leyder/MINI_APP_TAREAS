# Mis Tareas 📝

Mini-aplicación para la gestión de tareas personales, desarrollada como parte de la prueba técnica para la pasantía de Desarrollo Laravel.

## 👤 Candidato
**Nombre completo:** John Leyder Cárdenas

## 🛠️ Stack Tecnológico
- **PHP:** 8.1.29
- **Laravel:** 10.50.2
- **Base de Datos:** MySQL (XAMPP)
- **Frontend:** Laravel Blade + Vanilla CSS (Glassmorphism design)

## 📋 Requisitos Previos
Antes de comenzar, asegúrate de tener instalado:
- **PHP 8.1 o superior**
- **Composer**
- **MySQL** (recomendado vía XAMPP o Laragon)

## 🚀 Pasos para correr el proyecto localmente

1. **Clonar el repositorio:**
   ```bash
   git clone [URL-DEL-REPO]
   cd MINI_APP_TAREAS
   ```

2. **Instalar dependencias de PHP:**
   ```bash
   composer install
   ```

3. **Configurar el entorno:**
   Copia el archivo de ejemplo y genera la llave de la aplicación:
   ```bash
   copy .env.example .env
   php artisan key:generate
   ```

4. **Base de Datos:**
   1. Abre tu gestor de base de datos (phpMyAdmin, MySQL Workbench, o terminal).
   2. Crea una base de datos llamada **`mis_tareas`**:
      ```sql
      CREATE DATABASE mis_tareas;
      ```
   3. Configura tus credenciales en el archivo `.env` que creaste en el paso anterior:
      ```env
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=mis_tareas
      DB_USERNAME=root
      DB_PASSWORD=
      ```

5. **Ejecutar Migraciones:**
   Este comando creará las tablas necesarias automáticamente:
   ```bash
   php artisan migrate
   ```

6. **Levantar el servidor:**
   ```bash
   php artisan serve
   ```
   La aplicación estará disponible en: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## 📜 Características de la Aplicación
- **CRUD Completo:** Crear, leer, editar y eliminar tareas.
- **Gestión de Estados:** Marcar tareas como completadas/pendientes.
- **Prioridades:** Clasificación por niveles (Baja, Media, Alta) con indicadores visuales.
- **Validaciones:** Control estricto de campos según especificaciones de la prueba.
- **Diseño Responsivo:** Interfaz moderna y adaptable.

---



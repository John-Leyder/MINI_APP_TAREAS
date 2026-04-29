# Respuestas - Parte Teórica

## 1. ¿Qué es el patrón MVC y qué responsabilidad tiene cada parte?

R// Es un modelo que sirve para clasificar la información, la lógica del sistema y la interfaz que se le presenta al usuario.

- **Modelo**: se encarga de manipular, gestionar y actualizar los datos.
- **Vista**: se encarga de mostrarle al usuario final las pantallas, ventanas, páginas y formularios el resultado de una solicitud.
- **Controlador**: se encarga de gestionar las instrucciones que se reciben, atenderlas y procesarlas.

---

## 2. Diferencia entre los métodos HTTP GET y POST. ¿Cuándo usarías cada uno?

R// Diferencia: el GET obtiene información del servidor. Y el POST envía información al servidor.
Y el HTTP es el protocolo que comunica al cliente con el servidor.

Uso GET cuando necesito obtener datos sin modificar el servidor, y POST cuando necesito enviar datos para crear o procesar información en el backend.

---

## 3. ¿Qué es Eloquent en Laravel y qué problema resuelve?

R// Me permite trabajar con la base de datos usando objetos y clases de PHP y no en SQL directamente.

Qué resolvería:
Sin eloquent haría algo así:
`SELECT * FROM users WHERE id = 1;` y luego tendría que convertir esos datos manualmente en variables dentro de mi código.
Y que luego sería más difícil de leer. Mientras que con el Eloquent hago lo mismo pero lo solucionaría así:
`$user = User::find(1);`
Es más limpio y entendible.

---

## 4. ¿Qué hace el comando php artisan migrate y para qué sirven las migraciones?

R// Toma los archivos de migración (que definen la estructura de la BD) y los aplica automáticamente. Sirven para versionar la estructura de la base de datos, lo que permite que todo el equipo tenga la misma estructura sin compartir archivos SQL, y si algo sale mal se puede revertir con `migrate:rollback`

---

## 5. Diferencia entre == y === en PHP. Da un ejemplo donde el resultado cambie.

R// == (igualdad débil) Compara solo el valor y no el tipo de dato.
```php
var_dump(5 == "5"); // true
```

=== (igualdad estricta) Compara el valor y el tipo de dato.
```php
var_dump(5 === "5"); // false
```

---

## 6. ¿Qué es Composer y cuál es la diferencia entre composer install y composer update?

R// Composer es el gestor de dependencias para PHP que declara, descarga y mantiene bibliotecas por proyecto, asegurando versiones específicas y modularidad.

La diferencia es:
- `composer install` usa el archivo composer.lock que ya existe para instalar exactamente las mismas versiones, ideal para no romper nada en producción o en equipo.
- `composer update` busca versiones nuevas de las dependencias y actualiza el composer.lock, se usa cuando quiero actualizar las bibliotecas del proyecto

---

## 7. En Git, ¿cuál es la diferencia entre git pull y git fetch?

R// El git fetch descarga los cambios del repositorio remoto y el git pull descarga cambios y los aplica automáticamente.
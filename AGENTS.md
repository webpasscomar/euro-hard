# AGENTS.md

## Resumen

Este proyecto es una aplicacion Laravel 11 para el sitio y panel de administracion de Euro Hard.
La base usa Blade para vistas, Livewire 3 para algunos componentes interactivos, AdminLTE para el backend, Vite para assets y Bootstrap/Tailwind en el frontend.

## Stack

- PHP 8.2
- Laravel 11
- Livewire 3
- Laravel AdminLTE
- Vite 6
- Bootstrap 5
- Tailwind CSS 3
- PHPUnit 11

## Estructura util

- `app/Http/Controllers`: controladores frontend, backend y auth.
- `app/Http/Requests`: validaciones de formularios.
- `app/Livewire`: componentes Livewire.
- `app/Models`: modelos Eloquent.
- `resources/views`: vistas Blade del sitio, panel, mails y overrides de vendor.
- `resources/css`, `resources/js`, `resources/sass`: assets fuente.
- `routes/web.php`: rutas publicas.
- `routes/admin.php`: rutas del panel.
- `database/migrations`: esquema de base de datos.
- `database/seeders`: seeders del proyecto.
- `public/`: archivos publicos, imagenes, uploads y librerias compiladas o distribuidas.

## Comandos frecuentes

### Instalar dependencias

```bash
composer install
npm install
```

### Desarrollo

```bash
composer run dev
```

Esto levanta:

- `php artisan serve`
- `php artisan queue:listen --tries=1`
- `php artisan pail --timeout=0`
- `npm run dev`

### Frontend

```bash
npm run dev
npm run build
```

### Base de datos

```bash
php artisan migrate
php artisan db:seed
```

### Calidad

```bash
php artisan test
./vendor/bin/phpunit
./vendor/bin/pint
```

En Windows, si `./vendor/bin/...` no funciona, usar:

```bash
php vendor/bin/phpunit
php vendor/bin/pint
```

## Convenciones del repo

- Respetar `.editorconfig`: UTF-8, fin de linea LF, indentacion de 2 espacios.
- Mantener nombres y textos de negocio en espanol cuando ya existan asi en el dominio.
- Seguir la organizacion actual antes de introducir nuevas capas o patrones.
- Preferir Form Requests para validacion y Eloquent para la logica de datos.
- Si una pantalla ya usa Livewire, extender ese enfoque en lugar de mezclar soluciones nuevas sin necesidad.
- Si una vista del backend ya depende de AdminLTE, conservar ese sistema visual.

## Que tocar y que evitar

Tocar normalmente:

- `app/`
- `routes/`
- `resources/views/`
- `resources/css/`
- `resources/js/`
- `resources/sass/`
- `database/migrations/`
- `database/seeders/`
- `config/` cuando el cambio lo requiera

Evitar modificar salvo necesidad explicita:

- `public/vendor/`
- `vendor/`
- `node_modules/`
- archivos lock, salvo cambios reales de dependencias
- `public/uploads/` salvo tareas concretas sobre contenido cargado

## Pautas para cambios

- Hacer cambios pequenos y enfocados.
- No refactorizar areas no relacionadas sin necesidad funcional.
- No reemplazar manualmente librerias distribuidas dentro de `public/vendor/`.
- Si se agregan columnas o tablas, incluir migracion y ajustar modelos, validaciones y vistas afectadas.
- Si se cambia un formulario, revisar controlador, request, vista y mails relacionados.
- Si se cambia una ruta del panel, revisar tambien `routes/admin.php`, menus y permisos implicitos del flujo.

## Verificacion minima esperada

Antes de cerrar un cambio, correr lo que aplique:

```bash
php artisan test
php vendor/bin/pint --test
npm run build
```

Si no es posible ejecutar algo, dejarlo explicitado en la entrega final.

## Notas utiles para agentes

- El `README.md` actual es el generico de Laravel y no documenta decisiones del proyecto.
- Hay overrides de vistas de vendor en `resources/views/vendor/`; revisarlos antes de asumir comportamiento por defecto.
- El repositorio incluye assets y librerias versionadas en `public/`, por lo que conviene confirmar si un archivo es fuente o artefacto antes de editarlo.

# /review

Revisar los cambios actuales (staged + unstaged) antes de commitear.

1. Correr `git diff HEAD` para ver todos los cambios
2. Verificar que:
   - No se rompió ninguna ruta en `routes/web.php` o `routes/admin.php`
   - Si se modificó un formulario, el Form Request correspondiente está actualizado
   - Si se agregó una columna, existe la migración
   - No hay `dd()`, `dump()`, o `var_dump()` olvidados
   - No hay credenciales hardcodeadas
3. Sugerir mejoras si las hay, sin modificar nada sin pedir permiso

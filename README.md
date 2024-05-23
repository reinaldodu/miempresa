## Instrucciones de instalación
1. Clonar el repositorio
2. Instalar las dependencias con `npm install`
3. Instalar las dependencias de PHP con `composer install`
4. Crear un archivo `.env` en la raíz del proyecto con las siguientes variables de entorno:
    APP_URL=http://miempresa.test
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=miempresa
    DB_USERNAME=root
    DB_PASSWORD=

5. Ejecutar las migraciones y las semillas con `php artisan migrate --seed`
6. Iniciar el servidor de desarrollo con `npm run dev`
7. Acceder a la aplicación en `http://mieempresa.test`

## Instrucciones de uso
1. Iniciar sesión con el email fcaballero@email.co
2. Utilizar la contraseña `123456789`
3. Explorar las opciones de departamentos y empleados
4. Crear, editar y eliminar registros para empleados y departamentos
5. consultar empleados y departamentos
6. En la semilla se crean 100 empleados y 10 departamentos
7. Se puede utilizar el buscador para filtrar los registros
8. No se puede crear un empleado si no se ha creado primero un departamento.
9. En la vista de empleados se puede ver la paginación de los registros (cada 10 registros)
10. Se crean 3 pruebas unitaras (EmpleadosTest) y una de integración (DepartamentosTest)

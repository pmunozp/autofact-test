<p>
    <h2>Requisitos:</h2>
    <ul>
        <li>PHP 7.3</li>
        <li>Composer</li>
        <li>Laravel</li>
        <li>Node >=8</li>
        <li>NPM</li>
        <li>MySQL</li>
        <li>MongoDB</li>
    </ul>
</p>

<p>
    <h2>Directorios:</h2>
    <ul>
        <li>Front: Aqui puede encontrar el front desarrollado en laravel 8.12</li>
        <li>Api: Desarrollada en NodeJS</li>
    </ul>
</p>

<p>
    <h2>Configuracion:</h2>
    <p>
        <h3>Front</h3>
        <ul><li>Modificar archivo '.env'</li></ul>
        <p>Configurar el acceso a la base de datos MySQL. Los parametros a modificar son: 'DB_HOST', 'DB_DATABASE', 'DB_USERNAME' y 'DB_PASSWORD' con los datos de su servidor MySQL</p>
        <ul><li>Dump de datos a la BD</li></ul>
        <p>Para hacer el dump inicial de la base de datos, ingresar el directorio 'front' y ejecutar el comando 'php artisan migrate:fresh --seed'. Esto creará las tablas y poblará con datos iniciales</p>
    </p>
    <p>
        <h3>Api</h3>
        <ul><li>Modificar archivo 'server.js'</li></ul>
        <p>Configurar el acceso a la base de datos Mongo. El parametro a modificar es la variable 'connectionString' (formato: 'mongodb://&lt;user>&lt;:pass>host&lt;:puerto>/&lt;collection>'</p>
        <ul><li>Instalar dependencias</li></ul>
        <p>Ingresar a la carpete 'api' y ejecutar el comando 'npm i'</p>
    </p>
</p>

<p>
    <h2>Ejecución:</h2>
    <p>
        <h3>Front</h3>
        Para ejecutar el front, ingresar a la carpeta 'front' y correr el comando 'php artisan serve', esto pondrá un servidor web a la escucha en el puerto 8000. Abra su navegador web e ingrese a la url <a href="http://127.0.0.1:8000">http://127.0.0.1:8000</a>
    </p>
    <p>
        <h3>Api</h3>
        Para ejecutar la api, ingresar a la carpeta 'api' y correr el comando 'node server.js', esto pondrá express a la escucha en el puerto 3000.</a>
    </p>
</p>

<p>
    <h2>Endpoints:</h2>
    <p>
        <h3>Front</h3>
        <ul>
            <li>/ -> Formulario de login</li>
            <li>/question -> Formulario de pregunta</li>
            <li>/answers -> Listado de respuestas</li>
        </ul>
    </p>
    <p>
        <h3>Api</h3>
        <ul>
            <li>GET /api/answer - Listado de respuestas</li>
            <li>PUT /api/answer - Ingreso de respuestas</li>
                Ejemplo de Body: {
                    "question": "¿Del 1 al 5, es rápido el sitio?",
                    "answer": "3",
                    "userId": 1
                }
        </ul>
    </p>
</p>

<p>
    <h2>Usuarios disponibles</h2>
    <ul>
        <li>user@test.cl:user -> Usuario rol 'usuario'</li>
        <li>admin@test.cl:admin -> Usuario rol 'admin'</li>
    </ul>
</p>

<p>
    <h2>Observaciones y mejoras:</h2>
    <ul>
        <li>Seguridad: Integrar encriptación en la comunicacion entre el front y la api</li>
        <li>Autenticación: Integrar autenticación y autorizacion en el acceso a la api</li>
        <li>Arquitectura: Cambiar el proveedor de Frontend por frameworks mas especializados como podria ser Angular.io o React</li>
        <li>Arquitectura 2: Evitar la conexión directa desde el front a la base de datos</li>
        <li>Testing: Integra framework de testing, tanto para front como para la api</li>
    </ul>
</p>
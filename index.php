<?php
// index.php - Página de prueba de conexión a bases de datos Azure
// Autor: Hugo Hincapié

// ======== CONFIGURACIÓN MYSQL ========
$mysql_host = "mysql-prd-hincapie.mysql.database.azure.com";
$mysql_user = "adminmysql";       // El usuario exacto que creaste en Azure
$mysql_pass = "Zz308681377..";   // Tu contraseña real
$mysql_db   = "mysql";            // O la base que creaste
$mysql_port = 3306;

// ======= CONFIGURACIÓN POSTGRESQL =======
$pg_host = "postgres-prd-hincapie.postgres.database.azure.com";
$pg_user   = "adminpostgres";     // El usuario exacto del servidor PostgreSQL
$pg_pass   = "Zz308681377..";    // Tu contraseña real
$pg_db     = "postgres";
$pg_port   = 5432;

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión Azure DB - Hugo Hincapié</title>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: #333;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background: #0f3460;
            color: white;
            padding: 20px;
            text-align: center;
        }
        main {
            max-width: 900px;
            background: #ffffffcc;
            margin: 40px auto;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        h2 {
            color: #0f3460;
        }
        .result {
            padding: 15px;
            margin: 15px 0;
            border-radius: 8px;
            font-weight: bold;
        }
        .ok {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .fail {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        footer {
            text-align: center;
            padding: 15px;
            background: #0f3460;
            color: white;
        }
        button {
            background: #2a5298;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background: #1e3c72;
        }
    </style>
</head>
<body>
<header>
    <h1>Validación de conexión - Proyecto Azure (Hugo Hincapié)</h1>
</header>

<main>
    <h2>Prueba de conexión a MySQL</h2>
    <?php
    try {
        $conn_mysql = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db, $mysql_port);
        if ($conn_mysql->connect_error) {
            throw new Exception("❌ Error: " . $conn_mysql->connect_error);
        } else {
            echo "<div class='result ok'>✅ Conectado correctamente a MySQL</div>";
        }
    } catch (Exception $e) {
        echo "<div class='result fail'>".$e->getMessage()."</div>";
    }
    ?>

    <h2>Prueba de conexión a PostgreSQL</h2>
    <?php
    try {
        $pg_conn = pg_connect("host=$pg_server port=$pg_port dbname=$pg_db user=$pg_user password=$pg_pass");
        if ($pg_conn) {
            echo "<div class='result ok'> Conectado correctamente a PostgreSQL</div>";
        } else {
            throw new Exception(" Error al conectar con PostgreSQL");
        }
    } catch (Exception $e) {
        echo "<div class='result fail'>".$e->getMessage()."</div>";
    }
    ?>

    <button onclick="location.reload()">🔄 Reintentar</button>
</main>

<footer>
    &copy; 2025 Proyecto de Aula - Azure Cloud | Desarrollado por Hugo Hincapié
</footer>

</body>
</html>

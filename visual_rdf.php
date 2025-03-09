<?php
// Conexión a MySQL
// Encabezados para UTF-8

$conn = new mysqli("127.0.0.1", "marcelop_uv0055", "peron3047", "marcelop_bookia");

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Configurar MySQL para devolver los resultados en UTF-8
$conn->set_charset("utf8");

// Consulta SQL
$sql = "SELECT identifier, title, date, description, source FROM dc";
$result = $conn->query($sql);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Configurar MySQL para devolver los resultados en UTF-8
$conn->set_charset("utf8");

// Consulta SQL con autores
$sql = "SELECT identifier, title, creator_1, creator_2, creator_3, date, description, source FROM dc";
$result = $conn->query($sql);

// Verificar si la consulta falló
if (!$result) {
    die("Error en la consulta SQL: " . $conn->error);
}

// Procesar resultados y convertir a RDF
while ($row = $result->fetch_assoc()) {
    $identifier = "ex:article_" . $row["identifier"];
    $title = htmlspecialchars($row["title"], ENT_QUOTES, 'UTF-8');
    $date = date("Y-m-d", strtotime($row["date"]));
    $description = htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8');
    $url = !empty($row["source"]) ? htmlspecialchars($row["source"], ENT_QUOTES, 'UTF-8') : "https://www.cyta.com.ar/bookia/bookia.php?id=" . $row["identifier"];

    echo "$identifier a schema:book ;<br>";
    echo "    schema:name \"$title\" ;<br>";
    echo "    schema:datePublished \"$date\" ;<br>";
    echo "    schema:description \"$description\" ;<br>";

    // Construir tripletas de autores
    for ($i = 1; $i <= 3; $i++) {
        $creator = trim($row["creator_$i"]);
        if (!empty($creator)) {
            $author_id = "ex:author_" . strtolower(str_replace(" ", "_", $creator));
            echo "    schema:author $author_id ;<br>";
            echo "$author_id a schema:Person ;<br>";
            echo "    schema:name \"$creator\" .<br>";
        }
    }

    echo "    schema:url &lt;$url&gt; .<br><br><br>";
}

$conn->close();

?>
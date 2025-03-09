<?php
header('Content-Type: text/turtle'); // Definimos el tipo de contenido RDF/Turtle

// Conexión a la base de datos
$conexion = new mysqli("127.0.0.1", "marcelop_uv0055", "peron3047", "marcelop_bookia");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener la consulta "SPARQL-like" desde un parámetro GET
if (isset($_GET['query'])) {
    $sparqlQuery = $_GET['query'];

    // Conversión manual de SPARQL-like a SQL (esto se puede mejorar)
    if (strpos($sparqlQuery, "SELECT ?title ?date WHERE") !== false) {
        $sql = "SELECT title, fecha FROM dc";
    } elseif (strpos($sparqlQuery, "SELECT ?creator_1 WHERE") !== false) {
        $sql = "SELECT autor FROM dc";
    } else {
        die("Consulta no soportada.");
    }

    $resultado = $conexion->query($sql);

    // Generar RDF/Turtle
    echo "@prefix schema: <https://schema.org/> .\n";
    echo "@prefix ex: <https://www.cyta.com.ar/oai/rdf_sparql_monograph> .\n\n";

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $id = "book_" . md5($row['title']); // Hash para ID único

            echo "ex:$id a schema:Book ;\n";
            echo "    schema:name \"" . addslashes($row['title']) . "\" ;\n";
            echo "    schema:datePublished \"" . $row['date'] . "\" .\n\n";
        }
    } else {
        echo "# No se encontraron resultados\n";
    }
} else {
    echo "No se proporcionó una consulta.";
}

$conexion->close();
?>

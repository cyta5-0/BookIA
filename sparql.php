<?php


/*  Consulas

https://www.cyta.com.ar/cybercyta/sparql.php?query=SELECT%20?title%20?date%20WHERE%20{%20?article%20a%20schema:ScholarlyArticle%20}

https://www.cyta.com.ar/cybercyta/sparql.php?query=SELECT%20?title%20?date%20WHERE%20{%20?article%20schema:datePublished%20%222001-09-15%22%20}

https://www.cyta.com.ar/cybercyta/sparql.php?query=SELECT ?title ?creator_1 WHERE { ?article schema:author "Perissé, Marcelo Claudio" }
 */

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
        $sql = "SELECT `title`, `date`, `identifier` FROM `dc`";
    } elseif (strpos($sparqlQuery, "SELECT `?creator_1` WHERE") !== false) {
        $sql = "SELECT `creator_1` FROM `dc`";
    } else {
        die("Consulta no soportada.");
    }
if (strpos($sparqlQuery, 'schema:datePublished') !== false) {
    preg_match('/"(\d{4}-\d{2}-\d{2})"/', $sparqlQuery, $matches);
    if (!empty($matches[1])) {
        $fecha = $matches[1];
        $sql = "SELECT title, date FROM dc WHERE date = '$fecha'";
    } else {
        die("Consulta no soportada.");
    }
}



    $resultado = $conexion->query($sql);

    // Generar RDF/Turtle
    echo "@prefix schema: <https://schema.org/> .\n";
    echo "@prefix ex: <https://www.cyta.com.ar/oai/rdf_sparql_monograph> .\n\n";

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
$id = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($row['title'])) . "_" . substr($row['date'], 0, 4);
; // Hash para ID único

            echo "ex:$id a schema:book ;\n";
echo "    schema:name \"" . addslashes(utf8_encode($row['title'])) . "\" ;\n";
            echo "schema:datePublished \"" . $row['date'] . "\" .\n\n";
        }
    }
	


	
	
	 else {
        echo "# No se encontraron resultados\n";
    }
} else {
    echo "No se proporcionó una consulta.";
}

$conexion->close();
?>

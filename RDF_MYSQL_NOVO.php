<?php
// Encabezados para UTF-8
header('Content-Type: text/html; charset=UTF-8');
// ConfiguraciÃ³n de la conexiÃ³n a MySQL
$servername = "127.0.0.1";
$username = "marcelop_uv0055";
$password = "peron3047";
$dbname = "marcelop_bookia";


// Conectar a MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta a la base de datos
$sql = "SELECT `identifier`, `title`, `creator_1`, `creator_2`, `creator_3`, `date`, `description`, `source` FROM `dc`";
$result = $conn->query($sql);

// Encabezado RDF Turtle
$rdf = "@prefix dc: <http://purl.org/dc/elements/1.1/> .\n";
$rdf .= "@prefix schema: <https://schema.org/> .\n";
$rdf .= "@prefix ex: <https://www.cyta.com.ar/oai/> .\n\n";

// Procesar resultados y convertir a RDF
while ($row = $result->fetch_assoc()) {
    $identifier = "ex:book_" . $row["identifier"];
    $title = addslashes($row["title"]);
    $date = date("Y-m-d", strtotime($row["date"]));
    $description = addslashes($row["description"]);
$url = !empty($row["source"]) ? addslashes($row["source"]) : "https://www.cyta.com.ar/bookia/bookia.php?id=" . $row["identifier"];

// Asegurar que la URL siempre comience con "https://"
if (strpos($url, "http") !== 0) {
    $url = "https://" . ltrim($url, "/");
}


    // Construir tripletas de autores solo si no están vacíos
    $authors = array();   
    for ($i = 1; $i <= 3; $i++) {
        $creator = trim($row["creator_$i"]);
        if (!empty($creator)) {
            $author_id = "ex:autor_" . strtolower(str_replace(" ", "_", $creator));
            $authors[] = "    schema:author $author_id ;\n";
            $rdf .= "$author_id a schema:Person ;\n";
            $rdf .= "    schema:name \"$creator\" .\n\n";
        }
    }

    // Construir el RDF del artículo
    $rdf .= "$identifier a schema:Book ;\n";
    $rdf .= "    schema:name \"$title\" ;\n";
    $rdf .= "    dc:title \"$title\" ;\n";
    $rdf .= implode("", $authors);
    $rdf .= "    schema:datePublished \"$date\" ;\n";
    $rdf .= "    dc:date \"$date\" ;\n";
    $rdf .= "    schema:description \"$description\" ;\n";
    $rdf .= "    dc:description \"$description\" ;\n";
    $rdf .= "    schema:url <$url> .\n\n"; // ðŸ”¹ Agregamos la URL aquÃ­
}

// Guardar el RDF en un archivo
$file = "bookia.rdf";
file_put_contents($file, $rdf);

echo "RDF generado correctamente en $file";

// Cerrar conexiÃ³n
$conn->close();

?>

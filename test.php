<?php
function getMIPLabelsFromOfficeFile($filePath) {
    $labels = [];

    $zip = new ZipArchive;
    if ($zip->open($filePath) === TRUE) {

        // Recorremos todos los ficheros internos del ZIP (docx/xlsx/pptx)
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $stat = $zip->statIndex($i);
            $name = $stat['name'];

            // Microsoft suele guardar MIP en customXml o docProps/custom.xml
            if (preg_match('/(customXml\/item\d+\.xml|docProps\/custom\.xml)/', $name)) {
                $content = $zip->getFromIndex($i);

                if ($content !== false) {
                    // Parseamos el XML
                    $xml = @simplexml_load_string($content);

                    if ($xml) {
                        $xmlString = json_encode($xml); // convertir a string
                        $xmlArray = json_decode($xmlString, true);

                        // Recorremos el array en busca de claves MSIP_Label
                        array_walk_recursive($xmlArray, function($value, $key) use (&$labels) {
                            if (stripos($value, "MSIP_") !== false || stripos($key, "MSIP_") !== false) {
                                $labels[] = "$key : $value";
                            }
                        });
                    }
                }
            }
        }
        $zip->close();
    }

    return $labels;
}

// Buscar todos los archivos de Office en la misma carpeta
$files = glob("*.{docx,xlsx,pptx}", GLOB_BRACE);

if (empty($files)) {
    echo "No se encontraron archivos Office en esta carpeta.\n";
} else {
    foreach ($files as $file) {
        echo "📄 Archivo: $file\n";
        $labels = getMIPLabelsFromOfficeFile($file);

        if (!empty($labels)) {
            echo "   ➜ Etiquetas MIP encontradas:\n";
            foreach ($labels as $label) {
                echo "     - $label\n";
            }
        } else {
            echo "   ➜ No se encontraron etiquetas MIP.\n";
        }
        echo "\n";
    }
}
<?php
libxml_use_internal_errors(true);

$xml = new DOMDocument();
$xml->load("emp.xml");

if ($xml->schemaValidate("empl.xsd")) {
    echo "✅ XML is valid!";
} else {
    echo "❌ XML is invalid!<br>";
    foreach (libxml_get_errors() as $error) {
        echo "<pre>" . $error->message . "</pre>";
    }
}
?>

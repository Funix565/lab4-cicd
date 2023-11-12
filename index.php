<?php
    $xmlData = simplexml_load_file("pytest_reports/pytest_report.xml")
        or die("Unable to load the xml.");
    echo '<pre>';
    print_r($xmlData);
    echo '</pre>';
?>
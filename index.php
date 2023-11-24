<?php
    $xmlData = simplexml_load_file("pytest_reports/pytest_report.xml")
        or die("Unable to load the xml.");

    $testsuiteAttributes = $xmlData->testsuite->attributes();
    $totalTime = (float) $testsuiteAttributes['time'];
    $numberOfTests = (int) $testsuiteAttributes['tests'];
    $numberOfErrors = (int) $testsuiteAttributes['errors'];
    $numberOfFailures = (int) $testsuiteAttributes['failures'];

    echo '<pre>';
    print_r($xmlData);
    echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Results</title>
</head>
<body>

<h1>Test Results GitHub Edition</h1>

<table border="1">
    <thead>
        <tr>
            <th>Test name</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($xmlData->testsuite->testcase as $testcase): ?>
            <tr>
                <td><?php echo $testcase->attributes()['name']; ?></td>
                <td><?php echo $testcase->attributes()['time']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td>Total time</td>
            <td><?php echo $totalTime; ?></td>
        </tr>
        <tr>
            <td>Number of tests</td>
            <td><?php echo $numberOfTests; ?></td>
        </tr>
        <tr>
            <td>Number of errors</td>
            <td><?php echo $numberOfErrors; ?></td>
        </tr>
        <tr>
            <td>Number of failures</td>
            <td><?php echo $numberOfFailures; ?></td>
        </tr>
    </tfoot>
</table>

</body>
</html>


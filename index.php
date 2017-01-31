<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Botany</title>

    <link href="css/styles.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>

</head>
<body>
    


<?php

error_reporting(-1);



$legend = array(
    'Гідро-морфа' => array (
        '1' =>  'мезофіт',
        '2' =>  'ксеромезофіт ',
        '3' =>  'мезоксерофіт ',
        '4' =>  'еуксерофіт ',
        '5' =>  'гігрофіт ',
        '6' =>  'гігромезофіт',
        '7' =>  'гідрофіт',
    ),

    'Геліо- морфа' => array (
        '1' =>  'геліофіт',
        '2' =>  'сциофіт',
        '3' =>  'геліосциофіт',
        '4' =>  'сциогеліофіт',
    ),

    'Надземні пагони' => array (
        '1' =>  'напіврозеткові',
        '2' =>  'розеткові',
        '3' =>  'безрозеткові',
    ),

    'Підземні пагони' => array (
        '1' =>  'довгокореневищне',
        '2' =>  'цибулина',
        '3' =>  'бульба',
        '4' =>  'без кореневищне',
        '5' =>  'короткокореневищне',
        '6' =>  'каудекс',
        '7' =>  'дернин',
    ),

    'Коренева система' => array (
        '1' =>  'мичкувата ',
        '2' =>  'стрижнева',
    ),

    'Основа' => array (
        '1' =>  'геофіт ',
        '2' =>  'мегафанерофіт ',
        '3' =>  'терофіт ',
        '4' =>  'хамефіт',
        '5' =>  'гемікриптофіт ',
        '6' =>  'нанофанерофіт ',
        '7' =>  'гелофіт',
    ),

    'Еколого-морфологічна класифікація життєвих форм' => array (
        '1' =>  'малорічник',
        '2' =>  'багаторічник ',
        '3' =>  'однорічник',
        '4' =>  'дерево',
        '5' =>  'чагарник',
        '6' =>  'напівчагарник ',
        '7' =>  'напівчагарничок ',
        '8' =>  'чагарничок',
    ),

    'Тип вегетації' => array (
        '1' =>  'літньо-зимнозелений',
        '2' =>  'літньозелений ',
        '3' =>  'ефемероїд',
        '4' =>  'ефемер',
        '5' =>  'вічнозелений',
    ),

    'Тривалість' => array (
        '1' =>  'полікарпік ',
        '2' =>  'монокарпік',
    ),
);

foreach ($legend as $legendKey => $legendValue) {
    // echo "<h2>$legendKey:</h2> <br>";
    foreach ($legendValue as $number => $legendValue) {
        // echo "{$number} - {$legendValue} <br>";
    }
}

$table = file_get_contents('data.json');

$tableArray = json_decode($table, true);

// echo "<pre>";
// print_r($tableArray);
echo "<table id='myTable'>";
echo "<thead><tr>";
foreach ($tableArray[0] as $key => $val) {
     echo "<th>" . $key . "</th>";
}
echo "</tr></thead>";


foreach($tableArray as $key => $val) {
    echo '<tr>';
    $i =0;
        foreach ($val as $key2 => $val2) {
            $i++;
            if ($i < 3) {
                echo "<td>" .$val2. "</td>";
            } else {
                $final_value = $legend[$key2][$val2];

                echo "<td>" . $final_value  . "</td>";

            }
        }
    echo '</tr>';
}

echo "</table>";
?>


    <script>
        $(document).ready(function() {
            $("#myTable").tablesorter();
        }
        );
    </script>
</body>
</html>
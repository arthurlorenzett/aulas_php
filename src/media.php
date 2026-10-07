<!DOCTYPE html>
<html>
<head>
    <title>Média</title>
</head>
<body>

<form method="post">
    Nota 1: <input type="number" name="nota1" step="0.1" required><br><br>
    Nota 2: <input type="number" name="nota2" step="0.1" required><br><br>

    <input type="submit" value="Calcular">
</form>

<?php
if ($_POST) {
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];

    $media = ($nota1 + $nota2) / 2;

    echo "Média: " . $media . "<br>";

    if ($media >= 7) {
        echo "Situação: Aprovado";
    } elseif ($media >= 5) {
        echo "Situação: Recuperação";
    } else {
        echo "Situação: Reprovado";
    }
}
?>

</body>
</html>
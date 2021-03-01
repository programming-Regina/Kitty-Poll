<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Kitty Poll - by Regine</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f2652a0a74.js" crossorigin="anonymous"></script>
    <script>$('.alert').alert()</script>
    
</head>

<body>
    <div class="container-fluid bg-dark text-light p-2">        
            <h2><i class="fas fa-cat"></i> Kitty-Poll: Vota al gatito más sexy del 2020</h2>        
    </div>
    <h1 class='text-center mt-4'> Resultados </h1>
    <div class="container ">
        
        <?php
include("conexion.php");

if (isset($_POST['submit'])) {
    $id = $_POST['customRadio'];

    $query = "UPDATE candidato SET votos = votos + 1 WHERE id = $id;";
    $resultado = mysqli_query($conexion, $query);

    if (!$resultado) {
        die("Falló");
    }

    $query2 = "SELECT * FROM candidato;";
    $resultado2 = mysqli_query($conexion, $query2);
    
    $query3 = "SELECT SUM(votos) FROM candidato;";
    $resultado3 = mysqli_query($conexion, $query3);
    $votos_totales = mysqli_fetch_array($resultado3);

    while ($row = mysqli_fetch_array($resultado2)) {
        $fmt = new NumberFormatter('sp_AR', NumberFormatter::DECIMAL);
        $fmt->setAttribute($fmt::FRACTION_DIGITS, 2);

        $value_now2 = (int)($row['votos']) * 100 / $votos_totales[0];
        $value_now = $fmt->format($value_now2);

?>
        <?php echo $row['nombre'] . ' - ' . $value_now . '%'; ?>
        <div class="progress mb-3 bg-gradient-light" style="height: 2em;">
            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width:<?php echo $row['votos']; ?>%" aria-valuenow="<?php echo $value_now; ?> " aria-valuemin="0" aria-valuemax="10">
                <?php echo $row['votos'] . ' votos'; ?></div>
        </div>
<?php }
}
?>


<div id="alert" class="alert alert-danger fade show text-center m-auto" role="alert">
  <strong><i class="far fa-heart"></i> Gracias por  tu voto <i class="far fa-heart"></i></strong>
 
</div>

</div>



<?php include('../sections/footer.php'); ?>
<?php include("db/conexion.php"); ?>
<?php include("sections/header.php"); 
?>

<form name="f" class="needs-validation" method="POST" action="db/registrar.php" novalidate>
    <div class="card-deck">
        <?php
        $query = "SELECT * FROM candidato";
        $result_all = mysqli_query($conexion, $query);
        while ($row = mysqli_fetch_array($result_all)) {
        ?>
            <div class="card">
                <img src="<?php echo $row['ruta_foto']; ?> " class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['nombre']; ?> </h5>
                    <p class="card-text"><?php echo $row['residencia']; ?></p>
                </div>
                <div class="card-footer">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio<?php echo $row['id']; ?>" name="customRadio" class="custom-control-input" value="<?php echo $row['id']; ?>" required>
                        <label class="custom-control-label" for="customRadio<?php echo $row['id']; ?>">Candidato <?php echo $row['id']; ?></label>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
    <button type="submit" class="btn btn-danger btn-block mt-2" id="submit" name="submit"><i class="fas fa-poll"></i> Votar!</button>
</form>

<?php include('sections/footer.php'); ?>
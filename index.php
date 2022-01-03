<?php 
require "conexion.php";
$Consulta = "SELECT * FROM estados_chk WHERE";
if(isset($_POST["enviar"])){
    error_reporting(error_reporting() & ~E_NOTICE);
    //$length = count($_POST["estados"]); 
    $Consulta .= " estado IN ('".implode("','",$_POST["estados"])."')";
    $stmt = $pdo->prepare($Consulta);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    print '<pre>';
    //var_dump($resultado);
    print '</pre>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checks</title>
</head>
<body>
<form method="Post">
    <input type="checkbox" name="estados[]" value="1">Negado
    <input type="checkbox" name="estados[]" value="2">Aceptado
    <input type="checkbox" name="estados[]" value="3">Rapido
    <input type="checkbox" name="estados[]" value="4">Desiste
    <input type="submit" name="enviar" value="Enviar">
</form>
<br>
<?php echo $Consulta; ?>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($resultado as $item) {
                ?>
                <tr>
                    <td><?php print $item['id']; ?></td>
                    <td><?php print $item['descrip']; ?></td>
                    <td><?php print $item['estado']; ?></td>
                </tr>
                <?php } ?>
                    
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
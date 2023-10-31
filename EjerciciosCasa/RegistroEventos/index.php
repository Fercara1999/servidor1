<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Eventos</title>
</head>
<body>
    
    <form action="./procesa.php" method="get" name="formularioRegistroEventos">
        <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre"></label><br>
        <label for="fecha">Fecha: <input type="date" name="fecha" id="fecha"></label><br>
        <label for="lugar">Lugar: <input type="text" name="lugar" id="lugar"></label><br>
        <label for="descripcion">Descripcion: <input type="text" name="descripcion" id="descripcion"></label><br>
        <button type="button" id="agregaevento">Agrega evento</button>
        <label for="Enviar"><input type="submit" name="Enviar" id="Enviar"></label>
    </form>

</body>
</html>
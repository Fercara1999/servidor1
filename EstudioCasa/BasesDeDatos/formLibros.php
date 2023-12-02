<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Libros</title>
</head>
<body>

    <h1>Formulario de Libros</h1>

    <form action="./libreria.php" method="get">
        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" required><br>

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required><br>

        <label for="editorial">Editorial:</label>
        <input type="text" id="editorial" name="editorial" required><br>

        <label for="fecha_publicacion">Fecha de Publicación:</label>
        <input type="text" id="fecha_publicacion" name="fecha_publicacion" placeholder="Formato: AAAA-MM-DD" required><br>

        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" placeholder="Formato: 0.00" required><br>

        <input type="submit" value="Enviar">
    </form>

</body>
</html>
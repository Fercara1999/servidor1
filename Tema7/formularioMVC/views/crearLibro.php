<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Libro</title>
</head>
<body>
    <form action="" method="post">
        <label for="isbn">ISBN: <input type="number" name="isbn" id="isbn"></label><br>
        <label for="titulo">Título: <input type="text" name="titulo" id="titulo"></label><br>
        <label for="autor">Autor: <input type="text" name="autor" id="autor"></label><br>
        <label for="editorial">Editorial: <input type="text" name="editorial" id="editorial"></label><br>
        <label for="fechaLanzamiento">Fecha de Lanzamiento: <input type="date" name="fechaLanzamiento" id="fechaLanzamiento"></label><br>
        <label for="numeroPaginas">Número de Páginas: <input type="number" name="numeroPaginas" id="numeroPaginas"></label><br>
        <input type="submit" value="Guardar" id="guardarLibro" name="guardarLibro">
    </form>

</body>
</html>
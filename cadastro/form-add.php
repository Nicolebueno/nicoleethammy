<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Fazendinha do Amor</title>
    </head>
    <body>
        <h1>Sistema de Compra</h1>
        <h2>Sua comprinha <3 </h2>
        <form action="add.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name">
            <br><br>
            <label for="email">Cor: </label>
            <br>
            <input type="text" name="color" id="color">
            <br><br>
            Preço:
            <br>
            <input type="text" name="price" id="price">
          
            <br><br>
            <label for="startdate">Data de Entrada: </label>
            <br>
            <input type="text" name="startdate" id="startdate" placeholder="dd/mm/YYYY">
            <br><br>
             Quantidade:
            <br>
            <input type="number" name="quantity" id="quantity">
            <br><br>
            <input type="submit" value="Comprar">
        </form>
    </body>
</html>
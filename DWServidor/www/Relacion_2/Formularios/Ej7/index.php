<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 7</title>
  </head>

  <body>
    <h3>Vamos a calcular el total de una factura</h3>

    <form action="factura.php" method="post">
      <ul>
        <li>
          Gastos de la compra: <input type="number" name="gastos" id="gastos" />
        </li>
        <br />
        <li>Base imponible: <input type="number" name="baseimponible" id="baseimponible" /></li>
        <br />
        <button type="submit">Calcular factura</button>
      </ul>
    </form>
  </body>
</html>

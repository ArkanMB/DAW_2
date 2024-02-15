<?php

function esCapicua($numero)
{
  $numeroVolteado = strrev($numero);

  if ($numero == $numeroVolteado) {

    return "Es capicua";
  } else {

    return "No es capicua";
  };
};

function esPrimo($numero)
{
  for ($i = 2; $i < $numero; $i++) {
    if ($numero % $i == 0) {
      return "No es primo";
    };
  };
  return "Es primo";
};

function siguientePrimo($numero)
{
  $numero += 1;
  for ($i = 2; $i < $numero; $i++) {
    if ($numero % $i == 0) {
      $numero += 1;
    };
  };
  return $numero;
};

function potencia($base, $exponente)
{
  return $base ** $exponente;
}
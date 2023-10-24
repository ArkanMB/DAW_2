/* 
  dato.trim => elimina cualquier espacio en blanco al principio y al final de la cadena 'dato'

  .length => devuelve el número de caracteres de la cadena 'dato'

  La condicion 'dato.trim().length == 0' comprueba si la cadena está vacía

  Number.isNaN => se ultiliza para determinar si el valor NaN (No es un número)

  +dato => Intenta convertir el dato a un número

  Si 'dato' no es un número o está vacía, .isNaN devuelve true; entonces devuelve false

  Si 'dato' es un número válido entonces devuelve true;

*/

function esNumero(dato) {
  if (dato.trim().length == 0 || Number.isNaN(+dato)) {
    return false;
  } else {
    return true;
  }
}

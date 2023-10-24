/*

  Declaración de variables: tenemos dos formas de declararlas
    let => tiene un alcance de bloque, es decir que solo existe dentro del bloque donde fue declarada
    var => tiene un alcance global, es decir que existe en todo el programa

  POR DEFECTO SI NO PONEMOS TIPO DE VARIABLE SE CREA TIPO VAR!!

*/

// Ejemplo 1: en este caso hemos declarado una variable let numero que es 10 en el bloque principal
//            y luego hemos declarado una variable numero que es 20 dentro de un bloque condicional
//            Aunque lleven el mismo nombre, tienen valores diferentes, depende el bloque.
function ejemplo() {
  let numero = 10;

  if (true) {
    let numero = 20;
    console.log(numero); // Imprimimos numero por consola 'numero' = 20
  }

  console.log(numero); // Imprimimos numero por consola 'numero' = 10
}

// Ejemplo 2: en este caso hemos declarado una variable var numero que es 10 en el bloque principal
//            y luego hemos llamado a la variable numero ya declarada y le decimos que
//            es 20 dentro de un bloque condicional. Al imprimir numero veremos que tienen el
//            mismo valor.
function ejemplo2() {
  var numero = 10;

  if (true) {
    numero = 20;
    console.log(numero); // 20
  }

  console.log(numero); // 20
}

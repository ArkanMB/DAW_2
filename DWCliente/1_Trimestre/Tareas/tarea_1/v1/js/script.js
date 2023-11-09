"use strict";

// **ZONA DE VARIABLES**

const producto = document.getElementById("producto");
const precio = document.getElementById("precio");
const btnPrecio = document.getElementById("btnPrecio");

// **ZONA DE EVENTO**

// Escuchamos el evento `click` en el elemento DOM con el id `btnPrecio`
btnPrecio.addEventListener("click", () => {
  procesarPrecio();
});

// **ZONA DE FUNCIONES**

/**
 * La función `procesarPrecio()` se encarga de procesar el valor introducido en
 * el campo numerico `producto`.
 */
function procesarPrecio() {
  reset();

  let valor = parseInt(producto.value);

  if (isNaN(valor)) {
    // Si `isNaN(valor)` es true entonces imprime en el DOM un mensaje de error
    precio.textContent = "No has introducido nada, intentalo de nuevo";
  } else {
    // Si `isNaN(valor)` es false entonces imprime en el DOM el precio del producto introducido o el default.
    precio.textContent = valorProducto(valor);
  }
}

/*******************************************************************************/

/**
 * La función `reset()` se encarga de limpiar el contenido del elemento DOM con el id
 * `precio`.
 */
function reset() {
  precio.textContent = "";
}

/*******************************************************************************/

/**
 * La funcion `valorProducto()` se encarga de imprimir el precio, según el número introducido.
 */
function valorProducto(tipoValor) {
  let salida = "";

  switch (tipoValor) {
    case 1:
      salida = "El precio de televisiones, en general, es: 700€";
      break;
    
    case 2:
      salida = "El precio de informatica, en general, es: 1300€";
      break;
      
    case 3:
      salida = "El precio de telefonia, en general, es: 500€";
      break;
      
    case 4:
      salida = "El precio de electrodomesticos, en general, es: 650€";
      break;
      
    case 5:
      salida = "El precio de consolas, en general, es: 500€";
      break;
      
    case 6:
      salida = "El precio de smartwatches, en general, es: 300€";
      break;

    default:
      salida = "El producto que has introducido no esta en la lista. Vuelve a intentarlo. ";
      break;
  }

  return salida;
}

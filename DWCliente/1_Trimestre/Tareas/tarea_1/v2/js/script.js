"use strict";

// **ZONA DE VARIABLES**

const producto = document.getElementById("producto");
const precio = document.getElementById("precio");
const btnPrecio = document.getElementById("btnPrecio");

const listadoProductos = [
  { nombre: "televisiones", precio: "700€" },
  { nombre: "informatica", precio: "1300€" },
  { nombre: "telefonia", precio: "500€" },
  { nombre: "electrodomesticos", precio: "650€" },
  { nombre: "consolas", precio: "500€" },
  { nombre: "smartwatches", precio: "300€" },
];

// **ZONA DE EVENTO**

// Escuchamos el evento `click` en el elemento DOM con el id `btnPrecio`
btnPrecio.addEventListener("click", () => {
  procesarProducto();
});

// **ZONA DE FUNCIONES**

/**
 * La función `procesarProducto()` se encarga de procesar el valor introducido en
 * el campo de texto `producto`.
 */
function procesarProducto() {
  reset();

  let valor = producto.value;

  if (isEmpty(valor)) {
    // Si `isEmpty(valor)` es true entonces imprime en el DOM un mensaje de error
    precio.textContent = "No has introducido el producto, intentalo de nuevo";
  } else {
    // Si `isEmpty(valor)` es false entonces imprime en el DOM el precio del producto introducido
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
 * La funciíon `isEmpty()` se encarga de comprobar si el valor introducido en el campo
 * está vacio.
 */
function isEmpty(valor) {
  if (String(valor).length == 0) {
    return true;
  }

  return false;
}

/*******************************************************************************/

/**
 * La funcion `valorProducto()` se encarga de obtener el precio del producto correspondiente,
 * si no lo encuentra en la lista de productos devuelve un mensaje de error.
 */
function valorProducto(tipoProducto) {
  let salida = "";

  tipoProducto = tipoProducto.trim().toLowerCase();

  // La funcion `filter()` filtra en el array `listadoProductos` los productos que
  // coinciden con el tipo de producto introducido. Y los añade a un `arrayProductos`
  let arrayProductos = listadoProductos.filter(
    (producto) => producto.nombre === tipoProducto
  );

  // Si `arrayProductos` tiene al menos un elemento, el producto existe en la base de datos.
  if (arrayProductos.length > 0) {
    salida = 
    `El precio de ${arrayProductos[0].nombre}, en general, es:
    ${arrayProductos[0].precio}`;
  } else {
    salida =
      "El producto que has introducido no esta en la lista. Vuelve a intentarlo.";
  }

  return salida;
}

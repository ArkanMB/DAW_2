"use strict";

import * as funciones from "./imports/funciones.js";

// Variables de carga de DOM
const TablaCarrito = document.querySelector("#lista-carrito tbody");
const BotonVaciarCarrito = document.querySelector("#vaciar-carrito");
const ListaCursos = document.querySelector("#lista-cursos");

// Array para almacenar los cursos seleccionados
const ListaCursosSeleccionados = [];

// Variable de la ruta del json
const RutaCursos = "data/data.json";

// Funcion que muestra el JSON de forma dinámica
funciones.cursosJSON(RutaCursos, ListaCursos);

// Funciones de Local Storage
funciones.cargarCarritoLS(ListaCursosSeleccionados);
funciones.mostrarCarritoLS(TablaCarrito, ListaCursosSeleccionados);

/******************** LOS EVENTS LISTENERS ********************/

// Evento listener para agregar un curso seleccionado
ListaCursos.addEventListener("click", (Evento) => {
  funciones.agregarCursoSeleccionadoCarrito(
    Evento,
    TablaCarrito,
    ListaCursosSeleccionados
  );
});

// Evento listener para vaciar el carrito
BotonVaciarCarrito.addEventListener("click", () => {
  funciones.vaciarCarrito(TablaCarrito, ListaCursosSeleccionados);
});

// Evento listener para eliminar un curso del carrito
TablaCarrito.addEventListener("click", (Evento) => {
  funciones.eliminarCursoCarrito(
    Evento,
    TablaCarrito,
    ListaCursosSeleccionados
  );
});

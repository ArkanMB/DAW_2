"use strict";

/********************** FUNCIONES PARA MOSTRAR LOS CURSOS DEL JSON **********************/

// Funcion para ir creando y mostrando los cursos dinámicamente del JSON

export async function cursosJSON(RutaCursos, ListaCursos) {
  try {
    // Obtenemos la respuesta y los datos del JSON mediante fetch
    const Resultado = await fetch(RutaCursos);
    const Cursos = await Resultado.json();

    // Variable para crear un contenedor y una línea
    let ElementoLineaContenedor;

    // Iteramos sobre los cursos obtenidos
    Cursos.forEach(
      ({ src, title, author, previous_price, current_price, id }, index) => {
        // Creamos una nueva fila cada tres cursos
        if (index % 3 === 0) {
          ElementoLineaContenedor = document.createElement("div");
          ElementoLineaContenedor.classList.add("row");
          ListaCursos.appendChild(ElementoLineaContenedor);
        }
        // Creamos un contenedor para el curso utilizando la función auxiliar crearCurso
        const ContenedorCursos = crearCurso({
          src,
          title,
          author,
          previous_price,
          current_price,
          id,
        });

        // Agregamos los cursos a la fila actual
        ElementoLineaContenedor.appendChild(ContenedorCursos);
      }
    );
  } catch (Error) {
    console.error(`error ${Error}`);
  }
}

// Función auxiliar para crear el contenido de un curso
function crearCurso({ src, title, author, previous_price, current_price, id }) {
  // Creamos un contenedor div para el curso
  const ContenedorCursos = document.createElement("div");
  ContenedorCursos.classList.add("four", "columns");

  // Establecemos el contenido HTML y metemos los datos de los cursos iterados
  ContenedorCursos.innerHTML = `
  <div class = "card">
          <img src = "${src}" class = "imagen-curso u-full-width" />
          <div class = "info-card">
            <h4>${title}</h4>
            <p>${author}</p>
            <img src = "img/estrellas.png" />
            <p class = "precio">${previous_price} <span class = "u-pull-right">${current_price}</span></p>
            <a href = "#" class = "u-full-width button-primary button input agregar-carrito" data-id = "${id}">Agregar Al Carrito</a>
          </div>
        </div>
      `;

  // Devolvemos el contenedor del curso
  return ContenedorCursos;
}

/*********************** FUNCIONES DE LOCAL STORAGE ***********************/

// Cargamos los cursos almacenados en el Local Storage al array actual de cursos seleccionados
export function cargarCarritoLS(ListaCursosSeleccionados) {
  // Obtenemos los cursos del Local Storage.
  const CursosGuardadosLS = localStorage.getItem("CursosSeleccionados");
  // Si hay cursos, los agregamos al la lista (array) de curso seleccionados
  if (CursosGuardadosLS) {
    ListaCursosSeleccionados.push(...JSON.parse(CursosGuardadosLS));
  }
}

// Funcion que muestra los cursos almacenados en el LS en la tabla de carrito
export function mostrarCarritoLS(TablaCarrito, ListaCursosSeleccionados) {
  // Iteramos sobre los cursos alamcenados y vamos actualizando la tabla del carrito
  ListaCursosSeleccionados.forEach((Curso) => {
    // Los datos los pasamos primero por la funcion de incrementar contador para comprobar si
    // el curso ya existe en el carrito, si es asi incrementa contador, si no añade una nueva fila
    incrementarContadorCarrito(TablaCarrito, Curso[4], Curso);
  });
}

/******************** FUNCIONES PARA AGREGAR CURSO SELECCIONADO AL CARRITO ********************/

// Función para agrecar un curso seleccionado al carrito
export function agregarCursoSeleccionadoCarrito(
  Evento,
  TablaCarrito,
  ListaCursosSeleccionados
) {
  const ElementoClicado = Evento.target;

  // Verificamos si el elemento clicado tiene la clase "agregar-carrito"
  if (ElementoClicado.classList.contains("agregar-carrito")) {
    // Cojemos el ID del curso desde el atributo de datos
    const IdCurso = ElementoClicado.dataset.id;

    // Cojemos el contenedor del curso desde el elemento padre del elemento clicado.
    const ContenedorCurso = ElementoClicado.parentElement.parentElement;

    // Cojemos la información del curso.
    const Curso = infoCurso(ContenedorCurso);

    // Metemos el id del curso en el array 'Curso'
    Curso.push(IdCurso);

    // Agregamos el curso al array de cursos seleccionados
    ListaCursosSeleccionados.push(Curso);

    // Lo almacenamos la lista de cursos seleccionados en el local storage
    localStorage.setItem(
      "CursosSeleccionados",
      JSON.stringify(ListaCursosSeleccionados)
    );

    // Y terminamos pasandole la tabla del carrito, el id del curso para comprobar si ya esta creado
    // y incrementar su contador o crear una nueva fila con un curso nuevo
    incrementarContadorCarrito(TablaCarrito, IdCurso, Curso);
  }
}

// Función auxiliar para obtener la información de un curso desde su contenedor
function infoCurso(ContenedorCurso) {
  const ImagenCurso = ContenedorCurso.querySelector("img").src;
  const TituloCurso = ContenedorCurso.querySelector("h4").textContent;
  const AutorCurso = ContenedorCurso.querySelector("p").textContent;
  const PrecioActualCurso =
    ContenedorCurso.querySelector(".precio span").textContent;

  return [ImagenCurso, TituloCurso, AutorCurso, PrecioActualCurso];
}

// Funcion para incrementar el contador de un curso en la tabla del carrito o llamar a la funcion
// que añade una fila si son diferentes los cursos
function incrementarContadorCarrito(TablaCarrito, IdCurso, Curso) {
  // Busca si hay una fila con el id del curso, en la tabla del carrito
  const FilaExistente = TablaCarrito.querySelector(`tr[data-id="${IdCurso}"]`);

  // Vemos si existe esa fila con esa id
  if (FilaExistente) {
    // Obtenemos la referencia de donde esta el contador en la fila, en la cuarta columna exactamente
    const Contador = FilaExistente.querySelector("td:nth-child(4)");

    // Incrementamos el valor del contador uno mas
    Contador.textContent = Number(Contador.textContent) + 1;
  } else {
    // Si no existe la fila con ese id, la creamos, llamando a la funcion agregarNuevaFilaCarrito
    // enviandole la informacion del curso que queremos agregar a la tabla del carrito.
    const NuevaFilaCarrito = agregarNuevaFilaCarrito(Curso);

    // Agregamos esa nueva fila a la tabla del carrito.
    TablaCarrito.appendChild(NuevaFilaCarrito);
  }
}

function agregarNuevaFilaCarrito(Curso) {
  // Iniciamos las varibles con las posiciones que vamos a necesitar de nuestro array Curso
  // Lo hacemos con variables ya que es buenas practicas no usar numeros directamente
  const PosicionImagenCurso = 0;
  const PosicionTituloCurso = 1;
  const PosicionPrecioActualCurso = 3;
  const PosicionIdCurso = 4;

  // Creamos la variable en la alamcenaremos una nueva fila del carrito
  const NuevaFilaCarrito = document.createElement("tr");

  // Le añadimos el atributo data-id a la fila para comprobar a la hora de incrementar el contador
  // en la funcion incrementarContadorCarrito, le llamamos data-id ya que lo tenemos asi en el
  // enlace de agregar carrito.
  NuevaFilaCarrito.setAttribute("data-id", Curso[PosicionIdCurso]);

  // Creamos el contenido HTML de la nueva fila del carrito con la información del curso
  NuevaFilaCarrito.innerHTML = `
    <td>
      <img src = "${Curso[PosicionImagenCurso]}" width = "100">
    </td>
    <td>${Curso[PosicionTituloCurso]}</td>
    <td>${Curso[PosicionPrecioActualCurso]}</td>
    <td>1</td>
    <td>
      <a href = "#" class = "borrar-curso" data-id = "${Curso[PosicionIdCurso]}">X</a>
    </td>
    `;

  return NuevaFilaCarrito;
}

/******************** FUNCION PARA VACIAR EL CARRITO ********************/

export function vaciarCarrito(TablaCarrito, ListaCursosSeleccionados) {
  // Vaciamos la lista de cursos seleccionados
  ListaCursosSeleccionados.length = 0;

  // Vaciamos el local storage
  localStorage.clear;

  // Vaciamos la tabla del carrito
  TablaCarrito.innerHTML = "";
}

/******************** FUNCION PARA BORRAR UNO A UNO LOS CURSOS ********************/

// Función para eliminar un curso del carrito
export function eliminarCursoCarrito(
  Evento,
  TablaCarrito,
  ListaCursosSeleccionados
) {
  // Obtenemos el elemento que fue clicado durante el evento
  const ElementoClicado = Evento.target;

  // Verificamos si el elemento clicado tiene la clase "borrar-curso"
  if (ElementoClicado.classList.contains("borrar-curso")) {
    // Obtenemos el id del curso desde el atributo de datos id
    const IdCurso = ElementoClicado.dataset.id;

    // Definimos la posicion del id del curso en el array de cursos seleccionados
    const PosicionIdCurso = 4;

    // Buscamos el indice del curso en el array de cursos seleccionados con el id del curso
    const IndiceCurso = ListaCursosSeleccionados.findIndex(
      (Curso) => Curso[PosicionIdCurso] === IdCurso
    );

    // Verificamos si se encontró el curso en el array
    if (IndiceCurso !== -1) {
      // Eliminamos una ocurrencia del curso del array
      ListaCursosSeleccionados.splice(IndiceCurso, 1);

      // Actualizamos el almacenamiento local con el nuevo array de cursos
      localStorage.setItem(
        "CursosSeleccionados",
        JSON.stringify(ListaCursosSeleccionados)
      );

      // Buscamos la fila del curso en la tabla del carrito con el id del curso.
      const FilaCurso = TablaCarrito.querySelector(`tr[data-id="${IdCurso}"]`);

      // Obtenemos la referencia de donde esta el contador en la fila, en la cuarta columna exactamente.
      const Contador = FilaCurso.querySelector("td:nth-child(4)");

      // Si el contador es igual a 1 borra la fila entera si no elimina 1 del contandor
      if (Number(Contador.textContent) <= 1) {
        FilaCurso.remove();
      } else {
        Contador.textContent = Number(Contador.textContent) - 1;
      }
    }
  }
}

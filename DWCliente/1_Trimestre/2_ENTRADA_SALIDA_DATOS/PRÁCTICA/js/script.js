function saludo() {
  // Creamos una constante llamada nombre y va a ser igual a
  // lo que el usuario ingresa en el prompt (ventana emergente para introducir datos)
  const nombre = prompt("¿Cual es tu nombre?");

  // Mostramos en el html el nombre introducido por el usuario usando:
  //  document para referirse al html
  //  .querySelector para referirse al elemento con la clase contenido (que es donde se va a escribir el nombre)
  //  .innerHTML para escribir en el html
  //  Usamos tildes invertidas, para usasr la variable con dolar y llaves ${nombre}
  document.querySelector(".contenido").innerHTML = `Buenos dias ${nombre}`;
}

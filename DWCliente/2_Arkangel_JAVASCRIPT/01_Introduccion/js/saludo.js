function saludo() {
  const nombre = prompt("Cual es tu nombre?");
  document.querySelector(".contenido").innerHTML = `Buenos días, ${nombre}`;
}

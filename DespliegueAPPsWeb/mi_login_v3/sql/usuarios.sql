USE usuarios;

-- Eliminar la tabla si existe
DROP TABLE IF EXISTS `usuarios`;

-- Crear la nueva tabla con las modificaciones
CREATE TABLE `usuarios` (
  `usuario` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
  );

-- Confirmar los cambios
COMMIT;
CREATE TABLE usuario(
    usuario_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL,
    passwd VARCHAR(20) NOT NULL,
    telefono VARCHAR(20) NOT NULL

);

CREATE TABLE servicios(
    servicio_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    clave VARCHAR(50) NOT NULL,
    precio FLOAT(6,2),
    duracion_hrs FLOAT(6, 2),
    descripcion VARCHAR(250) NOT NULL
);

CREATE TABLE pedidos(
    pedidos_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT(11) NOT NULL,
    tecnico_id INT(11) NOT NULL,
    estatus CHAR(1) NOT NULL,
    folio CHAR(10) NOT NULL,
    fecha DATE NOT NULL,
    fecha_inicio_gral DATE NOT NULL,
    fecha_fin_gral DATE NOT NULL,
    horas_necesarias INT(11) NOT NULL,
    horas_trabajadas INT(11),
    importe FLOAT(15,2),
    notas VARCHAR(400),
    FOREIGN KEY(usuario_id) REFERENCES usuario(usuario_id),
    FOREIGN KEY(tecnico_id) REFERENCES tecnico(tecnico_id)

);

CREATE TABLE partidas_pedido(
    partidas_pedido_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pedidos_id INT(11) NOT NULL,
    servicio_id INT(11) NOT NULL,
    fecha_inicio DATE  NOT NULL,
    fecha_fin DATE  NOT NULL,
    estatus CHAR(1) NOT NULL,
    FOREIGN KEY(pedidos_id) REFERENCES pedidos(pedidos_id)  ON DELETE CASCADE,
    FOREIGN KEY(servicio_id) REFERENCES servicios(servicio_id)
);

CREATE TABLE tecnico(
    tecnico_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    numero_empleado VARCHAR(50),
    passwd VARCHAR(20)
);
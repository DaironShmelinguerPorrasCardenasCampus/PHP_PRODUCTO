
CREATE DATABASE supermarket;
USE supermarket;

CREATE Table categorias(
categoria_id INT PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(50) NOT NULL,
descripcion VARCHAR(80) NOT NULL,
imagen VARCHAR(250) NOT NULL
);

CREATE Table clientes(
cliente_id INT PRIMARY KEY AUTO_INCREMENT,
cliente_celular VARCHAR(50) NOT NULL,
cliente_compa VARCHAR(60) NOT NULL
);

CREATE Table empleados(
empleado_id INT PRIMARY KEY AUTO_INCREMENT,
nombre_empleado VARCHAR(50) NOT NULL,
celular_empleado VARCHAR(50) NOT NULL,
direccion_empleado VARCHAR(50) NOT NULL,
imagen_empleado VARCHAR(250) NOT NULL
);


CREATE TABLE facturas(
factura_id INT PRIMARY KEY AUTO_INCREMENT,
fac_empleado_id INT,
fac_cliente_id INT,
fecha DATETIME,
Foreign Key (fac_empleado_id) REFERENCES empleados(empleado_id),
Foreign Key (fac_cliente_id) REFERENCES clientes(cliente_id)

);

CREATE TABLE facturadetalle(
fac_detalle_id INT PRIMARY KEY AUTO_INCREMENT,
factura_id INT,
producto_id INT,
cantidad INT,
precio_venta INT,
Foreign Key (factura_id) REFERENCES facturas(factura_id),
Foreign Key (producto_id) REFERENCES productos(producto_id)
);

CREATE TABLE productos(
producto_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
pro_categoria_id INT,
precio_unitario FLOAT(50) NOT NULL,
stock INT(60) NOT NULL,
unidades_pedidas INT (60) NOT NULL,
pro_proveedor_id INT, 
nombre_producto VARCHAR(50) NOT NULL,
descontinuado ENUM("Si","No") NOT NULL,
Foreign Key (pro_categoria_id) REFERENCES categorias(categoria_id),
Foreign Key (pro_proveedor_id) REFERENCES proveedores(proveedor_id)



);

CREATE TABLE proveedores(
proveedor_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
nombre VARCHAR(60) NOT NULL,
telefono VARCHAR(60) NOT NULL,
ciudad VARCHAR(60) NOT NULL
);

CREATE TABLE rol(
id_rol INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
nombre_rol VARCHAR(50)
);

INSERT INTO rol (nombre_rol)
VALUES
    ('EMPLEADO'),
    ('USUARIO');

CREATE TABLE user(

id INT PRIMARY KEY AUTO_INCREMENT,
idRol INT NOT NULL,
email VARCHAR(100) NOT NULL,
username VARCHAR(80) NOT NULL,
password VARCHAR(100) NOT NULL,
Foreign Key (idRol) REFERENCES rol (id_rol)
);
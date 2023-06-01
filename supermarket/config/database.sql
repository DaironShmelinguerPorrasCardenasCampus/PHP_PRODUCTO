CREATE DATABASE supermarket;
USE supermarket;

CREATE Table categorias(
categoria_id INT PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(50) NOT NULL,
descripcion VARCHAR(80) NOT NULL,
imagen VARCHAR(80) NOT NULL
)

CREATE Table clientes(
cliente_id INT PRIMARY KEY AUTO_INCREMENT,
cliente_celular INT(50) NOT NULL,
cliente_compa VARCHAR(60) NOT NULL
)

CREATE Table empleados(
empleado_id INT PRIMARY KEY AUTO_INCREMENT,
nombre_empleado VARCHAR(50) NOT NULL,
celular_empleado INT(20) NOT NULL,
direccion_empleado VARCHAR(50) NOT NULL,
imagen_empleado VARCHAR(60) NOT NULL
)


CREATE TABLE facturas(
factura_id INT PRIMARY KEY AUTO_INCREMENT,
empleado_id INT,
cliente_id INT,
fecha DATETIME,
Foreign Key (empleado_id) REFERENCES empleados(empleado_id),
Foreign Key (cliente_id) REFERENCES clientes(cliente_id)

)

CREATE TABLE FacturaDetalle(
factura_id INT,
producto_id INT,
cantidad INT,
precio_venta INT,
Foreign Key (factura_id) REFERENCES facturas(factura_id),
Foreign Key (producto_id) REFERENCES productos(producto_id)
)

CREATE TABLE productos(
producto_id INT PRIMARY KEY NOT NULL,
categoria_id INT,
precio_unitario FLOAT(50) NOT NULL,
stock INT(60) NOT NULL,
unidades_pedidas INT (60) NOT NULL,
proveedor_id INT, 
nombre_producto VARCHAR(50) NOT NULL,
descontinuado ENUM("Si","No") NOT NULL,
Foreign Key (categoria_id) REFERENCES categorias(categoria_id),
Foreign Key (proveedor_id) REFERENCES proveedores(proveedor_id)



)

CREATE TABLE proveedores(
proveedor_id INT PRIMARY KEY NOT NULL,
nombre VARCHAR(60) NOT NULL,
telefono INT(50) NOT NULL,
ciudad VARCHAR(60) NOT NULL
)
# CRUD de Prueba para Tecnologías

Este proyecto es un CRUD básico diseñado para practicar el uso de tecnologías en el desarrollo de sistemas con bases de datos relacionales. Permite administrar usuarios, juegos y cuentas, donde la tabla `Cuenta` crea una relación de muchos a muchos entre `Usuario` y `Juego`.

## 📌 Características Principales

- Creación, lectura, actualización y eliminación (CRUD) de usuarios, juegos y cuentas.
- Gestión de relaciones entre usuarios y juegos.
- Un usuario puede tener varios juegos y un juego puede pertenecer a varios usuarios.

## 📂 Estructura de la Base de Datos

### **1. Usuario**

| Campo  | Tipo   | Descripción                     |
| ------ | ------ | ------------------------------- |
| id     | INT    | Identificador único del usuario |
| nombre | STRING | Nombre del usuario              |
| correo | STRING | Correo electrónico del usuario  |
| edad   | INT    | Edad del usuario                |

### **2. Juego**

| Campo  | Tipo   | Descripción                   |
| ------ | ------ | ----------------------------- |
| id     | INT    | Identificador único del juego |
| nombre | STRING | Nombre del juego              |
| imagen | STRING | URL de la imagen del juego    |

### **3. Cuenta** (Relación Usuario - Juego)

| Campo       | Tipo | Descripción                        |
| ----------- | ---- | ---------------------------------- |
| id          | INT  | Identificador único de la relación |
| usuario\_id | INT  | ID del usuario asociado            |
| juego\_id   | INT  | ID del juego asociado              |

## 📌 Tecnologías Utilizadas

- **Lenguaje de programación:** PHP
- **Framework:** Laravel
- **Base de datos:** MySQL

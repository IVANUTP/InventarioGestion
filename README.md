# 📦 Sistema de Gestión de Inventario

Aplicación web desarrollada con **Laravel** para la gestión de **categorías y productos**, que incluye autenticación de usuarios, operaciones CRUD y una interfaz limpia y responsiva.

---

## ✨ Funcionalidades

- Autenticación de usuarios (Login / Logout) con Laravel Breeze
- Gestión de categorías (Crear, Listar, Editar y Eliminar)
- Gestión de productos con relación a categorías
- Rutas protegidas mediante middleware de autenticación
- Alertas visuales para acciones del usuario
- Interfaz responsiva desarrollada con Tailwind CSS

---

## 🛠️ Requisitos del Sistema

- PHP >= 8.1
- Composer
- Node.js >= 18
- MySQL o base de datos compatible
- Git

---

## ⚙️ Instalación y Configuración

Ejecuta los siguientes comandos en orden:

```bash
git clone https://github.com/Usuario/InventarioGestion.git
cd InventarioGestion
composer install
npm install
npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan db:seed --class=CategoriaSeeder
php artisan db:seed --class=ProductoSeeder
php artisan storage:link
php artisan serve
```

---


## 🔐 Autenticación

- La autenticación del sistema fue implementada utilizando Laravel Breeze, lo cual proporciona:

- Inicio y cierre de sesión de usuarios

- Manejo seguro de sesiones

- Protección de rutas mediante middleware auth

- Estructura ligera y alineada a las buenas prácticas de Laravel

- Laravel Breeze fue elegido por ser una solución oficial, ligera y segura, ideal para proyectos pequeños y pruebas técnicas.

## 🖥️ Interfaces del Sistema

A continuación se muestran las principales pantallas del sistema de gestión de inventario:

### 🔐 Login



---

### 🏠 Dashboard
![Dashboard](screenshots/dashboard.png)

---

### 📂 Gestión de Categorías

#### 📋 Listado de Categorías
![Listado de Categorías](screenshots/categorias-listado.png)

#### ➕ Crear Categoría
![Crear Categoría](screenshots/categorias-crear.png)

#### ✏️ Editar Categoría
![Editar Categoría](screenshots/categorias-editar.png)

---

### 📦 Gestión de Productos

#### 📋 Listado de Productos
![Listado de Productos](screenshots/productos-listado.png)

#### ➕ Crear Producto
![Crear Producto](screenshots/productos-crear.png)

#### ✏️ Editar Producto
![Editar Producto](screenshots/productos-editar.png)





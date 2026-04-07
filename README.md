# 🚀 Sistema de Gestión de Ciudades - Examen Final Progra Web II

**Autor:** Marvin  
**Institución:** Universidad Privada Domingo Savio (UPDS)  
**Fecha:** Abril 2026

## 📋 Descripción del Proyecto
Plataforma web integral para la gestión de entidades geográficas (Ciudades) y administración de usuarios, implementando patrones de diseño modernos y despliegue automatizado en contenedores.

---

## 🛠️ Stack Tecnológico
* **Framework:** [CakePHP 5.x](https://cakephp.org/) (Strawberry)
* **Lenguaje:** **PHP 8.4.0** (Requerido por dependencias de Composer)
* **Base de Datos:** MariaDB 10.11 / MySQL
* **Infraestructura:** Podman / Container Desktop
* **Servidor Web:** Apache 2.4 con `mod_rewrite` activo
* **Control de Versiones:** Git (GitHub)

---

## 🏗️ Arquitectura de la Solución
El proyecto sigue el patrón **MVC (Modelo-Vista-Controlador)** con una capa de **Middleware** personalizada para la gestión de internacionalización (i18n).

### Componentes Clave (Criterios de Evaluación):
1.  **Capa de Datos (Criterio 1):** Modelos con validación estricta y asociaciones Table/Entity.
2.  **Lógica de Negocio (Criterio 2):** Controllers con persistencia de sesión unificada en `Auth.User`.
3.  **Seguridad (Criterio 3):** Control de acceso mediante login/logout y protección de rutas.
4.  **Multi-idioma (Criterio 4):** Soporte dinámico para `es_BO` y `en_US` basado en la preferencia del usuario guardada en la base de datos.
5.  **Gestión de Roles (Criterio 5):** Diferenciación de privilegios entre `admin` (gestión total) y `cliente` (acceso restringido).

---

## 💻 Guía de Instalación (Para clonar en otra PC)

Si desea ejecutar este proyecto en un entorno local diferente, siga estos pasos técnicos:

### 1. Clonar el Repositorio
```bash
git clone [https://github.com/tu-usuario/app_ef.git](https://github.com/tu-usuario/app_ef.git)
cd app_ef

2. Instalar Dependencias (Composer)

Es obligatorio generar la carpeta vendor/ para que el framework funcione correctamente:
Bash

composer install

3. Configuración de Base de Datos

    Cree una base de datos local (ej: app_ef).

    Genere su archivo de configuración local:
    cp config/app_local.example.php config/app_local.php

    Edite config/app_local.php con sus credenciales de base de datos (Host, User, Password).

    Importe el archivo SQL incluido en el repositorio para cargar la estructura y datos iniciales.

4. Despliegue con Contenedores

Si utiliza Podman o Docker, ejecute el orquestador en la raíz del proyecto para levantar el servidor Apache y MariaDB:
Bash

podman-compose up -d --build

El sistema estará disponible en http://localhost:8080.
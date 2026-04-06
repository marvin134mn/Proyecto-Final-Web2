# 🚀 Sistema de Gestión de Ciudades - Examen Final Progra Web II
**Autor:** Marvin  
**Institución:** Universidad Privada Domingo Savio (UPDS)  
**Fecha:** Abril 2026

## 📋 Descripción del Proyecto
Desarrollo de una plataforma web integral para la gestión de entidades geográficas (Ciudades) y administración de usuarios, implementando patrones de diseño modernos y despliegue automatizado en contenedores.

---

## 🛠️ Stack Tecnológico
* **Framework:** [CakePHP 5.x](https://cakephp.org/) (Strawberry)
* **Lenguaje:** **PHP 8.4.0** (Requerido por dependencias de Composer)
* **Base de Datos:** MariaDB 10.11
* **Infraestructura:** Podman / Container Desktop
* **Servidor Web:** Apache 2.4 con `mod_rewrite` activo
* **Control de Versiones:** Git (GitHub)

---

## 🏗️ Arquitectura de la Solución
El proyecto sigue el patrón **MVC (Modelo-Vista-Controlador)** con una capa de **Middleware** personalizada para la gestión de internacionalización (i18n).

### Componentes Clave:
1.  **Capa de Datos:** Modelos con validación estricta y asociaciones Table/Entity.
2.  **Lógica de Negocio:** Controllers con persistencia de sesión unificada en `Auth`.
3.  **Seguridad:** Control de acceso mediante login/logout y protección de rutas.
4.  **Multi-idioma (Criterio 4):** Soporte dinámico para `es_BO` y `en_US` basado en la preferencia del usuario guardada en la base de datos.

---

## 🚀 Guía de Despliegue (Entorno Linux / MiniOS)

El proyecto está configurado para desplegarse de forma automatizada mediante contenedores en la ruta: `/home/live/devops/app_ef/`.

### 1. Preparación del Entorno
Asegúrate de estar en el directorio raíz del proyecto donde se encuentran el `Dockerfile` y el `compose.yml`.

```bash
cd /home/live/devops/app_ef/
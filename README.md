# 🚀 Sistema de Gestión de Ciudades - Examen Final Progra Web II
**Autor:** Marvin  
**Institución:** Universidad Privada de Santa Cruz (UPDS)  
**Fecha:** Abril 2026

## 📋 Descripción del Proyecto
Desarrollo de una plataforma web integral para la gestión de entidades geográficas (Ciudades) y administración de usuarios, implementando patrones de diseño modernos y despliegue automatizado en contenedores.

---

## 🛠️ Stack Tecnológico
* **Framework:** [CakePHP 5.x](https://cakephp.org/) (Strawberry)
* **Lenguaje:** PHP 8.4.0 (Optimized Runtime)
* **Base de Datos:** MariaDB 10.11
* **Infraestructura:** Podman / Docker Compose
* **Servidor Web:** Apache 2.4 con `mod_rewrite` activo
* **Control de Versiones:** Git (GitHub)

---

## 🏗️ Arquitectura de la Solución
El proyecto sigue el patrón **MVC (Modelo-Vista-Controlador)** con una capa adicional de **Middleware** para la gestión de internacionalización (i18n).

### Componentes Clave:
1.  **Capa de Datos:** Migraciones y Seeds para la consistencia de la DB.
2.  **Lógica de Negocio:** Controllers optimizados para operaciones CRUD.
3.  **Seguridad:** Componente de Autenticación integrado para protección de rutas.
4.  **Multi-idioma:** Soporte nativo para `es_BO` y `en_US` mediante archivos de localización `.po`.

---

## 🚀 Guía de Despliegue (Entorno Linux/VM)

### 1. Clonar y Configurar
```bash
git clone git@github.com:marvin134mn/Proyecto-Final-Web2.git
cd Proyecto-Final-Web2
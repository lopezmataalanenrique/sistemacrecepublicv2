# Sistema CRECE

**CRECE** (por una vida valiosa y plena) es un sistema web concebido como herramienta telepsicológica para personas con padecimientos crónicos, mediante una intervención basada en la **Terapia de Aceptación y Compromiso (ACT)** con atención plena compasiva.

El proyecto es desarrollado en colaboración entre la **Escuela Superior de Cómputo (ESCOM) del IPN** y el **Laboratorio de Psicología e Innovación Tecnológica (LABPSIIT)** de la Facultad de Estudios Superiores Iztacala de la **UNAM**.

---

## Tabla de contenidos

1. [Requisitos previos](#requisitos-previos)
2. [Instalación](#instalación)
3. [Configuración del entorno](#configuración-del-entorno)
4. [Ejecución en desarrollo](#ejecución-en-desarrollo)
5. [Compilación para producción](#compilación-para-producción)
6. [Arquitectura del proyecto](#arquitectura-del-proyecto)
7. [Estructura de directorios](#estructura-de-directorios)
8. [Base de datos](#base-de-datos)
9. [Rutas de la aplicación](#rutas-de-la-aplicación)
10. [Flujo de usuario](#flujo-de-usuario)
11. [Cuestionarios clínicos](#cuestionarios-clínicos)
12. [Módulos de intervención](#módulos-de-intervención)
13. [Archivos multimedia](#archivos-multimedia)
14. [Tecnologías utilizadas](#tecnologías-utilizadas)
15. [Autores](#autores)

---

## Requisitos previos

Antes de comenzar, asegúrate de tener instalado lo siguiente:

| Herramienta | Versión requerida |
|---|---|
| **PHP** | 8.1.34 |
| **MySQL** | 8.0.45 |
| **Node.js** | Última versión LTS |
| **npm** | Incluido con Node.js |
| **Composer** | Última versión estable |

**Sistema operativo de desarrollo:** Debian 12 (Bookworm)

---

## Instalación

1. **Clonar el repositorio:**

   ```bash
   git clone https://github.com/lopezmataalanenrique/sistemaCRECE.git
   cd sistemaCRECE
   ```

2. **Instalar dependencias de PHP (Composer):**

   ```bash
   composer update
   ```

   Esto descargará las dependencias definidas en `composer.json` dentro de la carpeta `vendor/`:
   - `phpmailer/phpmailer` — Envío de correos electrónicos (confirmación de cuenta, recuperación de contraseña).
   - `vlucas/phpdotenv` — Carga de variables de entorno desde el archivo `.env`.

3. **Instalar dependencias de Node.js:**

   ```bash
   npm install
   ```

   Esto instalará las herramientas de desarrollo definidas en `package.json`:
   - `gulp` — Automatización de tareas.
   - `sass` / `gulp-sass` — Compilación de archivos SCSS a CSS.
   - `gulp-terser` — Minificación de JavaScript.
   - `sharp` — Procesamiento y optimización de imágenes (WebP, AVIF).

---

## Configuración del entorno

La aplicación utiliza un archivo `.env` ubicado en `includes/.env` para almacenar credenciales y datos sensibles. Este archivo **no se sube al repositorio** (está en `.gitignore`).

Crea el archivo `includes/.env` con la siguiente estructura:

```env
DB_HOST = localhost
DB_USER = tu_usuario_mysql
DB_PASS = tu_contraseña_mysql
DB_NAME = crece

EMAIL_HOST = tu_servidor_smtp
EMAIL_PORT = 465
EMAIL_USER = tu_usuario_smtp
EMAIL_PASS = tu_contraseña_smtp

PROJECT_URL = http://localhost:3000
```

### Variables de entorno

| Variable | Descripción |
|---|---|
| `DB_HOST` | Host del servidor MySQL |
| `DB_USER` | Usuario de la base de datos |
| `DB_PASS` | Contraseña de la base de datos |
| `DB_NAME` | Nombre de la base de datos (`crece`) |
| `EMAIL_HOST` | Servidor SMTP para el envío de correos |
| `EMAIL_PORT` | Puerto del servidor SMTP |
| `EMAIL_USER` | Usuario de autenticación SMTP |
| `EMAIL_PASS` | Contraseña de autenticación SMTP |
| `PROJECT_URL` | URL base del proyecto (usada en enlaces de correos de confirmación y recuperación) |

---

## Ejecución en desarrollo

Se requieren **dos procesos simultáneos** para el entorno de desarrollo:

### 1. Servidor PHP integrado

```bash
php -S localhost:3000
```

Esto inicia el servidor de desarrollo de PHP en el puerto 3000. El punto de entrada es `public/index.php`.

### 2. Compilador de assets (SASS, JS e imágenes)

```bash
npm run dev
```

Este comando ejecuta `gulp` en modo watch, que:
- Compila los archivos SCSS de `src/scss/` a CSS minificado en `public/build/css/`.
- Minifica los archivos JavaScript de `src/js/` a `public/build/js/`.
- Procesa las imágenes de `src/img/` generando versiones optimizadas en formatos WebP y AVIF en `public/build/img/`.

La aplicación estará disponible en: **http://localhost:3000**

---

## Compilación para producción

Para generar los assets optimizados para producción (sin modo watch):

```bash
npm run build
```

Esto ejecuta `gulp build`, que compila CSS, minifica JS y optimiza imágenes en una sola pasada.

---

## Arquitectura del proyecto

El sistema utiliza el patrón de diseño **Modelo-Vista-Controlador (MVC)** implementado de forma manual (sin framework):

```
                    ┌──────────────┐
  Petición HTTP ──> │  Router.php  │
                    └──────┬───────┘
                           │
                    ┌──────▼───────┐
                    │ Controlador  │  (controllers/)
                    └──────┬───────┘
                           │
               ┌───────────┼───────────┐
               │                       │
        ┌──────▼───────┐        ┌──────▼───────┐
        │    Modelo     │        │    Vista      │
        │  (models/)    │        │  (views/)     │
        └──────┬───────┘        └──────────────┘
               │
        ┌──────▼───────┐
        │   MySQL DB   │
        └──────────────┘
```

### Componentes principales

- **`Router.php`** — Enrutador personalizado que mapea URLs a métodos de controladores. Soporta rutas GET y POST.
- **`public/index.php`** — Punto de entrada de la aplicación. Define todas las rutas y arranca el Router.
- **`includes/app.php`** — Bootstrap: carga el autoloader de Composer, variables de entorno y conexión a la base de datos.
- **`includes/database.php`** — Establece la conexión a MySQL usando `mysqli`.
- **`includes/funciones.php`** — Funciones auxiliares (`debuguear()` para depuración, `s()` para sanitización HTML).

### Autoloading (PSR-4)

El proyecto utiliza autoloading PSR-4 configurado en `composer.json`:

| Namespace | Directorio |
|---|---|
| `MVC\` | `./` (raíz del proyecto) |
| `Controllers\` | `./controllers` |
| `Model\` | `./models` |
| `Classes\` | `./classes` |

---

## Estructura de directorios

```
sistemaCRECE/
├── classes/                    # Clases auxiliares
│   └── Correo.php              #   Envío de correos (PHPMailer)
├── controllers/                # Controladores MVC
│   ├── CreceController.php     #   Panel de módulos y actividades
│   ├── CuestionarioController.php  #   Cuestionarios clínicos
│   ├── LoginController.php     #   Autenticación y registro
│   └── ResultadosController.php    #   Resultados de evaluación
├── includes/                   # Configuración y utilidades
│   ├── .env                    #   Variables de entorno (NO versionado)
│   ├── app.php                 #   Bootstrap de la aplicación
│   ├── database.php            #   Conexión a MySQL
│   └── funciones.php           #   Funciones auxiliares
├── models/                     # Modelos (ActiveRecord)
│   ├── ActiveRecord.php        #   Clase base ORM
│   ├── Encuesta.php            #   Tabla: encuestas_usuario
│   ├── ProgresoModulo.php      #   Tabla: progreso_modulos
│   ├── Respuesta.php           #   Tabla: respuestas
│   ├── RespuestaActividad.php  #   Tabla: respuestas_actividades
│   └── Usuario.php             #   Tabla: usuarios
├── public/                     # Archivos públicos (document root)
│   ├── index.php               #   Punto de entrada y definición de rutas
│   └── build/                  #   Assets compilados
│       ├── css/                #     CSS compilado desde SCSS
│       ├── js/                 #     JavaScript minificado
│       ├── img/                #     Imágenes optimizadas
│       ├── audio/              #     Archivos de audio (NO versionado)
│       └── video/              #     Archivos de video (NO versionado)
├── src/                        # Código fuente de assets
│   ├── scss/                   #   Archivos SCSS (estilos)
│   │   ├── app.scss            #     Archivo principal (imports)
│   │   ├── base/               #     Variables, tipografía, resets
│   │   ├── layout/             #     Estructura general
│   │   ├── componentes/        #     Componentes reutilizables
│   │   ├── auth/               #     Estilos de autenticación
│   │   └── crece/              #     Estilos de módulos CRECE
│   ├── js/                     #   JavaScript fuente
│   │   └── app.js              #     Lógica principal (carrusel, equipo, accesibilidad)
│   └── img/                    #   Imágenes originales
├── views/                      # Vistas PHP
│   ├── layout.php              #   Layout principal (HTML base)
│   ├── inicio.php              #   Página de inicio (landing)
│   ├── auth/                   #   Vistas de autenticación
│   ├── crece/                  #   Panel de módulos y resultados
│   ├── cuestionarios/          #   Cuestionarios clínicos
│   ├── modulos/                #   Módulos de intervención (1-7)
│   └── templates/              #   Componentes parciales (alertas)
├── Router.php                  # Enrutador del sistema
├── composer.json               # Dependencias PHP
├── package.json                # Dependencias Node.js
├── gulpfile.js                 # Configuración de Gulp (tareas de build)
└── .gitignore                  # Archivos excluidos del repositorio
```

---

## Base de datos

El sistema utiliza **MySQL 8.0.45** con las siguientes tablas principales:

### Tablas del sistema

| Tabla | Descripción | Columna ID |
|---|---|---|
| `usuarios` | Registro de usuarios con datos personales, credenciales y estatus | `id_usuario` |
| `encuestas_usuario` | Cabecera de cada encuesta/cuestionario aplicado a un usuario | `id_encuesta` |
| `respuestas` | Respuestas individuales de cada pregunta de los cuestionarios | `id_respuesta` |
| `progreso_modulos` | Progreso del usuario en cada módulo de intervención | `id_progreso` |
| `respuestas_actividades` | Respuestas a las actividades dentro de los módulos | `id_res_act` |
| `cat_modulos` | Catálogo de módulos (nombre, descripción) | `id_modulo` |

### ORM: ActiveRecord

El proyecto implementa un ORM personalizado (`ActiveRecord.php`) que provee:

- **CRUD completo:** `guardar()`, `crear()`, `actualizar()`, `eliminar()`
- **Consultas:** `find($id)`, `where($columna, $valor)`, `all()`, `get($limite)`
- **Transacciones:** Soporte para `begin_transaction()`, `commit()`, `rollback()`
- **Sanitización:** Escape automático de datos con `mysqli::escape_string()`
- **Soporte NULL:** Manejo correcto de valores `NULL` en inserciones y actualizaciones

### Estatus de usuario

| ID | Estatus | Descripción |
|---|---|---|
| 1 | Evaluación inicial | Usuario recién registrado, completando cuestionarios |
| 2 | Riesgo detectado | Riesgo suicida detectado en cuestionario MINI |
| 3 | Activo | Usuario que completó la evaluación y accede a los módulos |
| 5 | Canalizado (menor) | Menor de 18 años, datos anonimizados |
| 6 | Canalizado (tratamiento) | Usuario en tratamiento psiquiátrico/psicológico activo |

---

## Rutas de la aplicación

### Rutas públicas (autenticación)

| Método | Ruta | Controlador | Descripción |
|---|---|---|---|
| GET/POST | `/` | `LoginController::inicio` | Página principal (landing) |
| GET/POST | `/login` | `LoginController::login` | Inicio de sesión |
| GET | `/logout` | `LoginController::logout` | Cerrar sesión |
| GET/POST | `/olvide` | `LoginController::olvide` | Solicitar recuperación de contraseña |
| GET/POST | `/recuperar` | `LoginController::recuperar` | Restablecer contraseña (con token) |
| GET/POST | `/crear-cuenta` | `LoginController::crear` | Registro de nuevo usuario |
| GET | `/confirmar-cuenta` | `LoginController::confirmar` | Confirmar cuenta (con token por email) |
| GET | `/mensaje` | `LoginController::mensaje` | Mensaje de confirmación post-registro |
| GET | `/menorEdad` | `LoginController::menorEdad` | Aviso para menores de 18 años |
| GET | `/tipoTratamiento` | `LoginController::tipoTratamiento` | Aviso de canalización por tratamiento |
| GET | `/canalizacion` | `LoginController::canalizacion` | Aviso de canalización por riesgo |

### Rutas protegidas (cuestionarios clínicos)

| Método | Ruta | Controlador | Cuestionario |
|---|---|---|---|
| GET/POST | `/c-sociodemografico` | `CuestionarioController::sociodemografico` | Datos sociodemográficos |
| GET/POST | `/c-pss-10` | `CuestionarioController::pss10` | Escala de Estrés Percibido (PSS-10) |
| GET/POST | `/c-mini` | `CuestionarioController::mini` | Entrevista Neuropsiquiátrica (MINI) |
| GET/POST | `/c-phq-9` | `CuestionarioController::phq9` | Cuestionario de Salud del Paciente (PHQ-9) |
| GET/POST | `/c-gad-7` | `CuestionarioController::gad7` | Escala de Ansiedad Generalizada (GAD-7) |
| GET/POST | `/c-aaq-ii` | `CuestionarioController::aaqii` | Aceptación y Acción (AAQ-II) |
| GET/POST | `/c-who-5` | `CuestionarioController::who5` | Bienestar de la OMS (WHO-5) |
| GET/POST | `/c-scs` | `CuestionarioController::scs` | Escala de Autocompasión (SCS) |
| GET/POST | `/c-whoqol-bref` | `CuestionarioController::whoqolbref` | Calidad de Vida de la OMS (WHOQOL-BREF) |
| GET/POST | `/c-apoi` | `CuestionarioController::apoi` | Actitudes hacia intervenciones en línea (APOI) |
| GET/POST | `/c-maas` | `CuestionarioController::maas` | Atención Plena (MAAS) |

### Rutas protegidas (módulos e intervención)

| Método | Ruta | Controlador | Descripción |
|---|---|---|---|
| GET/POST | `/resultados-iniciales` | `ResultadosController::resultadosIniciales` | Resultados de la evaluación inicial |
| GET | `/panel-modulos` | `CreceController::panel` | Panel principal con los 7 módulos |
| GET/POST | `/modulo1` a `/modulo7` | `CreceController::modulo1-7` | Contenido de cada módulo |
| GET/POST | `/guardar-actividad` | `CreceController::guardarActividad` | Guardar respuesta de actividad |

---

## Flujo de usuario

```
1. Landing Page (/)
   │
2. Crear Cuenta (/crear-cuenta)
   │
   ├── ¿Menor de 18 años? ──> Canalización (/menorEdad) [Estatus 5]
   ├── ¿En tratamiento psiquiátrico? ──> Canalización (/tipoTratamiento) [Estatus 6]
   │
3. Confirmación por Email (/confirmar-cuenta)
   │
4. Inicio de Sesión (/login)
   │
5. Cuestionarios de evaluación inicial (secuenciales):
   │  Sociodemográfico → PSS-10 → MINI → PHQ-9 → GAD-7
   │  → AAQ-II → WHO-5 → SCS → WHOQOL-BREF → MAAS → APOI
   │
   ├── ¿Riesgo suicida detectado (MINI)? ──> Canalización [Estatus 2]
   │
6. Resultados Iniciales (/resultados-iniciales)
   │
7. Panel de Módulos (/panel-modulos) [Estatus 3]
   │
8. Módulos de Intervención 1-7 (con actividades interactivas)
```

### Seguridad y tokens

- Los tokens de confirmación y recuperación de contraseña **caducan a las 48 horas**.
- Las contraseñas se almacenan con **bcrypt** (`password_hash` / `password_verify`).
- Las contraseñas requieren: mínimo 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.
- Los usuarios canalizados (Estatus 6) tienen un período de espera de **4 meses** antes de poder re-registrarse.

---

## Cuestionarios clínicos

El sistema aplica una batería de instrumentos psicológicos validados como evaluación inicial:

| # | Instrumento | Descripción | Lógica especial |
|---|---|---|---|
| 1 | Sociodemográfico | 22 preguntas sobre datos personales y clínicos | Todas obligatorias |
| 2 | PSS-10 | Escala de Estrés Percibido (10 reactivos) | Inversión de ítems 4, 5, 7, 8 |
| 3 | MINI | Entrevista Neuropsiquiátrica Internacional (6 reactivos) | Detección de riesgo suicida → canalización |
| 4 | PHQ-9 | Cuestionario de Salud del Paciente | Depresión |
| 5 | GAD-7 | Escala de Ansiedad Generalizada | Ansiedad |
| 6 | AAQ-II | Cuestionario de Aceptación y Acción | Flexibilidad psicológica |
| 7 | WHO-5 | Índice de Bienestar de la OMS | Puntaje × 4 (escala 0-100) |
| 8 | SCS | Escala de Autocompasión | Puntaje ÷ 26 (promedio) |
| 9 | WHOQOL-BREF | Calidad de Vida de la OMS | 4 dominios: físico, psicológico, social, ambiental |
| 10 | MAAS | Escala de Atención Plena | Mindfulness |
| 11 | APOI | Actitudes hacia Intervenciones en Línea | Aceptabilidad |

---

## Módulos de intervención

Una vez completada la evaluación inicial, el usuario accede a **7 módulos de intervención** basados en ACT (Terapia de Aceptación y Compromiso):

| Módulo | Estado inicial |
|---|---|
| Módulo 1 | Disponible |
| Módulo 2 | Disponible |
| Módulo 3 | Disponible |
| Módulo 4 | Disponible |
| Módulos 5-7 | Bloqueados (se desbloquean con el progreso) |

Cada módulo contiene múltiples actividades interactivas. El progreso se guarda automáticamente y se rastrea en la tabla `progreso_modulos`.

---

## Archivos multimedia

Los archivos de audio y video se almacenan en:

```
public/build/audio/     # Archivos de audio
public/build/video/     # Archivos de video
```

Estos directorios están incluidos en `.gitignore` para evitar que archivos pesados se suban al repositorio. **Deben copiarse manualmente** al entorno de despliegue.

---

## Tecnologías utilizadas

### Backend
- **PHP 8.1.34** — Lenguaje del servidor
- **MySQL 8.0.45** — Base de datos relacional
- **Composer** — Gestor de dependencias PHP
- **PHPMailer 7.x** — Envío de correos electrónicos
- **phpdotenv 5.x** — Gestión de variables de entorno

### Frontend
- **HTML5 / CSS3** — Estructura y estilos
- **Bootstrap 5.3.8** — Framework CSS (CDN)
- **SASS (SCSS)** — Preprocesador CSS
- **JavaScript (ES Modules)** — Lógica del cliente
- **Google Fonts** — Tipografías Lato y Poppins

### Herramientas de desarrollo
- **Node.js (LTS)** — Entorno de ejecución para herramientas de build
- **Gulp 5** — Automatización de tareas
- **Sharp** — Procesamiento de imágenes (WebP, AVIF)
- **Terser** — Minificación de JavaScript
- **Debian 12 (Bookworm)** — Sistema operativo de desarrollo

---

## Autores

- **Alan Enrique López Mata** — Desarrollo del sistema web (ESCOM - IPN)
- **Joselyn Guadalupe Mireles Silvestre** — Co-autora

### Equipo de investigación psicológica (LABPSIIT - UNAM)

- Dra. Anabel de la Rosa Gómez — Investigadora, Fundadora LABPSIIT
- Dra. Lorena A. Flores Plata — Investigadora, Coordinadora LABPSIIT
- Lic. Griselda Suzán Montoya — Licenciada en Psicología
- Lic. Stephanie Cortés Abad — Colaboradora LABPSIIT
- Mtro. Javier D. Ríos Castillo — Investigador
- Lic. Zuleyca Pérez Martínez — Licenciada en Psicología
- Lic. Nayeli de la Rosa — Colaboradora

---

## Licencia

Proyecto académico desarrollado en el marco de colaboración IPN-UNAM. Todos los derechos reservados. 

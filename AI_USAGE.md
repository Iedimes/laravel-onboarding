# Guía de Desarrollo Asistido por IA (AI_USAGE.md)

Este documento define las reglas de juego, el stack tecnológico y las convenciones del repositorio para que cualquier Asistente de IA (e ingenieros de desarrollo) mantengan el código consistente, seguro y testeable.

---

## 🛠️ Stack Tecnológico del Proyecto

- **Framework:** Laravel 10.x
- **PHP Version:** PHP 8.2 (compatible con `^8.1` declarado en `composer.json`)
- **Base de Datos:** SQLite (para desarrollo local y pruebas automatizadas)
- **Front-end:** Vite & npm (para gestión de assets)
- **Linter/Code Style:** Laravel Pint
- **Testing Framework:** PHPUnit

---

## 🚀 Flujo de Git y Ciclo de Vida (SDLC)

Cualquier cambio en el código debe seguir estrictamente este flujo de trabajo:

1. **No escribir en `main`:** Está prohibido hacer commits y push directos a la rama `main`.
2. **Crear ramas descriptivas:** Las nuevas ramas se deben crear a partir de `main` con prefijos:
   - `feat/nombre-tarea` (para nuevas características)
   - `fix/nombre-tarea` (para corregir fallos)
   - `refactor/nombre-tarea` (para mejoras en el código sin cambiar comportamiento)
3. **Calidad antes de subir:** Antes de realizar un `push` de la rama, es obligatorio correr los tests locales y el corrector de estilo:
   - `php artisan test`
   - `php vendor/bin/pint --test` (o `./vendor/bin/pint --test` en Unix)
4. **Pull Requests (PR):**
   - Subir la rama a GitHub y crear un Pull Request apuntando a `main`.
   - Esperar a que el flujo de integración continua (**Laravel CI** en GitHub Actions) termine y dé un resultado exitoso (check verde ✅).
   - Mezclar el Pull Request y luego borrar la rama local y remota.

---

## 🤖 Reglas de Comportamiento para la IA

Cuando el desarrollador interactúe con una IA para generar o modificar código:

- **Escribir Pruebas Siempre:** Cada nueva ruta, controlador o lógica de negocio compleja debe estar acompañada de sus correspondientes pruebas (Feature o Unit tests) en la carpeta `tests/`.
- **Estilo de Código:** El código generado debe cumplir con las directrices estéticas de Laravel. Corre siempre `vendor/bin/pint` para dar formato de forma automática.
- **Mantener comentarios existentes:** Respeta los comentarios y docstrings originales a menos que el desarrollador pida explícitamente reescribirlos.
- **SQLite Compatibility:** Asegúrate de que las migraciones y consultas a base de datos sean totalmente compatibles con SQLite (base de datos por defecto para testing).
- **Proceso en 3 pasos:** Para cambios complejos, la IA siempre debe proponer un **Documento de Requisitos (PRD)** y luego un **Plan de Implementación** antes de modificar cualquier archivo de código.

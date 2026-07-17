# 🛠️ Guía de Onboarding Laravel: Setup Paso a Paso

Esta guía te guiará para poner en marcha el proyecto de Laravel Onboarding, ejecutar pruebas locales y configurar la Integración Continua (CI).

## Requisitos Previos

Asegúrate de contar con las siguientes herramientas en tu sistema local (ej. Wamp64 en Windows o Laravel Valet en macOS):
- **PHP 8.2** (o superior)
- **Composer** (gestor de dependencias de PHP)
- **Git**

---

## Paso 1 · Verificar Entorno Local

Abre una terminal y ejecuta los siguientes comandos para confirmar que tus versiones son correctas:

```bash
# Verificar la versión de PHP
php -v

# Verificar la versión de Composer
composer -V

# Verificar la versión de Git
git --version
```

---

## Paso 2 · Clonar el Proyecto y Preparar Dependencias

Si no has clonado el repositorio:

```bash
git clone https://github.com/Iedimes/laravel-onboarding.git
cd laravel-onboarding
```

Instala todas las dependencias requeridas del proyecto usando Composer:

```bash
composer install
```

---

## Paso 3 · Configurar Variables de Entorno y Clave de la App

Copia el archivo `.env.example` para crear tu entorno local `.env`:

```bash
cp .env.example .env
```

Genera la clave única de encriptación para tu aplicación Laravel:

```bash
php artisan key:generate
```

---

## Paso 4 · Levantar el Servidor Local y Probar el Ejemplo

Laravel incluye un servidor de desarrollo integrado. Levántalo con:

```bash
php artisan serve
```

Por defecto, la aplicación estará disponible en `http://127.0.0.1:8000`. 
Hemos preparado un endpoint de saludo sencillo para probar el funcionamiento de la API. Pruébalo accediendo a:

```
http://127.0.0.1:8000/api/greeting
```

Deberías recibir una respuesta JSON como esta:
```json
{
  "status": "success",
  "message": "¡Hola! Laravel está funcionando correctamente."
}
```

---

## Paso 5 · Ejecutar Pruebas Locales y Linter de Código

Antes de subir cambios, valida que todo funciona correctamente:

### Ejecutar Tests
Corre la suite de pruebas unitarias y de integración:
```bash
php artisan test
```

### Validar Estilo de Código (Linter)
Laravel Pint se utiliza para mantener el código limpio y formateado bajo los estándares PSR-12.
```bash
# Validar si hay errores de formato
php artisan pint --test

# Corregir el formato automáticamente
php artisan pint
```

---

## Paso 6 · Crear tu Rama de Trabajo y Subir Cambios para el PR

Para trabajar de manera limpia, creamos una rama exclusiva para este Onboarding:

```bash
# Crear y cambiar a la rama de características
git checkout -b feat/onboarding-laravel

# Agregar los archivos correspondientes
git add .

# Hacer commit de los cambios
git commit -m "docs: setup inicial y flujo de CI configurado"

# Subir los cambios a tu repositorio en GitHub
git push origin feat/onboarding-laravel
```

---

## Paso 7 · Abrir un Pull Request y Verificar el CI

1. Ve a tu repositorio en GitHub: `https://github.com/Iedimes/laravel-onboarding`.
2. Verás un banner sugiriendo crear un Pull Request desde tu rama recién subida `feat/onboarding-laravel` hacia `main`. Haz clic en él.
3. Coloca un título descriptivo y crea el PR.
4. El pipeline de **GitHub Actions** (CI) se disparará automáticamente corriendo las pruebas unitarias y el linter (`Pint`).
5. Espera unos minutos y asegúrate de que todos los checks terminen en verde (✅).

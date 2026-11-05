# Implementation Plan - Selección de Temas: Claro (Default), Oscuro y Sistema

**Fecha:** 2026-11-04 18:55  
**Objetivo:** Implementar un selector de temas en el frontend que soporte tema Claro (predeterminado), Oscuro y Sistema, con persistencia en `localStorage`, prevención de parpadeo (FOUC), reactividad en tiempo real y compatibilidad con Tailwind CSS v4.

---

## 1. Requerimientos y Alcance

1. **Opciones de Tema:**
   - **Claro (`light`):** Tema visual con fondos claros y textos de alto contraste. Es el **tema por defecto**.
   - **Oscuro (`dark`):** Tema de alta fidelidad para ambientes de baja luminosidad (paleta Slate 900 / 950 con acentos ámbar y esmeralda).
   - **Sistema (`system`):** Detección automática de la preferencia del sistema operativo o navegador (`prefers-color-scheme: dark`) y actualización reactiva al cambiar las preferencias del SO.

2. **Persistencia y Prevención de FOUC (Flash of Unstyled Content):**
   - Script síncrono en el `<head>` de `layouts/app.blade.php` antes del renderizado del DOM:
     - Lee `localStorage.getItem('theme')` (valor por defecto: `'light'`).
     - Si es `'dark'`, aplica la clase `.dark` a `document.documentElement`.
     - Si es `'system'`, evalúa `window.matchMedia('(prefers-color-scheme: dark)').matches` y aplica/retira `.dark`.
     - Si es `'light'`, retira `.dark`.
   - Event listener sobre `matchMedia` para responder dinámicamente cuando el usuario tenga seleccionado `'system'` y el SO cambie de modo.

3. **Selector UI en el Frontend:**
   - Componente interactivo con Alpine.js integrado en el navbar (versión de escritorio y menú móvil).
   - Menú dropdown accesible o grupo de botones con íconos vectoriales SVG:
     - ☀️ Claro (Sol)
     - 🌙 Oscuro (Luna)
     - 💻 Sistema (Monitor)
   - Indicador visual del tema activo.

4. **Estilos Tailwind CSS v4 Dark Mode:**
   - Configurar `@custom-variant dark (&:where(.dark, .dark *));` en `resources/css/app.css`.
   - Aplicar clases `dark:` en:
     - Layout global (`layouts/app.blade.php`): body, header, nav, dropdowns, drawer móvil.
     - Landing page (`pages/home.blade.php`): barras de confianza, tarjetas de los 4 pilares, catálogo destacado, testimonios y acordeón de FAQs.
     - Catálogo (`pages/catalog.blade.php`): barra de filtros, buscador y tarjetas de productos.
     - Páginas de soluciones (`pages/service-detail.blade.php`), contacto (`pages/contact.blade.php`) y legales (`privacy.blade.php`, `terms.blade.php`).

5. **Verificación y Pruebas:**
   - Recompilar assets de Vite (`npm run build`).
   - Agregar pruebas en `tests/Feature/SiteTest.php` verificando la presencia del script de inicialización de tema y controles UI.
   - Ejecutar la suite completa con `php artisan test`.

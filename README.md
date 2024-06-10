# TP 3 LARAVEL

![Logo de la App](./public/img/logoGrupo.png)

Esta es una aplicacion web desarrollada en React donde fue diseañada una home page
que va a mostrar varias cards con informacion de autos (la cual es sacada de un archivo .json),
luego se puede seleccionar una para mostrar mas detalles del auto.

Fue diseñado como Trabajo practico numero 2 de la materia
"Programacion Web Avanzada" de la carrera universitaria en
desarrollo web, en la facultad nacional del comahue (UNCO).

## Vista de Post

![Captura de home 1](./src/assets/home1.jpg)
![Captura de home 2](./src/assets/home2.jpg)

## Vista de crear nuevo Post

![Captura de detalles](./src/assets/detalles1.jpg)

## Vista de editar Post

img

## Instalación
1. Instala Node.js
    - Si no tenes instalado node.js descargalo de este link: [Nodejs](https://nodejs.org/en/download).

2. Instalar Php Composer
    - Se puede instalar mediante el siguiente link: [Composer](https://getcomposer.org/download/).

3. Clona el repositorio:
    - Usa este comando en la terminal de tu IDE: ```git clone https://github.com/Julian-Alcaraz/myblog```.

4. Se necesita un Servidor de base de datos instalado.

5. Entrar a la direccion desde la terminal.
    - Utiliza el comando "cd" hasta entrar a la carpeta que contiene al repositorio, luego escribe ```cd myblog```.

6. Instalar las dependencias.
    - Utiliza el comando ```npm install``` para que se instalen las dependencias requeridas del proyecto.
    - Y el comando ```composer install```.

7. Realizar las migraciones y poblar la base de datos.
    - Utiliza el comando ```php artisan migrate``` para crear la DATABASE y ejecutar las migraciones.
    - Poblamos la base de datos con ```php artisan db:seed```.

8. Iniciar la app.
    - Utiliza el comando ```npm run dev``` para iniciar vite.
    - Ademas el comando ```php artisan serve```.

9. Para cerrar la app.
    - Toca la tecla ctrl + c y luego la tecla "s".

## Miembros del Grupo

- Fausto Ignacio Biló - FAI 3616 - fausto.bilo@est.fi.uncoma.edu.ar
- Diego Benjamin - FAI 3002 - diego.benjamin@est.fi.uncoma.edu.ar
- Julian Alcaraz - FAI 4261 - julian.alcaraz@est.fi.uncoma.edu.ar

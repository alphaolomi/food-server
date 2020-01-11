# Starter

A skeleton starter system for Infomation Systems

## installation

```bash
composer install
cp .env.example .env
php artisan key:generate
```

### Optimization tools

Medialibrary will use these tools to optimize converted images if they are present on your system:

-   JpegOptim
-   Optipng
-   Pngquant 2
-   SVGO
-   Gifsicle

Here’s how to install all the optimizers on Ubuntu:

```bash
sudo apt install jpegoptim optipng pngquant gifsicle
yarn add -g svgo
```
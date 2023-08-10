<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## breeze-bootstrap

This template repository provides a starting point for a Laravel application with a Bootstrap frontend.

### Requirements

See https://laravel.com/docs/10.x/deployment#server-requirements for specific PHP requirements.

- PHP 8.2 or greater
- Docker Desktop (for Laravel Sail dev env)

### Software Installed

- Laravel 10.10 or greater
- PHPUnit 10.1 or greater
- Bootstrap 5.3.1 or greater
- Google ReCAPTCHA
- Laravel Sail (dev env)
  - MySQL

## Usage

First, configure your `.env` file:
```shell
cp .env.example .env
nano .env
```

If you are using Laravel Sail in your development environment (which is already configured to go, so long as your Docker is too), start the containers with:
```shell
./vendor/bin/sail up
```
Install dependencies with:
```shell
composer install
php artisan key:generate
npm install
npm run build
```

### ReCAPTCHA Configuration

A Google ReCAPTCHA account is required. You will need to get the API keys from your dashboard and place them in the `.env` file in the following entries:
```
RECAPTCHA_SITE_KEY=
RECAPTCHA_SECRET_KEY=
RECAPTCHA_SKIP_IP=
```
Without this, the register page will not work.

### FontAwesome

To use FontAwesome for their great free icons in your UI, you will need to create an account with them and create a 'kit' for their Version 6 free icons (or another package to suit your needs) and insert the script tag into the page `<head>` tag in the app layout:
```shell
resources/views/layouts/app.blade.php
```

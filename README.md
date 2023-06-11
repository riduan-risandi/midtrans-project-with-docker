## Midtrasns Project- Backend API

API menggunakan Laravel

## Requirements

- Docker
  https://docs.docker.com/docker-for-windows/install/
- Laragon / Executable PHP
  https://laragon.org/download/index.html / https://windows.php.net/
- Composer
  https://getcomposer.org/download/
- Code Editor
  https://code.visualstudio.com/download
- Git
  https://git-scm.com/downloads
- Database
  https://www.mysql.com/

## Tech Stacks

- Laravel 8.83.5 **(Upgradeable)** (Use Laravel Actions & Modules)
- Nginx Stable-Alpine
- php:8.1-fpm-alpine

## Installation

1.  Git Clone 
    `https://github.com/riduan-risandi/midtrans-project-with-docker.git`
2.  Run Composer Install
    `composer install`
3.  Run NPM Install
    `npm install`
4.  Copy .env.example to .env
    `cp .env.example .env`
5.  Generate Laravel Key
    `php artisan key:generate`
6.  Sesuaikan konfigurasi .env 
7.  buka .env lalu tambah baris berikut sesuai dengan api midtrans kamu 
        
    ```bash
    MIDTRANS_IS_PRODUCTION=false
    MIDTRANS_MERCHAT_ID=xxxxxx
    MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxxx
    MIDTRANS_SERVER_KEY=SB-Mid-server-xxxxx
    ```
8.  Run Migration & Seeder
9. Build Docker
    `docker-compose up -d --build site`
    `docker-compose up -d --build composer`
    `docker-compose up -d --build artisan`
10. Access site
    `http://localhost:8080/`

## Port Docker

- **nginx** - `:80`
- **mysql** - `:3306`
- **php** - `:9000`

## Note
- Membuat Module Baru = docker-compose run --rm artisan module:make [Nama Module]
- Membuat Action Dalam Module = docker-compose run --rm artisan module:make-action [Nama Folder dan File] [Nama Module]
 

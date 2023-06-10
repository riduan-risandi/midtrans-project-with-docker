 


<p align="center">Dibuat Menggunakan Framework Laravel Versi 9.</p>
<div align="center">
 
 

## Install

1. **Clone Repository**

```bash 
git clone https://github.com/riduan-risandi/midtrans-project.git
cd midtrans-project
composer install
cp .env.example .env
```

2. **Buka `.env` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai**

```bash
DB_PORT=3310
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```


3. **Buka `.env` lalu ubah baris berikut sesuai dengan api midtrans kamu**

```bash
MIDTRANS_IS_PRODUCTION=false
MIDTRANS_MERCHAT_ID=xxxxxx
MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxxx
MIDTRANS_SERVER_KEY=SB-Mid-server-xxxxx
```


4. **Instalasi Aplikasi**

```bash
php artisan key:generate
php artisan migrate --seed
```

4. **Jalankan Aplikasi**

```bash
php artisan serve
```

 
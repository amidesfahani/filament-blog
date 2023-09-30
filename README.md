# Filament Demo Blog App

A simple demo application to illustrate how Filament Admin works.

## Installation

Clone the repo locally:

```sh
git clone https://github.com/amidesfahani/filament-blog.git filament-blog && cd filament-blog
```

Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

```sh
touch database/database.sqlite
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

> **Note**  
> If you get an "Invalid datetime format (1292)" error, this is probably related to the timezone setting of your database.  
> Please see https://dba.stackexchange.com/questions/234270/incorrect-datetime-value-mysql


Create a symlink to the storage:

```sh
php artisan storage:link
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit the url in your browser, and login with:

-   **Username:** admin@filamentphp.com
-   **Password:** password

> **Note**  
> default locale is set to "fa" Farsi if you want to use English version simply edit this file:
> config\app.php
```php
[
	'locale' => 'en',
	'faker_locale' => 'en_US',
]
```

# راهنمای فارسی

یک بلاگ ساده با لاراول و فیلامنت پنل

## نصب و راه اندازی

کد رو با این دستور به سیستم خودتون منتقل کنید:

```sh
git clone https://github.com/amidesfahani/filamentphp-blog.git filamentphp-blog && cd filamentphp-blog
```

نصب پیش نیازهای PHP:

```sh
composer install
```

پیکربندی:

```sh
cp .env.example .env
```

تولید کلید برنامه:

```sh
php artisan key:generate
```

یک فایل پایگاه داده SQLite ایجاد کنید. میتونید از دیگر پایگاه های داده مانند MySQL و Postgres هم استفاده کنید.

```sh
touch database/database.sqlite
```

دستور ایجاد جدول ها:

```sh
php artisan migrate
```

دستور اجرای تولید محتوای تست:

```sh
php artisan db:seed
```

ایجاد میانبر (شورت کات) برای دسترسی به فایل ها:

```sh
php artisan storage:link
```

اجرای سرور برنامه:

```sh
php artisan serve
```

وارد آدرس مدیریت شوید و این اطلاعات رو وارد کنید
```
http:127.0.0.1:8000/admin
```

-   **Username:** admin@filamentphp.com
-   **Password:** password

> **توجه**  
> پروژه بر روی زبان فارسی تنظیم شده است، برای ایجاد تغییرات میتونید این فایل رو ویرایش کنید:
> config\app.php
```php
[
	'timezone' => 'Asia/Tehran',
	'locale' => 'fa',
	'faker_locale' => 'fa_IR',
]
```
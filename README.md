# Installation and Setup

## Installation

> after making sure you have database with name 'dr_job_task'
> run the following commands inside project:

Install the Dependencies
```bash
composer install
```
or
```bash
compoer update
```
Generate project Key
```bash
php artisan key:generate
```
Migrating database...
```angular2html
php artisan migrate
```
Seeding database...
```angular2html
php artisan db:seed
```
serve the project
```bash
php artisan serve
```
or
```bash
php artisan serve --host={any-host}
```
or
```bash
php artisan serve --host={any-host} --port={any-port}
```

>after those commands run you can visit the project in your browser
> http://127.0.0.1:8000/  
> or depending on the host and port you can visit the project in your browser


#### Eng.Ahmed Tofaha - @ahmedtofaha10

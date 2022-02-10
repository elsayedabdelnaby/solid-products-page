# Products Datatable
We Use the Databales to display the products and allow the user to create a new product through popup form and enbale the filteration by the categoies of the products

## Requirements
- [PHP >= 7.4](http://php.net/)

## Setps to install the projects

- clone the project https://github.com/elsayedabdelnaby/solid-products-page
- move to the repository folder
- run composer install command
```bash
$ composer install
```
- create .env file by take a copy from .env.example file, you can take a copy by run the below command
```bash
$ cp .env.example .env
```
- create a database and set the database connection details in .env file
- generate a new key to the application by run the below command
```bash
$ php artisan key:generate
```
- run the migration to create the tables of the database
```bash
php artisan migrate
```
- run the seeds command to seed the records of languages, categories and products tables
```bash
php artisan db:seed
```
- now you can run the project by run the below command and open the returned link from the command
```bash
php artisan serve
```

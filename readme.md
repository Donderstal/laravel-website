## Company website

Showcase repo for my work with Laravel, Sass and Foundation

### Functionalities
This project includes an Admin Dashboard for adding and managing products. Products are displayed individually on product pages. It also includes some contact forms and a database with a domain specific model. 

### Installation
You will need PHP Composer to run this project. You can find it here https://getcomposer.org/download/ if you do not already have it installed. 

You will also need to install Laravel and Yarn if you don't have it already. Yarn can be easily installed through NPM by running `npm i yarn`

The easiest way to get everything up and running is by using something like Xampp. Clone the repo into your xampp/htdocs folder. Open up the httpd.conf file. Search for 'documentroot' and point it to the Public folder of this repo.

After cloning this repo, run `composer install` and `yarn` to install the required dependencies. This can take some time.

There is a .env.example file in the root folder of the project. Rename this to `.env`.

If you need an administration account, to create an administration account run below command and follow the instruction.

```bash
php artisan db:seed --class=UsersTableSeeder
```

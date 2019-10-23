## Company website

Showcase repo for my work with Laravel, Sass and Foundation

### Installation
You will need PHP Composer to run this project. You will also need to install Laravel and Yarn.

The easiest way to get everything up and running is a Apache server like Xampp. Clone the repo into your xampp/htdocs folder. Open up the XAMPP controle panel and open the httpd.conf file under the Apache admin button. Search for 'documentroot' and point it to the Public folder of this repo.

There is a .env.example file in the root folder of the project. Rename this to `.env`.

Start Apache and MySQL in the XAMPP control panel. In phpMyAdmin, make a new database which uses the same name as the `DB_DATABASE` variable in the `.env` files. Also make sure the password and username in the .env file match your MySQL password and username

After cloning this repo and starting your server, run `composer install` and `yarn` to install the required dependencies. This can take some time.

Run the following command to set up the database tables:
```bash
php artisan migrate
```

then the following command to seed the database with dummy data:
```bash
php artisan db:seed
```
After running this command you are prompted to fill in some credentials. These can be used to enter the admin dashboard.

Restart Apache and MySQL in the XAMPP control panel

Compile the front-end code and assets by running `yarn run dev`. Sometimes this won't work right away and you'll have to run the same command a few times before Laravel can find the compiled assets

You should now be able to visit the website on localhost

### Functionalities
This project includes an Admin Dashboard for adding and managing products. Products are displayed individually on product pages. It also includes some contact forms and a database with a domain specific model. 

You can login to the admin dashboard with the credentials you create when seeding the database. In the Admin dashboard, you can create new users and products and manage existing users and products

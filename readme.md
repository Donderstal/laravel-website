## Company website

Showcase repo for my work with Laravel, Sass and Foundation

### Installation
You will need PHP Composer to run this project. You can find it here https://getcomposer.org/download/ if you do not already have it installed. 

You will also need to install Laravel and Yarn if you don't have it already. Yarn can be easily installed through NPM by running `npm i yarn` or `npm i --gobal yarn` if you want to install it globally

The easiest way to get everything up and running is by using something like Xampp. Clone the repo into your xampp/htdocs folder. Open up the httpd.conf file. Search for 'documentroot' and point it to the Public folder of this repo.

There is a .env.example file in the root folder of the project. Rename this to `.env`.

After cloning this repo, run `composer install` and `yarn` to install the required dependencies. This can take some time.

Run the following command to set up the database tables:
```bash
php artisan migrate
```

then the following command to seed the database with dummy data:
```bash
php artisan db:seed
```

Uncomment the following code in the routes/web.php file:
``$brands_list = ProductsBrands::getAllBrandsInOrderQuery()->get();
$brands_slugs = ProductsBrands::getAllSlugs($brands_list);
$brands_slug_regex = implode($brands_slugs, '|');
Route::group(['prefix' => config('site.products.url'), 'as' => 'products.'], function () use ($brands_slug_regex){
    Route::get('/', 'ProductsController@list')->name('listAll');
    Route::get('{status}/{brand?}', 'ProductsController@list')->name('list')->where(['status' => 'aanbod|verkocht', 'brand' => $brands_slug_regex]);
    Route::get('{slug}', 'ProductsController@show')->name('show');
    Route::post('{slug}', 'ProductsController@store')->name('store');
});``

Compile the front-end code and asstes by running `npm run dev`

Start Apache and MySQL in the XAMPP control panel

You should now be able to visit the website on localhost

### Functionalities
This project includes an Admin Dashboard for adding and managing products. Products are displayed individually on product pages. It also includes some contact forms and a database with a domain specific model. 

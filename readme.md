API is built on Lumen and MySQL

Here is a detailed documentation of installing it into the Ubuntu systems

Common dependency :-
"php": ">=5.6.4",
 "laravel/lumen-framework": "5.4.

This is in composer.json file as well

Please run “sudo apt-get update” or “sudo apt update”  before running any “sudo apt install” or “sudo apt-get install” commands depending on your version of ubuntu

We need to have mysql database installed, and working with php.
First check you have to database mysql installed, and php mysql driver
If not you can install it by running

“sudo apt-get install mysql-server”
The default username is root and installation will ask for password while installing
For the php mysql driver, you will have to run. I am using php5.6, you can use your version accordingly
“sudo apt-get install php5.6-mysql”

Do git clone with following command. For this step you need to have Git in your system

git clone https://github.com/amitasthana/lumenapi.git

After this, you can do cd lumenapi

Need to have composer for this step, if  in ubuntu you can install it with
sudo apt install composer
Or
sudo apt-get install composer

You need to have these php extension, installed and enabled
Mbstring, phpunit, memcached,
Also you should have memcached

You can install these by running

sudo apt-get install memcached
”sudo apt install php5.6-mbstring”
“sudo apt-get install php5.6-xml”
“sudo apt-get install php5.6-memcached”

After making sure you have installed these extensions and you have installed composer on your system, you can run

“composer install”

Try to run
“composer install”
Once again and make sure it says
“Nothing to install or update”

This was the part for setting up the correct environment for running the application.
Now certain other things which are important.


Create the Database and the Table

Once the installation finishes, create a new database with the name lumenapi. Add the database credentials and the name of the database in the .env file.

If you are doing on ubuntu desktop then you need to create a file using text editor of your choice.

For this you need to create a database with name “lumenapi” or any name you choose and put in the following file accordingly. This can be done by command line by running

“mysql -u root -p”
And it will ask for password, which we put while installing the database,
Now create a database by following command

“create database lumenapi;”


First we need to create a file .env in the project

Run this command to install the database

php artisan make:migration Database
The migration file will be created in database/migrations folder.
You can use any editor to edit this file, I am doing in sever so it will be vi editor




Open this file and add the table schema in it. Inside function up() add the following code: (a NewUrl Migration file is also kept for reference)
Schema::create('urls', function (Blueprint $table) {
    $table->increments('id');
    $table->string('mobile_url');
    $table->string('desktop_url');
    $table->string('short_url');
    $table->integer('mobile_clicks');
    $table->integer('desktop_clicks');
    $table->string(‘updated_a’t);
    $table->date(‘created_at’);;
});
And then wen can run.

“php artisan migrate”



Now your database in connected with the system

Testing The API
To test the API on localhost we're going to use the application, Postman. To test it on the localhost, run the following command in the folder to start a PHP server:
php -S localhost:8000 -t public
This will bind the Lumen public directory to localhost:8000.

Create A New ShortUrl

To create a new record for a Short urls using the API, we need to send a post request to localhost:8000/url/ with the following parameters



This is for creating the short url and saving the database.

.

Now you can go to any url with code

http://localhost:8000/AAAAAA

It will redirect to you the links given the input




Also for the convenience, I have installed it on my domain, asthana.me

In brief, you can create short URLs by posting the parameters mobile_url, desktop_url to the url

http://asthana.me/url


Attaching a screenshot of the postman.

Go To browser with the url you can so

Asthana.me/Code

like  


http://asthana.me/AwAAAA

To see all data in JSON format, you can do a get method on http://asthana.me/url

For simplicity http://asthana.me/url can be put in browser and we can see list of urls with all data associated











# Lumen PHP Framework

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

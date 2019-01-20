# Qontacs
Qontacts | The simple and powerful contact managment tool.


# Getting started

## Installation

Clone the repository

    git clone git@github.com:badry-abderrahmane/Qontacs.git

Switch to the repo folder

    cd Qontacs

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Seed the database

    php artisan db:seed


Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Unit Testing

You can run availiable unit tests

    vendor\bin\phpunit

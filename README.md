# AJAX Tutorial

In this project I show you 4 different ways to do AJAX

- Jquery Way
- Ajaxform Way
- Axios Way
- Vue + Axios Way

## Requirement
1. Apache & MySQL (Or [XAMPP](https://www.apachefriends.org/download.html)) installed
1. [Git](https://git-scm.com/downloads) installed
2. [Composer](https://getcomposer.org/download/) Installed
3. [Node and NPM](https://nodejs.org/en/download/) Installed
4. Or just use [Laragon](https://laragon.org/download/) 🤷‍♂️🤷‍♂️

## Installation Instruction

1. git clone this project into your laragon/xampp folder
2. `composer install` to install php packages dependencies
5. Copy `.env.example` file to `.env` file and edit the `.env` file
3. `php artisan key:generate`
4. Create database called rest
6. Edit the database credential in `.env` file
7. `npm install` to install npm packages dependencies
8. `npm run dev` to compile css and js assets
9. `php artisan migrate` to import the database
10. Go to localhost/rest if using XAMPP or rest.test if using Laragon
11. Go to `/jquery`, `/ajaxform`, `/axios`, `/vue` to see the different ways to use ajax

## How the backend code is written

For this project I am learning on how to:
- implement the repository + interface pattern
- implement the dependency injection pattern

So you should see interfaces and repositories folders in the app folders

In the repositories folder, you can see there are two files:-
- ArrayPostRepositories.php
- PostRepositories.php

The ArrayPostRepositories is an implementation of when we want to handle the post object using array only

The PostRepositories is an implementation of when we want to have a database to handle the post object

### How to swap the implementation?

You can go to App\Providers\AppServiceProviders.php and change `line 26` from

`$this->app->singleton('App\Interfaces\PostInterface', 'App\Repositories\PostRepository');`

to

`$this->app->singleton('App\Interfaces\PostInterface', 'App\Repositories\ArrayPostRepository');`

You can see at the constructor of `App\Http\Controllers\PostController.php` I type hinted PostInterface at `line 11`

This means that the controller doesn't know or care which post repository implementation we are using

Due to this code is written using Dependency Injection pattern in mind, we can easily swap the implementation

This would be useful if we want to change SMS service from Twilio to other 3rd party SMS providers
# Provably Fair

This git project allows you to set up a [Laravel](https://laravel.com) based website that will allow you to validate provably fair results.

## Installation

There are a few steps to run in order to get the provable front end up and running. The following commands will need to be run from within a terminal:

```
# first clone the repository
git clone git@github.com:dbdnet/provable-laravel.git
# next, cd into the newly created project directory
cd provable-laravel
# next, copy the .env.example file to .env
cp .env.example .env
# now, install all of the composer dependencies
composer install
# finally, start serving the application
php artisan serve
```

If everything worked, you should now have a website running at (http://127.0.0.1:8000)



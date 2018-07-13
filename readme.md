## Deployment

Install essential package with following command:
```
composer install
```

Make a copy of .env.example to .env with following command:
```
cp .env.example .env
```

Create a database in mysql and set your config in .env file.
Then run migrations:
```
php artisan migrate
```

Now to run project set-up a webserver with root path ``public`` or run following command:
```
php artisan serve
```

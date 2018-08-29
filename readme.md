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

## Add Fetch Driver

1. Add your driver package in ``app/Utils/PriceFetcher/Drivers``, 
including a driver class which extend ``app/Utils/PriceFetcher/BaseDriver``.
2. It should implement necessary methods and return an ``array of info`` or ``null``.
3. Then highlight your driver by assign a unique code to it in ``app/Utils/PriceFetcher/Kernel`` 

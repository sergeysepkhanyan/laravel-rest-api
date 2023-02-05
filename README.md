## We must first establish a connection. To do so, we’ll need to add our database credentials to the .env file

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```


```sh
composer install
```

```sh
php artisan migrate
```

```sh
php artisan db:seed --class=UserSeeder
```

```sh
php artisan db:seed --class=CustomerSeeder
```

```sh
php artisan db:seed --class=PaymentSeeder
```

```sh
php artisan vendor:publish --provider="PHPOpenSourceSaver\JWTAuth\Providers\LaravelServiceProvider"
```

```sh
php artisan jwt:secret
```

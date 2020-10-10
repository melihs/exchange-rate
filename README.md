## exchange rate comparison

### Getting Started

### Installation (Manual)
```
$ git clone git clone https://github.com/melihs/exchange-rate.git
$ cd exchange-rate && composer install
$ cp .env.example .env

- create new database and modifed your .env

$ php artisan migrate
$ php artisan serve
```
###  Fetch Api Source
```
$ php artisan app:provider <provider name>
```
 **example:** 
 ```
$ php artisan app:provider http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0
$ php artisan app:provider http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3
```


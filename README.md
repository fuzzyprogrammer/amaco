# How to install and run this Project

#### First clone this project to your working directory
`git clone https://github.com/fuzzyprogrammer/amaco.git`

#### Then copy **.env.example** to **.env**
`cp .env.example .env`

#### Then run following command to generate APP_ID
`php artisan key:generate`

#### Then add your database credentials
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=username
DB_PASSWORD=password
```
#### Then run following code
`composer install`

#### Then run 
`php artisan migrate`

#### To get api links try running 
`php artisan route:list`

Domain: [`http://dataqueuesystems.com/amaco/amaco/public/`]

| Method    | URI                     | Action                               |
|:---------:|:-----------------------:|:-----------------------------------: |
|  GET      | api/products            |  give all products in json format    |
| POST      | api/products            |  add a new product to database       |
|  GET      | api/products/{product}  |  get a product from db whose         |
| PUT\|PATCH| api/products/{product}  |  update the values of product in db  |
|  DELETE   | api/products/{product}  |  to delete a product                 |

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


| Method    | URI                            | Name                 |
|-----------|--------------------------------|----------------------|
| GET|HEAD  |` /                            `|                      |
| GET|HEAD  |` api/categories               `| categories.index     |
| POST      |` api/categories               `| categories.store     |
| DELETE    |` api/categories/{category}    `| categories.destroy   |
| PUT|PATCH |` api/categories/{category}    `| categories.update    |
| GET|HEAD  |` api/categories/{category}    `| categories.show      |
| GET|HEAD  |` api/parties                  `| parties.index        |
| POST      |` api/parties                  `| parties.store        |
| GET|HEAD  |` api/parties/{party}          `| parties.show         |
| PUT|PATCH |` api/parties/{party}          `| parties.update       |
| DELETE    |` api/parties/{party}          `| parties.destroy      |
| POST      |` api/products                 `| products.store       |
| GET|HEAD  |` api/products                 `| products.index       |
| GET|HEAD  |` api/products-in-category     `| products.in.category |
| DELETE    |` api/products/{product}       `| products.destroy     |
| GET|HEAD  |` api/products/{product}       `| products.show        |
| PUT|PATCH |` api/products/{product}       `| products.update      |
| GET|HEAD  |` api/rfq                      `| rfq.index            |
| POST      |` api/rfq                      `| rfq.store            |
| GET|HEAD  |` api/rfq-details              `| rfq-details.index    |
| POST      |` api/rfq-details              `| rfq-details.store    |
| GET|HEAD  |` api/rfq-details/{rfq_detail} `| rfq-details.show     |
| PUT|PATCH |` api/rfq-details/{rfq_detail} `| rfq-details.update   |
| DELETE    |` api/rfq-details/{rfq_detail} `| rfq-details.destroy  |
| GET|HEAD  |` api/rfq/{rfq}                `| rfq.show             |
| PUT|PATCH |` api/rfq/{rfq}                `| rfq.update           |
| DELETE    |` api/rfq/{rfq}                `| rfq.destroy          |
| GET|HEAD  |` api/user                     `|                      |
| GET|HEAD  |` api/users                    `|                      |

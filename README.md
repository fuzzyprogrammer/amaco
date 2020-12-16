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

| URI                          | Name                 |
|------------------------------|----------------------|
| /                            |                      |
| api/analyse                  | analyse.index        |
| api/analyse                  | analyse.store        |
| api/analyse/{analyse}        | analyse.destroy      |
| api/analyse/{analyse}        | analyse.update       |
| api/analyse/{analyse}        | analyse.show         |
| api/categories               | categories.index     |
| api/categories               | categories.store     |
| api/categories/{category}    | categories.show      |
| api/categories/{category}    | categories.update    |
| api/categories/{category}    | categories.destroy   |
| api/parties                  | parties.index        |
| api/parties                  | parties.store        |
| api/parties/{party}          | parties.update       |
| api/parties/{party}          | parties.destroy      |
| api/parties/{party}          | parties.show         |
| api/products                 | products.store       |
| api/products                 | products.index       |
| api/products-in-category     | products.in.category |
| api/products/{product}       | products.update      |
| api/products/{product}       | products.destroy     |
| api/products/{product}       | products.show        |
| api/rfq                      | rfq.store            |
| api/rfq                      | rfq.index            |
| api/rfq-details              | rfq-details.index    |
| api/rfq-details              | rfq-details.store    |
| api/rfq-details/{rfq_detail} | rfq-details.show     |
| api/rfq-details/{rfq_detail} | rfq-details.update   |
| api/rfq-details/{rfq_detail} | rfq-details.destroy  |
| api/rfq/{rfq}                | rfq.show             |
| api/rfq/{rfq}                | rfq.update           |
| api/rfq/{rfq}                | rfq.destroy          |
| api/user                     |                      |
|                              |                      |
| api/users                    |                      |

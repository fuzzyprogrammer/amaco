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



|--------|-----------|------------------------------|---------------------|-------------------------------------------------------|------------|
| Domain | Method    | URI                          | Name                | Action                                                | Middleware |
|--------|-----------|------------------------------|---------------------|-------------------------------------------------------|------------|
|        | GET|HEAD  | /                            |                     | Closure                                               | web        |
|        | GET|HEAD  | api/categories               | categories.index    | App\Http\Controllers\Api\CategoryController@index     | api        |
|        | POST      | api/categories               | categories.store    | App\Http\Controllers\Api\CategoryController@store     | api        |
|        | DELETE    | api/categories/{category}    | categories.destroy  | App\Http\Controllers\Api\CategoryController@destroy   | api        |
|        | PUT|PATCH | api/categories/{category}    | categories.update   | App\Http\Controllers\Api\CategoryController@update    | api        |
|        | GET|HEAD  | api/categories/{category}    | categories.show     | App\Http\Controllers\Api\CategoryController@show      | api        |
|        | GET|HEAD  | api/parties                  | parties.index       | App\Http\Controllers\Api\PartyController@index        | api        |
|        | POST      | api/parties                  | parties.store       | App\Http\Controllers\Api\PartyController@store        | api        |
|        | GET|HEAD  | api/parties/{party}          | parties.show        | App\Http\Controllers\Api\PartyController@show         | api        |
|        | PUT|PATCH | api/parties/{party}          | parties.update      | App\Http\Controllers\Api\PartyController@update       | api        |
|        | DELETE    | api/parties/{party}          | parties.destroy     | App\Http\Controllers\Api\PartyController@destroy      | api        |
|        | POST      | api/products                 | products.store      | App\Http\Controllers\Api\ProductController@store      | api        |
|        | GET|HEAD  | api/products                 | products.index      | App\Http\Controllers\Api\ProductController@index      | api        |
|        | DELETE    | api/products/{product}       | products.destroy    | App\Http\Controllers\Api\ProductController@destroy    | api        |
|        | PUT|PATCH | api/products/{product}       | products.update     | App\Http\Controllers\Api\ProductController@update     | api        |
|        | GET|HEAD  | api/products/{product}       | products.show       | App\Http\Controllers\Api\ProductController@show       | api        |
|        | POST      | api/rfq                      | rfq.store           | App\Http\Controllers\Api\RFQController@store          | api        |
|        | GET|HEAD  | api/rfq                      | rfq.index           | App\Http\Controllers\Api\RFQController@index          | api        |
|        | GET|HEAD  | api/rfq-details              | rfq-details.index   | App\Http\Controllers\Api\RFQDetailsController@index   | api        |
|        | POST      | api/rfq-details              | rfq-details.store   | App\Http\Controllers\Api\RFQDetailsController@store   | api        |
|        | GET|HEAD  | api/rfq-details/{rfq_detail} | rfq-details.show    | App\Http\Controllers\Api\RFQDetailsController@show    | api        |
|        | PUT|PATCH | api/rfq-details/{rfq_detail} | rfq-details.update  | App\Http\Controllers\Api\RFQDetailsController@update  | api        |
|        | DELETE    | api/rfq-details/{rfq_detail} | rfq-details.destroy | App\Http\Controllers\Api\RFQDetailsController@destroy | api        |
|        | GET|HEAD  | api/rfq/{rfq}                | rfq.show            | App\Http\Controllers\Api\RFQController@show           | api        |
|        | PUT|PATCH | api/rfq/{rfq}                | rfq.update          | App\Http\Controllers\Api\RFQController@update         | api        |
|        | DELETE    | api/rfq/{rfq}                | rfq.destroy         | App\Http\Controllers\Api\RFQController@destroy        | api        |
|        | GET|HEAD  | api/user                     |                     | Closure                                               | api        |
|        |           |                              |                     |                                                       | auth:api   |
|        | GET|HEAD  | api/users                    |                     | App\Http\Controllers\Api\UserController@index         | api        |
|--------|-----------|------------------------------|---------------------|-------------------------------------------------------|------------|

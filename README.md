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

| Domain | Method    | URI                          | Name                | Action                                                | 
|--------|-----------|------------------------------|---------------------|-------------------------------------------------------|
|        | GET|HEAD  | /                            |                     | Closure                                               | 
|        | GET|HEAD  | api/categories               | categories.index    | App\Http\Controllers\Api\CategoryController@index     | 
|        | POST      | api/categories               | categories.store    | App\Http\Controllers\Api\CategoryController@store     | 
|        | DELETE    | api/categories/{category}    | categories.destroy  | App\Http\Controllers\Api\CategoryController@destroy   | 
|        | PUT|PATCH | api/categories/{category}    | categories.update   | App\Http\Controllers\Api\CategoryController@update    | 
|        | GET|HEAD  | api/categories/{category}    | categories.show     | App\Http\Controllers\Api\CategoryController@show      | 
|        | GET|HEAD  | api/parties                  | parties.index       | App\Http\Controllers\Api\PartyController@index        | 
|        | POST      | api/parties                  | parties.store       | App\Http\Controllers\Api\PartyController@store        | 
|        | GET|HEAD  | api/parties/{party}          | parties.show        | App\Http\Controllers\Api\PartyController@show         | 
|        | PUT|PATCH | api/parties/{party}          | parties.update      | App\Http\Controllers\Api\PartyController@update       | 
|        | DELETE    | api/parties/{party}          | parties.destroy     | App\Http\Controllers\Api\PartyController@destroy      | 
|        | POST      | api/products                 | products.store      | App\Http\Controllers\Api\ProductController@store      | 
|        | GET|HEAD  | api/products                 | products.index      | App\Http\Controllers\Api\ProductController@index      | 
|        | DELETE    | api/products/{product}       | products.destroy    | App\Http\Controllers\Api\ProductController@destroy    | 
|        | PUT|PATCH | api/products/{product}       | products.update     | App\Http\Controllers\Api\ProductController@update     | 
|        | GET|HEAD  | api/products/{product}       | products.show       | App\Http\Controllers\Api\ProductController@show       | 
|        | POST      | api/rfq                      | rfq.store           | App\Http\Controllers\Api\RFQController@store          | 
|        | GET|HEAD  | api/rfq                      | rfq.index           | App\Http\Controllers\Api\RFQController@index          | 
|        | GET|HEAD  | api/rfq-details              | rfq-details.index   | App\Http\Controllers\Api\RFQDetailsController@index   | 
|        | POST      | api/rfq-details              | rfq-details.store   | App\Http\Controllers\Api\RFQDetailsController@store   | 
|        | GET|HEAD  | api/rfq-details/{rfq_detail} | rfq-details.show    | App\Http\Controllers\Api\RFQDetailsController@show    | 
|        | PUT|PATCH | api/rfq-details/{rfq_detail} | rfq-details.update  | App\Http\Controllers\Api\RFQDetailsController@update  | 
|        | DELETE    | api/rfq-details/{rfq_detail} | rfq-details.destroy | App\Http\Controllers\Api\RFQDetailsController@destroy | 
|        | GET|HEAD  | api/rfq/{rfq}                | rfq.show            | App\Http\Controllers\Api\RFQController@show           | 
|        | PUT|PATCH | api/rfq/{rfq}                | rfq.update          | App\Http\Controllers\Api\RFQController@update         | 
|        | DELETE    | api/rfq/{rfq}                | rfq.destroy         | App\Http\Controllers\Api\RFQController@destroy        | 
|        | GET|HEAD  | api/user                     |                     | Closure                                               | 
|        | GET|HEAD  | api/users                    |                     | App\Http\Controllers\Api\UserController@index         | 

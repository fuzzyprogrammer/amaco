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

```
| Method    | URI                                     | Name                     |
+-----------+-----------------------------------------+--------------------------+
| GET|HEAD  | /                                       |                          |
| POST      | api/add-user                            | add.user                 |
| GET|HEAD  | api/analyse                             | analyse.index            |
| POST      | api/analyse                             | analyse.store            |
| DELETE    | api/analyse/{analyse}                   | analyse.destroy          |
| GET|HEAD  | api/analyse/{analyse}                   | analyse.show             |
| PUT|PATCH | api/analyse/{analyse}                   | analyse.update           |
| POST      | api/categories                          | categories.store         |
| GET|HEAD  | api/categories                          | categories.index         |
| GET|HEAD  | api/categories/{category}               | categories.show          |
| PUT|PATCH | api/categories/{category}               | categories.update        |
| DELETE    | api/categories/{category}               | categories.destroy       |
| GET|HEAD  | api/contact                             | contact.index            |
| POST      | api/contact                             | contact.store            |
| PUT|PATCH | api/contact/{contact}                   | contact.update           |
| DELETE    | api/contact/{contact}                   | contact.destroy          |
| GET|HEAD  | api/contact/{contact}                   | contact.show             |
| POST      | api/parties                             | parties.store            |
| GET|HEAD  | api/parties                             | parties.index            |
| GET|HEAD  | api/parties-vendor                      | parties.vendor           |
| GET|HEAD  | api/parties/{party}                     | parties.show             |
| DELETE    | api/parties/{party}                     | parties.destroy          |
| PUT|PATCH | api/parties/{party}                     | parties.update           |
| GET|HEAD  | api/products                            | products.index           |
| POST      | api/products                            | products.store           |
| GET|HEAD  | api/products-in-category                | products.in.category     |
| GET|HEAD  | api/products/{product}                  | products.show            |
| DELETE    | api/products/{product}                  | products.destroy         |
| PUT|PATCH | api/products/{product}                  | products.update          |
| GET|HEAD  | api/quotation                           | quotation.index          |
| POST      | api/quotation                           | quotation.store          |
| GET|HEAD  | api/quotation-detail                    | quotation-detail.index   |
| POST      | api/quotation-detail                    | quotation-detail.store   |
| PUT|PATCH | api/quotation-detail/{quotation_detail} | quotation-detail.update  |
| GET|HEAD  | api/quotation-detail/{quotation_detail} | quotation-detail.show    |
| DELETE    | api/quotation-detail/{quotation_detail} | quotation-detail.destroy |
| GET|HEAD  | api/quotation/{quotation}               | quotation.show           |
| PUT|PATCH | api/quotation/{quotation}               | quotation.update         |
| DELETE    | api/quotation/{quotation}               | quotation.destroy        |
| GET|HEAD  | api/rfq                                 | rfq.index                |
| POST      | api/rfq                                 | rfq.store                |
| POST      | api/rfq-details                         | rfq-details.store        |
| GET|HEAD  | api/rfq-details                         | rfq-details.index        |
| DELETE    | api/rfq-details/{rfq_detail}            | rfq-details.destroy      |
| PUT|PATCH | api/rfq-details/{rfq_detail}            | rfq-details.update       |
| GET|HEAD  | api/rfq-details/{rfq_detail}            | rfq-details.show         |
| GET|HEAD  | api/rfq/{rfq}                           | rfq.show                 |
| PUT|PATCH | api/rfq/{rfq}                           | rfq.update               |
| DELETE    | api/rfq/{rfq}                           | rfq.destroy              |
| GET|HEAD  | api/sale                                | sale.index               |
| POST      | api/sale                                | sale.store               |
| GET|HEAD  | api/sale-detail                         | sale-detail.index        |
| POST      | api/sale-detail                         | sale-detail.store        |
| GET|HEAD  | api/sale-detail/{sale_detail}           | sale-detail.show         |
| DELETE    | api/sale-detail/{sale_detail}           | sale-detail.destroy      |
| PUT|PATCH | api/sale-detail/{sale_detail}           | sale-detail.update       |
| DELETE    | api/sale/{sale}                         | sale.destroy             |
| PUT|PATCH | api/sale/{sale}                         | sale.update              |
| GET|HEAD  | api/sale/{sale}                         | sale.show                |
| GET|HEAD  | api/user                                |                          |
| GET|HEAD  | api/users                               |                          |
```

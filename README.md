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
| POST      | api/add-user                            | add.user                 |
| POST      | api/analyse                             | analyse.store            |
| GET|HEAD  | api/analyse                             | analyse.index            |
| DELETE    | api/analyse/{analyse}                   | analyse.destroy          |
| PUT|PATCH | api/analyse/{analyse}                   | analyse.update           |
| GET|HEAD  | api/analyse/{analyse}                   | analyse.show             |
| GET|HEAD  | api/categories                          | categories.index         |
| POST      | api/categories                          | categories.store         |
| DELETE    | api/categories/{category}               | categories.destroy       |
| PUT|PATCH | api/categories/{category}               | categories.update        |
| GET|HEAD  | api/categories/{category}               | categories.show          |
| GET|HEAD  | api/categorized-products/{id}           | categorized.products     |
| GET|HEAD  | api/contact                             | contact.index            |
| POST      | api/contact                             | contact.store            |
| DELETE    | api/contact/{contact}                   | contact.destroy          |
| GET|HEAD  | api/contact/{contact}                   | contact.show             |
| PUT|PATCH | api/contact/{contact}                   | contact.update           |
| POST      | api/fileUpload                          | fileUpload.store         |
| GET|HEAD  | api/fileUpload                          | fileUpload.index         |
| DELETE    | api/fileUpload/{fileUpload}             | fileUpload.destroy       |
| PUT|PATCH | api/fileUpload/{fileUpload}             | fileUpload.update        |
| GET|HEAD  | api/fileUpload/{fileUpload}             | fileUpload.show          |
| GET|HEAD  | api/invoice                             | invoice.list             |
| POST      | api/parties                             | parties.store            |
| GET|HEAD  | api/parties                             | parties.index            |
| GET|HEAD  | api/parties-vendor                      | parties.vendor           |
| DELETE    | api/parties/{party}                     | parties.destroy          |
| GET|HEAD  | api/parties/{party}                     | parties.show             |
| PUT|PATCH | api/parties/{party}                     | parties.update           |
| POST      | api/products                            | products.store           |
| GET|HEAD  | api/products                            | products.index           |
| GET|HEAD  | api/products-in-category                | products.in.category     |
| GET|HEAD  | api/products/{product}                  | products.show            |
| DELETE    | api/products/{product}                  | products.destroy         |
| PUT|PATCH | api/products/{product}                  | products.update          |
| GET|HEAD  | api/quotation                           | quotation.index          |
| POST      | api/quotation                           | quotation.store          |
| GET|HEAD  | api/quotation-detail                    | quotation-detail.index   |
| POST      | api/quotation-detail                    | quotation-detail.store   |
| GET|HEAD  | api/quotation-detail/{quotation_detail} | quotation-detail.show    |
| PUT|PATCH | api/quotation-detail/{quotation_detail} | quotation-detail.update  |
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
| POST      | api/sale                                | sale.store               |
| GET|HEAD  | api/sale                                | sale.index               |
| POST      | api/sale-detail                         | sale-detail.store        |
| GET|HEAD  | api/sale-detail                         | sale-detail.index        |
| GET|HEAD  | api/sale-detail/{sale_detail}           | sale-detail.show         |
| DELETE    | api/sale-detail/{sale_detail}           | sale-detail.destroy      |
| PUT|PATCH | api/sale-detail/{sale_detail}           | sale-detail.update       |
| PUT|PATCH | api/sale/{sale}                         | sale.update              |
| DELETE    | api/sale/{sale}                         | sale.destroy             |
| GET|HEAD  | api/sale/{sale}                         | sale.show                |
| POST      | api/upload-file                         | file.upload              |
| GET|HEAD  | api/user                                |                          |
| GET|HEAD  | api/users                               |                          |
```

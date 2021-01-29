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
+-----------+-----------------------------------------+
| Method    | URI                                     |
+-----------+-----------------------------------------+
| GET|HEAD  | /                                       |
| POST      | api/add-user                            |
| GET|HEAD  | api/analyse                             |
| POST      | api/analyse                             |
| PUT|PATCH | api/analyse/{analyse}                   |
| GET|HEAD  | api/analyse/{analyse}                   |
| DELETE    | api/analyse/{analyse}                   |
| POST      | api/categories                          |
| GET|HEAD  | api/categories                          |
| DELETE    | api/categories/{category}               |
| GET|HEAD  | api/categories/{category}               |
| PUT|PATCH | api/categories/{category}               |
| GET|HEAD  | api/categorized-products/{id}           |
| GET|HEAD  | api/category/{name}                     |
| GET|HEAD  | api/contact                             |
| POST      | api/contact                             |
| DELETE    | api/contact/{contact}                   |
| GET|HEAD  | api/contact/{contact}                   |
| PUT|PATCH | api/contact/{contact}                   |
| GET|HEAD  | api/customer-list                       |
| POST      | api/employee                            |
| GET|HEAD  | api/employee                            |
| DELETE    | api/employee/{employee}                 |
| PUT|PATCH | api/employee/{employee}                 |
| GET|HEAD  | api/employee/{employee}                 |
| GET|HEAD  | api/expense                             |
| POST      | api/expense                             |
| GET|HEAD  | api/expense-paid                        |
| PUT|PATCH | api/expense/{expense}                   |
| DELETE    | api/expense/{expense}                   |
| GET|HEAD  | api/expense/{expense}                   |
| POST      | api/fileUpload                          |
| GET|HEAD  | api/fileUpload                          |
| DELETE    | api/fileUpload/{fileUpload}             |
| PUT|PATCH | api/fileUpload/{fileUpload}             |
| GET|HEAD  | api/fileUpload/{fileUpload}             |
| GET|HEAD  | api/invoice                             |
| POST      | api/invoice                             |
| GET|HEAD  | api/invoice-detail                      |
| POST      | api/invoice-detail                      |
| GET|HEAD  | api/invoice-detail/{invoice_detail}     |
| PUT|PATCH | api/invoice-detail/{invoice_detail}     |
| DELETE    | api/invoice-detail/{invoice_detail}     |
| POST      | api/invoice-history                     |
| PUT|PATCH | api/invoice/{invoice}                   |
| DELETE    | api/invoice/{invoice}                   |
| GET|HEAD  | api/invoice/{invoice}                   |
| GET|HEAD  | api/manufacturer                        |
| POST      | api/manufacturer                        |
| GET|HEAD  | api/manufacturer/{manufacturer}         |
| PUT|PATCH | api/manufacturer/{manufacturer}         |
| DELETE    | api/manufacturer/{manufacturer}         |
| POST      | api/parties                             |
| GET|HEAD  | api/parties                             |
| GET|HEAD  | api/parties-except/{product}            |
| GET|HEAD  | api/parties-vendor                      |
| PUT|PATCH | api/parties/{party}                     |
| GET|HEAD  | api/parties/{party}                     |
| DELETE    | api/parties/{party}                     |
| GET|HEAD  | api/payment-account                     |
| POST      | api/payment-account                     |
| DELETE    | api/payment-account/{payment_account}   |
| GET|HEAD  | api/payment-account/{payment_account}   |
| PUT|PATCH | api/payment-account/{payment_account}   |
| GET|HEAD  | api/product-price                       |
| POST      | api/product-price                       |
| DELETE    | api/product-price/{product_price}       |
| PUT|PATCH | api/product-price/{product_price}       |
| GET|HEAD  | api/product-price/{product_price}       |
| GET|HEAD  | api/product-quotation-detail/{id}       |
| GET|HEAD  | api/products                            |
| POST      | api/products                            |
| GET|HEAD  | api/products-in-category                |
| PUT|PATCH | api/products/{product}                  |
| DELETE    | api/products/{product}                  |
| GET|HEAD  | api/products/{product}                  |
| POST      | api/quotation                           |
| GET|HEAD  | api/quotation                           |
| POST      | api/quotation-detail                    |
| GET|HEAD  | api/quotation-detail                    |
| DELETE    | api/quotation-detail/{quotation_detail} |
| PUT|PATCH | api/quotation-detail/{quotation_detail} |
| GET|HEAD  | api/quotation-detail/{quotation_detail} |
| POST      | api/quotation-history                   |
| GET|HEAD  | api/quotation-po                        |
| PUT|PATCH | api/quotation/{quotation}               |
| GET|HEAD  | api/quotation/{quotation}               |
| DELETE    | api/quotation/{quotation}               |
| GET|HEAD  | api/rfq                                 |
| POST      | api/rfq                                 |
| POST      | api/rfq-details                         |
| GET|HEAD  | api/rfq-details                         |
| PUT|PATCH | api/rfq-details/{rfq_detail}            |
| GET|HEAD  | api/rfq-details/{rfq_detail}            |
| DELETE    | api/rfq-details/{rfq_detail}            |
| POST      | api/rfq-history                         |
| PUT|PATCH | api/rfq/{rfq}                           |
| GET|HEAD  | api/rfq/{rfq}                           |
| DELETE    | api/rfq/{rfq}                           |
| GET|HEAD  | api/sale                                |
| POST      | api/sale                                |
| POST      | api/sale-detail                         |
| GET|HEAD  | api/sale-detail                         |
| GET|HEAD  | api/sale-detail/{sale_detail}           |
| PUT|PATCH | api/sale-detail/{sale_detail}           |
| DELETE    | api/sale-detail/{sale_detail}           |
| DELETE    | api/sale/{sale}                         |
| PUT|PATCH | api/sale/{sale}                         |
| GET|HEAD  | api/sale/{sale}                         |
| GET|HEAD  | api/sales-list                          |
| GET|HEAD  | api/sub-category/{id}                   |
| POST      | api/upload-file                         |
| GET|HEAD  | api/user                                |
|           |                                         |
| GET|HEAD  | api/users                               |
+-----------+-----------------------------------------+
```

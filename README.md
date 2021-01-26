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
+-----------+-----------------------------------------+--------------------------+
| Method    | URI                                     | Name                     |
+-----------+-----------------------------------------+--------------------------+
| GET|HEAD  | /                                       |                          |
| POST      | api/add-user                            | add.user                 |
| GET|HEAD  | api/analyse                             | analyse.index            |
| POST      | api/analyse                             | analyse.store            |
| PUT|PATCH | api/analyse/{analyse}                   | analyse.update           |
| GET|HEAD  | api/analyse/{analyse}                   | analyse.show             |
| DELETE    | api/analyse/{analyse}                   | analyse.destroy          |
| GET|HEAD  | api/categories                          | categories.index         |
| POST      | api/categories                          | categories.store         |
| GET|HEAD  | api/categories/{category}               | categories.show          |
| PUT|PATCH | api/categories/{category}               | categories.update        |
| DELETE    | api/categories/{category}               | categories.destroy       |
| GET|HEAD  | api/categorized-products/{id}           | categorized.products     |
| GET|HEAD  | api/category/{name}                     | category.name            |
| POST      | api/contact                             | contact.store            |
| GET|HEAD  | api/contact                             | contact.index            |
| PUT|PATCH | api/contact/{contact}                   | contact.update           |
| GET|HEAD  | api/contact/{contact}                   | contact.show             |
| DELETE    | api/contact/{contact}                   | contact.destroy          |
| POST      | api/employee                            | employee.store           |
| GET|HEAD  | api/employee                            | employee.index           |
| DELETE    | api/employee/{employee}                 | employee.destroy         |
| PUT|PATCH | api/employee/{employee}                 | employee.update          |
| GET|HEAD  | api/employee/{employee}                 | employee.show            |
| GET|HEAD  | api/expense                             | expense.index            |
| POST      | api/expense                             | expense.store            |
| GET|HEAD  | api/expense-paid                        | expense.paid             |
| DELETE    | api/expense/{expense}                   | expense.destroy          |
| PUT|PATCH | api/expense/{expense}                   | expense.update           |
| GET|HEAD  | api/expense/{expense}                   | expense.show             |
| GET|HEAD  | api/fileUpload                          | fileUpload.index         |
| POST      | api/fileUpload                          | fileUpload.store         |
| PUT|PATCH | api/fileUpload/{fileUpload}             | fileUpload.update        |
| DELETE    | api/fileUpload/{fileUpload}             | fileUpload.destroy       |
| GET|HEAD  | api/fileUpload/{fileUpload}             | fileUpload.show          |
| GET|HEAD  | api/invoice                             | invoice.index            |
| POST      | api/invoice                             | invoice.store            |
| POST      | api/invoice-detail                      | invoice-detail.store     |
| GET|HEAD  | api/invoice-detail                      | invoice-detail.index     |
| PUT|PATCH | api/invoice-detail/{invoice_detail}     | invoice-detail.update    |
| GET|HEAD  | api/invoice-detail/{invoice_detail}     | invoice-detail.show      |
| DELETE    | api/invoice-detail/{invoice_detail}     | invoice-detail.destroy   |
| POST      | api/invoice-history                     | invoice.history          |
| DELETE    | api/invoice/{invoice}                   | invoice.destroy          |
| GET|HEAD  | api/invoice/{invoice}                   | invoice.show             |
| PUT|PATCH | api/invoice/{invoice}                   | invoice.update           |
| GET|HEAD  | api/manufacturer                        | manufacturer.index       |
| POST      | api/manufacturer                        | manufacturer.store       |
| DELETE    | api/manufacturer/{manufacturer}         | manufacturer.destroy     |
| PUT|PATCH | api/manufacturer/{manufacturer}         | manufacturer.update      |
| GET|HEAD  | api/manufacturer/{manufacturer}         | manufacturer.show        |
| POST      | api/parties                             | parties.store            |
| GET|HEAD  | api/parties                             | parties.index            |
| GET|HEAD  | api/parties-except/{product}            | except.vendor            |
| GET|HEAD  | api/parties-vendor                      | parties.vendor           |
| DELETE    | api/parties/{party}                     | parties.destroy          |
| PUT|PATCH | api/parties/{party}                     | parties.update           |
| GET|HEAD  | api/parties/{party}                     | parties.show             |
| POST      | api/payment-account                     | payment-account.store    |
| GET|HEAD  | api/payment-account                     | payment-account.index    |
| DELETE    | api/payment-account/{payment_account}   | payment-account.destroy  |
| GET|HEAD  | api/payment-account/{payment_account}   | payment-account.show     |
| PUT|PATCH | api/payment-account/{payment_account}   | payment-account.update   |
| GET|HEAD  | api/product-price                       | product-price.index      |
| POST      | api/product-price                       | product-price.store      |
| DELETE    | api/product-price/{product_price}       | product-price.destroy    |
| PUT|PATCH | api/product-price/{product_price}       | product-price.update     |
| GET|HEAD  | api/product-price/{product_price}       | product-price.show       |
| GET|HEAD  | api/product-quotation-detail/{id}       | product.quotationdetail  |
| POST      | api/products                            | products.store           |
| GET|HEAD  | api/products                            | products.index           |
| GET|HEAD  | api/products-in-category                | products.in.category     |
| DELETE    | api/products/{product}                  | products.destroy         |
| PUT|PATCH | api/products/{product}                  | products.update          |
| GET|HEAD  | api/products/{product}                  | products.show            |
| GET|HEAD  | api/quotation                           | quotation.index          |
| POST      | api/quotation                           | quotation.store          |
| GET|HEAD  | api/quotation-detail                    | quotation-detail.index   |
| POST      | api/quotation-detail                    | quotation-detail.store   |
| PUT|PATCH | api/quotation-detail/{quotation_detail} | quotation-detail.update  |
| DELETE    | api/quotation-detail/{quotation_detail} | quotation-detail.destroy |
| GET|HEAD  | api/quotation-detail/{quotation_detail} | quotation-detail.show    |
| POST      | api/quotation-history                   | quotation.history        |
| GET|HEAD  | api/quotation-po                        | invoice.list             |
| GET|HEAD  | api/quotation/{quotation}               | quotation.show           |
| PUT|PATCH | api/quotation/{quotation}               | quotation.update         |
| DELETE    | api/quotation/{quotation}               | quotation.destroy        |
| POST      | api/rfq                                 | rfq.store                |
| GET|HEAD  | api/rfq                                 | rfq.index                |
| POST      | api/rfq-details                         | rfq-details.store        |
| GET|HEAD  | api/rfq-details                         | rfq-details.index        |
| GET|HEAD  | api/rfq-details/{rfq_detail}            | rfq-details.show         |
| DELETE    | api/rfq-details/{rfq_detail}            | rfq-details.destroy      |
| PUT|PATCH | api/rfq-details/{rfq_detail}            | rfq-details.update       |
| POST      | api/rfq-history                         | rfq.history              |
| GET|HEAD  | api/rfq/{rfq}                           | rfq.show                 |
| DELETE    | api/rfq/{rfq}                           | rfq.destroy              |
| PUT|PATCH | api/rfq/{rfq}                           | rfq.update               |
| POST      | api/sale                                | sale.store               |
| GET|HEAD  | api/sale                                | sale.index               |
| POST      | api/sale-detail                         | sale-detail.store        |
| GET|HEAD  | api/sale-detail                         | sale-detail.index        |
| DELETE    | api/sale-detail/{sale_detail}           | sale-detail.destroy      |
| PUT|PATCH | api/sale-detail/{sale_detail}           | sale-detail.update       |
| GET|HEAD  | api/sale-detail/{sale_detail}           | sale-detail.show         |
| DELETE    | api/sale/{sale}                         | sale.destroy             |
| PUT|PATCH | api/sale/{sale}                         | sale.update              |
| GET|HEAD  | api/sale/{sale}                         | sale.show                |
| GET|HEAD  | api/sub-category/{id}                   | subCategory              |
| POST      | api/upload-file                         | file.upload              |
| GET|HEAD  | api/user                                |                          |
|           |                                         |                          |
| GET|HEAD  | api/users                               |                          |
+-----------+-----------------------------------------+--------------------------+
```

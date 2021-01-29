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
+-----------+---------------------------------------------+----------------------------+
| Method    | URI                                         | Name                       |
+-----------+---------------------------------------------+----------------------------+
| GET|HEAD  | /                                           |                            |
| POST      | api/add-user                                | add.user                   |
| GET|HEAD  | api/analyse                                 | analyse.index              |
| POST      | api/analyse                                 | analyse.store              |
| PUT|PATCH | api/analyse/{analyse}                       | analyse.update             |
| GET|HEAD  | api/analyse/{analyse}                       | analyse.show               |
| DELETE    | api/analyse/{analyse}                       | analyse.destroy            |
| GET|HEAD  | api/categories                              | categories.index           |
| POST      | api/categories                              | categories.store           |
| GET|HEAD  | api/categories/{category}                   | categories.show            |
| PUT|PATCH | api/categories/{category}                   | categories.update          |
| DELETE    | api/categories/{category}                   | categories.destroy         |
| GET|HEAD  | api/categorized-products/{id}               | categorized.products       |
| GET|HEAD  | api/category/{name}                         | category.name              |
| POST      | api/contact                                 | contact.store              |
| GET|HEAD  | api/contact                                 | contact.index              |
| DELETE    | api/contact/{contact}                       | contact.destroy            |
| PUT|PATCH | api/contact/{contact}                       | contact.update             |
| GET|HEAD  | api/contact/{contact}                       | contact.show               |
| GET|HEAD  | api/customer-list                           | customer.list              |
| GET|HEAD  | api/employee                                | employee.index             |
| POST      | api/employee                                | employee.store             |
| DELETE    | api/employee/{employee}                     | employee.destroy           |
| GET|HEAD  | api/employee/{employee}                     | employee.show              |
| PUT|PATCH | api/employee/{employee}                     | employee.update            |
| POST      | api/expense                                 | expense.store              |
| GET|HEAD  | api/expense                                 | expense.index              |
| GET|HEAD  | api/expense-paid                            | expense.paid               |
| PUT|PATCH | api/expense/{expense}                       | expense.update             |
| DELETE    | api/expense/{expense}                       | expense.destroy            |
| GET|HEAD  | api/expense/{expense}                       | expense.show               |
| POST      | api/fileUpload                              | fileUpload.store           |
| GET|HEAD  | api/fileUpload                              | fileUpload.index           |
| DELETE    | api/fileUpload/{fileUpload}                 | fileUpload.destroy         |
| PUT|PATCH | api/fileUpload/{fileUpload}                 | fileUpload.update          |
| GET|HEAD  | api/fileUpload/{fileUpload}                 | fileUpload.show            |
| POST      | api/invoice                                 | invoice.store              |
| GET|HEAD  | api/invoice                                 | invoice.index              |
| POST      | api/invoice-detail                          | invoice-detail.store       |
| GET|HEAD  | api/invoice-detail                          | invoice-detail.index       |
| DELETE    | api/invoice-detail/{invoice_detail}         | invoice-detail.destroy     |
| PUT|PATCH | api/invoice-detail/{invoice_detail}         | invoice-detail.update      |
| GET|HEAD  | api/invoice-detail/{invoice_detail}         | invoice-detail.show        |
| POST      | api/invoice-history                         | invoice.history            |
| PUT|PATCH | api/invoice/{invoice}                       | invoice.update             |
| DELETE    | api/invoice/{invoice}                       | invoice.destroy            |
| GET|HEAD  | api/invoice/{invoice}                       | invoice.show               |
| GET|HEAD  | api/manufacturer                            | manufacturer.index         |
| POST      | api/manufacturer                            | manufacturer.store         |
| GET|HEAD  | api/manufacturer/{manufacturer}             | manufacturer.show          |
| PUT|PATCH | api/manufacturer/{manufacturer}             | manufacturer.update        |
| DELETE    | api/manufacturer/{manufacturer}             | manufacturer.destroy       |
| GET|HEAD  | api/parties                                 | parties.index              |
| POST      | api/parties                                 | parties.store              |
| GET|HEAD  | api/parties-except/{product}                | except.vendor              |
| GET|HEAD  | api/parties-vendor                          | parties.vendor             |
| DELETE    | api/parties/{party}                         | parties.destroy            |
| PUT|PATCH | api/parties/{party}                         | parties.update             |
| GET|HEAD  | api/parties/{party}                         | parties.show               |
| POST      | api/payment-account                         | payment-account.store      |
| GET|HEAD  | api/payment-account                         | payment-account.index      |
| PUT|PATCH | api/payment-account/{payment_account}       | payment-account.update     |
| DELETE    | api/payment-account/{payment_account}       | payment-account.destroy    |
| GET|HEAD  | api/payment-account/{payment_account}       | payment-account.show       |
| POST      | api/product-price                           | product-price.store        |
| GET|HEAD  | api/product-price                           | product-price.index        |
| PUT|PATCH | api/product-price/{product_price}           | product-price.update       |
| GET|HEAD  | api/product-price/{product_price}           | product-price.show         |
| DELETE    | api/product-price/{product_price}           | product-price.destroy      |
| GET|HEAD  | api/product-quotation-detail/{id}           | product.quotationdetail    |
| GET|HEAD  | api/products                                | products.index             |
| POST      | api/products                                | products.store             |
| GET|HEAD  | api/products-in-category                    | products.in.category       |
| DELETE    | api/products/{product}                      | products.destroy           |
| GET|HEAD  | api/products/{product}                      | products.show              |
| PUT|PATCH | api/products/{product}                      | products.update            |
| POST      | api/purchase-quotation                      | purchase-quotation.store   |
| GET|HEAD  | api/purchase-quotation                      | purchase-quotation.index   |
| GET|HEAD  | api/purchase-quotation/{purchase_quotation} | purchase-quotation.show    |
| DELETE    | api/purchase-quotation/{purchase_quotation} | purchase-quotation.destroy |
| PUT|PATCH | api/purchase-quotation/{purchase_quotation} | purchase-quotation.update  |
| POST      | api/quotation-detail                        | quotation-detail.store     |
| GET|HEAD  | api/quotation-detail                        | quotation-detail.index     |
| GET|HEAD  | api/quotation-detail/{quotation_detail}     | quotation-detail.show      |
| PUT|PATCH | api/quotation-detail/{quotation_detail}     | quotation-detail.update    |
| DELETE    | api/quotation-detail/{quotation_detail}     | quotation-detail.destroy   |
| POST      | api/quotation-history                       | quotation.history          |
| GET|HEAD  | api/quotation-po                            | invoice.list               |
| POST      | api/rfq                                     | rfq.store                  |
| GET|HEAD  | api/rfq                                     | rfq.index                  |
| POST      | api/rfq-details                             | rfq-details.store          |
| GET|HEAD  | api/rfq-details                             | rfq-details.index          |
| DELETE    | api/rfq-details/{rfq_detail}                | rfq-details.destroy        |
| PUT|PATCH | api/rfq-details/{rfq_detail}                | rfq-details.update         |
| GET|HEAD  | api/rfq-details/{rfq_detail}                | rfq-details.show           |
| POST      | api/rfq-history                             | rfq.history                |
| GET|HEAD  | api/rfq/{rfq}                               | rfq.show                   |
| PUT|PATCH | api/rfq/{rfq}                               | rfq.update                 |
| DELETE    | api/rfq/{rfq}                               | rfq.destroy                |
| POST      | api/sale                                    | sale.store                 |
| GET|HEAD  | api/sale                                    | sale.index                 |
| POST      | api/sale-detail                             | sale-detail.store          |
| GET|HEAD  | api/sale-detail                             | sale-detail.index          |
| DELETE    | api/sale-detail/{sale_detail}               | sale-detail.destroy        |
| PUT|PATCH | api/sale-detail/{sale_detail}               | sale-detail.update         |
| GET|HEAD  | api/sale-detail/{sale_detail}               | sale-detail.show           |
| POST      | api/sale-quotation                          | sale-quotation.store       |
| GET|HEAD  | api/sale-quotation                          | sale-quotation.index       |
| DELETE    | api/sale-quotation/{sale_quotation}         | sale-quotation.destroy     |
| PUT|PATCH | api/sale-quotation/{sale_quotation}         | sale-quotation.update      |
| GET|HEAD  | api/sale-quotation/{sale_quotation}         | sale-quotation.show        |
| PUT|PATCH | api/sale/{sale}                             | sale.update                |
| DELETE    | api/sale/{sale}                             | sale.destroy               |
| GET|HEAD  | api/sale/{sale}                             | sale.show                  |
| GET|HEAD  | api/sales-list                              | sales.list                 |
| GET|HEAD  | api/sub-category/{id}                       | subCategory                |
| POST      | api/upload-file                             | file.upload                |
| GET|HEAD  | api/user                                    |                            |
|           |                                             |                            |
| GET|HEAD  | api/users                                   |                            |
+-----------+---------------------------------------------+----------------------------+
```

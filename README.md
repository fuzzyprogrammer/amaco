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
| POST      | api/categories                              | categories.store           |
| GET|HEAD  | api/categories                              | categories.index           |
| DELETE    | api/categories/{category}                   | categories.destroy         |
| GET|HEAD  | api/categories/{category}                   | categories.show            |
| PUT|PATCH | api/categories/{category}                   | categories.update          |
| GET|HEAD  | api/categorized-products/{id}               | categorized.products       |
| GET|HEAD  | api/category/{name}                         | category.name              |
| GET|HEAD  | api/contact                                 | contact.index              |
| POST      | api/contact                                 | contact.store              |
| DELETE    | api/contact/{contact}                       | contact.destroy            |
| GET|HEAD  | api/contact/{contact}                       | contact.show               |
| PUT|PATCH | api/contact/{contact}                       | contact.update             |
| GET|HEAD  | api/customer-list                           | customer.list              |
| POST      | api/employee                                | employee.store             |
| GET|HEAD  | api/employee                                | employee.index             |
| DELETE    | api/employee/{employee}                     | employee.destroy           |
| PUT|PATCH | api/employee/{employee}                     | employee.update            |
| GET|HEAD  | api/employee/{employee}                     | employee.show              |
| GET|HEAD  | api/expense                                 | expense.index              |
| POST      | api/expense                                 | expense.store              |
| GET|HEAD  | api/expense-paid                            | expense.paid               |
| PUT|PATCH | api/expense/{expense}                       | expense.update             |
| DELETE    | api/expense/{expense}                       | expense.destroy            |
| GET|HEAD  | api/expense/{expense}                       | expense.show               |
| POST      | api/fileUpload                              | fileUpload.store           |
| GET|HEAD  | api/fileUpload                              | fileUpload.index           |
| PUT|PATCH | api/fileUpload/{fileUpload}                 | fileUpload.update          |
| GET|HEAD  | api/fileUpload/{fileUpload}                 | fileUpload.show            |
| DELETE    | api/fileUpload/{fileUpload}                 | fileUpload.destroy         |
| POST      | api/invoice                                 | invoice.store              |
| GET|HEAD  | api/invoice                                 | invoice.index              |
| GET|HEAD  | api/invoice-detail                          | invoice-detail.index       |
| POST      | api/invoice-detail                          | invoice-detail.store       |
| GET|HEAD  | api/invoice-detail/{invoice_detail}         | invoice-detail.show        |
| PUT|PATCH | api/invoice-detail/{invoice_detail}         | invoice-detail.update      |
| DELETE    | api/invoice-detail/{invoice_detail}         | invoice-detail.destroy     |
| POST      | api/invoice-history                         | invoice.history            |
| DELETE    | api/invoice/{invoice}                       | invoice.destroy            |
| PUT|PATCH | api/invoice/{invoice}                       | invoice.update             |
| GET|HEAD  | api/invoice/{invoice}                       | invoice.show               |
| GET|HEAD  | api/manufacturer                            | manufacturer.index         |
| POST      | api/manufacturer                            | manufacturer.store         |
| DELETE    | api/manufacturer/{manufacturer}             | manufacturer.destroy       |
| GET|HEAD  | api/manufacturer/{manufacturer}             | manufacturer.show          |
| PUT|PATCH | api/manufacturer/{manufacturer}             | manufacturer.update        |
| POST      | api/parties                                 | parties.store              |
| GET|HEAD  | api/parties                                 | parties.index              |
| GET|HEAD  | api/parties-except/{product}                | except.vendor              |
| GET|HEAD  | api/parties-vendor                          | parties.vendor             |
| PUT|PATCH | api/parties/{party}                         | parties.update             |
| DELETE    | api/parties/{party}                         | parties.destroy            |
| GET|HEAD  | api/parties/{party}                         | parties.show               |
| POST      | api/payment-account                         | payment-account.store      |
| GET|HEAD  | api/payment-account                         | payment-account.index      |
| GET|HEAD  | api/payment-account/{payment_account}       | payment-account.show       |
| PUT|PATCH | api/payment-account/{payment_account}       | payment-account.update     |
| DELETE    | api/payment-account/{payment_account}       | payment-account.destroy    |
| POST      | api/product-price                           | product-price.store        |
| GET|HEAD  | api/product-price                           | product-price.index        |
| DELETE    | api/product-price/{product_price}           | product-price.destroy      |
| PUT|PATCH | api/product-price/{product_price}           | product-price.update       |
| GET|HEAD  | api/product-price/{product_price}           | product-price.show         |
| GET|HEAD  | api/product-quotation-detail/{id}           | product.quotationdetail    |
| POST      | api/products                                | products.store             |
| GET|HEAD  | api/products                                | products.index             |
| GET|HEAD  | api/products-in-category                    | products.in.category       |
| PUT|PATCH | api/products/{product}                      | products.update            |
| DELETE    | api/products/{product}                      | products.destroy           |
| GET|HEAD  | api/products/{product}                      | products.show              |
| GET|HEAD  | api/purchase-invoice                        | purchase-invoice.index     |
| POST      | api/purchase-invoice                        | purchase-invoice.store     |
| GET|HEAD  | api/purchase-invoice-list                   |                            |
| DELETE    | api/purchase-invoice/{purchase_invoice}     | purchase-invoice.destroy   |
| GET|HEAD  | api/purchase-invoice/{purchase_invoice}     | purchase-invoice.show      |
| PUT|PATCH | api/purchase-invoice/{purchase_invoice}     | purchase-invoice.update    |
| POST      | api/purchase-quotation                      | purchase-quotation.store   |
| GET|HEAD  | api/purchase-quotation                      | purchase-quotation.index   |
| GET|HEAD  | api/purchase-quotation/{purchase_quotation} | purchase-quotation.show    |
| PUT|PATCH | api/purchase-quotation/{purchase_quotation} | purchase-quotation.update  |
| DELETE    | api/purchase-quotation/{purchase_quotation} | purchase-quotation.destroy |
| POST      | api/quotation-detail                        | quotation-detail.store     |
| GET|HEAD  | api/quotation-detail                        | quotation-detail.index     |
| DELETE    | api/quotation-detail/{quotation_detail}     | quotation-detail.destroy   |
| PUT|PATCH | api/quotation-detail/{quotation_detail}     | quotation-detail.update    |
| GET|HEAD  | api/quotation-detail/{quotation_detail}     | quotation-detail.show      |
| POST      | api/quotation-history                       | quotation.history          |
| GET|HEAD  | api/quotation-po                            | invoice.list               |
| GET|HEAD  | api/rfq                                     | rfq.index                  |
| POST      | api/rfq                                     | rfq.store                  |
| POST      | api/rfq-details                             | rfq-details.store          |
| GET|HEAD  | api/rfq-details                             | rfq-details.index          |
| DELETE    | api/rfq-details/{rfq_detail}                | rfq-details.destroy        |
| PUT|PATCH | api/rfq-details/{rfq_detail}                | rfq-details.update         |
| GET|HEAD  | api/rfq-details/{rfq_detail}                | rfq-details.show           |
| POST      | api/rfq-history                             | rfq.history                |
| GET|HEAD  | api/rfq/{rfq}                               | rfq.show                   |
| PUT|PATCH | api/rfq/{rfq}                               | rfq.update                 |
| DELETE    | api/rfq/{rfq}                               | rfq.destroy                |
| GET|HEAD  | api/sale                                    | sale.index                 |
| POST      | api/sale                                    | sale.store                 |
| POST      | api/sale-detail                             | sale-detail.store          |
| GET|HEAD  | api/sale-detail                             | sale-detail.index          |
| DELETE    | api/sale-detail/{sale_detail}               | sale-detail.destroy        |
| PUT|PATCH | api/sale-detail/{sale_detail}               | sale-detail.update         |
| GET|HEAD  | api/sale-detail/{sale_detail}               | sale-detail.show           |
| GET|HEAD  | api/sale-quotation                          | sale-quotation.index       |
| POST      | api/sale-quotation                          | sale-quotation.store       |
| GET|HEAD  | api/sale-quotation/{sale_quotation}         | sale-quotation.show        |
| PUT|PATCH | api/sale-quotation/{sale_quotation}         | sale-quotation.update      |
| DELETE    | api/sale-quotation/{sale_quotation}         | sale-quotation.destroy     |
| GET|HEAD  | api/sale/{sale}                             | sale.show                  |
| PUT|PATCH | api/sale/{sale}                             | sale.update                |
| DELETE    | api/sale/{sale}                             | sale.destroy               |
| GET|HEAD  | api/sales-list                              | sales.list                 |
| GET|HEAD  | api/sub-category/{id}                       | subCategory                |
| POST      | api/upload-file                             | file.upload                |
| GET|HEAD  | api/user                                    |                            |
|           |                                             |                            |
| GET|HEAD  | api/users                                   |                            |
+-----------+---------------------------------------------+----------------------------+
```

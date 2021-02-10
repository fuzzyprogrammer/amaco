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
+-----------+----------------------------------------------------+--------------------------------+
| Method    | URI                                                | Name                           |
+-----------+----------------------------------------------------+--------------------------------+
| GET|HEAD  | /                                                  |                                |
| GET|HEAD  | api/account-categories                             | account-categories.index       |
| POST      | api/account-categories                             | account-categories.store       |
| GET|HEAD  | api/account-categories-search/{name}               | account.category.search        |
| DELETE    | api/account-categories/{account_category}          | account-categories.destroy     |
| PUT|PATCH | api/account-categories/{account_category}          | account-categories.update      |
| GET|HEAD  | api/account-categories/{account_category}          | account-categories.show        |
| GET|HEAD  | api/account-subcategories/{id}                     | account.category.subcategory   |
| POST      | api/add-user                                       | add.user                       |
| POST      | api/analyse                                        | analyse.store                  |
| GET|HEAD  | api/analyse                                        | analyse.index                  |
| GET|HEAD  | api/analyse/{analyse}                              | analyse.show                   |
| PUT|PATCH | api/analyse/{analyse}                              | analyse.update                 |
| DELETE    | api/analyse/{analyse}                              | analyse.destroy                |
| POST      | api/auth/login                                     |                                |
| POST      | api/auth/logout                                    |                                |
|           |                                                    |                                |
| POST      | api/auth/me                                        |                                |
|           |                                                    |                                |
| POST      | api/auth/refresh                                   |                                |
|           |                                                    |                                |
| GET|HEAD  | api/categories                                     | categories.index               |
| POST      | api/categories                                     | categories.store               |
| GET|HEAD  | api/categories/{category}                          | categories.show                |
| PUT|PATCH | api/categories/{category}                          | categories.update              |
| DELETE    | api/categories/{category}                          | categories.destroy             |
| GET|HEAD  | api/categorized-products/{id}                      | categorized.products           |
| GET|HEAD  | api/category/{name}                                | category.name                  |
| POST      | api/columnDatas                                    | columnDatas.store              |
| GET|HEAD  | api/columnDatas                                    | columnDatas.index              |
| DELETE    | api/columnDatas/{columnData}                       | columnDatas.destroy            |
| PUT|PATCH | api/columnDatas/{columnData}                       | columnDatas.update             |
| GET|HEAD  | api/columnDatas/{columnData}                       | columnDatas.show               |
| GET|HEAD  | api/columns                                        | columns.index                  |
| POST      | api/columns                                        | columns.store                  |
| GET|HEAD  | api/columns/{column}                               | columns.show                   |
| DELETE    | api/columns/{column}                               | columns.destroy                |
| PUT|PATCH | api/columns/{column}                               | columns.update                 |
| GET|HEAD  | api/contact                                        | contact.index                  |
| POST      | api/contact                                        | contact.store                  |
| PUT|PATCH | api/contact/{contact}                              | contact.update                 |
| DELETE    | api/contact/{contact}                              | contact.destroy                |
| GET|HEAD  | api/contact/{contact}                              | contact.show                   |
| GET|HEAD  | api/customer-list                                  | customer.list                  |
| POST      | api/delivery-notes                                 | delivery-notes.store           |
| GET|HEAD  | api/delivery-notes                                 | delivery-notes.index           |
| POST      | api/delivery-notes-details                         | delivery-notes-details.store   |
| GET|HEAD  | api/delivery-notes-details                         | delivery-notes-details.index   |
| GET|HEAD  | api/delivery-notes-details/{delivery_notes_detail} | delivery-notes-details.show    |
| PUT|PATCH | api/delivery-notes-details/{delivery_notes_detail} | delivery-notes-details.update  |
| DELETE    | api/delivery-notes-details/{delivery_notes_detail} | delivery-notes-details.destroy |
| PUT|PATCH | api/delivery-notes/{delivery_note}                 | delivery-notes.update          |
| DELETE    | api/delivery-notes/{delivery_note}                 | delivery-notes.destroy         |
| GET|HEAD  | api/delivery-notes/{delivery_note}                 | delivery-notes.show            |
| POST      | api/employee                                       | employee.store                 |
| GET|HEAD  | api/employee                                       | employee.index                 |
| DELETE    | api/employee/{employee}                            | employee.destroy               |
| GET|HEAD  | api/employee/{employee}                            | employee.show                  |
| PUT|PATCH | api/employee/{employee}                            | employee.update                |
| POST      | api/expense                                        | expense.store                  |
| GET|HEAD  | api/expense                                        | expense.index                  |
| GET|HEAD  | api/expense-paid                                   | expense.paid                   |
| PUT|PATCH | api/expense/{expense}                              | expense.update                 |
| DELETE    | api/expense/{expense}                              | expense.destroy                |
| GET|HEAD  | api/expense/{expense}                              | expense.show                   |
| GET|HEAD  | api/fileUpload                                     | fileUpload.index               |
| POST      | api/fileUpload                                     | fileUpload.store               |
| GET|HEAD  | api/fileUpload/{fileUpload}                        | fileUpload.show                |
| PUT|PATCH | api/fileUpload/{fileUpload}                        | fileUpload.update              |
| DELETE    | api/fileUpload/{fileUpload}                        | fileUpload.destroy             |
| GET|HEAD  | api/invoice                                        | invoice.index                  |
| POST      | api/invoice                                        | invoice.store                  |
| GET|HEAD  | api/invoice-detail                                 | invoice-detail.index           |
| POST      | api/invoice-detail                                 | invoice-detail.store           |
| GET|HEAD  | api/invoice-detail/{invoice_detail}                | invoice-detail.show            |
| PUT|PATCH | api/invoice-detail/{invoice_detail}                | invoice-detail.update          |
| DELETE    | api/invoice-detail/{invoice_detail}                | invoice-detail.destroy         |
| POST      | api/invoice-history                                | invoice.history                |
| DELETE    | api/invoice/{invoice}                              | invoice.destroy                |
| GET|HEAD  | api/invoice/{invoice}                              | invoice.show                   |
| PUT|PATCH | api/invoice/{invoice}                              | invoice.update                 |
| GET|HEAD  | api/manufacturer                                   | manufacturer.index             |
| POST      | api/manufacturer                                   | manufacturer.store             |
| DELETE    | api/manufacturer/{manufacturer}                    | manufacturer.destroy           |
| GET|HEAD  | api/manufacturer/{manufacturer}                    | manufacturer.show              |
| PUT|PATCH | api/manufacturer/{manufacturer}                    | manufacturer.update            |
| POST      | api/parties                                        | parties.store                  |
| GET|HEAD  | api/parties                                        | parties.index                  |
| GET|HEAD  | api/parties-except/{product}                       | except.vendor                  |
| GET|HEAD  | api/parties-vendor                                 | parties.vendor                 |
| PUT|PATCH | api/parties/{party}                                | parties.update                 |
| DELETE    | api/parties/{party}                                | parties.destroy                |
| GET|HEAD  | api/parties/{party}                                | parties.show                   |
| POST      | api/payment-account                                | payment-account.store          |
| GET|HEAD  | api/payment-account                                | payment-account.index          |
| GET|HEAD  | api/payment-account/{payment_account}              | payment-account.show           |
| DELETE    | api/payment-account/{payment_account}              | payment-account.destroy        |
| PUT|PATCH | api/payment-account/{payment_account}              | payment-account.update         |
| GET|HEAD  | api/product-price                                  | product-price.index            |
| POST      | api/product-price                                  | product-price.store            |
| GET|HEAD  | api/product-price/{product_price}                  | product-price.show             |
| PUT|PATCH | api/product-price/{product_price}                  | product-price.update           |
| DELETE    | api/product-price/{product_price}                  | product-price.destroy          |
| GET|HEAD  | api/product-quotation-detail/{id}                  | product.quotationdetail        |
| GET|HEAD  | api/products                                       | products.index                 |
| POST      | api/products                                       | products.store                 |
| GET|HEAD  | api/products-in-category                           | products.in.category           |
| GET|HEAD  | api/products/{product}                             | products.show                  |
| DELETE    | api/products/{product}                             | products.destroy               |
| PUT|PATCH | api/products/{product}                             | products.update                |
| POST      | api/purchase-invoice                               | purchase-invoice.store         |
| GET|HEAD  | api/purchase-invoice                               | purchase-invoice.index         |
| GET|HEAD  | api/purchase-invoice-list                          | purchase.invoice.list          |
| DELETE    | api/purchase-invoice/{purchase_invoice}            | purchase-invoice.destroy       |
| GET|HEAD  | api/purchase-invoice/{purchase_invoice}            | purchase-invoice.show          |
| PUT|PATCH | api/purchase-invoice/{purchase_invoice}            | purchase-invoice.update        |
| POST      | api/purchase-quotation                             | purchase-quotation.store       |
| GET|HEAD  | api/purchase-quotation                             | purchase-quotation.index       |
| DELETE    | api/purchase-quotation/{purchase_quotation}        | purchase-quotation.destroy     |
| PUT|PATCH | api/purchase-quotation/{purchase_quotation}        | purchase-quotation.update      |
| GET|HEAD  | api/purchase-quotation/{purchase_quotation}        | purchase-quotation.show        |
| POST      | api/quotation-detail                               | quotation-detail.store         |
| GET|HEAD  | api/quotation-detail                               | quotation-detail.index         |
| GET|HEAD  | api/quotation-detail/{quotation_detail}            | quotation-detail.show          |
| DELETE    | api/quotation-detail/{quotation_detail}            | quotation-detail.destroy       |
| PUT|PATCH | api/quotation-detail/{quotation_detail}            | quotation-detail.update        |
| POST      | api/quotation-history                              | quotation.history              |
| GET|HEAD  | api/quotation-po                                   | invoice.list                   |
| GET|HEAD  | api/quotations-accepted-list                       | quotaions.accepted.list        |
| GET|HEAD  | api/quotations-rejected-list                       | quotaions.rejected.list        |
| POST      | api/rfq                                            | rfq.store                      |
| GET|HEAD  | api/rfq                                            | rfq.index                      |
| POST      | api/rfq-details                                    | rfq-details.store              |
| GET|HEAD  | api/rfq-details                                    | rfq-details.index              |
| DELETE    | api/rfq-details/{rfq_detail}                       | rfq-details.destroy            |
| GET|HEAD  | api/rfq-details/{rfq_detail}                       | rfq-details.show               |
| PUT|PATCH | api/rfq-details/{rfq_detail}                       | rfq-details.update             |
| POST      | api/rfq-history                                    | rfq.history                    |
| GET|HEAD  | api/rfq/{rfq}                                      | rfq.show                       |
| PUT|PATCH | api/rfq/{rfq}                                      | rfq.update                     |
| DELETE    | api/rfq/{rfq}                                      | rfq.destroy                    |
| GET|HEAD  | api/sale                                           | sale.index                     |
| POST      | api/sale                                           | sale.store                     |
| GET|HEAD  | api/sale-detail                                    | sale-detail.index              |
| POST      | api/sale-detail                                    | sale-detail.store              |
| GET|HEAD  | api/sale-detail/{sale_detail}                      | sale-detail.show               |
| PUT|PATCH | api/sale-detail/{sale_detail}                      | sale-detail.update             |
| DELETE    | api/sale-detail/{sale_detail}                      | sale-detail.destroy            |
| GET|HEAD  | api/sale-quotation                                 | sale-quotation.index           |
| POST      | api/sale-quotation                                 | sale-quotation.store           |
| GET|HEAD  | api/sale-quotation/{sale_quotation}                | sale-quotation.show            |
| PUT|PATCH | api/sale-quotation/{sale_quotation}                | sale-quotation.update          |
| DELETE    | api/sale-quotation/{sale_quotation}                | sale-quotation.destroy         |
| GET|HEAD  | api/sale/{sale}                                    | sale.show                      |
| PUT|PATCH | api/sale/{sale}                                    | sale.update                    |
| DELETE    | api/sale/{sale}                                    | sale.destroy                   |
| GET|HEAD  | api/sales-list                                     | sales.list                     |
| GET|HEAD  | api/sub-category/{id}                              | subCategory                    |
| POST      | api/upload-file                                    | file.upload                    |
| GET|HEAD  | api/user                                           |                                |
|           |                                                    |                                |
| GET|HEAD  | api/users                                          |                                |
+-----------+----------------------------------------------------+--------------------------------+
```

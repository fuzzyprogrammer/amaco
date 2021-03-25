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
| POST      | api/account-categories                             | account-categories.store       |
| GET|HEAD  | api/account-categories                             | account-categories.index       |
| GET|HEAD  | api/account-categories-search/{name}               | account.category.search        |
| GET|HEAD  | api/account-categories/{account_category}          | account-categories.show        |
| DELETE    | api/account-categories/{account_category}          | account-categories.destroy     |
| PUT|PATCH | api/account-categories/{account_category}          | account-categories.update      |
| POST      | api/account-statement                              |                                |
| GET|HEAD  | api/account-subcategories/{id}                     | account.category.subcategory   |
| POST      | api/add-user                                       | add.user                       |
| POST      | api/advance-payment-statement                      |                                |
| GET|HEAD  | api/advance-payments                               | advance-payments.index         |
| POST      | api/advance-payments                               | advance-payments.store         |
| GET|HEAD  | api/advance-payments/{advance_payment}             | advance-payments.show          |
| PUT|PATCH | api/advance-payments/{advance_payment}             | advance-payments.update        |
| DELETE    | api/advance-payments/{advance_payment}             | advance-payments.destroy       |
| POST      | api/all-account-statement                          |                                |
| POST      | api/all-advance-payment-statement                  |                                |
| POST      | api/analyse                                        | analyse.store                  |
| GET|HEAD  | api/analyse                                        | analyse.index                  |
| PUT|PATCH | api/analyse/{analyse}                              | analyse.update                 |
| DELETE    | api/analyse/{analyse}                              | analyse.destroy                |
| GET|HEAD  | api/analyse/{analyse}                              | analyse.show                   |
| POST      | api/auth/login                                     |                                |
| POST      | api/auth/logout                                    |                                |
|           |                                                    |                                |
| POST      | api/auth/me                                        |                                |
|           |                                                    |                                |
| POST      | api/auth/refresh                                   |                                |
|           |                                                    |                                |
| POST      | api/categories                                     | categories.store               |
| GET|HEAD  | api/categories                                     | categories.index               |
| DELETE    | api/categories/{category}                          | categories.destroy             |
| PUT|PATCH | api/categories/{category}                          | categories.update              |
| GET|HEAD  | api/categories/{category}                          | categories.show                |
| GET|HEAD  | api/categorized-products/{id}                      | categorized.products           |
| GET|HEAD  | api/category/{name}                                | category.name                  |
| GET|HEAD  | api/columnDatas                                    | columnDatas.index              |
| POST      | api/columnDatas                                    | columnDatas.store              |
| DELETE    | api/columnDatas/{columnData}                       | columnDatas.destroy            |
| PUT|PATCH | api/columnDatas/{columnData}                       | columnDatas.update             |
| GET|HEAD  | api/columnDatas/{columnData}                       | columnDatas.show               |
| GET|HEAD  | api/columns                                        | columns.index                  |
| POST      | api/columns                                        | columns.store                  |
| PUT|PATCH | api/columns/{column}                               | columns.update                 |
| DELETE    | api/columns/{column}                               | columns.destroy                |
| GET|HEAD  | api/columns/{column}                               | columns.show                   |
| POST      | api/contact                                        | contact.store                  |
| GET|HEAD  | api/contact                                        | contact.index                  |
| GET|HEAD  | api/contact/{contact}                              | contact.show                   |
| DELETE    | api/contact/{contact}                              | contact.destroy                |
| PUT|PATCH | api/contact/{contact}                              | contact.update                 |
| GET|HEAD  | api/customer-list                                  | customer.list                  |
| POST      | api/delivery-notes                                 | delivery-notes.store           |
| GET|HEAD  | api/delivery-notes                                 | delivery-notes.index           |
| POST      | api/delivery-notes-details                         | delivery-notes-details.store   |
| GET|HEAD  | api/delivery-notes-details                         | delivery-notes-details.index   |
| GET|HEAD  | api/delivery-notes-details/{delivery_notes_detail} | delivery-notes-details.show    |
| PUT|PATCH | api/delivery-notes-details/{delivery_notes_detail} | delivery-notes-details.update  |
| DELETE    | api/delivery-notes-details/{delivery_notes_detail} | delivery-notes-details.destroy |
| GET|HEAD  | api/delivery-notes/{delivery_note}                 | delivery-notes.show            |
| PUT|PATCH | api/delivery-notes/{delivery_note}                 | delivery-notes.update          |
| DELETE    | api/delivery-notes/{delivery_note}                 | delivery-notes.destroy         |
| GET|HEAD  | api/employee                                       | employee.index                 |
| POST      | api/employee                                       | employee.store                 |
| GET|HEAD  | api/employee/{employee}                            | employee.show                  |
| PUT|PATCH | api/employee/{employee}                            | employee.update                |
| DELETE    | api/employee/{employee}                            | employee.destroy               |
| POST      | api/expense                                        | expense.store                  |
| GET|HEAD  | api/expense                                        | expense.index                  |
| GET|HEAD  | api/expense-paid                                   | expense.paid                   |
| DELETE    | api/expense/{expense}                              | expense.destroy                |
| GET|HEAD  | api/expense/{expense}                              | expense.show                   |
| PUT|PATCH | api/expense/{expense}                              | expense.update                 |
| GET|HEAD  | api/fileUpload                                     | fileUpload.index               |
| POST      | api/fileUpload                                     | fileUpload.store               |
| DELETE    | api/fileUpload/{fileUpload}                        | fileUpload.destroy             |
| PUT|PATCH | api/fileUpload/{fileUpload}                        | fileUpload.update              |
| GET|HEAD  | api/fileUpload/{fileUpload}                        | fileUpload.show                |
| GET|HEAD  | api/invoice                                        | invoice.index                  |
| POST      | api/invoice                                        | invoice.store                  |
| GET|HEAD  | api/invoice-detail                                 | invoice-detail.index           |
| POST      | api/invoice-detail                                 | invoice-detail.store           |
| GET|HEAD  | api/invoice-detail/{invoice_detail}                | invoice-detail.show            |
| PUT|PATCH | api/invoice-detail/{invoice_detail}                | invoice-detail.update          |
| DELETE    | api/invoice-detail/{invoice_detail}                | invoice-detail.destroy         |
| POST      | api/invoice-history                                | invoice.history                |
| PUT|PATCH | api/invoice/{invoice}                              | invoice.update                 |
| DELETE    | api/invoice/{invoice}                              | invoice.destroy                |
| GET|HEAD  | api/invoice/{invoice}                              | invoice.show                   |
| GET|HEAD  | api/manufacturer                                   | manufacturer.index             |
| POST      | api/manufacturer                                   | manufacturer.store             |
| GET|HEAD  | api/manufacturer/{manufacturer}                    | manufacturer.show              |
| PUT|PATCH | api/manufacturer/{manufacturer}                    | manufacturer.update            |
| DELETE    | api/manufacturer/{manufacturer}                    | manufacturer.destroy           |
| POST      | api/old-password                                   |                                |
| GET|HEAD  | api/parties                                        | parties.index                  |
| POST      | api/parties                                        | parties.store                  |
| GET|HEAD  | api/parties-except/{product}                       | except.vendor                  |
| GET|HEAD  | api/parties-vendor                                 | parties.vendor                 |
| GET|HEAD  | api/parties/{party}                                | parties.show                   |
| PUT|PATCH | api/parties/{party}                                | parties.update                 |
| DELETE    | api/parties/{party}                                | parties.destroy                |
| POST      | api/payment-account                                | payment-account.store          |
| GET|HEAD  | api/payment-account                                | payment-account.index          |
| GET|HEAD  | api/payment-account/{payment_account}              | payment-account.show           |
| PUT|PATCH | api/payment-account/{payment_account}              | payment-account.update         |
| DELETE    | api/payment-account/{payment_account}              | payment-account.destroy        |
| POST      | api/product-price                                  | product-price.store            |
| GET|HEAD  | api/product-price                                  | product-price.index            |
| DELETE    | api/product-price/{product_price}                  | product-price.destroy          |
| PUT|PATCH | api/product-price/{product_price}                  | product-price.update           |
| GET|HEAD  | api/product-price/{product_price}                  | product-price.show             |
| GET|HEAD  | api/product-quotation-detail/{id}                  | product.quotationdetail        |
| GET|HEAD  | api/products                                       | products.index                 |
| POST      | api/products                                       | products.store                 |
| GET|HEAD  | api/products-in-category                           | products.in.category           |
| DELETE    | api/products/{product}                             | products.destroy               |
| GET|HEAD  | api/products/{product}                             | products.show                  |
| PUT|PATCH | api/products/{product}                             | products.update                |
| POST      | api/purchase-invoice                               | purchase-invoice.store         |
| GET|HEAD  | api/purchase-invoice                               | purchase-invoice.index         |
| GET|HEAD  | api/purchase-invoice-list                          | purchase.invoice.list          |
| PUT|PATCH | api/purchase-invoice/{purchase_invoice}            | purchase-invoice.update        |
| DELETE    | api/purchase-invoice/{purchase_invoice}            | purchase-invoice.destroy       |
| GET|HEAD  | api/purchase-invoice/{purchase_invoice}            | purchase-invoice.show          |
| GET|HEAD  | api/purchase-quotation                             | purchase-quotation.index       |
| POST      | api/purchase-quotation                             | purchase-quotation.store       |
| GET|HEAD  | api/purchase-quotation/{purchase_quotation}        | purchase-quotation.show        |
| PUT|PATCH | api/purchase-quotation/{purchase_quotation}        | purchase-quotation.update      |
| DELETE    | api/purchase-quotation/{purchase_quotation}        | purchase-quotation.destroy     |
| GET|HEAD  | api/quotation-detail                               | quotation-detail.index         |
| POST      | api/quotation-detail                               | quotation-detail.store         |
| GET|HEAD  | api/quotation-detail/{quotation_detail}            | quotation-detail.show          |
| PUT|PATCH | api/quotation-detail/{quotation_detail}            | quotation-detail.update        |
| DELETE    | api/quotation-detail/{quotation_detail}            | quotation-detail.destroy       |
| POST      | api/quotation-history                              | quotation.history              |
| GET|HEAD  | api/quotation-po                                   | invoice.list                   |
| GET|HEAD  | api/quotations-accepted-list                       | quotaions.accepted.list        |
| GET|HEAD  | api/quotations-rejected-list                       | quotaions.rejected.list        |
| GET|HEAD  | api/receipts                                       | receipts.index                 |
| POST      | api/receipts                                       | receipts.store                 |
| PUT|PATCH | api/receipts/{receipt}                             | receipts.update                |
| DELETE    | api/receipts/{receipt}                             | receipts.destroy               |
| GET|HEAD  | api/receipts/{receipt}                             | receipts.show                  |
| GET|HEAD  | api/rfq                                            | rfq.index                      |
| POST      | api/rfq                                            | rfq.store                      |
| GET|HEAD  | api/rfq-details                                    | rfq-details.index              |
| POST      | api/rfq-details                                    | rfq-details.store              |
| GET|HEAD  | api/rfq-details/{rfq_detail}                       | rfq-details.show               |
| PUT|PATCH | api/rfq-details/{rfq_detail}                       | rfq-details.update             |
| DELETE    | api/rfq-details/{rfq_detail}                       | rfq-details.destroy            |
| POST      | api/rfq-history                                    | rfq.history                    |
| GET|HEAD  | api/rfq/{rfq}                                      | rfq.show                       |
| PUT|PATCH | api/rfq/{rfq}                                      | rfq.update                     |
| DELETE    | api/rfq/{rfq}                                      | rfq.destroy                    |
| POST      | api/roles                                          | roles.store                    |
| GET|HEAD  | api/roles                                          | roles.index                    |
| GET|HEAD  | api/roles/{role}                                   | roles.show                     |
| PUT|PATCH | api/roles/{role}                                   | roles.update                   |
| DELETE    | api/roles/{role}                                   | roles.destroy                  |
| GET|HEAD  | api/sale                                           | sale.index                     |
| POST      | api/sale                                           | sale.store                     |
| POST      | api/sale-detail                                    | sale-detail.store              |
| GET|HEAD  | api/sale-detail                                    | sale-detail.index              |
| DELETE    | api/sale-detail/{sale_detail}                      | sale-detail.destroy            |
| PUT|PATCH | api/sale-detail/{sale_detail}                      | sale-detail.update             |
| GET|HEAD  | api/sale-detail/{sale_detail}                      | sale-detail.show               |
| POST      | api/sale-quotation                                 | sale-quotation.store           |
| GET|HEAD  | api/sale-quotation                                 | sale-quotation.index           |
| DELETE    | api/sale-quotation/{sale_quotation}                | sale-quotation.destroy         |
| GET|HEAD  | api/sale-quotation/{sale_quotation}                | sale-quotation.show            |
| PUT|PATCH | api/sale-quotation/{sale_quotation}                | sale-quotation.update          |
| DELETE    | api/sale/{sale}                                    | sale.destroy                   |
| PUT|PATCH | api/sale/{sale}                                    | sale.update                    |
| GET|HEAD  | api/sale/{sale}                                    | sale.show                      |
| GET|HEAD  | api/sales-list                                     | sales.list                     |
| GET|HEAD  | api/sub-category/{id}                              | subCategory                    |
| PUT       | api/update-quotation/{id}                          | quotations.status.update       |
| POST      | api/upload-file                                    | file.upload                    |
| GET|HEAD  | api/user                                           |                                |
|           |                                                    |                                |
| GET|HEAD  | api/users                                          | users.index                    |
| POST      | api/users                                          | users.store                    |
| GET|HEAD  | api/users/{user}                                   | users.show                     |
| PUT|PATCH | api/users/{user}                                   | users.update                   |
| DELETE    | api/users/{user}                                   | users.destroy                  |
+-----------+----------------------------------------------------+--------------------------------+
```

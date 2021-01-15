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
| GET|HEAD  | api/analyse/{analyse}                   | analyse.show             |
| PUT|PATCH | api/analyse/{analyse}                   | analyse.update           |
| DELETE    | api/analyse/{analyse}                   | analyse.destroy          |
| POST      | api/categories                          | categories.store         |
| GET|HEAD  | api/categories                          | categories.index         |
| DELETE    | api/categories/{category}               | categories.destroy       |
| PUT|PATCH | api/categories/{category}               | categories.update        |
| GET|HEAD  | api/categories/{category}               | categories.show          |
| GET|HEAD  | api/categorized-products/{id}           | categorized.products     |
| GET|HEAD  | api/category/{name}                     | category.name            |
| GET|HEAD  | api/contact                             | contact.index            |
| POST      | api/contact                             | contact.store            |
| GET|HEAD  | api/contact/{contact}                   | contact.show             |
| PUT|PATCH | api/contact/{contact}                   | contact.update           |
| DELETE    | api/contact/{contact}                   | contact.destroy          |
| GET|HEAD  | api/employee                            | employee.index           |
| POST      | api/employee                            | employee.store           |
| GET|HEAD  | api/employee/{employee}                 | employee.show            |
| PUT|PATCH | api/employee/{employee}                 | employee.update          |
| DELETE    | api/employee/{employee}                 | employee.destroy         |
| GET|HEAD  | api/expense                             | expense.index            |
| POST      | api/expense                             | expense.store            |
| DELETE    | api/expense/{expense}                   | expense.destroy          |
| PUT|PATCH | api/expense/{expense}                   | expense.update           |
| GET|HEAD  | api/expense/{expense}                   | expense.show             |
| POST      | api/fileUpload                          | fileUpload.store         |
| GET|HEAD  | api/fileUpload                          | fileUpload.index         |
| PUT|PATCH | api/fileUpload/{fileUpload}             | fileUpload.update        |
| DELETE    | api/fileUpload/{fileUpload}             | fileUpload.destroy       |
| GET|HEAD  | api/fileUpload/{fileUpload}             | fileUpload.show          |
| GET|HEAD  | api/invoice                             | invoice.index            |
| POST      | api/invoice                             | invoice.store            |
| GET|HEAD  | api/invoice-detail                      | invoice-detail.index     |
| POST      | api/invoice-detail                      | invoice-detail.store     |
| PUT|PATCH | api/invoice-detail/{invoice_detail}     | invoice-detail.update    |
| GET|HEAD  | api/invoice-detail/{invoice_detail}     | invoice-detail.show      |
| DELETE    | api/invoice-detail/{invoice_detail}     | invoice-detail.destroy   |
| POST      | api/invoice-history                     | invoice.history          |
| DELETE    | api/invoice/{invoice}                   | invoice.destroy          |
| PUT|PATCH | api/invoice/{invoice}                   | invoice.update           |
| GET|HEAD  | api/invoice/{invoice}                   | invoice.show             |
| GET|HEAD  | api/parties                             | parties.index            |
| POST      | api/parties                             | parties.store            |
| GET|HEAD  | api/parties-vendor                      | parties.vendor           |
| GET|HEAD  | api/parties/{party}                     | parties.show             |
| PUT|PATCH | api/parties/{party}                     | parties.update           |
| DELETE    | api/parties/{party}                     | parties.destroy          |
| GET|HEAD  | api/products                            | products.index           |
| POST      | api/products                            | products.store           |
| GET|HEAD  | api/products-in-category                | products.in.category     |
| PUT|PATCH | api/products/{product}                  | products.update          |
| DELETE    | api/products/{product}                  | products.destroy         |
| GET|HEAD  | api/products/{product}                  | products.show            |
| GET|HEAD  | api/quotation                           | quotation.index          |
| POST      | api/quotation                           | quotation.store          |
| GET|HEAD  | api/quotation-detail                    | quotation-detail.index   |
| POST      | api/quotation-detail                    | quotation-detail.store   |
| DELETE    | api/quotation-detail/{quotation_detail} | quotation-detail.destroy |
| PUT|PATCH | api/quotation-detail/{quotation_detail} | quotation-detail.update  |
| GET|HEAD  | api/quotation-detail/{quotation_detail} | quotation-detail.show    |
| POST      | api/quotation-history                   | quotation.history        |
| GET|HEAD  | api/quotation-po                        | invoice.list             |
| DELETE    | api/quotation/{quotation}               | quotation.destroy        |
| GET|HEAD  | api/quotation/{quotation}               | quotation.show           |
| PUT|PATCH | api/quotation/{quotation}               | quotation.update         |
| GET|HEAD  | api/rfq                                 | rfq.index                |
| POST      | api/rfq                                 | rfq.store                |
| POST      | api/rfq-details                         | rfq-details.store        |
| GET|HEAD  | api/rfq-details                         | rfq-details.index        |
| DELETE    | api/rfq-details/{rfq_detail}            | rfq-details.destroy      |
| PUT|PATCH | api/rfq-details/{rfq_detail}            | rfq-details.update       |
| GET|HEAD  | api/rfq-details/{rfq_detail}            | rfq-details.show         |
| POST      | api/rfq-history                         | rfq.history              |
| GET|HEAD  | api/rfq/{rfq}                           | rfq.show                 |
| PUT|PATCH | api/rfq/{rfq}                           | rfq.update               |
| DELETE    | api/rfq/{rfq}                           | rfq.destroy              |
| GET|HEAD  | api/sale                                | sale.index               |
| POST      | api/sale                                | sale.store               |
| GET|HEAD  | api/sale-detail                         | sale-detail.index        |
| POST      | api/sale-detail                         | sale-detail.store        |
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

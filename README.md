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
| POST      | api/contact                             | contact.store            |
| GET|HEAD  | api/contact                             | contact.index            |
| GET|HEAD  | api/contact/{contact}                   | contact.show             |
| DELETE    | api/contact/{contact}                   | contact.destroy          |
| PUT|PATCH | api/contact/{contact}                   | contact.update           |
| POST      | api/employee                            | employee.store           |
| GET|HEAD  | api/employee                            | employee.index           |
| DELETE    | api/employee/{employee}                 | employee.destroy         |
| PUT|PATCH | api/employee/{employee}                 | employee.update          |
| GET|HEAD  | api/employee/{employee}                 | employee.show            |
| POST      | api/expense                             | expense.store            |
| GET|HEAD  | api/expense                             | expense.index            |
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
| POST      | api/invoice-detail                      | invoice-detail.store     |
| GET|HEAD  | api/invoice-detail                      | invoice-detail.index     |
| GET|HEAD  | api/invoice-detail/{invoice_detail}     | invoice-detail.show      |
| PUT|PATCH | api/invoice-detail/{invoice_detail}     | invoice-detail.update    |
| DELETE    | api/invoice-detail/{invoice_detail}     | invoice-detail.destroy   |
| DELETE    | api/invoice/{invoice}                   | invoice.destroy          |
| PUT|PATCH | api/invoice/{invoice}                   | invoice.update           |
| GET|HEAD  | api/invoice/{invoice}                   | invoice.show             |
| GET|HEAD  | api/parties                             | parties.index            |
| POST      | api/parties                             | parties.store            |
| GET|HEAD  | api/parties-vendor                      | parties.vendor           |
| DELETE    | api/parties/{party}                     | parties.destroy          |
| GET|HEAD  | api/parties/{party}                     | parties.show             |
| PUT|PATCH | api/parties/{party}                     | parties.update           |
| POST      | api/products                            | products.store           |
| GET|HEAD  | api/products                            | products.index           |
| GET|HEAD  | api/products-in-category                | products.in.category     |
| GET|HEAD  | api/products/{product}                  | products.show            |
| PUT|PATCH | api/products/{product}                  | products.update          |
| DELETE    | api/products/{product}                  | products.destroy         |
| POST      | api/quotation                           | quotation.store          |
| GET|HEAD  | api/quotation                           | quotation.index          |
| GET|HEAD  | api/quotation-detail                    | quotation-detail.index   |
| POST      | api/quotation-detail                    | quotation-detail.store   |
| DELETE    | api/quotation-detail/{quotation_detail} | quotation-detail.destroy |
| GET|HEAD  | api/quotation-detail/{quotation_detail} | quotation-detail.show    |
| PUT|PATCH | api/quotation-detail/{quotation_detail} | quotation-detail.update  |
| GET|HEAD  | api/quotation-po                        | invoice.list             |
| GET|HEAD  | api/quotation/{quotation}               | quotation.show           |
| PUT|PATCH | api/quotation/{quotation}               | quotation.update         |
| DELETE    | api/quotation/{quotation}               | quotation.destroy        |
| POST      | api/rfq                                 | rfq.store                |
| GET|HEAD  | api/rfq                                 | rfq.index                |
| POST      | api/rfq-details                         | rfq-details.store        |
| GET|HEAD  | api/rfq-details                         | rfq-details.index        |
| DELETE    | api/rfq-details/{rfq_detail}            | rfq-details.destroy      |
| PUT|PATCH | api/rfq-details/{rfq_detail}            | rfq-details.update       |
| GET|HEAD  | api/rfq-details/{rfq_detail}            | rfq-details.show         |
| PUT|PATCH | api/rfq/{rfq}                           | rfq.update               |
| GET|HEAD  | api/rfq/{rfq}                           | rfq.show                 |
| DELETE    | api/rfq/{rfq}                           | rfq.destroy              |
| GET|HEAD  | api/sale                                | sale.index               |
| POST      | api/sale                                | sale.store               |
| POST      | api/sale-detail                         | sale-detail.store        |
| GET|HEAD  | api/sale-detail                         | sale-detail.index        |
| PUT|PATCH | api/sale-detail/{sale_detail}           | sale-detail.update       |
| GET|HEAD  | api/sale-detail/{sale_detail}           | sale-detail.show         |
| DELETE    | api/sale-detail/{sale_detail}           | sale-detail.destroy      |
| GET|HEAD  | api/sale/{sale}                         | sale.show                |
| DELETE    | api/sale/{sale}                         | sale.destroy             |
| PUT|PATCH | api/sale/{sale}                         | sale.update              |
| POST      | api/upload-file                         | file.upload              |
| GET|HEAD  | api/user                                |                          |
|           |                                         |                          |
| GET|HEAD  | api/users                               |                          |
+-----------+-----------------------------------------+--------------------------+
```

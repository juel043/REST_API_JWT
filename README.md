

## Installation

First clone this repository, install the dependencies, and setup your .env file.

- git clone git@github.com:juel043/REST_API_JWT.git
## Run Command
- composer install
- copy .env.example   .env
- php artisan key:generate
- php artisan jwt:secret

Then import the necessary database in your MySql and also setup .env file.
- database_file  --rest_api_db.sql

## And run the initial Project
- php artisan serve
## Then Open the Postman and test the api 
   - POST - Register_New_User --

    - http://127.0.0.1:8000/api/register 
    - Body
    {"name":"Md Juel Hossain",
    "email":"juelhossain@gmail.com",
    "password":"juel@cse"}
   - POST Login ---
 
    - http://127.0.0.1:8000/api/login 
    - Body
    {"email":"juelhossain@gmail.com",
    "password":"juel@cse"}
   - POST Create_Product -- 
 
    - http://127.0.0.1:8000/api/create 
    - Body
    {"sku":"1120",
    "price":"150000",
    "quantity":"3",
    "category_id":"2",
    "location_id":"2",
    "subcatagory_id":"2"}
    - Header Add Authorization -- Bearer 'With Generate the token'
   - GET Show_Product -- Get all products
  
    - http://127.0.0.1:8000/api/products 
    - Header Add Authorization -- Bearer 'With Generate the token'
   - GET Get_Users
  
    - http://127.0.0.1:8000/api/get_user  
    - Add Body --
        {
    "token": 'Generate the token'
        }
   - GET Get_Specific_Product
    
    - http://127.0.0.1:8000/api/products/5  
    - Header Add Authorization -- Bearer 'With Generate the token'
   - PUT Update_Product
    
    - http://127.0.0.1:8000/api/products/5  
    - Header Add Authorization -- Bearer 'With Generate the token'
    - Body
    {"sku":"1120",
    "price":"150000",
    "quantity":"3",
    "category_id":"2",
    "location_id":"2",
    "subcatagory_id":"2"} 
   - DELETE  Product_DELETE
    
    - http://127.0.0.1:8000/api/delete/5
    - Header Add Authorization -- Bearer 'With Generate the token'
   - GET  Logout
    
    - http://127.0.0.1:8000/api/logout
    - Add Body --
        {
    "token": 'Generate the token'
        }



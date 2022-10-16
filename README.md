

## Installation

First clone this repository, install the dependencies, and setup your .env file.

- git clone git@github.com:juel043/Rest_Api_Jwt.git
## Run Command
- composer install
- copy .env.example   .env
- php artisan key:generate
- php artisan jwt:secret

Then create & import the necessary database .env file.
- database_file  --rest_api_db.sql

## And run the initial Project
- php artisan serve



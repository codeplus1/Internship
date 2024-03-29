
## Follow the below steps to run this project in your system.


1. git clone https://github.com/codeplus1/Internship.git
2. run composer install
3. php artisan:key generate
4. create database
5. php artisan migrate
6. php artisan db:seed AdminSeeder
     - it will create a login ID and Password
     - Email:Admin@gmail.com
     - Password: password

Now All done Enjoy😊

## About Project
- Admin Module
   -Can create, update and deleted the User (Soft delete)
     -when Admin Create a User then User will get temorarily password for the system later they can change their password.
     -also Admin has the right to change user password. but admin dont have right to see any user passwords.
  
-User Module
    - Can create Product, Edit, and visualize product in bar chart.
    -Can create Inventory(Category) and add multiple products to single category. 
    [inventory and Product has one to many relationship applied]

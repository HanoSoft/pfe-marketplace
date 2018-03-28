Installation:
1.git clone https://github.com/HanoSoft/pfe-marketplace.git
2.composer update
3.php bin/console doctrine:database:create
4.php bin/console doctrine:schema:update --force
5.php bin/console ckeditor:install
6.php bin/console assets:install web
7.php bin/console doctrine:fixture:load

you have 3 users with different privileges:

-superAdmin:this user has all privileges.
login: super
pwd: super

-admin:this user has all the privileges except adding a new user and he can not see the super admin
login: admin
pwd: admin

-partner:this user can only manage products,brands,categories and also he can see only his products,brands and categories 
login: partner
pwd: partner

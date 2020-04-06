#Abdelkarim Lemaallam

## Symfony Version 4.4.7

Requirements:
- PHP version 7.2.29
- Composer installed
    - composer require symfony/orm-pack
    - composer require --dev symfony/maker-bundle

Database configuration is on .env:
- DATABASE_URL=mysql://username:password@ip:port/DB_NAME
- DATABASE_URL=mysql://debian-sys-maint:xcG8K574CSZlKQAX@127.0.0.1:3306/db_symf

Create DB:
php bin/console doctrine:database:create

Init Symfony Server:
php bin/console server:run

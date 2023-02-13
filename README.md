# JobsHunter

## What is it
A responsive web application for job seakers and employers

## Technologies used
+ Docker 23 /Docker-compose 1.29
+ PHP 7.4
+ Composer 2.4
+ Symfony 4.4
+ Bootstrap 4.6

## Requirements
+ Linux OS (any distribution) 
+ docker-compose https://docs.docker.com/compose/install/

## How to install
```
docker-compose up -d
```

## How To Use
Get into JobsHunter web app terminal
```
docker exec -it jobshunter-app bash
```

Creating the Database Tables/Schema
```
php bin/console make:migration
```

execute migrations
```
php bin/console doctrine:migrations:migrate
```

**For testing only - you can load predefined database data**  
Load fixtures
```
php bin/console doctrine:fixtures:load
```

## Links
**phpmyadmin**
http://localhost:8080

**web app**
http://localhost:8001

**mailcatcher** http://localhost:xxxxx  
to check port you can use:
```
docker ps 
```


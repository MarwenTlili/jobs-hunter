# JobsHunter

## What is it
A responsive web application for job seakers and employers

## Technologies used
+ Docker 23 /Docker-compose 1.29
+ PHP 8.2
+ Composer 2.8
+ Symfony 4.4
+ Bootstrap 4.6

## Requirements
+ Linux OS (any distribution) 
+ docker-compose https://docs.docker.com/compose/install/

## How to install
```bash
docker compose up -d
```

## How To Use
Get into JobsHunter web app terminal
```bash
docker exec -it jobshunter-app bash
```

## Install composer dependencies (if not installed yet)
```bash
composer update
```

## Create Database if not exists
```bash
php bin/console doctrine:database:create
```

Creating the Database Tables/Schema
```bash
php bin/console make:migration
```

execute migrations
```bash
php bin/console doctrine:migrations:migrate
```

**For testing only - you can load predefined database data**  
Load fixtures
```bash
php bin/console doctrine:fixtures:load
```

## Links
**phpmyadmin**
http://localhost:8080

**web app**
http://localhost:8001

**mailcatcher** http://localhost:xxxxx  
to check port you can use:
```bash
docker ps 
```

## Using Webpack Encore HMR - For Development
```bash
# From host
# Terminal 1
symfony server:start --no-tls

# Terminal 2
npm run watch
```

<p align="center">
        <h1 align="center">Corruption.hu</h1>
    <br>
</p>

used principles:
https://adamcod.es/2013/11/22/tell-dont-ask.html

# Installation

## Installing using Vagrant

1. Install VirtualBox
2. Install Vagrant
3. Create GitHub personal API token
4. Prepare project:
  ```
    $ git clone git@github.com:tamaskelemen/corruption.git
    $ cd corruption/vagrant/config
    $ cp vagrant-local.example.yml vagrant-local.yml
  ```
 5. Update `vagrant-local.yml` with your GitHub personal API token, and set the variables to your needs.
 6. Execute the init command and select an enviroment:
   ```
     $ cd /path/to/yii-application/
     $ ./init
   ```
 7. Check/update the applications local configuration files to fit your needs:
   ```
   common
   config/
       main-local.php
       params-local.php
       test-local.php
console
   config/
       main-local.php
       params-local.php
       test-local.php
backend
   config/
       main-local.php
       params-local.php
       test-local.php
frontend
   config/
       main-local.php
       params-local.php
       test-local.php
  ```
8. Run commands from the project root directory:
 ```
 $ cd /path/to/yii-application/
 $ vagrant plugin install vagrant-hostmanager
 $ vagrant plugin install vagrant-vbguest
 $ vagrant up
 ```
That's all. You just need to wait for completion! After that you can access project locally by URLs:

frontend: http://corruption.test

backend: http://backend.corruption.test

## Installing using Git

1. Clone the project:
`git@github.com:tamaskelemen/corruption.git`

## Preparing application 
After you install the application, you have to conduct the following steps to initialize the installed application.
You only need to do these once.  

2.  Make sure you have the composer asset plugin installed correctly. You can do that by running
   `composer global show`, which should contain an entry fxp/composer-asset-plugin.
    If the composer asset plugin is missing, you can install it with the following command:  
        ```$ composer global require "fxp/composer-asset-plugin:^1.3.1"```  
        Open a console terminal, and run composer.  
    Go to the project directory:   
        `$ cd /path/to/yii-application/`  
    For a development environment, run:  
        ```$ php composer.phar install -o --prefer-dist```      
    For a production environment, run:  
        ```$ php composer.phar install -o --prefer-dist --no-dev```  
    Open a console terminal, execute the `init` command and select an environment.  
      ```php /path/to/yii-application/init```

4. Adjust the `backendBaseUrl` and `frontendBaseUrl` configuration in `common/config/params-local.php`.

5. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
  ```
  CREATE USER yii2_enhanced WITH PASSWORD 'password';
CREATE DATABASE yii2_enhanced OWNER yii2_enhanced ENCODING 'UTF8' LC_COLLATE = 'hu_HU.UTF-8' LC_CTYPE = 'hu_HU.UTF-8' TEMPLATE = template0;
  ```

6. Open a console terminal, and apply migrations.  
    ```php /path/to/yii-application/yii migrate```
    
7. Set document roots of your web server:

* for frontend `/path/to/yii-application/frontend/web/` and using the URL `http://frontend.dev/`

* for backend `/path/to/yii-application/backend/web/` and using the URL `http://backend.dev/`


# Testing
Yii2 Advanced Application uses Codeception as its primary test framework. In order for the following procedure to work, it is assumed that the application has been initialized using the dev environment. In case tests need to be executed within a Production environment, yii_test and yii_test.bat must be manually copied from the environments/dev folder into the project root directory. Tests require an additional database, which will be cleaned up between tests.

1. Create a new database and adjust the `components['db']` configuration in `common/config/test-local.php` accordingly.

```
CREATE DATABASE yii2_enhanced_test OWNER yii2_enhanced ENCODING 'UTF8' LC_COLLATE = 'hu_HU.UTF-8' LC_CTYPE = 'hu_HU.UTF-8' TEMPLATE = template0;
```
2. Open a console terminal and apply migrations.
 ```
 php /path/to/yii-application/yii_test migrate
  ```
3. Build the test suite:
  ```
  vendor/bin/codecept build
  ```
Then all tests can be started by running:
```
vendor/bin/codecept run
```
Tests for common classes are located in `common/tests`. Execute them by running:
```
vendor/bin/codecept run -- -c common
```
  
  
## Apllication structure

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

<p align="center">
        <h1 align="center">Corruption.hu</h1>
    <br>
</p>

used principles:
https://adamcod.es/2013/11/22/tell-dont-ask.html

Installation steps:
1. Clone the project:
`git@github.com:tamaskelemen/corruption.git`

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

6. Open a console terminal, and apply migrations.
    ```php /path/to/yii-application/yii migrate```
    
7. Set document roots of your web server:

* for frontend `/path/to/yii-application/frontend/web/` and using the URL `http://frontend.dev/`

* for backend `/path/to/yii-application/backend/web/` and using the URL `http://backend.dev/`





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

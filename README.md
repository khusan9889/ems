## Before you begin, make sure you have the following installed on your system:
PHP: Ensure that PHP is installed on your machine. You can check by running ```php -v``` in your terminal or command prompt.

If PHP is not installed, follow the official PHP installation guide: [PHP Installation Guide](https://www.php.net/manual/en/install.php)

Composer: Composer is a dependency manager for PHP and is required to install Laravel and its dependencies. You can check if you have Composer installed by running ```composer -v.```

If Composer is not installed, follow the official Composer installation guide: [Composer Installation Guide](https://getcomposer.org/download/)

P.S: In this project php -v(8.1.18), Composer -v(2.5.5) are used.

### Installation
```bash
1) Clone the GitHub Repository:
$ git clone [https://github.com/username/repository.git](https://github.com/khusan9889/ems.git)

2)    Navigate to the Project Directory:
* Change your current directory to the newly cloned project:
$ cd repository

3) Install Dependencies:
$ composer install

4) Create Environment File:
* Laravel uses an .env file to manage environment-specific configuration. Duplicate the .env.example file and rename it to .env:
$ cp .env.example .env

5) Generate Application Key:
$ php artisan key:generate

6) Database Migration:
$ php artisan migrate

7) Run the Development Server:
$ php artisan serve

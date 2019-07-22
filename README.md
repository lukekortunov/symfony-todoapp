### Symfony 4 TODO App ###

```
# Create directory for project and open it
$ mkdir symfony.todo && cd symfony.todo

# Clone this repository inside newly created folder
$ git clone https://github.com/funnywheel/symfony-todoapp.git .

# Install PHP dependencies
$ composer install

# Create database file (SQLite, pre-defines inside .env file)
$ bin/console doctrine:database:create

# Create database structure (from migrations files, inside src/Migrations)
$ bin/console migrate

# Optional - load fixtures (dummy data) from src/DataFixtures
$ bin/console doctrine:fixtures:load

# Start built-in PHP server at localhost port 8080
$ php -S localhost:8080
```



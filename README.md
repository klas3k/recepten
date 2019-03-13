# Commands to run
composer install

php bin/console doctrine:database:create

php bin/console doctrine:sch:update --force

php bin/console doctrine:fix:load

y

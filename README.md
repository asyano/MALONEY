めも
php artisan serve --host=$IP --port=$PORT

マイグレーション
php artisan migrate

DBの部分
sudo service mysql start
sudo service mysql status
sudo mysql -u root
mysql> exit

cat /etc/mysql/mysql.conf.d/mysqld.cnf | sed -e '/utf8/d' | sed -e '/sql_mode/d' | sed -e '$acharacter-set-server=utf8\nsql_mode=STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' | sudo tee /etc/mysql/mysql.conf.d/mysqld.cnf
sudo mysql -u root
GRANT ALL PRIVILEGES ON *.* TO 'dbuser'@'localhost' IDENTIFIED BY 'dbpass' WITH GRANT OPTION;
mysql> exit

sudo service mysql restart
sudo mysql -u root
mysql> show variables like "chara%";
mysql> SELECT Host, User FROM mysql.user WHERE User = 'dbuser';

mysql> CREATE DATABASE MALONEY;
mysql> show databases;

Form や link_to_route() などが利用できる外部ライブラリ
composer require laravelcollective/html:^6.0

HEROKUの準備
sudo snap install --classic heroku

heroku login -i
Enter your Heroku credentials.
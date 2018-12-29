#!/usr/bin/env bash

#### Import script args ####

timezone=$(echo "$1")
db_user_name=$(echo "$2")
db_user_pass=$(echo "$3")
db_name=$(echo "$4")

#### Bash helpers ####

function info {
  echo " "
  echo "--> $1"
  echo " "
}

#### Provision script ####

info "Provision-script user: `whoami`"

info "Configure locales"
echo 'hu_HU.UTF-8 UTF-8' >> /etc/locale.gen
locale-gen

info "Configure timezone"
cp /usr/share/zoneinfo/$timezone /etc/localtime

info "Update OS software"
apt-get update
apt-get upgrade -y

info "Install additional software"
apt-get install -y vim ssh screen sudo less ntp ntpdate lsof rsync mc whois htop sysstat bzip2 tcpdump dstat dnsutils curl telnet
apt-get install -y apache2 git memcached php7.0 php7.0-cli php7.0-curl php7.0-gd php7.0-intl php7.0-mbstring php7.0-mcrypt php7.0-pgsql php-memcached phpunit postgresql-9.6 php-zip
apt-get install php-xdebug -y

update-alternatives --set editor /usr/bin/vim.basic

info "Configure PostgreSQL"
sed -i "s/# DO NOT DISABLE!/local all all trust\n# DO NOT DISABLE!/" /etc/postgresql/9.6/main/pg_hba.conf
service postgresql restart

info "Initialize databases for PostgreSQL"
echo "CREATE USER $db_user_name WITH PASSWORD '$db_user_pass';" | psql -U postgres
echo "CREATE DATABASE $db_name OWNER $db_user_name ENCODING 'UTF8' LC_COLLATE = 'hu_HU.UTF-8' LC_CTYPE = 'hu_HU.UTF-8' TEMPLATE = template0;" | psql -U postgres
echo "CREATE DATABASE ${db_name}_test OWNER $db_user_name ENCODING 'UTF8' LC_COLLATE = 'hu_HU.UTF-8' LC_CTYPE = 'hu_HU.UTF-8' TEMPLATE = template0;" | psql -U postgres

info "Configure Apache2"
sed -i 's/APACHE_RUN_USER=www-data/APACHE_RUN_USER=vagrant/' /etc/apache2/envvars
sed -i 's/APACHE_RUN_GROUP=www-data/APACHE_RUN_GROUP=vagrant/' /etc/apache2/envvars

info "Enabling site configuration"
ln -s /var/www/html/corruption/vagrant/apache/app.conf /etc/apache2/sites-enabled/0-corruption.test.conf

a2enmod rewrite

info "Install composer"
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


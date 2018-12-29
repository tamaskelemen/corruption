#!/usr/bin/env bash

#### Import script args ####

github_token=$(echo "$1")

#### Bash helpers ####

function info {
  echo " "
  echo "--> $1"
  echo " "
}

#### Provision script ####

info "Provision-script user: `whoami`"

info "Configure git"
git config --global color.ui true
git config --global color.diff.meta yellow bold
git config --global color.diff.frag magenta bold
git config --global color.diff.old red bold
git config --global color.diff.new green bold
git config --global color.status.added green bold
git config --global color.status.changed yellow bold
git config --global color.status.untracked cyan bold
git config --global core.editor vim

info "Configure composer"
composer config --global github-oauth.github.com ${github_token}

info "Install plugins for composer"
composer global require "fxp/composer-asset-plugin:^1.3.1" --no-progress

info "Install codeception"
composer global require "codeception/codeception=2.1.*" "codeception/specify=*" "codeception/verify=*" --no-progress
echo 'export PATH=/home/vagrant/.config/composer/vendor/bin:$PATH' | tee -a /home/vagrant/.profile

info "Install project dependencies"
cd /var/www/html/ingatlannet3
composer install -o --prefer-dist --no-progress

# info "Init project"
# ./init --env=Development --overwrite=n

info "Apply migrations"
./yii migrate <<< "yes"
./yii_test migrate <<< "yes"

info "Enabling colorized prompt for guest console"
sed -i "s/#force_color_prompt=yes/force_color_prompt=yes/" /home/vagrant/.bashrc


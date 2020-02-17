# Read me

## Create a new project
1. Clone the project and link it to a git repository
~~~~
git clone git@bitbucket.org:dev_parker/block-framework-wp.git {project-name}
cd {project-name}
rm -rf .git
git init
git remote add origin git@bitbucket.org:{project-name}.git
git add .
git commit -m "Initialize repository"
git push origin master
git checkout -b develop
git push origin develop
~~~~

## Prerequisites
1. Create a vhost for the project
2. Add {project-name}.local in /etc/hosts
3. Create a database or import an existing one 

## Installation
1. Configure the project directory by installing all the dependencies
~~~~
composer install
composer update
npm install
gulp
cp .htaccess.sample .htaccess
bower install
~~~~

2. Configure the wp-config.php
~~~~
cp wp-config.sample.php wp-config.php
~~~~
3. Update the wp-config.php salt (https://api.wordpress.org/secret-key/1.1/salt/) and $table_prefix
4. Update the database informations (database name, mysql username/password)
5. Connect to your database and edit the table wp_options to remove "/core" from "home" row

## Configuration
1. Setup the website with the url http://{project-name}/
2. Log into the back-office with the url http://{project-name}/core/wp-admin
3. Change website name (in Settings > General)
4. Check "Discourate search engines from indexing this site" if on dev environment (in Settings > Reading)
5. Enable Polylang and Advanced Custom Fields PRO first !!! (in Plugins)
6. Enable all the other needed plugins after that (in Plugins)
7. Enable the default theme "Theme Parker" (in Appearance > Themes)
8. You are ready to go

## Update the WordPress
1. Simply check the in composer.json that plugins and wordpress core are on the latest version
~~~~
composer update
~~~~
2. Manually update plugins not included in the composer.json file (like Advanced Custom Fields PRO) from the back-office
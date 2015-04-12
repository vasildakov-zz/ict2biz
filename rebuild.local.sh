#!/bin/bash

#Title: rebuild
#Version: 0.1
#Usage: $ bash rebuild.local.sh
#Date: 20150411
#Description: Generating models, rebuilding database and data migrating
#Author: Vasil Dakov

clear;

echo -e "\033[41m\033[1mWarning!\033[0m\033[41m Do not execute this script on production!\e[0;0m\n" 

echo -e -n "Do you want to continue? [Y/n] "

read -r response
response=${response,,}
if [[ $response =~ ^(yes|y| ) ]]; then

	# Validate Schema.
	php -f public/index.php orm:validate-schema

	# Generate Doctrine Entities.
	php -f public/index.php orm:generate-entities --update-entities="true" --generate-methods="true" module/Domain/src

	# Generate Doctrine Repositories.
	php -f public/index.php orm:generate-repositories module/Domain/src

	# Generate Doctrine Proxies....
	php -f public/index.php orm:generate:proxies

	# Drop database schema....
	php -f public/index.php orm:schema-tool:drop --force

	# Create database schema....
	php -f public/index.php orm:schema-tool:create

	# Import data fixtures
	php -f public/index.php data-fixture:import

	# Generate classmap
	php -f public/index.php classmap generate module/Domain/ --overwrite

fi
SHELL := /bin/bash

migrate:
	symfony console make:migration
	symfony console doctrine:migrations:migrate
	# symfony console doctrine:fixtures:load -n
	# phpunit tests/Controller/ConferenceControllerTest.php

fixtures:
	symfony console doctrine:fixtures:load -n

.PHONY: migrate

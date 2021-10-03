alias:
	alias sail='bash vendor/bin/sail'

up:
	sail up

down:
	sail down

shell:
	docker compose exec app bash

stubs-update:
	sudo cp -R ./stubs ./vendor/nwidart/laravel-modules/src

stubs-update:
	sudo cp -R ./vendor/nwidart/laravel-modules/src/stubs ./

generate-module:
	docker-compose up -d
	docker exec -it teste-bitzen_app_1 php artisan module:make $(module)
	mv Modules/$(module)/Entities/Entity.php Modules/$(module)/Entities/$(module).php
	mv Modules/$(module)/Form/Form.php Modules/$(module)/Form/$(module)Form.php

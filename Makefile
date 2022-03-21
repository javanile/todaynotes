
init:
	@[ ! -f .env ] && cp .env.example .env || true

install:
	@docker run --rm -v $$(pwd):/app -u $$(id -u) composer:2.2.7 install

install-jetstream:
	@docker run --rm -v $$(pwd):/app -u $$(id -u) composer:2.2.7 require laravel/jetstream
	@./vendor/bin/sail artisan vendor:publish --tag=laravel-assets --ansi --force

up: init
	@./vendor/bin/sail up -d --force-recreate

migrate:
	@./vendor/bin/sail artisan migrate

create-tool:
	@./vendor/bin/sail artisan make:livewire tools/notes

create-model:
	@./vendor/bin/sail artisan make:model Notes

create-migration:
	@./vendor/bin/sail artisan make:migration create_notes_table

watch:
	@npm run watch

## =========
## Migration
## =========
migrate-refresh-1: migrate-rollback-1 migrate

migrate-rollback-1:
	@./vendor/bin/sail artisan migrate:rollback --step=1


## =======
## Website
## =======
dist-website:
	@cd contrib/website && npm run dist

build-welcome: dist-website
	@cp contrib/website/dist/index.html resources/views/welcome.blade.php
	@cp -fR contrib/website/dist/assets public/
	@cp -fR contrib/website/dist/vendor public/
	@cp -fR contrib/website/dist/css public/

watch-website:
	@cd contrib/website && npm run serve

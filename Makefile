
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
	@./vendor/bin/sail  artisan make:livewire tools/notes

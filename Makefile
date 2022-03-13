
init:
	@[ ! -f .env ] && cp .env.example .env || true

install:
	@docker run --rm -v $$(pwd):/app -u $$(id -u) composer:2.2.7 install

up: init
	@./vendor/bin/sail up


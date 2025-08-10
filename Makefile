
ps: ## Show containers
	@docker-compose ps
up:
	@docker-compose up -d nginx
down:
	@docker-compose down
stop:
	@docker-compose stop
restart:
	@docker-compose down
	@docker-compose up -d nginx
build:
	@docker-compose up --build -d
exec-as-synup:
	@docker exec -ti php-synergyupgrade bash

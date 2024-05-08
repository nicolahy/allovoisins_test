start:
	docker compose up -d
stop:
	docker compose down
install:
	docker exec -it php-apache-ci bash -c "composer install && php index.php migrate"
shell:
	docker exec -it php-apache-ci /bin/bash
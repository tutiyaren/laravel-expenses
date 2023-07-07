HOST_UID := `id -u $$USER`
HOST_GID := `id -g $$USER`

.PHONY: up
up:
	HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker compose -f ./docker-compose.yml up -d

.PHONY: destroy
destroy:
	HOST_UID=$(HOST_UID) HOST_GID=$(HOST_GID) docker compose -f ./docker-compose.yml down --rmi all --volumes --remove-orphans

.PHONY: refresh
refresh:
	@make remove
	@make open

.PHONY: rebuild
rebuild:
	@make destroy
	@make open

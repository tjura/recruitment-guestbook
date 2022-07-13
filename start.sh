#!/bin/bash

docker compose up --build -d
docker compose exec php composer install

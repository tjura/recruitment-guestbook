#!/bin/bash

docker compose up --build --force-recreate -d
docker compose exec php composer install
echo "Installing DATABASE Schema"
sleep 3
docker compose exec -T mysql sh -c 'exec mysql guestbook -uroot -proot' <./app/database/default.sql
echo "READY: http://localhost"

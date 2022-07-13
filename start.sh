#!/bin/bash

docker compose up --build -d
docker compose exex php composer install

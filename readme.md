# Guest book

* Create comments
* Show comments (pagination)
* Default pagination (5)
* Database schema: `./app/database/default.sql` (auto import)

## Features

- Configurable
- Simple framework by Tomasz Jura
- Doctrine ORM for managing DB connection
- PHP 8.1 features

## Start project (development)

```bash
./start.sh
```

http://localhost

## Stop project

```bash
./stop.sh
```

## Bash in PHP container

```bash
./cli.sh
```

# Database

Inside the container, in php code: `mysql:3306 root:root`

With client on host: `localhost:3306 root:root`

You can find an example of connecting to database in `index.php` so you don't waste time doing this. 

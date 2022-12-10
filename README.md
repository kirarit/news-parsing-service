# News Parsing Service


## Getting started
Clone the repo:
```
$ git clone https://github.com/kirarit/news-parsing-service.git
$ cd news-parsing-service
```

Copy `.env.example` to `.env`
```
$ cp .env.example .env 
```

Build the images and start the services:
```
docker-compose build
docker-compose up -d
```

### container
Running `./container` takes you inside the `news-parsing-service` container under user uid(1000) (same with host user)
```
$ ./container
kiraa@8cf37a093502:/var/www/html$
```
### db
Running `./db` connects to your database container's daemon using mysql client.
```
$ ./db
mysql>
```

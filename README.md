# Code Test for Inpera

### To run the docker container

You should have docker install in your machine.

```
cd inpera/
docker compose up -d
```

To see if everything with docker its ok

```
docker ps
```

#### General description

The application is a simple CRUD with php 7.2.

The dockerfile contains two containers one for the web (our app) and another one for the mysql (db).

The app will runs at http://192.168.99.100:8080/post/.
Has a single endpoint at :

```
http://192.168.99.100:8080/post/
```

Accept GET, POST, PUT AND DELETE.

The GET request:

```
GET http://192.168.99.100:8080/post/
```

The POST request:

```
POST http://192.168.99.100:8080/post/

Application-json
Form-data -> {title: "title1", description: "blabla", "category": "category1"}
```

The PUT request:

```
PUT http://192.168.99.100:8080/post/1/

Application-json
Form-data -> {id: "1", title: "title1", description: "blabla", "category": "category1"}
```

The DELETE request:

```
DELETE http://192.168.99.100:8080/post/1/

Application-json
```

The database is built with Mysql and is inside the backend folder with the name **/data/shema.db**.

#### Version 2.0

1.  Make the frontend.
2.  Unit tests must be added to check all functions.

I hope you enjoy it! :D

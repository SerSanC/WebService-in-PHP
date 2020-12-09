# WebService-in-PHP
Creating a MySQL database with three tables and several sample records:

- cursos (id, nombre)
- cursos_alumnos (id, id_curso, id_alumno)
- alumnos (id, nombre, apellidos)

Development of a WebService in PHP that receives a course id by POST and returns a JSON with the names and surnames of all students linked to the course

Development of a script in PHP with a request to the WebService using CURL or a similar procedure.

---

## Prerequisites:

- Install PHP 7.4.13:  https://windows.php.net/download#php-7.4

- Install Composer: https://getcomposer.org/download/

- Install Symfony: https://symfony.com/download

- Install MySQL: https://dev.mysql.com/downloads/
----
## How to use:

- Update libraries using composer: 
``` 
$ composer u
```
- In the file ```php.ini``` found in the folder where the php is installed, make sure that the extension ```extension = pdo_mysql``` is uncommented.

- In the document ```.env``` of the project modify the data corresponding to the MySQL configuration, we find it in a line such that this:

    - ```#DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7```

        - ````mysql```` : type of DB used.
        - ````db_user````: User.
        - ````db_password````: Password to use.
        - ````db_name````: Name of the DB.

- As the Database is already created in our project, we will simply have to load the structure of the database that has been developed using the command:
 ```
 $ php bin / console doctrine: migrations: migrate
 ``` 
 
 - Later, we will connect to MySQL to use the following command to populate the database with the data in order to be able to exemplify the developed program: 
 ```
 $ source ./202011281347.sql
 ``` 
 - If we make a select of the different tables we will obtain the following results, making sure that data has been included in the tables created:

<p style="text-align:center;">
 <img src="./assets/Imagen1.png" width= 200px height = 450px > <img/>
</p>

- Now we need to inicialice the server in symfony using the command ```symfony server:start``` obtaining a result like the following:

<p style="text-align:center;">
 <img src="./assets/Imagen2.png"> <img/>
</p>

- Finally, in another terminal window, we use the command ```php Test.php``` to execute the script that makes a request to the WebService using CURL. So we indicate the ```ID``` of the course, it returns a JSON with the names and surnames of all the students in that course. In case that ID does not exist or if we introduce any non-numeric character, it will return "An error has occurred".

<p style="text-align:center;">
 <img src="./assets/Imagen3.png"> <img/>
</p>
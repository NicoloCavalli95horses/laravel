# Models
Models are just PHP classes and they represent database table in Laraval
Each model is bound to a single database table
You can see the 'task' table here: http://localhost:8080/?server=mysql&username=root&db=task-list
This model will handle the 'task' table, using the 2023_12_13_155306_create_tasks_table.php migration


Once you create a model, you can use it to interact with the database table
 - create a new row with create() method
 - retrieve all rows using the all() method

Models in Laravel use the ORM (object relational mapping): classes are mapped to sql commands
- ORM are used in different backend languages, it is not a Laravel featurs
- commands like 'WHERE' or 'BY' are mapped into PHP verbs

Models also support creating and updating RELATIONSHIPS between tables
Few mysterious problems I encountered:

1. xdebug is still not very dependable. First, it does not *break* if breakpoint is on the very first line of the function body (opening curly bracket at the beginnning of each function). Also, when I installed Redis, xdebug stopped working. I added few more **xdebug** settings in php.ini file to fix that.

2. Few lines about how authentication works out of the box for a laravel project: 
    1. Whenever 'auth' middleware is added for any route, laravel checks if authentication cookie is set in the session. If not it will automatically try to redirect to 'login' route(named route). Therefore, we will need to add that in route/web.php. Now In order to actually authenticate user, corresponding controller is also added. 
    2. Now user provider is set to Eloquent or database in auth.php. In both cases we need to connect to a database. Database connection settings are in database.php file where we use .env file to set mysql connection. This means, first we need to install *mysql* on our machine, create a database/user/password and write that in .env file.
    3. In this database, laravel authentication looks for *user* table. Therefore, we need to add user table to selected database. Now, instead of manually adding a table, laravel provides us scripts(called as migrations) under `database/migrations`. Run the *create_user_table* migration to create user table. (.env file needs to be set before this to make a successfull connection to the table)
    `php artisan migrate --path=database/migrations/create_user_table`
    4. Then, add user data in the *users* table. add a row for one user.
    5. Next, Auth::Attempt() method. This method still returns *false* when correct password and username is passed. When debugged further, it is found that laravel assumes that password stored in the database is hashed one(+1). This means we need to hash a password before storing it in database. bcrypt haser is used for the purpose.

3. Once all these settings are done, I was able to run+debug. 

4. mysql installation and commands
    https://flaviocopes.com/mysql-how-to-install/

    $ brew install mysql
    $ brew services start mysql
    $ brew services stop mysql

    mysql.server start
    mysql.server stop
    mysql.server status

    mysql -u root -p
# allovoisins_test

## Exécuter le projet

Clone this repository and run the following command:

```bash
make start
make install
```

## Container 

- **PHPMyAdmin** is available at `http://localhost:8080`
- **CodeIgniter** is available at `http://localhost:7700`
- **MySQL** is available at port `3310`

## Test
FO - Create/Update
- Go to http://localhost:7700/index.php => redirect http://localhost:7700/index.php/front/user/create
- Create a user => redirect to http://localhost:7700/index.php/front/user/update/{id_user_created}
BO - List & Delete
- Go to http://localhost:7700/index.php/admin/UserList (26 records with fixtures)
- Use the pagination
- Delete a user

## Inactive users
Inside root folder, add this to your crontab:

0 0 * * * php index.php cli deleteInactiveUsers
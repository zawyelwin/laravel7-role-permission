# role-permission
Laravel Roles and Permission Management with Core ui ingegrated.

- Laravel 7.4
- Coreui 3.0
- Selectize
- Sweetalert2
- ChartJs
- Fontawesome
- CoreUI Icons

#### Create Permission
```bash 
php artisan auth:permission user
``` 
- will create 'view_users','create_users','edit_users','delete_users' permissions.


#### Create Role
```bash
php artisan permission:create-role
``` 
"Role Name" - create a new role.


#### Extract to a package 

# CRUD Generator 
A helpful crud generator for both API and Server Side Applictions.

```bash
php artisan crud:generate ModelName
```
will generate model,controller,migration and register the routes. for API pls check CrudGeneratorService and uncomment.

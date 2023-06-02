php spark db:create %repo%
php spark migrate --all
php spark db:seed Demo
php spark auth:create_user master master@demo.com
php spark auth:set_password master 1234demo
php spark auth:create_user admin admin@demo.com
php spark auth:set_password admin 1234demo
php spark auth:create_user admintu admintu@demo.com
php spark auth:set_password admintu 1234demo
php spark auth:create_group master "kelola data master"
php spark auth:create_group admin "kelola data admin"
php spark auth:create_group tu "kelola data tu"

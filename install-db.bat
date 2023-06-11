php spark db:create ari
php spark migrate --all
php spark auth:create_user pimpinan pimpinan@demo.com
php spark auth:set_password pimpinan 1234demo
php spark auth:create_user admin admin@demo.com
php spark auth:set_password admin 1234demo
php spark auth:create_user admintu admintu@demo.com
php spark auth:set_password admintu 1234demo
php spark auth:create_group master "kelola data master"
php spark auth:create_group admin "kelola data admin"
php spark auth:create_group tu "kelola data tu"
php spark db:seed Demo
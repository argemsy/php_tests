<?php
// Script donde se almacenan todas las vistas postgres que se pretenden usar en el sistema


// VISTAS POSTGRES

// Vista de productos para tener asociado en un query las categorias y los usuarios
// y poder verlo en forma comprensible
$products_all = "create or replace view products_all as
                SELECT 
                p.id, 
                p.name, 
                p.description, 
                c.name AS category_,
                c.id AS category_id, 
                u.first_name || ' ' || u.last_name as username,
                u.id as username_id 
                FROM 
                product p JOIN category c 
                ON p.category = c.id 
                INNER JOIN auth_user u 
                on u.id = p.username 
                order by p.id desc";



// CONSTRAINST DE LA TABLA PRODUCT
$category_id = 'alter table product add CONSTRAINT category_id foreign key (category) references category (id)';
$user_id = 'alter table product add CONSTRAINT user_id foreign key (username) references auth_user (id)';


?>
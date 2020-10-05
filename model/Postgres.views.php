<?php
// Script donde se almacenan todas las vistas postgres que se pretenden usar en el sistema

// Vista para tener asociado en un query las categorias y los usuarios
// y poder verlo en forma comprensible
$products_all = "create or replace view products_all as
                SELECT 
                p.id, 
                p.name, 
                p.description, 
                c.name AS category_, 
                u.first_name || ' ' || u.last_name as username 
                FROM 
                product p JOIN category c 
                ON p.category = c.id 
                INNER JOIN auth_user u 
                on u.id = p.username 
                order by p.id desc";


?>
select count(*) as count, group_concat(cod_user separator ',') as users, cod_room
from user_room 
group by cod_room
having count like 2;


-- SALAS ABIERTAS PARA UN USUARIO
select * from user as u
join user_room as ur
on u.cod_user = ur.cod_user
join room as r
on ur.cod_room = r.cod_room
join message as m
on r.cod_room = m.cod_room
where u.cod_user like 17
group by m.cod_room;

-- Nombre de usuario sala 1vs1
select nick from user as u
join user_room as ur
on u.cod_user = ur.cod_user
where ur.cod_room like '4-17' and u.cod_user not like '4';
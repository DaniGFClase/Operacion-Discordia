select count(*) as count, group_concat(cod_user separator ',') as users, cod_room
from user_room 
group by cod_room
having count like 2;


-- SALAS ABIERTAS PARA UN USUARIO
select ur.cod_room from user as u
join user_room as ur
on u.cod_user = ur.cod_user
where u.cod_user like 1
group by ur.cod_room;


-- Nombre de usuario sala 1vs1
select u.cod_user, nick, photo from user as u
join user_room as ur
on u.cod_user = ur.cod_user
where ur.cod_room like '1-18' and u.cod_user not like '1';

-- Usuario contrario para cada sala
select u.cod_user, nick, photo, count(*), ur.cod_room from user as u
join user_room as ur
on u.cod_user = ur.cod_user
where ur.cod_room in
(select ur.cod_room from user as u
join user_room as ur
on u.cod_user = ur.cod_user
where u.cod_user like 1
group by ur.cod_room)
and u.cod_user not like 1
group by cod_room;

select * from message
where cod_room like '1-4';



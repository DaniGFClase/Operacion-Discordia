select count(*) as count, group_concat(cod_user separator ',') as users, cod_room
from user_room 
group by cod_room
having count like 2;


show databases like 'discordio';

select * from room r
join message m
order by date_message desc;

select * from user
join room
where cod_user like 3;
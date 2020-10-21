1.SELECT * FROM `sato_task1` WHERE name LIKE '%2号%';
2.SELECT * FROM `sato_task1` WHERE birthday > '2019/01/01 00:00:00';
3.SELECT * FROM `sato_task1` WHERE birthday > (NOW() - INTERVAL 100 DAY);
4.SELECT `name`, MONTH(`birthday`) AS `birth_month` FROM `sato_task1`;
5.SELECT MONTH(`birthday`) AS `birth_month`, COUNT(*) AS `count` FROM `sato_task1` GROUP BY MONTH(`birthday`);

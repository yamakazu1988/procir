sql文
(1)INSERT INTO `users`(`id`, `name`, `height`, `birthday`) VALUES(6, '山口和哉', 167, '1988/02/16')
(2)INSERT INTO `users`(`id`, `name`, `height`, `birthday`) VALUES(7, 'テスト太郎', 200, '2020/08/19')
(3)SELECT height FROM `users` WHERE id = 6
(4)SELECT * FROM `users` WHERE name = '山口和哉'
(5)SELECT `name` FROM `users`
(6)SELECT `name` FROM `users` WHERE id > 3 and id <= 6
(7)SELECT `id`, `name` FROM `users` ORDER BY id ASC
(8)SELECT `id`, `name`,`height` FROM `users` ORDER BY id DESC
(9)UPDATE `users` SET `name` = 'test taro' WHERE id = 7
(10)DELETE FROM `users` WHERE id = 7
(11)SELECT * FROM `users` WHERE `name` LIKE '山口%'
(12)SELECT `id`,`name` FROM `users` WHERE id BETWEEN 3 AND 8
(13)SELECT `id`,`height` FROM `users` LIMIT 3, 6
(14)INSERT INTO `users`(`id`, `name`, `height`, `birthday`) VALUES(8, '山口テスト1', 167, '1988/02/16')
(15)SELECT * FROM `users` WHERE name in('山口テスト1', '山田太郎')
(16)SELECT * FROM `users` WHERE name = '山口和哉' AND height = 167
(17)SELECT * FROM `users` WHERE height = 180 OR height = 170

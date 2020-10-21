テーブル作成sql
1.membersテーブル
CREATE TABLE `procir_Yamaguchi418`.`members` (
 `id` INT NOT NULL AUTO_INCREMENT ,
 `name` VARCHAR(255) NOT NULL ,
 `email` VARCHAR(255) NOT NULL ,
 `password` VARCHAR(255) NOT NULL ,
 `deleted_flg` BOOLEAN NULL DEFAULT NULL ,
 `created_at` DATETIME NOT NULL ,
 `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 PRIMARY KEY (`id`))
 ENGINE = InnoDB;

2.postsテーブル
CREATE TABLE `procir_Yamaguchi418`.`posts` (
 `id` INT NOT NULL AUTO_INCREMENT ,
 `title` VARCHAR(255) NOT NULL ,
 `message` TEXT NOT NULL ,
 `member_id` INT NOT NULL ,
 `deleted_flg` BOOLEAN NULL DEFAULT NULL ,
 `created_at` DATETIME NOT NULL ,
 `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 PRIMARY KEY (`id`))
 ENGINE = InnoDB;

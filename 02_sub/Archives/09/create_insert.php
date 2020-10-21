<高庭サブ課題13> マスターテーブルについて理解しよう [課題作成者：takaniwa]
-筋トレメニューマスタテーブルを作成したクリエイト文・初期データのインサート文

[Yamaguchi418@133-130-114-192 ~]$ mysql -uYamaguchi418 -p3pwfu4foij -hlocalhost -Dprocir_Yamaguchi418
Warning: Using a password on the command line interface can be insecure.
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 81390
Server version: 5.6.44 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> create table MTMenu (
    -> id int,
    -> name varchar(255)
    -> );
Query OK, 0 rows affected (0.01 sec)

mysql> show tables;
+-------------------------------+
| Tables_in_procir_Yamaguchi418 |
+-------------------------------+
| MTMenu                        |
| posts                         |
| sato_task1                    |
| st2_activities                |
| st2_members                   |
| users                         |
+-------------------------------+
6 rows in set (0.01 sec)

mysql> show tables;
+-------------------------------+
| Tables_in_procir_Yamaguchi418 |
+-------------------------------+
| MTMenu                        |
| posts                         |
| sato_task1                    |
| st2_activities                |
| st2_members                   |
| users                         |
+-------------------------------+
6 rows in set (0.00 sec)

mysql> INSERT INTO MTMenu values (1, 'ベンチプレス');
Query OK, 1 row affected (0.01 sec)

mysql> INSERT INTO MTMenu values (2, 'レッグカール');
Query OK, 1 row affected (0.01 sec)

mysql> INSERT INTO MTMenu values (3, 'サイドレイズ');
Query OK, 1 row affected (0.00 sec)

mysql> INSERT INTO MTMenu values (4, 'ダンベルフライ');
Query OK, 1 row affected (0.00 sec)

mysql> SELECT * FROM MTMenu;
+------+-----------------------+
| id   | name                  |
+------+-----------------------+
|    1 | ベンチプレス          |
|    2 | レッグカール          |
|    3 | サイドレイズ          |
|    4 | ダンベルフライ        |
+------+-----------------------+
4 rows in set (0.00 sec)
mysql> ^DBye
[Yamaguchi418@133-130-114-192 ~]$


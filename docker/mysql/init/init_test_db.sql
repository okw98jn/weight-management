-- テスト用のデータベースを作成する
CREATE DATABASE IF NOT EXISTS weight_mg_test;
GRANT ALL ON weight_mg_test.* TO 'root'@'%';
FLUSH PRIVILEGES;
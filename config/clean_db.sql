use newsagregator;
delete from post_tag;
ALTER TABLE post_tag  AUTO_INCREMENT = 1;
delete from posts;
ALTER TABLE posts  AUTO_INCREMENT = 1;
delete from categories where id !=0;
ALTER TABLE categories  AUTO_INCREMENT = 1;
delete from tags;
ALTER TABLE tags  AUTO_INCREMENT = 1;


use php_db;


CREATE TABLE new_drink (
    menu_name     VARCHAR(20),
    item          INT,
    memo          VARCHAR(300),
    drink_type    VARCHAR(10),
    PRIMARY KEY (menu_name)
);
INSERT INTO new_drink (menu_name, item, memo, drink_type)
    VALUES ('JUICE', 600, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/juice.png', 'hot'),
           ('COFFEE', 500, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/coffee.png', 'ice');



CREATE TABLE new_food (
    menu_name     VARCHAR(20),
    item          INT,
    memo          VARCHAR(300),
    spiciness     VARCHAR(10),
    PRIMARY KEY (menu_name)
);
INSERT INTO new_food
    VALUES ('CURRY', 900, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/curry.png', 3),
           ('PASTA', 1200, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/pasta.png', 1);



CREATE TABLE new_user (
    user_id INT NOT NULL AUTO_INCREMENT,
    user_name     VARCHAR(20),
    user_type     VARCHAR(10),
    PRIMARY KEY (user_id)
);
INSERT INTO new_user (user_name, user_type)
    VALUES ('suzuki', 'male'),
           ('tanaka', 'female'),
           ('suzuki', 'female'),
           ('sato', 'male');



CREATE TABLE new_review (
    review_id INT NOT NULL AUTO_INCREMENT,
    drink_number    VARCHAR(20),
    food_number     VARCHAR(20),
    user_number     INT,
    review_body     VARCHAR(300),
    PRIMARY KEY (review_id),
    FOREIGN KEY (drink_number)
        REFERENCES new_drink(menu_name),
    FOREIGN KEY (food_number)
        REFERENCES new_food(menu_name),
    FOREIGN KEY (user_number)
        REFERENCES new_user(user_id)
);
INSERT INTO new_review (drink_number, food_number, user_number, review_body)
    VALUES ('JUICE', NULL, 1, 'Orange juice with plenty of fruit!'),
           (NULL, 'CURRY', 1, 'The ingredients are rugged and very delicious'),
           ('COFFEE', NULL, 2, 'The scent is good'),
           (NULL, 'PASTA', 2, 'The sauce is excellent. I want to eat again. '),
           ('JUICE', NULL, 3, 'Ordinary juice'),
           (NULL, 'CURRY', 3, 'I thought it was a delicious curry for the price'),
           ('COFFEE', NULL, 4, 'The bitterness is just right and it is recommended'),
           (NULL, 'PASTA', 4, 'I felt particular about the ingredients');


-- INSERT INTO review
--     VALUES ('果肉たっぷりのオレンジジュースです！'),
--            ('具がゴロゴロしていてとてもおいしいです'),
--            ('香りがいいです'),
--            ('ソースが絶品です。また食べたい。'),
--            ('普通のジュースす'),
--            ('値段の割においしいカレーだと思いました'),
--            ('苦味がちょうどよくて、おすすめです'),
--            ('具材にこだわりを感じました。');

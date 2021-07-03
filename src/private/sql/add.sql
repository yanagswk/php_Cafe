
use php_db;

CREATE TABLE drink (
    menu_name     VARCHAR(20),
    item          INT,
    memo          VARCHAR(300),
    drink_type    VARCHAR(10)
);

INSERT INTO drink (menu_name, item, memo, drink_type)
    VALUES ('JUICE', 600, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/juice.png', 'hot'),
           ('COFFEE', 500, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/coffee.png', 'ice');


CREATE TABLE food (
    menu_name     VARCHAR(20),
    item          INT,
    memo          VARCHAR(300),
    spiciness     VARCHAR(10)
);

INSERT INTO food
    VALUES ('CURRY', 900, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/curry.png', 3),
           ('PASTA', 1200, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/pasta.png', 1);


CREATE TABLE user (
    user_name     VARCHAR(20),
    user_type     VARCHAR(10)
);

INSERT INTO user
    VALUES ('suzuki', 'male'),
           ('tanaka', 'female'),
           ('suzuki', 'female'),
           ('sato', 'male');


CREATE TABLE review (
    id INT NOT NULL AUTO_INCREMENT,
    review_body     VARCHAR(300),
    PRIMARY KEY (id)
);

INSERT INTO review (review_body)
    VALUES ('Orange juice with plenty of fruit!'),
           ('The ingredients are rugged and very delicious'),
           ('The scent is good'),
           ('The sauce is excellent. I want to eat again.');

-- INSERT INTO review
--     VALUES ('果肉たっぷりのオレンジジュースです！'),
--            ('具がゴロゴロしていてとてもおいしいです'),
--            ('香りがいいです'),
--            ('ソースが絶品です。また食べたい。'),
--            ('普通のジュースす'),
--            ('値段の割においしいカレーだと思いました'),
--            ('苦味がちょうどよくて、おすすめです'),
--            ('具材にこだわりを感じました。');

drop database vinyl;
create database if not exists vinyl;
use vinyl;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `cart`
(
    `cartID` bigint(20) NOT NULL,
    `userID` bigint(20) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;


CREATE TABLE `cartitem`
(
    `cartItemID` bigint(20)  NOT NULL,
    `productID`  bigint(20)  NOT NULL,
    `cartID`     bigint(20)  NOT NULL,
    `price`      float       NOT NULL,
    `quantity`   smallint(6) NOT NULL,
    `createDate` timestamp   NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;



CREATE TABLE `categories`
(
    `categoryID` bigint(20)  NOT NULL,
    `p_cat_name` varchar(30) NOT NULL,
    `p_cat_desc` text        NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO categories (`categoryID`, `p_cat_name`, `p_cat_desc`)
VALUES (1, 'Jazz',
        'A jazz egy amerikai eredetű műfaj, amely a 20. század elején alakult ki. Jellemzően improvizatív jellegű, és gyakran használ swing ritmusokat, valamint hangsúlyos szólóka'),
       (2, 'Blues',
        'A blues szintén az Egyesült Államokban gyökerezik, különösen a déli államok afroamerikai közösségeiben. Jellemzője a tizenkét ütemű forma és a mély, érzelmes előadásmód.'),
       (3, 'Rock ''n'' Roll',
        'Ez a műfaj a 1950-es években vált népszerűvé, és forradalmasította a populáris zenét. Jellemzően dinamikus ritmusokkal és egyszerű, de energikus dallamokkal operál'),
       (4, 'Klasszikus Zene',
        'A klasszikus zenei felvételek között megtalálhatóak a barokk, a klasszikus és a romantikus korszakok nagy szerzőinek művei. Jellemzően komplex szerkezetűek és rendkívül változatos hangszínezettel bírnak'),
       (5, 'Country',
        'A country zene a folk zene amerikai változata, amely a vidéki élet élményeire összpontosít. Gyakran használ akusztikus hangszereket, mint a gitár és a hegedű'),
       (6, 'Soul és R&B',
        'A soul zene az afroamerikai evangéliumi zenéből és a rhythm and blues-ból fejlődött ki. Jellemzői az érzelmes ének és a hangsúlyos ritmusszekció'),
       (7, 'Rock',
        'A rock zene gyökerei a rock ''n'' rollban és a blues-ban találhatók, de az évtizedek során számos alstílus fejlődött ki belőle. Jellemzői közé tartozik a hangsúlyos dob- és elektromos gitár-használat, valamint az erős, gyakran lázadó szövegek.'),
       (8, 'Pop',
        'A popzene széles körben elterjedt és sokféle zenei stílust foglal magában. Fő jellemzője a könnyen emészthető, gyakran slágeres jelleg');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem`
(
    `orderItemID` bigint(20)  NOT NULL,
    `productID`   bigint(20)  NOT NULL,
    `orderID`     bigint(20)  NOT NULL,
    `price`       float       NOT NULL,
    `quantity`    smallint(6) NOT NULL,
    `createDate`  timestamp   NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;



CREATE TABLE `products`
(
    `productID` bigint(20)   NOT NULL ,
    albumcim    varchar(255) not null,
    eloado      varchar(255) not null,
    leiras      text         not null,
    allapot     varchar(255) not null,
    kategoria   varchar(255) not null,
    ar          int          not null,
    boritokep   varchar(255) null
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('A Love Supreme', 'John Coltrane', 'Spiritual jazz masterpiece', 'Új', 'Jazz', 8500, 'alovesupreme.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Time Out', 'Dave Brubeck Quartet', 'Innovative jazz rhythms', 'Új', 'Jazz', 7900, 'timeout.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Texas Flood', 'Stevie Ray Vaughan', 'Powerful blues guitar', 'Új', 'Blues', 8100, 'texasflood.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Born Under a Bad Sign', 'Albert King', 'Blues classic', 'Új', 'Blues', 7600, 'bornunderabadsign.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Elvis Presley', 'Elvis Presley', 'The King of Rock \'n\' Roll', 'Új', 'Rock \'n\' Roll', 9000,
        'elvispresley.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Chuck Berry Is on Top', 'Chuck Berry', 'Iconic rock \'n\' roll', 'Új', 'Rock \'n\' Roll', 8300,
        'chuckberry.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('The Four Seasons', 'Vivaldi', 'Baroque masterpiece', 'Új', 'Klasszikus Zene', 9500, 'fourseasons.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Symphony No. 5', 'Beethoven', 'Iconic classical symphony', 'Új', 'Klasszikus Zene', 8800, 'beethoven5.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Golden Hits', 'Johnny Cash', 'Country music legend', 'Új', 'Country', 8200, 'johnnycash.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Red Headed Stranger', 'Willie Nelson', 'Classic country products', 'Új', 'Country', 7700, 'willienelson.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('What\'s Going On', 'Marvin Gaye', 'Soulful social commentary', 'Új', 'Soul és R&B', 8600, 'whatsgoingon.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Lady Soul', 'Aretha Franklin', 'The Queen of Soul', 'Új', 'Soul és R&B', 8000, 'ladysoul.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Thriller', 'Michael Jackson', 'Best-selling products of all time', 'Új', 'Pop', 10000, 'thriller.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('1989', 'Taylor Swift', 'Modern pop classic', 'Új', 'Pop', 8500, '1989.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Dark Side of the Moon', 'Pink Floyd', 'Psychedelic rock masterpiece', 'Új', 'Rock', 9500,
        'darksideofthemoon.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Led Zeppelin IV', 'Led Zeppelin', 'Iconic rock products', 'Új', 'Rock', 9200, 'ledzeppeliniv.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('10', 'Tankcsapda', 'Magyar rock zene', 'Új', 'Rock', 7800, 'tankcsapda10.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Best of Edda', 'Edda Művek', 'Magyar rock klasszikusok', 'Új', 'Rock', 7700, 'eddamuvek.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Homework', 'Daft Punk', 'French electronic duo debut', 'Új', 'Electronic', 8900, 'homework.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Selected Ambient Works 85-92', 'Aphex Twin', 'Ambient techno pioneer', 'Új', 'Electronic', 8200,
        'aphextwin.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Illmatic', 'Nas', 'East Coast hip-hop classic', 'Új', 'Hip-Hop', 8700, 'illmatic.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('The Chronic', 'Dr. Dre', 'West Coast rap landmark', 'Új', 'Hip-Hop', 9000, 'thechronic.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Blue', 'Joni Mitchell', 'Folk music masterpiece', 'Új', 'Folk', 8300, 'blue.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Táncdalok', 'Kovács Kati', 'Magyar népzene', 'Új', 'Folk', 7500, 'kovacskati.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Master of Puppets', 'Metallica', 'Thrash metal essential', 'Új', 'Metal', 9200, 'masterofpuppets.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Paranoid', 'Black Sabbath', 'Heavy metal originators', 'Új', 'Metal', 8600, 'paranoid.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Legend', 'Bob Marley', 'Reggae icon compilation', 'Új', 'Reggae', 8400, 'legend.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Duppy Conqueror', 'Bob Marley & The Wailers', 'Roots reggae essential', 'Új', 'Reggae', 7900,
        'duppyconqueror.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Álomarcú lány', 'Presser Gábor', 'Magyar pop zene', 'Új', 'Pop', 7800, 'alomarculany.jpg');
INSERT INTO products (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Best of Zséda', 'Zséda', 'Magyar pop slágerek', 'Új', 'Pop', 7600, 'zsedabestof.jpg');

-- --------------------------------------------------------

CREATE TABLE `product_category`
(
    `productID`  bigint(20) NOT NULL,
    `categoryID` bigint(20) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`productID`, `categoryID`)
VALUES (1, 2),
       (2, 2),
       (3, 4),
       (4, 7),
       (5, 7),
       (6, 5),
       (7, 2),
       (8, 7),
       (9, 7),
       (10, 3),
       (11, 2),
       (12, 2),
       (13, 6),
       (14, 6),
       (15, 6),
       (16, 6),
       (17, 6),
       (18, 6),
       (19, 6),
       (20, 6),
       (21, 6),
       (22, 6),
       (23, 6),
       (24, 6),
       (37, 1),
       (38, 1),
       (39, 1),
       (40, 1),
       (41, 1),
       (42, 1),
       (43, 1),
       (44, 1),
       (45, 4),
       (46, 4),
       (47, 4),
       (48, 4),
       (49, 4),
       (50, 4),
       (51, 4),
       (52, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type`
(
    `productID` bigint(20) NOT NULL,
    `typeID`    bigint(20) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`productID`, `typeID`)
VALUES (1, 2),
       (2, 2),
       (3, 2),
       (4, 2),
       (5, 2),
       (6, 2),
       (7, 1),
       (8, 1),
       (9, 1),
       (10, 1),
       (11, 1),
       (12, 1),
       (13, 2),
       (14, 2),
       (15, 2),
       (16, 2),
       (17, 2),
       (18, 2),
       (19, 2),
       (20, 2),
       (21, 2),
       (22, 2),
       (23, 2),
       (24, 2),
       (37, 2),
       (38, 2),
       (39, 2),
       (40, 2),
       (41, 2),
       (42, 2),
       (43, 2),
       (44, 2),
       (45, 2),
       (46, 2),
       (47, 2),
       (48, 2),
       (49, 2),
       (50, 2),
       (51, 2),
       (52, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction`
(
    `tranID`        bigint(20) NOT NULL,
    `userID`        bigint(20) NOT NULL,
    `orderID`       bigint(20) NOT NULL,
    `paymentMethod` text       NOT NULL,
    `status`        text       NOT NULL,
    `createDate`    timestamp  NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tranID`, `userID`, `orderID`, `paymentMethod`, `status`, `createDate`)
VALUES (12, 4, 12, 'creditCard', 'successful', '2020-12-27 02:36:14'),
       (13, 4, 12, 'JuiceByMCB', 'successful', '2020-12-27 13:49:55'),
       (14, 4, 12, 'creditCard', 'successful', '2020-12-27 13:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types`
(
    `typeID`      bigint(20)  NOT NULL,
    `p_type_name` varchar(30) NOT NULL,
    `p_type_desc` text        NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeID`, `p_type_name`, `p_type_desc`)
VALUES (1, 'new', 'new products are tagged as new'),
       (2, 'featured', 'products which have to get attention are tagged as featured'),
       (3, 'hot', 'products on sale are tagged as hot'),
       (4, 'best', 'best- seller products are tagged as best');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user`
(
    `userID`       bigint(20)   NOT NULL,
    `uname`        varchar(50)  NOT NULL,
    `pass`         varchar(100) NOT NULL,
    `fname`        varchar(50)  NOT NULL,
    `lname`        varchar(50)  NOT NULL,
    `email`        varchar(50)  NOT NULL,
    `address`      varchar(60)  NOT NULL,
    `phone`        varchar(8)   NOT NULL,
    `description`  text         NOT NULL,
    `vkey`         varchar(100) NOT NULL,
    `verified`     tinyint(1)   NOT NULL,
    `isSubscribed` tinyint(1)   NOT NULL,
    `isAdmin`      tinyint(1)   NOT NULL,
    `createDate`   timestamp    NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `uname`, `pass`, `fname`, `lname`, `email`, `address`, `phone`, `description`, `vkey`,
                    `verified`, `isSubscribed`, `isAdmin`, `createDate`)
VALUES (1, 'oprah123', '$2y$10$pu.rx7.mCBuy.L/1WjJbiufyUm43iUHjqp9wVLcxqzH0H.qqqOrVm', 'Oprah', 'Windsor',
        'vinoveg106@chatdays.com', 'New York', '57458962', '', '18981cb084d8b9392a26041542908bdc', 1, 1, 1,
        '2020-12-25 17:59:23'),
       (2, 'siri123', '$2y$10$F4agSnQaMewBbKKcoavmn.vmn4Utci5WM1KtFjQ7b/nSQm4lCbVkm', 'Siri', 'Windsor',
        'tadoso1652@aranelab.com', '', '', '', 'e14520491a0cfcba3d5d9de1798273a5', 1, 0, 0, '2020-12-25 14:03:48'),
       (3, 'sanjana2020', '$2y$10$YG6ch/.jzZ9.TGR1D6RVY.FMPHCGX52Bhy6BDYD.4HY4SZ6isovaS', 'sanjana', 'lolo',
        'sanjana.ramchurun@umail.uom.ac.mu', '', '', '', 'b394c058279a76504793c869410d41b8', 1, 0, 0,
        '2020-12-26 18:16:08'),
       (4, 'sanjana2021', '$2y$10$zwnOI5uDLMjFTPh9TuNBf.edR00sOnkp04SRHgkboTUyBDsIPYbZe', 'lala', 'lolo',
        'katy61100@outlook.com', 'flic en flac', '55555555', 'lin bon', 'd7a55e39acca229015eb6224163b3298', 1, 0, 0,
        '2020-12-26 18:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `userorder`
--

CREATE TABLE `userorder`
(
    `orderID`    bigint(20)   NOT NULL,
    `userID`     bigint(20)   NOT NULL,
    `total`      float        NOT NULL,
    `address`    varchar(100) NOT NULL,
    `phone`      varchar(8)   NOT NULL,
    `status`     text         NOT NULL,
    `createDate` timestamp    NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `userorder`
--

INSERT INTO `userorder` (`orderID`, `userID`, `total`, `address`, `phone`, `status`, `createDate`)
VALUES (12, 4, 55, 'flic en flac', '55555555', 'successful', '2020-12-27 02:36:14'),
       (13, 4, 50, '22, Morc Anna', '55555555', 'successful', '2020-12-27 13:49:55'),
       (14, 4, 100, '22, Morc Anna', '55555555', 'successful', '2020-12-27 13:58:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
    ADD PRIMARY KEY (`cartID`),
    ADD KEY `userID` (`userID`);

--
-- Indexes for table `cartitem`
--
ALTER TABLE `cartitem`
    ADD PRIMARY KEY (`cartItemID`),
    ADD KEY `1_Cart_Zero-Or-More_CartItems` (`cartID`),
    ADD KEY `1_Product_Many_CartItems` (`productID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
    ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
    ADD PRIMARY KEY (`orderItemID`),
    ADD KEY `1_Order_Many_OrderItems` (`orderID`),
    ADD KEY `1_Product_Many_OrderItems` (`productID`);




-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
    ADD KEY `1_Product_Many_Categories` (`productID`),
    ADD KEY `1_Category_Many_Products` (`categoryID`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
    ADD KEY `1_Product_Many_Types` (`productID`),
    ADD KEY `1_Type_Many_Products` (`typeID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
    ADD PRIMARY KEY (`tranID`),
    ADD KEY `1_Order_Many_Transactions` (`orderID`),
    ADD KEY `1_User_Many_Transactions` (`userID`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
    ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userorder`
--
ALTER TABLE `userorder`
    ADD PRIMARY KEY (`orderID`),
    ADD KEY `1_User_Many_Orders` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
    MODIFY `cartID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT for table `cartitem`
--
ALTER TABLE `cartitem`
    MODIFY `cartItemID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
    MODIFY `categoryID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
    MODIFY `orderItemID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;



--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
    MODIFY `tranID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
    MODIFY `typeID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
    MODIFY `userID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

--
-- AUTO_INCREMENT for table `userorder`
--
ALTER TABLE `userorder`
    MODIFY `orderID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
    ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


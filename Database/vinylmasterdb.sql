drop database if exists `vinylmasterdb`;
create database if not exists `vinylmasterdb`;
use `vinylmasterdb`;

CREATE TABLE `products`
(
    `productID` bigint(20)   NOT NULL AUTO_INCREMENT,
    `albumcim`  varchar(255) not null,
    `eloado`    varchar(255) not null,
    `leiras`    text         not null,
    `allapot`   varchar(255) not null,
    `kategoria` varchar(255) not null,
    `ar`        int          not null,
    `boritokep` varchar(255) null,
    PRIMARY KEY (`productID`)
);

INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('A Love Supreme', 'John Coltrane',
        'John Coltrane ''A Love Supreme'' című albuma a spirituális jazz zene csúcspontja. Ez az alkotás ötvözi a mély érzelmi tartalmat a zenei újítással, amelynek eredménye egy felejthetetlen zenei élmény.',
        'Új', 'Jazz', 8500, 'Assets\\images\\products\\alovesupreme.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Time Out', 'Dave Brubeck Quartet',
        'A ''Time Out'' az innovatív jazz ritmusokat hozza el hallgatóinak, a Dave Brubeck Quartet előadásában. Az albumon található ''Take Five'' című szám a jazz zene egyik legismertebb darabja lett.',
        'Új', 'Jazz', 7900, 'Assets\\images\\products\\timeout.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Texas Flood', 'Stevie Ray Vaughan',
        'Stevie Ray Vaughan ''Texas Flood'' című albuma a blues zene egyik kiemelkedő alkotása. Vaughan erőteljes gitárjátéka és érzelmekkel teli előadása új életet lehelt a blues műfajba',
        'Új', 'Blues', 8100, 'Assets\\images\\products\\texasflood.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Born Under a Bad Sign', 'Albert King',
        'Albert King ''Born Under a Bad Sign'' albuma a blues zene klasszikusai közé tartozik. King egyedi gitárstílusa és mély, érzelmekkel átitatott előadása az album minden számát emlékezetessé teszi.',
        'Új', 'Blues', 7600, 'Assets\\images\\products\\bornunderabadsign.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Elvis Presley', 'Elvis Presley',
        'Az ''Elvis Presley'' album a rock ''n'' roll királyának, Elvis Presley-nek a korai sikereit örökíti meg. Az album olyan klasszikusokat tartalmaz, mint a ''Heartbreak Hotel'' és ''Blue Suede Shoes''',
        'Új', 'Rock \'n\' Roll', 9000, 'Assets\\images\\products\\elvispresley.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Chuck Berry Is on Top', 'Chuck Berry',
        'A ''Chuck Berry Is on Top'' album Chuck Berry ikonikus rock ''n'' roll stílusának zsenialitását mutatja be. Számok, mint a ''Johnny B. Goode'', mérföldkövei a rock zene történetének.',
        'Új', 'Rock \'n\' Roll', 8300, 'Assets\\images\\products\\chuckberry.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('The Four Seasons', 'Vivaldi',
        'Vivaldi ''Négy évszak'' című műve a barokk zene remekműve. Ezen a lenyűgöző albumon hallható a ''Tavasz'', ''Nyár'', ''Ősz'' és ''Tél'' című kompozíciók, amelyek a természet hangulatát tükrözik.',
        'Új', 'Klasszikus Zene', 9500, 'Assets\\images\\products\\fourseasons.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Symphony No. 5', 'Beethoven',
        'Beethoven 5. szimfóniája az egyik legismertebb klasszikus zenei alkotás. A mű drámai kezdete és az átütő erejű fináléja minden hallgatónak mély élményt nyújt',
        'Új', 'Klasszikus Zene', 8800, 'Assets\\images\\products\\beethoven5.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Golden Hits', 'Johnny Cash',
        'Johnny Cash ''Golden Hits'' albuma a country zene legendájának legismertebb dalait gyűjti össze. Az album a ''Folsom Prison Blues'' és ''Ring of Fire'' című slágerekkel betekintést enged Cash gazdag zenei örökségébe',
        'Új', 'Country', 8200, 'Assets\\images\\products\\johnnycash.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Red Headed Stranger', 'Willie Nelson',
        'A ''Red Headed Stranger'' Willie Nelson egyik kiemelkedő alkotása, amely a klasszikus country zene esszenciáját tükrözi. Az album történetmesélő stílusa és Nelson egyedi hangja mélyen megérinti a hallgatót',
        'Új', 'Country', 7700, 'Assets\\images\\products\\willienelson.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('What\'s Going On', 'Marvin Gaye',
        'Marvin Gaye ''What''s Going On'' című albuma a soul zene mérföldköve. A társadalmi kommentárokkal teli számok, mint a címadó ''What''s Going On'', új dimenziót nyitottak a soul zene világában.',
        'Új', 'Soul és R&B', 8600, 'Assets\\images\\products\\whatsgoingon.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Lady Soul', 'Aretha Franklin',
        'Aretha Franklin ''Lady Soul'' albuma méltán viseli a soul királynője címét. Az albumon olyan örökzöld slágerek találhatók, mint a ''Respect'' és ''Chain of Fools'', melyek a soul zene klasszikusai lettek',
        'Új', 'Soul és R&B', 8000, 'Assets\\images\\products\\ladysoul.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Thriller', 'Michael Jackson',
        'Michael Jackson ''Thriller'' albuma az egyik legjobban eladott lemez minden időkben. Az album úttörő jelentőségű a pop zenei videók terén, és olyan híres dalokat tartalmaz, mint a ''Billie Jean'' és a ''Beat It''',
        'Új', 'Pop', 10000, 'Assets\\images\\products\\thriller.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('1989', 'Taylor Swift',
        'Taylor Swift ''1989'' című albuma a modern pop zene egyik meghatározó alkotása. Az album Swift zenei stílusának érett változását mutatja be, és slágereket tartalmaz, mint a ''Shake It Off'' és ''Blank Space''',
        'Új', 'Pop', 8500, 'Assets\\images\\products\\1989.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Dark Side of the Moon', 'Pink Floyd',
        'A ''Dark Side of the Moon'' a Pink Floyd pszichedelikus rock remekműve. Az album zenei újításai és konceptuális mélysége jelentősen befolyásolta a rock zenei műfaj',
        'Új', 'Rock', 9500, 'Assets\\images\\products\\darksideofthemoon.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Led Zeppelin IV', 'Led Zeppelin',
        'A ''Led Zeppelin IV'' album ikonikus darabja a rock zenének. Olyan híres dalokat tartalmaz, mint a ''Stairway to Heaven'' és ''Black Dog'', amelyek meghatározták a ''70-es évek rock zenéjét.',
        'Új', 'Rock', 9200, 'Assets\\images\\products\\ledzeppeliniv.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('10', 'Tankcsapda',
        'A ''10'' a Tankcsapda magyar rock zenekar egyik meghatározó albuma. Az albumon található energikus és őszinte dalok, mint a ''Mennyország tourist'', a magyar rock zene jeles képviselői.',
        'Új', 'Rock', 7800, 'Assets\\images\\products\\tankcsapda10.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Best of Edda', 'Edda Művek',
        'Az ''Edda Művek Best of'' albuma a magyar rock zene klasszikus darabjait gyűjti össze. Az album dalai, mint a ''Kölyköd voltam'' és ''A kör'', generációk kedvenceivé váltak.',
        'Új', 'Rock', 7700, 'Assets\\images\\products\\eddamuvek.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Homework', 'Daft Punk',
        'A Daft Punk ''Homework'' albuma a francia elektronikus zenei duo debütáló lemeze. Az album innovatív keveréke a house, techno és disco hangzásoknak, új irányt mutatott az elektronikus zenében.',
        'Új', 'Electronic', 8900, 'Assets\\images\\products\\homework.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Selected Ambient Works 85-92',
        'Az ''Aphex Twin Selected Ambient Works 85-92'' albuma az ambient techno zene egyik úttörője. Richard D. James álneve alatt készült ez az album, amely zenei kísérleteivel és innovatív hangzásával hatással volt a későbbi elektronikus zenei alkotásokra',
        'Ambient techno pioneer', 'Új', 'Electronic', 8200, 'Assets\\images\\products\\aphextwin.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Illmatic', 'Nas',
        'Nas ''Illmatic'' albuma az East Coast hip-hop egyik klasszikusa. Az album mély társadalmi és személyes témákat ölel fel, és olyan emblematikus dalokat tartalmaz, mint a ''N.Y. State of Mind'' és ''The World Is Yours''',
        'Új', 'Hip-Hop', 8700, 'Assets\\images\\products\\illmatic.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('The Chronic', 'Dr. Dre',
        'Dr. Dre ''The Chronic'' albuma a West Coast rap zene egyik mérföldköve. Az album jelentős hatással volt a hip-hop zenére a ''90-es években, és olyan klasszikus dalokat tartalmaz, mint a ''Nuthin'' But a ''G'' Thang'' és ''Dre Day''',
        'Új', 'Hip-Hop', 9000, 'Assets\\images\\products\\thechronic.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Blue', 'Joni Mitchell',
        'Joni Mitchell ''Blue'' albuma a folk zene remekműve. Az album személyes és érzelmes dalokkal teli, amelyek mélyen megérintik a hallgatókat, mint például a ''River'' és ''A Case of You''e',
        'Új', 'Folk', 8300, 'Assets\\images\\products\\blue.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Táncdalok', 'Kovács Kati',
        'Kovács Kati ''Táncdalok'' albuma a magyar népzene klasszikusai közé tartozik. Az albumon szereplő dalok, mint a ''Most kéne abbahagyni'' és ''Nem leszek a játékszered'', a magyar popzene meghatározó darabjai.e',
        'Új', 'Folk', 7500, 'Assets\\images\\products\\kovacskati.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Master of Puppets', 'Metallica',
        'A Metallica ''Master of Puppets'' albuma a thrash metal zene egyik alapköve. Az album energikus és technikailag kifinomult zenéje új mércét állított a heavy metal számára',
        'Új', 'Metal', 9200, 'Assets\\images\\products\\masterofpuppets.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Paranoid', 'Black Sabbath',
        'A Black Sabbath ''Paranoid'' albuma a heavy metal zene meghatározó alkotása. Az album olyan ikonikus dalokat tartalmaz, mint a ''Paranoid'' és ''Iron Man'', amelyek a metal zene alapkövei',
        'Új', 'Metal', 8600, 'Assets\\images\\products\\paranoid.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Legend', 'Bob Marley',
        'Bob Marley ''Legend'' albuma a reggae zene legismertebb és legnépszerűbb gyűjteménye. Az albumon található dalok, mint a ''No Woman, No Cry'' és ''Redemption Song'', Marley örökségének esszenciális részét képezik.',
        'Új', 'Reggae', 8400, 'Assets\\images\\products\\legend.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Duppy Conqueror', 'Bob Marley & The Wailers',
        'A ''Duppy Conqueror'' Bob Marley & The Wailers egyik kulcsalbuma, amely a roots reggae zene esszenciáját mutatja be. Az album dalaiban Marley spirituális üzenetei és a reggae zenei stílusa találkozik.',
        'Új', 'Reggae', 7900, 'Assets\\images\\products\\duppyconqueror.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Álomarcú lány', 'Presser Gábor',
        'Presser Gábor ''Álomarcú lány'' című albuma a magyar pop zene kiemelkedő darabja. Az album dalai, mint a címadó ''Álomarcú lány'' és ''Neked írom a dalt'', Presser egyedi zenei stílusát és zeneszerzői tehetségét mutatják be',
        'Új', 'Pop', 7800, 'Assets\\images\\products\\alomarculany.jpg');
INSERT INTO `products` (albumcim, eloado, leiras, allapot, kategoria, ar, boritokep)
VALUES ('Best of Zséda', 'Zséda',
        'A ''Best of Zséda'' album Zséda legnépszerűbb magyar pop slágereit gyűjti össze. Az albumon olyan ismert dalok találhatók, mint a ''Mint a film'' és ''Asszony leszek'', amelyek a modern magyar popzene fontos pillanatai.',
        'Új', 'Pop', 7600, 'Assets\\images\\products\\zsedabestof.jpg');

CREATE TABLE `categories`
(
    `categoryID` bigint(20)  NOT NULL,
    `p_cat_name` varchar(30) NOT NULL,
    `p_cat_desc` text        NOT NULL
);


INSERT INTO `categories` (`categoryID`, `p_cat_name`, `p_cat_desc`)
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

CREATE TABLE `product_category`
(
    `productID`  bigint(20) NOT NULL,
    `categoryID` bigint(20) NOT NULL
);

INSERT INTO `product_category` (`productID`, `categoryID`)
VALUES (1, 1),
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
       (23, 1),
       (24, 2),
       (25, 3),
       (26, 4),
       (27, 5),
       (28, 6),
       (29, 7),
       (30, 8);

CREATE TABLE `product_type`
(
    `productID` bigint(20) NOT NULL,
    `typeID`    bigint(20) NOT NULL
);

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
       (25, 2),
       (26, 2),
       (27, 2),
       (28, 2),
       (29, 2),
       (30, 2);

CREATE TABLE `types`
(
    `typeID`      bigint(20)  NOT NULL,
    `p_type_name` varchar(30) NOT NULL,
    `p_type_desc` text        NOT NULL
);

INSERT INTO `types` (`typeID`, `p_type_name`, `p_type_desc`)
VALUES (1, 'új', 'az új albumokat újként jelölik'),
       (2, 'kiemelt', 'a nagy érdeklődést kiváltó albumokat kiemeltként jelölik'),
       (3, 'akciós', 'az akciós termékeket akciós jelölik'),
       (4, 'legjobb', 'a legjobban fogyó termékeket legjobbként jelölik');

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
);

CREATE TABLE `cart`
(
    `cartID` bigint(20) NOT NULL,
    `userID` bigint(20) NOT NULL
);

CREATE TABLE `cartitem`
(
    `cartItemID` bigint(20)  NOT NULL,
    `productID`  bigint(20)  NOT NULL,
    `cartID`     bigint(20)  NOT NULL,
    `price`      float       NOT NULL,
    `quantity`   smallint(6) NOT NULL,
    `createDate` timestamp   NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

CREATE TABLE `userorder`
(
    `orderID`    bigint(20)   NOT NULL,
    `userID`     bigint(20)   NOT NULL,
    `total`      float        NOT NULL,
    `address`    varchar(100) NOT NULL,
    `phone`      varchar(8)   NOT NULL,
    `status`     text         NOT NULL,
    `createDate` timestamp    NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

CREATE TABLE `orderitem`
(
    `orderItemID` bigint(20)  NOT NULL,
    `productID`   bigint(20)  NOT NULL,
    `orderID`     bigint(20)  NOT NULL,
    `price`       float       NOT NULL,
    `quantity`    smallint(6) NOT NULL,
    `createDate`  timestamp   NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

CREATE TABLE `transaction`
(
    `tranID`        bigint(20) NOT NULL,
    `userID`        bigint(20) NOT NULL,
    `orderID`       bigint(20) NOT NULL,
    `paymentMethod` text       NOT NULL,
    `status`        text       NOT NULL,
    `createDate`    timestamp  NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);


ALTER TABLE `cart`
    ADD PRIMARY KEY (`cartID`),
    ADD KEY `userID` (`userID`);

ALTER TABLE `cartitem`
    ADD PRIMARY KEY (`cartItemID`),
    ADD KEY `1_Cart_Zero-Or-More_CartItems` (`cartID`),
    ADD KEY `1_Product_Many_CartItems` (`productID`);

ALTER TABLE `categories`
    ADD PRIMARY KEY (`categoryID`);

ALTER TABLE `orderitem`
    ADD PRIMARY KEY (`orderItemID`),
    ADD KEY `1_Order_Many_OrderItems` (`orderID`),
    ADD KEY `1_Product_Many_OrderItems` (`productID`);

ALTER TABLE `product_category`
    ADD KEY `1_Product_Many_Categories` (`productID`),
    ADD KEY `1_Category_Many_Products` (`categoryID`);

ALTER TABLE `product_type`
    ADD KEY `1_Product_Many_Types` (`productID`),
    ADD KEY `1_Type_Many_Products` (`typeID`);

ALTER TABLE `transaction`
    ADD PRIMARY KEY (`tranID`),
    ADD KEY `1_Order_Many_Transactions` (`orderID`),
    ADD KEY `1_User_Many_Transactions` (`userID`);

ALTER TABLE `types`
    ADD PRIMARY KEY (`typeID`);

ALTER TABLE `user`
    ADD PRIMARY KEY (`userID`);

ALTER TABLE `userorder`
    ADD PRIMARY KEY (`orderID`),
    ADD KEY `1_User_Many_Orders` (`userID`);

ALTER TABLE `cart`
    MODIFY `cartID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

ALTER TABLE `cartitem`
    MODIFY `cartItemID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

ALTER TABLE `categories`
    MODIFY `categoryID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

ALTER TABLE `orderitem`
    MODIFY `orderItemID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

ALTER TABLE `transaction`
    MODIFY `tranID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

ALTER TABLE `types`
    MODIFY `typeID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

ALTER TABLE `user`
    MODIFY `userID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

ALTER TABLE `userorder`
    MODIFY `orderID` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;


ALTER TABLE `cartitem`
    ADD CONSTRAINT `1_Cart_Zero-Or-More_CartItems` FOREIGN KEY (`cartID`) REFERENCES `cart` (`cartID`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `1_Product_Many_CartItems` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `orderitem`
    ADD CONSTRAINT `1_Order_Many_OrderItems` FOREIGN KEY (`orderID`) REFERENCES `userorder` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `1_Product_Many_OrderItems` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `product_category`
    ADD CONSTRAINT `1_Category_Many_Products` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `1_Product_Many_Categories` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `product_type`
    ADD CONSTRAINT `1_Product_Many_Types` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `1_Type_Many_Products` FOREIGN KEY (`typeID`) REFERENCES `types` (`typeID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `transaction`
    ADD CONSTRAINT `1_Order_Many_Transactions` FOREIGN KEY (`orderID`) REFERENCES `userorder` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `1_User_Many_Transactions` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `userorder`
    ADD CONSTRAINT `1_User_Many_Orders` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `cart`
    ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;



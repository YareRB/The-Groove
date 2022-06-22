/* ----------------------------------------------------------------------*/
--                             SCRIPT DB
/*------------------------------------------------------------------------*/

-- ----------------------------------------------------------
-- CREATE TABLES
	CREATE TABLE `jramirez`.`category` (
	  `idCategory` INT NOT NULL AUTO_INCREMENT,
	  `name` VARCHAR(100) NOT NULL,
	  PRIMARY KEY (`idCategory`));
	  
	CREATE TABLE `jramirez`.`artist` (
	  `idArtist` INT NOT NULL AUTO_INCREMENT,
	  `name` VARCHAR(100) NOT NULL,
	  PRIMARY KEY (`idArtist`));
	  
	CREATE TABLE `jramirez`.`ubication` (
	  `idUbication` INT NOT NULL AUTO_INCREMENT,
	  `name` VARCHAR(100) NOT NULL,
	  `latitude` FLOAT NOT NULL,
	  `longitude` FLOAT NOT NULL,
	  PRIMARY KEY (`idUbication`));

	CREATE TABLE `jramirez`.`status` (
	  `idStatus` INT NOT NULL AUTO_INCREMENT,
	  `description` VARCHAR(45) NOT NULL,
	  PRIMARY KEY (`idStatus`));
	  
	CREATE TABLE `jramirez`.`user` (
	  `idUser` INT NOT NULL AUTO_INCREMENT,
	  `username` VARCHAR(100) NOT NULL,
	  `email` VARCHAR(100) NOT NULL,
	  `phoneNumber` INT NOT NULL,
	  `password` VARCHAR(45) NOT NULL,
	  PRIMARY KEY (`idUser`));
	  
	CREATE TABLE `jramirez`.`vinyl` (
	  `idVinyl` INT NOT NULL  AUTO_INCREMENT,
	  `name` VARCHAR(100) NOT NULL,
	  `description` VARCHAR(500) NOT NULL,
	  `year` INT NOT NULL,
	  `image` VARCHAR(100) NOT NULL,
	  `price` FLOAT NOT NULL,
	  `idArtist` INT NOT NULL,
	  `idCategory` INT NOT NULL,
	  PRIMARY KEY (`idVinyl`),
	  INDEX `fk_idArtist_idx` (`idArtist` ASC),
	  INDEX `fk_idCategory_idx` (`idCategory` ASC),
	  CONSTRAINT `fk_idArtist`
		FOREIGN KEY (`idArtist`)
		REFERENCES `jramirez`.`artist` (`idArtist`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	  CONSTRAINT `fk_idCategory`
		FOREIGN KEY (`idCategory`)
		REFERENCES `jramirez`.`category` (`idCategory`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION);

	CREATE TABLE `jramirez`.`cart` (
	  `idCart` INT NOT NULL AUTO_INCREMENT,
	  `idUser` INT NULL,
	  PRIMARY KEY (`idCart`),
	  INDEX `fk_idUser_idx` (`idUser` ASC),
	  CONSTRAINT `fk_idUser`
		FOREIGN KEY (`idUser`)
		REFERENCES `jramirez`.`user` (`idUser`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION);

	CREATE TABLE `jramirez`.`detailCart` (
	  `idDetailCart` INT NOT NULL  AUTO_INCREMENT,
	  `idVinyl` INT NOT NULL,
	  `idCart` INT NOT NULL,
	  `idStatus` INT NOT NULL,
	  PRIMARY KEY (`idDetailCart`),
	  INDEX `fk_idVinyl_idx` (`idVinyl` ASC),
	  INDEX `fk_idCart_idx` (`idCart` ASC),
	  INDEX `fk_Status_idx` (`idStatus` ASC),
	  CONSTRAINT `fk_idVinyl`
		FOREIGN KEY (`idVinyl`)
		REFERENCES `jramirez`.`vinyl` (`idVinyl`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	  CONSTRAINT `fk_idCart`
		FOREIGN KEY (`idCart`)
		REFERENCES `jramirez`.`cart` (`idCart`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	  CONSTRAINT `fk_Status`
		FOREIGN KEY (`idStatus`)
		REFERENCES `jramirez`.`status` (`idStatus`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION);

	CREATE TABLE `jramirez`.`order` (
	  `idOrder` INT NOT NULL AUTO_INCREMENT,
	  `idUser` INT NOT NULL,
	  `total` FLOAT NOT NULL,
	  `idStatus` INT NOT NULL DEFAULT 0,
	  `numberOfVinyls` INT NOT NULL,
	  PRIMARY KEY (`idOrder`),
	  INDEX `fk_idUser_idx` (`idUser` ASC),
	  INDEX `fk_idStatus_idx` (`idStatus` ASC),
	  CONSTRAINT `fk_idUser_order`
		FOREIGN KEY (`idUser`)
		REFERENCES `jramirez`.`user` (`idUser`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	  CONSTRAINT `fk_idStatus_order`
		FOREIGN KEY (`idStatus`)
		REFERENCES `jramirez`.`status` (`idStatus`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION);

	CREATE TABLE `jramirez`.`detailOrder` (
  `idDetailOrder` INT NOT NULL AUTO_INCREMENT,
  `idOrder` INT NOT NULL,
  `idVinyl` INT NOT NULL,
  PRIMARY KEY (`idDetailOrder`),
  INDEX `fk_idOrder_idx` (`idOrder` ASC),
  INDEX `fk_idVinyl_idx` (`idVinyl` ASC),
  CONSTRAINT `fk_idOrder_detail`
    FOREIGN KEY (`idOrder`)
    REFERENCES `jramirez`.`order` (`idOrder`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_idVinyl_detail`
    FOREIGN KEY (`idVinyl`)
    REFERENCES `jramirez`.`vinyl` (`idVinyl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    
-- ----------------------------------------------------------

-- ADD DATA
-- ARTIST
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Petit Biscuit');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Lorde');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('SZA');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Alina Baraz');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('SG Lewis');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Kacey Musgraves');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Galimatias');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Cautious Clay');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Clairo');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Frank Ocean');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('BLACKPINK');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Gorillaz');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Cavetown');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Ariana Grande');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Rare Americans');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Bo Burnham');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Harry Styles');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('PSY');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('BTS');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Wilbur Soot');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('The Weeknd');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Rosalía');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Bad Bunny');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Billie Eilish');
INSERT INTO `jramirez`.`artist` (`name`) VALUES ('Olivia Rodrigo');

-- CATEGORY
INSERT INTO `jramirez`.`category` (`name`) VALUES ('Electronic');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('Dance ');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('Pop');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('R&B');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('CountryPop');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('Indie Pop');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('K-Pop');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('Synth-Pop');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('Indie Rock');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('Pop');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('Musical Comedy');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('Pop-Funk');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('Alternative Reggaeton');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('Reggaeton');
INSERT INTO `jramirez`.`category` (`name`) VALUES ('ElectroPop');

-- VINYL
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Presence', '2017 debut album from classically-trained French artist Petit Biscuit. Recorded over the course of the past year, Petit Biscuit - AKA Mehdi Benjelloun - wrote, produced and mixed Presence completely independently, finding time between high school exams and sold out tours across the U. S., Europe and beyond. The album is his complete creative vision, and includes contributions from Lido, Bipolar Sunshine and Panama.', '2018', 'presence-petit-biscuit.svg', '800', '1', '2');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Melodrama', 'Melodrama is the second studio album by New Zealand singer-songwriter Lorde. It was released on 16 June 2017 by Lava and Republic Records and distributed through Universal. Following the breakthrough success of her debut album Pure Heroine (2013), Lorde retreated from the spotlight, and travelled between New Zealand and the United States to examine the world around her. Initially inspired by her disillusionment with fame, she wrote Melodrama to capture heartbreak and solitude after her first breakup.', '2017', 'melodrama-lorde.svg', '950', '2', '3');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Ctrl', 'Ctrl (pronounced \"control\") is the debut studio album by American singer SZA. It was released on June 9, 2017, on Top Dawg Entertainment and RCA Records. It features guest appearances from Travis Scott, Kendrick Lamar, James Fauntleroy, and Isaiah Rashad. Originally scheduled for release in late 2015, it was delayed by SZA\'s experience of \"a kind of blinding paralysis brought on by anxiety.\" She reworked the album until her record company took away her hard drive in the spring of 2017.', '2017', 'ctrl-sza.svg', '1200', '3', '4');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Sunbeam', 'Russian American singer-songwriter and industry best-kept-secret Alina Baraz has remained one of the most consistent artists of the past few years, providing us with dreamscape lullabies and hypnotic mood music. She delivers more of that exact brand of aural escapism on her UnitedMasters label debut, the EP Sunbeam.', '2021', 'sunbeam-alina-baraz.svg', '1000', '4', '4');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Dawn', 'The PMR-signed songwriter, producer and multi-instrumentalist SG Lewis releases ‘Dawn’, the third and final chapter of his three-part concept album Dusk, Dark, Dawn via PMR/Virgin.', '2019', 'dawn-sg-lewis.svg', '850', '5', '2');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Golden Hour', 'Golden Hour is the fourth studio album by American country music singer and songwriter Kacey Musgraves. Golden Hour debuted at number four on the US Billboard 200. Receiving widespread critical acclaim, the album and its songs won in all four of their nominated categories at the 61st Grammy Awards, including Album of the Year and Best Country Album.', '2018', 'golden-hour-kacey-musgraves.svg', '800', '6', '5');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Renaissance Boy', 'From producing on Alina Baraz’s Urban Flora project to now, with his debut album Renaissance Boy, danish electronic artist Galimatias has maintained his signature sound but also elevated with surprising beat switches, poignant lyricism, and masterful composition.', '2020', 'renaissance-boy-galimatias.svg', '1200', '7', '1');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Blood Type', 'On Blood Type, Clay connects on topics like the balance between relationships and personal goals (Joshua Tree), lessons from failed relationships (Juliet + Caesar), and more. Clay\'s lyrics are both beautifully poetic and neatly constructed while being relatable.', '2018', 'blood-type-cautious-clay.svg', '950', '8', '4');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Immunity', 'Immunity is the debut studio album by American singer-songwriter Clairo, released on August 2, 2019, by Fader Label. The album was co-produced by Clairo and Rostam Batmanglij, formerly of Vampire Weekend. It has been described as a soft rock, bedroom pop, electropop, and indie pop record.', '2019', 'immunity-clairo.svg', '1000', '9', '6');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Blonde', 'Blonde (alternatively titled blond) is the second studio album by American singer Frank Ocean. It was released on August 20, 2016, as a timed exclusive on the iTunes Store and Apple Music, and followed the August 19 release of Ocean\'s video album Endless. The album features guest vocals from André 3000, Beyoncé, and Kim Burrell, among others.', '2016', 'blonde-frank-ocean.svg', '850', '10', '4');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('THE ALBUM', 'THE ALBUM is the first Korean studio album and second overall album by the South Korean girl group BLACKPINK. It was released on October 2, 2020, by YG Entertainment and Interscope Records. It is the group\'s first full-length work since their debut in 2016.] For the album, Blackpink recorded over ten new songs and worked with a variety of producers, including Teddy, Tommy Brown, R. Tee, Steven Franks, and 24.', '2020', 'the-album-blackpink.svg', '826', '11', '7');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('The Now Now', 'The Now Now is the sixth studio album recorded by the British virtual band Gorillaz, released on 29 June 2018 via Parlophone and Warner Bros. Records. Recording for the album began in late 2017 – according to Gorillaz co-creator Damon Albarn, it was recorded quickly so the band would have new material to play at future concerts.', '2018', 'he-now-now-gorillaz.svg', '410', '12', '8');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Man\'s Best Friend', 'Man’s Best Friend” was first announced by Cavetown on May 14th, 2021 following the release of the fourth and finale single “Ur Gonna Wish U Believed Me” The EP released on June 4th, 2021 with three new songs “Idea of Her”, “Guilty”, and a reworked version of an old Bandcamp song titled “I Want to Meet ur Dog.', '2021', 'mans-best-friend-cavetown.svg', '432', '13', '9');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('thank u, next', 'Thank U, Next is the fifth studio album by American singer Ariana Grande, released on February 8, 2019, by Republic Records. It was released six months after her fourth studio album Sweetener (2018), conceived in the midst of Grande\'s personal struggles, including the death of ex-boyfriend Mac Miller and the end of her engagement to Pete Davidson. Grande began working on the album in October 2018, enlisting writers and producers such as Tommy Brown, Max Martin, Ilya Salmanzadeh and Pop Wansel.', '2019', 'thank-u-next-ariana-grande.svg', '1568', '14', '10');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Jamesy Boy & The Screw Loose Zoo', 'The third installment of the “Rare Americans” album series. First found by u/protocal_deviation on Reddit, this name was in the description of the B.A.G.G.A.G.E. music video in the song information part.', '2021', 'jamesy-boy-&-the-screw-loose-zoo-rare-americans.svg', '400', '15', '9');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('INSIDE', 'Bo Burnham: Inside is a 2021 American special written, directed, filmed, edited, and performed by comedian Bo Burnham. Recorded in the guest house of his Los Angeles home during the COVID-19 pandemic without a crew or audience, it was released on Netflix on May 30, 2021. Featuring a variety of songs and sketches about Burnham\'s day-to-day life indoors, it depicts his deteriorating mental health and explores themes of performativity and his relationship to the Internet and the audience it helped him reach, as well as addressing issues including climate change and social movements.', '2021', 'inside-bo-burnham.svg', '755', '16', '11');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Harry\'s House', 'Harry\'s House is the third studio album by English singer and songwriter Harry Styles, released on 20 May 2022 by Columbia and Erskine Records. The album was largely written and recorded during 2020 and 2021 and has been noted as Styles most introspective work.', '2022', 'harrys-house-harry-styles.svg', '972', '17', '12');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('PSY 9th', 'Psy 9th (stylized as PSY 9th, Korean: 싸다9; RR: Ssada-gu) is the eighth studio album recorded by South Korean singer Psy. It was released on April 29, 2022 through P Nation, and distributed by Dreamus Company. The album is Psy\'s first release in five years following 4X2=8 (2017) and his first record after the establishment of his own label, P Nation, in January 2019. It consists of twelve tracks, including the lead single \"That That\" featuring Suga of BTS, alongside various other guest appearances including Sung Si-kyung, Heize, Jessi, Hwasa, Crush, and Tablo.', '2022', 'psy-9th-psy.svg', '800', '18', '7');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Proof', 'Proof is the first anthology album released by South Korean boy band BTS, on June 10, 2022, through Big Hit Music. The album\'s lead single, \"Yet to Come (The Most Beautiful Moment)\", was released the same day.', '2022', 'proof-bts.svg', '1995', '19', '7');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Your City Gave Me Asthma', 'Your City Gave Me Asthma is popular Twitch streamer Wilbur Soot’s debut album. Its songs handle themes of loneliness, substance abuse, and a desperate need to escape London. In a Twitch stream on December 20, 2020, Wilbur stated that a girl he liked and then eventually dated for two years when he was 17 years old is the subject of a lot of the songs on this album.', '2020', 'your-city-gave-me-asthma-wilbur-soot.svg', '693', '20', '9');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('After Hours', 'Is the fourth studio album by Canadian singer-songwriter the Weeknd, The standard edition of the album has no features, although the remixes edition contains guest appearances from Chromatics and Lil Uzi Vert.', '2020', 'after-hours-the-weeknd.svg', '920', '21', '8');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Motomami', 'Motomami is the third studio album by Spanish singer-songwriter Rosalía. It was released on March 18, 2022 through Columbia Records. The album features collaborations from Canadian The Weeknd and Dominican Tokischa.', '2022', 'motomami-rosalia.svg', '1000', '22', '13');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Un verano sin ti', 'Un verano sin ti is the fourth solo studio album and fifth overall by Puerto Rican rapper and singer Bad Bunny. ', '2022', 'un-verano-sin-ti-bad-bunny.svg', '920', '23', '14');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Happier Than Ever', 'Happier Than Ever is the second studio album by Billie Eilish. It was released on July 30, 2021 through Interscope Records.', '2021', 'happier-than-ever-billie-eilish.svg', '1200', '24', '15');
INSERT INTO `jramirez`.`vinyl` (`name`, `description`, `year`, `image`, `price`, `idArtist`, `idCategory`) VALUES ('Sour', 'Is the first studio album by American singer-songwriter Olivia, stated that the album explores the dangers and discoveries as a seventeen-year-old.', '2021', 'sour-olivia-rodrigo.svg', '800', '25', '3');

-- SUCURSALES
INSERT INTO `jramirez`.`ubication` (`name`, `latitude`, `longitude`) VALUES ('Sucursal 1', '21.151793', '-101.711609');

-- STATUS
INSERT INTO `jramirez`.`status` (`description`) VALUES ('Sent');
INSERT INTO `jramirez`.`status` (`description`) VALUES ('Arrived');
INSERT INTO `jramirez`.`status` (`description`) VALUES ('Cancelled');
INSERT INTO `jramirez`.`status` (`description`) VALUES ('Active');
INSERT INTO `jramirez`.`status` (`description`) VALUES ('Deleted');

-- USER
INSERT INTO `jramirez`.`user` (`username`, `email`, `phoneNumber`, `password`) VALUES ('the-groove', 'the_grove@gmail.com', '4471528631', '1234');

-- ORDER

-- DETAIL ORDER

-- CART
INSERT INTO `jramirez`.`cart` (`idUser`) VALUES ('1');

-- DETAIL CART
INSERT INTO `jramirez`.`detailCart` (`idVinyl`, `idCart`, `idStatus`) VALUES ('1', '1', '1');


-- ACTUALIZACION NOMBRES COLUMN
ALTER TABLE `jramirez`.`artist` 
CHANGE COLUMN `name` `artistName` VARCHAR(100) NOT NULL ;

ALTER TABLE `jramirez`.`vinyl` 
CHANGE COLUMN `name` `vinylName` VARCHAR(100) NOT NULL ;




INSERT INTO `jramirez`.`detailCart` (`idVinyl`, `idCart`, `idStatus`) VALUES ('2', '1', '4');
UPDATE `jramirez`.`detailCart` SET `idStatus` = '4' WHERE (`idDetailCart` = '1');
INSERT INTO `jramirez`.`detailCart` (`idVinyl`, `idCart`, `idStatus`) VALUES ('7', '1', '4');
INSERT INTO `jramirez`.`detailCart` (`idVinyl`, `idCart`, `idStatus`) VALUES ('9', '1', '5');

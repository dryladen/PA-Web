-- MariaDB dump 10.19  Distrib 10.6.4-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: oal
-- ------------------------------------------------------
-- Server version	10.6.4-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `animes`
--

DROP TABLE IF EXISTS `animes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `synopsis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `episodes` int(11) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `season` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `studio` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animes`
--

LOCK TABLES `animes` WRITE;
/*!40000 ALTER TABLE `animes` DISABLE KEYS */;
INSERT INTO `animes` VALUES (21,'Fullmetal Alchemist: Brotherhood','https://cdn.myanimelist.net/images/anime/1223/96541.jpg?s=faffcb677a5eacd17bf761edd78bfb3f','',64,9.16,'',2006,'0'),(22,'Gintama°','https://cdn.myanimelist.net/images/anime/3/72078.jpg?s=e9537ac90c08758594c787ede117f209',NULL,51,9.09,NULL,NULL,NULL),(25,'Owarimonogatari 2nd Season','https://cdn.myanimelist.net/images/anime/6/87322.jpg?s=3e60507a4b6016d83e7433aa4cb7853e','',7,8.91,'',2010,'Shaft'),(26,'Komi-san wa, Comyushou desu.','https://cdn.myanimelist.net/images/anime/1899/117237.jpg','            Hitohito Tadano is an ordinary boy who heads into his first day of high school with a clear plan: to avoid trouble and do his best to blend in with others. Unfortunately, he fails right away when he takes the seat beside the school\'s madonna—Shouko Komi. His peers now recognize him as someone to eliminate for a chance to sit next to the most beautiful girl in class.\r\n\r\nGorgeous and graceful with long, dark hair, Komi is universally adored and immensely popular despite her mysterious persona. However, unbeknownst to everyone, she has crippling anxiety and a communication disorder which prevents her from wholeheartedly socializing with her classmates.\r\n\r\nWhen left alone in the classroom, a chain of events forces Komi to interact with Tadano through writing on the blackboard, as if in a one-way conversation. Being the first person to realize she cannot communicate properly, Tadano picks up the chalk and begins to write as well. He eventually discovers that Komi\'s goal is to make one hundred friends during her time in high school. To this end, he decides to lend her a helping hand, thus also becoming her first-ever friend.        ',0,8.32,'Fall',2021,'OLM'),(27,'Mushoku Tensei: Isekai Ittara Honki Dasu Part 2','https://cdn.myanimelist.net/images/anime/1737/119392.jpg','After the mysterious mana calamity, Rudeus Greyrat and his fierce student Eris Boreas Greyrat are teleported to the Demon Continent. There, they team up with their newfound companion Ruijerd Supardia—the former leader of the Superd\'s Warrior group—to form \"Dead End,\" a successful adventurer party. Making a name for themselves, the trio journeys across the continent to make their way back home to Fittoa.\r\n\r\nFollowing the advice he received from the faceless god Hitogami, Rudeus saves Kishirika Kishirisu, the Great Emperor of the Demon World, who rewards him by granting him a strange power. Now, as Rudeus masters the powerful ability that offers a number of new opportunities, it might prove to be more than what he bargained for when unexpected dangers threaten to hinder their travels.',12,8.66,'Fall',2021,'0'),(33,'Kimetsu no Yaiba: Mugen Ressha-hen','https://cdn.myanimelist.net/images/anime/1065/118763.jpg','                    A mysterious string of disappearances on a certain train has caught the attention of the Demon Slayer Corps, and they have sent one of their best to exterminate what can only be a demon responsible. However, the plan to board the Mugen Train is delayed by a lesser demon who is terrorizing the mechanics and targeting a kind, elderly woman and her granddaughter. Kyoujurou Rengoku, the Flame Pillar, must eliminate the threat before boarding the train.\r\n\r\nSent to assist the Pillar, Tanjirou Kamado, Inosuke Hashibira, and Zenitsu Agatsuma enter the train prepared to fight. But their monstrous target already has a devious plan in store for them and the two hundred passengers: by delving deep into their consciousness, the demon intends to obliterate everyone in a stunning display of the power held by the Twelve Demon Moons. \r\n\r\n[Written by MAL Rewrite]                ',7,8.39,'Fall',2021,'ufotable'),(34,'Takt Op. Destiny','https://cdn.myanimelist.net/images/anime/1449/117797.jpg','                    The United States of America has been in chaos ever since the emergence of D2s, an invasive species originating from a black meteorite that fell to Earth. A public decree banned citizens from playing any melodies, to prevent further casualties caused by the D2s\' hatred for music—even now, in 2047, this prohibition is still in effect. Humanity\'s only form of defense against the D2s are Musicarts, young women representing pieces of classical music; and Conductors, the ones controlling them.\r\n\r\nTakt Asahina, an aloof piano prodigy, finds himself transformed into a Conductor following a spontaneous D2 attack. The same incident kills Anna Schneider\'s younger sister, Cosette, and brings Takt into contact with his Musicart, Destiny. Searching for a means of stabilizing the pact between themselves, Takt and Destiny—alongside Anna—embark on a perilous journey to the Symphonica Headquarters in New York City.\r\n\r\nTakt is in a hurry to reach the city so that he can play the piano again, even though his passion attracts the creatures he has come to despise. Meanwhile, Destiny\'s sense of duty drags the group into trouble along the way. With a D2-infested path and many more arduous obstacles ahead of them, will the trio make it to New York City in one piece?\r\n\r\n[Written by MAL Rewrite]                ',NULL,7.8,'Fall',2021,'Madhouse'),(35,'Platinum End','https://cdn.myanimelist.net/images/anime/1992/116576.jpg','                    Ever since he lost his family in an explosion, Mirai Kakehashi has lived a life of pain and despair. Every day, he endures abuse at the hands of relatives who took him in. As his anguish steadily chips away at his will to live, he is eventually pushed to the brink. Prepared to throw it all away, he stands on the edge of a precipice and takes the leap. However, instead of falling to his death, he enters a trance where he meets a winged being who claims to be his guardian angel. Named Nasse, the angel offers him two priceless abilities and convinces him to go on living.\r\n\r\nWhen Mirai experiences the marvel of his new powers firsthand, he gets a taste of the freedom that was locked away from him for so long. Armed with Nasse\'s gifts, Mirai is flung into a showdown with 12 other individuals, one of which will be chosen to become the next God. In stark contrast to when he wanted to end his life, Mirai is now prepared to do whatever it takes to protect his bleak chance at happiness, lest it be wrenched from his grasp forever.\r\n\r\n[Written by MAL Rewrite]                ',24,7.14,'Fall',2021,'Signal.MD'),(37,'Blue Period','https://cdn.myanimelist.net/images/anime/1757/116931.jpg','                    Second-year high school student Yatora Yaguchi is a delinquent with excellent grades, but is unmotivated to find his true calling in life. Yatora spends his days working hard to maintain his academic standing while hanging out with his equally unambitious friends. However, beneath his carefree demeanor, Yatora does not enjoy either activity and wishes he could find something more fulfilling.\r\n\r\nWhile mulling over his predicament, Yatora finds himself staring at a vibrant landscape of Shibuya. Unable to express how he feels about the unusually breathtaking sight, he picks up a paintbrush, hoping his thoughts will be conveyed on canvas. After receiving praise for his work, the joy he feels sends him on a journey to enter the extremely competitive Tokyo University of the Arts—a school that only accepts one in every 200 applicants.\r\n\r\nFacing talented peers, a lack of understanding of the fine arts, and struggles to obtain his parents’ approval, Yatora is confronted by much adversity. In the hopes of securing one of the five prestigious spots in his program of choice, Yatora must show that his inexperience does not define him. \r\n\r\n[Written by MAL Rewrite]                ',NULL,7.75,'Fall',2021,'Seven Arcs'),(38,'Sekai Saikou no Ansatsusha, Isekai Kizoku ni Tensei suru','https://cdn.myanimelist.net/images/anime/1928/117620.jpg','                    The world\'s greatest assassin had sworn lifelong allegiance to the organization that raised him. However, despite his loyalty, that very same organization takes action to silence him, ultimately leading to his demise. Drowning in frustration and regrets he can no longer suppress, he finds himself in an audience with a goddess attracted by his exceptional skills. The goddess offers him reincarnation into a magnificent world of swords and magic so he can perform a crucial mission: prevent that world\'s destruction by slaying its hero.\r\n\r\nAccepting the goddess\' request, he is reborn as Lugh Tuatha Dé, the son of a noble family of assassins serving the Alvan Kingdom. Under the guidance of his father, Lugh learns new assassination techniques that significantly differ from the cold-blooded and unsympathetic killing style of his previous life. Furthermore, his other talents bloom, allowing him to meet new allies and acquaintances. Even so, Lugh knows that his efforts are far from adequate, because a monumental adversary such as the hero can only be defeated with perfection.\r\n\r\n[Written by MAL Rewrite]                ',12,7.7,'Fall',2021,'SILVER LINK.'),(40,'86 Part 2','https://cdn.myanimelist.net/images/anime/1321/117508.jpg','                    The disappearance of the Spearhead Squadron beyond the horizon does little to hide the intensity of the Republic of San Magnolia\'s endless propaganda. Vladilena Milizé continues to operate as \"Handler One,\" the commander of yet another dehumanized 86th faction\'s squadron in the continuous war against the Legion.\r\n\r\nOn the Western Front, Shinei Nouzen and his squad are quarantined in a military base controlled by the Federal Republic of Giad, formerly known as the Giadian Empire. The newly-established government grants the saved Eighty-Six full citizenship and freedom. Housed by the president Ernst Zimmerman himself, the group meets his adoptive daughter and the last Empress, Augusta Frederica Adel-Adler.\r\n\r\nHowever, within the calm of this tender society, Shinei and his team feel that their purpose is on the battlefield. Before long, they are once again in the midst of the Legion\'s onslaught as a part of the Federacy\'s Nordlicht Squadron, accompanied by Augusta Frederica. But, as history repeats itself, they realize that no matter the side, death and pain on the front lines are the only comfort they know.\r\n\r\n[Written by MAL Rewrite]                ',12,8.63,'Fall',2021,'A-1 Pictures'),(42,'Saihate no Paladin','https://cdn.myanimelist.net/images/anime/1176/118382.jpg','                    Born into a new world after a life of stagnancy, Will awakens to the faces of a skeleton, a ghost, and a mummy. Living in the ruins of a city long fallen, the three raise Will as their own. The skeleton— Blood—teaches him to fight; the ghost—Gus—teaches him magic; and the mummy—Mary—teaches him religion and responsibility. Most importantly, they all teach him love.      \r\n\r\nAs Will grows up and learns about the world he was born into, he prepares for the day when he must finally set out on his own. For Will, this journey includes a lifelong promise. At their coming-of-age, every adult is required to swear an oath to the god of their choice, with the strength of the pledge affecting the degree of their sworn god\'s blessing.\r\n\r\nWith his departure approaching, Will must prepare to accept the truth of his undead guardians and embark into a world that even they don\'t know the state of. Will discovers, however, that every oath must be fulfilled, one way or another.\r\n\r\n[Written by MAL Rewrite]                ',12,7.35,'Fall',2021,'Children\'s Playground Entertainment'),(43,'Senpai ga Uzai Kouhai no Hanashi','https://cdn.myanimelist.net/images/anime/1619/118820.jpg','                    At a certain trading company, saleswoman Futaba Igarashi has managed to hold her respectable job for almost two years thanks to the guidance of her senior coworker—Harumi Takeda. However, due to Igarashi\'s short stature, Takeda often teases her and treats her like a kid, leaving Igarashi constantly annoyed by his antics.\r\n\r\nDespite this, Igarashi notices Takeda\'s reliability as he is always ready to help whenever something at their workplace goes awry. As Igarashi and Takeda spend more time together, their relationship soon develops further than simply being coworkers at the office.\r\n\r\n[Written by MAL Rewrite]                ',12,7.86,'Fall',2021,'Doga Kobo'),(44,'Mieruko-chan','https://cdn.myanimelist.net/images/anime/1277/117155.jpg','                    Miko Yotsuya\'s eyes water as she fixates on a single spot on her phone—she ignores yet another dreadful, horrific monster that is in her face, uttering the disturbing words: \"Can you see me?\" Before now, Miko enjoyed her unassuming high school days, with late-night horror shows serving only as a form of entertainment. But ever since one fateful day, she is the only person aware of the invisible monsters walking freely among humans.\r\n\r\nCourageously, Miko makes a bold decision: she will never, under any condition, acknowledge the presence of the horrid specters. However, even though she pretends they do not exist, she can still see how they disturb the people around her, especially her best friend, the energetic and lovely Hana Yurikawa. In order to protect them from the monsters\' annoyances, Miko gives it her best to continue her school life and avoid every troublesome crisis—even when they scare her to tears. \r\n\r\n[Written by MAL Rewrite]                ',12,7.47,'Fall',2021,'Passione'),(45,'Shin no Nakama ja Nai to Yuusha no Party wo Oidasareta node, Henkyou de Slow Life suru Koto ni Shimashita','https://cdn.myanimelist.net/images/anime/1723/117854.jpg','                    Far away from the reaches of demons and war, near the borderland of Zoltan, D-Rank adventurer Red lives a normal existence. Through perseverance and hard work, his dream of starting his own apothecary and peaceful life in the countryside finally came true. Abruptly, Red gets a live-in partner and assistant named Rit—the princess of Duchy Loggervia and an adventurer herself—who gives everything up to join him.\r\n\r\nAlthough honest, kind, and loved by all, Red has a secret shared only with Rit: his real name is Gideon, brother of Ruti Ragnason, the \"Hero\" and a former member of her party. Ares Drowa, the \"Sage,\" kicked Red out of their party after their war against the Demon Lord after deciding he was weak and insignificant. Now, even though Red has left the Hero\'s party behind by assuming a new life together with Rit, his past has yet to let go of him.\r\n\r\n[Written by MAL Rewrite]                ',13,7.16,'Fall',2021,'Studio Flad'),(46,'Ousama Ranking','https://cdn.myanimelist.net/images/anime/1347/117616.jpg','                    The people of the kingdom look down on the young Prince Bojji, who can neither hear nor speak. They call him \"The Useless Prince\" while jeering at his supposed foolishness.\r\n\r\nHowever, while Bojji may not be physically strong, he is certainly not weak of heart. When a chance encounter with a shadow creature should have left him traumatized, it instead makes him believe that he has found a friend amidst those who only choose to notice his shortcomings. He starts meeting with Kage, the shadow, regularly, to the point where even the otherwise abrasive creature begins to warm up to him.\r\n\r\nKage and Bojji\'s unlikely friendship lays the budding foundations of the prince\'s journey, one where he intends to conquer his fears and insecurities. Despite the constant ridicule he faces, Bojji resolves to fulfill his desire of becoming the best king he can be.\r\n\r\n[Written by MAL Rewrite]                ',23,8.83,'Fall',2021,'Wit Studio'),(47,'Shuumatsu no Harem','https://cdn.myanimelist.net/images/anime/1491/117296.jpg','                    The Man-Killer Virus: a lethal disease that has eradicated 99.9% of the world\'s male population. Mizuhara Reito has been in cryogenic sleep for the past five years, leaving behind Tachibana Erisa, the girl of his dreams. When Reito awakens from the deep freeze, he emerges into a sex-crazed new world where he himself is the planet\'s most precious resource. Reito and four other male studs are given lives of luxury and one simple mission: repopulate the world by impregnating as many women as possible! All Reito wants, however, is to find his beloved Erisa who went missing three years ago. Can Reito resist temptation and find his one true love?\r\n \r\n(Source: Seven Seas Entertainment)\r\n\r\n Episodes 1-2 were streamed in advance on YouTube on September 25, 2021. Official broadcast of episode 2 and beyond have been delayed until January 2022.                ',11,6.63,'Fall',2021,'AXsiZ'),(48,'Tsuki to Laika to Nosferatu','https://cdn.myanimelist.net/images/anime/1393/118374.jpg','                    On November 23, 1957, the whole world witnessed the Federal Republic of Zirnitra\'s monumental achievement of sending the first live animal—a dog—to outer space. Since then, the space race between the confederacy and its competitor, the United Kingdom of Arnack, has intensified; the two countries hope to one day send humans to the cosmos above.\r\n\r\nAs a dog\'s biology is inherently different from a human\'s anatomy, there is no way to perfectly identify the risks involving space travel and its effects on an individual\'s body without actually sending someone for observation. However, Zirnitra\'s government has a potential solution: to experiment on vampires, whose biological similarity to humans is too significant to ignore.\r\n\r\nDespite being forcibly taken from her home in the mountains, vampire Irina Luminesk shows no resistance and is even willing to train as a test subject. Lev Leps, a former top candidate to become the first human cosmonaut, is designated to accompany Irina and act as her guide. Through their time together, Irina and Lev begin to develop a mutual love for outer space, bringing them closer together.\r\n\r\n[Written by MAL Rewrite]                ',12,7.38,'Fall',2021,'Arvo Animation'),(49,'Shinka no Mi: Shiranai Uchi ni Kachigumi Jinsei','https://cdn.myanimelist.net/images/anime/1537/117590.jpg','                    One day, a man claiming to be a god suddenly hacks a certain school\'s intercoms, ordering all of its students to team up and prepare to be transported to another world. There, they will be given special skills in the hopes that they become that world\'s heroes and defeat the Demon King that ravages the land.\r\n\r\nThe initial transfer is a success. However, Seiichi Hiiragi, who suffers from his classmates\' constant bullying due to his somewhat undesirable appearance, is left behind as no one is willing to be his teammate. Nevertheless, the self-proclaimed god decides to send Seiichi to the parallel world and lets him join his peers. Unfortunately, this fateful ordeal causes Seiichi to arrive at a location deep in the forest, far not only from his schoolmates but from human civilization as well.\r\n\r\nDesperately searching for a way to change his predicament, Seiichi\'s miserable days only seem to continue to worsen. Yet when all hope seems lost, Seiichi discovers a strange fruit known as the \"Fruit of Evolution\"—which may be his first step toward a significantly better future.\r\n\r\n[Written by MAL Rewrite]                ',12,6.16,'Fall',2021,'Children\'s Playground Entertainment'),(50,'Sakugan','https://cdn.myanimelist.net/images/anime/1431/118413.jpg','                    The \"Labyrinth\" is an expansive space deep underground where humans live in clusters known as \"colonies.\" Over the years, the surface has become a distant memory—even perhaps only a fantasy to those who have never experienced its wonders.\r\n\r\nMaking sure humanity survives the harsh conditions of the underground, a colony\'s citizens can take on a variety of specialized jobs. These include \"Workers,\" who mine precious ore to fuel the colonies, and \"Markers,\" who journey into the Labyrinth\'s surprisingly lush environment to bring back information that eases navigation. However, humanity also faces a threat to its existence—creatures called \"kaijuu\" whose sizes range from that of a small child to an enormous building, and are hostile to any human they see. Moreover, kaijuu that are large enough can force their way into the colonies, further increasing their threat level.\r\n\r\nMemenpu is a nine-year-old college graduate whose inventions have greatly benefitted the Workers in her local colony. Recently, however, she has been dreaming of a place with a neverending ceiling not bound by bedrock. These aspirations fuel her desire to become a Marker and explore the Labyrinth\'s vast unknown in search of such a fantastical place. Despite her father Gagumber\'s vehement disagreement, a certain incident with the kaijuu jumpstarts a dangerous yet exciting adventure that will surely alter humanity\'s course forever.\r\n\r\n[Written by MAL Rewrite]                ',12,7.08,'Fall',2021,'Satelight'),(51,'Taishou Otome Otogibanashi','https://cdn.myanimelist.net/images/anime/1662/118849.jpg','                    Self-styled pessimist Tamahiko Shima lives alone in the mountains of Chiba after losing the use of his right hand in the same car accident that took his mother\'s life. Deemed incapable by his father and other wealthy relatives, he has been forced into exile; he experiences idle days of reading and sleepless nights of irrepressible angst. True to the Shimas\' famous pride and determined not to disgrace his family, Tamahiko is resigned to his new duty—stay in the mountains and wait for death to put an end to his suffering.\r\n\r\nHowever, on one snowy night, Tamahiko\'s insomnia is interrupted by someone knocking at the door. He then meets the 14-year-old Yuzuki Tachibana, who announces that she has come to be his future wife! Suddenly, Tamahiko remembers his father promising to send him a bride to assist him with impediments to his daily life.\r\n\r\nAlthough she was sold as a bride to repay her family\'s debts, Yuzuki proves to be thoughtful, diligent, and dedicated to Tamahiko. Will the world-weary teenager prove insensitive to the rare breeze of kindness her presence brings to his monotonous existence?\r\n\r\n[Written by MAL Rewrite]                ',12,7.67,'Fall',2021,'SynergySP'),(52,'World Trigger 3rd Season','https://cdn.myanimelist.net/images/anime/1617/117474.jpg','                    Third season of World Trigger.\r\n\r\n                ',12,8.16,'Fall',2021,'Toei Animation'),(53,'Isekai Shokudou 2','https://cdn.myanimelist.net/images/anime/1777/117885.jpg','                    Second season of Isekai Shokudou.                ',12,7.64,'Fall',2021,'OLM'),(54,'Kyuuketsuki Sugu Shinu','https://cdn.myanimelist.net/images/anime/1892/117151.jpg','                    Vampires are known to have many weaknesses that balance out their incredible power, but the vampire lord Draluc happens to be weak to pretty much anything.\r\n\r\nThe vampire hunter Ronald receives a job to infiltrate the castle of the so-called \"Invincible Progenitor\" and rescue a woman\'s son from the monster within. But upon arriving, he is dumbfounded to discover that the vampire quickly turns to ash by something as trivial as a clap of his hands! Moreover, the child he was sent to save had merely wandered in to play the vampire lord\'s video games while he slept!\r\n\r\nIn a disastrous turn of events, Draluc\'s castle is destroyed, and the fragile vampire decides to move in with the hunter who has only just defeated him. Ronald, Draluc, and the vampire\'s pet armadillo John form quite the eccentric team as they are forced to work together while fending off Ronald\'s violent editor, the lesser vampires plaguing the city, and even their fellow vampire hunters.\r\n\r\n[Written by MAL Rewrite]                ',12,6.78,'Fall',2021,'Madhouse'),(55,'Heike Monogatari','https://cdn.myanimelist.net/images/anime/1754/118637.jpg','                    The Taira clan, also known as the Heike, holds immense authority over Japan. When a young girl, gifted with an odd eye that allows her to see the future, foolishly disrespects the clan, her father pays the price of her crime with his life. Soon after, as fate would have it, Taira no Shigemori—the eldest son of the clan leader—stumbles upon the same unfortunate girl, who now calls herself \"Biwa.\" Biwa informs him that the downfall of the Heike is imminent. After learning of the great injustice Biwa suffered at the Heike\'s hands, Shigemori vows to take her in and care for her rather than let her be killed.\r\n\r\nIn an era of rising military tension, the Heike are in the midst of a cunning struggle for power, and bloodstained war is on the horizon. Shigemori, whose eyes allow him to see spirits of the dead, is both anxious and hopeful to prevent his clan\'s demise. Biwa, however, is reluctant to reveal the future to him and must adapt to her new life filled with both happiness and sorrow in this pivotal chapter in Japanese history.\r\n\r\n[Written by MAL Rewrite]                ',11,7.7,'Fall',2021,'Science SARU'),(56,'Deep Insanity: The Lost Child','https://cdn.myanimelist.net/images/anime/1652/118466.jpg','                    Madness and unawakening sleep, Randolph syndrome.\r\n\r\nThis new illness is slowly but steadily approaching humanity, caused by the huge underground world Asylum that appeared in Antarctica. There are strange creatures different from the earth, and unknown resources. People bet their lives on the depths of the mysterious new world to get huge wealth, organizational plots, or their own ambitions.\r\n\r\nAnd here alone, a young man with a wish in his heart is trying to challenge the front line of Asylum.\r\n\r\n(Source: MAL News)                ',12,4.97,'Fall',2021,'SILVER LINK.'),(57,'Tensei shitara Slime Datta Ken 2nd Season Part 2','https://cdn.myanimelist.net/images/anime/1033/118296.jpg','                    The nation of Tempest is in a festive mood after successfully overcoming the surprise attack from the Blumund Army and the Western Holy Church. Beyond the festivities lies a meeting between Tempest and its allies to decide the future of the Nation of Monsters. The aftermath of the Blumund invasion, Milim Nava\'s suspicious behavior, and the disappearance of Demon Lord Carrion—the problems seem to keep on piling up.\r\n\r\nRimuru Tempest, now awakened as a \"True Demon Lord,\" decides to go on the offensive against Clayman. With the fully revived \"Storm Dragon\" Veldora, \"Ultimate Skill\" Raphael, and other powerful comrades, the ruler of the Tempest is confident in taking down his enemies one by one until he can face the man pulling the strings.\r\n\r\n[Written by MAL Rewrite]                ',12,8.31,'Summer',2021,'8bit'),(58,'Kobayashi-san Chi no Maid Dragon S','https://cdn.myanimelist.net/images/anime/1252/115539.jpg','                    As Tooru continues on her quest to become the greatest maid and Kanna Kamui fully immerses in her life as an elementary school student, there is not a dull day in the Kobayashi household with mischief being a daily staple. On one such day, however, a massive landslide is spotted on the hill where Kobayashi and Tooru first met—a clear display of a dragon\'s might. When none of the dragons they know claim responsibility, the perpetrator herself descends from the skies: Ilulu, the radical Chaos Dragon with monstrous power rivaling that of Tooru.\r\n\r\nSickened by Tooru\'s involvement with humans, Ilulu resorts to the typical dragon method of resolving conflict—a battle to the death. Despite such behavior, she becomes intrigued by Kobayashi\'s ability to befriend dragons and decides instead to observe just what makes Kobayashi so special. With a new troublesome dragon in town, Kobayashi\'s eccentric life with a dragon maid is only getting merrier.\r\n\r\n[Written by MAL Rewrite]                ',12,8.46,'Summer',2021,'Kyoto Animation'),(59,'Tantei wa Mou, Shindeiru.','https://cdn.myanimelist.net/images/anime/1843/115815.jpg','                    Kimihiko Kimizuka has found himself inadvertently entangled in various crimes more times than he can remember, referring to himself as a magnet for trouble. One day, as if it was nothing out of the ordinary, a group of unknown men kidnaps him, forcing him to board a flight—where he also encounters a hijacking. Amid the resulting chaos, however, Kimizuka meets a stunning silver-haired beauty, going by the codename Siesta, who then saves the day.\r\n\r\nClaiming to be a legendary detective, Siesta enlists Kimizuka to be her sidekick. Though Kimizuka refuses at first, with Siesta\'s insistence, he eventually joins her—marking the start of a grand adventure spanning the entire world, preventing multiple threats that could spell doom for humanity along the way.\r\n\r\nUnfortunately, after three years of their unpredictable yet enjoyable time together, Siesta abruptly passes away. Distraught, Kimizuka tries to leave all memories of her behind, but as he begins to meet more people, it seems that Siesta\'s influence will never truly die.\r\n\r\n[Written by MAL Rewrite]                ',12,6.37,'Summer',2021,'ENGI');
/*!40000 ALTER TABLE `animes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (2,'Oda, Eiichiro','https://cdn.myanimelist.net/images/voiceactors/2/10593.jpg?s=6e83dfc242f5610e419eb59c24aebdc6'),(3,'Kishimoto, Masashi','https://cdn.myanimelist.net/images/voiceactors/2/42365.jpg?s=5c0ff94bea5f885c5c3a8e156cb6c04f'),(4,'Araki, Hirohiko','https://cdn.myanimelist.net/images/voiceactors/3/42598.jpg?s=50bdb2144b44b05fd7336d93481bc4ff'),(5,'Miura, Kentarou','https://cdn.myanimelist.net/images/voiceactors/3/63827.jpg?s=e76f447e5dadbb52a83e114836dfbc47'),(6,'Ito, Junji','https://cdn.myanimelist.net/images/voiceactors/3/54679.jpg?s=7bb472fbd208e2e45047dd19d1c376b6'),(7,'Isayama, Hajime','https://cdn.myanimelist.net/images/voiceactors/1/40147.jpg?s=9d728736c63ac853b6189a92d27dbef4'),(8,'Asano, Inio','https://cdn.myanimelist.net/images/voiceactors/2/53969.jpg?s=2594bcc4e020a95cacff248da16acfee'),(9,'NISIO, ISIN','https://cdn.myanimelist.net/images/voiceactors/2/43583.jpg?s=999ac9602aeda7eaf376fcd89d315c10'),(10,'Toriyama, Akira','https://cdn.myanimelist.net/images/voiceactors/3/40043.jpg?s=28dad22208dc14be3f603c1fc466a230'),(11,'ONE','https://cdn.myanimelist.net/images/voiceactors/1/44008.jpg?s=a49b63f32a7e6c61fddaf34345fcc4ce'),(12,'Ishida, Sui','https://cdn.myanimelist.net/images/voiceactors/3/37277.jpg?s=5045f9429eb0b435bf79da4c2886ab3c'),(13,'Kubo, Tite','https://cdn.myanimelist.net/images/voiceactors/1/11083.jpg?s=eaa494fffadbbc2ee8e0ccf0263e164c'),(14,'Fujimoto, Tatsuki','https://cdn.myanimelist.net/images/voiceactors/2/61876.jpg?s=c0cf410ceb242560dad9e6e75e811a1c'),(15,'Murata, Yusuke','https://cdn.myanimelist.net/images/voiceactors/3/5939.jpg?s=d9658e6a1ec6e2d537b39999b5bcf493'),(16,'Obata, Takeshi','https://cdn.myanimelist.net/images/voiceactors/2/39958.jpg?s=e5e0e682ba08e8ee900450653e0f725a'),(17,'Obata, Takeshi','https://cdn.myanimelist.net/images/voiceactors/2/39958.jpg?s=e5e0e682ba08e8ee900450653e0f725a');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fav_animes`
--

DROP TABLE IF EXISTS `fav_animes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fav_animes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `anime_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `anime_id` (`anime_id`),
  CONSTRAINT `fav_animes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fav_animes_ibfk_2` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fav_animes`
--

LOCK TABLES `fav_animes` WRITE;
/*!40000 ALTER TABLE `fav_animes` DISABLE KEYS */;
INSERT INTO `fav_animes` VALUES (1,2,26),(4,2,27),(5,2,46);
/*!40000 ALTER TABLE `fav_animes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fav_mangas`
--

DROP TABLE IF EXISTS `fav_mangas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fav_mangas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `mangas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `mangas_id` (`mangas_id`),
  CONSTRAINT `fav_mangas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fav_mangas_ibfk_2` FOREIGN KEY (`mangas_id`) REFERENCES `mangas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fav_mangas`
--

LOCK TABLES `fav_mangas` WRITE;
/*!40000 ALTER TABLE `fav_mangas` DISABLE KEYS */;
/*!40000 ALTER TABLE `fav_mangas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anime_id` int(11) DEFAULT NULL,
  `manga_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anime_id` (`anime_id`),
  KEY `manga_id` (`manga_id`),
  CONSTRAINT `genres_ibfk_1` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`),
  CONSTRAINT `genres_ibfk_2` FOREIGN KEY (`manga_id`) REFERENCES `mangas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'Action',21,NULL),(2,'Adventure',21,NULL),(3,'Romance',25,NULL),(4,'Harem',25,NULL),(5,'Vampire',25,NULL),(6,'Comedy',NULL,3),(7,'Action',NULL,2),(8,'Adventure',NULL,2),(9,'Mystery',NULL,2),(12,'Adventure',NULL,4),(13,'Fantasy',NULL,4),(14,'Drama',27,NULL),(15,'Romance',27,NULL),(16,'Ecchi',27,NULL),(17,'Comedy',26,NULL),(18,'Slice of Life',26,NULL),(33,'Action',33,NULL),(34,'Supernatural',33,NULL),(35,'Action',34,NULL),(36,'Fantasy',34,NULL),(37,'Drama',35,NULL),(38,'Supernatural',35,NULL),(42,'Drama',37,NULL),(43,'Slice of Life',37,NULL),(44,'Action',38,NULL),(45,'Drama',38,NULL),(46,'Fantasy',38,NULL),(47,'Mystery',38,NULL),(48,'Romance',38,NULL),(52,'Action',42,NULL),(53,'Adventure',42,NULL),(54,'Fantasy',42,NULL),(55,'Comedy',43,NULL),(56,'Romance',43,NULL),(57,'Slice of Life',43,NULL),(58,'Comedy',44,NULL),(59,'Horror',44,NULL),(60,'Supernatural',44,NULL),(61,'Adventure',45,NULL),(62,'Fantasy',45,NULL),(63,'Romance',45,NULL),(64,'Slice of Life',45,NULL),(65,'Adventure',46,NULL),(66,'Fantasy',46,NULL),(67,'Sci-Fi',47,NULL),(68,'Sci-Fi',48,NULL),(69,'Adventure',49,NULL),(70,'Fantasy',49,NULL),(71,'Romance',49,NULL),(72,'Adventure',50,NULL),(73,'Sci-Fi',50,NULL),(74,'Comedy',51,NULL),(75,'Romance',51,NULL),(76,'Slice of Life',51,NULL),(77,'Action',52,NULL),(78,'Sci-Fi',52,NULL),(79,'Supernatural',52,NULL),(80,'Fantasy',53,NULL),(81,'Gourmet',53,NULL),(82,'Slice of Life',53,NULL),(83,'Comedy',54,NULL),(84,'Supernatural',54,NULL),(85,'Sci-Fi',56,NULL),(86,'Action',57,NULL),(87,'Adventure',57,NULL),(88,'Comedy',57,NULL),(89,'Fantasy',57,NULL),(90,'Comedy',58,NULL),(91,'Fantasy',58,NULL),(92,'Slice of Life',58,NULL),(93,'Comedy',59,NULL),(94,'Drama',59,NULL),(95,'Mystery',59,NULL),(96,'Romance',59,NULL);
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mangas`
--

DROP TABLE IF EXISTS `mangas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mangas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chapters` int(11) DEFAULT NULL,
  `volumes` int(11) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `magazine` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `synopsis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `mangas_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mangas`
--

LOCK TABLES `mangas` WRITE;
/*!40000 ALTER TABLE `mangas` DISABLE KEYS */;
INSERT INTO `mangas` VALUES (1,'Berserk','https://cdn.myanimelist.net/images/manga/1/157897.jpg?s=f03b5f8bfeb0b0962b7d5e7cb9a8d0d3',NULL,41,9.41,'','',5),(2,'JoJo no Kimyou na Bouken Part 7: Steel Ball Run','https://cdn.myanimelist.net/images/manga/3/179882.jpg?s=dac8109140406ca296cf4946296b5037',0,24,9.25,'','',4),(3,'One Piece','https://cdn.myanimelist.net/images/manga/3/55539.jpg?s=b4d9e935b7152f0c9e69b34a7797fe02',0,0,9.17,'Shounen Jump (Weekly)','',2),(4,'Sousou no Frieren','https://cdn.myanimelist.net/images/manga/3/232121.jpg?s=9c05e20374c4df437a85b281efcc5927',0,0,8.61,'Shounen Magazine (Weekly)','',NULL),(5,'ReLIFE','https://cdn.myanimelist.net/images/manga/2/171573.jpg?s=a03a56ed3f40a2b7d1f8eaed154b61e0',NULL,15,8.66,'','',NULL),(6,'Grand Blue','https://cdn.myanimelist.net/images/manga/2/166124.jpg?s=3a3e1279dd192ea90a32ff6bdfdbe4dc',NULL,0,9.05,'','',NULL),(7,'Kaguya-sama wa Kokurasetai: Tensai-tachi no Renai Zunousen','https://cdn.myanimelist.net/images/manga/3/188896.jpg?s=107a5af07f0e6992faa286f94596f231',NULL,0,8.93,'','',NULL);
/*!40000 ALTER TABLE `mangas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@mail.com','admin',NULL),(2,'user1','user1@mail.com','24c9e15e52afc47c225b757e7bee1f9d',NULL),(3,'user2','user2@mail.com','b584a1e82ecc5b70cc6343b7d6d150ad',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-26 15:03:32

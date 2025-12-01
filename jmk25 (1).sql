-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2025 at 12:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmk25`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category_name`) VALUES
(9, 'Character Meme'),
(6, 'Emotion/Expression Meme'),
(1, 'General Meme'),
(8, 'Internet Culture Meme'),
(7, 'Knowledge/Chart Meme'),
(3, 'Movie/Series Meme'),
(4, 'Popular Meme Template'),
(2, 'Reaction Meme'),
(10, 'Situational Meme'),
(5, 'SpongeBob Meme');

-- --------------------------------------------------------

--
-- Table structure for table `content_foto`
--

CREATE TABLE `content_foto` (
  `id_upload` int NOT NULL,
  `foto_img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_foto`
--

INSERT INTO `content_foto` (`id_upload`, `foto_img_url`, `foto_alt_text`) VALUES
(1, 'https://i.imgflip.com/30b1gx.jpg', 'Drake Hotline Bling'),
(2, 'https://i.imgflip.com/1g8my4.jpg', 'Two Buttons'),
(3, 'https://i.imgflip.com/1ur9b0.jpg', 'Distracted Boyfriend'),
(4, 'https://i.imgflip.com/3oevdk.jpg', 'Bernie I Am Once Again Asking For Your Support'),
(5, 'https://i.imgflip.com/261o3j.jpg', 'Running Away Balloon'),
(6, 'https://i.imgflip.com/22bdq6.jpg', 'Left Exit 12 Off Ramp'),
(7, 'https://i.imgflip.com/3lmzyx.jpg', 'UNO Draw 25 Cards'),
(8, 'https://i.imgflip.com/23ls.jpg', 'Disaster Girl'),
(9, 'https://i.imgflip.com/26jxvz.jpg', 'Gru\'s Plan'),
(10, 'https://i.imgflip.com/28j0te.jpg', 'Epic Handshake'),
(11, 'https://i.imgflip.com/2fm6x.jpg', 'Waiting Skeleton'),
(12, 'https://i.imgflip.com/46e43q.png', 'Always Has Been'),
(13, 'https://i.imgflip.com/1c1uej.jpg', 'Sad Pablo Escobar'),
(14, 'https://i.imgflip.com/5c7lwq.png', 'Anakin Padme 4 Panel'),
(15, 'https://i.imgflip.com/24y43o.jpg', 'Change My Mind'),
(16, 'https://i.imgflip.com/9ehk.jpg', 'Batman Slapping Robin'),
(17, 'https://i.imgflip.com/345v97.jpg', 'Woman Yelling At Cat'),
(18, 'https://i.imgflip.com/1ihzfe.jpg', 'X, X Everywhere'),
(19, 'https://i.imgflip.com/1otk96.jpg', 'Mocking Spongebob'),
(20, 'https://i.imgflip.com/2ybua0.png', 'Tuxedo Winnie The Pooh'),
(21, 'https://i.imgflip.com/54hjww.jpg', 'Trade Offer'),
(22, 'https://i.imgflip.com/43a45p.png', 'Buff Doge vs. Cheems'),
(23, 'https://i.imgflip.com/2odckz.jpg', 'Marked Safe From'),
(24, 'https://i.imgflip.com/3pdf2w.png', 'Bernie Sanders Once Again Asking'),
(25, 'https://i.imgflip.com/1jwhww.jpg', 'Expanding Brain'),
(26, 'https://i.imgflip.com/21uy0f.jpg', 'Y\'all Got Any More Of That'),
(27, 'https://i.imgflip.com/1bij.jpg', 'One Does Not Simply'),
(28, 'https://i.imgflip.com/1b42wl.jpg', 'Bike Fall'),
(29, 'https://i.imgflip.com/1bhk.jpg', 'Success Kid'),
(30, 'https://i.imgflip.com/1tl71a.jpg', 'I Bet He\'s Thinking About Other Women'),
(31, 'https://i.imgflip.com/72epa9.png', '0 days without (Lenny, Simpsons)'),
(32, 'https://i.imgflip.com/46hhvr.jpg', 'Mother Ignoring Kid Drowning In A Pool'),
(33, 'https://i.imgflip.com/2gnnjh.jpg', 'Monkey Puppet'),
(34, 'https://i.imgflip.com/2za3u1.jpg', 'They\'re The Same Picture'),
(35, 'https://i.imgflip.com/26am.jpg', 'Ancient Aliens'),
(36, 'https://i.imgflip.com/1o00in.jpg', 'Is This A Pigeon'),
(37, 'https://i.imgflip.com/64sz4u.png', 'Megamind peeking'),
(38, 'https://i.imgflip.com/1wz1x.jpg', 'This Is Where I\'d Put My Trophy If I Had One'),
(39, 'https://i.imgflip.com/gtj5t.jpg', 'Oprah You Get A'),
(40, 'https://i.imgflip.com/gk5el.jpg', 'Hide the Pain Harold'),
(41, 'https://i.imgflip.com/38el31.jpg', 'Clown Applying Makeup'),
(42, 'https://i.imgflip.com/wxica.jpg', 'This Is Fine'),
(43, 'https://i.imgflip.com/2xscjb.png', 'You Guys are Getting Paid'),
(44, 'https://i.imgflip.com/145qvv.jpg', 'Squidward window'),
(45, 'https://i.imgflip.com/4acd7j.png', 'Laughing Leo'),
(46, 'https://i.imgflip.com/m78d.jpg', 'Boardroom Meeting Suggestion'),
(47, 'https://i.imgflip.com/1h7in3.jpg', 'Roll Safe Think About It'),
(48, 'https://i.imgflip.com/2reqtg.png', 'Flex Tape'),
(49, 'https://i.imgflip.com/19vcz0.jpg', 'Pawn Stars Best I Can Do'),
(50, 'https://i.imgflip.com/1yxkcp.jpg', 'Blank Nut Button'),
(51, 'https://i.imgflip.com/4pn1an.png', 'They don\'t know'),
(52, 'https://i.imgflip.com/1bgw.jpg', 'Futurama Fry'),
(53, 'https://i.imgflip.com/8tw3vb.png', 'Bell Curve'),
(54, 'https://i.imgflip.com/3vfrmx.jpg', 'AJ Styles & Undertaker'),
(55, 'https://i.imgflip.com/3eqjd8.jpg', 'Spider Man Triple'),
(56, 'https://i.imgflip.com/2tzo2k.jpg', 'Soldier protecting sleeping child'),
(57, 'https://i.imgflip.com/1yz6z4.jpg', 'Types of Headaches meme'),
(58, 'https://i.imgflip.com/5v6gwj.jpg', 'Two guys on a bus'),
(59, 'https://i.imgflip.com/1ii4oc.jpg', 'Trump Bill Signing'),
(60, 'https://i.imgflip.com/434i5j.png', 'A train hitting a school bus'),
(61, 'https://i.imgflip.com/265k.jpg', 'Third World Skeptical Kid'),
(62, 'https://i.imgflip.com/1op9wy.jpg', 'Whisper and Goosebumps'),
(63, 'https://i.imgflip.com/33e92f.jpg', 'Three-headed Dragon'),
(64, 'https://i.imgflip.com/58eyvu.png', 'where monkey'),
(65, 'https://i.imgflip.com/3gdsh1.jpg', 'George Bush 9/11'),
(66, 'https://i.imgflip.com/8d317n.png', 'Absolute Cinema'),
(67, 'https://i.imgflip.com/1nck6k.jpg', 'Sleeping Shaq'),
(68, 'https://i.imgflip.com/3qqcim.png', 'Panik Kalm Panik'),
(69, 'https://i.imgflip.com/1e7ql7.jpg', 'Evil Kermit'),
(70, 'https://i.imgflip.com/3po4m7.jpg', 'Anime Girl Hiding from Terminator'),
(71, 'https://i.imgflip.com/29v4rt.jpg', 'Friendship ended'),
(72, 'https://i.imgflip.com/3nx72a.png', 'Grant Gustin over grave'),
(73, 'https://i.imgflip.com/3kwur5.jpg', 'All My Homies Hate'),
(74, 'https://i.imgflip.com/1w7ygt.jpg', 'Inhaling Seagull'),
(75, 'https://i.imgflip.com/98qr33.jpg', 'Squid Game'),
(76, 'https://i.imgflip.com/65939r.jpg', 'Megamind no bitches'),
(77, 'https://i.imgflip.com/9rnll0.png', 'the lion..'),
(78, 'https://i.imgflip.com/28s2gu.jpg', 'Who Killed Hannibal'),
(79, 'https://i.imgflip.com/1kbn1e.jpg', 'Surprised Pikachu'),
(80, 'https://i.imgflip.com/39t1o.jpg', 'Leonardo Dicaprio Cheers'),
(81, 'https://i.imgflip.com/8k0sa.jpg', 'Star Wars Yoda'),
(82, 'https://i.imgflip.com/1bhw.jpg', 'Grandma Finds The Internet'),
(83, 'https://i.imgflip.com/2eeunw.jpg', 'Scooby doo mask reveal'),
(84, 'https://i.imgflip.com/u0pf0.jpg', 'Disappointed Black Guy'),
(85, 'https://i.imgflip.com/hmt3v.jpg', 'Look At Me'),
(86, 'https://i.imgflip.com/bwu6w.jpg', 'c\'mon do something'),
(87, 'https://i.imgflip.com/176h0h.jpg', 'say the line bart! simpsons'),
(88, 'https://i.imgflip.com/grr.jpg', 'The Rock Driving'),
(89, 'https://i.imgflip.com/1tkjq9.jpg', 'spiderman pointing at spiderman'),
(90, 'https://i.imgflip.com/2oo7h0.jpg', 'Domino Effect'),
(91, 'https://i.imgflip.com/2cjr7j.jpg', 'is this butterfly'),
(92, 'https://i.imgflip.com/1qg8fp.jpg', 'Grim Reaper Knocking Door'),
(93, 'https://i.imgflip.com/24zoa8.jpg', 'No - Yes'),
(94, 'https://i.imgflip.com/2896ro.jpg', 'American Chopper Argument'),
(95, 'https://i.imgflip.com/21tqf4.jpg', 'The Scroll Of Truth'),
(96, 'https://i.imgflip.com/54d9lj.png', 'Two Paths'),
(97, 'https://i.imgflip.com/3pnmg.jpg', 'Finding Neverland'),
(98, 'https://i.imgflip.com/5youx3.jpg', 'whe i\'m in a competition and my opponent is'),
(99, 'https://i.imgflip.com/5o32tt.png', 'Gus Fring we are not the same'),
(100, 'https://i.imgflip.com/392xtu.jpg', 'Spongebob Ight Imma Head Out');

-- --------------------------------------------------------

--
-- Table structure for table `content_video`
--

CREATE TABLE `content_video` (
  `id_upload` int NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_duration_seconds` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id_follow` int NOT NULL,
  `follow_id_followers` int NOT NULL,
  `follow_id_following` int NOT NULL,
  `follow_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id_group` int NOT NULL,
  `group_owner_user_id` int NOT NULL,
  `group_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_desc` text COLLATE utf8mb4_unicode_ci,
  `group_pict` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default_group.jpg',
  `group_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_member`
--

CREATE TABLE `group_member` (
  `id_group_member` int NOT NULL,
  `member_group_id` int NOT NULL,
  `member_user_id` int NOT NULL,
  `joined_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int NOT NULL,
  `comment_upload_id` int NOT NULL,
  `comment_user_id` int NOT NULL,
  `komentar_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_parent_id` int DEFAULT NULL,
  `comment_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id_like` int NOT NULL,
  `like_upload_id` int NOT NULL,
  `like_user_id` int NOT NULL,
  `like_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id_mark` int NOT NULL,
  `mark_user_id` int NOT NULL,
  `mark_upload_id` int NOT NULL,
  `mark_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id_upload` int NOT NULL,
  `upload_user_id` int NOT NULL,
  `upload_category_id` int NOT NULL,
  `upload_group_id` int DEFAULT NULL,
  `upload_caption` text COLLATE utf8mb4_unicode_ci,
  `upload_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id_upload`, `upload_user_id`, `upload_category_id`, `upload_group_id`, `upload_caption`, `upload_created_at`) VALUES
(1, 6, 9, NULL, 'Drake Hotline Bling', '2025-11-23 03:45:06'),
(2, 9, 1, NULL, 'Two Buttons', '2025-11-23 03:45:06'),
(3, 5, 4, NULL, 'Distracted Boyfriend', '2025-11-23 03:45:06'),
(4, 14, 10, NULL, 'Bernie I Am Once Again Asking For Your Support', '2025-11-23 03:45:06'),
(5, 16, 4, NULL, 'Running Away Balloon', '2025-11-23 03:45:06'),
(6, 1, 1, NULL, 'Left Exit 12 Off Ramp', '2025-11-23 03:45:06'),
(7, 14, 10, NULL, 'UNO Draw 25 Cards', '2025-11-23 03:45:06'),
(8, 7, 2, NULL, 'Disaster Girl', '2025-11-23 03:45:06'),
(9, 15, 4, NULL, 'Gru\'s Plan', '2025-11-23 03:45:06'),
(10, 12, 3, NULL, 'Epic Handshake', '2025-11-23 03:45:06'),
(11, 3, 10, NULL, 'Waiting Skeleton', '2025-11-23 03:45:06'),
(12, 19, 8, NULL, 'Always Has Been', '2025-11-23 03:45:06'),
(13, 2, 6, NULL, 'Sad Pablo Escobar', '2025-11-23 03:45:06'),
(14, 2, 1, NULL, 'Anakin Padme 4 Panel', '2025-11-23 03:45:06'),
(15, 4, 4, NULL, 'Change My Mind', '2025-11-23 03:45:06'),
(16, 19, 9, NULL, 'Batman Slapping Robin', '2025-11-23 03:45:06'),
(17, 7, 6, NULL, 'Woman Yelling At Cat', '2025-11-23 03:45:06'),
(18, 2, 2, NULL, 'X, X Everywhere', '2025-11-23 03:45:06'),
(19, 10, 5, NULL, 'Mocking Spongebob', '2025-11-23 03:45:06'),
(20, 12, 3, NULL, 'Tuxedo Winnie The Pooh', '2025-11-23 03:45:06'),
(21, 2, 1, NULL, 'Trade Offer', '2025-11-23 03:45:06'),
(22, 14, 8, NULL, 'Buff Doge vs. Cheems', '2025-11-23 03:45:06'),
(23, 18, 7, NULL, 'Marked Safe From', '2025-11-23 03:45:06'),
(24, 3, 6, NULL, 'Bernie Sanders Once Again Asking', '2025-11-23 03:45:06'),
(25, 2, 7, NULL, 'Expanding Brain', '2025-11-23 03:45:06'),
(26, 6, 4, NULL, 'Y\'all Got Any More Of That', '2025-11-23 03:45:06'),
(27, 19, 5, NULL, 'One Does Not Simply', '2025-11-23 03:45:06'),
(28, 7, 4, NULL, 'Bike Fall', '2025-11-23 03:45:06'),
(29, 2, 4, NULL, 'Success Kid', '2025-11-23 03:45:06'),
(30, 13, 3, NULL, 'I Bet He\'s Thinking About Other Women', '2025-11-23 03:45:06'),
(31, 3, 3, NULL, '0 days without (Lenny, Simpsons)', '2025-11-23 03:45:06'),
(32, 15, 5, NULL, 'Mother Ignoring Kid Drowning In A Pool', '2025-11-23 03:45:06'),
(33, 7, 3, NULL, 'Monkey Puppet', '2025-11-23 03:45:06'),
(34, 1, 7, NULL, 'They\'re The Same Picture', '2025-11-23 03:45:06'),
(35, 18, 8, NULL, 'Ancient Aliens', '2025-11-23 03:45:06'),
(36, 11, 9, NULL, 'Is This A Pigeon', '2025-11-23 03:45:06'),
(37, 8, 1, NULL, 'Megamind peeking', '2025-11-23 03:45:06'),
(38, 13, 3, NULL, 'This Is Where I\'d Put My Trophy If I Had One', '2025-11-23 03:45:06'),
(39, 12, 4, NULL, 'Oprah You Get A', '2025-11-23 03:45:06'),
(40, 5, 9, NULL, 'Hide the Pain Harold', '2025-11-23 03:45:06'),
(41, 1, 5, NULL, 'Clown Applying Makeup', '2025-11-23 03:45:06'),
(42, 6, 10, NULL, 'This Is Fine', '2025-11-23 03:45:06'),
(43, 5, 10, NULL, 'You Guys are Getting Paid', '2025-11-23 03:45:06'),
(44, 14, 3, NULL, 'Squidward window', '2025-11-23 03:45:06'),
(45, 1, 3, NULL, 'Laughing Leo', '2025-11-23 03:45:06'),
(46, 20, 4, NULL, 'Boardroom Meeting Suggestion', '2025-11-23 03:45:06'),
(47, 15, 6, NULL, 'Roll Safe Think About It', '2025-11-23 03:45:06'),
(48, 9, 9, NULL, 'Flex Tape', '2025-11-23 03:45:06'),
(49, 6, 5, NULL, 'Pawn Stars Best I Can Do', '2025-11-23 03:45:06'),
(50, 10, 1, NULL, 'Blank Nut Button', '2025-11-23 03:45:06'),
(51, 18, 4, NULL, 'They don\'t know', '2025-11-23 03:45:06'),
(52, 3, 6, NULL, 'Futurama Fry', '2025-11-23 03:45:06'),
(53, 16, 7, NULL, 'Bell Curve', '2025-11-23 03:45:06'),
(54, 12, 7, NULL, 'AJ Styles & Undertaker', '2025-11-23 03:45:06'),
(55, 14, 7, NULL, 'Spider Man Triple', '2025-11-23 03:45:06'),
(56, 2, 3, NULL, 'Soldier protecting sleeping child', '2025-11-23 03:45:06'),
(57, 13, 2, NULL, 'Types of Headaches meme', '2025-11-23 03:45:06'),
(58, 10, 5, NULL, 'Two guys on a bus', '2025-11-23 03:45:06'),
(59, 13, 5, NULL, 'Trump Bill Signing', '2025-11-23 03:45:06'),
(60, 11, 7, NULL, 'A train hitting a school bus', '2025-11-23 03:45:06'),
(61, 8, 10, NULL, 'Third World Skeptical Kid', '2025-11-23 03:45:06'),
(62, 3, 10, NULL, 'Whisper and Goosebumps', '2025-11-23 03:45:06'),
(63, 7, 3, NULL, 'Three-headed Dragon', '2025-11-23 03:45:06'),
(64, 4, 1, NULL, 'where monkey', '2025-11-23 03:45:06'),
(65, 5, 4, NULL, 'George Bush 9/11', '2025-11-23 03:45:06'),
(66, 6, 8, NULL, 'Absolute Cinema', '2025-11-23 03:45:06'),
(67, 8, 10, NULL, 'Sleeping Shaq', '2025-11-23 03:45:06'),
(68, 12, 1, NULL, 'Panik Kalm Panik', '2025-11-23 03:45:06'),
(69, 9, 1, NULL, 'Evil Kermit', '2025-11-23 03:45:06'),
(70, 4, 10, NULL, 'Anime Girl Hiding from Terminator', '2025-11-23 03:45:06'),
(71, 13, 3, NULL, 'Friendship ended', '2025-11-23 03:45:06'),
(72, 3, 10, NULL, 'Grant Gustin over grave', '2025-11-23 03:45:06'),
(73, 12, 6, NULL, 'All My Homies Hate', '2025-11-23 03:45:06'),
(74, 14, 2, NULL, 'Inhaling Seagull', '2025-11-23 03:45:06'),
(75, 20, 9, NULL, 'Squid Game', '2025-11-23 03:45:06'),
(76, 12, 7, NULL, 'Megamind no bitches', '2025-11-23 03:45:06'),
(77, 20, 7, NULL, 'the lion..', '2025-11-23 03:45:06'),
(78, 3, 7, NULL, 'Who Killed Hannibal', '2025-11-23 03:45:06'),
(79, 13, 9, NULL, 'Surprised Pikachu', '2025-11-23 03:45:06'),
(80, 5, 10, NULL, 'Leonardo Dicaprio Cheers', '2025-11-23 03:45:06'),
(81, 12, 2, NULL, 'Star Wars Yoda', '2025-11-23 03:45:06'),
(82, 7, 8, NULL, 'Grandma Finds The Internet', '2025-11-23 03:45:06'),
(83, 19, 7, NULL, 'Scooby doo mask reveal', '2025-11-23 03:45:06'),
(84, 20, 4, NULL, 'Disappointed Black Guy', '2025-11-23 03:45:06'),
(85, 14, 7, NULL, 'Look At Me', '2025-11-23 03:45:06'),
(86, 4, 10, NULL, 'c\'mon do something', '2025-11-23 03:45:06'),
(87, 2, 5, NULL, 'say the line bart! simpsons', '2025-11-23 03:45:06'),
(88, 13, 5, NULL, 'The Rock Driving', '2025-11-23 03:45:06'),
(89, 11, 1, NULL, 'spiderman pointing at spiderman', '2025-11-23 03:45:06'),
(90, 16, 1, NULL, 'Domino Effect', '2025-11-23 03:45:06'),
(91, 14, 4, NULL, 'is this butterfly', '2025-11-23 03:45:06'),
(92, 7, 7, NULL, 'Grim Reaper Knocking Door', '2025-11-23 03:45:06'),
(93, 18, 4, NULL, 'No - Yes', '2025-11-23 03:45:06'),
(94, 16, 2, NULL, 'American Chopper Argument', '2025-11-23 03:45:06'),
(95, 13, 7, NULL, 'The Scroll Of Truth', '2025-11-23 03:45:06'),
(96, 14, 9, NULL, 'Two Paths', '2025-11-23 03:45:06'),
(97, 6, 3, NULL, 'Finding Neverland', '2025-11-23 03:45:06'),
(98, 15, 3, NULL, 'whe i\'m in a competition and my opponent is', '2025-11-23 03:45:06'),
(99, 10, 10, NULL, 'Gus Fring we are not the same', '2025-11-23 03:45:06'),
(100, 18, 7, NULL, 'Spongebob Ight Imma Head Out', '2025-11-23 03:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_display` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pict` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `user_bio` text COLLATE utf8mb4_unicode_ci,
  `user_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `user_display`, `user_email`, `user_password`, `user_pict`, `user_bio`, `user_created_at`) VALUES
(1, 'admin1', 'Admin Satu', 'admin1@example.com', 'admin1', 'sherk.jpeg', 'Admin.', '2025-01-01 02:00:00'),
(2, 'admin2', 'Admin Dua', 'admin2@example.com', 'admin2', 'sherk.jpeg', 'Admin.', '2025-01-01 02:05:00'),
(3, 'admin3', 'Admin Tiga', 'admin3@example.com', 'admin3', 'sherk.jpeg', 'Admin.', '2025-01-01 02:10:00'),
(4, 'admin4', 'Admin Empat', 'admin4@example.com', 'admin4', 'sherk.jpeg', 'Admin.', '2025-01-01 02:15:00'),
(5, 'admin5', 'Admin Lima', 'admin5@example.com', 'admin5', 'sherk.jpeg', 'Admin.', '2025-01-01 02:20:00'),
(6, 'calvinverdonk', 'calvin', 'userdummy@example.com', 'Dummy1', 'gacor.jpeg', 'Just User baing User.', '2025-02-02 06:11:00'),
(7, 'danny_tgr', 'Daniel', 'daniel@example.com', 'Dummy2', 'foto1.jpg', 'Calm guy, coffee enjoyer.', '2025-02-10 01:23:00'),
(8, 'hikari07', 'Hikari', 'hikari@example.com', 'Dummy3', 'foto.jpg', 'Digital artist.', '2025-02-12 10:40:00'),
(9, 'miko_dev', 'Miko', 'miko@example.com', 'Dummy4', 'foto1.jpg', 'Backend dev pemula.', '2025-02-15 04:31:00'),
(10, 'ayu.ch', 'Ayu', 'ayu@example.com', 'Dummy5', 'foto.jpg', 'Soft girl vibes.', '2025-02-18 03:22:00'),
(11, 'fara.me', 'Fara', 'fara@example.com', 'Dummy6', 'foto.jpg', 'Book lover.', '2025-02-21 09:59:00'),
(12, 'ridwan_x', 'Ridwan', 'ridwan@example.com', 'Dummy7', 'foto1.jpg', 'Football enjoyer.', '2025-03-01 01:13:00'),
(13, 'zhavier_', 'Zhavier', 'zhavier@example.com', 'Dummy8', 'foto1.jpg', 'Gamer santai.', '2025-03-05 05:20:00'),
(14, 'may.may', 'Maysha', 'maysha@example.com', 'Dummy9', 'foto.jpg', 'Pastel aesthetic lover.', '2025-03-07 10:00:00'),
(15, 'royan_kun', 'Royan', 'royan@example.com', 'Dummy10', 'foto1.jpg', 'Likes music & coding.', '2025-03-10 07:22:00'),
(16, 'asror_dev', 'Asror', 'asror@example.com', 'Dummy11', 'foto1.jpg', 'Fullstack wannabe.', '2025-03-12 00:55:00'),
(17, 'nathan.id', 'Nathan', 'nathan@example.com', 'Dummy12', 'foto1.jpg', 'Chill student.', '2025-03-15 13:10:00'),
(18, 'rara.choco', 'Rara', 'rara@example.com', 'Dummy13', 'foto.jpg', 'Sweet but chaotic.', '2025-03-18 06:50:00'),
(19, 'ibad_01', 'Ibad', 'ibad@example.com', 'Dummy14', 'foto.jpg', 'Coding while snacking.', '2025-03-22 03:02:00'),
(20, 'noval_btw', 'Noval', 'noval@example.com', 'Dummy15', 'foto1.jpg', 'Just vibing.', '2025-03-25 08:48:00'),
(21, 'Niaa', 'Niaw', 'rainy@gmail.com', '96af3e61660203eb839821166ea5a01e', 'default.jpg', NULL, '2025-11-30 14:36:22'),
(22, 'Niaw', 'Niaw', 'rainya@gmail.com', '3d8db14a13b0c4529a2933f2874fbc5a', 'default.jpg', NULL, '2025-11-30 23:28:41'),
(23, 'Rainfinity77', 'Rainfinity77', 'robbaniyahumdatunn@gmail.com', '47d1994468bdfc78438438752d885a51', 'default.jpg', NULL, '2025-11-30 23:35:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `content_foto`
--
ALTER TABLE `content_foto`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indexes for table `content_video`
--
ALTER TABLE `content_video`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id_follow`),
  ADD UNIQUE KEY `unique_follow_pair` (`follow_id_followers`,`follow_id_following`),
  ADD KEY `follow_id_following` (`follow_id_following`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `group_owner_user_id` (`group_owner_user_id`);

--
-- Indexes for table `group_member`
--
ALTER TABLE `group_member`
  ADD PRIMARY KEY (`id_group_member`),
  ADD UNIQUE KEY `unique_user_in_group` (`member_group_id`,`member_user_id`),
  ADD KEY `member_user_id` (`member_user_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `comment_upload_id` (`comment_upload_id`),
  ADD KEY `comment_user_id` (`comment_user_id`),
  ADD KEY `comment_parent_id` (`comment_parent_id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id_like`),
  ADD UNIQUE KEY `unique_user_like` (`like_user_id`,`like_upload_id`),
  ADD KEY `like_upload_id` (`like_upload_id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id_mark`),
  ADD UNIQUE KEY `unique_user_mark` (`mark_user_id`,`mark_upload_id`),
  ADD KEY `mark_upload_id` (`mark_upload_id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_upload`),
  ADD KEY `upload_user_id` (`upload_user_id`),
  ADD KEY `upload_category_id` (`upload_category_id`),
  ADD KEY `upload_group_id` (`upload_group_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id_follow` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id_group` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_member`
--
ALTER TABLE `group_member`
  MODIFY `id_group_member` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id_like` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id_mark` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id_upload` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content_foto`
--
ALTER TABLE `content_foto`
  ADD CONSTRAINT `content_foto_ibfk_1` FOREIGN KEY (`id_upload`) REFERENCES `upload` (`id_upload`) ON DELETE CASCADE;

--
-- Constraints for table `content_video`
--
ALTER TABLE `content_video`
  ADD CONSTRAINT `content_video_ibfk_1` FOREIGN KEY (`id_upload`) REFERENCES `upload` (`id_upload`) ON DELETE CASCADE;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`follow_id_followers`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`follow_id_following`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`group_owner_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_member`
--
ALTER TABLE `group_member`
  ADD CONSTRAINT `group_member_ibfk_1` FOREIGN KEY (`member_group_id`) REFERENCES `group` (`id_group`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_member_ibfk_2` FOREIGN KEY (`member_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`comment_upload_id`) REFERENCES `upload` (`id_upload`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`comment_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`comment_parent_id`) REFERENCES `komentar` (`id_komentar`) ON DELETE CASCADE;

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`like_upload_id`) REFERENCES `upload` (`id_upload`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`like_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mark`
--
ALTER TABLE `mark`
  ADD CONSTRAINT `mark_ibfk_1` FOREIGN KEY (`mark_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_ibfk_2` FOREIGN KEY (`mark_upload_id`) REFERENCES `upload` (`id_upload`) ON DELETE CASCADE;

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `upload_ibfk_1` FOREIGN KEY (`upload_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `upload_ibfk_2` FOREIGN KEY (`upload_category_id`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `upload_ibfk_3` FOREIGN KEY (`upload_group_id`) REFERENCES `group` (`id_group`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

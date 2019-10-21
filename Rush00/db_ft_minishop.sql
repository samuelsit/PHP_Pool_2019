-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2019 at 02:36 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ft_minishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `art_id` int(11) UNSIGNED NOT NULL,
  `art_ref` varchar(50) DEFAULT NULL,
  `art_fam` int(11) DEFAULT '1',
  `art_nom` varchar(50) DEFAULT NULL,
  `art_pa` decimal(6,2) DEFAULT '0.00',
  `art_desc` text,
  `art_photo` varchar(80) DEFAULT NULL,
  `art_actif` tinyint(1) DEFAULT '1',
  `art_quantity` smallint(5) UNSIGNED DEFAULT NULL,
  `art_quantity_alert_thresold` smallint(5) UNSIGNED DEFAULT NULL,
  `art_tax_rule` decimal(3,2) DEFAULT NULL,
  `art_creation_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`art_id`, `art_ref`, `art_fam`, `art_nom`, `art_pa`, `art_desc`, `art_photo`, `art_actif`, `art_quantity`, `art_quantity_alert_thresold`, `art_tax_rule`, `art_creation_date`) VALUES
(205, 'DH-HAC-HDBW1200R-VF', 13, 'Caméra Dôme IR HDCVI 2 mégapixels', '60.00', 'Objectif à focale variable de 2,7 à 12 mm;\r\nJusque 30 images/s à 1080p;\r\nPortée IR maximale de 30 m, Smart IR;\r\n', 'HDBW1200RVF.jpg', 1, 59, NULL, NULL, '2019-10-19 07:01:30'),
(206, 'DH-IPC-HFW5831E-ZE', 14, 'Caméra Réseau IR WDR Bullet 8 mégapixels', '258.00', 'CMOS 1/2,5” 8 mégapixels à balayage progressif;\r\nEncodage double flux H.265 et H.264;\r\n15 ips à 4K, 25/30 ips à 3 mégapixels;', 'HFW5831E.jpg', 0, 66, NULL, NULL, '2019-10-19 07:01:30'),
(207, 'DH-IPC-HDW5431R-ZE', 13, 'Caméra Réseau Sphérique IR WDR 4 mégapixels', '274.00', 'CMOS 1/3” 4 mégapixels à balayage progressif;\r\nEncodage triple flux H.265 et H.264;\r\n25/30 ips à 4 mégapixels (2 688 × 1 520);', 'HDW5431R.jpg', 1, 37, NULL, NULL, '2019-10-19 07:01:30'),
(208, 'DH-IPC-HDBW5831E-ZE', 13, 'Caméra Dôme Réseau IR WDR 8 mégapixels', '274.80', 'CMOS STARVIS™ 1/2,5 ” 8 mégapixels à balayage progressif;\r\nEncodage double flux H.265 et H.264;\r\n15 ips à 4K, 25/30 ips à 3 mégapixels.;', 'HDBW5831E.jpg', 1, 88, NULL, NULL, '2019-10-19 07:01:30'),
(209, 'DH-IPC-HDBW4431F-AS', 16, 'Caméra Réseau Mini-Dôme IR 4 mégapixels', '158.40', 'CMOS 1/3” 4 mégapixels à balayage progressif;\r\nEncodage double flux H.265 et H.264;\r\n25/30 images/s à 4 mégapixels (2688 × 1520);', 'HDBW4431F.jpg', 1, 28, NULL, NULL, '2019-10-19 07:01:30'),
(210, 'DH-IPC-HDB4431G-AS', 13, 'Caméra réseau dôme à montage encastré HD 4MP', '145.20', 'CMOS progressive 1/3 ” 4 Mégapixels;\r\nEncodage triple flux H.265 & H264;\r\n25/30 fps @ 4MP;', 'HDB4431G.jpg', 1, 78, NULL, NULL, '2019-10-19 07:01:30'),
(211, 'DH-IPC-HFW2531T-ZS', 14, 'Caméra compacte réseau IR WDR 5 MP', '136.80', 'CMOS progressif 5 mégapixels 1/2,7”;\r\nEncodage double flux H.265/H.264;\r\n15 ips à 5 MP et 25/30 ips à 3 MP;', 'HFW2531T.jpg', 1, 4, NULL, NULL, '2019-10-19 07:01:30'),
(212, 'DH-IPC-HDBW2531R-ZS', 13, 'Dôme IP WDR 5 Mpx', '208.80', 'CMOS progressif 5 mégapixels 1/2,7”;\r\nEncodage double flux H.265/H.264;\r\n15 ips à 5 MP et 25/30 ips à 3 MP;\r\nZoom motorisé', 'HDBW2531R.jpg', 1, 89, NULL, NULL, '2019-10-19 07:01:30'),
(213, 'DH-IPC-HDW2531R-ZS', 13, 'Caméra eyeball réseau IR 5 MP', '204.00', 'CMOS progressif 5 mégapixels 1/2,7 ”;\r\nEncodage double flux H.265/H.264;\r\n15 ips à 5 MP et 25/30 ips à 3 MP;', 'HDW2531R.jpg', 1, 29, NULL, NULL, '2019-10-19 07:01:30'),
(214, 'DH-IPC-HDW1531S', 13, 'Caméra réseau avec globe oculaire 5MP WDR IR', '128.40', '1/2.7” 5Megapixel progressive CMOS ;\r\nH.265& H.264 dual-stream encoding ;\r\n20fps@5M &25/30fps@3M;', 'HDW1531S.jpg', 1, 81, NULL, NULL, '2019-10-19 07:01:30'),
(215, 'DH-IPC-HDBW1531E', 13, 'Caméra réseau mini-dôme IR 5MP WDR', '130.80', 'CMOS progressive de 1 / 2.7 ”à 5 mégapixels;\r\nEncodage double flux H.265 & H.264;\r\n15 ips à 5 M et 25/30 ips à 3 M;', 'HDBW1531E.jpg', 1, 18, NULL, NULL, '2019-10-19 07:01:30'),
(223, 'DH-HAC-HFW2802T-Z-A', 10, 'Caméra Bullet Starlight HDCVI IR 4K', '176.40', 'Starlight, 120dB True WDR, 3DNR;\r\nMax Résolution 4K;\r\nCommutable HD / SD;', 'HFW2802T.jpg', 1, 46, NULL, NULL, '2019-10-19 07:01:30'),
(224, 'DH-HAC-HDBW2802R-Z', 9, 'Caméra dôme IR 4K Starlight HDCVI', '159.60', 'Starlight, 120dB True WDR, 3DNR;\r\nMax Résolution 4K;\r\nCommutable HD / SD;', 'HDBW2802R.jpg', 1, 76, NULL, NULL, '2019-10-19 07:01:30'),
(225, 'DH-HAC-HDW2802T-Z-A', 9, 'Caméra à globe oculaire 4K Starlight HDCVI IR', '159.60', 'Starlight, 120dB True WDR, 3DNR;\r\nMax. Résolution 4K;\r\nCommutable HD / SD;', 'HDW2802T.jpg', 1, 42, NULL, NULL, '2019-10-19 07:01:30'),
(226, 'DH-HAC-HFW2501T-Z-A', 10, 'Caméra compacte IR HDCVI Starlight 5 MP', '123.60', 'Starlight, WDR réelle 120 dB, DNR 3D;\r\n20 ips max. à 5 MP;\r\nSortie HD/SD réglable;', 'HFW2501T.jpg', 1, 81, NULL, NULL, '2019-10-19 07:01:30'),
(227, 'DH-HAC-HDBW2401R-Z', 9, 'Caméra Dôme 4MP WDR HDCVI IR', '116.40', '120dB True WDR, 3DNR;\r\nMax 4MP en temps réel;\r\nDouble sortie HD et SD;', 'HDBW2401R.jpg', 1, 82, NULL, NULL, '2019-10-19 07:01:30'),
(228, 'DH-HAC-HDBW2501E', 9, 'Caméra dôme IR HDCVI Starlight 5 MP', '84.00', 'Starlight, WDR réelle 120 dB, DNR 3D ;\r\n20 ips max. à 5 MP ;\r\nSortie HD/SD réglable;', 'HDBW2501E.jpg', 1, 64, NULL, NULL, '2019-10-19 07:01:30'),
(229, 'DH-HAC-HDW2501M', 9, 'Caméra eyeball IR HDCVI Starlight 5 MP', '76.80', 'Starlight, WDR réelle 120 dB, DNR 3D;\r\n20 ips max. à 5 MP;\r\nSortie HD/SD réglable;', 'HDW2501M.jpg', 1, 77, NULL, NULL, '2019-10-19 07:01:30'),
(230, 'DH-HAC-HDBW2241R-Z', 9, 'Caméra dôme IR 2 mégapixels Starlight HDCVI', '110.40', 'Starlight, véritable WDR 120 dB, 3DNR\r\n30 ips max. à 1080p \r\nSortie HD/SD réglable', 'HDBW2241R.jpg', 0, 92, NULL, NULL, '2019-10-19 07:01:30'),
(231, 'DH-HAC-HDBW2241E', 9, 'Caméra dôme IR 2 mégapixels Starlight HDCVI', '74.40', 'Starlight, véritable WDR 120 dB, 3DNR;\r\n30 ips max. à 1080p;\r\nSortie HD/SD réglable;', 'HDBW2241E.jpg', 1, 29, NULL, NULL, '2019-10-19 07:01:30'),
(233, 'DH-HAC-HDBW1500R-Z', 9, 'Caméra dôme IR 5MP HDCVI', '91.20', 'Max. 20fps @ 5MP;\r\nSorties HD et SD commutables;\r\nObjectif motorisé 2.7-12mm;', 'HDBW1500R.jpg', 1, 67, NULL, NULL, '2019-10-19 07:01:30'),
(234, 'DH-HAC-HDBW1500E', 9, 'Caméra dôme IR 5MP HDCVI', '61.20', 'Max. 20fps @ 5MP;\r\nSorties HD et SD commutables;\r\nObjectif fixe de 3,6 mm (2,8 mm en option);', 'HDBW1500E.jpg', 1, 50, NULL, NULL, '2019-10-19 07:01:30'),
(235, 'DH-HAC-HDW1500M', 9, 'Caméra Eyeball 5MP HDCVI IR', '46.00', 'Max. 20fps @ 5MP;\r\nSorties HD et SD commutables;\r\nObjectif fixe de 3,6 mm (2,8 mm, 6 mm en option);', 'HDW1500M.jpg', 1, 47, NULL, NULL, '2019-10-19 07:01:30'),
(236, 'DH-HAC-HUM1220A-PIR', 12, 'Caméra MotionEye HDCVI 2 Mpx', '61.20', 'Maximum de 30 ips à 1080p;\r\nSortie HD et SD commutable;\r\nObjectif fixe de 2,8 mm ;', 'HUM1220A.jpg', 1, 84, NULL, NULL, '2019-10-19 07:01:30'),
(237, 'HAC-HUM3201B', 12, 'Caméra sténopé Starlight HDCVI 2MP', '74.40', 'Starlight, 120 dB vrai WDR, 3DNR;\r\nMax 30fp @ 1080p;\r\nSorties HD et SD commutables;', 'HUM3201B.jpg', 1, 80, NULL, NULL, '2019-10-19 07:01:30'),
(238, 'DH-XVR7216A-4KL-X', 3, 'Enregistreur vidéo numérique à 16 canaux 4K', '432.00', 'Compression vidéo double flux H.265+/H.265;\r\nPrise en charge des entrées vidéo HDCVI/AHD/TVI/CVBS/IP;\r\nPrend en charge 16/32 canaux d’accès de caméra IP ;\r\nJusqu’à 8 Mpx sur chaque canal d’entrée ;\r\nDébit entrant max. 64/128 Mbit/s;', 'XVR7216A.jpg', 1, 49, NULL, NULL, '2019-10-19 07:01:30'),
(239, 'DH-XVR7208A-4KL-X', 2, 'Enregistreur vidéo numérique à 8 canaux 4K', '290.40', 'Compression vidéo double flux H.265+/H.265;\r\nPrise en charge des entrées vidéo HDCVI/AHD/TVI/CVBS/IP;\r\nPrend en charge 16/32 canaux d’accès de caméra IP;', 'XVR7208A.jpg', 1, 6, NULL, NULL, '2019-10-19 07:01:30'),
(240, 'DH-XVR7116HE-4KL-X', 3, 'Enregistreur vidéo numérique à 16 canaux 4K', '415.20', 'Compression vidéo double flux H.265+/H.265;\r\nPrise en charge des entrées vidéo HDCVI/AHD/TVI/CVBS/IP;\r\nPrend en charge 16/32 canaux d’accès de caméra IP;', 'XVR7116HE.jpg', 1, 81, NULL, NULL, '2019-10-19 07:01:30'),
(241, 'DH-XVR7108HE-4KL-X', 2, 'Enregistreur vidéo numérique à 8 canaux 4K', '248.40', 'Compression vidéo double flux H.265+/H.265;\r\nPrise en charge des entrées vidéo HDCVI/AHD/TVI/CVBS/IP;\r\nPrend en charge 16/32 canaux d’accès de caméra IP;', 'XVR7108HE.jpg', 1, 88, NULL, NULL, '2019-10-19 07:01:30'),
(242, 'DH-XVR7104HE-4KL-X', 1, 'Enregistreur vidéo numérique à 4 canaux 4K', '195.60', 'Compression vidéo double flux H.265+/H.265;\r\nPrise en charge des entrées vidéo HDCVI/AHD/TVI/CVBS/IP;\r\nPrend en charge 8 canaux d’accès de caméra IP;\r\nJusqu’à 8 Mpx sur chaque canal d’entrée ; débit entrant max. 32 Mbit/s;', 'XVR7104HE.jpg', 1, 96, NULL, NULL, '2019-10-19 07:01:30'),
(246, 'DH-SD6C430U-HNI', 15, 'Caméra réseau PTZ IR 4MP 30x', '985.20', 'CMOS 1/3 ”4 Mégapixels;\r\nZoom optique puissant 30x;\r\nEncodage H.265;', 'SD6C40U.jpg', 1, 18, NULL, NULL, '2019-10-19 07:01:30'),
(248, 'DH-SD52C225U-HNI', 15, 'Caméra réseau PTZ Starlight 2 Mpx avec zoom x 25', '457.20', 'CMOS STARVIS™ 1/2,8” 2 mégapixels ;\r\nZoom optique puissant x25 ;\r\nEncodage H.265;', 'SD52C225U.jpg', 1, 100, NULL, NULL, '2019-10-19 07:01:30'),
(249, 'DH-SD42C212T-HN', 15, 'Caméra réseau PTZ Starlight 12x 2 mégapixels', '327.60', 'CMOS STARVIS™ 1/2,8” 2 mégapixels;\r\nPuissant zoom optique x12;\r\nPrise en charge d’un encodage triple flux;', 'SD42C212T.jpg', 1, 45, NULL, NULL, '2019-10-19 07:01:30'),
(250, 'DH-SD42212I-HC', 11, 'Caméra HDCVI PTZ Starlight x12 2 mégapixels', '280.80', 'CMOS Exmor 2 mégapixels 1/2,8 ”;\r\nZoom optique puissant x12;\r\nTechnologie Starlight;', 'SD42212I.jpg', 1, 25, NULL, NULL, '2019-10-19 07:01:30'),
(251, 'DH-SD22204I-GC', 11, 'Caméra HDCVI x4 PTZ 2 mégapixels', '140.40', 'CMOS 1/2,7” 2 mégapixels ;\r\nZoom optique puissant x4;\r\nPlage dynamique étendue (WDR) réelle de 120 Db ;\r\nRéduction du bruit numérique 3D (3D-DNR) ;', 'SD222041.jpg', 1, 89, NULL, NULL, '2019-10-19 07:01:30'),
(252, 'ASC1204B-S', 50, 'Contrôleur d’accès pour 4 portes', '103.20', 'Prise en charge de 100 000 cartes valides et 150 000 événements;\r\nDifférentes cartes prises en charge;\r\nPrise en charge de carte, mot de passe, empreinte digitale ou fonctions combinées;', 'ASC1204B.jpg', 1, 72, NULL, NULL, '2019-10-19 07:01:30'),
(253, 'ASC1204C-D', 50, 'Contrôleur d’accès bidirectionnel 4 portes', '320.40', 'Prise en charge de 100 000 cartes valides et 150 000 événements;\r\nDifférentes cartes prises en charge;\r\nPrise en charge de carte, mot de passe, empreinte digitale ou fonctions combinées;', 'ASC1204C_D.jpg', 1, 93, NULL, NULL, '2019-10-19 07:01:30'),
(259, 'ASR1102A(V2)', 50, 'Lecteur d\'empreintes digitales RFID', '96.00', 'Protocole RS-485;\r\nCarte IC (Mifare) par défaut («-D» signifie carte d\'identité ID);\r\nCarte de support, empreinte digitale;', 'ASR1102A.jpg', 1, 47, NULL, NULL, '2019-10-19 07:01:30'),
(263, 'ASM100', 50, 'Émetteur de carte', '48.00', 'Alimentation par port USB;\r\nSupport IC carte (carte Mifare) avec fréquence 13,56 MHz;', 'ASM100.jpg', 1, 57, NULL, NULL, '2019-10-19 07:01:30'),
(265, 'ASF900', 50, 'Bouton de sortie en plastique 86 boîte', '4.80', 'Conception de circuit professionnelle, pas de panne mécanique;\r\nUtiliser un matériau ignifuge, une installation pratique;\r\nFonctions normalement ouvertes / fermées, application flexible;', 'ASF900.jpg', 1, 43, NULL, NULL, '2019-10-19 07:01:30'),
(267, 'ASF102S', 50, 'Ferme-porte', '50.40', 'Poids de la porte 40 ~ 60kg, largeur de la porte 950mm;\r\n180 ° sans positionnement;\r\nAcier au carbone;', 'ASF102S.jpg', 1, 43, NULL, NULL, '2019-10-19 07:01:30'),
(269, 'ACT-MFIC-SM', 50, 'Badge dahua vierge', '3.60', '', 'MFIC.jpg', 1, 87, NULL, NULL, '2019-10-19 07:01:30'),
(270, 'DHL22-F600', 17, 'Moniteur LCD 22 pouces HD', '87.60', 'Écran LCD DID de type industriel, convient pour une utilisation intensive en continu 7 j/7, 24 h/24.;\r\nRésolution physique de 1920 x 1080 pixels;\r\nTraitement numérique haute-fidélité offrant une vidéo éclatante.;', 'DHL22.jpg', 1, 8, NULL, NULL, '2019-10-19 07:01:30'),
(271, 'DHL27-F600', 18, 'Moniteur LCD 28 pouces HD', '240.00', 'Panneau LCD IPS à niveau industriel, adapté aux travaux continus étendus de 7 × 24;\r\nTraitement numérique haute-fidélité offrant une vidéo éclatante.;\r\nTemps de réponse rapide de 5 ms, sans image résiduelle;', 'DHL27.jpg', 1, 77, NULL, NULL, '2019-10-19 07:01:30'),
(272, 'DHL32-F600', 18, 'Moniteur LCD 32 pouces HD', '360.00', 'Écran LCD DID de type industriel, convient pour une utilisation intensive en continu 7 j/7, 24 h/24.;\r\nRésolution physique de 1920 x 1080 pixels;\r\nTraitement numérique haute-fidélité offrant une vidéo éclatante;', 'DHL32.jpg', 1, 60, NULL, NULL, '2019-10-19 07:01:30'),
(273, 'DHL43-F600', 19, 'Moniteur LCD 43 pouces HD', '480.00', 'Écran LCD DID de type industriel, convient pour une utilisation intensive en continu 7 j/7, 24 h/24;\r\nRésolution physique de 1920 x 1080 pixels;\r\nTraitement numérique haute-fidélité offrant une vidéo éclatante. ;', 'DHL43.jpg', 1, 72, NULL, NULL, '2019-10-19 07:01:30'),
(276, 'BL103', 17, 'Support bureau pour écran', '80.40', '', 'BL103.jpg', 1, 78, NULL, NULL, '2019-10-19 07:01:30'),
(277, 'BL104', 17, 'Support 4 écrans', '87.60', '', 'BL104.jpg', 1, 75, NULL, NULL, '2019-10-19 07:01:30'),
(278, 'NVD0405DH-4K', 20, 'Décodeur vidéo réseau Ultra HD - 4 Ecrans', '939.60', 'Décodage vidéo H.265/H.264/MPEG4;\r\nCapacité de décodage 4 canaux à 12 Mpx/4 canaux à 4K/16 canaux à 1080p/64 canaux à D1.;\r\n1 canal d’entrée HDMI, 4 canaux de sortie HDMI/VGA/BNC ; \r\nLa sortie HDMI prend en charge la résolution Ultra HD 4K.;', 'NVD0405DH.jpg', 1, 41, NULL, NULL, '2019-10-19 07:01:30'),
(280, 'KITRISCOAG4/IP3G', 23, 'Kit Alarme Agility 4 IP+GSM', '384.00', 'Kit Agility4™ 3G/IP Multisocket. contient :;\r\n- une centrale Agility 4 3G / IP;\r\n- un clavier;\r\n- un radar;\r\n- un contact choc;', 'KITRISCOAG4.jpg', 1, 79, NULL, NULL, '2019-10-19 07:01:30'),
(281, 'BX-80NR', 24, 'Double détecteur infrarouge extérieur', '105.60', 'Détection jusqu\'à 12 m de chaque côté;\r\nDouble blindage conducteur;\r\nImmunité à l’environnement et aux petits animaux;\r\nTechnologie Radio;', 'BX_80NR.jpg', 1, 73, NULL, NULL, '2019-10-19 07:01:30'),
(282, 'VXI-RDAM', 24, 'Détecteur Extérieur double technologie', '122.40', 'Portée et couverture 12 m;\r\nDétection volumétrique avec analyse numérique;\r\nImmunité à l’environnement et aux petits animaux;\r\nRadio;', 'VXI_RDAM.jpg', 1, 28, NULL, NULL, '2019-10-19 07:01:30'),
(283, 'RA/CONB', 25, 'Contact magnétique sans-fil bidirectionnel blanc', '37.20', 'Certifié NF&A2P;\r\nCommunication : bidirectionnelle;\r\nContact magnétique intégré;', 'RA_CONB.jpg', 1, 22, NULL, NULL, '2019-10-19 07:01:30'),
(284, 'PRO+', 35, 'Centrale d\'alarme Prosys+', '144.00', 'RP/CN16 Boîtier Centrale d\'alarme Prosys+;\r\nSystème de sécurité super hybride Grade 3 conçu pour le secteur commercial;\r\nSupporte les installations filaire, sans fil et RISCO Bus.;', 'PROSYS.jpg', 1, 25, NULL, NULL, '2019-10-19 07:01:30'),
(286, 'RL/PANDA', 34, 'Clavier LCD Panda pour Lightsys', '67.20', 'Design épuré ;\r\nTouches réactives;\r\nInformations visuelles (Cloud, défauts, état…);\r\nPour Lightsys;', 'RL_PANDA.jpg', 1, 60, NULL, NULL, '2019-10-19 07:01:30'),
(287, 'RA/CLLCD', 28, 'Clavier LCD bidirectionnel Agility', '144.00', 'Compatible uniquement Agility - Technologie Radio;\r\nProgrammation installateur et mise en service utilisateur final sans fil;\r\nLCD et rétro éclairage bleu;\r\nMenu logique simplifié;\r\nSupport de fixation murale ;', 'RA_CLLD.jpg', 1, 25, NULL, NULL, '2019-10-19 07:01:30'),
(289, 'RA/CONCHOC', 25, 'Contact Choc magnétique sans fil', '60.00', 'Transmetteur bidirectionnel supervisé combinant un contact magnétique de portes/fenêtres et une entrée additionnelle.;\r\nIl fonctionne avec les récepteurs sans fil bidirectionnels du Groupe RISCO.;\r\nCommunication: Bidirectionnelle.;\r\nPortée de fonctionnement jusqu\'à 300 m.;', 'RA_CONCHOC.jpg', 1, 45, NULL, NULL, '2019-10-19 07:01:30'),
(290, 'RALP/CONM', 31, 'Contact Choc - Ouverture Lightsys / Prosys+', '30.00', 'Communication : Monodirectionnel ;\r\nTechnologie d\'alarme : Radio , Filaire;', 'RALP_CONM.jpg', 1, 50, NULL, NULL, '2019-10-19 07:01:30'),
(291, 'RA/PIRBA', 24, 'Détecteur sans fil Agility', '54.00', 'iWAVE™ IRP sans-fil bidirectionnel;\r\nCompatibilité : Agility ;\r\nTechnologie d\'alarme : Radio;', 'RA_PIRBA.jpg', 1, 15, NULL, NULL, '2019-10-19 07:01:30'),
(292, 'RA/GSM', 28, 'Carte GSM pour Agility', '102.00', 'Module Plug-in de communication GSM/GPRS Agility™;', 'RAGSM.jpg', 1, 26, NULL, NULL, '2019-10-19 07:01:30'),
(293, 'RA/SEXTL', 27, 'Sirène Extérieure Lumin8', '117.60', 'Compatibilité : Agility ;\r\nTechnologie d\'alarme : Radio ;\r\nVolume 105 dB @ 1 mètre;', 'RASEXTL.jpg', 1, 84, NULL, NULL, '2019-10-19 07:01:30'),
(294, 'RA/SINT', 27, 'Sirène Intérieure sans fil', '116.40', 'Compatibilité : Agility ;\r\nTechnologie d\'alarme : Radio ;\r\nVolume : 105 db @ 1 mètre;', 'RASINTL.jpg', 1, 43, NULL, NULL, '2019-10-19 07:01:30'),
(295, 'RA/IP', 28, 'Carte IP multi sockets pour Centrale Agility', '45.60', 'Module Plug-in de communication TCP/IP;\r\nCompatibilité : Agility ;\r\nTechnologie d\'alarme : Radio ;', 'RAIP.jpg', 1, 62, NULL, NULL, '2019-10-19 07:01:30'),
(296, 'RA/TEL4', 28, 'Télécommande d\'alarme Agility', '24.00', 'Télécommande 4 boutons monodirectionnelle;\r\nCompatibilité : Agility ;\r\nTechnologie d\'alarme : Radio;', 'RATEL4.jpg', 1, 79, NULL, NULL, '2019-10-19 07:01:30'),
(297, 'RA/FUME', 24, 'Détecteur Fumée sans fil', '69.60', 'Détecteur de fumée et chaleur sans-fil;\r\nCompatibilité : Agility ;\r\nTechnologie d\'alarme : Radio ;\r\n\r\n-- Important : ce détecteur avertisseur autonome de fumée ne remplace ou ne constitue en aucun cas un système de sécurité incendie, lorsque celui-ci est obligatoire, notamment pour certains établissements recevant du public. -- ', 'RAFUME.jpg', 1, 12, NULL, NULL, '2019-10-19 07:01:30'),
(298, 'RA/TAG', 28, 'Tag de proximité 13,56 MHz', '6.00', '?Compatibilité : Agility ;\r\nTechnologie d\'alarme : Radio ;', 'RATAG.jpg', 1, 21, NULL, NULL, '2019-10-19 07:01:30'),
(299, 'KITRISCOLI/P', 29, 'Centrale d\'alarme Ligtsys GSM / IP', '318.00', 'Nb de zones (Maxi) : 50 ;\r\nNb de zones Initiales : 8 ;\r\nTechnologie d\'alarme : Filaire/Radio (Hybride) ;\r\nIntègre modules GSM et IP;', 'KITRISCOLI.jpg', 1, 71, NULL, NULL, '2019-10-19 07:01:30'),
(300, 'RL/PIR', 30, 'Détecteur de mouvement Green Line', '42.00', 'Compatibilité : Lightsys ;\nTechnologie d\'alarme : Filaire ;', 'RLPIR.jpg', 1, 91, NULL, NULL, '2019-10-19 07:01:30'),
(301, 'RL/EXTW32', 34, 'Module d\'extension de zone Lightsys', '50.40', 'Module d\'extension 32 zones Sans-fils LightSYS;\r\nTechnologie d\'alarme radio;', 'EXTW32.jpg', 1, 43, NULL, NULL, '2019-10-19 07:01:30'),
(302, 'KITRISCOLI/M', 29, 'Centrale d\'alarme Ligtsys GSM / IP', '381.60', 'Nb de zones (Maxi) : 50 ;\r\nNb de zones Initiales : 8 ;\r\nTechnologie d\'alarme : Filaire/Radio (Hybride) ;\r\nIntègre modules GSM et IP;', 'JITRISCOLIM.jpg', 1, 40, NULL, NULL, '2019-10-19 07:01:30'),
(303, 'DT8012F5', 30, 'Détecteur Double technologie DUAL TEC', '30.00', 'Boîtier robuste et lisse;\r\nCouverture de détection étendue ;\r\nImmunité contre les alarmes intempestives ;\r\nDiscernement des animaux de compagnie;', 'DT80.jpg', 1, 71, NULL, NULL, '2019-10-19 07:01:30'),
(304, 'RL/ALTEC', 33, 'Sirène Extérieure ALTEC', '108.00', 'Boîtier en fonte d’aluminium;\r\nAuto alimentée par batterie 12V-2.1Ah;\r\nBoîtier auto-protégé à l’ouverture et à l’arrachement;\r\n90 db;', 'RLALTEC.jpg', 1, 36, NULL, NULL, '2019-10-19 07:01:30'),
(305, 'TLS', 48, 'PRESTATION TELESURVEILLANCE', '30.00', 'Forfait télésurveillance;\r\n- Liaison au PC de sécurité CORS;\r\n- Abonnement GSM;\r\n- Levée de doute vidéo;', 'TLS.jpg', 1, 67, NULL, NULL, '2019-10-19 07:01:30'),
(306, 'aquila', 49, 'INTERVENTION VIGILE', '200.40', 'Forfait intervention;\r\n- effectuer une levée de doute,;\r\n- identifier l\'origine de l\'alarme,;\r\n- rendre compte aux personnes concernées ;\r\n', 'AQUILA.jpg', 1, 27, NULL, NULL, '2019-10-19 07:01:30'),
(307, 'SD49225I-HC', 11, 'Caméra dôme motorisée X 25', '260.40', 'Dôme motorisée 2 MP;\r\nEclairage infrarouge à 100 m;\r\nZoom X 25;', 'SD49225I.jpg', 1, 34, NULL, NULL, '2019-10-19 07:01:30'),
(308, 'DMV2C', 56, 'Déclencheur manuel', '24.00', 'Déclencheur manuel vert;\r\n2 contacts avec capot;', 'DMV2C.jpg', 1, 88, NULL, NULL, '2019-10-19 07:01:30'),
(309, 'IPC-EB5531', 16, 'CAMERA IP - FISH EYE 5 MP', '240.00', 'Encodage H265+ - et H264 triple stream;\r\nFocale 1.4 mm;\r\nFonction contre jour WDR (120 dB);\r\nMicro incorporé;', 'EB5531.jpg', 1, 40, NULL, NULL, '2019-10-19 07:01:30'),
(310, 'SD59430U-HNI', 15, 'DOME MOTORISE IP - 4 Mpxls', '600.00', 'Alimentation Caméra : POE+ ;\r\nEnvironnement : Extérieur ;\r\nInfrarouge 150 M;\r\nZoom motorisé X 30;', 'SD59430U.jpg', 1, 37, NULL, NULL, '2019-10-19 07:01:30'),
(311, 'SW8G-8HIP-2G-120W', 20, 'SWITCH POE 8 VOIES', '138.00', 'Nombre de ports du switch : 8 ;\nType de switch : Hi POE ;', 'SW8G.jpg', 1, 62, NULL, NULL, '2019-10-19 07:01:30'),
(312, 'V150.4', 21, 'MAT DE VIDEO SURVEILLANCE 4 M', '399.60', 'Matériaux polyester fibre de verre, teinté dans la masse.;\r\nHauteur du mât 4m.;\r\nPoids mat + pied 38 kg - Diamètre 150mm.;', 'MAT.jpg', 1, 1, NULL, NULL, '2019-10-19 07:01:30'),
(313, 'RL/LUNAR-INDUS', 34, 'DETECTEUR PLAFOND 360°', '111.60', 'Couverture : 360° pour un diamètre de détection de 12 mètres;\r\nDouble technologie (IRP + Hyperfréquences);\r\nFonction Anti-Masque;', 'LUNAR.jpg', 1, 16, NULL, NULL, '2019-10-19 07:01:30'),
(232, 'DH-HAC-HFW1500R-Z-IRE6-A', 10, 'Caméra Bullet HD 5V HDCVI', '96.00', 'Max. 20fps @ 5MP;\r\nMicro intégré;\r\nSorties HD et SD commutables;', 'HFW1500R.jpg', 1, 80, NULL, NULL, '2019-10-19 07:01:30'),
(274, 'SUPP DHL19/22/27/32-BG', 17, 'Support Ecran pour DHL19/22/27/32-BG', '15.60', '', 'SUPP_19.jpg', 1, 50, NULL, NULL, '2019-10-19 07:01:30'),
(275, 'SUPP DHL42/43/49/55-BG', 18, 'Support pour DHL42/43/49/55-BG', '24.00', '', 'SUPP_42.jpg', 1, 12, NULL, NULL, '2019-10-19 07:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `articles_familles`
--

CREATE TABLE `articles_familles` (
  `arf_id` int(11) NOT NULL,
  `arf_f2` int(11) NOT NULL,
  `arf_nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles_familles`
--

INSERT INTO `articles_familles` (`arf_id`, `arf_f2`, `arf_nom`) VALUES
(1, 1, '4 voies'),
(2, 1, '8 voies'),
(3, 1, '16 voies'),
(4, 1, '+32 voies'),
(5, 2, '4 voies'),
(6, 2, '8 voies'),
(7, 2, '16 voies'),
(8, 2, '+32 voies'),
(9, 3, 'Dome'),
(10, 3, 'Exterieure'),
(11, 3, 'Speed Dome'),
(12, 3, 'Autres'),
(13, 4, 'Dome'),
(14, 4, 'Exterieure'),
(15, 4, 'Speed Dome'),
(16, 4, 'Autres'),
(17, 5, '22 Pouces'),
(18, 5, '26-32 Pouces'),
(19, 5, '+40 Pouces'),
(20, 6, 'cat1'),
(21, 6, 'cat2'),
(22, 6, 'cat3'),
(23, 7, 'Centrale'),
(24, 7, 'Radars'),
(25, 7, 'Contact'),
(26, 7, 'Chocs'),
(27, 7, 'Sirene'),
(28, 7, 'Autres'),
(29, 8, 'Centrale'),
(30, 8, 'Radars'),
(31, 8, 'Contact'),
(32, 8, 'Chocs'),
(33, 8, 'Sirene'),
(34, 8, 'Autres'),
(35, 9, 'Centrale'),
(36, 9, 'Radars'),
(37, 9, 'Contact'),
(38, 9, 'Chocs'),
(39, 9, 'Sirene'),
(40, 9, 'Autres'),
(41, 10, 'Centrale'),
(42, 10, 'Radars'),
(43, 10, 'Contact'),
(44, 10, 'Chocs'),
(45, 10, 'Sirene'),
(46, 10, 'Autres'),
(47, 11, 'cat1'),
(48, 11, 'cat2'),
(49, 11, 'cat3'),
(50, 12, 'cat1'),
(51, 12, 'cat2'),
(52, 12, 'cat3'),
(53, 13, 'cat1'),
(54, 13, 'cat2'),
(55, 13, 'cat3'),
(56, 14, 'cat1'),
(57, 14, 'cat2'),
(58, 14, 'cat3'),
(59, 15, 'cat1'),
(60, 15, 'cat2'),
(61, 15, 'cat3'),
(62, 16, 'cat1'),
(63, 16, 'cat2'),
(64, 16, 'cat3');

-- --------------------------------------------------------

--
-- Table structure for table `articles_familles_2`
--

CREATE TABLE `articles_familles_2` (
  `arf2_id` int(11) NOT NULL,
  `arf2_ctg` int(11) NOT NULL,
  `arf2_nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles_familles_2`
--

INSERT INTO `articles_familles_2` (`arf2_id`, `arf2_ctg`, `arf2_nom`) VALUES
(1, 1, 'DVR'),
(2, 1, 'NVR'),
(3, 1, 'Cameras HD'),
(4, 1, 'Cameras IP'),
(5, 1, 'Moniteur'),
(6, 1, 'Autres'),
(7, 2, 'Risco Agility'),
(8, 2, 'Risco Lightsys'),
(9, 2, 'Risco Prosys'),
(10, 2, 'Ajax'),
(11, 2, 'Autres'),
(12, 3, 'Dahua'),
(13, 3, 'Vauban'),
(14, 4, 'cat1'),
(15, 4, 'cat2'),
(16, 4, 'cat3');

-- --------------------------------------------------------

--
-- Table structure for table `cart_ligne`
--

CREATE TABLE `cart_ligne` (
  `ctl_id` int(11) NOT NULL,
  `ctl_user` int(11) DEFAULT NULL,
  `ctl_art` int(11) DEFAULT NULL,
  `ctl_art_qte` int(11) DEFAULT NULL,
  `ctl_art_pa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_ligne`
--

INSERT INTO `cart_ligne` (`ctl_id`, `ctl_user`, `ctl_art`, `ctl_art_qte`, `ctl_art_pa`) VALUES
(1, 4, 205, 1, 60),
(1, 4, 206, 1, 258),
(2, 4, 205, 1, 60),
(2, 4, 206, 1, 258),
(3, 4, 253, 1, 320),
(3, 4, 207, 1, 274),
(3, 4, 211, 1, 136),
(3, 4, 259, 1, 96),
(4, 3, 206, 1, 258),
(4, 3, 259, 1, 96),
(4, 3, 270, 1, 87),
(5, 4, 207, 1, 274),
(5, 4, 208, 1, 274),
(5, 4, 206, 1, 258);

-- --------------------------------------------------------

--
-- Table structure for table `categories_familles`
--

CREATE TABLE `categories_familles` (
  `ctg_id` int(11) UNSIGNED NOT NULL,
  `ctg_nom` varchar(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_familles`
--

INSERT INTO `categories_familles` (`ctg_id`, `ctg_nom`) VALUES
(1, 'VideoSurveillance'),
(2, 'Alarme'),
(4, 'Autres'),
(3, 'Controle');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `ord_date` varchar(15) DEFAULT NULL,
  `ord_mnt` int(11) DEFAULT NULL,
  `ord_user` int(11) DEFAULT NULL,
  `ord_cart` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `ord_date`, `ord_mnt`, `ord_user`, `ord_cart`) VALUES
(6, '20/10/2019', 318, 4, 1),
(7, '20/10/2019', 318, 4, 2),
(8, '20/10/2019', 828, 4, 3),
(9, '20/10/2019', 441, 3, 4),
(10, '20/10/2019', 806, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `perm_id` int(11) NOT NULL,
  `perm_label` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_label` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles_perms`
--

CREATE TABLE `roles_perms` (
  `rp_id` int(11) NOT NULL,
  `rp_role_id` int(11) NOT NULL,
  `rp_perm_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_mail` varchar(1000) NOT NULL,
  `user_password` char(255) DEFAULT NULL,
  `user_salt` char(255) DEFAULT NULL,
  `user_activation_token` char(255) DEFAULT NULL,
  `user_title` char(3) NOT NULL,
  `user_traffic` bigint(20) UNSIGNED DEFAULT '0',
  `user_commands_nb` int(10) UNSIGNED DEFAULT NULL,
  `user_abort_step` tinyint(4) DEFAULT NULL,
  `user_active` tinyint(1) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_zipcode` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_tel` varchar(255) NOT NULL,
  `user_address` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_mail`, `user_password`, `user_salt`, `user_activation_token`, `user_title`, `user_traffic`, `user_commands_nb`, `user_abort_step`, `user_active`, `user_city`, `user_zipcode`, `user_country`, `user_tel`, `user_address`) VALUES
(4, 'Paul', 'Morange', 'paul@toto.com', 'dd64bca03c96d395bb7e55c3936ee85691931ea4223cd39f6705d10447a7e788e8d621f94f25cc7a908713f37b91ca88d100c799a6db0b5a80db6edfe82b2ff8', 'rlKkowuQno', '1QJBHKpmQ8', 'F', 54, NULL, NULL, 1, '111', '111', '11', '11', '11'),
(6, 'Jane', 'Boulet', 'jeane@gmail.com', 'f2840b33e84a70f16a73528d0391db55274c9bae9eb46236be2b9017923e75c8bb701dffe836766cb47a6748749eeadeefc1feb05c3877270536fe56b153b2de', 'JElojWEqCY', 'bzaRX8KFWl', 'F', 0, NULL, NULL, 0, '', '', '', '', NULL),
(7, 'Boulet', 'Marc', 'marcb@gmail.com', '0e55283ecba25d7eb87f7843b6c2ad444abb28e2ade271da747ccfb6ee7f5791b9697085b5253232d11e03c5992066022b9a3993b4819f8b73c38e71f2c371fe', 'kqgQpPovNr', 'nSslzDYNFh', 'F', 0, NULL, NULL, 0, '', '', '', '', NULL),
(11, 'Boisselet', 'Romain', 'john.doe@lol.fr', 'ab9e95b6431c16f56f51dac3d6d1fc58b792d9bf851e995075f0d22f6758d2dc67fae48faf25f2b8c5e8bf87928774fcfd2e7aea3ae00433183eed0b4cef4ee4', 'OK85ntnTfv', 'AdxJNOCr8W', 'F', 1, NULL, NULL, 0, '1', '1', '1', '1', '1'),
(12, 'Boisselet', 'Romain', 'paul@toto.te', 'b10a4f24a08a1269904152e9ce718b896d3cce2e050afed5b8260b3b86722fdc47a3260d9aa42565fed3b0d3e4836492ce4d7702c78ed72e78d04b5234a0ff3c', 'kCtIyaZdd1', '1aCOl0h24z', 'M', 1, NULL, NULL, 0, '12', '12', '12', '12', '12');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `ur_id` smallint(5) UNSIGNED NOT NULL,
  `ur_user_id` smallint(5) UNSIGNED NOT NULL,
  `ur_role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`ur_id`, `ur_user_id`, `ur_role_id`) VALUES
(1, 4, 2),
(2, 10, 1),
(3, 11, 1),
(4, 12, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `articles_familles`
--
ALTER TABLE `articles_familles`
  ADD PRIMARY KEY (`arf_id`);

--
-- Indexes for table `articles_familles_2`
--
ALTER TABLE `articles_familles_2`
  ADD PRIMARY KEY (`arf2_id`);

--
-- Indexes for table `categories_familles`
--
ALTER TABLE `categories_familles`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`perm_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `roles_perms`
--
ALTER TABLE `roles_perms`
  ADD PRIMARY KEY (`rp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`ur_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `art_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT for table `articles_familles`
--
ALTER TABLE `articles_familles`
  MODIFY `arf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `articles_familles_2`
--
ALTER TABLE `articles_familles_2`
  MODIFY `arf2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories_familles`
--
ALTER TABLE `categories_familles`
  MODIFY `ctg_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles_perms`
--
ALTER TABLE `roles_perms`
  MODIFY `rp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `ur_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

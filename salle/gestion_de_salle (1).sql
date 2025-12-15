-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2025 at 02:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion de salle`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'khaoula', 'khaoulabhaou@gmail.com', '$2y$12$z/4iRBgFVO37cWUkesjNrurkoBqTKNiExA..igmBlbqVmUWZmxKLq', '2025-06-09 14:53:28', '2025-06-09 14:53:28'),
(2, 'khaoula bhaou', 'mihawkbieber@gmail.com', '$2y$12$u4uxho.0UzLRDHk4S9wYF.H/qE6tCYn0rc9G4BbDve/yF9HvHHmDe', '2025-06-09 22:32:46', '2025-06-09 22:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_memberships`
--

CREATE TABLE `cancelled_memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` bigint(20) UNSIGNED NOT NULL,
  `cancellation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cancelled_memberships`
--


-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `image`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Cours débutant', 'categories/WZKmk7eA9bQckoiAWmWgXEZAxWyX65eWzFzNxhhe.jpg', 'Parfait pour les débutants ! Ces cours sont conçus pour t’aider à apprendre les bases à ton rythme. Que tu sois nouveau ou que tu veuilles revoir les fondamentaux, cette catégorie est faite pour toi.', '2025-06-04 14:13:02', '2025-06-04 14:13:02'),
(4, 'Cours Intermédiaire', 'categories/zSm7nrtNY4B6c84hQmUw7EQaApDsrBbtcNfRYQcS.jpg', 'Ce cours est conçu pour ceux qui maîtrisent les bases et souhaitent aller plus loin. Vous développerez votre force, votre endurance et votre technique avec des exercices plus complexes.', '2025-06-04 14:29:27', '2025-06-04 14:29:27'),
(5, 'Cours Avancé', 'categories/13Hjka9bpmfmmsCBNXvCdmjJ2A3Xe7TmXWwWGq1q.jpg', 'Le Cours Avancé s\'adresse aux apprenants ayant déjà une bonne maîtrise des bases. Il permet d’approfondir les connaissances, de maîtriser des techniques complexes et d’appliquer les compétences dans des situations réelles pour atteindre un niveau d’expertise.', '2025-06-04 14:32:36', '2025-06-04 14:32:36'),
(6, 'Cours Privé', 'categories/PLRpORcCFJx8M2bOrfOI3GFzoVyUojBg2oNn8iZV.jpg', 'Le Cours Privé offre un accompagnement personnalisé adapté aux besoins et au rythme de chaque élève. Il permet un suivi individuel, un contenu sur mesure et une progression rapide grâce à une attention exclusive du coach.', '2025-06-04 14:35:38', '2025-06-04 14:35:38'),
(7, 'Cours Prénatal', 'categories/84ebCIy4QObpukHXk7Q8aPP71Bge8NWOqIRv1zi8.jpg', 'Ces cours sont spécialement conçus pour les femmes enceintes afin de les aider à rester actives en toute sécurité pendant la grossesse. Ils combinent des exercices doux, de la respiration, de la relaxation et du renforcement musculaire adaptés à chaque trimestre. L’objectif est de favoriser le bien-être physique et mental de la future maman tout en préparant son corps à l’accouchement.', '2025-06-04 14:38:57', '2025-06-04 14:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `categorie` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `nom_complet`, `email`, `categorie`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Sébastien Bonnet', 'sebastien.bonnet@coach.fr', 7, '2025-06-06 02:48:26', '2025-03-08 03:48:26', 4),
(2, 'Virginie Simon', 'virginie.simon@coach.fr', 6, '2024-09-07 02:48:26', '2025-04-12 02:48:26', NULL),
(3, 'Guillaume François', 'guillaume.francois1@sport.fr', 7, '2025-05-14 02:48:26', '2024-09-14 02:48:26', NULL),
(4, 'Anne Durand', 'anne.durand@protonmail.com', 3, '2025-04-04 03:48:26', '2024-06-12 02:48:26', NULL),
(5, 'Sandrine David', 'sandrine.david1@hotmail.com', 3, '2025-06-06 02:48:26', '2024-11-08 02:48:26', NULL),
(6, 'Michel Petit', 'michel.petit@protonmail.com', 3, '2025-05-22 02:48:26', '2024-12-06 02:48:26', NULL),
(7, 'Nicolas Durand', 'nicolas.durand@coach.fr', 6, '2024-08-20 02:48:26', '2025-03-21 03:48:26', NULL),
(8, 'Philippe Lefevre', 'philippe.lefevre3@gmail.com', 6, '2024-08-31 02:48:26', '2025-01-19 02:48:26', NULL),
(9, 'Virginie François', 'virginie.francois3@coach.fr', 7, '2025-04-02 03:48:26', '2024-11-19 02:48:26', NULL),
(10, 'Sandrine Vincent', 'sandrine.vincent@coach.fr', 3, '2024-06-19 02:48:26', '2025-01-29 02:48:26', NULL),
(11, 'Jean Leroy', 'jean.leroy@protonmail.com', 7, '2025-01-04 02:48:26', '2025-04-12 02:48:26', NULL),
(12, 'Philippe Dubois', 'philippe.dubois1@hotmail.com', 7, '2025-03-15 03:48:26', '2025-05-22 02:48:26', NULL),
(13, 'Nicolas David', 'nicolas.david1@coach.fr', 6, '2025-01-24 02:48:26', '2025-03-13 03:48:26', NULL),
(14, 'David Bernard', 'david.bernard@gmail.com', 4, '2024-09-22 02:48:26', '2025-01-08 02:48:26', NULL),
(15, 'David Andre', 'david.andre@hotmail.com', 6, '2024-12-10 02:48:26', '2024-12-07 02:48:26', NULL),
(16, 'Sébastien Robert', 'sebastien.robert@gmail.com', 3, '2024-08-13 02:48:26', '2024-09-27 02:48:26', NULL),
(17, 'Nathalie Garcia', 'nathalie.garcia@gmail.com', 5, '2024-11-17 02:48:26', '2025-05-23 02:48:26', NULL),
(18, 'Virginie Andre', 'virginie.andre@coach.fr', 3, '2024-12-02 02:48:26', '2024-09-27 02:48:26', NULL),
(19, 'Sandrine Bernard', 'sandrine.bernard@coach.fr', 7, '2024-11-02 02:48:26', '2025-02-08 02:48:26', NULL),
(20, 'Élodie Vincent', 'elodie.vincent@protonmail.com', 7, '2025-05-16 02:48:26', '2024-10-22 02:48:26', NULL),
(21, 'Laurent François', 'laurent.francois@coach.fr', 7, '2025-05-10 02:48:26', '2024-12-20 02:48:26', NULL),
(22, 'Marie Michel', 'marie.michel@coach.fr', 4, '2024-11-19 02:48:26', '2025-01-20 02:48:26', NULL),
(23, 'David Martin', 'david.martin@gmail.com', 4, '2025-01-19 02:48:26', '2025-02-18 02:48:26', NULL),
(24, 'Jérôme Dubois', 'jerome.dubois3@gmail.com', 7, '2024-06-26 02:48:26', '2025-03-17 03:48:26', NULL),
(25, 'Alexandre François', 'alexandre.francois@gmail.com', 4, '2024-11-01 02:48:26', '2024-10-12 02:48:26', NULL),
(26, 'Élodie Bertrand', 'elodie.bertrand@hotmail.com', 7, '2024-11-18 02:48:26', '2024-10-31 02:48:26', NULL),
(27, 'David Laurent', 'david.laurent@coach.fr', 4, '2025-03-15 03:48:26', '2025-04-12 02:48:26', NULL),
(28, 'Philippe Bertrand', 'philippe.bertrand@protonmail.com', 4, '2024-11-26 02:48:26', '2025-05-31 02:48:26', NULL),
(29, 'Marie Girard', 'marie.girard@protonmail.com', 7, '2025-06-06 02:48:26', '2025-05-25 02:48:26', NULL),
(30, 'Nicolas Morel', 'nicolas.morel@yahoo.fr', 3, '2024-08-19 02:48:26', '2024-08-25 02:48:26', NULL),
(31, 'Olivier Thomas', 'olivier.thomas@protonmail.com', 5, '2025-05-09 02:48:26', '2024-08-15 02:48:26', NULL),
(32, 'Guillaume Lefevre', 'guillaume.lefevre@coach.fr', 3, '2025-02-13 02:48:26', '2025-05-09 02:48:26', NULL),
(33, 'Jérôme Durand', 'jerome.durand@coach.fr', 4, '2025-04-06 02:48:26', '2024-08-31 02:48:26', NULL),
(34, 'Anne Lambert', 'anne.lambert@coach.fr', 4, '2025-04-24 02:48:26', '2024-12-18 02:48:26', NULL),
(35, 'Guillaume Roux', 'guillaume.roux@hotmail.com', 3, '2024-12-12 02:48:26', '2024-10-02 02:48:26', NULL),
(36, 'Philippe Bernard', 'philippe.bernard@coach.fr', 5, '2024-12-06 02:48:26', '2024-09-20 02:48:26', NULL),
(37, 'Jérôme Bernard', 'jerome.bernard2@yahoo.fr', 4, '2024-12-16 02:48:26', '2024-08-17 02:48:26', NULL),
(38, 'Sophie Leroy', 'sophie.leroy@hotmail.com', 6, '2024-10-21 02:48:26', '2024-06-19 02:48:26', NULL),
(39, 'Céline Fournier', 'celine.fournier@hotmail.com', 5, '2024-07-11 02:48:26', '2024-11-27 02:48:26', NULL),
(40, 'Marie Petit', 'marie.petit@hotmail.com', 3, '2024-12-21 02:48:26', '2024-09-30 02:48:26', NULL),
(41, 'khaoula bhaou', 'mihawkbieber@gmail.com', NULL, '2025-06-09 22:32:15', '2025-06-09 22:32:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coache_member`
--

CREATE TABLE `coache_member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coache_id` bigint(20) UNSIGNED NOT NULL,
  `membres_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `user_id`, `name`, `email`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'khaoula', 'khaoulabhaou@gmail.com', 'haha', 'ekdfnsldiöfhjfkbleöohfshifjsofuskfladvjhapokq', 1, '2025-06-03 22:26:10', '2025-06-03 23:44:22'),
(2, 1, 'elalaoui', 'elalaouie@gmail.com', 'problem avec les materiels', 'j\'ai des questions sur les matériels', 1, '2025-06-07 02:44:07', '2025-06-07 02:46:50'),
(3, 1, 'Badra', 'badra@gmail.com', 'subject about the benifits of ur subs', 'my message that i am', 0, '2025-06-07 02:45:12', '2025-06-07 02:45:12'),
(4, 1, 'mohammed', 'medox@gmail.com', 'localisation de votre salle', 'gfg', 0, '2025-06-07 02:45:37', '2025-06-07 02:45:37'),
(5, 1, 'Zoubaire', 'yergd@gmail.com', 'subject very important blud', 'g', 0, '2025-06-07 02:46:14', '2025-06-07 02:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `duree` int(11) NOT NULL,
  `capacite_max` int(11) NOT NULL,
  `coach_id` bigint(20) UNSIGNED NOT NULL,
  `statut` enum('PLANIFIE','EN_COURS','TERMINE','ANNULE') NOT NULL DEFAULT 'PLANIFIE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `category_id`, `titre`, `description`, `duree`, `capacite_max`, `coach_id`, `statut`, `created_at`, `updated_at`) VALUES
(1, 5, 'Session de Escalade', 'Session encadrée par des professionnels pour progresser à votre rythme.', 120, 10, 12, 'PLANIFIE', '2025-06-10 02:56:20', '2025-06-10 02:56:20'),
(2, 3, 'Cours de Cyclisme Indoor', 'Approche pédagogique adaptée à chaque participant.', 45, 20, 11, 'PLANIFIE', '2025-07-22 02:56:20', '2025-07-22 02:56:20'),
(3, 5, 'Session de Cardio Training', 'Programme varié et progressif pour des résultats durables.', 60, 25, 25, 'PLANIFIE', '2025-06-25 02:56:20', '2025-06-25 02:56:20'),
(4, 4, 'Découverte du Boxe Anglaise', 'Programme varié et progressif pour des résultats durables.', 90, 10, 25, 'PLANIFIE', '2025-06-11 02:56:20', '2025-06-11 02:56:20'),
(5, 5, 'Cours de Natation Perfectionnement', 'Session encadrée par des professionnels pour progresser à votre rythme.', 120, 15, 2, 'PLANIFIE', '2025-06-10 02:56:20', '2025-06-10 02:56:20'),
(6, 6, 'Session de Natation Perfectionnement', 'Découvrez une nouvelle activité sportive dans une ambiance conviviale.', 90, 15, 12, 'PLANIFIE', '2025-07-29 02:56:20', '2025-07-29 02:56:20'),
(7, 4, 'Formation en Zumba Fitness', 'En petit groupe pour un suivi personnalisé de chaque participant.', 30, 10, 19, 'PLANIFIE', '2025-06-21 02:56:20', '2025-06-21 02:56:20'),
(8, 6, 'Découverte du Athlétisme', 'Matériel professionnel fourni pour une expérience optimale.', 90, 30, 15, 'PLANIFIE', '2025-07-12 02:56:20', '2025-07-12 02:56:20'),
(9, 6, 'Cours de Krav Maga', 'Approche pédagogique adaptée à chaque participant.', 45, 15, 4, 'TERMINE', '2025-06-05 02:56:20', '2025-06-05 02:56:20'),
(10, 7, 'Formation en Cyclisme Indoor', 'Approche pédagogique adaptée à chaque participant.', 120, 30, 22, 'TERMINE', '2025-05-21 02:56:20', '2025-05-21 02:56:20'),
(11, 3, 'Cours de Musculation Fonctionnelle', 'Découvrez une nouvelle activité sportive dans une ambiance conviviale.', 120, 20, 5, 'PLANIFIE', '2025-08-02 02:56:20', '2025-08-02 02:56:20'),
(12, 4, 'Session de Athlétisme', 'Approche pédagogique adaptée à chaque participant.', 120, 20, 20, 'TERMINE', '2025-05-27 02:56:20', '2025-05-27 02:56:20'),
(13, 4, 'Session de Boxe Anglaise', 'En petit groupe pour un suivi personnalisé de chaque participant.', 45, 30, 18, 'PLANIFIE', '2025-06-22 02:56:20', '2025-06-22 02:56:20'),
(14, 6, 'Formation en Athlétisme', 'Perfectionnez votre technique avec nos coachs expérimentés.', 45, 10, 24, 'PLANIFIE', '2025-06-23 02:56:20', '2025-06-23 02:56:20'),
(15, 7, 'Découverte du Zumba Fitness', 'Un cours complet pour tous niveaux permettant d\'améliorer votre condition physique.', 45, 10, 22, 'PLANIFIE', '2025-06-08 02:56:20', '2025-06-08 02:56:20'),
(16, 6, 'Découverte du Cardio Training', 'En petit groupe pour un suivi personnalisé de chaque participant.', 120, 10, 12, 'PLANIFIE', '2025-06-21 02:56:20', '2025-06-21 02:56:20'),
(17, 4, 'Session de Krav Maga', 'Perfectionnez votre technique avec nos coachs expérimentés.', 120, 10, 3, 'TERMINE', '2025-05-20 02:56:20', '2025-05-20 02:56:20'),
(18, 4, 'Formation en Boxe Anglaise', 'En petit groupe pour un suivi personnalisé de chaque participant.', 60, 15, 4, 'TERMINE', '2025-05-09 02:56:20', '2025-05-09 02:56:20'),
(19, 3, 'Session de Cardio Training', 'Matériel professionnel fourni pour une expérience optimale.', 45, 20, 10, 'PLANIFIE', '2025-06-15 02:56:20', '2025-06-15 02:56:20'),
(20, 7, 'Formation en Gymnastique Douce', 'Méthode innovante basée sur les dernières recherches en sciences du sport.', 90, 10, 2, 'PLANIFIE', '2025-07-30 02:56:20', '2025-07-30 02:56:20'),
(21, 5, 'Session de Athlétisme', 'Session encadrée par des professionnels pour progresser à votre rythme.', 30, 10, 8, 'TERMINE', '2025-05-31 02:56:20', '2025-05-31 02:56:20'),
(22, 5, 'Cours de Athlétisme', 'Perfectionnez votre technique avec nos coachs expérimentés.', 120, 25, 21, 'TERMINE', '2025-05-10 02:56:20', '2025-05-10 02:56:20'),
(23, 6, 'Découverte du CrossFit Intensif', 'Découvrez une nouvelle activité sportive dans une ambiance conviviale.', 45, 30, 1, 'PLANIFIE', '2025-06-21 02:56:20', '2025-06-07 03:00:14'),
(24, 3, 'Cours de Boxe Anglaise', 'Perfectionnez votre technique avec nos coachs expérimentés.', 120, 20, 1, 'PLANIFIE', '2025-08-04 02:56:20', '2025-06-07 02:59:46'),
(25, 6, 'Cours de Krav Maga', 'Programme varié et progressif pour des résultats durables.', 60, 10, 20, 'PLANIFIE', '2025-06-11 02:56:20', '2025-06-11 02:56:20'),
(26, 7, 'Session de Athlétisme', 'Un cours complet pour tous niveaux permettant d\'améliorer votre condition physique.', 45, 15, 16, 'PLANIFIE', '2025-07-18 02:56:20', '2025-07-18 02:56:20'),
(27, 5, 'Session de Zumba Fitness', 'Cours intensif conçu pour vous faire atteindre vos objectifs rapidement.', 120, 15, 20, 'PLANIFIE', '2025-08-01 02:56:20', '2025-08-01 02:56:20'),
(28, 5, 'Atelier de Natation Perfectionnement', 'Découvrez une nouvelle activité sportive dans une ambiance conviviale.', 60, 30, 20, 'PLANIFIE', '2025-07-13 02:56:20', '2025-07-13 02:56:20'),
(29, 4, 'Session de CrossFit Intensif', 'En petit groupe pour un suivi personnalisé de chaque participant.', 45, 20, 7, 'PLANIFIE', '2025-07-16 02:56:20', '2025-07-16 02:56:20'),
(30, 4, 'Formation en Cyclisme Indoor', 'Programme varié et progressif pour des résultats durables.', 30, 10, 20, 'PLANIFIE', '2025-08-04 02:56:20', '2025-08-04 02:56:20'),
(31, 7, 'Formation en Athlétisme', 'Perfectionnez votre technique avec nos coachs expérimentés.', 120, 30, 14, 'PLANIFIE', '2025-07-01 02:56:20', '2025-07-01 02:56:20'),
(32, 3, 'Cours de Krav Maga', 'Méthode innovante basée sur les dernières recherches en sciences du sport.', 90, 15, 12, 'PLANIFIE', '2025-06-27 02:56:20', '2025-06-27 02:56:20'),
(33, 3, 'Découverte du Pilates Réformeur', 'Matériel professionnel fourni pour une expérience optimale.', 90, 15, 18, 'PLANIFIE', '2025-06-22 02:56:20', '2025-06-22 02:56:20'),
(34, 6, 'Découverte du Cyclisme Indoor', 'Un cours complet pour tous niveaux permettant d\'améliorer votre condition physique.', 60, 30, 16, 'PLANIFIE', '2025-08-02 02:56:20', '2025-08-02 02:56:20'),
(35, 4, 'Formation en Krav Maga', 'Approche pédagogique adaptée à chaque participant.', 45, 15, 1, 'PLANIFIE', '2025-06-08 02:56:20', '2025-06-08 02:56:20'),
(36, 5, 'Cours de Natation Perfectionnement', 'Découvrez une nouvelle activité sportive dans une ambiance conviviale.', 45, 25, 1, 'PLANIFIE', '2025-07-25 02:56:20', '2025-06-07 03:00:01'),
(37, 4, 'Atelier de Boxe Anglaise', 'Session encadrée par des professionnels pour progresser à votre rythme.', 90, 20, 1, 'PLANIFIE', '2025-07-22 02:56:20', '2025-07-22 02:56:20'),
(38, 5, 'Formation en Pilates Réformeur', 'Matériel professionnel fourni pour une expérience optimale.', 30, 10, 17, 'PLANIFIE', '2025-08-01 02:56:20', '2025-08-01 02:56:20'),
(39, 4, 'Formation en Pilates Réformeur', 'Un cours complet pour tous niveaux permettant d\'améliorer votre condition physique.', 90, 10, 9, 'TERMINE', '2025-05-26 02:56:20', '2025-05-26 02:56:20'),
(40, 6, 'Atelier de Yoga Dynamique', 'Un cours complet pour tous niveaux permettant d\'améliorer votre condition physique.', 60, 10, 12, 'PLANIFIE', '2025-06-28 02:56:20', '2025-06-28 02:56:20'),
(41, 6, 'Formation en Cardio Training', 'Approche pédagogique adaptée à chaque participant.', 60, 20, 13, 'PLANIFIE', '2025-07-01 02:56:20', '2025-07-01 02:56:20'),
(42, 3, 'Session de Méditation Guidée', 'Méthode innovante basée sur les dernières recherches en sciences du sport.', 90, 30, 14, 'ANNULE', '2025-06-07 02:56:20', '2025-06-07 02:56:20'),
(43, 3, 'Atelier de Pilates Réformeur', 'Matériel professionnel fourni pour une expérience optimale.', 90, 15, 15, 'PLANIFIE', '2025-07-27 02:56:20', '2025-07-27 02:56:20'),
(44, 5, 'Cours de Gymnastique Douce', 'Découvrez une nouvelle activité sportive dans une ambiance conviviale.', 60, 20, 14, 'TERMINE', '2025-05-27 02:56:20', '2025-05-27 02:56:20'),
(45, 6, 'Formation en Yoga Dynamique', 'En petit groupe pour un suivi personnalisé de chaque participant.', 45, 20, 6, 'PLANIFIE', '2025-07-22 02:56:20', '2025-07-22 02:56:20'),
(46, 3, 'Session de Boxe Anglaise', 'Matériel professionnel fourni pour une expérience optimale.', 30, 25, 24, 'PLANIFIE', '2025-06-24 02:56:20', '2025-06-24 02:56:20'),
(47, 7, 'Découverte du Boxe Anglaise', 'Matériel professionnel fourni pour une expérience optimale.', 45, 10, 20, 'PLANIFIE', '2025-07-20 02:56:20', '2025-07-20 02:56:20'),
(48, 7, 'Session de Danse Contemporaine', 'Matériel professionnel fourni pour une expérience optimale.', 45, 10, 18, 'TERMINE', '2025-05-23 02:56:20', '2025-05-23 02:56:20'),
(49, 5, 'Session de Natation Perfectionnement', 'Matériel professionnel fourni pour une expérience optimale.', 60, 15, 12, 'PLANIFIE', '2025-07-30 02:56:20', '2025-07-30 02:56:20'),
(50, 6, 'Découverte du Pilates Réformeur', 'Un cours complet pour tous niveaux permettant d\'améliorer votre condition physique.', 120, 20, 2, 'TERMINE', '2025-05-29 02:56:20', '2025-05-29 02:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `cour_member`
--

CREATE TABLE `cour_member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cour_id` bigint(20) UNSIGNED NOT NULL,
  `membre_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `name`, `description`, `price`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 'Just the essentials.', 199.00, 2, '2025-05-08 23:00:59', '2025-06-03 19:57:51'),
(2, 'Standard', 'Best for most people.', 549.00, 3, '2025-05-08 23:00:59', '2025-05-08 23:00:59'),
(3, 'Premium', 'All access + perks.', 1009.00, 6, '2025-05-08 23:00:59', '2025-05-08 23:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `abonnement_actif` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` bigint(20) UNSIGNED DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id`, `nom_complet`, `email`, `mot_de_passe`, `abonnement_actif`, `email_verified_at`, `user_id`, `membership_id`, `expiration_date`, `remember_token`, `created_at`, `updated_at`) VALUES
(44, 'khaoula bhaou', 'mihawkbieber@gmail.com', '$2y$12$yyKaaSt6E09sTBCA2xcw5e31y3lGf0cMaHNH81G2HIYxxQUEoTS.q', 1, NULL, 2, 1, '2025-08-10', NULL, '2025-06-09 23:26:50', '2025-06-09 23:26:50'),
(47, 'khaoula', 'khaoulabhaou@gmail.com', '$2y$12$9P6ZyNNVngACpFIelcQ6/upuIxaQgX81Dt80//GQoDJNmf7xpUNoO', 1, NULL, 1, 1, '2025-08-10', NULL, '2025-06-10 01:41:46', '2025-06-10 01:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(7, '0001_01_01_000006_create_reservations_table', 1),
(11, '0001_01_01_000009_create_memberships_table_with_duration', 2),
(15, '0001_01_01_000007_create_paiements_table', 4),
(18, '0001_01_01_000005_create_membres_table', 5),
(19, '0001_01_01_000010_create_cancelled_memberships_table', 6),
(23, '0001_01_01_000000_create_users_table', 8),
(28, '0001_01_01_000004_create_cours_table', 9),
(31, '0001_01_01_000014_add_category_id_to_cours_table', 11),
(34, '0001_01_01_000011_create_contact_messages_table', 13),
(37, '0001_01_01_000013_create_categories_table', 14),
(38, '0001_01_01_000008_create_plannings_table', 15),
(40, '0001_01_01_000003_create_coaches_table', 16),
(41, '2025_06_06_025508_member_coache', 17),
(42, '2025_06_06_032132_add_user_id_to_coaches_table', 18),
(43, '0001_01_01_000012_create_admins_table', 19),
(44, '2025_06_07_145349_create_cour_member_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `paiements`
--

CREATE TABLE `paiements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `membre_id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `montant` decimal(8,2) NOT NULL,
  `methode` enum('cash','card') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paiements`
--

INSERT INTO `paiements` (`id`, `membre_id`, `membership_id`, `date`, `montant`, `methode`, `created_at`, `updated_at`) VALUES
(70, 21, 1, '2025-06-07 04:33:42', 199.00, 'cash', '2025-06-07 02:33:42', '2025-06-07 02:33:42'),
(71, 41, 3, '2025-06-07 17:08:13', 1009.00, 'cash', '2025-06-07 15:08:13', '2025-06-07 15:08:13'),
(74, 44, 1, '2025-06-10 01:26:50', 199.00, 'cash', '2025-06-09 23:26:50', '2025-06-09 23:26:50'),
(77, 47, 1, '2025-06-10 03:41:46', 199.00, 'cash', '2025-06-10 01:41:46', '2025-06-10 01:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('khaoulabhaou@gmail.com', '$2y$12$XT7nQSIuHanhwmnstkmARuciCrPve6fODddKlg0wvarMrLArO5i2G', '2025-06-10 00:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `plannings`
--

CREATE TABLE `plannings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jour` varchar(255) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `cour_id` bigint(20) UNSIGNED NOT NULL,
  `coache_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plannings`
--

INSERT INTO `plannings` (`id`, `jour`, `heure_debut`, `heure_fin`, `cour_id`, `coache_id`, `created_at`, `updated_at`) VALUES
(1, 'Mardi', '02:05:00', '02:07:00', 12, 1, '2025-06-05 00:06:40', '2025-06-05 00:06:40'),
(3, 'Vendredi', '14:00:00', '15:00:00', 2, 1, '2025-06-07 02:27:38', '2025-06-08 17:57:13'),
(4, 'Lundi', '13:30:00', '14:00:00', 3, 1, '2025-06-07 03:02:45', '2025-06-07 03:02:45'),
(5, 'Mardi', '15:30:00', '16:00:00', 11, 1, '2025-06-07 03:03:03', '2025-06-07 03:03:03'),
(6, 'Jeudi', '14:20:00', '14:50:00', 28, 1, '2025-06-07 03:03:24', '2025-06-07 03:03:24'),
(7, 'Mercredi', '12:00:00', '13:00:00', 1, 10, '2025-06-08 16:00:33', '2025-06-08 16:00:33'),
(8, 'Vendredi', '15:30:00', '16:45:00', 4, 21, '2025-06-08 16:01:34', '2025-06-08 16:01:34'),
(9, 'Mercredi', '18:00:00', '19:30:00', 41, 4, '2025-06-08 16:02:28', '2025-06-08 16:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('b5Vh5LgX3QD064Plxd33vo2BRrdNGxuQfBQ1ETCW', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOExKakpRVzUzV2RqaklPcjl4M0ZROGExbDBLcUFCaU5reE1CSjlXMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvZmlsZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1749526475),
('eVtPvpgHQtSfCC785QpzBFl4WpQBFh3SP7d7fWgx', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36 OPR/123.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQWpiZE9FZ3dHNG9BaDBDRzM4MXkyeU1iN3lMVWlhUFZDbVRWWDJPZSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1763429162),
('fDFyeesO6lEe2jPFeujzgJODR7KuN8MjAb00Q8Wi', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 OPR/124.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTTZ3RFFZMzhtNFd1azRFZ3VVYlRMckFlWUY0aW4wb0xlTTQ1djEyZCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvP3ZlcmlmaWVkPTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1764552787),
('hQ0GyVm6bYdcsH6bfSOJaVCsThO4HzrDd3S7xI0V', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36 OPR/123.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYkh4QzZuWFVLRzd4ZWhDVEY1eEk3QWJQRks5MUVmaXpjWkdEUWp5aiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1763428568),
('In9GTN6KpeXq87HdiUQLTJ005xzM33SnDRHPyO3O', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 OPR/124.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTmNyWVh3emdnRTl2MHFaMkFuUHFTUnRUNU0zTEgzSDlrUEh4MHdzZSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1764553561),
('xoATOFAQZsp5ZzMw7ddjK6ArVd0z4gfl7REnbOm2', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia3FpSFMwa2RMUkdPM1p1c2ZuMjNuQ0JGVGNHUGQ3OUxUUHpEVFdSSyI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1749546511),
('XYQ48qgWZelYyASMxAbivVJdZqoai8ahTAsGRfwA', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 OPR/124.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibTNCNmdkZnFQY05SRkFrelpMeFY0Q3VkSWlJY2ZROUhybGdDcFhQRyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1764594184);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pfp` varchar(255) DEFAULT NULL,
  `goal` varchar(255) DEFAULT NULL,
  `role` enum('admin','user','coach') DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `dob`, `gender`, `address`, `pfp`, `goal`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'bhaou Khaoula', 'khaoulabhaou@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-01 00:33:06', '$2y$12$/vspYNRn4EskIYBJeI4NkuuQnkaRNmlXllTNRiaJqbb8zqsFPFjB6', NULL, '2025-12-01 00:32:27', '2025-12-01 00:33:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cancelled_memberships`
--
ALTER TABLE `cancelled_memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cancelled_memberships_user_id_foreign` (`user_id`),
  ADD KEY `cancelled_memberships_membership_id_foreign` (`membership_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coaches_email_unique` (`email`),
  ADD KEY `coaches_categorie_foreign` (`categorie`),
  ADD KEY `coaches_user_id_foreign` (`user_id`);

--
-- Indexes for table `coache_member`
--
ALTER TABLE `coache_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coache_member_coache_id_foreign` (`coache_id`),
  ADD KEY `coache_member_membres_id_foreign` (`membres_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cours_coach_id_foreign` (`coach_id`),
  ADD KEY `cours_category_id_foreign` (`category_id`);

--
-- Indexes for table `cour_member`
--
ALTER TABLE `cour_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cour_member_cour_id_foreign` (`cour_id`),
  ADD KEY `cour_member_membre_id_foreign` (`membre_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `membres_email_unique` (`email`),
  ADD KEY `membres_user_id_foreign` (`user_id`),
  ADD KEY `membres_membership_id_foreign` (`membership_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paiements_membre_id_foreign` (`membre_id`),
  ADD KEY `paiements_membership_id_foreign` (`membership_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `plannings`
--
ALTER TABLE `plannings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plannings_cour_id_foreign` (`cour_id`),
  ADD KEY `plannings_coache_id_foreign` (`coache_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cancelled_memberships`
--
ALTER TABLE `cancelled_memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `coache_member`
--
ALTER TABLE `coache_member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `cour_member`
--
ALTER TABLE `cour_member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `plannings`
--
ALTER TABLE `plannings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cancelled_memberships`
--
ALTER TABLE `cancelled_memberships`
  ADD CONSTRAINT `cancelled_memberships_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cancelled_memberships_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coaches`
--
ALTER TABLE `coaches`
  ADD CONSTRAINT `coaches_categorie_foreign` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coaches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coache_member`
--
ALTER TABLE `coache_member`
  ADD CONSTRAINT `coache_member_coache_id_foreign` FOREIGN KEY (`coache_id`) REFERENCES `coaches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coache_member_membres_id_foreign` FOREIGN KEY (`membres_id`) REFERENCES `membres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD CONSTRAINT `contact_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `cours_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`id`);

--
-- Constraints for table `cour_member`
--
ALTER TABLE `cour_member`
  ADD CONSTRAINT `cour_member_cour_id_foreign` FOREIGN KEY (`cour_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cour_member_membre_id_foreign` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `membres_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `membres_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `paiements_membre_id_foreign` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plannings`
--
ALTER TABLE `plannings`
  ADD CONSTRAINT `plannings_coache_id_foreign` FOREIGN KEY (`coache_id`) REFERENCES `coaches` (`id`),
  ADD CONSTRAINT `plannings_cour_id_foreign` FOREIGN KEY (`cour_id`) REFERENCES `cours` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

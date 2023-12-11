-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2023 at 07:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diary_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `activePrescriptions`
--

CREATE TABLE `activePrescriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prescName` text NOT NULL,
  `expiryDate` date NOT NULL,
  `numPills` int(11) NOT NULL,
  `expired` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activePrescriptions`
--

INSERT INTO `activePrescriptions` (`id`, `user_id`, `prescName`, `expiryDate`, `numPills`, `expired`) VALUES
(52, 15, 'Cipralex', '2023-11-26', 23, 1),
(53, 15, 'Zoloft', '2025-11-10', 70, 0),
(62, 15, 'Prozac', '2023-12-30', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `intakeLog`
--

CREATE TABLE `intakeLog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `presc_id` int(11) NOT NULL,
  `presc_name` text NOT NULL,
  `pillsTaken` int(11) NOT NULL,
  `dateTaken` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intakeLog`
--

INSERT INTO `intakeLog` (`id`, `user_id`, `presc_id`, `presc_name`, `pillsTaken`, `dateTaken`) VALUES
(85, 15, 53, 'Zoloft', 1, '2023-11-26'),
(86, 15, 52, 'Cipralex', 2, '2023-11-27'),
(87, 15, 51, 'Prozac', 1, '2023-11-28'),
(88, 15, 53, 'Zoloft', 2, '2023-12-01'),
(95, 15, 53, 'Zoloft', 2, '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `journalEntries`
--

CREATE TABLE `journalEntries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `entryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journalEntries`
--

INSERT INTO `journalEntries` (`id`, `user_id`, `title`, `content`, `entryDate`) VALUES
(35, 15, 'A Day of Reflection in Nature', 'Under the morning sun\'s golden brushstroke, I ventured into nature, craving solace. The air, crisp and invigorating, hinted at the untouched wilderness ahead. Amid towering trees, I surrendered to nature\'s embrace.\r\n\r\nThe day unfolded like a tranquil symphony, hidden trails revealing a dance of sunlight through leaves and a soothing rustle underfoot. Nature became my silent companion, a confidant to my reflections. The babbling brook and distant bird calls added a melodic backdrop, while ancient trees grounded me in their timeless wisdom.\r\n\r\nIn a sunlit clearing, vibrant wildflowers painted a tapestry of beauty. With journal in hand, I recorded the day\'s essence, each pen stroke an offering to the natural world, acknowledging our profound connection.\r\n\r\nAs the sun dipped below the horizon, casting a warm glow, gratitude filled me for the serenity bestowed. The day\'s symphony concluded with a breathtaking starlit display, mirroring the vastness of my introspective journey.\r\n\r\nIn nature\'s embrace, I found a sanctuary for reflection, a canvas blending emotions and thoughts seamlessly. This day transcended escape, becoming a transformative experience, a reminder of the profound beauty in stillness and connection with the natural world. Each rustle, sunbeam, and celestial display whispered the universe\'s wisdom, harmonizing the external world with the quiet depths within.', '2023-11-28'),
(36, 15, 'A Bad Day at Work', 'Today at work felt like a stormy sea, waves of challenges crashing against the hull of my efforts. Tight deadlines, unexpected hurdles, and a relentless workload created a tempest of stress. As I navigate this professional turbulence, I remind myself that even rough waters eventually lead to calmer shores.', '2023-12-06'),
(37, 15, 'Brewing Connections: A Coffee Shop Encounter', 'Today\'s blend of serendipity and caffeine brought a delightful surprise. While lost in the comforting aroma of my latte, I struck up a conversation with a fellow coffee enthusiast. A simple exchange of smiles evolved into shared laughter and stories. In this cozy corner of a bustling coffee shop, I discovered a new friend, turning an ordinary day into a beautifully unexpected chapter of connection.', '2023-12-08'),
(40, 15, 'Facing the Spotlight: Presentation Day at Work', 'The looming presentation at work has my nerves doing a dance of their own. The weight of expectations, the fear of stumbling over words, and the anticipation of all eyes on me create a cocktail of anxiety. As I flip through my slides, my mind rehearses every possible scenario, from smooth delivery to awkward stumbles.\r\n\r\nThe familiar knot in my stomach tightens as the presentation hour approaches. Thoughts of judgment and self-doubt linger, threatening to overshadow the knowledge I\'ve prepared to share. The imposter syndrome rears its head, questioning my competence and qualifications.\r\n\r\nIn an attempt to regain control, I remind myself of the preparation invested, the expertise I bring to the table. I take a deep breath, acknowledging that nervousness is a side effect of caring, of pushing boundaries. It\'s a sign that I\'m invested in delivering a message that matters.\r\n\r\nAs I stand before my audience, I feel the weight of anxiety but also the potential for growth. The first few minutes are shaky, but as I find my rhythm, the fear begins to dissipate. Surprisingly, engaging with my audience becomes a source of comfort rather than intimidation.\r\n\r\nBy the end, I realize that the anxiety was a temporary storm, and I weathered it. The applause and positive feedback replace the earlier doubts, a reminder that stepping outside my comfort zone, though nerve-wracking, is a catalyst for personal and professional development. As I reflect in my journal, I find solace in the fact that every presentation, no matter how anxiety-inducing, is an opportunity to learn, improve, and ultimately grow.', '2023-12-09'),
(43, 15, 'Concert Chronicles: A Night of Music and Friendship', 'The christmas concert night unfolded into a symphony of shared moments and vibrant melodies. Surrounded by friends, the pulsating energy of the music became a binding force, weaving us into the fabric of an unforgettable experience. Beyond the beats and rhythms, it was a night of laughter, connection, and the kind of shared joy that lingers in memory. As the final notes faded, we walked out into the night, carrying not just the echoes of the music but the warmth of friendship that made the night truly extraordinary.', '2023-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(15, 'Jasons Leerette', 'jl@nyu.edu', '$2y$10$Bk6aOLTxATQyosV1Ivf4G.4lL6AsRIUo.XXYuYPg330AqBxhLY08W'),
(16, 'Leeya Howley', 'rlh9398@nyu.edu', '$2y$10$jcNtiCHQVvuMEd8UqT5JU.uPe9nfFHtT.H96fYqwuZn1327/PdOlC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activePrescriptions`
--
ALTER TABLE `activePrescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intakeLog`
--
ALTER TABLE `intakeLog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journalEntries`
--
ALTER TABLE `journalEntries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activePrescriptions`
--
ALTER TABLE `activePrescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `intakeLog`
--
ALTER TABLE `intakeLog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `journalEntries`
--
ALTER TABLE `journalEntries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

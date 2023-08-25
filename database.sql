SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `funny_or_not`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `position`) VALUES
(1, 'Animal', 1),
(2, 'Bad puns', 2),
(3, 'Christmas', 3),
(4, 'Dark humour', 4),
(5, 'Love', 5),
(6, 'Police', 6),
(7, 'Political', 7),
(8, 'Science', 8),
(9, 'School', 9);

-- --------------------------------------------------------

--
-- Table structure for table `jokes`
--

CREATE TABLE `jokes` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `c_id` int(11) NOT NULL,
  `yes` int(11) NOT NULL DEFAULT '0',
  `no` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL,
  `date` date NOT NULL,
  `views` int(11) NOT NULL,
  `featured` enum('0','1') NOT NULL DEFAULT '0',
  `approved` enum('0','1','2') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jokes`
--

INSERT INTO `jokes` (`id`, `content`, `c_id`, `yes`, `no`, `uid`, `date`, `views`, `featured`, `approved`) VALUES
(1, 'Q: If love is \"grand,\" what is divorce?<br>\r\nA: A hundred grand, or more.', 2, 20, 2, 1, '2018-02-01', 0, '0', '0'),
(2, 'Q: Whats the difference between love and marriage?<br>\r\nA: Love is blind and marriage is an eye-opener!', 2, 8, 5, 1, '2018-02-01', 2, '0', '0'),
(3, 'My son wanted to know what it\'s like to be married. I told him to leave me alone and when he did, I asked him why he was ignoring me.', 0, 11, 7, 1, '2018-02-01', 0, '0', '0'),
(4, 'My boyfriend told me to stop acting like a flamingo. So I had to put my foot down.', 0, 30, 7, 1, '2018-02-01', 0, '0', '0'),
(5, 'People always tell me I\'m condescending.<br>\r\n(That means talking down to people.)', 0, 11, 3, 1, '2018-02-01', 0, '0', '0'),
(6, 'Q. What do you call a round, green vegetable that breaks out of prison?<br>\r\nA. An escapea.', 0, 0, 0, 1, '2018-02-01', 0, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `birthdate`) VALUES
(1, 'admin', 'admin@funnyornot.com', '$2y$10$LcsNdooRAChDEncgSvYwwOM3IvtuFbDe9iKBMs4VDC0oiN8puplc.', '1996-03-27'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jokes`
--
ALTER TABLE `jokes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jokes`
--
ALTER TABLE `jokes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

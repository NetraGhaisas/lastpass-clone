-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 01:28 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lastpass`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `r_login_id` int(11) NOT NULL,
  `r_email` varchar(100) NOT NULL,
  `r_password` varchar(500) NOT NULL,
  `enc_vault` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`r_login_id`, `r_email`, `r_password`, `enc_vault`) VALUES
(7, 'netra@netra.com', '$2y$10$5UC.CRbgsinqGrrA6PQPFuTHO8k.Q87dj0IuvXenj3rbh7gMrp4xu', 0x7b226976223a2264765165686f4936524b4836467a566e5550374f49513d3d222c2276223a2231222c2269746572223a31303030302c226b73223a3132382c227473223a36342c226d6f6465223a2263636d222c226164617461223a22222c22636970686572223a22616573222c2273616c74223a22536243365951743371546b3d222c226374223a22595a584c644f674d3376645849773d3d227d),
(9, 'qwerty@qwerty.com', '$2y$10$49QHZ462.kjc65Tx2yZyCOt43gP33orrlyu/Vy8YvmXC3OKbCf3WK', 0x7b226976223a22547a302f384255336a4b466454623263362f746563673d3d222c2276223a2231222c2269746572223a31303030302c226b73223a3132382c227473223a36342c226d6f6465223a2263636d222c226164617461223a22222c22636970686572223a22616573222c2273616c74223a22726e42434644397a69426b3d222c226374223a2242767a625850797a3154654849343837723333346f394b4b5757362f2f46464d61586363683643416169393870647943416c64307657484b4d764f59756d736f363237614733612b3334336d4f3650454646584b32335948772f4b43392f6f36536c443030625172716c38737730434230454771736550374c42367a5162626e455743314165496b4f6b6963694c594c5036396f4f673d3d227d),
(13, 'netra.g@somaiya.edu', '$2y$10$IlqUdCyuiNghnq4tJndkKu5tsOVMhMcKvnE.GiZuXIfqc7esOIEy2', 0x7b226976223a2279717137544a5658413450316354512f3765467a68673d3d222c2276223a2231222c2269746572223a31303030302c226b73223a3132382c227473223a36342c226d6f6465223a2263636d222c226164617461223a22222c22636970686572223a22616573222c2273616c74223a22617546386a46435a77786f3d222c226374223a224f2f6c6152682b393176536c79787035632b4a61676c304e686870533646627376506c464147726d31786f47676e5a4a5072434e687879304e52595637644f61486361475670726355424c51636f544f74577a673150642f58414c3645754c41507a4735466b5a44652f564372314f32786e652f6b4f734c53674f30306c44557a5a4d706e38597736364c61523576636d614b3677527a73356f33507642514576787945614a574c7464467777513d3d227d);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`r_login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

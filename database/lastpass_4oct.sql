-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2020 at 08:06 PM
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
(6, 'test@test.com', '$2y$10$ssh/8eRpSg554Z4.QkNPyuhUcTMcJPhDVcXl0iTZdmoX1fhv0XogK', 0x7b226976223a22514d47476965424c394a2f494f4531643266456979413d3d222c2276223a2231222c2269746572223a31303030302c226b73223a3132382c227473223a36342c226d6f6465223a2263636d222c226164617461223a22222c22636970686572223a22616573222c2273616c74223a22393369455a68503447796f3d222c226374223a22796342446a312f7a502b593258513d3d227d),
(7, 'netra@netra.com', '$2y$10$5UC.CRbgsinqGrrA6PQPFuTHO8k.Q87dj0IuvXenj3rbh7gMrp4xu', 0x7b226976223a2264765165686f4936524b4836467a566e5550374f49513d3d222c2276223a2231222c2269746572223a31303030302c226b73223a3132382c227473223a36342c226d6f6465223a2263636d222c226164617461223a22222c22636970686572223a22616573222c2273616c74223a22536243365951743371546b3d222c226374223a22595a584c644f674d3376645849773d3d227d),
(9, 'qwerty@qwerty.com', '$2y$10$49QHZ462.kjc65Tx2yZyCOt43gP33orrlyu/Vy8YvmXC3OKbCf3WK', 0x7b226976223a2246686452554e3246454133776c3278367a4a546544413d3d222c2276223a2231222c2269746572223a31303030302c226b73223a3132382c227473223a36342c226d6f6465223a2263636d222c226164617461223a22222c22636970686572223a22616573222c2273616c74223a22726e42434644397a69426b3d222c226374223a227267374f5259462f756768672f413d3d227d),
(10, 'new@new.com', '$2y$10$L3/nuRoipWIbUgH.XhwyTeQz8JWxhoA1yyGT1Fa3a2MULw455dp2m', 0x7b226976223a22422b73686f552f437244583370435052324a504536673d3d222c2276223a2231222c2269746572223a31303030302c226b73223a3132382c227473223a36342c226d6f6465223a2263636d222c226164617461223a22222c22636970686572223a22616573222c2273616c74223a22704b36314b416b614f74553d222c226374223a2279525a7a4969656a43657134704e6b5775334866466a4d432b473176594b6276793248355044575a6f6e4c6c364b306d772f7a466678674f487374524b6c59496e6675774b6a3367537876544f4e6a6d4a524c4378554d78475156676262743365783871377838676838466347413d3d227d);

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
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
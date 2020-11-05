-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 02 Σεπ 2019 στις 12:37:02
-- Έκδοση διακομιστή: 10.1.32-MariaDB
-- Έκδοση PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `heart_disease_prediction_system`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `doctorids`
--

CREATE TABLE `doctorids` (
  `id` int(11) NOT NULL,
  `doctorId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `doctorids`
--

INSERT INTO `doctorids` (`id`, `doctorId`) VALUES
(1, 'doctorID1'),
(2, 'doctorID2'),
(3, 'doctorID3'),
(4, 'doctorID4'),
(5, 'doctorID5');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `doctors`
--

INSERT INTO `doctors` (`id`, `username`, `email`, `password`, `confirm_password`) VALUES
(1, 'doctor1', 'doctor1@gmail.com', '12345', '12345'),
(2, 'doctor2', 'doctor2@gmail.com', '12345', '12345');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `patientsdata`
--

CREATE TABLE `patientsdata` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `submit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `age` decimal(3,1) NOT NULL,
  `sex` decimal(2,1) NOT NULL,
  `cp` decimal(2,1) NOT NULL,
  `trestbps` decimal(4,1) NOT NULL,
  `chol` decimal(4,1) NOT NULL,
  `fbs` decimal(2,1) NOT NULL,
  `restecg` decimal(2,1) NOT NULL,
  `thalach` decimal(4,1) NOT NULL,
  `exang` decimal(2,1) NOT NULL,
  `oldpeak` decimal(2,1) NOT NULL,
  `slope` decimal(2,1) NOT NULL,
  `ca` decimal(2,1) NOT NULL,
  `thal` decimal(2,1) NOT NULL,
  `result` text NOT NULL,
  `min_rest` decimal(4,1) NOT NULL,
  `max_rest` decimal(4,1) NOT NULL,
  `min_cholesterol` decimal(4,1) NOT NULL,
  `max_cholesterol` decimal(4,1) NOT NULL,
  `min_heartrate` decimal(4,1) NOT NULL,
  `max_heartrate` decimal(4,1) NOT NULL,
  `min_oldpeak` decimal(2,1) NOT NULL,
  `max_oldpeak` decimal(2,1) NOT NULL,
  `min_vessels` decimal(2,1) NOT NULL,
  `max_vessels` decimal(2,1) NOT NULL,
  `min_thal` decimal(2,1) NOT NULL,
  `max_thal` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `patientsdata`
--

INSERT INTO `patientsdata` (`id`, `username`, `doctor`, `submit_date`, `age`, `sex`, `cp`, `trestbps`, `chol`, `fbs`, `restecg`, `thalach`, `exang`, `oldpeak`, `slope`, `ca`, `thal`, `result`, `min_rest`, `max_rest`, `min_cholesterol`, `max_cholesterol`, `min_heartrate`, `max_heartrate`, `min_oldpeak`, `max_oldpeak`, `min_vessels`, `max_vessels`, `min_thal`, `max_thal`) VALUES
(1, 'user2', 'doctor1', '2019-07-07 02:24:00', '67.0', '1.0', '3.0', '120.0', '229.0', '1.0', '2.0', '129.0', '1.0', '2.6', '3.0', '2.0', '7.0', 'Prediction value: 1\nThe patient has the probability to appear heart disease\n', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0'),
(7, 'user1', 'doctor1', '2019-07-12 21:00:00', '67.0', '1.0', '3.0', '120.0', '229.0', '1.0', '1.0', '129.0', '1.0', '2.6', '3.0', '2.0', '7.0', 'Prediction value: 1\nThe patient has the probability to appear heart disease\n', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0'),
(14, 'user2', 'doctor1', '2019-08-07 18:16:32', '75.0', '0.0', '3.0', '130.0', '230.0', '1.0', '1.0', '119.0', '0.0', '2.3', '2.0', '3.0', '7.0', 'Prediction value: 1\nThe patient has the probability to appear heart disease\n', '86.0', '156.0', '80.0', '154.0', '100.0', '150.0', '2.0', '3.0', '1.0', '3.0', '3.0', '7.0'),
(16, 'user1', 'doctor1', '2019-08-15 16:46:28', '82.0', '1.0', '2.0', '165.0', '238.0', '1.0', '0.0', '180.0', '1.0', '2.6', '2.0', '2.0', '7.0', 'Prediction value: 1\nThe patient has the probability to appear heart disease\n', '80.0', '150.0', '80.0', '154.0', '100.0', '150.0', '2.0', '2.5', '1.0', '3.0', '3.0', '7.0'),
(18, 'user1', 'doctor1', '2019-08-27 07:43:56', '89.0', '1.0', '2.0', '170.0', '247.0', '1.0', '2.0', '70.0', '0.0', '2.2', '1.0', '2.0', '7.0', 'Prediction value: 1\nThe patient has the probability to appear heart disease\n', '80.0', '150.0', '80.0', '150.0', '80.0', '150.0', '2.5', '3.0', '2.0', '3.0', '3.0', '7.0');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `subscribe`
--

INSERT INTO `subscribe` (`id`, `username`, `email`) VALUES
(3, 'user1', 'user1@gmail.com');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirm_password`) VALUES
(2, 'user1', 'user1@gmail.com', '123', '123'),
(3, 'user2', 'user2@gmail.com', '123', '123'),
(5, 'user4', 'user4@gmail.com', '123', '123');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `doctorids`
--
ALTER TABLE `doctorids`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `patientsdata`
--
ALTER TABLE `patientsdata`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `doctorids`
--
ALTER TABLE `doctorids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT για πίνακα `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT για πίνακα `patientsdata`
--
ALTER TABLE `patientsdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT για πίνακα `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

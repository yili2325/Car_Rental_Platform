SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `rent_start_date` date NOT NULL,
  `rent_end_date` date NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `car_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `orders` (`id`, `user_email`, `rent_start_date`, `rent_end_date`, `price`, `status`, `quantity`, `car_id`) VALUES
(1, 'liyi1997119@163.com', '2024-05-14', '2024-05-15', 150, 'unconfirmed', 0, 0),
(2, 'liyi1997119@163.com', '2024-05-14', '2024-05-15', 150, 'unconfirmed', 0, 0),
(3, 'liyi1997119@gmail.com', '2024-05-22', '2024-05-23', 150, 'unconfirmed', 1, 0),
(4, 'liyi1997119@gmail.com', '2024-05-22', '2024-05-23', 0, 'unconfirmed', 1, 2),
(5, 'liyi1997119@gmail.com', '2024-05-23', '2024-05-25', 560, 'confirmed', 2, 5),
(6, 'liyi1997119@gmail.com', '2024-05-23', '2024-05-25', 560, 'confirmed', 2, 5),
(7, 'liyi1997119@gmail.com', '2024-05-23', '2024-05-25', 560, 'confirmed', 2, 5),
(8, 'liyi1997119@gmail.com', '2024-05-23', '2024-05-25', 560, 'confirmed', 2, 5),
(9, 'user12@user12.com', '2024-05-09', '2024-05-10', 200, 'confirmed', 2, 4),
(10, 'admin@admin.com', '2024-05-10', '2024-05-11', 220, 'confirmed', 1, 30),
(11, 'yili6376@uni.sydney.edu.au', '2024-05-03', '2024-05-10', 980, 'confirmed', 1, 18),
(12, 'yili6376@uni.sydney.edu.au', '2024-05-03', '2024-05-05', 320, 'confirmed', 1, 11);


ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

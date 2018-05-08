CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `dob` date NOT NULL
)

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `password`, `gender`, `dob`) VALUES
('', '$firstname', '$username', '$username', '$password', '$gender', '$dob'),

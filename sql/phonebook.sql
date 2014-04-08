-- Host: localhost
-- Author: Masande
-- Generation Time: Apr 08, 2014 at 02:28 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8


--
-- Table structure for table `phone_book`
--

CREATE TABLE IF NOT EXISTS `phone_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cell_no` varchar(13) NOT NULL,
  `tel_no` varchar(13) NOT NULL,
  `boxes` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `phone_book`
--

INSERT INTO `phone_book` (`id`, `first_name`, `last_name`, `email`, `cell_no`, `tel_no`, `boxes`) VALUES
(1, 'Elethu', 'Nomandela', 'elethu@test.com', '0732202059', '0214548547', ''),
(2, 'Elethu', 'Nomandela', 'elethu@test.com', '0732202059', '0214548547', ''),
(4, 'Masande', 'Mbondwana', 'mmbondwana@test.com', '0781790122', '', '');

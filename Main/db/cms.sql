-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 11:01 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'PHP'),
(7, 'Java'),
(8, 'C'),
(12, 'Data Sructures'),
(13, 'Advance Java'),
(14, 'C++'),
(15, 'Javascript');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(13, 2, 'Dhano', 'dh', 'djasnddddddd', 'approved', '2017-12-28'),
(14, 8, 'myself', 'niks@g.c', 'Check Admin And SUbscriber Page', 'unapproved', '2017-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(2, 15, 'Java Programming', 3, '2017-12-27', '38baced3f530943ec4ce5ddace211efd510baecbce7e003061d59a0742a3048b.jpg', '     Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam.', 'java, javafx, dhananjay', 1, 'published'),
(7, 7, 'Random Title', 3, '2017-12-27', '06b2fa29674df4c6be42addde58185adbe80330c26ce561c22e7b7fb571a1ded.jpg', '  consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit. Nihil fuga voluptas, velit rem, laboriosam asperiores pariatur impedit magnam possimus distinctio libero saepe delectus commodi eius ad, beatae. Provident, rerum, aliquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'dhananjay, java, title', 0, 'draft'),
(8, 2, 'Random 1', 1, '2017-12-28', '66160a854c059ea9c7f71dc44aa6021bc23d5a07c41947a8d60f8a6c7693b76e.jpg', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa facilis, aliquid possimus laborum pariatur rerum explicabo quod perferendis iure ratione, fugit iusto a molestias eveniet quas deserunt quibusdam, atque vel.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa facilis, aliquid possimus laborum pariatur rerum explicabo quod perferendis iure ratione, fugit iusto a molestias eveniet quas deserunt quibusdam, atque vel.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa facilis, aliquid possimus laborum pariatur rerum explicabo quod perferendis iure ratione, fugit iusto a molestias eveniet quas deserunt quibusdam, atque vel.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa facilis, aliquid possimus laborum pariatur rerum explicabo quod perferendis iure ratione, fugit iusto a molestias eveniet quas deserunt quibusdam, atque vel.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa facilis, aliquid possimus laborum pariatur rerum explicabo quod perferendis iure ratione, fugit iusto a molestias eveniet quas deserunt quibusdam, atque vel.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa facilis, aliquid possimus laborum pariatur rerum explicabo quod perferendis iure ratione, fugit iusto a molestias eveniet quas deserunt quibusdam, atque vel.', 'random1', 1, 'published'),
(9, 8, 'Lets Try', 2, '2017-12-30', '1bb35cc9abef1b02c2d5bf97a0ac8764f4619ab5d04e83826f8aae32a1aae32b.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem sint accusantium nam dicta veniam, repellat saepe est nobis eveniet amet, omnis. Illo placeat, molestias! Id sequi dolorem quidem, deleniti modi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem sint accusantium nam dicta veniam, repellat saepe est nobis eveniet amet, omnis. Illo placeat, molestias! Id sequi dolorem quidem, deleniti modi.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem sint accusantium nam dicta veniam, repellat saepe est nobis eveniet amet, omnis. Illo placeat, molestias! Id sequi dolorem quidem, deleniti modi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem sint accusantium nam dicta veniam, repellat saepe est nobis eveniet amet, omnis. Illo placeat, molestias! Id sequi dolorem quidem, deleniti modi.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem sint accusantium nam dicta veniam, repellat saepe est nobis eveniet amet, omnis. Illo placeat, molestias! Id sequi dolorem quidem, deleniti modi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem sint accusantium nam dicta veniam, repellat saepe est nobis eveniet amet, omnis. Illo placeat, molestias! Id sequi dolorem quidem, deleniti modi.', 'C, C++, ', 0, 'published'),
(10, 12, 'Check Post', 2, '2018-01-02', '4a1cc7b87ab3b746e7ef939eb9d4c960ad4122c2e5761624f8927661b238ddd4.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus animi adipisci ipsa beatae laudantium saepe voluptatibus eum quis suscipit dolore omnis ullam deserunt, aliquid nulla, quos facilis doloremque dicta, officiis.</p><p><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus animi adipisci ipsa beatae laudantium saepe voluptatibus eum quis suscipit dolore omnis ullam deserunt, aliquid nulla, quos facilis doloremque dicta, officiis.</strong><br><img src="https://i.froala.com/assets/photo6.jpg" data-id="6" data-type="image" data-name="Image 2017-11-21 at 15:11:45.jpg" style="width: 300px;" class="fr-fic fr-dib"><strong><br></strong><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus animi adipisci ipsa beatae laudantium saepe voluptatibus eum quis suscipit dolore omnis ullam deserunt, aliquid nulla, quos facilis doloremque dicta, officiis.</strong><strong><br></strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus animi adipisci ipsa beatae laudantium saepe voluptatibus eum quis suscipit dolore omnis ullam deserunt, aliquid nulla, quos facilis doloremque dicta, officiis.</p>', 'checking, floara', 0, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`) VALUES
(1, 'nikhilshadija2', '$2y$10$MTc91IBkV2tBKXTKV7HxhucSLgGLoRI1NEydYZFcalvzRzdfNuICW', 'Nikhil', 'Shadija', 'nikhils2@gmail.com', 'b02d4c731652f6569e8485a8489fc0335adfb49df70d751b0df267202203cdee.jpg', 'subscriber'),
(2, 'dhan', '$2y$10$zkVmaqRUbvptEsp1mPVqJeW37W4FU730cVxuidxHrPLKspLzBvQv2', 'Dhananjay', 'Ghumare', 'dhano@gmail.com', '60cbaabef4385253fc258dd491fb3d8688d51a417947e838464cb3501605614a.jpg', 'admin'),
(3, 'niks', '$2y$10$xKZ1fEi3gnvUAGAVEwZSze5lhoQfc7r2LqHuGVhvdF3HrWHqVnBZi', 'Niks', 'Shadija', 'nikhilshadija2@gmail.com', '1c49d7e5cd03178f23252658b79d7e40a04346e6f26a140d20e8b354cce4c032.jpg', 'subscriber'),
(4, 'nikhilshadija', '$2y$10$FyxoWPMZMv13hlreKIfpzuBWCxbbChJldcTm0dFPxOCLqBra07Iti', 'nikhil', 'shadija', 'nik@g.c', '29a2344381b1b394b116721a03dc1b2a26cb84241b9cab107e73dd0f415cc3f1.jpg', 'subscriber'),
(5, 'nikshere', '$2y$10$Ta4Dlt5tZp0PlZqOJdm7Ten3QYSfPaBKXRAqrdFYa86npZmrwnB8q', 'Nikhil', 'Shadija', 'nik@m.c', '9ca58248b3cac44fa1c2d09a817ed7ff506ca9e2081f10a788538dd8fa99fc86.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`, `user_id`) VALUES
(12, 'ib319u7nj2p7r8tar3b0rk5df0', '1515147481', 2),
(13, '788a9hj5uocnqm25ola6b39o14', '1515251463', 2),
(14, 'tb82sf8ts7ule1inoc7hipnnj5', '1515568805', 2),
(15, 'hndnbd751bdge379mqbdc40044', '1515666642', 2),
(16, '1dejutv9os1agsbi92e4e22101', '1515669927', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

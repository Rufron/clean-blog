-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 12:12 PM
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
-- Database: `cleanblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `adminname`, `mypassword`, `created_at`) VALUES
(1, 'admin1@gmail.com', 'Admin One', '$2y$10$4/UfocJPZWVydngs61tW8uPeEpdpd.vRn9cBBOYJ5AUTFKBn26IJu', '2025-05-18 12:37:04'),
(2, 'admin2@gmail.com', 'Admin Two', '$2y$10$C7GwoF9X3O7XDqJhvilGTO2ZawQZNMKguv1puFETrXRDKVeNRYUse', '2025-05-19 08:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Tv', '2025-05-15 16:53:29'),
(2, 'sports', '2025-05-15 16:53:29'),
(3, 'Tech', '2025-05-15 16:53:57'),
(4, 'Motorsport', '2025-05-16 09:59:26'),
(5, 'Boxing', '2025-05-19 08:57:03'),
(6, 'Football Laliga', '2025-05-19 10:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(3) NOT NULL,
  `id_post_comment` int(3) NOT NULL,
  `user_name_comment` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_comment` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_post_comment`, `user_name_comment`, `comment`, `created_at`, `status_comment`) VALUES
(2, 30, 'Two Three', 'Very True', '2025-05-20 10:52:32', 0),
(3, 30, 'Two Three', 'Another comment', '2025-05-20 10:55:43', 1),
(4, 7, 'Two Three', 'Web design is sweet.', '2025-05-20 15:05:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `category_id` varchar(20) NOT NULL,
  `img` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `body`, `status`, `category_id`, `img`, `user_id`, `user_name`, `created_at`) VALUES
(7, 'The Power of Simplicity in Web Design', 'Why Less Is Often More for User Experience', 'In today’s fast-paced digital world, users make judgments about websites in a matter of seconds. The simpler and cleaner a web design is, the faster users can understand the purpose and navigate efficiently. Simplicity doesn\'t mean boring — it means intuitive.\r\n\r\nA minimalist approach helps reduce cognitive load, increases readability, and enhances mobile responsiveness. By focusing on essential elements — clear typography, thoughtful spacing, and a consistent color palette — designers create an experience that speaks volumes with less.\r\n\r\nFurthermore, simple designs load faster and are easier to maintain. This benefits not just the user but also the developers and SEO performance. In a world filled with digital noise, clarity is your competitive edge.\r\n\r\nEmbrace simplicity not just as a design aesthetic, but as a core principle for better usability and long-term success.', 1, '3', '【ZORO】 ⁀➷ Wallpaper ✪.jpeg', '4', 'onetwo', '2025-05-14 04:15:42'),
(10, 'Designing for Speed: How Performance Impacts User Retention', 'Optimizing Web Load Times to Improve Engagement and SEO', 'Website speed is no longer just a technical issue—it\'s a user experience imperative. In an era where users expect content in under 3 seconds, performance can make or break the success of your site. Studies show that even a one-second delay in page load time can reduce conversions by 7%.\r\n\r\nFast websites don’t just retain users; they also rank better on search engines. Google includes speed as a ranking factor, making it essential for SEO. Techniques like image optimization, minifying CSS/JS, leveraging browser caching, and using a content delivery network (CDN) all contribute to a faster and more reliable user experience.\r\n\r\nDevelopers must prioritize speed as a foundational design principle. It\'s not only about clean code—it\'s about building trust. Users are more likely to return to websites that respect their time.Website speed is no longer just a technical issue—it\'s a user experience imperative. In an era where users expect content in under 3 seconds, performance can make or break the success of your site. Studies show that even a one-second delay in page load time can reduce conversions by 7%.\r\n\r\nFast websites don’t just retain users; they also rank better on search engines. Google includes speed as a ranking factor, making it essential for SEO. Techniques like image optimization, minifying CSS/JS, leveraging browser caching, and using a content delivery network (CDN) all contribute to a faster and more reliable user experience.\r\n\r\nDevelopers must prioritize speed as a foundational design principle. It\'s not only about clean code—it\'s about building trust. Users are more likely to return to websites that respect their time.Website speed is no longer just a technical issue—it\'s a user experience imperative. In an era where users expect content in under 3 seconds, performance can make or break the success of your site. Studies show that even a one-second delay in page load time can reduce conversions by 7%.\r\n\r\nFast websites don’t just retain users; they also rank better on search engines. Google includes speed as a ranking factor, making it essential for SEO. Techniques like image optimization, minifying CSS/JS, leveraging browser caching, and using a content delivery network (CDN) all contribute to a faster and more reliable user experience.\r\n\r\nDevelopers must prioritize speed as a foundational design principle. It\'s not only about clean code—it\'s about building trust. Users are more likely to return to websites that respect their time.', 1, '3', 'd0d99313-e691-4e1c-b87e-e2670042682d.jpeg', '4', 'onetwo', '2025-05-14 13:32:09'),
(26, 'How to Stay Productive as a Developer 24/7 365', '5 Practical Tips to Keep Your Focus and Energy High', '🚀 Introduction\r\nStaying productive as a developer can be a challenge — especially when distractions, burnout, and long debugging sessions come into play. In this blog, I’ll share five tried-and-true strategies that help me stay sharp and motivated through even the toughest coding days.\r\n\r\n💡 1. Use the Pomodoro Technique\r\nBreak your work into focused 25-minute sessions followed by a 5-minute break. This simple trick helps reduce fatigue and keeps your mind fresh throughout the day.\r\n\r\n📋 2. Plan Your Day the Night Before\r\nSpend 5–10 minutes every evening listing your top 3 tasks for tomorrow. Waking up with a plan reduces decision fatigue and boosts your morning momentum.\r\n\r\n🧘‍♀️ 3. Don’t Skip Breaks\r\nProductivity isn’t about grinding for 10 hours straight. Taking short, intentional breaks gives your brain the rest it needs to perform at a high level.\r\n\r\n🎯 4. Eliminate Digital Clutter\r\nClose unnecessary browser tabs, mute notifications, and use a distraction blocker like Cold Turkey or Freedom during deep work sessions.\r\n\r\n🤝 5. Reflect and Adjust Weekly\r\nEvery week, review what worked and what didn’t. Productivity is personal, and refining your routine over time helps it stick.\r\n\r\n🧠 Final Thoughts\r\nProductivity isn’t about doing more — it’s about doing what matters, efficiently and consistently. Start small, stay intentional, and build habits that support your long-term growth as a developer.', 1, '3', '✶┆One piece.jpeg', '5', 'Two Three', '2025-05-15 11:34:54'),
(27, 'Fuel, Speed, and Glory', ' The Thrill of Motorsports', 'From the deafening roar of engines to the heart-pounding battles for position at 200 mph, motorsports captivate fans around the world like few other forms of competition. It\'s more than just cars and bikes racing in circles—it\'s a high-stakes symphony of engineering, bravery, and strategy where milliseconds can separate legends from the forgotten.\r\n\r\nThe Many Faces of Motorsports\r\nMotorsports is a broad universe encompassing many disciplines. The most well-known include:\r\n\r\nFormula 1 (F1): The pinnacle of open-wheel racing. With ultra-advanced aerodynamics and elite drivers, F1 is known for its global appeal and technical sophistication.\r\n\r\nMotoGP: The top-tier motorcycle racing series. It\'s where fearless riders push the limits of speed, skill, and physics.\r\n\r\nNASCAR: America’s most popular racing series, known for its stock cars, oval tracks, and bumper-to-bumper action.\r\n\r\nRally Racing: A test of endurance and skill on unpredictable terrain, from frozen tundras to desert sands.\r\n\r\nEndurance Racing (e.g., Le Mans, WEC): Events that last for hours—or even 24—where strategy and reliability matter as much as speed.\r\n\r\nWhat Makes Motorsports Unique\r\nUnlike traditional team sports, motorsports combine machine and human in a delicate dance. A great driver can only do so much without a finely tuned car, while the best car is nothing without a capable hand at the wheel. It’s this balance that makes every race unpredictable and every win hard-earned.\r\n\r\nKey aspects that define the sport:\r\n\r\nTechnology: Racing has always driven automotive innovation. Features like ABS brakes, turbocharging, and hybrid engines made their way to consumer cars from the racetrack.\r\n\r\nTactics: Tire choices, pit stop timing, fuel management, and weather forecasting can all make or break a race.\r\n\r\nRisk: The danger is real. Every competitor understands the thin line between glory and disaster, which adds to the drama and respect the sport commands.\r\n\r\nThe Global Appeal\r\nMotorsports are a global phenomenon, drawing millions of fans from every continent. Whether it\'s the Monaco Grand Prix’s glitz, the muddy chaos of a Dakar Rally stage, or the high-octane roar at Daytona, there’s a type of racing for every taste. Countries like Italy, Japan, the UK, Germany, and the U.S. are motorsport powerhouses, both in talent and passion.', 1, '4', 'BMW.jpg', '5', 'Two Three', '2025-05-16 10:40:40'),
(29, 'From Box to Binge', 'The Ever-Evolving World of Television', 'Television has come a long way since its black-and-white beginnings. What once was a bulky box in the living room with limited programming has transformed into a global storytelling powerhouse—streaming 4K content on demand to devices we carry in our pockets. TV isn\'t just a source of entertainment anymore—it\'s a mirror of culture, a driver of conversation, and a window to the world.\r\n\r\nA Brief Journey Through Time\r\nThe television revolution began in the mid-20th century, when families would gather around small screens to watch the evening news or a favorite sitcom. With only a few channels, programming was limited but deeply impactful. Shows like I Love Lucy, The Twilight Zone, and MASH* became cultural landmarks.\r\n\r\nThen came color television, cable networks, and eventually satellite TV, which expanded our options exponentially. Suddenly, we had 24-hour news, dedicated kids\' channels, live sports from across the globe, and niche genres for every interest.\r\n\r\nThe Rise of Streaming: A New Golden Age\r\nThe 2010s marked a shift that changed everything: streaming services. Platforms like Netflix, Hulu, Disney+, and Amazon Prime Video disrupted the traditional TV model. No longer did we have to wait a week for the next episode. The \"binge-watch\" era had arrived.\r\n\r\nStreaming also unleashed a creative boom. Freed from the restrictions of broadcast standards, creators were able to tell more diverse, daring, and complex stories. Shows like Breaking Bad, Stranger Things, The Crown, and Squid Game captured global audiences and turned TV into an art form.\r\n\r\nTV as a Cultural Touchstone\r\nTelevision is one of the most powerful storytelling mediums ever invented. It shapes opinions, reflects social changes, and provides common ground for conversation.\r\n\r\nNews coverage brings the world into our homes in real time.\r\n\r\nDocumentaries educate and inspire change (e.g., Planet Earth, Making a Murderer).\r\n\r\nSitcoms and dramas reflect everyday life and social issues.\r\n\r\nReality TV shows us unscripted slices of humanity—both absurd and authentic.\r\n\r\nFrom politics to fashion to language, TV influences the way we think, talk, and see the world.\r\n\r\nThe Future of Television\r\nWith the rise of AI-generated content, interactive shows, and virtual/augmented reality, television continues to reinvent itself. Personalized content recommendations, multi-device viewing, and real-time audience feedback are changing how stories are told and consumed.\r\n\r\nAnd while streaming dominates, live TV isn’t going away—especially when it comes to sports, breaking news, and shared events like awards shows or election nights.\r\n\r\nWe’re also seeing a rise in international storytelling, with shows from Korea, Spain, India, and beyond gaining global popularity thanks to subtitles and dubbing.\r\n\r\nWhy TV Still Matters\r\nIn an age of social media and short attention spans, television remains one of the few mediums that encourages us to slow down and engage with a story. It builds empathy, opens minds, and entertains millions. Whether you’re watching alone, with family, or with friends across the globe via a group chat, TV brings us together.\r\n\r\n', 1, '1', 'students.jpg', '5', 'Two Three', '2025-05-16 12:13:34'),
(30, 'The Power of Consistency: Why Small Efforts Matter More Than Big Plans', 'How sticking to daily habits can lead to massive long-term success', 'When we think of success, we often imagine bold moves, major milestones, or overnight transformations. But the truth is, success rarely comes from sudden leaps — it’s built through consistent, repeated actions over time.\r\n\r\nConsistency is what turns intentions into results. You don’t need to read a book in one day; reading 10 pages a night will finish it in a week. You don’t need to overhaul your entire lifestyle; exercising for 20 minutes a day can improve your health dramatically over a year.\r\n\r\nIn fact, small, consistent actions are more sustainable and less overwhelming than huge efforts that burn out quickly. They build momentum. They create routines. And they instill a mindset of perseverance.\r\n\r\nWhether you\'re learning a skill, building a business, or improving your health, remember this: what you do regularly is more important than what you do occasionally.\r\n\r\nSo instead of aiming for perfection, aim for progress. Start small, stay consistent, and watch how far you go.', 1, '5', 'Homelander _ The Boys Season 4.jpeg', '5', 'Two Three', '2025-05-19 18:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mypassword` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mypassword`, `date`) VALUES
(4, 'onetwo', 'onetwo@gmail.com', '$2y$10$i39rroeVePg9Q18VQzBB7egUVuGxT3wEzKievU2iNwtIcuaJ18qBC', '2025-05-13 08:54:12'),
(5, 'Two Three', 'twothree@gmail.com', '$2y$10$4/UfocJPZWVydngs61tW8uPeEpdpd.vRn9cBBOYJ5AUTFKBn26IJu', '2025-05-16 15:20:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

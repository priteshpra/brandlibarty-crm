-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 07:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brandlibarty-crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE `activitylog` (
  `ActivityLogID` int(11) NOT NULL,
  `MethodName` varchar(200) DEFAULT NULL,
  `ActivityDescription` text DEFAULT NULL,
  `UserType` varchar(255) DEFAULT 'Admin' COMMENT '(''Admin'',''Employee'',''Franchise'',''Associates'',''Notary'',''Customers'')',
  `UserID` int(11) NOT NULL,
  `IPAddress` varchar(20) DEFAULT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `Id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL DEFAULT -1,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `EmailID` varchar(250) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `MobileNo` varchar(15) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `IsAdmin` int(11) NOT NULL DEFAULT 0,
  `IsAllow` int(11) NOT NULL DEFAULT 0,
  `IsDeleted` int(11) NOT NULL DEFAULT 0,
  `PassCode` varchar(10) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `City` varchar(150) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `AnniversaryDate` date DEFAULT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `Gender` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`Id`, `userID`, `RoleID`, `FirstName`, `LastName`, `EmailID`, `Password`, `MobileNo`, `Address`, `IsAdmin`, `IsAllow`, `IsDeleted`, `PassCode`, `BirthDate`, `City`, `State`, `Country`, `AnniversaryDate`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `Status`, `Gender`) VALUES
(1, 1, 1, 'Pritesh', 'Prajapati', 'test@example.com', '$2y$10$3Ry4ErRFxDZaK/DFIfV8bOP5EHFZHlhujPFEYMisyIvthKWCCDpU.', '997.831750', 'Ahmedabad', 1, 1, 0, '', '1991-02-19', 'Nasik', 'MH', 'IN', NULL, 0, '2024-02-04 11:41:05', NULL, NULL, 1, 'Male'),
(2, 2, 3, 'test', 'tets', 'test@email.com', '$2y$10$aUnUPhcPc84x0URcnjhqtuu5VqQ1a.NF2hFwg5LSgmT/OYtsYxmTC', '9865235856', NULL, 1, 1, 0, NULL, '1960-05-05', 'GA', 'hd', 'S', NULL, 1, '2024-07-04 16:20:50', NULL, NULL, 1, 'Male'),
(5, 5, 2, 'dsf', 'df', 'fss@ff.com', '$2y$10$aUnUPhcPc84x0URcnjhqtuu5VqQ1a.NF2hFwg5LSgmT/OYtsYxmTC', '9874563258', NULL, 0, 0, 0, NULL, NULL, 'kmdk', 'dskf', NULL, NULL, 1, '2024-07-07 12:06:07', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliate`
--

CREATE TABLE `affiliate` (
  `id` int(11) NOT NULL,
  `accountName` varchar(200) NOT NULL,
  `productCat` varchar(200) NOT NULL,
  `productLink` varchar(255) NOT NULL,
  `affiliateId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `createdBy` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `affiliate`
--

INSERT INTO `affiliate` (`id`, `accountName`, `productCat`, `productLink`, `affiliateId`, `status`, `createdBy`, `created_at`, `updated_at`) VALUES
(1, 'sfdfgfdg', 'sd', 'http://localhost/brandlibarty-crm/affiliate', 4, 1, 1, '2024-07-12 12:37:59', '2024-07-12 12:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_name` varchar(200) NOT NULL,
  `keywordName` varchar(200) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `blog_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `blog_description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_send` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_name`, `keywordName`, `content`, `blog_date`, `created_at`, `updated_at`, `blog_description`, `status`, `is_send`, `createdBy`) VALUES
(36, 'Krey Tielw', 'Keyword Research', '# Unlocking the Power of Strategic Leadership: A Guide to Transforming Your Organization<br/><\r\n><br/><\r\n>In the dynamic world of business, the difference between success and failure often hinges on a single crucial element: strategy. Strategic leadership isn\'t just about planning; it’s about envisioning, executing, and evolving. This article will delve into the essence of strategic leadership, its critical components, and how you can effectively implement these principles to spearhead transformation in your organization.<br/><\r\n><br/><\r\n>## Introduction: The Art and Science of Strategie<br/><\r\n><br/><\r\n>Imagine leading a team or an organization where every decision and action aligns seamlessly with an overarching vision, driving towards success even amidst challenges. That\'s the power of strategic leadership - a blend of foresight, analysis, and execution. This article explores this intricate dance of decision-making and direction-setting that defines the core of effective leadership.<br/><\r\n><br/><\r\n>## Section 1: Overview of Strategie<br/><\r\n><br/><\r\n>### What is Strategic Leadership?<br/><\r\n><br/><\r\n>Strategic leadership refers to a leader’s ability to anticipate, envision, maintain flexibility, think strategically, and work with others to initiate changes that will create a sustainable future for the organization. It transcends the boundaries of traditional leadership to include a broader, long-term vision.<br/><\r\n><br/><\r\n>### Historical Context<br/><\r\n><br/><\r\n>The roots of strategic leadership can be traced back to military strategy and ancient war tactics, which were later adapted into business and organizational contexts. Historical figures such as Sun Tzu and Machiavelli laid the groundwork for strategic thought, emphasizing the importance of adaptability, understanding competitor behavior, and aligning resources with opportunities.<br/><\r\n><br/><\r\n>## Section 2: Key Aspects of Strategie<br/><\r\n><br/><\r\n>Strategic leadership encompasses various dimensions that collectively empower a leader to guide their organization effectively:<br/><\r\n><br/><\r\n>- <h2>Visionary Thinking</h2>: Beyond mere forward-thinking, it involves developing a clear, compelling vision of what the organization should achieve.<br/><\r\n>- <h2>Decision Making</h2>: Utilizing both analytical and intuitive tools to make decisions that align with long-term objectives.<br/><\r\n>- <h2>Ethical Practices and Corporate Governance</h2>: Ensuring that the organization’s operations adhere to high ethical standards and transparent governance to build trust and integrity.<br/><\r\n>- <h2>Change Management</h2>: The ability to drive and manage change as a constant factor, understanding its impacts and implementing strategies to leverage change effectively.<br/><\r\n>- <h2>Communication</h2>: Articulating the vision and strategy clearly to all stakeholders to foster alignment and collective effort.<br/><\r\n><br/><\r\n>## Section 3: Practical Applications/Tips<br/><\r\n><br/><\r\n>### Implementing Strategic Leadership<br/><\r\n><br/><\r\n>1. <h2>Develop a Clear Vision</h2>: Start with a clear and feasible vision for the future. Engage with various stakeholders to refine and adapt this vision.<br/><\r\n>2. <h2>Communicate Effectively</h2>: Keep communication channels open and transparent. Regular updates and inclusive dialogues are crucial.<br/><\r\n>3. <h2>Embrace Flexibility</h2>: In a rapidly changing environment, adaptability is key. Be prepared to pivot strategies as needed without losing sight of the overall goals.<br/><\r\n>4. <h2>Foster a Strategic Culture</h2>: Encourage strategic thinking at all levels of the organization. Promote training programs that focus on developing analytical and foresight skills.<br/><\r\n>5. <h2>Lead by Example</h2>: Demonstrate strategic thinking and decision-making in your actions. Leaders set the tone for the organization’s strategic culture.<br/><\r\n><br/><\r\n>### Real-life Example<br/><\r\n><br/><\r\n>Consider the transformation of a major technology company under the strategic leadership of its CEO, who redirected the company’s focus from hardware to software and services, anticipating market saturation in hardware. This visionary move involved substantial changes in operations, culture, and business models, which were communicated transparently and enthusiastically across the company.<br/><\r\n><br/><\r\n>## Conclusion: Your Strategic Leadership Journey<br/><\r\n><br/><\r\n>Strategic leadership is more than just a skill—it\'s a comprehensive approach that requires persistence, insight, and a proactive stance. By understanding the essentials of strategic leadership discussed here, you can begin to transform your leadership style and propel your organization toward long-term success.<br/><\r\n><br/><\r\n>### Call to Action<br/><\r\n><br/><\r\n>Ready to embark on your journey of strategic leadership? Continue to explore, learn, and apply these principles. For more insights and resources, subscribe to our newsletter and stay updated on the latest in leadership strategies and organizational transformation.<br/><\r\n><br/><\r\n>---<br/><\r\n><br/><\r\n><h2>Meta Description</h2>: Discover the transformative power of strategic leadership in our comprehensive guide. Learn key strategies, practical tips, and real-life examples to lead your organization to success.<br/><\r\n><br/><\r\n><h2>Keywords</h2>: Strategie, Strategic Leadership, Leadership Strategies, Organizational Transformation, Visionary Thinking, Change Management<br/><\r\n><br/><\r\n><h2>Images/Infographics</h2>: Include visuals that illustrate concepts like strategic planning processes, decision-making models, and leadership qualities.<br/><\r\n><br/><\r\n><h2>Links</h2>: Provide links to additional resources and books on strategic leadership for further reading.', '1970-01-01', '2024-08-15 10:53:32', '2024-09-15 11:32:09', NULL, 1, 1, 1),
(45, 'Arts data Title', 'Arts Data', '                   Certainly! To create an article on \"Arts Data Title\" following the provided instructions, you can structure it as follows: \n\n<h2 class=\"imageGet text\">Title: Navigating the World of Arts Data Title</h2>\n\n<h2 class=\"imageGet text\">Introduction:</h2>\nAs the digital landscape continues to evolve, the intersection of art and data has become increasingly prominent. In this article, we delve into the realm of Arts Data Title, exploring its significance and practical applications.\n\n<h2 class=\"imageGet text\">Section 1: Overview of Arts Data Title</h2>\nArts Data Title represents a fusion of artistic expression and data analysis. It involves utilizing data to gain insights into various art forms, performances, and cultural phenomena. Understanding Arts Data Title is essential for enhancing audience engagement, optimizing artistic strategies, and fostering creativity.\n\n<h2 class=\"imageGet text\">Section 2: Key Aspects of Arts Data Title</h2>\n- Data Visualization in the Arts: Visual representations of data can provide a unique perspective on artistic trends and audience preferences.\n- Predictive Analytics for Cultural Events: Leveraging predictive analytics can help arts organizations anticipate audience turnout and tailor their offerings accordingly.\n- Sentiment Analysis in Art Critique: Analyzing sentiment through data can offer valuable feedback for artists and critics to improve their work.\n\n<h2 class=\"imageGet text\">Section 3: Practical Applications/Tips</h2>\n- Utilize audience feedback tools to gather data on preferences and reactions to artistic performances.\n- Implement data-driven marketing strategies to reach target demographics effectively.\n- Collaborate with data analysts to uncover insights that can enhance artistic decision-making processes.\n\n<h2 class=\"imageGet text\">Conclusion:</h2>\nIn conclusion, Arts Data Title serves as a powerful tool to bridge the gap between creativity and analytics in the art world. By embracing this innovative approach, artists and cultural organizations can unlock new possibilities and connect with audiences on a deeper level. Explore the potential of Arts Data Title today and embark on a journey of artistic discovery!\n\n<h2 class=\"imageGet text\">Additional Elements:</h2>\n- Incorporate engaging images or infographics to illustrate the concepts discussed.\n- Include links to reputable sources for further reading on data analysis in the arts.\n- Craft a meta description highlighting the transformative role of Arts Data Title in artistic endeavors.\n\nFeel free to adjust the tone and specifics of the article based on your preferences and target audience. Let me know if you need further assistance with this topic!', '2024-10-05', '2024-10-03 13:42:40', '2024-10-16 10:38:53', NULL, 1, 0, 1),
(46, 'Arts data Sample', 'Arts Data Sample', '<td colspan=\"8 \">\n                                <div style=\"width:100%;\">\n                                    <div class=\"self-stretch rounded-t-none rounded-b-lg bg-neutral-n10 overflow-hidden flex flex-row items-start justify-start row-gap-20px max-w-full text-base mq1050:flex-wrap\">\n                                        <div class=\"flex-1 bg-neutral-n0 flex flex-col items-start justify-start pt-6 px-6 pb-35px box-border gap-24px max-w-full lg:pt-5 lg:pb-5 lg:box-border mq750:min-w-full\">\n                                            <div class=\"self-stretch flex flex-col items-start justify-start gap-8px max-w-full\">\n                                                <div class=\"text-3xl\">\n                                                    <h6>Arts data Title</h6>\n                                                </div>\n                                            </div>\n                                            <div class=\"self-stretch flex flex-col items-start justify-start gap-12px max-w-full\">\n                                                <div class=\"self-stretch flex flex-col items-start justify-start gap-8px max-w-full\">\n                                                    <div class=\"self-stretch flex flex-row items-center justify-center max-w-full text-sm text-neutral-n400\">\n                                                        <div class=\"flex-1 relative leading-20px inline-block max-w-full\">\n\n                                                                                                                                           Certainly! To create an article on \"Arts Data Title\" following the provided instructions, you can structure it as follows: \n\n<h2 class=\"imageGet text\">Title: Navigating the World of Arts Data Title</h2>\n\n<h2 class=\"imageGet text\">Introduction:</h2>\nAs the digital landscape continues to evolve, the intersection of art and data has become increasingly prominent. In this article, we delve into the realm of Arts Data Title, exploring its significance and practical applications.\n\n<h2 class=\"imageGet text\">Section 1: Overview of Arts Data Title</h2>\nArts Data Title represents a fusion of artistic expression and data analysis. It involves utilizing data to gain insights into various art forms, performances, and cultural phenomena. Understanding Arts Data Title is essential for enhancing audience engagement, optimizing artistic strategies, and fostering creativity.\n\n<h2 class=\"imageGet text\">Section 2: Key Aspects of Arts Data Title</h2>\n- Data Visualization in the Arts: Visual representations of data can provide a unique perspective on artistic trends and audience preferences.\n- Predictive Analytics for Cultural Events: Leveraging predictive analytics can help arts organizations anticipate audience turnout and tailor their offerings accordingly.\n- Sentiment Analysis in Art Critique: Analyzing sentiment through data can offer valuable feedback for artists and critics to improve their work.\n\n<h2 class=\"imageGet text\">Section 3: Practical Applications/Tips</h2>\n- Utilize audience feedback tools to gather data on preferences and reactions to artistic performances.\n- Implement data-driven marketing strategies to reach target demographics effectively.\n- Collaborate with data analysts to uncover insights that can enhance artistic decision-making processes.\n\n<h2 class=\"imageGet text\">Conclusion:</h2>\nIn conclusion, Arts Data Title serves as a powerful tool to bridge the gap between creativity and analytics in the art world. By embracing this innovative approach, artists and cultural organizations can unlock new possibilities and connect with audiences on a deeper level. Explore the potential of Arts Data Title today and embark on a journey of artistic discovery!\n\n<h2 class=\"imageGet text\">Additional Elements:</h2>\n- Incorporate engaging images or infographics to illustrate the concepts discussed.\n- Include links to reputable sources for further reading on data analysis in the arts.\n- Craft a meta description highlighting the transformative role of Arts Data Title in artistic endeavors.\n\nFeel free to adjust the tone and specifics of the article based on your preferences and target audience. Let me know if you need further assistance with this topic!\n                                                        </div>\n                                                    </div>\n                                                </div>\n\n                                            </div>\n\n                                        </div>\n                                    </div>\n                                    <input class=\"add-button-container add-button\" style=\"float: right;background-color: #9896f1;color: white;\" type=\"button\" id=\"Send\" name=\"Send\" value=\"Send\">\n                                </div>\n                                <!-- <div style=\"width:30%;float: right;position: relative;\">\n                                    <div id=\"result_45\" data-id=\"45\"></div>\n                                </div> -->\n\n                            </td>', '2024-10-05', '2024-10-03 13:42:40', '2024-10-19 12:06:44', NULL, 1, 1, 1),
(47, 'Arts data Sample 2', 'Arts Data Sample', '<td colspan=\"8 \">\n                                <div style=\"width:65%;float: left;\">\n                                    <div class=\"self-stretch rounded-t-none rounded-b-lg bg-neutral-n10 overflow-hidden flex flex-row items-start justify-start row-gap-20px max-w-full text-base mq1050:flex-wrap\">\n                                        <div class=\"flex-1 bg-neutral-n0 flex flex-col items-start justify-start pt-6 px-6 pb-35px box-border gap-24px max-w-full lg:pt-5 lg:pb-5 lg:box-border mq750:min-w-full\">\n                                            <div class=\"self-stretch flex flex-col items-start justify-start gap-8px max-w-full\">\n                                                <div class=\"text-3xl\">\n                                                    <h6>Arts data Title</h6>\n                                                </div>\n                                            </div>\n                                            <div class=\"self-stretch flex flex-col items-start justify-start gap-12px max-w-full\">\n                                                <div class=\"self-stretch flex flex-col items-start justify-start gap-8px max-w-full\">\n                                                    <div class=\"self-stretch flex flex-row items-center justify-center max-w-full text-sm text-neutral-n400\">\n                                                        <div class=\"flex-1 relative leading-20px inline-block max-w-full\">\n\n                                                                                                                                           Certainly! To create an article on \"Arts Data Title\" following the provided instructions, you can structure it as follows: \n\n<h2 class=\"imageGet text\">Title: Navigating the World of Arts Data Title</h2>\n\n<h2 class=\"imageGet text\">Introduction:</h2>\nAs the digital landscape continues to evolve, the intersection of art and data has become increasingly prominent. In this article, we delve into the realm of Arts Data Title, exploring its significance and practical applications.\n\n<h2 class=\"imageGet text\">Section 1: Overview of Arts Data Title</h2>\nArts Data Title represents a fusion of artistic expression and data analysis. It involves utilizing data to gain insights into various art forms, performances, and cultural phenomena. Understanding Arts Data Title is essential for enhancing audience engagement, optimizing artistic strategies, and fostering creativity.\n\n<h2 class=\"imageGet text\">Section 2: Key Aspects of Arts Data Title</h2>\n- Data Visualization in the Arts: Visual representations of data can provide a unique perspective on artistic trends and audience preferences.\n- Predictive Analytics for Cultural Events: Leveraging predictive analytics can help arts organizations anticipate audience turnout and tailor their offerings accordingly.\n- Sentiment Analysis in Art Critique: Analyzing sentiment through data can offer valuable feedback for artists and critics to improve their work.\n\n<h2 class=\"imageGet text\">Section 3: Practical Applications/Tips</h2>\n- Utilize audience feedback tools to gather data on preferences and reactions to artistic performances.\n- Implement data-driven marketing strategies to reach target demographics effectively.\n- Collaborate with data analysts to uncover insights that can enhance artistic decision-making processes.\n\n<h2 class=\"imageGet text\">Conclusion:</h2>\nIn conclusion, Arts Data Title serves as a powerful tool to bridge the gap between creativity and analytics in the art world. By embracing this innovative approach, artists and cultural organizations can unlock new possibilities and connect with audiences on a deeper level. Explore the potential of Arts Data Title today and embark on a journey of artistic discovery!\n\n<h2 class=\"imageGet text\">Additional Elements:</h2>\n- Incorporate engaging images or infographics to illustrate the concepts discussed.\n- Include links to reputable sources for further reading on data analysis in the arts.\n- Craft a meta description highlighting the transformative role of Arts Data Title in artistic endeavors.\n\nFeel free to adjust the tone and specifics of the article based on your preferences and target audience. Let me know if you need further assistance with this topic!\n                                                        </div>\n                                                    </div>\n                                                </div>\n\n                                            </div>\n\n                                        </div>\n                                    </div>\n                                    <input class=\"add-button-container add-button\" style=\"float: right;background-color: #9896f1;color: white;\" type=\"button\" id=\"Send\" name=\"Send\" value=\"Send\">\n                                </div>\n                                <div style=\"width:30%;float: right;position: relative;\">\n                                    <div id=\"result_45\" data-id=\"45\"></div>\n                                </div>\n\n                            </td>', '2024-10-05', '2024-10-03 13:42:40', '2024-10-16 10:48:58', NULL, 1, 1, 1),
(48, 'Arts data Sample 3', 'Arts Data Sample', '<td colspan=\"8 \">\n                                <div style=\"width:65%;float: left;\">\n                                    <div class=\"self-stretch rounded-t-none rounded-b-lg bg-neutral-n10 overflow-hidden flex flex-row items-start justify-start row-gap-20px max-w-full text-base mq1050:flex-wrap\">\n                                        <div class=\"flex-1 bg-neutral-n0 flex flex-col items-start justify-start pt-6 px-6 pb-35px box-border gap-24px max-w-full lg:pt-5 lg:pb-5 lg:box-border mq750:min-w-full\">\n                                            <div class=\"self-stretch flex flex-col items-start justify-start gap-8px max-w-full\">\n                                                <div class=\"text-3xl\">\n                                                    <h6>Arts data Title</h6>\n                                                </div>\n                                            </div>\n                                            <div class=\"self-stretch flex flex-col items-start justify-start gap-12px max-w-full\">\n                                                <div class=\"self-stretch flex flex-col items-start justify-start gap-8px max-w-full\">\n                                                    <div class=\"self-stretch flex flex-row items-center justify-center max-w-full text-sm text-neutral-n400\">\n                                                        <div class=\"flex-1 relative leading-20px inline-block max-w-full\">\n\n                                                                                                                                           Certainly! To create an article on \"Arts Data Title\" following the provided instructions, you can structure it as follows: \n\n<h2 class=\"imageGet text\">Title: Navigating the World of Arts Data Title</h2>\n\n<h2 class=\"imageGet text\">Introduction:</h2>\nAs the digital landscape continues to evolve, the intersection of art and data has become increasingly prominent. In this article, we delve into the realm of Arts Data Title, exploring its significance and practical applications.\n\n<h2 class=\"imageGet text\">Section 1: Overview of Arts Data Title</h2>\nArts Data Title represents a fusion of artistic expression and data analysis. It involves utilizing data to gain insights into various art forms, performances, and cultural phenomena. Understanding Arts Data Title is essential for enhancing audience engagement, optimizing artistic strategies, and fostering creativity.\n\n<h2 class=\"imageGet text\">Section 2: Key Aspects of Arts Data Title</h2>\n- Data Visualization in the Arts: Visual representations of data can provide a unique perspective on artistic trends and audience preferences.\n- Predictive Analytics for Cultural Events: Leveraging predictive analytics can help arts organizations anticipate audience turnout and tailor their offerings accordingly.\n- Sentiment Analysis in Art Critique: Analyzing sentiment through data can offer valuable feedback for artists and critics to improve their work.\n\n<h2 class=\"imageGet text\">Section 3: Practical Applications/Tips</h2>\n- Utilize audience feedback tools to gather data on preferences and reactions to artistic performances.\n- Implement data-driven marketing strategies to reach target demographics effectively.\n- Collaborate with data analysts to uncover insights that can enhance artistic decision-making processes.\n\n<h2 class=\"imageGet text\">Conclusion:</h2>\nIn conclusion, Arts Data Title serves as a powerful tool to bridge the gap between creativity and analytics in the art world. By embracing this innovative approach, artists and cultural organizations can unlock new possibilities and connect with audiences on a deeper level. Explore the potential of Arts Data Title today and embark on a journey of artistic discovery!\n\n<h2 class=\"imageGet text\">Additional Elements:</h2>\n- Incorporate engaging images or infographics to illustrate the concepts discussed.\n- Include links to reputable sources for further reading on data analysis in the arts.\n- Craft a meta description highlighting the transformative role of Arts Data Title in artistic endeavors.\n\nFeel free to adjust the tone and specifics of the article based on your preferences and target audience. Let me know if you need further assistance with this topic!\n                                                        </div>\n                                                    </div>\n                                                </div>\n\n                                            </div>\n\n                                        </div>\n                                    </div>\n                                    <input class=\"add-button-container add-button\" style=\"float: right;background-color: #9896f1;color: white;\" type=\"button\" id=\"Send\" name=\"Send\" value=\"Send\">\n                                </div>\n                                <div style=\"width:30%;float: right;position: relative;\">\n                                    <div id=\"result_45\" data-id=\"45\"></div>\n                                </div>\n\n                            </td>', '2024-10-05', '2024-10-03 13:42:40', '2024-10-16 10:41:39', NULL, 1, 1, 1),
(49, 'Fare Fighter Title', 'Fare Fighter', 'Sure, here is a sample article on Fare Fighter Title following the provided instructions:\r\n\r\n---\r\n\r\n<h2 class=\"imageGet text\">Article Title: Unleashing the Strength of Fare Fighter Title: A Guide to Success</h2>\r\n\r\n<h2 class=\"imageGet text\">Introduction:</h2>\r\nIn the competitive landscape of today\'s business world, the concept of Fare Fighter Title stands out as a powerful tool for individuals aiming to excel in their leadership roles. This article delves into the essence of Fare Fighter Title, exploring its significance and offering practical insights on how to leverage it for personal and professional growth.\r\n\r\n<h2 class=\"imageGet text\">Section 1: Overview of Fare Fighter Title</h2>\r\nFare Fighter Title embodies the essence of strategic leadership, emphasizing the importance of resilience, adaptability, and foresight in navigating challenges and seizing opportunities. Born out of a rich history of successful leadership strategies, Fare Fighter Title has evolved into a comprehensive framework that empowers individuals to excel in dynamic environments.\r\n\r\n<h2 class=\"imageGet text\">Section 2: Key Aspects of Fare Fighter Title</h2>\r\n- Resilience: Fare Fighter Title equips individuals with the mental toughness to withstand setbacks and emerge stronger from adversity.\r\n- Adaptability: One of the key pillars of Fare Fighter Title is the ability to adapt to changing circumstances swiftly and effectively.\r\n- Foresight: Leaders who embody Fare Fighter Title possess a keen sense of foresight, enabling them to anticipate trends and proactively tackle challenges.\r\n\r\n<h2 class=\"imageGet text\">Section 3: Practical Applications/Tips</h2>\r\n- Cultivate a growth mindset: Embrace challenges as opportunities for growth and learning.\r\n- Build a strong support network: Surround yourself with individuals who inspire and challenge you to reach new heights.\r\n- Set clear goals and milestones: Define your objectives and track your progress to stay motivated and focused on success.\r\n\r\n<h2 class=\"imageGet text\">Conclusion:</h2>\r\nFare Fighter Title serves as a beacon of inspiration for aspiring leaders, guiding them towards personal and professional excellence. By embracing the principles of Fare Fighter Title and integrating them into their leadership approach, individuals can unlock their true potential and lead with confidence. Take the first step towards mastering Fare Fighter Title today and witness the transformative impact it can have on your journey to success.\r\n\r\n<h2 class=\"imageGet text\">Additional Elements:</h2>\r\n- Images: Include dynamic images depicting leadership scenarios and individuals embodying Fare Fighter Title principles.\r\n- Links: Provide links to reputable sources for further exploration of leadership strategies and frameworks.\r\n- SEO Considerations: Meta Description - \"Explore the power of Fare Fighter Title and unlock your leadership potential with this comprehensive guide. Discover key strategies and practical tips for success.\"\r\n- Keywords: Fare Fighter Title, leadership strategies, resilience, adaptability, foresight.\r\n\r\n---\r\n\r\nFeel free to customize this sample article further based on your specific requirements and preferences.', '2024-10-17', '2024-10-16 10:49:35', '2024-10-16 10:49:35', NULL, 1, 0, 1),
(51, 'Artificial Inteligance buro', 'AI', 'Artificial Intelligence (AI) is rapidly transforming the way businesses operate. One of the key tools that have emerged in this realm is Artificial Intelligence Bureau (AI buro). This article aims to provide an insightful overview of AI buro, delve into its key aspects, and offer practical tips for its implementation.\r\n\r\n### Overview of Artificial Intelligence Buro\r\nAI buro is a specialized agency or department within an organization that focuses on harnessing the power of artificial intelligence for various functions. It serves as a hub for AI-related activities, including research, development, implementation, and training. The importance of AI buro lies in its ability to drive innovation, streamline processes, and improve decision-making through the use of AI technologies.\r\n\r\nHistorically, AI buros have evolved from traditional research and development departments to becoming strategic partners in achieving business objectives. They play a crucial role in exploring cutting-edge AI solutions, collaborating with cross-functional teams, and staying abreast of industry trends to ensure the organization remains competitive in the digital age.\r\n\r\n### Key Aspects of Artificial Intelligence Buro\r\n- <h2 class=\"imageGet text\">Specialized Expertise:</h2><div id=\"result_Specialized Expertise:\" data-id=\"Specialized Expertise:\"></div> AI buros house a team of AI specialists, data scientists, and machine learning engineers who possess the skills and knowledge needed to develop and implement AI solutions.\r\n- <h2 class=\"imageGet text\">Data Management:</h2><div id=\"result_Data Management:\" data-id=\"Data Management:\"></div> They are responsible for managing vast amounts of data, ensuring its quality and security, and using it to train AI models for predictive analytics and decision-making.\r\n- <h2 class=\"imageGet text\">Integration with Business Processes:</h2><div id=\"result_Integration with Business Processes:\" data-id=\"Integration with Business Processes:\"></div> AI buros work closely with different departments to integrate AI applications into existing business processes, improving efficiency and productivity.\r\n- <h2 class=\"imageGet text\">Continuous Learning:</h2><div id=\"result_Continuous Learning:\" data-id=\"Continuous Learning:\"></div> They engage in ongoing research, training, and experimentation to leverage the latest advancements in AI technology for the benefit of the organization.\r\n\r\n### Practical Applications/Tips\r\n- <h2 class=\"imageGet text\">Invest in AI Talent:</h2><div id=\"result_Invest in AI Talent:\" data-id=\"Invest in AI Talent:\"></div> Build a diverse team with expertise in AI, data science, and related fields to drive innovation within the AI buro.\r\n- <h2 class=\"imageGet text\">Collaborate Across Teams:</h2><div id=\"result_Collaborate Across Teams:\" data-id=\"Collaborate Across Teams:\"></div> Foster partnerships with other departments to create synergies and identify opportunities for AI integration.\r\n- <h2 class=\"imageGet text\">Focus on Real-World Impact:</h2><div id=\"result_Focus on Real-World Impact:\" data-id=\"Focus on Real-World Impact:\"></div> Prioritize AI projects that have tangible benefits for the organization, such as cost savings, improved customer experience, or enhanced decision-making.\r\n- <h2 class=\"imageGet text\">Stay Agile:</h2><div id=\"result_Stay Agile:\" data-id=\"Stay Agile:\"></div> Embrace an agile approach to AI development, allowing for rapid prototyping, iteration, and adaptation based on feedback and results.\r\n\r\n### Conclusion\r\nIn conclusion, AI buro represents a strategic asset for organizations looking to leverage the power of AI in their operations. By establishing a dedicated team focused on AI innovation, data management, and collaboration, businesses can harness the full potential of artificial intelligence to drive growth and competitive advantage. To learn more about how AI buro can transform your organization, consider reaching out to experts in the field or exploring AI-focused resources and training opportunities.\r\n\r\nRemember, the future of business lies in embracing AI technologies, and AI buro can serve as a key enabler in this transformation. Take the first step towards unlocking the possibilities of AI by exploring the world of Artificial Intelligence Buro today!\r\n\r\n<h4>Join our newsletter to stay updated on the latest trends in AI and unlock the potential of your business with AI buro!</h4>', '2024-10-20', '2024-10-19 12:15:25', '2024-10-19 12:15:25', NULL, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `articleName` varchar(150) NOT NULL,
  `articleLink` varchar(255) NOT NULL,
  `articleScheduleDate` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `createdBy` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `articleName`, `articleLink`, `articleScheduleDate`, `status`, `createdBy`, `created_at`, `updated_at`) VALUES
(1, 'df', 'http://localhost/brandlibarty-crm/calendar', '2024-07-09', 1, 1, '2024-07-14 00:03:12', '2024-07-14 00:03:12'),
(2, 'Arts data Title', 'https://theautomateapp.com/calendar', '2024-10-09', 1, 2, '2024-10-03 13:22:53', '2024-10-03 13:22:53'),
(3, 'Arts data Title', 'https://theautomateapp.com/calendar', '2024-10-05', 1, 2, '2024-10-03 13:39:03', '2024-10-03 13:39:03'),
(4, 'Arts data Title', 'https://theautomateapp.com/calendar', '2024-10-05', 1, 2, '2024-10-03 13:42:40', '2024-10-03 13:42:40'),
(5, 'Fare Fighter Title', 'https://theautomateapp.com/calendar', '2024-10-17', 1, 2, '2024-10-16 10:49:35', '2024-10-16 10:49:35'),
(6, 'Artificial Inteligance buro', 'https://theautomateapp.com/calendar', '2024-10-20', 1, 2, '2024-10-19 12:12:40', '2024-10-19 12:12:40'),
(7, 'Artificial Inteligance buro', 'https://theautomateapp.com/calendar', '2024-10-20', 1, 2, '2024-10-19 12:15:25', '2024-10-19 12:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiedBy` int(11) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `categoryName`, `createdBy`, `createdDate`, `modifiedBy`, `modifiedDate`, `status`) VALUES
(1, 'News', 2, '2024-01-28 19:05:39', NULL, NULL, 1),
(2, 'Sports', 2, '2024-02-03 17:17:36', 2, '2024-02-03 17:31:02', 1),
(6, 'Finance', 1, '2024-07-20 14:14:08', NULL, NULL, 1),
(7, 'Entertainment', 0, '2024-07-21 15:09:54', NULL, NULL, 1),
(8, 'Real Estate', 0, '2024-07-21 15:09:54', NULL, NULL, 1),
(9, 'Fashion', 0, '2024-07-21 15:10:15', NULL, NULL, 1),
(10, 'Travel', 0, '2024-07-21 15:10:15', NULL, NULL, 1),
(11, 'Food', 0, '2024-07-21 15:10:21', NULL, NULL, 1),
(12, 'Market Research', 0, '2024-07-21 15:12:24', NULL, NULL, 1),
(13, 'Customer Retention', 0, '2024-07-21 15:12:24', NULL, NULL, 1),
(14, 'Brand Management', 0, '2024-07-21 15:12:34', NULL, NULL, 1),
(15, 'Competitive Analysis', 0, '2024-07-21 15:12:34', NULL, NULL, 1),
(16, 'Workplace Diversity', 0, '2024-07-21 15:12:48', NULL, NULL, 1),
(17, 'Legal & Compliance', 0, '2024-07-21 15:12:48', NULL, NULL, 1),
(18, 'Public Relations', 0, '2024-07-21 15:13:09', NULL, NULL, 1),
(19, 'Industry Trends', 0, '2024-07-21 15:13:09', NULL, NULL, 1),
(20, 'IT Management', 0, '2024-07-21 15:13:14', NULL, NULL, 1),
(21, 'SSSS', 1, '2024-07-26 21:59:41', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `CityID` bigint(20) NOT NULL,
  `CityName` varchar(200) NOT NULL,
  `StateID` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`CityID`, `CityName`, `StateID`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `Status`) VALUES
(1, 'Bombuflat', 44, 1, '2017-12-22 15:03:43', 2, '2016-04-11 15:29:44', 1),
(2, 'Garacharma', 1, 1, '2017-12-22 15:03:43', 1, '2016-04-05 11:42:23', 0),
(3, 'Port Blair', 1, 1, '2017-12-22 15:03:43', 1, '2016-04-05 11:48:59', 0),
(4, 'Rangat', 1, 1, '2017-12-22 15:03:43', 1, '2016-04-05 11:42:43', 0),
(5, 'Addanki', 2, 1, '2017-12-22 15:03:43', 1, '2017-12-06 16:38:42', 1),
(6, 'Adivivaram', 2, 1, '2017-12-22 15:03:43', 1, '2017-12-01 10:49:05', 1),
(7, 'Adoni', 2, 1, '2017-12-22 15:03:43', 1, '2017-12-25 12:55:20', 0),
(8, 'Aganampudi', 2, 1, '2017-12-22 15:03:43', 1, '2017-12-01 10:49:14', 1),
(9, 'Ajjaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-04-05 13:11:03', 0),
(10, 'Akividu', 2, 1, '2017-12-22 15:03:43', 1, '2017-12-06 16:44:45', 0),
(11, 'Akkarampalle', 2, 1, '2017-12-22 15:03:43', 1, '2017-12-01 15:21:31', 1),
(12, 'Akkayapalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(13, 'Akkireddipalem', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(14, 'Alampur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(15, 'Amalapuram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(16, 'Amudalavalasa', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(17, 'Amur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(18, 'Anakapalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(19, 'Anantapur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(20, 'Andole', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(21, 'Atmakur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(22, 'Attili', 2, 1, '2017-12-22 15:03:43', 1, '2016-04-05 11:53:06', 0),
(23, 'Avanigadda', 2, 1, '2017-12-22 15:03:43', 1, '2016-04-05 11:53:06', 0),
(24, 'Badepalli', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(25, 'Badvel', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(26, 'Balapur', 2, 1, '2017-12-22 15:03:43', 1, '2016-04-05 11:53:06', 0),
(27, 'Bandarulanka', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(28, 'Banganapalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-04-05 11:53:06', 0),
(29, 'Bapatla', 2, 1, '2017-12-22 15:03:43', 1, '2016-04-05 11:53:06', 0),
(30, 'Bapulapadu', 2, 1, '2017-12-22 15:03:43', 1123, '2016-03-17 15:53:26', 1),
(31, 'Belampalli', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(32, 'Bestavaripeta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(33, 'Betamcherla', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(34, 'Bhattiprolu', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(35, 'Bhimavaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(36, 'Bhimunipatnam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(37, 'Bobbili', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(38, 'Bombuflat', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(39, 'Bommuru', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(40, 'Bugganipalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(41, 'Challapalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(42, 'Chandur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(43, 'Chatakonda', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(44, 'Chemmumiahpet', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(45, 'Chidiga', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(46, 'Chilakaluripet', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(47, 'Chimakurthy', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(48, 'Chinagadila', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(49, 'Chinagantyada', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(50, 'Chinnachawk', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(51, 'Chintalavalasa', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(52, 'Chipurupalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(53, 'Chirala', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(54, 'Chittoor', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(55, 'Chodavaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(56, 'Choutuppal', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(57, 'Chunchupalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(58, 'Cuddapah', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(59, 'Cumbum', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(60, 'Darnakal', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(61, 'Dasnapur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(62, 'Dauleshwaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(63, 'Dharmavaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(64, 'Dhone', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(65, 'Dommara Nandyal', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(66, 'Dowlaiswaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(67, 'East Godavari Dist.', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(68, 'Eddumailaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(69, 'Edulapuram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(70, 'Ekambara kuppam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(71, 'Eluru', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(72, 'Enikapadu', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(73, 'Fakirtakya', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(74, 'Farrukhnagar', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(75, 'Gaddiannaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(76, 'Gajapathinagaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(77, 'Gajularega', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(78, 'Gajuvaka', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(79, 'Gannavaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(80, 'Garacharma', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(81, 'Garimellapadu', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(82, 'Giddalur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(83, 'Godavarikhani', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(84, 'Gopalapatnam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(85, 'Gopalur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(86, 'Gorrekunta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(87, 'Gudivada', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(88, 'Gudur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(89, 'Guntakal', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(90, 'Guntur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(91, 'Guti', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(92, 'Hindupur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(93, 'Hukumpeta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(94, 'Ichchapuram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(95, 'Isnapur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(96, 'Jaggayyapeta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(97, 'Jallaram Kamanpur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(98, 'Jammalamadugu', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(99, 'Jangampalli', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(100, 'Jarjapupeta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(101, 'Kadiri', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(102, 'Kaikalur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(103, 'Kakinada', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(104, 'Kallur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(105, 'Kalyandurg', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(106, 'Kamalapuram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(107, 'Kamareddi', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(108, 'Kanapaka', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(109, 'Kanigiri', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(110, 'Kanithi', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(111, 'Kankipadu', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(112, 'Kantabamsuguda', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(113, 'Kanuru', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(114, 'Karnul', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(115, 'Katheru', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(116, 'Kavali', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(117, 'Kazipet', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(118, 'Khanapuram Haveli', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(119, 'Kodar', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(120, 'Kollapur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(121, 'Kondapalem', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(122, 'Kondapalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(123, 'Kondukur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(124, 'Kosgi', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(125, 'Kothavalasa', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(126, 'Kottapalli', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(127, 'Kovur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(128, 'Kovurpalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(129, 'Kovvur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(130, 'Krishna', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(131, 'Kuppam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(132, 'Kurmannapalem', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(133, 'Kurnool', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(134, 'Lakshettipet', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(135, 'Lalbahadur Nagar', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(136, 'Machavaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(137, 'Macherla', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(138, 'Machilipatnam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(139, 'Madanapalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(140, 'Madaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(141, 'Madhuravada', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(142, 'Madikonda', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(143, 'Madugule', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(144, 'Mahabubnagar', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(145, 'Mahbubabad', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(146, 'Malkajgiri', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(147, 'Mamilapalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(148, 'Mancheral', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(149, 'Mandapeta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(150, 'Mandasa', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(151, 'Mangalagiri', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(152, 'Manthani', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(153, 'Markapur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(154, 'Marturu', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(155, 'Metpalli', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(156, 'Mindi', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(157, 'Mirpet', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(158, 'Moragudi', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(159, 'Mothugudam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(160, 'Nagari', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(161, 'Nagireddipalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(162, 'Nandigama', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(163, 'Nandikotkur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(164, 'Nandyal', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(165, 'Narasannapeta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(166, 'Narasapur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(167, 'Narasaraopet', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(168, 'Narayanavanam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(169, 'Narsapur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(170, 'Narsingi', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(171, 'Narsipatnam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(172, 'Naspur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(173, 'Nathayyapalem', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(174, 'Nayudupeta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(175, 'Nelimaria', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(176, 'Nellore', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(177, 'Nidadavole', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(178, 'Nuzvid', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(179, 'Omerkhan daira', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(180, 'Ongole', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(181, 'Osmania University', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(182, 'Pakala', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(183, 'Palakole', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(184, 'Palakurthi', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(185, 'Palasa', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(186, 'Palempalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(187, 'Palkonda', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(188, 'Palmaner', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(189, 'Pamur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(190, 'Panjim', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(191, 'Papampeta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(192, 'Parasamba', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(193, 'Parvatipuram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(194, 'Patancheru', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(195, 'Payakaraopet', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(196, 'Pedagantyada', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(197, 'Pedana', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(198, 'Peddapuram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(199, 'Pendurthi', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(200, 'Penugonda', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(201, 'Penukonda', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(202, 'Phirangipuram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(203, 'Pithapuram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(204, 'Ponnur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(205, 'Port Blair', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(206, 'Pothinamallayyapalem', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(207, 'Prakasam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(208, 'Prasadampadu', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(209, 'Prasantinilayam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(210, 'Proddatur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(211, 'Pulivendla', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(212, 'Punganuru', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(213, 'Puttur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(214, 'Qutubullapur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(215, 'Rajahmundry', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(216, 'Rajamahendri', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(217, 'Rajampet', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(218, 'Rajendranagar', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(219, 'Rajoli', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(220, 'Ramachandrapuram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(221, 'Ramanayyapeta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(222, 'Ramapuram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(223, 'Ramarajupalli', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(224, 'Ramavarappadu', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(225, 'Rameswaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(226, 'Rampachodavaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(227, 'Ravulapalam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(228, 'Rayachoti', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(229, 'Rayadrug', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(230, 'Razam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(231, 'Razole', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(232, 'Renigunta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(233, 'Repalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(234, 'Rishikonda', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(235, 'Salur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(236, 'Samalkot', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(237, 'Sattenapalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(238, 'Seetharampuram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(239, 'Serilungampalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(240, 'Shankarampet', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(241, 'Shar', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(242, 'Singarayakonda', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(243, 'Sirpur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(244, 'Sirsilla', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(245, 'Sompeta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(246, 'Sriharikota', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(247, 'Srikakulam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(248, 'Srikalahasti', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(249, 'Sriramnagar', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(250, 'Sriramsagar', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(251, 'Srisailam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(252, 'Srisailamgudem Devasthanam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(253, 'Sulurpeta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(254, 'Suriapet', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(255, 'Suryaraopet', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(256, 'Tadepalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(257, 'Tadepalligudem', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(258, 'Tadpatri', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(259, 'Tallapalle', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(260, 'Tanuku', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(261, 'Tekkali', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(262, 'Tenali', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(263, 'Tigalapahad', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(264, 'Tiruchanur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(265, 'Tirumala', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(266, 'Tirupati', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(267, 'Tirvuru', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(268, 'Trimulgherry', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(269, 'Tuni', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(270, 'Turangi', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(271, 'Ukkayapalli', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(272, 'Ukkunagaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(273, 'Uppal Kalan', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(274, 'Upper Sileru', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(275, 'Uravakonda', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(276, 'Vadlapudi', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(277, 'Vaparala', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(278, 'Vemalwada', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(279, 'Venkatagiri', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(280, 'Venkatapuram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(281, 'Vepagunta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(282, 'Vetapalem', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(283, 'Vijayapuri', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(284, 'Vijayapuri South', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(285, 'Vijayawada', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(286, 'Vinukonda', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(287, 'Visakhapatnam', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(288, 'Vizianagaram', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(289, 'Vuyyuru', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(290, 'Wanparti', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(291, 'West Godavari Dist.', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(292, 'Yadagirigutta', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(293, 'Yarada', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(294, 'Yellamanchili', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(295, 'Yemmiganur', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(296, 'Yenamalakudru', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(297, 'Yendada', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(298, 'Yerraguntla', 2, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(299, 'Along', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(300, 'Basar', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(301, 'Bondila', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(302, 'Changlang', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(303, 'Daporijo', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(304, 'Deomali', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(305, 'Itanagar', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(306, 'Jairampur', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(307, 'Khonsa', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(308, 'Naharlagun', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(309, 'Namsai', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(310, 'Pasighat', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(311, 'Roing', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(312, 'Seppa', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(313, 'Tawang', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(314, 'Tezu', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(315, 'Ziro', 3, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(316, 'Abhayapuri', 4, 1, '2017-12-22 15:03:43', 0, '2016-12-03 15:44:45', 1),
(317, 'Ambikapur', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(318, 'Amguri', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(319, 'Anand Nagar', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(320, 'Badarpur', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(321, 'Badarpur Railway Town', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(322, 'Bahbari Gaon', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(323, 'Bamun Sualkuchi', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(324, 'Barbari', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(325, 'Barpathar', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(326, 'Barpeta', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(327, 'Barpeta Road', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(328, 'Basugaon', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(329, 'Bihpuria', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(330, 'Bijni', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(331, 'Bilasipara', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(332, 'Biswanath Chariali', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(333, 'Bohori', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(334, 'Bokajan', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(335, 'Bokokhat', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(336, 'Bongaigaon', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(337, 'Bongaigaon Petro-chemical Town', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(338, 'Borgolai', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(339, 'Chabua', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(340, 'Chandrapur Bagicha', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(341, 'Chapar', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(342, 'Chekonidhara', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(343, 'Choto Haibor', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(344, 'Dergaon', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(345, 'Dharapur', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(346, 'Dhekiajuli', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(347, 'Dhemaji', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(348, 'Dhing', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(349, 'Dhubri', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(350, 'Dhuburi', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(351, 'Dibrugarh', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(352, 'Digboi', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(353, 'Digboi Oil Town', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(354, 'Dimaruguri', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(355, 'Diphu', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(356, 'Dispur', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(357, 'Doboka', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(358, 'Dokmoka', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(359, 'Donkamokan', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(360, 'Duliagaon', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(361, 'Duliajan', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(362, 'Duliajan No.1', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(363, 'Dum Duma', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(364, 'Durga Nagar', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(365, 'Gauripur', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(366, 'Goalpara', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(367, 'Gohpur', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(368, 'Golaghat', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(369, 'Golakganj', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(370, 'Gossaigaon', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(371, 'Guwahati', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(372, 'Haflong', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(373, 'Hailakandi', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(374, 'Hamren', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(375, 'Hauli', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(376, 'Hauraghat', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(377, 'Hojai', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(378, 'Jagiroad', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(379, 'Jagiroad Paper Mill', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(380, 'Jogighopa', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(381, 'Jonai Bazar', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(382, 'Jorhat', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(383, 'Kampur Town', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(384, 'Kamrup', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(385, 'Kanakpur', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(386, 'Karimganj', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(387, 'Kharijapikon', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(388, 'Kharupetia', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(389, 'Kochpara', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(390, 'Kokrajhar', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(391, 'Kumar Kaibarta Gaon', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(392, 'Lakhimpur', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(393, 'Lakhipur', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(394, 'Lala', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(395, 'Lanka', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(396, 'Lido Tikok', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(397, 'Lido Town', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(398, 'Lumding', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(399, 'Lumding Railway Colony', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(400, 'Mahur', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(401, 'Maibong', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(402, 'Majgaon', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(403, 'Makum', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(404, 'Mangaldai', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(405, 'Mankachar', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(406, 'Margherita', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(407, 'Mariani', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(408, 'Marigaon', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(409, 'Moran', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(410, 'Moranhat', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(411, 'Nagaon', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(412, 'Naharkatia', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(413, 'Nalbari', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(414, 'Namrup', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(415, 'Naubaisa Gaon', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(416, 'Nazira', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(417, 'New Bongaigaon Railway Colony', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(418, 'Niz-Hajo', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(419, 'North Guwahati', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(420, 'Numaligarh', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(421, 'Palasbari', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(422, 'Panchgram', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(423, 'Pathsala', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(424, 'Raha', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(425, 'Rangapara', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(426, 'Rangia', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(427, 'Salakati', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(428, 'Sapatgram', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(429, 'Sarthebari', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(430, 'Sarupathar', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(431, 'Sarupathar Bengali', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(432, 'Senchoagaon', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(433, 'Sibsagar', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(434, 'Silapathar', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(435, 'Silchar', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(436, 'Silchar Part-X', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(437, 'Sonari', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(438, 'Sorbhog', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(439, 'Sualkuchi', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(440, 'Tangla', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(441, 'Tezpur', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(442, 'Tihu', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(443, 'Tinsukia', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(444, 'Titabor', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(445, 'Udalguri', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(446, 'Umrangso', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(447, 'Uttar Krishnapur Part-I', 4, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(448, 'Amarpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(449, 'Ara', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(450, 'Araria', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(451, 'Areraj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(452, 'Asarganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(453, 'Aurangabad', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(454, 'Bagaha', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(455, 'Bahadurganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(456, 'Bairgania', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(457, 'Bakhtiyarpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(458, 'Banka', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(459, 'Banmankhi', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(460, 'Bar Bigha', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(461, 'Barauli', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(462, 'Barauni Oil Township', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(463, 'Barh', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(464, 'Barhiya', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(465, 'Bariapur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(466, 'Baruni', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(467, 'Begusarai', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(468, 'Behea', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(469, 'Belsand', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(470, 'Bettiah', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(471, 'Bhabua', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(472, 'Bhagalpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(473, 'Bhimnagar', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(474, 'Bhojpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(475, 'Bihar', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(476, 'Bihar Sharif', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(477, 'Bihariganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(478, 'Bikramganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(479, 'Birpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(480, 'Bodh Gaya', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(481, 'Buxar', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(482, 'Chakia', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(483, 'Chanpatia', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(484, 'Chhapra', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(485, 'Chhatapur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(486, 'Colgong', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(487, 'Dalsingh Sarai', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(488, 'Darbhanga', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(489, 'Daudnagar', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(490, 'Dehri', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(491, 'Dhaka', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(492, 'Dighwara', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(493, 'Dinapur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(494, 'Dinapur Cantonment', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(495, 'Dumra', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(496, 'Dumraon', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(497, 'Fatwa', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(498, 'Forbesganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(499, 'Gaya', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(500, 'Gazipur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(501, 'Ghoghardiha', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(502, 'Gogri Jamalpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(503, 'Gopalganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(504, 'Habibpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(505, 'Hajipur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(506, 'Hasanpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(507, 'Hazaribagh', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(508, 'Hilsa', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(509, 'Hisua', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(510, 'Islampur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(511, 'Jagdispur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(512, 'Jahanabad', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(513, 'Jamalpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(514, 'Jamhaur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(515, 'Jamui', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(516, 'Janakpur Road', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(517, 'Janpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(518, 'Jaynagar', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(519, 'Jha Jha', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(520, 'Jhanjharpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(521, 'Jogbani', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(522, 'Kanti', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(523, 'Kasba', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(524, 'Kataiya', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(525, 'Katihar', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(526, 'Khagaria', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(527, 'Khagaul', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(528, 'Kharagpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(529, 'Khusrupur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(530, 'Kishanganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(531, 'Koath', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(532, 'Koilwar', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(533, 'Lakhisarai', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(534, 'Lalganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(535, 'Lauthaha', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(536, 'Madhepura', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(537, 'Madhubani', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(538, 'Maharajganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(539, 'Mahnar Bazar', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(540, 'Mairwa', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(541, 'Makhdumpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(542, 'Maner', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(543, 'Manihari', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(544, 'Marhaura', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(545, 'Masaurhi', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(546, 'Mirganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(547, 'Mohiuddinagar', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(548, 'Mokama', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(549, 'Motihari', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(550, 'Motipur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(551, 'Munger', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(552, 'Murliganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(553, 'Muzaffarpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(554, 'Nabinagar', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(555, 'Narkatiaganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(556, 'Nasriganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(557, 'Natwar', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(558, 'Naugachhia', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(559, 'Nawada', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(560, 'Nirmali', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(561, 'Nokha', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(562, 'Paharpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(563, 'Patna', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(564, 'Phulwari', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(565, 'Piro', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(566, 'Purnia', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(567, 'Pusa', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(568, 'Rafiganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(569, 'Raghunathpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(570, 'Rajgir', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(571, 'Ramnagar', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(572, 'Raxaul', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(573, 'Revelganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(574, 'Rusera', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(575, 'Sagauli', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(576, 'Saharsa', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(577, 'Samastipur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(578, 'Sasaram', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(579, 'Shahpur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(580, 'Shaikhpura', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(581, 'Sherghati', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(582, 'Shivhar', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(583, 'Silao', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(584, 'Sitamarhi', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(585, 'Siwan', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(586, 'Sonepur', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(587, 'Sultanganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(588, 'Supaul', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(589, 'Teghra', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(590, 'Tekari', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(591, 'Thakurganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(592, 'Vaishali', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(593, 'Waris Aliganj', 5, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(594, 'Chandigarh', 6, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(595, 'Ahiwara', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(596, 'Akaltara', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(597, 'Ambagarh Chauki', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(598, 'Ambikapur', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(599, 'Arang', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(600, 'Bade Bacheli', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(601, 'Bagbahara', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(602, 'Baikunthpur', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(603, 'Balod', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(604, 'Baloda', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(605, 'Baloda Bazar', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(606, 'Banarsi', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(607, 'Basna', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(608, 'Bemetra', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(609, 'Bhanpuri', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(610, 'Bhatapara', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(611, 'Bhatgaon', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(612, 'Bhilai', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(613, 'Bilaspur', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(614, 'Bilha', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(615, 'Birgaon', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(616, 'Bodri', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(617, 'Champa', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(618, 'Charcha', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(619, 'Charoda', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(620, 'Chhuikhadan', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(621, 'Chirmiri', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(622, 'Dantewada', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(623, 'Deori', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(624, 'Dhamdha', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(625, 'Dhamtari', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(626, 'Dharamjaigarh', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(627, 'Dipka', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(628, 'Doman Hill Colliery', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(629, 'Dongargaon', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(630, 'Dongragarh', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(631, 'Durg', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(632, 'Frezarpur', 7, 1, '2017-12-22 15:03:43', 1, '2016-03-01 19:14:15', 1),
(633, 'nhij', 233, 1, '2017-12-22 15:03:43', NULL, NULL, 1),
(634, 'nhij', 233, 1, '2017-12-22 15:03:43', NULL, NULL, 1),
(635, 'Udaipur', 33, 1, '2017-12-22 15:03:43', 1, '2017-12-01 14:57:04', 1),
(636, 'Jaipur', 33, 1, '2017-12-22 15:03:43', NULL, NULL, 1),
(637, 'Testing', 12, 1, '2017-12-22 15:03:43', NULL, NULL, 1),
(638, 'AAA', 660, 1, '2017-12-22 15:03:43', 8, '2018-01-16 17:24:04', 1),
(641, 'qqaaa111', 2, 2, '2024-01-23 23:17:29', 2, '2024-01-23 23:26:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `CMSID` int(11) NOT NULL,
  `PageID` int(11) NOT NULL,
  `Content` text NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`CMSID`, `PageID`, `Content`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `Status`) VALUES
(1, 1, 'TEst', 2, '2024-01-26 09:50:42', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `ConfigID` int(11) NOT NULL,
  `CrashEmail` varchar(50) DEFAULT NULL,
  `SupportEmail` varchar(50) DEFAULT NULL,
  `TimeZone` varchar(10) NOT NULL DEFAULT '+05.30',
  `AppVersionAndroid` double NOT NULL,
  `AppVersionIOS` double NOT NULL,
  `SerialCountStart` double NOT NULL,
  `ReferLink` varchar(250) DEFAULT NULL,
  `SMSUserName` varchar(20) DEFAULT 'samarth',
  `SMSPassword` varchar(20) DEFAULT 'samarth',
  `SMSSenderID` varchar(20) DEFAULT 'Samrth',
  `SMSType` varchar(20) DEFAULT 'Promotional',
  `Requirement` varchar(250) NOT NULL DEFAULT '2 BHK,3 BHK,4 BHK,5 BHK',
  `CommercialRequirement` text DEFAULT NULL COMMENT '2 BHK,3 BHK,4 BHK,5 BHK ',
  `VisitSource` text NOT NULL,
  `LeadType` text NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`ConfigID`, `CrashEmail`, `SupportEmail`, `TimeZone`, `AppVersionAndroid`, `AppVersionIOS`, `SerialCountStart`, `ReferLink`, `SMSUserName`, `SMSPassword`, `SMSSenderID`, `SMSType`, `Requirement`, `CommercialRequirement`, `VisitSource`, `LeadType`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 'Info@yahoo.com', 'Info@gmail.com', '+05:30', 9, 1, 10010, 'https://thepalasa.in/', 'palasa', 'palasa', 'palasa', '1', '3 BHK,3 BHK+,4 BHK,5 BHK,Skyhome,Commercial', '500 - 1000 sq.ft,1000 - 1500 sq.ft,1500 - 2500 sq.ft,2500 - 3500 sq.ft,3500 and above,Residential\n', 'Hoarding,Newspaper,Online Media,Direct Walk-in,Chanel Partners,Phone,Facebook,99Acres,MagicBreaks,Website,GujaratNewspapers,DigitalMarketing,DivyaBhaskar,AhmedabadProperty,Sandeshnewspaper,Reference,Home Online,GoogleAds', 'Cold,Reject,Hot,Warm', 1, '2017-09-14 07:46:53', 1, '2018-01-17 15:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `CountryID` int(11) NOT NULL,
  `CountryName` varchar(250) NOT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryID`, `CountryName`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `Status`) VALUES
(1, 'Afghanistan', 1, '2016-03-01 18:55:49', 23, '2016-08-11 17:28:47', 1),
(3, 'Algeria', 1, '2016-03-01 18:55:49', 1, '2017-12-01 14:49:31', 1),
(4, 'American Samoa', 1, '2016-03-01 18:55:49', 1, '2017-12-01 14:49:22', 1),
(5, 'Andorra', 1, '2016-03-01 18:55:49', 1, '2017-12-01 14:49:22', 1),
(6, 'Angola', 1, '2016-03-01 18:55:49', 0, '2016-08-23 18:24:32', 1),
(7, 'Anguilla', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(8, 'Antarctica', 1, '2016-03-01 18:55:49', 23, '2016-08-09 15:50:41', 1),
(9, 'Antigua And Barbuda', 1, '2016-03-01 18:55:49', 23, '2016-07-27 13:54:44', 1),
(10, 'Argentina', 1, '2016-03-01 18:55:49', 1, '2016-04-21 11:40:35', 0),
(11, 'Armenia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(12, 'Aruba', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(13, 'Australia', 1, '2016-03-01 18:55:49', 1, '2017-12-01 14:50:18', 0),
(14, 'Austria', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(15, 'Azerbaijan', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(16, 'Bahamas The', 1, '2016-03-01 18:55:49', 1, '2017-12-22 14:44:16', 0),
(17, 'Bahrain', 1, '2016-03-01 18:55:49', 23, '2016-08-09 13:29:36', 0),
(18, 'Bangladesh', 1, '2016-03-01 18:55:49', 23, '2016-08-09 13:29:37', 0),
(19, 'Barbados', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(20, 'Belarus', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(21, 'Belgium', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(22, 'Belize', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(23, 'Benin', 1, '2016-03-01 18:55:49', 23, '2016-07-27 15:12:23', 0),
(24, 'Bermuda', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(26, 'Bolivia', 1, '2016-03-01 18:55:49', 23, '2016-07-27 15:12:24', 0),
(27, 'Qwewe', 1, '2016-03-01 18:55:49', 23, '2016-08-09 10:19:29', 1),
(28, 'Botswana', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(29, 'Bouvet Island', 1, '2016-03-01 18:55:49', 23, '2016-07-27 15:12:25', 0),
(30, 'Brazil', 1, '2016-03-01 18:55:49', 23, '2016-07-27 15:12:25', 0),
(31, 'British Indian Ocean Territory', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(32, 'Brunei', 1, '2016-03-01 18:55:49', 23, '2016-07-27 15:12:29', 0),
(33, 'Bulgaria', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(34, 'Burkina Faso', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(35, 'Burundi', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(36, 'Cambodia', 1, '2016-03-01 18:55:49', 23, '2016-07-27 15:12:30', 0),
(37, 'Cameroon', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(38, 'Canada', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(39, 'Cape Verde', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(40, 'Cayman Islands', 1, '2016-03-01 18:55:49', 23, '2016-07-30 17:19:58', 0),
(41, 'Central African Republic', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(42, 'Chad', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(43, 'Chile', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(44, 'China', 1, '2016-03-01 18:55:49', 23, '2016-07-30 17:19:57', 0),
(45, 'Christmas Island', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(46, 'Cocos (Keeling) Islands', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(47, 'Colombia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(48, 'Comoros', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(49, 'Congo', 1, '2016-03-01 18:55:49', 23, '2016-07-30 17:19:56', 0),
(50, 'Congo The Democratic Republic Of The', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(51, 'Cook Islands', 1, '2016-03-01 18:55:49', 23, '2016-07-27 15:12:35', 0),
(52, 'Costa Rica', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(53, 'Cote DIvoire (Ivory Coast)', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(54, 'Croatia (Hrvatska)', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(55, 'Cuba', 1, '2016-03-01 18:55:49', 23, '2016-07-27 15:12:37', 0),
(56, 'Cyprus', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(57, 'Czech Republic', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(58, 'Denmark', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(59, 'Djibouti', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(60, 'Dominica', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(61, 'Dominican Republic', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(62, 'East Timor', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(63, 'Ecuador', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(64, 'Egypt', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(65, 'El Salvador', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(66, 'Equatorial Guinea', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(67, 'Eritrea', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(68, 'Estonia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(69, 'Ethiopia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(70, 'External Territories of Australia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(71, 'Falkland Islands', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(72, 'Faroe Islands', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(73, 'Fiji Islands', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(74, 'Finland', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(75, 'France', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(76, 'French Guiana', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(77, 'French Polynesia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(78, 'French Southern Territories', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(79, 'Gabon', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(80, 'Gambia The', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(81, 'Georgia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(82, 'Germany', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(83, 'Ghana', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(84, 'Gibraltar', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(85, 'Greece', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(86, 'Greenland', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(87, 'Grenada', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(88, 'Guadeloupe', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(89, 'Guam', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(90, 'Guatemala', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(91, 'Guernsey and Alderney', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(92, 'Guinea', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(93, 'Guinea-Bissau', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(94, 'Guyana', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(95, 'Haiti', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(96, 'Heard and McDonald Islands', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(97, 'Honduras', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(98, 'Hong Kong S.A.R.', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(99, 'Hungary', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(100, 'Iceland', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(101, 'India', 1, '2016-03-01 18:55:49', 1, '2016-04-21 11:40:20', 1),
(102, 'Indonesia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(103, 'Iran', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(104, 'Iraq', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(105, 'Ireland', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(106, 'Israel', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(107, 'Italy', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(108, 'Jamaica', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(109, 'Japan', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(110, 'Jersey', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(111, 'Jordan', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(112, 'Kazakhstan', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(113, 'Kenya', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(114, 'Kiribati', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(115, 'Korea North', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(116, 'Korea South', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(117, 'Kuwait', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(118, 'Kyrgyzstan', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(119, 'Laos', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(120, 'Latvia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(121, 'Lebanon', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(122, 'Lesotho', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(123, 'Liberia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(124, 'Libya', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(125, 'Liechtenstein', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(126, 'Lithuania', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(127, 'Luxembourg', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(128, 'Macau S.A.R.', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(129, 'Macedonia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(130, 'Madagascar', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(131, 'Malawi', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(132, 'Malaysia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(133, 'Maldives', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(134, 'Mali', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(135, 'Malta', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(136, 'Man (Isle of)', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(137, 'Marshall Islands', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(138, 'Martinique', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(139, 'Mauritania', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(140, 'Mauritius', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(141, 'Mayotte', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(142, 'Mexico', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(143, 'Micronesia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(144, 'Moldova', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(145, 'Monaco', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(146, 'Mongolia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(147, 'Montserrat', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(148, 'Morocco', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(149, 'Mozambique', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(150, 'Myanmar', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(151, 'Namibia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(152, 'Nauru', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(153, 'Nepal', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(154, 'Netherlands Antilles', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(155, 'Netherlands The', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(156, 'New Caledonia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(157, 'New Zealand', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(158, 'Nicaragua', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(159, 'Niger', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(160, 'Nigeria', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(161, 'Niue', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(162, 'Norfolk Island', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(163, 'Northern Mariana Islands', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(164, 'Norway', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(165, 'Oman', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(166, 'Pakistan', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(167, 'Palau', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(168, 'Palestinian Territory Occupied', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(169, 'Panama', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(170, 'Papua new Guinea', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(171, 'Paraguay', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(172, 'Peru', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(173, 'Philippines', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(174, 'Pitcairn Island', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(175, 'Poland', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(176, 'Portugal', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(177, 'Puerto Rico', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(178, 'Qatar', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(179, 'Reunion', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(180, 'Romania', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(181, 'Russia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(182, 'Rwanda', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(183, 'Saint Helena', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(184, 'Saint Kitts And Nevis', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(185, 'Saint Lucia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(186, 'Saint Pierre and Miquelon', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(187, 'Saint Vincent And The Grenadines', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(188, 'Samoa', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(189, 'San Marino', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(190, 'Sao Tome and Principe', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(191, 'Saudi Arabia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(192, 'Senegal', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(193, 'Serbia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(194, 'Seychelles', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(195, 'Sierra Leone', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(196, 'Singapore', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(197, 'Slovakia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(198, 'Slovenia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(199, 'Smaller Territories of the UK', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(200, 'Solomon Islands', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(201, 'Somalia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(202, 'South Africa', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(203, 'South Georgia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(204, 'South Sudan', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(205, 'Spain', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(206, 'Sri Lanka', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(207, 'Sudan', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(208, 'Suriname', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(209, 'Svalbard And Jan Mayen Islands', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(210, 'Swaziland', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(211, 'Sweden', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(212, 'Switzerland', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(213, 'Syria', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(214, 'Taiwan', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(215, 'Tajikistan', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(216, 'Tanzania', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(217, 'Thailand', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(218, 'Togo', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(219, 'Tokelau', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(220, 'Tonga', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(221, 'Trinidad And Tobago', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(222, 'Tunisia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(223, 'Turkey', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(224, 'Turkmenistan', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(225, 'Turks And Caicos Islands', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(226, 'Tuvalu', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(227, 'Uganda', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(228, 'Ukraine', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(229, 'United Arab Emirates', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(230, 'United Kingdom', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(231, 'United States', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(232, 'United States Minor Outlying Islands', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(233, 'Uruguay', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(234, 'Uzbekistan', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(235, 'Vanuatu', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(236, 'Vatican City State (Holy See)', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(237, 'Venezuela', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(238, 'Vietnam', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(239, 'Virgin Islands (British)', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(240, 'Virgin Islands (US)', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(241, 'Wallis And Futuna Islands', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(242, 'Western Sahara', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(243, 'Yemen', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(244, 'Yugoslavia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(245, 'Zambia', 1, '2016-03-01 18:55:49', 1, '2016-03-01 18:55:49', 1),
(246, 'Assa', 1, '2016-03-01 18:55:49', 23, '2016-08-09 10:19:20', 1),
(320, 'USA', 1, '2016-04-08 14:53:43', 1, '2016-04-19 12:32:32', 1),
(326, 'Testing', 1, '2017-11-30 15:46:13', NULL, NULL, 1),
(327, 'TestingDone', 1, '2017-11-30 15:56:08', 1, '2017-11-30 15:58:04', 1),
(330, 'asasas', 1, '2017-12-01 11:18:53', NULL, NULL, 0),
(331, 'America', 1, '2017-12-01 14:47:39', 1, '2017-12-06 16:54:51', 1),
(332, 'test', 1, '2017-12-01 17:16:29', NULL, NULL, 0),
(334, 'asdasd', 1, '2018-01-11 17:24:04', NULL, NULL, 0),
(342, 'Austria', NULL, '2024-01-22 23:14:15', NULL, NULL, 1),
(343, 'TEst 11', 2, '2024-01-26 09:20:22', 2, '2024-01-26 09:20:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emailsetting`
--

CREATE TABLE `emailsetting` (
  `EmailID` int(11) NOT NULL,
  `PhpMail` tinyint(4) NOT NULL,
  `EmailFrom` varchar(200) NOT NULL,
  `EmailPassword` varchar(200) NOT NULL,
  `EmailFromName` varchar(200) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emailsetting`
--

INSERT INTO `emailsetting` (`EmailID`, `PhpMail`, `EmailFrom`, `EmailPassword`, `EmailFromName`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `Status`) VALUES
(1, 0, 'dastavejwala@gmail.com', '123456789', 'Dastavej Wala', 2, '2024-02-23 19:45:22', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(11) NOT NULL,
  `keywordName` varchar(200) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `createdBy` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `keywordName`, `title`, `status`, `createdBy`, `created_at`, `updated_at`) VALUES
(1, 'Keyword Research', 'Krey Tielw', 0, 2, '2024-08-15 16:23:32', '2024-08-15 10:53:32'),
(2, 'UI Upgrade', 'UI Upgrade Titles.', 1, NULL, '2024-07-27 03:26:56', '2024-07-26 10:57:11'),
(3, 'Arts Data', 'Arts data Title', 0, NULL, '2024-10-03 18:45:47', '2024-10-03 13:15:47'),
(4, 'Fare Fighter', 'Fare Fighter Title', 1, NULL, '2024-10-19 17:38:37', '2024-10-16 10:49:35'),
(7, 'ML', 'ML Info title', 1, 1, '2024-08-15 16:21:31', '2024-07-27 04:41:10'),
(8, 'AI', 'Artificial Inteligance buro', 0, 1, '2024-10-19 17:41:21', '2024-10-19 12:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `LanguageID` int(11) NOT NULL,
  `LanguageName` varchar(100) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`LanguageID`, `LanguageName`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `Status`) VALUES
(1, 'English', 2, '2024-01-28 10:50:23', NULL, NULL, 1),
(2, 'Gujrati', 2, '2024-01-28 11:00:13', NULL, NULL, 1),
(3, 'Hindi', 2, '2024-04-14 10:20:56', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2024_01_14_045740_create_roles_table', 2),
(8, '2024_01_16_164538_create_categorys_table', 3),
(9, '2014_10_12_000000_create_users_table', 4),
(10, '2014_10_12_100000_create_password_reset_tokens_table', 4),
(11, '2014_10_12_100000_create_password_resets_table', 4),
(12, '2019_08_19_000000_create_failed_jobs_table', 4),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(14, '2024_01_14_045955_create_role_user_table', 4),
(15, '2024_07_04_023533_create_prompt_table', 5),
(16, '2024_07_04_030124_create_cache_table', 5),
(17, '2024_07_04_054225_create_project_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `ModuleID` int(11) NOT NULL,
  `ModuleName` varchar(250) NOT NULL,
  `Type` varchar(20) NOT NULL DEFAULT 'Web' COMMENT 'Web,Mobile',
  `ParentID` int(11) NOT NULL DEFAULT 0,
  `Actions` text DEFAULT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`ModuleID`, `ModuleName`, `Type`, `ParentID`, `Actions`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `Status`) VALUES
(1, 'Dashboard', 'Both', 0, '', 1, '2017-11-30 14:51:25', NULL, NULL, 1),
(2, 'Masters', 'Both', 0, NULL, 1, '2017-11-30 14:51:52', NULL, NULL, 1),
(3, 'City', 'Both', 2, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2017-11-30 14:52:18', NULL, NULL, 0),
(4, 'Content_Management', 'Both', 2, 'is_view,is_insert,is_edit,is_status', 1, '2017-11-30 14:53:01', NULL, NULL, 1),
(5, 'Country', 'Both', 2, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2017-10-07 11:06:09', NULL, NULL, 0),
(6, 'Designation', 'Both', 2, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2017-10-03 16:42:45', NULL, NULL, 1),
(7, 'Email_template', 'Both', 2, 'is_view,is_insert,is_edit,is_status', 1, '2017-10-04 09:28:40', NULL, NULL, 1),
(8, 'Group', 'Both', 2, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2017-10-04 10:02:34', NULL, NULL, 1),
(9, 'Message', 'Both', 2, 'is_view,is_edit,is_status,is_export', 1, '2017-11-30 15:58:01', NULL, NULL, 1),
(10, 'Motivational_Quotes', 'Both', 2, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2017-11-30 15:58:01', NULL, NULL, 0),
(11, 'State', 'Both', 2, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2017-12-01 10:28:21', NULL, NULL, 0),
(12, 'Sms_Template', 'Both', 2, 'is_view,is_insert,is_edit,is_status', 1, '2017-12-01 12:15:02', NULL, NULL, 0),
(13, 'Page_Master', 'Both', 2, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2017-12-01 13:10:01', NULL, NULL, 1),
(15, 'User', 'Web', 0, NULL, 1, '2017-12-01 16:56:45', NULL, NULL, 1),
(16, 'Employee_Details', 'Web', 15, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2017-12-01 17:02:52', NULL, NULL, 0),
(17, 'Customer', 'Web', 15, 'is_view,is_export,is_edit', 1, '2017-12-01 17:24:40', NULL, NULL, 1),
(18, 'Customer_Property', 'Web', 17, 'is_view,is_insert,is_edit,is_status,is_export,is_price,is_ats,is_sd,is_verify,is_cancel', 1, '2017-12-01 18:42:11', NULL, NULL, 1),
(19, 'Process', 'Web', 18, 'is_view', 1, '2017-12-02 14:42:39', NULL, NULL, 1),
(20, 'Payment', 'Web', 18, 'is_view,is_insert,is_edit,is_status,is_export,is_price', 1, '2017-12-22 11:23:26', NULL, NULL, 1),
(21, 'Document', 'Web', 18, 'is_view,is_insert', 1, '2017-12-22 19:13:12', NULL, NULL, 1),
(22, 'Payment_Reminder', 'Web', 18, 'is_view,is_insert,is_edit,is_status,is_export,is_sms,is_mail,is_call,is_push,is_response', 1, '2017-12-25 19:10:37', NULL, NULL, 1),
(23, 'Visitor', 'Both', 0, 'is_view,is_insert,is_edit,is_status,is_export,is_sms,is_mail,is_call,is_push,is_convert', 1, '2017-12-25 19:13:59', NULL, NULL, 1),
(24, 'Visitor_Reminder', 'Both', 23, 'is_view,is_insert,is_edit,is_status,is_export,is_sms,is_mail,is_call,is_push,is_response', 1, '2017-12-25 19:14:24', NULL, NULL, 1),
(25, 'Configuration', 'Both', 0, NULL, 1, '2017-12-01 17:24:40', NULL, NULL, 1),
(26, 'Admin_Activity_Log', 'Both', 25, 'is_view,is_export', 1, '2017-12-01 18:42:11', NULL, NULL, 1),
(27, 'Configuration', 'Both', 25, 'is_view,is_edit', 1, '2017-12-02 14:42:39', NULL, NULL, 1),
(28, 'Error_Log', 'Both', 25, 'is_view,is_export', 1, '2017-12-22 11:23:26', NULL, NULL, 1),
(29, 'Project', 'Both', 0, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2017-12-22 19:13:12', NULL, NULL, 1),
(30, 'Property', 'Both', 29, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2017-12-25 19:10:37', NULL, NULL, 1),
(31, 'MileStone', 'Both', 29, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2017-12-25 19:13:59', NULL, NULL, 1),
(32, 'Gallery', 'Both', 29, 'is_view,is_insert', 1, '2017-12-25 19:14:24', NULL, NULL, 1),
(33, 'Rules', 'Both', 29, 'is_view', 1, '2017-12-25 19:17:38', NULL, NULL, 1),
(34, 'Bulk_Message', 'Both', 0, 'is_view', 1, '2017-12-25 19:28:40', NULL, NULL, 1),
(35, 'Customer', 'Mobile', 0, 'is_view', 1, '2017-12-01 17:24:40', NULL, NULL, 1),
(36, 'Customer_Property', 'Mobile', 35, 'is_view,is_insert,is_push,is_price,is_ats,is_sd,is_verify', 1, '2017-12-01 18:42:11', NULL, NULL, 1),
(37, 'Process', 'Mobile', 36, 'is_view', 1, '2017-12-02 14:42:39', NULL, NULL, 1),
(38, 'Payment', 'Mobile', 36, 'is_view,is_insert,is_push,is_price', 1, '2017-12-22 11:23:26', NULL, NULL, 1),
(39, 'Document', 'Mobile', 36, 'is_view,is_insert', 1, '2017-12-22 19:13:12', NULL, NULL, 1),
(40, 'Payment_Reminder', 'Mobile', 36, 'is_view,is_insert,is_sms,is_mail,is_call,is_push,is_response', 1, '2017-12-25 19:10:37', NULL, NULL, 1),
(41, 'Report', 'Both', 0, 'is_view', 1, '2018-02-07 19:46:20', NULL, NULL, 1),
(42, 'Due_Collection', 'Both', 41, 'is_view,is_export', 1, '2018-02-07 19:47:55', NULL, NULL, 1),
(43, 'Payment', 'Both', 41, 'is_view,is_export', 1, '2018-02-07 19:47:55', NULL, NULL, 1),
(44, 'Cancel_Hold_Property', 'Both', 41, 'is_view', 1, '2018-03-14 12:34:42', NULL, NULL, 1),
(45, 'Refund', 'Web', 18, 'is_view,is_insert,is_edit,is_export', 1, '2017-12-02 14:42:39', NULL, NULL, 1),
(46, 'ChanelPartner', 'Both', 2, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2018-10-12 18:40:33', NULL, NULL, 1),
(47, 'CustomerPropertyReport', 'Both', 41, 'is_view,is_export', 1, '2018-10-15 10:28:36', NULL, NULL, 1),
(49, 'Category', 'Web', 2, 'is_view,is_insert,is_edit,is_status,is_export', 2, '2019-02-11 13:50:41', NULL, NULL, 1),
(50, 'UOM', 'Web', 2, 'is_view,is_insert,is_edit,is_status,is_export', 2, '2019-02-12 12:31:20', NULL, NULL, 1),
(51, 'Goods', 'Web', 2, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2019-03-08 12:36:55', NULL, NULL, 1),
(52, 'Vendor', 'Web', 15, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2019-03-08 15:36:09', NULL, NULL, 1),
(53, 'Inward', 'Web', 2, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2019-04-12 13:09:03', NULL, NULL, 1),
(54, 'Total Amount Report', 'Both', 41, 'is_view,is_export', 1, '2019-04-12 13:27:21', NULL, NULL, 1),
(55, 'Follow Up Report', 'Both', 41, 'is_view,is_export', 1, '2019-04-12 13:27:21', NULL, NULL, 1),
(56, 'Feedback', 'Web', 2, 'is_view,is_insert,is_edit,is_status,is_export', 1, '2020-01-21 15:12:47', NULL, NULL, 1),
(57, 'DSR Report', 'Both', 41, 'is_view,is_export,is_insert', 1, '2020-01-22 15:46:18', NULL, NULL, 1),
(58, 'Upcoming Birthday', 'Both', 41, 'is_view,is_export', 1, '2020-01-24 17:55:53', NULL, NULL, 1),
(59, 'Upcoming Anniversary', 'Both', 41, 'is_view,is_export', 1, '2020-01-24 17:55:53', NULL, NULL, 1),
(60, 'Opportunity', 'Both', 41, 'is_view,is_export,is_insert', 1, '2020-01-31 12:12:04', NULL, NULL, 1),
(61, 'Notification', 'Both', 41, 'is_view,is_export', 1, '2020-02-26 12:45:28', NULL, NULL, 1),
(62, 'Visitor Designation', 'Both', 36, 'is_view,is_export', 1, '2020-05-29 13:30:28', NULL, NULL, 1),
(63, 'Opportunity', 'Both', 36, 'is_view,is_export', 1, '2020-05-30 04:13:28', NULL, NULL, 1),
(64, 'Visitor', 'Both', 36, 'is_view,is_export', 1, '2020-05-30 05:35:42', NULL, NULL, 1),
(65, 'LeadType', 'Both', 36, 'is_view,is_export', 1, '2020-05-30 06:54:49', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pagemaster`
--

CREATE TABLE `pagemaster` (
  `PageID` int(11) NOT NULL,
  `PageName` varchar(250) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin_panel_access', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(2, 'users_access', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(3, 'user_edit', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(4, 'user_delete', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(5, 'user_create', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(6, 'user_show', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(7, 'roles_access', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(8, 'role_edit', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(9, 'role_delete', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(10, 'role_create', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(11, 'role_show', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(12, 'permissions_access', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(13, 'permission_edit', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(14, 'permission_delete', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(15, 'permission_create', '2024-04-19 12:26:40', '2024-04-19 12:26:40'),
(16, 'project_access', '2024-04-19 14:27:58', '2024-04-19 14:27:58'),
(17, 'project_edit', '2024-04-19 14:29:46', '2024-04-19 14:29:46'),
(18, 'project_create', '2024-04-19 14:32:00', '2024-04-19 14:32:00'),
(19, 'permission_view', '2024-04-20 03:19:48', '2024-04-20 03:19:48'),
(20, 'role_view', '2024-04-20 03:19:54', '2024-04-20 03:19:54'),
(27, 'keyword_access', NULL, NULL),
(28, 'keyword_edit', NULL, NULL),
(29, 'keyword_delete', NULL, NULL),
(30, 'keyword_create', NULL, NULL),
(31, 'keyword_show', NULL, NULL),
(32, 'AI_access', NULL, NULL),
(33, 'AI_edit', NULL, NULL),
(34, 'AI_delete', NULL, NULL),
(35, 'AI_create', NULL, NULL),
(36, 'AI_show', NULL, NULL),
(37, 'Blog_access', NULL, NULL),
(38, 'Blog_edit', NULL, NULL),
(39, 'Blog_delete', NULL, NULL),
(40, 'Blog_create', NULL, NULL),
(41, 'Blog_show', NULL, NULL),
(42, 'affiliate_access', NULL, NULL),
(43, 'affiliate_edit', NULL, NULL),
(44, 'affiliate_delete', NULL, NULL),
(45, 'affiliate_create', NULL, NULL),
(46, 'affiliate_show', NULL, NULL),
(47, 'category_access', NULL, NULL),
(48, 'category_edit', NULL, NULL),
(49, 'category_delete', NULL, NULL),
(50, 'category_create', NULL, NULL),
(51, 'category_show', NULL, NULL),
(52, 'prompt_access', NULL, NULL),
(53, 'prompt_edit', NULL, NULL),
(54, 'prompt_delete', NULL, NULL),
(55, 'prompt_create', NULL, NULL),
(56, 'prompt_show', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(10) UNSIGNED NOT NULL,
  `projectName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activationCode` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promptID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `isConnected` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `projectName`, `category`, `subcategory`, `activationCode`, `promptID`, `status`, `isConnected`, `createdBy`, `created_at`, `updated_at`) VALUES
(1, 'project.com', 'Sports', 'cricket', 'fBSZTEJyTcdjUwkedfrer', 5, 1, 0, 1, '2024-07-04 00:37:53', '2024-07-12 09:31:09'),
(2, 'abc.com', 'Finance', 'dfgdf', 'fBSZTEJyTcdjUwkeiofj', 4, 1, 0, 1, '2024-07-04 03:12:41', '2024-07-05 22:21:34'),
(3, 'jf.com', 'Finance', 'dfgdfgdfg', '894Cv880AcdsKkKad59o', 4, 1, 0, 1, '2024-07-05 22:17:32', '2024-07-05 22:21:45'),
(4, 'new.com', 'Finance', 'Testst', 'of6QFytxvP2vEXzcxFFT', 5, 1, 0, 1, '2024-07-06 23:47:37', '2024-07-06 23:47:37'),
(5, 'xyz.com', 'Travel', 'Tr', 'pIG5R3SKepUUKR7gNjcA', 7, 1, 0, 1, '2024-07-26 21:27:54', '2024-07-26 21:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `prompts`
--

CREATE TABLE `prompts` (
  `id` int(10) UNSIGNED NOT NULL,
  `prompt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tone_of_voice` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `act_as` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `character` int(11) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdBy` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prompts`
--

INSERT INTO `prompts` (`id`, `prompt`, `language`, `tone_of_voice`, `act_as`, `character`, `description`, `status`, `createdBy`, `created_at`, `updated_at`) VALUES
(4, 'Market', 'English', 'Casual', 'Market Trends', 15000, '<p>Prompt: Write an article on [Keyword]</p><p>Instructions:</p><p>Act as a: [Expert/Professional/Enthusiast/Journalist] Language: [English/Spanish/French/etc.] Tone of voice: [Friendly/Professional/Casual/Formal/Inspirational] Target audience: [Beginners/Intermediate/Advanced/General Audience] Word count: 15000 Article structure: Introduction: Start with a compelling hook related to [Keyword]. Provide an overview of what the article will cover. Main Body: Section 1: Overview of [Keyword] Explain what [Keyword] is and its importance. Include any relevant history or background information. Section 2: Key Aspects of [Keyword] Discuss the main features, benefits, or components of [Keyword]. Use bullet points or subheadings for clarity. Section 3: Practical Applications/Tips Provide practical advice, tips, or examples on how to use or implement [Keyword]. Include real-life examples or case studies if possible. Conclusion: Summarize the key points discussed in the article. Encourage readers to take action or learn more about [Keyword]. End with a call to action, such as subscribing to a newsletter, visiting a website, or trying out a product/service.</p><p>Additional Elements:</p><p>Images: Include relevant images or infographics to enhance the content. Links: Add links to reputable sources for further reading or references. SEO Considerations: Meta Description: Write a concise and engaging meta description summarizing the article. Keywords: Use [Keyword] and related terms naturally throughout the article.</p>', 1, 1, '2024-07-03 22:35:10', '2024-07-16 11:42:07'),
(5, 'Strategie', 'English', 'Absurd', 'Leadership Strategies', 1500, '<p>Prompt: Write an article on [Keyword]</p><p>Instructions:</p><p>Act as a: [Expert/Professional/Enthusiast/Journalist] Language: [English/Spanish/French/etc.] Tone of voice: [Friendly/Professional/Casual/Formal/Inspirational] Target audience: [Beginners/Intermediate/Advanced/General Audience] Word count: [500/1000/1500/etc.] Article structure: Introduction: Start with a compelling hook related to [Keyword]. Provide an overview of what the article will cover. Main Body: Section 1: Overview of [Keyword] Explain what [Keyword] is and its importance. Include any relevant history or background information. Section 2: Key Aspects of [Keyword] Discuss the main features, benefits, or components of [Keyword]. Use bullet points or subheadings for clarity. Section 3: Practical Applications/Tips Provide practical advice, tips, or examples on how to use or implement [Keyword]. Include real-life examples or case studies if possible. Conclusion: Summarize the key points discussed in the article. Encourage readers to take action or learn more about [Keyword]. End with a call to action, such as subscribing to a newsletter, visiting a website, or trying out a product/service.</p><p>Additional Elements:</p><p>Images: Include relevant images or infographics to enhance the content. Links: Add links to reputable sources for further reading or references. SEO Considerations: Meta Description: Write a concise and engaging meta description summarizing the article. Keywords: Use [Keyword] and related terms naturally throughout the article.</p>', 1, 1, '2024-07-03 23:12:41', '2024-07-04 00:06:33'),
(6, 'Financial TEst', 'Italian', 'Aggression', 'Financial Planning 2', 2102, '<p>Prompt: Write an article on [Keyword]</p><p>Instructions:</p><p>Act as a: Financial Planning 2<br>Language: Italian<br>Tone of voice: Aggression&nbsp;<br>Target audience: [Beginners/Intermediate/Advanced/General Audience]&nbsp;<br>Word count: 2102&nbsp;<br><br>Article structure:&nbsp;<br>Introduction: Start with a compelling hook related to [Keyword]. Provide an overview of what the article will cover.&nbsp;<br><br>Main Body:<br><br>Section 1: Overview of [Keyword] Explain what [Keyword] is and its importance. Include any relevant history or background information.&nbsp;<br><br>Section 2: Key Aspects of [Keyword] Discuss the main features, benefits, or components of [Keyword]. Use bullet points or subheadings for clarity.&nbsp;<br><br>Section 3: Practical Applications/Tips Provide practical advice, tips, or examples on how to use or implement [Keyword]. Include real-life examples or case studies if possible.&nbsp;<br><br>Conclusion: Summarize the key points discussed in the article. Encourage readers to take action or learn more about [Keyword]. End with a call to action, such as subscribing to a newsletter, visiting a website, or trying out a product/service.</p><p>Additional Elements:</p><p>Images: Include relevant images or infographics to enhance the content. Links: Add links to reputable sources for further reading or references.&nbsp;<br><br>SEO Considerations:<br>Meta Description: Write a concise and engaging meta description summarizing the article.&nbsp;<br>Keywords: Use [Keyword] and related terms naturally throughout the article.</p>', 1, 1, '2024-07-20 12:11:24', '2024-07-23 11:50:52'),
(7, 'AI Prompt Ttt', 'English', 'Accusatory', 'AI Art', 1501, '<p>Prompt: Write an article on [Keyword]</p><p>Instructions:</p><p>Act as a: AI Art<br>Language: English<br>Tone of voice: Accusatory&nbsp;<br>Target audience: [Beginners/Intermediate/Advanced/General Audience]&nbsp;<br>Word count: 1501&nbsp;<br><br>Article structure:&nbsp;<br>Introduction: Start with a compelling hook related to [Keyword]. Provide an overview of what the article will cover.&nbsp;<br><br>Main Body:<br><br>Section 1: Overview of [Keyword] Explain what [Keyword] is and its importance. Include any relevant history or background information.&nbsp;<br><br>Section 2: Key Aspects of [Keyword] Discuss the main features, benefits, or components of [Keyword]. Use bullet points or subheadings for clarity.&nbsp;<br><br>Section 3: Practical Applications/Tips Provide practical advice, tips, or examples on how to use or implement [Keyword]. Include real-life examples or case studies if possible.&nbsp;<br><br>Conclusion: Summarize the key points discussed in the article. Encourage readers to take action or learn more about [Keyword]. End with a call to action, such as subscribing to a newsletter, visiting a website, or trying out a product/service.</p><p>Additional Elements:</p><p>Images: Include relevant images or infographics to enhance the content. Links: Add links to reputable sources for further reading or references.&nbsp;<br><br>SEO Considerations:<br>Meta Description: Write a concise and engaging meta description summarizing the article.&nbsp;<br>Keywords: Use [Keyword] and related terms naturally throughout the article.</p>', 1, 1, '2024-07-26 21:27:32', '2024-07-26 21:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `rolemap`
--

CREATE TABLE `rolemap` (
  `RoleMapID` int(11) NOT NULL,
  `RoleProjectID` int(11) NOT NULL,
  `ModuleID` int(11) NOT NULL,
  `is_insert` int(11) NOT NULL DEFAULT 0,
  `is_view` int(11) NOT NULL DEFAULT 0,
  `is_edit` int(11) NOT NULL DEFAULT 0,
  `is_status` int(11) NOT NULL DEFAULT 0,
  `is_export` int(11) NOT NULL DEFAULT 0,
  `is_sms` int(11) NOT NULL DEFAULT 0,
  `is_mail` int(11) NOT NULL DEFAULT 0,
  `is_call` int(11) NOT NULL DEFAULT 0,
  `is_push` int(11) NOT NULL DEFAULT 0,
  `is_response` int(11) NOT NULL DEFAULT 0,
  `is_convert` int(11) NOT NULL DEFAULT 0,
  `is_price` int(11) NOT NULL DEFAULT 0,
  `is_ats` int(11) NOT NULL DEFAULT 0,
  `is_sd` int(11) NOT NULL DEFAULT 0,
  `is_verify` int(11) NOT NULL DEFAULT 0,
  `is_cancel` int(11) NOT NULL DEFAULT 0,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) NOT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roleproject`
--

CREATE TABLE `roleproject` (
  `RoleProjectID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roleproject`
--

INSERT INTO `roleproject` (`RoleProjectID`, `RoleID`, `ProjectID`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 2, 1, 3, '2024-02-10 13:25:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(150) NOT NULL,
  `Description` text NOT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleID`, `RoleName`, `Description`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `created_at`, `updated_at`, `Status`) VALUES
(1, 'Manager', 'Admin', 0, '2024-02-09 22:37:12', NULL, NULL, '2024-09-14 11:16:37', NULL, 1),
(2, 'Keyword Researcher', 'Keyword Researcher', 2, '2024-02-09 22:37:12', NULL, NULL, '2024-09-14 11:16:37', NULL, 1),
(3, 'Content Manager', 'Content Manager', 2, '2024-02-09 22:37:39', NULL, NULL, '2024-09-14 11:16:37', NULL, 1),
(4, 'Product Manager', 'Product Manager', 2, '2024-02-09 22:37:39', NULL, NULL, '2024-09-14 11:16:37', NULL, 1),
(5, 'f', 'cxv', NULL, '2024-09-14 11:57:32', NULL, NULL, '2024-09-14 06:27:32', '2024-09-14 06:27:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(2, 1),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(2, 16),
(2, 17),
(2, 18),
(2, 23),
(3, 1),
(3, 16),
(3, 23),
(2, 24),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(4, 27),
(4, 28),
(4, 29),
(4, 30),
(4, 31),
(4, 32),
(4, 33),
(4, 34),
(4, 35),
(4, 36),
(4, 37),
(4, 38),
(4, 39),
(4, 40),
(4, 41),
(4, 42),
(4, 43),
(4, 44),
(4, 45),
(4, 46),
(4, 47),
(4, 48),
(4, 49),
(4, 50),
(4, 51),
(4, 52),
(4, 53),
(4, 54),
(4, 55),
(4, 56),
(5, 1),
(5, 2),
(5, 3),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(5, 15),
(5, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(5, 27),
(5, 28),
(5, 29),
(5, 30),
(5, 31),
(5, 32),
(5, 33),
(5, 34),
(5, 35),
(5, 36),
(5, 37),
(5, 38),
(5, 39),
(5, 40),
(5, 41),
(5, 42),
(5, 43),
(5, 44),
(5, 45),
(5, 46),
(5, 47),
(5, 48),
(5, 49),
(5, 50),
(5, 51),
(5, 52),
(5, 53),
(5, 54),
(5, 55),
(5, 56),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `SettingID` int(11) NOT NULL,
  `apiTitle` varchar(255) NOT NULL,
  `apikey` varchar(255) NOT NULL,
  `secretKey` varchar(255) NOT NULL,
  `apiDocLink` varchar(255) NOT NULL,
  `billingLink` varchar(255) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`SettingID`, `apiTitle`, `apikey`, `secretKey`, `apiDocLink`, `billingLink`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `Status`) VALUES
(2, 'Open AI Chats', 'sk-proj-TTN7Lkkz9byaJ6nIuwOjT3BlbkFJjbS02vsSiaFcaEs2y8EN', 'sk-proj-TTN7Lkkz9byaJ6nIuwOjT3BlbkFJjbS02vsSiaFcaEs2y8EN', 'https://platform.openai.com/docs/models/gpt-4-turbo-and-gpt-4', 'https://platform.openai.com/docs/models/gpt-4-turbo-and-gpt-4s', 1, NULL, NULL, NULL, 1),
(3, 'Open AI Chat', 'sk-proj-TTN7Lkkz9byaJ6nIuwOjT3BlbkFJjbS02vsSiaFcaEs2y8EN', 'sk-proj-TTN7Lkkz9byaJ6nIuwOjT3BlbkFJjbS02vsSiaFcaEs2y8EN', 'https://platform.openai.com/docs/models/gpt-4-turbo-and-gpt-4', 'https://platform.openai.com/docs/models/gpt-4-turbo-and-gpt-4s', 1, NULL, NULL, NULL, 0),
(4, 'freepik', 'FPSXe85ba70e261d47c7a7e4a342fdfa3434', 'FPSXe85ba70e261d47c7a7e4a342fdfa3434', 'https://www.freepik.com/log-in?client_id=freepik&lang=en', 'FPSXe85ba70e261d47c7a7e4a342fdfa3434', 1, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `StateID` int(11) NOT NULL,
  `StateName` varchar(250) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`StateID`, `StateName`, `CountryID`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `Status`) VALUES
(1, 'Andaman and Nicobar Islands', 1, 1, '2016-03-01 00:00:00', 9999, '2016-03-18 18:18:24', 1),
(2, 'Andhra Pradesh', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(3, 'Arunachal Pradesh', 101, 1, '2016-03-01 00:00:00', 1, '2017-12-22 14:32:30', 1),
(4, 'Assam', 101, 1, '2016-03-01 00:00:00', 1, '2017-12-22 14:33:01', 1),
(5, 'Bihar', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(6, 'Chandigarh', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(7, 'Chhattisgarh', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(8, 'Dadra and Nagar Haveli', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(9, 'Daman and Diu', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(10, 'Delhi', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(11, 'Goa', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(12, 'Gujarat', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(13, 'Haryana', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 0),
(14, 'Himachal Pradesh', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(15, 'Jammu and Kashmir', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(16, 'Jharkhand', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(17, 'Karnataka', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(18, 'Kenmore', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(19, 'Kerala', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(20, 'Lakshadweep', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(21, 'Madhya Pradesh', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(22, 'Maharashtra', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(23, 'Manipur', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(24, 'Meghalaya', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(25, 'Mizoram', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(26, 'Nagaland', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(27, 'Narora', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(28, 'Natwar', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(29, 'Odisha', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(30, 'Paschim Medinipur', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(31, 'Pondicherry', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(32, 'Punjab', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(33, 'Rajasthan', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(34, 'Sikkim', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(35, 'Tamil Nadu', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(36, 'Telangana', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(37, 'Tripura', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(38, 'Uttar Pradesh', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(39, 'Uttarakhand', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(40, 'Vaishali', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(41, 'West Bengal', 101, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(42, 'Badakhshan', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(43, 'Badgis', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(44, 'Baglan', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(45, 'Balkh', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(46, 'Bamiyan', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(47, 'Farah', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(48, 'Faryab', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(49, 'Gawr', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(50, 'Gazni', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(51, 'Herat', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(52, 'Hilmand', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(53, 'Jawzjan', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(54, 'Kabul', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(55, 'Kapisa', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(56, 'Khawst', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(57, 'Kunar', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(58, 'Lagman', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(59, 'Lawghar', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(60, 'Nangarhar', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(61, 'Nimruz', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(62, 'Nuristan', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(63, 'Paktika', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(64, 'Paktiya', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(65, 'Parwan', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(66, 'Qandahar', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(67, 'Qunduz', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(68, 'Samangan', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(69, 'Sar-e Pul', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(70, 'Takhar', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(71, 'Uruzgan', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(72, 'Wardag', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(73, 'Zabul', 1, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(74, 'Berat', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(75, 'Bulqize', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(76, 'Delvine', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(77, 'Devoll', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(78, 'Dibre', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(79, 'Durres', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(80, 'Elbasan', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(81, 'Fier', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(82, 'Gjirokaster', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(83, 'Gramsh', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(84, 'Has', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(85, 'Kavaje', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(86, 'Kolonje', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(87, 'Korce', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(88, 'Kruje', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(89, 'Kucove', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(90, 'Kukes', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(91, 'Kurbin', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(92, 'Lezhe', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(93, 'Librazhd', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(94, 'Lushnje', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(95, 'Mallakaster', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(96, 'Malsi e Madhe', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(97, 'Mat', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(98, 'Mirdite', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(99, 'Peqin', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(100, 'Permet', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(101, 'Pogradec', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(102, 'Puke', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(103, 'Sarande', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(104, 'Shkoder', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(105, 'Skrapar', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(106, 'Tepelene', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(107, 'Tirane', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(108, 'Tropoje', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(109, 'Vlore', 2, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(111, 'Ayn Tamushanat', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-11 17:33:51', 0),
(112, 'Adrar', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(113, 'Algiers', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(114, 'Annabah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(115, 'Bashshar', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(116, 'Batnah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(117, 'Bijayah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(118, 'Biskrah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(119, 'Blidah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(120, 'Buirah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(121, 'Bumardas', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(122, 'Burj Bu Arririj', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(123, 'Ghalizan', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(124, 'Ghardayah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(125, 'Ilizi', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(126, 'Jijili', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(127, 'Jilfah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(128, 'Khanshalah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(129, 'Masilah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(130, 'Midyah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(131, 'Milah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(132, 'Muaskar', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(133, 'Mustaghanam', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(134, 'Naama', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(135, 'Oran', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(136, 'Ouargla', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(137, 'Qalmah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(138, 'Qustantinah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(139, 'Sakikdah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(140, 'Satif', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(141, 'Sayda', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(142, 'Sidi ban-al-Abbas', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(143, 'Suq Ahras', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(144, 'Tamanghasat', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(145, 'Tibazah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(146, 'Tibissah', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(147, 'Tilimsan', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(148, 'Tinduf', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(149, 'Tisamsilt', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(150, 'Tiyarat', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(151, 'Tizi Wazu', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(152, 'Umm-al-Bawaghi', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(153, 'Wahran', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(154, 'Warqla', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(155, 'Wilaya d Alger', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(156, 'Wilaya de Bejaia', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(157, 'Wilaya de Constantine', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(158, 'al-Aghwat', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(159, 'al-Bayadh', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(160, 'al-Jaza\'ir', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(161, 'al-Wad', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(162, 'ash-Shalif', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(163, 'at-Tarif', 3, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(164, 'Eastern', 4, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(165, 'Manu\'a', 4, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(166, 'Swains Island', 4, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(167, 'Western', 4, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(168, 'Andorra la Vella', 5, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(169, 'Canillo', 5, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(170, 'Encamp', 5, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(171, 'La Massana', 5, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(172, 'Les Escaldes', 5, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(173, 'Ordino', 5, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(174, 'Sant Julia de Loria', 5, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(175, 'Bengo', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(176, 'Benguela', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(177, 'Bie', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(178, 'Cabinda', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(179, 'Cunene', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(180, 'Huambo', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(181, 'Huila', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(182, 'Kuando-Kubango', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(183, 'Kwanza Norte', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(184, 'Kwanza Sul', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(185, 'Luanda', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(186, 'Lunda Norte', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(187, 'Lunda Sul', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(188, 'Malanje', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(189, 'Moxico', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(190, 'Namibe', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(191, 'Uige', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(192, 'Zaire', 6, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(193, 'Other Provinces', 7, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(194, 'Sector claimed by Argentina/Ch', 8, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(195, 'Sector claimed by Argentina/UK', 8, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(196, 'Sector claimed by Australia', 8, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(197, 'Sector claimed by France', 8, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(198, 'Sector claimed by New Zealand', 8, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(199, 'Sector claimed by Norway', 8, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(200, 'Unclaimed Sector', 8, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(201, 'Barbuda', 9, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(202, 'Saint George', 9, 1, '2016-03-01 00:00:00', 23, '2016-07-27 18:27:27', 0),
(203, 'Saint John', 9, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(204, 'Saint Mary', 9, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(205, 'Saint Paul', 9, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(206, 'Saint Peter', 9, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(207, 'Saint Philip', 9, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(208, 'Buenos Aires', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(209, 'Catamarca', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(210, 'Chaco', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(211, 'Chubut', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(212, 'Cordoba', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(213, 'Corrientes', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(214, 'Distrito Federal', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(215, 'Entre Rios', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(216, 'Formosa', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(217, 'Jujuy', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(218, 'La Pampa', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(219, 'La Rioja', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(220, 'Mendoza', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(221, 'Misiones', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(222, 'Neuquen', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(223, 'Rio Negro', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(224, 'Salta', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(225, 'San Juan', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(226, 'San Luis', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(227, 'Santa Cruz', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(228, 'Santa Fe', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(229, 'Santiago del Estero', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(230, 'Tierra del Fuego', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(231, 'Tucuman', 10, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(232, 'Aragatsotn', 11, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(233, 'Ararat', 11, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(234, 'Armavir', 11, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(235, 'Gegharkunik', 11, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(236, 'Kotaik', 11, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(237, 'Lori', 11, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(238, 'Shirak', 11, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(239, 'Stepanakert', 11, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(240, 'Syunik', 11, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(241, 'Tavush', 11, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(242, 'Vayots Dzor', 11, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(243, 'Yerevan', 11, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(244, 'Aruba', 12, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(245, 'Auckland', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(246, 'Australian Capital Territory', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(247, 'Balgowlah', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(248, 'Balmain', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(249, 'Bankstown', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(250, 'Baulkham Hills', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(251, 'Bonnet Bay', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(252, 'Camberwell', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(253, 'Carole Park', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(254, 'Castle Hill', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(255, 'Caulfield', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(256, 'Chatswood', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(257, 'Cheltenham', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(258, 'Cherrybrook', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(259, 'Clayton', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(260, 'Collingwood', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(261, 'Frenchs Forest', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(262, 'Hawthorn', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(263, 'Jannnali', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(264, 'Knoxfield', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(265, 'Melbourne', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(266, 'New South Wales', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(267, 'Northern Territory', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(268, 'Perth', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(269, 'Queensland', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(270, 'South Australia', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(271, 'Tasmania', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(272, 'Templestowe', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(273, 'Victoria', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(274, 'Werribee south', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(275, 'Western Australia', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(276, 'Wheeler', 13, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(277, 'Bundesland Salzburg', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(278, 'Bundesland Steiermark', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(279, 'Bundesland Tirol', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(280, 'Burgenland', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(281, 'Carinthia', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(282, 'Karnten', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(283, 'Liezen', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(284, 'Lower Austria', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(285, 'Niederosterreich', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(286, 'Oberosterreich', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(287, 'Salzburg', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(288, 'Schleswig-Holstein', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(289, 'Steiermark', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(290, 'Styria', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(291, 'Tirol', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(292, 'Upper Austria', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(293, 'Vorarlberg', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(294, 'Wien', 14, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(295, 'Abseron', 15, 1, '2016-03-01 00:00:00', 1, '2016-07-12 12:13:06', 1),
(296, 'Baki Sahari', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(297, 'Ganca', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(298, 'Ganja', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(299, 'Kalbacar', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(300, 'Lankaran', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(301, 'Mil-Qarabax', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(302, 'Mugan-Salyan', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(303, 'Nagorni-Qarabax', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(304, 'Naxcivan', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(305, 'Priaraks', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(306, 'Qazax', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(307, 'Saki', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(308, 'Sirvan', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(309, 'Xacmaz', 15, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(311, 'Acklins Island', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(312, 'Andros', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(313, 'Berry Islands', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(314, 'Biminis', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(315, 'Cat Island', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(316, 'Crooked Island', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(317, 'Eleuthera', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(318, 'Exuma and Cays', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(319, 'Grand Bahama', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(320, 'Inagua Islands', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(321, 'Long Island', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(322, 'Mayaguana', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(323, 'New Providence', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(324, 'Ragged Island', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(325, 'Rum Cay', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(326, 'San Salvador', 16, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(327, 'Isa', 17, 1, '2016-03-01 00:00:00', 1, '2016-03-17 17:07:32', 0),
(328, 'Badiyah', 17, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(329, 'Hidd', 17, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(330, 'Jidd Hafs', 17, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(331, 'Mahama', 17, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(332, 'Manama', 17, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(333, 'Sitrah', 17, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(334, 'al-Manamah', 17, 1, '2016-03-01 00:00:00', 23, '2016-08-11 10:13:15', 0),
(335, 'al-Muharraq', 17, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(336, 'ar-Rifaa', 17, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(337, 'Bagar Hat', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(338, 'Bandarban', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(339, 'Barguna', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(340, 'Barisal', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(341, 'Bhola', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(342, 'Bogora', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(343, 'Brahman Bariya', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(344, 'Chandpur', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(345, 'Chattagam', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(346, 'Chittagong Division', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(347, 'Chuadanga', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(348, 'Dhaka', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(349, 'Dinajpur', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(350, 'Faridpur', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(351, 'Feni', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(352, 'Gaybanda', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(353, 'Gazipur', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(354, 'Gopalganj', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(355, 'Habiganj', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(356, 'Jaipur Hat', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(357, 'Jamalpur', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(358, 'Jessor', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(359, 'Jhalakati', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(360, 'Jhanaydah', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(361, 'Khagrachhari', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(362, 'Khulna', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(363, 'Kishorganj', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(364, 'Koks Bazar', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(365, 'Komilla', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(366, 'Kurigram', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(367, 'Kushtiya', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(368, 'Lakshmipur', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(369, 'Lalmanir Hat', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(370, 'Madaripur', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(371, 'Magura', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(372, 'Maimansingh', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(373, 'Manikganj', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(374, 'Maulvi Bazar', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(375, 'Meherpur', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(376, 'Munshiganj', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(377, 'Naral', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(378, 'Narayanganj', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(379, 'Narsingdi', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(380, 'Nator', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(381, 'Naugaon', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(382, 'Nawabganj', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(383, 'Netrakona', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(384, 'Nilphamari', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(385, 'Noakhali', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(386, 'Pabna', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(387, 'Panchagarh', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(388, 'Patuakhali', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(389, 'Pirojpur', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(390, 'Rajbari', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(391, 'Rajshahi', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(392, 'Rangamati', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(393, 'Rangpur', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(394, 'Satkhira', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(395, 'Shariatpur', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(396, 'Sherpur', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(397, 'Silhat', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(398, 'Sirajganj', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(399, 'Sunamganj', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(400, 'Tangayal', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(401, 'Thakurgaon', 18, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(402, 'Christ Church', 19, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(403, 'Saint Andrew', 19, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(404, 'Saint George', 19, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(405, 'Saint James', 19, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(406, 'Saint John', 19, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(407, 'Saint Joseph', 19, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(408, 'Saint Lucy', 19, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(409, 'Saint Michael', 19, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(410, 'Saint Peter', 19, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(411, 'Saint Philip', 19, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(412, 'Saint Thomas', 19, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(413, 'Brest', 20, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(414, 'Homjel ', 20, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(415, 'Hrodna', 20, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(416, 'Mahiljow', 20, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(417, 'Mahilyowskaya Voblasts', 20, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(418, 'Minsk', 20, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(419, 'Minskaja Voblasts', 20, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(420, 'Petrik', 20, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(421, 'Vicebsk', 20, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(422, 'Antwerpen', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(423, 'Berchem', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(424, 'Brabant', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(425, 'Brabant Wallon', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(426, 'Brussel', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(427, 'East Flanders', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(428, 'Hainaut', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(429, 'Liege', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(430, 'Limburg', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(431, 'Luxembourg', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(432, 'Namur', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(433, 'Ontario', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(434, 'Oost-Vlaanderen', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(435, 'Provincie Brabant', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(436, 'Vlaams-Brabant', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(437, 'Wallonne', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(438, 'West-Vlaanderen', 21, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(439, 'Belize', 22, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(440, 'Cayo', 22, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(441, 'Corozal', 22, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(442, 'Orange Walk', 22, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(443, 'Stann Creek', 22, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(444, 'Toledo', 22, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(445, 'Alibori', 23, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(446, 'Atacora', 23, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(447, 'Atlantique', 23, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(448, 'Borgou', 23, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(449, 'Collines', 23, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(450, 'Couffo', 23, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(451, 'Donga', 23, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(452, 'Littoral', 23, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(453, 'Mono', 23, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(454, 'Oueme', 23, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(455, 'Plateau', 23, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(456, 'Zou', 23, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(457, 'Hamilton', 24, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(458, 'Saint George', 24, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(459, 'Bumthang', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(460, 'Chhukha', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(461, 'Chirang', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(462, 'Daga', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(463, 'Geylegphug', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(464, 'Ha', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(465, 'Lhuntshi', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(466, 'Mongar', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(467, 'Pemagatsel', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(468, 'Punakha', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(469, 'Rinpung', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(470, 'Samchi', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(471, 'Samdrup Jongkhar', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(472, 'Shemgang', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(473, 'Tashigang', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(474, 'Timphu', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(475, 'Tongsa', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(476, 'Wangdiphodrang', 25, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(477, 'Beni', 26, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(478, 'Chuquisaca', 26, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(479, 'Cochabamba', 26, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(480, 'La Paz', 26, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(481, 'Oruro', 26, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(482, 'Pando', 26, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(483, 'Potosi', 26, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(484, 'Santa Cruz', 26, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(485, 'Tarija', 26, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(486, 'Federacija Bosna i Hercegovina', 27, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(487, 'Republika Srpska', 27, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(488, 'Central Bobonong', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(489, 'Central Boteti', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(490, 'Central Mahalapye', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(491, 'Central Serowe-Palapye', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(492, 'Central Tutume', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(493, 'Chobe', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(494, 'Francistown', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(495, 'Gaborone', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(496, 'Ghanzi', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(497, 'Jwaneng', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(498, 'Kgalagadi North', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(499, 'Kgalagadi South', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(500, 'Kgatleng', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(501, 'Kweneng', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(502, 'Lobatse', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(503, 'Ngamiland', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(504, 'Ngwaketse', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(505, 'North East', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(506, 'Okavango', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(507, 'Orapa', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(508, 'Selibe Phikwe', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(509, 'South East', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(510, 'Sowa', 28, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(511, 'Bouvet Island', 29, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(512, 'Acre', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(513, 'Alagoas', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(514, 'Amapa', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(515, 'Amazonas', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(516, 'Bahia', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(517, 'Ceara', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(518, 'Distrito Federal', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(519, 'Espirito Santo', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(520, 'Estado de Sao Paulo', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(521, 'Goias', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(522, 'Maranhao', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(523, 'Mato Grosso', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(524, 'Mato Grosso do Sul', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(525, 'Minas Gerais', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(526, 'Para', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(527, 'Paraiba', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(528, 'Parana', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(529, 'Pernambuco', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(530, 'Piaui', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(531, 'Rio Grande do Norte', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(532, 'Rio Grande do Sul', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(533, 'Rio de Janeiro', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(534, 'Rondonia', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(535, 'Roraima', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(536, 'Santa Catarina', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(537, 'Sao Paulo', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(538, 'Sergipe', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(539, 'Tocantins', 30, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(540, 'British Indian Ocean Territory', 31, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(541, 'Belait', 32, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(542, 'Brunei-Muara', 32, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(543, 'Temburong', 32, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(544, 'Tutong', 32, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(545, 'Blagoevgrad', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(546, 'Burgas', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(547, 'Dobrich', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(548, 'Gabrovo', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(549, 'Haskovo', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(550, 'Jambol', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(551, 'Kardzhali', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(552, 'Kjustendil', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(553, 'Lovech', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(554, 'Montana', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(555, 'Oblast Sofiya-Grad', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(556, 'Pazardzhik', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(557, 'Pernik', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(558, 'Pleven', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(559, 'Plovdiv', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(560, 'Razgrad', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(561, 'Ruse', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(562, 'Shumen', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(563, 'Silistra', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(564, 'Sliven', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(565, 'Smoljan', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(566, 'Sofija grad', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(567, 'Sofijska oblast', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(568, 'Stara Zagora', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(569, 'Targovishte', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(570, 'Varna', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(571, 'Veliko Tarnovo', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(572, 'Vidin', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(573, 'Vraca', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(574, 'Yablaniza', 33, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(575, 'Bale', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(576, 'Bam', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(577, 'Bazega', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(578, 'Bougouriba', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(579, 'Boulgou', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(580, 'Boulkiemde', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(581, 'Comoe', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(582, 'Ganzourgou', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(583, 'Gnagna', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(584, 'Gourma', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(585, 'Houet', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(586, 'Ioba', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(587, 'Kadiogo', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(588, 'Kenedougou', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(589, 'Komandjari', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(590, 'Kompienga', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(591, 'Kossi', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(592, 'Kouritenga', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(593, 'Kourweogo', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(594, 'Leraba', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(595, 'Mouhoun', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(596, 'Nahouri', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(597, 'Namentenga', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(598, 'Noumbiel', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(599, 'Oubritenga', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(600, 'Oudalan', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(601, 'Passore', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(602, 'Poni', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(603, 'Sanguie', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(604, 'Sanmatenga', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(605, 'Seno', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(606, 'Sissili', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(607, 'Soum', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(608, 'Sourou', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(609, 'Tapoa', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(610, 'Tuy', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(611, 'Yatenga', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(612, 'Zondoma', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(613, 'Zoundweogo', 34, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(614, 'Bubanza', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(615, 'Bujumbura', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(616, 'Bururi', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(617, 'Cankuzo', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(618, 'Cibitoke', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(619, 'Gitega', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(620, 'Karuzi', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(621, 'Kayanza', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(622, 'Kirundo', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(623, 'Makamba', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(624, 'Muramvya', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(625, 'Muyinga', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(626, 'Ngozi', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(627, 'Rutana', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(628, 'Ruyigi', 35, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(629, 'Banteay Mean Chey', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(630, 'Bat Dambang', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(631, 'Kampong Cham', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(632, 'Kampong Chhnang', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(633, 'Kampong Spoeu', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(634, 'Kampong Thum', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(635, 'Kampot', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(636, 'Kandal', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(637, 'Kaoh Kong', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(638, 'Kracheh', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(639, 'Krong Kaeb', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(640, 'Krong Pailin', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(641, 'Krong Preah Sihanouk', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(642, 'Mondol Kiri', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(643, 'Otdar Mean Chey', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(644, 'Phnum Penh', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(645, 'Pousat', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(646, 'Preah Vihear', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(647, 'Prey Veaeng', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(648, 'Rotanak Kiri', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(649, 'Siem Reab', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(650, 'Stueng Traeng', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(651, 'Svay Rieng', 36, 1, '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(652, 'Testing', 1, 328, '2017-11-30 17:12:00', 1, '2017-11-30 17:12:10', 0);
INSERT INTO `state` (`StateID`, `StateName`, `CountryID`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `Status`) VALUES
(653, 'Test', 12, 328, '2017-11-30 17:20:00', 1, '2017-12-01 10:14:10', 1),
(657, 'adadaaaaa', 328, 1, '2017-12-01 11:19:33', 1, '2017-12-01 11:19:58', 1),
(658, 'Newewe', 2, 1, '2017-12-01 11:56:17', NULL, NULL, 1),
(659, 'Thik', 329, 1, '2017-12-06 17:20:49', NULL, NULL, 1),
(661, 'TEst 11', 0, 2, '2024-01-26 09:24:49', 2, '2024-01-26 09:28:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `SubCategoryID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `SubCategoryName` varchar(100) NOT NULL,
  `MetaTitle` varchar(60) NOT NULL,
  `MetaKeywords` varchar(200) NOT NULL,
  `MetaDescription` varchar(1000) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`SubCategoryID`, `CategoryID`, `SubCategoryName`, `MetaTitle`, `MetaKeywords`, `MetaDescription`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `Status`) VALUES
(1, 1, 'Flat Rent Aggrement', '', '', '', 2, '2024-01-30 21:41:19', NULL, NULL, 1),
(3, 2, 'Revocation of POA', '', '', '', 2, '2024-02-03 16:52:40', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pritesh', 'admin@example.com', 1, NULL, '$2y$10$3Ry4ErRFxDZaK/DFIfV8bOP5EHFZHlhujPFEYMisyIvthKWCCDpU.', 1, NULL, '2024-07-01 03:07:28', NULL),
(2, 'test', 'test@email.com', 2, NULL, '$2y$10$3Ry4ErRFxDZaK/DFIfV8bOP5EHFZHlhujPFEYMisyIvthKWCCDpU.', 1, NULL, '2024-07-04 05:21:39', NULL),
(3, 'dsf', 'fss@ff.com', 2, NULL, '$2y$10$aUnUPhcPc84x0URcnjhqtuu5VqQ1a.NF2hFwg5LSgmT/OYtsYxmTC', 1, NULL, '2024-07-07 01:06:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `affiliate`
--
ALTER TABLE `affiliate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`CityID`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`CMSID`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`ConfigID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryID`);

--
-- Indexes for table `emailsetting`
--
ALTER TABLE `emailsetting`
  ADD PRIMARY KEY (`EmailID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`LanguageID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`ModuleID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prompts`
--
ALTER TABLE `prompts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rolemap`
--
ALTER TABLE `rolemap`
  ADD PRIMARY KEY (`RoleMapID`);

--
-- Indexes for table `roleproject`
--
ALTER TABLE `roleproject`
  ADD PRIMARY KEY (`RoleProjectID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`SettingID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`StateID`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`SubCategoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `affiliate`
--
ALTER TABLE `affiliate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `CityID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=642;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `CMSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `ConfigID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `emailsetting`
--
ALTER TABLE `emailsetting`
  MODIFY `EmailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `LanguageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `ModuleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prompts`
--
ALTER TABLE `prompts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rolemap`
--
ALTER TABLE `rolemap`
  MODIFY `RoleMapID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roleproject`
--
ALTER TABLE `roleproject`
  MODIFY `RoleProjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `SettingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `StateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=662;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `SubCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

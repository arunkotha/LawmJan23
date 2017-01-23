-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2016 at 10:25 PM
-- Server version: 5.5.50-cll
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lawmsac_lawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `appeal`
--

CREATE TABLE IF NOT EXISTS `appeal` (
  `id_appeal` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `lawyer_id` int(11) DEFAULT NULL,
  `appeal_type_id` int(11) DEFAULT NULL,
  `experience` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `attachment` text,
  `description` text CHARACTER SET utf8,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_appeal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `appeal_type`
--

CREATE TABLE IF NOT EXISTS `appeal_type` (
  `id_appeal_type` int(11) NOT NULL AUTO_INCREMENT,
  `appeal_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_appeal_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `appeal_type`
--

INSERT INTO `appeal_type` (`id_appeal_type`, `appeal_type`) VALUES
(1, 'type1'),
(2, 'type2');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `menu_id`, `order`, `created_date_time`) VALUES
(8, 34, 0, '2016-07-16 14:51:20'),
(9, 37, 0, '2016-07-17 05:51:26'),
(10, 39, 0, '2016-07-17 06:04:09'),
(11, 35, 0, '2016-07-17 06:07:53'),
(12, 38, 0, '2016-07-17 06:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `article_data`
--

CREATE TABLE IF NOT EXISTS `article_data` (
  `id_article_data` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `article_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` mediumtext CHARACTER SET utf8,
  PRIMARY KEY (`id_article_data`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `article_data`
--

INSERT INTO `article_data` (`id_article_data`, `article_id`, `language_id`, `article_title`, `content`) VALUES
(3, 8, 1, 'our practices', '<h2>Family Business (FBs)</h2>\n\n<p>&nbsp;</p>\n\n<p>At Naji Law Firm, we have vast experience in dealing with some of the most influential and largest Family Businesses in Saudi Arabia. Our expertise essentially focuses upon enhancing the corporate structure and operability of Family Businesses through the introduction of modern corporate structuring and governance, as well as, ensuring the sustainability of the business.</p>\n\n<p>&nbsp;</p>\n\n<h2>Our Services In This Area include:</h2>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>\n	<p>Enhancing the sustainability of family business;</p>\n	</li>\n	<li>\n	<p>Succession planning; and</p>\n	</li>\n	<li>\n	<p>Corporate structuring and governance</p>\n	</li>\n</ul>\n\n<h2>Intellectual Property</h2>\n\n<p>&nbsp;</p>\n\n<p>Directly related to the emergence of globalization and the expansion of foreign investment, is the protection of intellectual property. Businesses expend substantial investment in research and development in order to remain competitive and relevant in today&#39;s global market. As a member of the World Trade Organization, Saudi Arabia is committed to providing its required obligations for the protection of intellectual property. Saudi Arabia retains laws and regulations dealing with trademarks, patents, and copyrights.</p>\n\n<p>We assist clients in protecting their intellectual property by providing them with the latest developments in intellectual property law developments in Saudi Arabia. We assist clients in registering their intellectual property and actively protecting it from piracy and infringement.</p>\n\n<p>&nbsp;</p>\n\n<h2>Our Services In This Area include:</h2>\n\n<h2>&nbsp;</h2>\n\n<ul>\n	<li>\n	<p>Registering copyrights, trademarks, and patents;</p>\n	</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>\n	<p>Drafting intellectual property agreements;</p>\n	</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>\n	<p>Prosecuting infringements of intellectual property</p>\n	</li>\n</ul>\n\n<h2>International business transactions</h2>\n\n<p>&nbsp;</p>\n\n<p>International business transactions generally refers to international transactions between two or more individuals located in different countries. Such transactions have exponentially grown over the years and continues to play a dominant role in the global economy.</p>\n\n<p>When two individuals located in different countries seek to enter into a business transactions there are various risks associated. These risks largely involve determining whether the buyer will pay for the goods or services contracted for and whether the seller will produce the goods or services contracted for.</p>\n\n<p>Naji law firm is committed to managing the risks associated with international business transactions by rendering prudent legal advice. Our Western and Saudi trained attorneys combine the business practices and legal foundation of both cultures and tailor contracts to the specific needs of our clients.</p>\n\n<p>&nbsp;</p>\n\n<h2>Our Services In This Area include:</h2>\n\n<h2>&nbsp;</h2>\n\n<ul>\n	<li>\n	<p>Advising clients on the risks associated with an existing contract;</p>\n	</li>\n	<li>\n	<p>Negotiating, drafting, and amending contracts;</p>\n	</li>\n	<li>\n	<p>Agency agreements;</p>\n	</li>\n	<li>\n	<p>Distributor agreements;</p>\n	</li>\n	<li>\n	<p>Franchise agreements;</p>\n	</li>\n	<li>\n	<p>Licensing agreements;</p>\n	</li>\n	<li>\n	<p>Sales agreements;</p>\n	</li>\n	<li>\n	<p>Letters of credit.</p>\n	</li>\n</ul>\n\n<h2>Aviation</h2>\n\n<h2>&nbsp;</h2>\n\n<h2>Naji Law Firm&rsquo;s founding partner, Dr. Alaa Naji, is the leading aviation law expert in Saudi Arabia. His experience stems from his previous employment with SAUDIA, the official airline carrier of Saudi Arabia, as well as, his previous employment with Sama Airlines, a private Saudi Arabian airline. Further, Dr. Alaa retains a D.C.L and LL.M from McGill University in Aviation law.</h2>\n\n<p>&nbsp;</p>\n\n<h2>Our Services In This Area include:</h2>\n\n<ul>\n	<li>\n	<p>Incorporation and Licensing:</p>\n\n	<ul>\n		<li>\n		<p>Licensing foreign companies seeking to operate inside Saudi Arabia</p>\n		</li>\n		<li>\n		<p>Obtaining Aircraft Operating Certificate (AOC)</p>\n		</li>\n		<li>\n		<p>Coordinating with the General Aviation Civil Authority (GACA)</p>\n		</li>\n	</ul>\n	</li>\n	<li>\n	<p>Aircraft Procurement:</p>\n\n	<ul>\n		<li>\n		<p>Sales and purchase of aircrafts on a an individual and commercial basis</p>\n		</li>\n		<li>\n		<p>coordinating the financial arrangements</p>\n		</li>\n		<li>\n		<p>wet/dry leases</p>\n		</li>\n	</ul>\n	</li>\n	<li>\n	<p>Aircraft Management: This includes providing aircraft legal advisory services to both operators and owners.&nbsp;</p>\n	</li>\n</ul>\n\n<h2>Government Affairs</h2>\n\n<h2>&nbsp;</h2>\n\n<h2>One of our greatest services is our ability to complete your governmental requirements on your behalf. Our governmental affairs employees have experience in dealing with various governmental ministries and bodies and possess the ability to fulfill your tasks efficiently.</h2>\n\n<p>&nbsp;</p>\n\n<h2>Our Services In This Area include:</h2>\n\n<h2>&nbsp;</h2>\n\n<ul>\n	<li>\n	<p>Liasing with the Saudi Arabian Chamber of Commerce;</p>\n	</li>\n	<li>\n	<p>Government authentication (various government ministries);</p>\n	</li>\n	<li>\n	<p>Public Notary;</p>\n	</li>\n	<li>\n	<p>Obtaining Foreign Investment Licenses via the Saudi Arabian General Investment Authority (SAGIA);</p>\n	</li>\n	<li>\n	<p>Coordinating with relevant tax authorities.</p>\n	</li>\n</ul>\n\n<h2>Corporate</h2>\n\n<p>&nbsp;</p>\n\n<p>We possess substantial experience in handling corporate affairs. Our experience entails the entire process of establishing a corporation in Saudi Arabia from drafting the corporation&rsquo;s articles of association (AOC) to drafting complex shareholders agreements. Let our experienced attorney&rsquo;s protect your investment and manage your risks!</p>\n\n<p>&nbsp;</p>\n\n<h2>Our Services In This Area include:</h2>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>\n	<p>Drafting Articles of Association (AOC);</p>\n	</li>\n	<li>\n	<p>Registration with the Saudi Arabian General Investment Authority (SAGIA);</p>\n	</li>\n	<li>\n	<p>Registration with the Ministry of Commerce and Industry (MCI);</p>\n	</li>\n	<li>\n	<p>Mergers and acquisitions</p>\n	</li>\n</ul>\n'),
(4, 8, 2, 'our practices', '<p>الشركات العائلية (FBS)</p>\n\n<p>&nbsp;</p>\n\n<p>وفي ناجي للمحاماة، لدينا خبرة واسعة في التعامل مع بعض من الأكثر نفوذا وأكبر الشركات العائلية في المملكة العربية السعودية. يركز خبراتنا أساسا على تعزيز الهيكل المؤسسي وقابلية التشغيل للشركات العائلية من خلال إدخال هيكلة الشركات الحديثة والحكم، وكذلك، وضمان استمرارية الأعمال.</p>\n\n<p>&nbsp;</p>\n\n<p>خدماتنا في هذا المجال ما يلي:</p>\n\n<p>&nbsp;</p>\n\n<p>&bull; تعزيز استدامة الشركات العائلية.</p>\n\n<p><br />\n&bull;مخططات ناجحة؛ و</p>\n\n<p><br />\n&bull; هيكلة الشركات والحكم</p>\n\n<p>&nbsp;</p>\n\n<p>الملكية الفكرية</p>\n\n<p>&nbsp;</p>\n\n<p>ترتبط مباشرة إلى ظهور العولمة والتوسع في الاستثمارات الأجنبية، وحماية الملكية الفكرية. الشركات تنفق استثمارات كبيرة في مجال البحث والتطوير من أجل البقاء في دائرة المنافسة وذات الصلة في السوق العالمية اليوم. بوصفها عضوا في منظمة التجارة العالمية، تلتزم المملكة العربية السعودية لتوفير الالتزامات المطلوبة من أجل حماية الملكية الفكرية. السعودية تحتفظ القوانين واللوائح التعامل مع العلامات التجارية وبراءات الاختراع، وحقوق التأليف والنشر.</p>\n\n<p>نحن مساعدة العملاء في حماية الملكية الفكرية من خلال تزويدهم بأحدث التطورات في التطورات قانون الملكية الفكرية في المملكة العربية السعودية. نحن مساعدة العملاء في تسجيل الملكية الفكرية والعمل بنشاط على حمايته من القرصنة والتعدي.</p>\n\n<p>&nbsp;</p>\n\n<p>خدماتنا في هذا المجال ما يلي:</p>\n\n<p>&nbsp;</p>\n\n<p>&bull; تسجيل حقوق النشر والعلامات التجارية، وبراءات الاختراع.</p>\n\n<p><br />\n&nbsp;</p>\n\n<p>&bull; صياغة اتفاقات الملكية الفكرية.</p>\n\n<p><br />\n&nbsp;</p>\n\n<p>&bull; مقاضاة التعدي على الملكية الفكرية</p>\n\n<p>&nbsp;</p>\n\n<p>المعاملات التجارية الدولية</p>\n\n<p>&nbsp;</p>\n\n<p>المعاملات التجارية الدولية عموما يشير إلى المعاملات الدولية بين شخصين أو أكثر تقع في بلدان مختلفة. وقد نمت هذه المعاملات بشكل كبير على مر السنين، ولا تزال تلعب دورا مهيمنا في الاقتصاد العالمي.</p>\n\n<p>عندما تسعى شخصين تقع في بلدان مختلفة للدخول في المعاملات التجارية هناك العديد من المخاطر المرتبطة بها. تشمل هذه المخاطر إلى حد كبير تحديد ما إذا كان المشتري سيدفع ثمن السلع أو الخدمات المتعاقد عليها وعما إذا كان يتوجب على المشتري إنتاج السلع أو الخدمات المتعاقد عليها.</p>\n\n<p>تلتزم شركة محاماة ناجي لإدارة المخاطر المرتبطة المعاملات التجارية الدولية من خلال تقديم المشورة القانونية الحكيمة. لدينا مدربين الغربية والسعودية المحامين الجمع بين الممارسات التجارية والأساس القانوني لكلا الثقافتين والعقود خياط لتلبية الاحتياجات المحددة لعملائنا.</p>\n\n<p>&nbsp;</p>\n\n<p>خدماتنا في هذا المجال ما يلي:</p>\n\n<p>&nbsp;</p>\n\n<p>&bull; تقديم المشورة للعملاء حول المخاطر المرتبطة بعقد القائمة؛</p>\n\n<p><br />\n&bull; التفاوض، والصياغة، وتعديل العقود؛</p>\n\n<p><br />\n&bull; اتفاقيات الوكالة.</p>\n\n<p><br />\n&bull; اتفاقات الموزع.</p>\n\n<p><br />\n&bull; اتفاقيات الامتياز.</p>\n\n<p><br />\n&bull; اتفاقيات الترخيص.</p>\n\n<p><br />\n&bull; اتفاقيات مبيعات؛</p>\n\n<p><br />\n&bull;حروف الكردت.</p>\n\n<p>&nbsp;</p>\n\n<p>طيران</p>\n\n<p>&nbsp;</p>\n\n<p>شريك ناجي للمحاماة المؤسس، الدكتور علاء ناجي، هو الرائد خبير قانون الطيران في المملكة العربية السعودية. تنبع خبرته من العمل السابق له مع الخطوط السعودية، الناقل الجوي الرسمي للمملكة العربية السعودية، وكذلك، العمل السابق له مع سما للطيران، الخطوط الجوية العربية السعودية خاصة. وعلاوة على ذلك، الدكتور علاء يحتفظ D.C.L وLL.M من جامعة ماكجيل في قانون الطيران.</p>\n\n<p>&nbsp;</p>\n\n<p>خدماتنا في هذا المجال ما يلي:</p>\n\n<p>&bull; التأسيس والترخيص:</p>\n\n<p>◦Licensing الشركات الأجنبية التي تسعى للعمل داخل المملكة العربية السعودية</p>\n\n<p><br />\n◦Obtaining الطائرات شهادة التشغيل (AOC)</p>\n\n<p><br />\n◦Coordinating مع السلطة المدنية العامة للطيران (GACA)</p>\n\n<p>&nbsp;</p>\n\n<p>&bull; شراء الطائرات:</p>\n\n<p>◦Sales وشراء الطائرات على أساس فردي والتجاري</p>\n\n<p><br />\n◦coordinating الترتيبات المالية</p>\n\n<p><br />\n◦wet / عقود الإيجار الجافة</p>\n\n<p>&nbsp;</p>\n\n<p>&bull; إدارة الطائرات: وتشمل تقديم الخدمات الاستشارية القانونية الطائرات على حد سواء المشغلين ومالكي.</p>\n\n<p>&nbsp;</p>\n\n<p>شؤون حكومية</p>\n\n<p>&nbsp;</p>\n\n<p>واحد من أعظم الخدمات التي نقدمها هي قدرتنا على استكمال متطلبات الحكومية الخاصة بك نيابة عنك. موظفينا الشؤون الحكومية لديهم خبرة في التعامل مع مختلف الوزارات والهيئات الحكومية وتمتلك القدرة على تحقيق المهام بكفاءة.</p>\n\n<p>&nbsp;</p>\n\n<p>خدماتنا في هذا المجال ما يلي:</p>\n\n<p>&nbsp;</p>\n\n<p>&bull; Liasing مع الغرفة العربية السعودية للتجارة.</p>\n\n<p><br />\n&bull; المصادقة الحكومة (الوزارات الحكومية المختلفة)؛</p>\n\n<p><br />\n&bull;كاتب العدل؛</p>\n\n<p><br />\n&bull; الحصول على تراخيص الاستثمار الأجنبي من خلال هيئة الاستثمار العامة السعودية (ساجيا)؛</p>\n\n<p><br />\n&bull; التنسيق مع السلطات الضريبية ذات الصلة.</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>الشركة</p>\n\n<p>&nbsp;</p>\n\n<p>ونحن نمتلك خبرة كبيرة في التعامل مع شؤون الشركات. تنطوي خبرتنا العملية برمتها إنشاء شركة في المملكة العربية السعودية من صياغة المواد للمؤسسة من جمعية (AOC) لصياغة اتفاقات المساهمين المعقدة. اسمحوا لنا المحامي من ذوي الخبرة وحماية الاستثمار وإدارة المخاطر الخاصة بك!</p>\n\n<p>&nbsp;</p>\n\n<p>خدماتنا في هذا المجال ما يلي:</p>\n\n<p>&nbsp;</p>\n\n<p>&bull; صياغة النظام الأساسي (AOC)؛</p>\n\n<p><br />\n&bull; التسجيل مع هيئة الاستثمار العامة السعودية (ساجيا)؛</p>\n\n<p><br />\n&bull; التسجيل مع وزارة التجارة والصناعة (MCI)؛</p>\n\n<p><br />\n&bull;عمليات الدمج والاستحواذ</p>\n'),
(5, 9, 1, 'Contact us', '<p>Riyadh ZIP code 11573 , PO Box 52977 King Abdulaziz district of Salah al - Din road against the field Mosque (Qasr al - Hariri)&nbsp;<br />\nCalifornia, US&nbsp;<br />\nPhone: 01/4550844, 01/4944018&nbsp;<br />\nFax: 01/4503187&nbsp;<br />\nEmail: info@almurafaat.com</p>\n'),
(6, 9, 2, 'Contact us', '<p>الرياض الرمز البريدي 11573، ص.ب 52977 حي الملك عبد العزيز صلاح - طريق الدين ضد هذا المجال المسجد (قصر - الحريري)<br />\nكاليفورنيا، الولايات المتحدة<br />\nالهاتف: 01/4550844، 01/4944018<br />\nفاكس: 01/4503187<br />\nالبريد الإلكتروني: info@almurafaat.com</p>\n'),
(7, 10, 1, 'About us', '<p>Naji????? Law Firm is a leading firm specializing in the&nbsp;Family business practice with an emphasis on business sustainability, succession planning,&nbsp;and supporting corporate structuring and governance.</p>\n\n<p>&nbsp;</p>\n\n<p>Our professional attorneys combine solid legal expertise and diverse legal backgrounds allowing for the structuring of unique legal solutions for your complex business needs.</p>\n\n<p>&nbsp;</p>\n\n<p>Naji Law Firm is also specializing in the facilitation of international transactions and foreign investment in Saudi Arabia.</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Why Naji Law Firm?&nbsp;</strong></p>\n\n<p>&nbsp;</p>\n\n<p>Naji Law Firm combines international experience with its strong local legal know-how. Our combination of local and international expertise allows us to analyze and deliver what it takes to create, enhance and protect your business interests.</p>\n\n<p>&nbsp;</p>\n\n<p>We have been the trusted partner of many local and international clients and have established a solid reputation for delivering creative, prudent and cost-effective legal solutions.</p>\n\n<p><br />\n<strong>Our Principles</strong><strong>&nbsp;</strong></p>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>\n	<p>Providing a boutique law firm environment whereby our attorneys deliver strategic, service-driven tailored advice;</p>\n	</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>\n	<p>A client centric approach whereby we view each client as part of the Naji Law Firm family; and</p>\n	</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>\n	<p>Dedicating our local expertise to your business aspirations.&nbsp;</p>\n	</li>\n</ul>\n'),
(8, 10, 2, 'About us', '<p>ناجي للمحاماة هي شركة رائدة متخصصة في ممارسة الشركات العائلية مع التركيز على استدامة الأعمال والتخطيط للخلافة، ودعم وهيكلة الشركات والحكم.</p>\n\n<p>&nbsp;</p>\n\n<p>لدينا المحامين المهنية الجمع بين الخبرة القانونية الصلبة والخلفيات القانونية المتنوعة السماح لهيكلة حلول قانونية فريدة من نوعها لاحتياجات الأعمال المعقدة الخاصة بك.</p>\n\n<p>&nbsp;</p>\n\n<p>ناجي للمحاماة متخصصة أيضا في تسهيل المعاملات الدولية والاستثمار الأجنبي في المملكة العربية السعودية.</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>لماذا ناجي للمحاماة؟</p>\n\n<p>&nbsp;</p>\n\n<p>ناجي للمحاماة يجمع بين الخبرة الدولية القوية القانونية المحلية الدراية. لدينا مجموعة من الخبرات المحلية والدولية ويسمح لنا لتحليل وتقديم ما يلزم لإنشاء وتعزيز وحماية المصالح التجارية الخاصة بك.</p>\n\n<p>&nbsp;</p>\n\n<p>لقد كان شريكا موثوقا به من العديد من العملاء المحليين والدوليين، وأنشأت سمعة قوية لتقديم حلول مبتكرة القانونية حكيمة وفعالة من حيث التكلفة.</p>\n\n<p><br />\nمبادئنا</p>\n\n<p>&nbsp;</p>\n\n<p>توفير بيئة محاماة بوتيك حيث محامينا تقديم الاستراتيجية، وتقديم المشورة خدمة مدفوعة مصممة خصيصا.</p>\n\n<p>&nbsp;</p>\n\n<p>نهج تتمحور حول العميل حيث نرى كل عميل كجزء من عائلة ناجي للمحاماة. و</p>\n\n<p>&nbsp;</p>\n\n<p>تكريس الخبرات المحلية جهدنا لتطلعات عملك.</p>\n'),
(9, 11, 1, 'Our Sectors', '<p>Our construction and infrastructure team helps clients across the entire construction and infrastructure industry. Our team prides itself as being accessible, practical and expert.</p>\n\n<p>Our lawyers understand clients&rsquo; objectives and the broader commercial and practical issues that need to be factored into the advice and assistance given. Our clients benefit from our expertise and receive practical and cost effective strategies and legal solutions. We listen to your objectives.</p>\n\n<p>Our approach is based on genuine partner accessibility and responsiveness, clear and prompt communication and no surprises. We ensure that our documents and advices are drafted clearly and concisely. Our advice is tailored to meet your commercial needs which are always paramount.</p>\n\n<p>Our team has regional focus and expertise, servicing clients in all regions where Al Tamimi has a presence. We specialise in all aspects of construction and infrastructure law, acting for employers, contractors, facility managers, developers, consultants and other industry participants. Our clients range from major institutions and government entities to specialist contractors and consultants.</p>\n\n<p>We deliver both front end and dispute services including:</p>\n\n<p>&bull; Tender and project documentation;</p>\n\n<p>&bull; Contract administration assistance and advice;</p>\n\n<p>&bull; Strategic project planning;</p>\n\n<p>&bull; Risk management strategies;</p>\n\n<p>&bull; Claims preparation and assistance; and</p>\n\n<p>&bull; Dispute services, including dispute boards, expert determination, arbitration and litigation.</p>\n\n<p>Our team is committed to keeping abreast of all the latest legal developments, using available technology and resources to give our clients&rsquo; value in our service delivery.</p>\n'),
(10, 11, 2, 'Our Sectors', '<p>لدينا فريق البناء والبنية التحتية يساعد العملاء في جميع أنحاء صناعة البناء والتشييد والبنية التحتية بأكملها. فريقنا تفخر بأنها في متناول وعملية والخبراء.</p>\n\n<p>فهم محامينا أهداف العملاء والقضايا التجارية والعملية الأوسع التي تحتاج إلى أن تؤخذ في المشورة والمساعدة المقدمة. عملائنا الاستفادة من خبراتنا واستقبال استراتيجيات عملية وفعالة من حيث التكلفة والحلول القانونية. نستمع إلى أهدافك.</p>\n\n<p>ويستند نهجنا في الوصول حقيقي شريك والاستجابة، واتصال واضح وسريع وهناك مفاجآت. علينا أن نضمن أن لدينا وثائق والنصائح تصاغ بوضوح ودقة. تم تصميم المشورة جهدنا لتلبية الاحتياجات التجارية الخاصة بك والتي هي دائما ذات أهمية قصوى.</p>\n\n<p>فريقنا لديه التركيز والخبرة الإقليمية، خدمة العملاء في جميع المناطق التي لديها التميمي وجود. ونحن متخصصون في جميع جوانب البناء وقانون البنى التحتية، التي تعمل لأرباب العمل والمقاولين ومديري المرافق والمطورين والاستشاريين وغيرهم من المشاركين الصناعة. تتراوح عملائنا من المؤسسات الكبرى والهيئات الحكومية إلى المقاولين المتخصصين والاستشاريين.</p>\n\n<p>نحن تقديم كل الخدمات ونهاية النزاع الأمامية بما في ذلك:</p>\n\n<p>&bull; المناقصات وثائق المشروع.</p>\n\n<p>&bull; مساعدة إدارة العقود والمشورة؛</p>\n\n<p>&bull; تخطيط المشروع الاستراتيجي؛</p>\n\n<p>&bull; استراتيجيات إدارة المخاطر.</p>\n\n<p>&bull; مطالبات إعداد والمساعدة؛ و</p>\n\n<p>&bull; الخدمات النزاع، بما في ذلك المجالس النزاع، تقرير الخبراء والتحكيم والتقاضي.</p>\n\n<p>ويلتزم فريق جهدنا لمواكبة آخر التطورات القانونية، وذلك باستخدام التكنولوجيا والموارد المتاحة لإعطاء قيمة لعملائنا في تقديم الخدمات لدينا.</p>\n'),
(11, 12, 1, 'Corporate and Commercial', '<p>The UAE for example, has many advantages which have contributed to the growth of this sector given its natural assets such as safe harbours, developed infrastructure, various seaports and airports as well as the country&#39;s well suited geographic location making it an ideal trading hub. However as with many other sectors, the transport sector has not remained unaffected by the global financial crisis. This sector is also more volatile due to fluctuating oil prices which greatly affects freight prices. Operators within this sector face significant challenges.</p>\n\n<p>We remain at the forefront of developments in the transport sector within the region.</p>\n\n<p>Our clients include government and regulatory bodies, international organisations, major container lines and airlines, domestic and international rail operators, infrastructure operators and their contractors, freight and rolling-stock operating companies, manufacturers, and engineering and technology companies, P&amp;I clubs, vessel owners, vessel charterers and aeroplane leases, ship agents and air operators and forwarders and we advise across the full range of the legal services including litigation and arbitration issues, insurance, employment law, banking and finance matters, regulatory and corporate work. We offer local and international experts with extensive experience relating to transport transactions in all of nine countries we currently operate in across the MENA region.</p>\n\n<p>The type of work the firm does do within this sector is illustrated in below:</p>\n\n<table border="0">\n	<tbody>\n		<tr>\n			<td>\n			<p><strong>Shipping</strong></p>\n\n			<ul>\n				<li>Dispute resolution</li>\n				<li>Employment matters</li>\n				<li>Insurance</li>\n				<li>Mergers &amp; Acquisitions</li>\n				<li>Ship finance</li>\n				<li>Ship building</li>\n			</ul>\n			</td>\n			<td>\n			<p><strong>Aviation</strong></p>\n\n			<ul>\n				<li>Dispute resolution and arbitration</li>\n				<li>Aviation support services</li>\n				<li>Insurance</li>\n				<li>Aircraft financing</li>\n			</ul>\n\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p><strong>Land Transport</strong></p>\n\n			<ul>\n				<li>Cargo Claims</li>\n				<li>Transit Claims</li>\n				<li>Warehousing</li>\n				<li>Import &amp; Export</li>\n				<li>Customs</li>\n			</ul>\n			</td>\n			<td>\n			<p><strong>Logistics</strong></p>\n\n			<ul>\n				<li>Agency Law</li>\n				<li>Forwarding Law</li>\n				<li>Warehousing</li>\n				<li>Import &amp; Export</li>\n				<li>Customs</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(12, 12, 2, 'Corporate and Commercial', '<p>دولة الإمارات العربية المتحدة على سبيل المثال، لديها العديد من المزايا التي ساهمت في نمو هذا القطاع نظرا الأصول الطبيعية مثل الملاذات الآمنة والبنية التحتية المتقدمة والموانئ المختلفة والمطارات وكذلك الموقع الجغرافي مناسب تماما للبلاد مما يجعلها مركزا تجاريا مثاليا. ولكن كما هو الحال مع العديد من القطاعات الأخرى، لم تبق قطاع النقل لم تتأثر بالأزمة المالية العالمية. هذا القطاع هو أيضا أكثر تقلبا بسبب تذبذب أسعار النفط التي تؤثر بشكل كبير في أسعار الشحن. المشغلين في هذا القطاع يواجه تحديات كبيرة.</p>\n\n<p>ونحن لا نزال في طليعة التطورات في قطاع النقل في المنطقة.</p>\n\n<p>زبائننا تشمل الهيئات الحكومية والتنظيمية، والمنظمات الدولية، وخطوط الحاويات الكبرى وشركات الطيران ومشغلي السكك الحديدية المحلية والدولية، ومشغلي البنى التحتية والمتعاقدين معها، وشركات الشحن والتشغيل خطوط السكك الحديدية، مصنعين، وشركات الهندسة والتكنولوجيا، ونوادي الحماية والتعويض، وأصحاب السفينة والمستأجرين السفينة والإيجارات الطائرة، وكلاء السفن وشركات الطيران ووكلاء، ونحن المشورة عبر مجموعة كاملة من الخدمات القانونية بما في ذلك الدعاوى والقضايا التحكيم، التأمين، قانون العمل، والخدمات المصرفية والمسائل المالية والتنظيمية والعمل المؤسسي. نحن نقدم الخبراء المحليين والدوليين مع خبرة واسعة تتعلق نقل المعاملات في كل من تسع دول نعمل حاليا في جميع أنحاء منطقة الشرق الأوسط.</p>\n\n<p>ويتضح نوع عمل الشركة يفعل في هذا القطاع في أدناه:</p>\n\n<p><br />\nالشحن<br />\nتسوية المنازعات<br />\nمسائل التوظيف<br />\nتأمين<br />\nعمليات الاندماج والاستحواذ<br />\nتمويل السفن<br />\nبناء السفن<br />\n&nbsp;<br />\nطيران<br />\nتسوية المنازعات والتحكيم<br />\nخدمات الدعم الطيران<br />\nتأمين<br />\nتمويل الطائرات</p>\n\n<p>&nbsp;<br />\n&nbsp;</p>\n\n<p>نقل بري<br />\nمطالبات البضائع<br />\nالمطالبات العابر<br />\nالتخزين<br />\nاستيراد و تصدير<br />\nالجمارك<br />\n&nbsp;<br />\nالخدمات اللوجستية<br />\nقانون الوكالات<br />\nقانون إعادة توجيه<br />\nالتخزين<br />\nاستيراد و تصدير<br />\nالجمارك</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id_attachment` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `attachment` text,
  PRIMARY KEY (`id_attachment`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id_attachment`, `type`, `reference_id`, `attachment`) VALUES
(1, 'reply', 2, 'http://lawm.sa/uploads/1471085399.jpg'),
(2, 'reply', 2, 'http://lawm.sa/uploads/1471085399.jpg'),
(3, 'contract-writing', 1, 'http://lawm.sa/uploads/1471086371.jpg'),
(4, 'contract-writing', 1, 'http://lawm.sa/uploads/1471086371anta.MP3');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id_company` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `lawyer_id` int(11) DEFAULT NULL,
  `experience` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `attachment` text,
  `description` text CHARACTER SET utf8,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_company`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_partner`
--

CREATE TABLE IF NOT EXISTS `company_partner` (
  `id_company_partner` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `partner_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `partner_id` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_company_partner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
  `id_consultation` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `consultation_type` int(11) DEFAULT NULL,
  `experience` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `complain` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `subject` text CHARACTER SET utf8,
  `description` text CHARACTER SET utf8,
  `attachment` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(225) DEFAULT 'pending',
  `created_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_consultation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`id_consultation`, `user_id`, `lawyer_id`, `consultation_type`, `experience`, `complain`, `date`, `subject`, `description`, `attachment`, `status`, `created_date_time`) VALUES
(1, 8, 7, 1, NULL, 'yes', NULL, 'this is very basic test ', 'this is very basic details', '', 'closed', '2016-08-13 10:43:34'),
(2, 8, 7, 2, NULL, 'yes', NULL, 'i am going to create one more consultation here', 'details of one more consultation', '', 'accepted', '2016-08-13 11:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_type`
--

CREATE TABLE IF NOT EXISTS `consultation_type` (
  `id_consultation_type` int(11) NOT NULL AUTO_INCREMENT,
  `consultation_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_consultation_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `consultation_type`
--

INSERT INTO `consultation_type` (`id_consultation_type`, `consultation_type`) VALUES
(1, 'Consultation type-1'),
(2, 'Consultation type-2');

-- --------------------------------------------------------

--
-- Table structure for table `contract_writing`
--

CREATE TABLE IF NOT EXISTS `contract_writing` (
  `id_contract_writing` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `lawyer_id` int(11) DEFAULT NULL,
  `experience` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `attachment` text CHARACTER SET utf8,
  `description` text CHARACTER SET utf8,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_contract_writing`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contract_writing`
--

INSERT INTO `contract_writing` (`id_contract_writing`, `user_id`, `lawyer_id`, `experience`, `subject`, `attachment`, `description`, `status`, `created_date_time`) VALUES
(1, 8, 7, '0-5', 'test subject', '', 'test description', 'accepted', '2016-08-13 11:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `id_conversation` int(11) NOT NULL AUTO_INCREMENT,
  `reference_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `comment` text CHARACTER SET utf8,
  `attachment` text CHARACTER SET utf8,
  `created_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_conversation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id_conversation`, `reference_type`, `reference_id`, `from_id`, `to_id`, `comment`, `attachment`, `created_date_time`) VALUES
(1, 'consultation', 1, 8, 7, 'comment1', '', '2016-08-13 10:47:11'),
(2, 'consultation', 1, 7, 8, 'Pl fill the form in following format.', '', '2016-08-13 10:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id_country` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_country`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id_country`, `country_name`) VALUES
(1, 'Saudi arabia');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `id_forum` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_forum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id_forum`, `user_id`, `title`, `description`, `status`, `created_date_time`) VALUES
(1, 0, 'Hi All to people in forum', 'Hi All, this is first message in the forum', 1, '2016-08-13 11:28:55'),
(2, 7, 'Hi Admin', 'Test Message to all', 1, '2016-08-13 11:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id_language` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_language`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id_language`, `language`, `status`) VALUES
(1, 'English', 1),
(2, 'عربية', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `menu_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `parent_id`, `order`, `menu_status`) VALUES
(34, 0, 1, 1),
(35, 0, 2, 1),
(36, 0, 3, 1),
(37, 0, 4, 1),
(38, 34, 1, 1),
(39, 36, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_data`
--

CREATE TABLE IF NOT EXISTS `menu_data` (
  `id_menu_data` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `menu_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `menu_link` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_menu_data`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `menu_data`
--

INSERT INTO `menu_data` (`id_menu_data`, `menu_id`, `language_id`, `menu_title`, `menu_link`) VALUES
(19, 34, 1, 'OUR PRACTICES', ''),
(20, 34, 2, 'ممارساتنا', ''),
(21, 35, 1, 'OUR SECTORS', ''),
(22, 35, 2, 'قطاعاتنا', ''),
(23, 36, 1, 'OUR FIRM', ''),
(24, 36, 2, 'موقفنا الثابت', ''),
(25, 37, 1, 'CONTACT US', ''),
(26, 37, 2, 'اتصل بنا', ''),
(27, 38, 1, 'Corporate & Commercial', ''),
(28, 38, 2, 'الشركات و التجارية', ''),
(29, 39, 1, 'About Us', ''),
(30, 39, 2, 'معلومات عنا', '');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_token` text COLLATE utf8_unicode_ci,
  `session_id` int(10) unsigned NOT NULL,
  `expire_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_access_tokens_id_session_id_unique` (`id`,`session_id`),
  KEY `oauth_access_tokens_session_id_index` (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=468 ;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `access_token`, `session_id`, `expire_time`, `created_at`, `updated_at`) VALUES
(1, 'JqeJes3lZ0BVrEP5qLDZC4DV9znIP29ebBYBjpxM', 1, 1460915707, '2016-04-16 17:55:07', '0000-00-00 00:00:00'),
(2, 'Gn4E13rc9UkY2BeBSdhlGMqhYFVxaJOt3O5H3zyN', 2, 1460915930, '2016-04-16 17:58:50', '0000-00-00 00:00:00'),
(3, 'rzlDhvLO5SSPQO37FdwWUWNunDOXp9BCQzGuLtwQ', 3, 1460955182, '2016-04-17 04:53:02', '0000-00-00 00:00:00'),
(4, 'd4Wv1hOWG0RiB3gcPX2M7pdZJ8pr7E7WzFm3z4w2', 4, 1460955218, '2016-04-17 04:53:38', '0000-00-00 00:00:00'),
(5, 'SvfC0oYacwEQuyZMC8OhL3pTqtUTggc9lSnpD53o', 5, 1460955237, '2016-04-17 04:53:57', '0000-00-00 00:00:00'),
(6, 'ND1iKYYEEiAIpuIbyZZV358g6IHf0W68j8wqXuHt', 6, 1461258221, '2016-04-20 17:03:41', '0000-00-00 00:00:00'),
(7, 'GlUc4UbPa0IS7M9KjF2LEmSNXqNKJXH87KE2feML', 7, 1461344002, '2016-04-21 16:53:22', '0000-00-00 00:00:00'),
(8, 'vW416ApRtTdk0iwi2LRXFynGww1pogEHYJTlo9Bx', 8, 1461345509, '2016-04-21 17:18:29', '0000-00-00 00:00:00'),
(9, 'nSUryc47oOZKD8G4lBkxy7okyzItAnh2wcujcw9a', 9, 1461345697, '2016-04-21 17:21:37', '0000-00-00 00:00:00'),
(10, 'EX0EOkajPvrKAlBpoMgg1pd7JJGTUjvqcsEX7dl9', 10, 1461345719, '2016-04-21 17:21:59', '0000-00-00 00:00:00'),
(11, 'IzfCIdEUkaj4Ikgol2xKxanrg3epVrl0zCmBu0bi', 11, 1461345750, '2016-04-21 17:22:30', '0000-00-00 00:00:00'),
(12, 'rU24x2cTDfBwQncM0MfpBVeNcOXcWSaXR36g1W24', 12, 1462877566, '2016-05-09 10:52:46', '0000-00-00 00:00:00'),
(13, 'n46OQpuQYmKJnWegtERib5FdusDiFWAbFeXlzQF0', 13, 1462881548, '2016-05-09 11:59:08', '0000-00-00 00:00:00'),
(14, 'phnl1S8AYmPis7Nt1OjCfXFUZvoBIkvdT9WoUMJH', 14, 1462882142, '2016-05-09 12:09:02', '0000-00-00 00:00:00'),
(15, 'banUjubm7Z8Dy9kHsq1EYcCHvgSqmeWtv5i1fLwK', 15, 1462882277, '2016-05-09 12:11:17', '0000-00-00 00:00:00'),
(16, 'tuIjO3WcvApsyqkDZF6E3uhmEg7aAcVb2eVD0wJp', 16, 1462883042, '2016-05-09 12:24:02', '0000-00-00 00:00:00'),
(17, 'Z0euVsEkVsYxlWLoHV6cZMjRJw6kY0KhOJrCdUc6', 17, 1463070276, '2016-05-11 16:24:36', '0000-00-00 00:00:00'),
(18, '0DxBFBvRmmPAGaPmeTthS1LWfCIRosQhrJXeJeBm', 18, 1463116426, '2016-05-12 05:13:46', '0000-00-00 00:00:00'),
(19, 'df9Xg4hphlo9kQQM0amtGU9aI82tapenicOiiDof', 19, 1463116777, '2016-05-12 05:19:37', '0000-00-00 00:00:00'),
(20, 'OpewgyKyRYSVJhz72WDJsIyNexKNd3Fi5LAgdiLw', 20, 1463117079, '2016-05-12 05:24:39', '0000-00-00 00:00:00'),
(21, '4B7hAoJYojTWfGUj4HljHnkcGPH2AQuvjmzTBCVn', 21, 1463117404, '2016-05-12 05:30:04', '0000-00-00 00:00:00'),
(22, 'egr9zDeQdPTEjPURnP1l5j480KmqVQBg0pi8n6sh', 22, 1463119214, '2016-05-12 06:00:14', '0000-00-00 00:00:00'),
(23, 'A7AVdzZdX8S5XbKl2DZA72Vjq13vm21cargCcDH5', 23, 1463123285, '2016-05-12 07:08:05', '0000-00-00 00:00:00'),
(24, '0QyIw6PeVXKpS6jGC3DWmyWNexLp2TQxa3DBgz4d', 24, 1463141881, '2016-05-12 12:18:01', '0000-00-00 00:00:00'),
(25, 'zN8WA1sMWtAJGIXpJABbpN23aHVUWB6N7usCh3AY', 25, 1463142137, '2016-05-12 12:22:17', '0000-00-00 00:00:00'),
(26, 'KQ17mcJgadZpoj57TKNK3ejU4X1zrSF6zjrAZAe1', 26, 1463143042, '2016-05-12 12:37:22', '0000-00-00 00:00:00'),
(27, '3UNF1hKQMVJ2AfTnFyxbf9BP8xNovCuVlVs4ZInb', 27, 1463143124, '2016-05-12 12:38:44', '0000-00-00 00:00:00'),
(28, 'bEKxVI10Q5ZKVSu5vHfAwwmXMtay0P1iQQBsICf9', 28, 1463143226, '2016-05-12 12:40:26', '0000-00-00 00:00:00'),
(29, 'yaK0abbedtouPFe7hhPnMJ75cf8rfy1E0VdPLnHX', 29, 1463143356, '2016-05-12 12:42:36', '0000-00-00 00:00:00'),
(30, 'EimKiXgf2lkh6Vb3yyqFlw2gNCj1BigZwa8xZrAe', 30, 1463143556, '2016-05-12 12:45:56', '0000-00-00 00:00:00'),
(31, '0BQvysQ5myWLBvOZX4rQXXdQiso1aom2gMQkAcoF', 31, 1463143705, '2016-05-12 12:48:25', '0000-00-00 00:00:00'),
(32, '5lCG3KEJcu0LKbxE9IQCImLdPdAbZOMJ23Umbch8', 32, 1463143805, '2016-05-12 12:50:05', '0000-00-00 00:00:00'),
(33, 'DfbAIFn0U7thJ40ik7VPoKQ0W8zg0lKxZKU5N591', 33, 1463143897, '2016-05-12 12:51:37', '0000-00-00 00:00:00'),
(34, 'PEBlcFLQZnyql9KC4F1H22y8axVj5J6NNcoM9NM2', 34, 1463144078, '2016-05-12 12:54:38', '0000-00-00 00:00:00'),
(35, 'GqiwACZ62MNrClHfGO7m76pmWd6rRNxhHhwJJWQb', 35, 1463144180, '2016-05-12 12:56:20', '0000-00-00 00:00:00'),
(36, 'dwiHrSn5Cx8dKDLHkDyrpZagIzY8Pg6DlA9S13h0', 36, 1463144343, '2016-05-12 12:59:04', '0000-00-00 00:00:00'),
(37, 'jKWew0xoOaWW9YkqhSF94yUFe9QmAZjvrQ6s4Mdx', 37, 1463144444, '2016-05-12 13:00:44', '0000-00-00 00:00:00'),
(38, 'XSqWOGHj5gCD0JfVnVhcKEdG51bGk44hcU4AcMCs', 38, 1463144513, '2016-05-12 13:01:53', '0000-00-00 00:00:00'),
(39, '9InuOlYccJLoguJSmSH0lCSrnkaByq2mbNKsWK3O', 39, 1463144613, '2016-05-12 13:03:33', '0000-00-00 00:00:00'),
(40, 'zWh7nMm3DyuICMg3HwA4Is0O6SEpA8eD7zvz4S2R', 40, 1463144669, '2016-05-12 13:04:29', '0000-00-00 00:00:00'),
(41, 'oFJrjluWu2KTUFY7d6JrhzhoOvBLsRNc3T4MaRiv', 41, 1463144752, '2016-05-12 13:05:52', '0000-00-00 00:00:00'),
(42, 'vAgbFBQnphSDk9RzkcHHJecigUSnXAI7GaIzxlXS', 42, 1463144906, '2016-05-12 13:08:26', '0000-00-00 00:00:00'),
(43, 'egECiHN04L5yfz0ISw1itxu5puip8V8XRKgIrYT8', 43, 1463145111, '2016-05-12 13:11:52', '0000-00-00 00:00:00'),
(44, 'ZN9S4kuNv8hAT2ZlGag7QAWzrzv0eghIc4FEbIgQ', 44, 1463145200, '2016-05-12 13:13:20', '0000-00-00 00:00:00'),
(45, 'TJxq0GJzXvl39L3B1PX2eMVPh4yNKumzt3QxAePz', 45, 1463145310, '2016-05-12 13:15:10', '0000-00-00 00:00:00'),
(46, 'UhUB5vXDM5JP1hqBdWCNoCUKAxUNs0wWZabZ0BYk', 46, 1463145490, '2016-05-12 13:18:10', '0000-00-00 00:00:00'),
(47, 'glcs2wOTrg3FOQM2s5nlyaiRpBJrcMTsimJzt0CP', 47, 1463145642, '2016-05-12 13:20:42', '0000-00-00 00:00:00'),
(48, 'DNQedJk5V2PpN7chAF0KatzZXnoX7TweVP7dzDkV', 48, 1463197834, '2016-05-13 03:50:34', '0000-00-00 00:00:00'),
(49, 'BMCyrNpVQ6SRS9YfM2K9XgNs4iPPt6wJKV7E3Dhu', 49, 1463197931, '2016-05-13 03:52:11', '0000-00-00 00:00:00'),
(50, 'fqNaBK0eQPREhUE2ZzGRXKsj16rQtupF5mXD2YBB', 50, 1463198142, '2016-05-13 03:55:42', '0000-00-00 00:00:00'),
(51, 'ArHZpzR41bmkXNbkEb5suztSMPyyspcslTg6rZ6V', 51, 1463198292, '2016-05-13 03:58:12', '0000-00-00 00:00:00'),
(52, 'o1VMLSfnyYcKGbIrWBp9FQKqxVaI1lufyIo6nxzB', 52, 1463198411, '2016-05-13 04:00:11', '0000-00-00 00:00:00'),
(53, 'TGxF5XNRhgaDqSFnjQeAURgK6eHdb9tPlp627VIJ', 53, 1463198557, '2016-05-13 04:02:37', '0000-00-00 00:00:00'),
(54, 'oHL60Xy0mr4oMAnQihER9mFZlULd6eCC9i5xYyKf', 54, 1463199371, '2016-05-13 04:16:11', '0000-00-00 00:00:00'),
(55, '2BXnchav5p8meo2WCSJC6ayTFcrLFp6Lmb5SIhMw', 55, 1463201086, '2016-05-13 04:44:47', '0000-00-00 00:00:00'),
(56, 'hbJhmD1gqwizQwSghAcYKiaiOljE2E0htdQtupAS', 56, 1463201252, '2016-05-13 04:47:32', '0000-00-00 00:00:00'),
(57, '0tGPd9Fa1zLh8THO1BhKDHEg7eODK4T389XZtwYP', 57, 1463203414, '2016-05-13 05:23:34', '0000-00-00 00:00:00'),
(58, 'aJXMCeWGnSL65LJ2tF7KY79mw8bfUZ63Blt2f56f', 58, 1463204109, '2016-05-13 05:35:09', '0000-00-00 00:00:00'),
(59, 'PrUnAK9RhsX6xbeRjMbjoRZtsIAnfXFrrfbLNrTp', 59, 1463206867, '2016-05-13 06:21:07', '0000-00-00 00:00:00'),
(60, '4PIbvUO1G07dooZVLq1L3vmHGYsxfvO6DxJj5UAb', 60, 1463215794, '2016-05-13 08:49:57', '0000-00-00 00:00:00'),
(61, 'ytP3lhFnGbAxQvndwERxxE95F8D8Phrg7OlWCzVe', 61, 1463216445, '2016-05-13 09:00:45', '0000-00-00 00:00:00'),
(62, 'mJWKLEHVhkTUKY0gVaE5GS6tpsKXtqvumeMM54KT', 62, 1463216708, '2016-05-13 09:05:08', '0000-00-00 00:00:00'),
(63, 'oRlRavys5l0Exh8gyexQg0jv2yeuLZR52PdIHQpR', 63, 1463311382, '2016-05-14 11:23:02', '0000-00-00 00:00:00'),
(64, 'iBbaHSK0r3NwikDCQsoGbErNt2dvlbF4qpnZOtaH', 64, 1463321339, '2016-05-14 14:08:59', '0000-00-00 00:00:00'),
(65, 'ICoe5j3xLS8upYDZ70Tx7vApopYwx2JltvKkkGCC', 65, 1463323311, '2016-05-14 14:41:52', '0000-00-00 00:00:00'),
(66, 'j5fwyxiZ61a9LNdTSJaX1F5DPy4195dJ1fTtPRG1', 66, 1463323313, '2016-05-14 14:41:53', '0000-00-00 00:00:00'),
(67, 'k0DtcNDFAuJ1o3IhgorSI0RM2IJ5tvwWlw4A5EOG', 67, 1463323949, '2016-05-14 14:52:29', '0000-00-00 00:00:00'),
(68, 'vE6jfPkXeu3ia2XCblTMQtj5XrZgY1a0CkyBOiix', 68, 1463324096, '2016-05-14 14:54:56', '0000-00-00 00:00:00'),
(69, 'fBmEnQB6l8n7dhi0uxICUib6VrqEWMMxvy1FPpR8', 69, 1463324122, '2016-05-14 14:55:22', '0000-00-00 00:00:00'),
(70, 'geeBvQLGU2zU86dILNEo3VCaQ0wsqlYzgrWprRrM', 70, 1463324568, '2016-05-14 15:02:48', '0000-00-00 00:00:00'),
(71, 'T0EFHhTpkgxETwXm9IcxsRkwGQAYmuQHn9S1WHrJ', 71, 1463324587, '2016-05-14 15:03:07', '0000-00-00 00:00:00'),
(72, 'K4gX4pf1metsRJb7W809rvvxPondtdofCtW4akj6', 72, 1463324939, '2016-05-14 15:08:59', '0000-00-00 00:00:00'),
(73, 'X9yQQSpUo4HQ4Ak9jezobKTxSwOwHG2qGMg3uZSZ', 73, 1463325814, '2016-05-14 15:23:34', '0000-00-00 00:00:00'),
(74, 'cW7705ULXHQAx2pIUyQPUsqIrVpLLP15hS1nuK72', 74, 1463460714, '2016-05-16 04:51:54', '0000-00-00 00:00:00'),
(75, 'vvbKYbDlBS9JCVK2bXG9xVSiTYhz2fWZD3osOlem', 75, 1463461298, '2016-05-16 05:01:38', '0000-00-00 00:00:00'),
(76, 'FEnEXaI0wV7vkStG2uI6Yqv8sytdzttlOd0y44HW', 76, 1463461514, '2016-05-16 05:05:14', '0000-00-00 00:00:00'),
(77, 'sblMpI3iDjSAAsSqqWtqqlMijBRtGetHUcpnmEBB', 77, 1463469655, '2016-05-16 07:20:58', '0000-00-00 00:00:00'),
(78, 'BNK0f984zyEdAO0ABoChKsMoZOIhZxdsnRnnIjcN', 78, 1463503904, '2016-05-16 16:51:44', '0000-00-00 00:00:00'),
(79, 'XCHzS0ISjQcxk4YIdELcyxFN0O9wrVym5QmL647I', 79, 1463543563, '2016-05-17 03:52:43', '0000-00-00 00:00:00'),
(80, 'm1r7Qn6MrRa8pyGHGaW2euKpHj6iNMRHMyaznQt8', 80, 1463543563, '2016-05-17 03:52:43', '0000-00-00 00:00:00'),
(81, 'SZKkpMUGCep6TvHcRFIBgS9AEgwX1Nx2WThbZ99i', 81, 1463543582, '2016-05-17 03:53:02', '0000-00-00 00:00:00'),
(82, 'CuFJ9vPIMmAFWZCRxGi8eHNlq8M9IJPN7nRB1hRH', 82, 1463547249, '2016-05-17 04:54:09', '0000-00-00 00:00:00'),
(83, 'EAzjohtTgtKgeMi8zWocCBnJ5oLhCbVKbzHW48MD', 83, 1463549724, '2016-05-17 05:35:25', '0000-00-00 00:00:00'),
(84, 'UcPyfS2WDpUCLK4FOi9Vm0GDUmpjUNYdMW9i7upj', 84, 1463549736, '2016-05-17 05:35:36', '0000-00-00 00:00:00'),
(85, 'FnAjhVDIXTgHmk3KRvCTjy3cPsBSrUNbiYZdqUS0', 85, 1464433482, '2016-05-27 11:04:42', '0000-00-00 00:00:00'),
(86, 'vZCYRNiw8bHv9jj8CvWtIeS5a5V8fnW3WSA71rtk', 86, 1464433502, '2016-05-27 11:05:02', '0000-00-00 00:00:00'),
(87, 'euXCbCGdmESrqhMcgzKpG2ePxCPS1tQ6VPb9wmFP', 87, 1464702543, '2016-05-30 13:49:04', '0000-00-00 00:00:00'),
(88, 'cT97vFmn84c48WsAA5n0VxqhlcjFn7Zil1lZQcC3', 88, 1464704979, '2016-05-30 14:29:39', '0000-00-00 00:00:00'),
(89, '7IvrhZJUIRJrIy6jaeCCWtI2tWifwUxdCZPhVrNf', 89, 1464706497, '2016-05-30 14:54:57', '0000-00-00 00:00:00'),
(90, 'UwWzTweKD2USfPqP9XqMOjWtGfK1nTJSQU23YZPg', 90, 1464756142, '2016-05-31 04:42:22', '0000-00-00 00:00:00'),
(91, 'PHgLrmUBVReFehMLqus7n77vK11NlkJPhLozep8e', 91, 1464892149, '2016-06-01 18:29:09', '0000-00-00 00:00:00'),
(92, '7FBE38wI5oDZ1xyWyF9unoCMhmYkpewUXSkvcaJ3', 92, 1464892254, '2016-06-01 18:30:54', '0000-00-00 00:00:00'),
(93, 'pmdXrCf1ABIwMlCsnVwNy7sFOGsCDueEttS9qSr4', 93, 1464893373, '2016-06-01 18:49:33', '0000-00-00 00:00:00'),
(94, 'sCuvkeo57FeVOs3lWCNIDeDNZFLuT38YaZeSfPjP', 94, 1464893379, '2016-06-01 18:49:39', '0000-00-00 00:00:00'),
(95, 'WM3rD6Vos6XWurrVALsBVeq5Y3YLyge7VNA042ME', 95, 1464894464, '2016-06-01 19:07:44', '0000-00-00 00:00:00'),
(96, 'ymGPpz9cGC0tcxm4jSYNWGarC4XhK85ukd4Mv2FX', 96, 1464894713, '2016-06-01 19:11:53', '0000-00-00 00:00:00'),
(97, 'NkDjeMHZVfGt3Owvg1OgGiibDsswckKCCHezvuni', 97, 1464894873, '2016-06-01 19:14:33', '0000-00-00 00:00:00'),
(98, 'dhe57PbksqAKOnJWWrcHqJ9F4ExzeJMSIH0FiQSB', 98, 1464895358, '2016-06-01 19:22:38', '0000-00-00 00:00:00'),
(99, 'FUcVajchy70bFUGWHZ1PEA5Pypv7ZMoAyG8irDDh', 99, 1464895467, '2016-06-01 19:24:27', '0000-00-00 00:00:00'),
(100, 'z4ZnpcDXIiIj4jpuPwJCKyVWOp0DNW3li7krOIMD', 100, 1464895710, '2016-06-01 19:28:30', '0000-00-00 00:00:00'),
(101, 'Z11O35jSQzjYo0kHL9Fxp5AlUchYaJgxFGwofvIt', 101, 1464895943, '2016-06-01 19:32:23', '0000-00-00 00:00:00'),
(102, 'gRPvJCNOgA9ByHQ8K8M9RFCu9GTyTLzh0hQQoPr8', 102, 1464896105, '2016-06-01 19:35:05', '0000-00-00 00:00:00'),
(103, 'i1YvwnXjZeMWapan2W3Rts1eOXB7PaasPkT0ItzN', 103, 1464896221, '2016-06-01 19:37:01', '0000-00-00 00:00:00'),
(104, 'IYVgc100rR4PehUwPlGVx2pulyBSzdmmBcjylL3h', 104, 1464896367, '2016-06-01 19:39:27', '0000-00-00 00:00:00'),
(105, 'W3AJdmIlx9Kg2bNZIezEbQrtsNUdQHofkiOCDdA0', 105, 1464896599, '2016-06-01 19:43:19', '0000-00-00 00:00:00'),
(106, 'GWiJ0LI1emMJx0pFsm0x0UBzimYEruSuZHh7TNA3', 106, 1464896747, '2016-06-01 19:45:49', '0000-00-00 00:00:00'),
(107, '1p2Mw2q1FB80GV8SuBRA91QGbl9BJcY1AqRZ6akY', 107, 1464896827, '2016-06-01 19:47:07', '0000-00-00 00:00:00'),
(108, 'cUIHmKdMzUwqkr8KxNvWETbwd2bkmpU48m6iMXDE', 108, 1464896951, '2016-06-01 19:49:11', '0000-00-00 00:00:00'),
(109, 'vodOfV9Yn8P0NG7c6sg24pbwOLu1Lm1WuS2XcZlK', 109, 1464896993, '2016-06-01 19:49:53', '0000-00-00 00:00:00'),
(110, 'PJkk18ByEzaBRsTNsXGDW1vJ4Nnzp0npPuv5CJ6p', 110, 1464897190, '2016-06-01 19:53:10', '0000-00-00 00:00:00'),
(111, 'Fgbt7erwtPjCx0DOvX8FG60J7BqMgbhKCgmX9c8W', 111, 1464897211, '2016-06-01 19:53:31', '0000-00-00 00:00:00'),
(112, 'cVthh5bRsvKPEjjSfiWLTNzLrPBilf9Jk8LG2fQ5', 112, 1464897602, '2016-06-01 20:00:02', '0000-00-00 00:00:00'),
(113, '4hq3UuzwAyOUeIDLU1Lj23nH6yNisLqF8CMu9H28', 113, 1464897711, '2016-06-01 20:01:51', '0000-00-00 00:00:00'),
(114, 'DIibWuvyI8FoAXLiYNviYaPnGuf7kOUzIfvVHvEA', 114, 1464899015, '2016-06-01 20:23:35', '0000-00-00 00:00:00'),
(115, 'jG3qgGBV85qA2ipKC9i3o82HmWZRPlf8b8btNrdP', 115, 1464899075, '2016-06-01 20:24:35', '0000-00-00 00:00:00'),
(116, 'fpEeTIKIP7jacH9EYNExuPjSs2XHJysCdPW69tvV', 116, 1464899260, '2016-06-01 20:27:40', '0000-00-00 00:00:00'),
(117, 'QKZhV1DEwa149suBHrQmqRLG2rPkvZzlQcShFCm9', 117, 1464899579, '2016-06-01 20:32:59', '0000-00-00 00:00:00'),
(118, 'yjwvPetvxx5RMzy7CCvTgbI0fZH7IIyvzqfVSlR3', 118, 1464899753, '2016-06-01 20:35:53', '0000-00-00 00:00:00'),
(119, 'VpOJmY7CdP2U1j6uCXsUKRpwaTFLgO1ZSG7yeyEV', 119, 1464899826, '2016-06-01 20:37:06', '0000-00-00 00:00:00'),
(120, '0lmm6kOOT9lVTGt69K9VdkLmJuLfijaQOm4PZ4hn', 120, 1464975017, '2016-06-02 17:30:17', '0000-00-00 00:00:00'),
(121, 'rktecw82MBWTAPrfUgBb1Za7CSqVjQmmOFuFpTmf', 121, 1464976068, '2016-06-02 17:47:48', '0000-00-00 00:00:00'),
(122, 'xfwbkirKbS0WEse0n5AIelu6pvh1vJZhCea3JCq7', 122, 1464976150, '2016-06-02 17:49:10', '0000-00-00 00:00:00'),
(123, '3P9heQJWtlCx5hpodTjElad9l8quktRyIQeuELMv', 123, 1464976460, '2016-06-02 17:54:20', '0000-00-00 00:00:00'),
(124, 'WJgYMVkvKjPUey3vOCGxRGlEdUV8pXCJxxLRsckq', 124, 1464976757, '2016-06-02 17:59:17', '0000-00-00 00:00:00'),
(125, 'hxp2hAYwxRmKgVqINb6Da5CO6TFIFBC15j0j5cdW', 125, 1464978015, '2016-06-02 18:20:15', '0000-00-00 00:00:00'),
(126, 'PfT9pi6x2AoXsarafR0yzpzrmHLzdLIOGF4HWm4z', 126, 1464978133, '2016-06-02 18:22:13', '0000-00-00 00:00:00'),
(127, 'l4l3YuxTytJ2f8orR00WGVTDq64EgnwINuOlrCY7', 127, 1464978217, '2016-06-02 18:23:37', '0000-00-00 00:00:00'),
(128, 'hab7lh6UbZUwk7ZiC6W9WA29yPBwxpLSTdZvPwxw', 128, 1464978242, '2016-06-02 18:24:02', '0000-00-00 00:00:00'),
(129, 'iyUmlyt3NH4YYSqXTvDnbKCoLDfuZjLGOsimGm28', 129, 1464978485, '2016-06-02 18:28:05', '0000-00-00 00:00:00'),
(130, 'zxRRoNyQvq6IyCTQ9tkpXQDrAQDWP6d7buaILhmt', 130, 1464978881, '2016-06-02 18:34:41', '0000-00-00 00:00:00'),
(131, '0q5wGQwdHIAGfJST66zJUi1oomeG8nqjXa91uGYx', 131, 1464979610, '2016-06-02 18:46:50', '0000-00-00 00:00:00'),
(132, '5ryvva1tab9uR1OC3rnGo4ckM4JSqM0dJXaTjUn4', 132, 1464980144, '2016-06-02 18:55:44', '0000-00-00 00:00:00'),
(133, 'k7Syx12bkpRrjpNCeJmMJ05FG46AuTyobTLDJ6Ck', 133, 1464981118, '2016-06-02 19:11:58', '0000-00-00 00:00:00'),
(134, 'eCc3Qqf8rOEkE5UavDEKiwWAAgXNjLR5kFGfmKS8', 134, 1464981187, '2016-06-02 19:13:07', '0000-00-00 00:00:00'),
(135, 'B4EAVHkoLgdl7JIMUeRXnRSnerTGkokteqb6tzQD', 135, 1464981231, '2016-06-02 19:13:51', '0000-00-00 00:00:00'),
(136, 'kkfd7w7SA43PThzSzVocvCHMmLomLlJ31DsjeMig', 136, 1464981294, '2016-06-02 19:14:54', '0000-00-00 00:00:00'),
(137, 'PbxL5hzFzyTql8dQjyxE5npxAyIjuN5R436EBvnw', 137, 1465102882, '2016-06-04 05:01:22', '0000-00-00 00:00:00'),
(138, 'VRsZZ0lRJ1AbQrtlRbP5FIU810diajTRVLR4MCaa', 138, 1465180544, '2016-06-05 02:35:44', '0000-00-00 00:00:00'),
(139, 'e4aptdoXgpBmCl2xQOQ4wawrPb6eCBk27ik3iIva', 139, 1465181022, '2016-06-05 02:43:42', '0000-00-00 00:00:00'),
(140, 'j3hyIImqOLR4mKPTF1gdneRikaGCwnU6csJBwIyK', 140, 1465181082, '2016-06-05 02:44:42', '0000-00-00 00:00:00'),
(141, 'r8NoBZGL0pH2CHa2cBZPw9BsCqSKe81lgx7n6AVl', 141, 1465181548, '2016-06-05 02:52:28', '0000-00-00 00:00:00'),
(142, '85OG6dVvcS9gaC0KDZbmXIzQZLrfkNDnKYBRsudt', 142, 1465183502, '2016-06-05 03:25:02', '0000-00-00 00:00:00'),
(143, 'aoMCgrqe71SXGT6B7hfaSb2hBHTmVW5cZ3HPf2kZ', 143, 1465184370, '2016-06-05 03:39:30', '0000-00-00 00:00:00'),
(144, 'jm6ocjUym7vSVwwvwZvj3fyTLkDTT459x9hWvqTT', 144, 1465184623, '2016-06-05 03:43:43', '0000-00-00 00:00:00'),
(145, '5jPWgp3xsArGssxvCiC9tbeSOgk1CnHe8GFFn8Pi', 145, 1465185891, '2016-06-05 04:04:51', '0000-00-00 00:00:00'),
(146, 'e4gZa3GEc4TEByK8VxlQCoWEAt55RzMgyYkPU8rc', 146, 1465186336, '2016-06-05 04:12:16', '0000-00-00 00:00:00'),
(147, 'yrbwBN9iVGMdBrhcD3qI4CA1p9xP1iFmGQXSxr3c', 147, 1465187414, '2016-06-05 04:30:14', '0000-00-00 00:00:00'),
(148, '32FcYSAL7Auhm65PN0hLqr0NrIIXf0b2QgqZZj0m', 148, 1465187892, '2016-06-05 04:38:12', '0000-00-00 00:00:00'),
(149, 'bLY49o5b89vjL0LXjki5u7mWnTLeo58EkJ6ZLrBU', 149, 1465188179, '2016-06-05 04:42:59', '0000-00-00 00:00:00'),
(150, 'I8NxudZ3HI0rLAW0YjkGK2Fp39wEok9u198WfxhU', 150, 1465188813, '2016-06-05 04:53:33', '0000-00-00 00:00:00'),
(151, 'BHqik3MNepSQCGz1eZuncu5MXOfb0IPnXeRikjtH', 151, 1465198290, '2016-06-05 07:31:30', '0000-00-00 00:00:00'),
(152, '2e722mTHmTiaxWfwUM7yigWoTeS1h2oQcSMhJKQP', 152, 1465224044, '2016-06-05 14:40:44', '0000-00-00 00:00:00'),
(153, 'iUHjzw9UIM45YAwsPHTq30Q8hH548I9cPs1Fq1sF', 153, 1465224269, '2016-06-05 14:44:29', '0000-00-00 00:00:00'),
(154, '076fUvLFwsnUQjG05H14ik8xnwdCbuW77EeNGDXj', 154, 1465227309, '2016-06-05 15:35:09', '0000-00-00 00:00:00'),
(155, 'TYV0yyj3XIYrsuF4immCpeF5I9cHefeTnatrB0Ol', 155, 1465227434, '2016-06-05 15:37:14', '0000-00-00 00:00:00'),
(156, 'dFB6WBIyEwuH31nL5QnuHcYdiCO3nxLQrRKNn28k', 156, 1465228071, '2016-06-05 15:47:51', '0000-00-00 00:00:00'),
(157, 'CpuuyYjghehu0soYHcWU7flPxLgFG9cE4WMu4CBf', 157, 1465228438, '2016-06-05 15:53:58', '0000-00-00 00:00:00'),
(158, 'sO1WvUBTptRwIr6ilk4lkwxr0mWcfrcA0OqbPc4O', 158, 1465365524, '2016-06-07 05:58:45', '0000-00-00 00:00:00'),
(159, 'xXwszAbUNN6Otnm8eG2ExaiBG6DtqFeZZhewdsNX', 159, 1465463562, '2016-06-08 09:12:42', '0000-00-00 00:00:00'),
(160, 'SHohG8MAPvDwFebyu5dwE0oYvsL8GeM3Q38TNi2E', 160, 1465466971, '2016-06-08 10:09:31', '0000-00-00 00:00:00'),
(161, 'OACB1L0KDurCic38ywnreWzZPvLd25ayDex6nsld', 161, 1465467802, '2016-06-08 10:23:22', '0000-00-00 00:00:00'),
(162, 'uzbSFBFEeOUoyrssubdILJZrpKdyft96e8CteS7N', 162, 1465540410, '2016-06-09 06:33:30', '0000-00-00 00:00:00'),
(163, 'zBI4Fh9XyDSius78oRCrDQPl3kBcEsxhMjWwkDwY', 163, 1465540502, '2016-06-09 06:35:02', '0000-00-00 00:00:00'),
(164, 'Oy8q9UYfLFTrJqKUbdYHJKOBL48umO7W0lZ1dZvE', 164, 1465540697, '2016-06-09 06:38:17', '0000-00-00 00:00:00'),
(165, 'luWe3Q62FnMUj4DGgbnvcvyElfDzEIsvzrb9kcU1', 165, 1465541156, '2016-06-09 06:45:56', '0000-00-00 00:00:00'),
(166, 'QqzGgVy1JIOWXi8WDXPzrMp1rgWY1kDMed77Wtn6', 166, 1465623596, '2016-06-10 05:39:56', '0000-00-00 00:00:00'),
(167, 'NLlsil9WIdOdxjpARNSCO7aSijKIbwS8eDhu4HUU', 167, 1465623764, '2016-06-10 05:42:44', '0000-00-00 00:00:00'),
(168, 'Ia3H7iNTkdzd9UdtekK90rHcwRrXOYWcqCaqu9KU', 168, 1465653217, '2016-06-10 13:53:37', '0000-00-00 00:00:00'),
(169, 'NwOwwjg7DwLGN252S7xIuGYWn4O1OV2JiYxtGKgQ', 169, 1465655104, '2016-06-10 14:25:05', '0000-00-00 00:00:00'),
(170, 'eUCCYRmcFDbtnh275PUTVdbvlmjRIFySjth6BkBL', 170, 1465655857, '2016-06-10 14:37:37', '0000-00-00 00:00:00'),
(171, '3pAT1RlLivhMvtOWaevXx25yn0Bp8RM1dslwa2ss', 171, 1465658071, '2016-06-10 15:14:31', '0000-00-00 00:00:00'),
(172, '9WmbYqdMEZnCSM7NAHsdaUciKFvEGZZV0mPosD4z', 172, 1465658126, '2016-06-10 15:15:26', '0000-00-00 00:00:00'),
(173, 'okn9TNJyTtJoMfzxh10idItIpDA0VT5f61WvRwAc', 173, 1465658925, '2016-06-10 15:28:45', '0000-00-00 00:00:00'),
(174, 'G3CAPfZbmmlElMYuCZhXmyBegY6y21wCGsN8jawb', 174, 1465659261, '2016-06-10 15:34:21', '0000-00-00 00:00:00'),
(175, 'oRmwP0znaQ1U1t7e2g3dMw3plSZmwqtzROdj31g1', 175, 1465659352, '2016-06-10 15:35:52', '0000-00-00 00:00:00'),
(176, 'DbhcEGHWkBQtZ7szorOX9kZW7ZUgaqbUH93SU6Z9', 176, 1465659485, '2016-06-10 15:38:05', '0000-00-00 00:00:00'),
(177, 'AS4NwFehhJZWAFcrzTZppwW6fQB0fJvLdMtG8eT4', 177, 1465659654, '2016-06-10 15:40:54', '0000-00-00 00:00:00'),
(178, 'baSxh9A0ej5AZfWHx0R79ydty5hDfLueyWBJ2CGZ', 178, 1465659737, '2016-06-10 15:42:17', '0000-00-00 00:00:00'),
(179, 'Y0HeArQy23WvbJhGHmzDQcM1HraczhGt8Hp6cyYZ', 179, 1465712864, '2016-06-11 06:27:44', '0000-00-00 00:00:00'),
(180, 'wjiry7rFZ5ng6Z7F2Y9btFPO4MID2sqL8crECFXv', 180, 1465717126, '2016-06-11 07:38:46', '0000-00-00 00:00:00'),
(181, 'R5DHr1mJlQ6GcC6TUHqoQgpIau26cDWH045WMgM1', 181, 1465718369, '2016-06-11 07:59:29', '0000-00-00 00:00:00'),
(182, 'dYQs5wHxkPAiW1f14WCHAgoALrhuC6KO81WppMyw', 182, 1465718458, '2016-06-11 08:00:58', '0000-00-00 00:00:00'),
(183, '8QsTcpRFBVdKnxIbSah8wSK3C5v3EHjvBRbwVk9u', 183, 1465718663, '2016-06-11 08:04:23', '0000-00-00 00:00:00'),
(184, 'b3horrB46V3u5XADkVo3PxQTtP34LP8YlHPyEf86', 184, 1465719167, '2016-06-11 08:12:47', '0000-00-00 00:00:00'),
(185, 'K9G9Ql1H5TB6lampdudKzHLDKJzuOiTTHIVYPTrP', 185, 1465719298, '2016-06-11 08:14:58', '0000-00-00 00:00:00'),
(186, 'p2wBrW5rAQGXPFGsucgU1sRYAtNMfm6NEbmeAKgY', 186, 1465728773, '2016-06-11 10:52:54', '0000-00-00 00:00:00'),
(187, 'Sw8JGEHE4ZxI56yFCdH9RxmjrE8uczKsByxhc04i', 187, 1465729132, '2016-06-11 10:58:52', '0000-00-00 00:00:00'),
(188, 'cZHajUvsLPnnpKee0SEgVpPCBBIRZe4113QucHLw', 188, 1465729627, '2016-06-11 11:07:07', '0000-00-00 00:00:00'),
(189, 'ZiHdb6zp02eObQdyOzQAXmq8V5on0sgfRSbHnmIu', 189, 1465729753, '2016-06-11 11:09:13', '0000-00-00 00:00:00'),
(190, 'jnbERCNjsFaMlhCqxUiIVtURmDGVDlbJS03sIc6p', 190, 1465730075, '2016-06-11 11:14:35', '0000-00-00 00:00:00'),
(191, 'zzvFqUlu6OWj96mcSp2hCDSsw2V9pxB9REF48Lk7', 191, 1465730556, '2016-06-11 11:22:36', '0000-00-00 00:00:00'),
(192, 'uRkOMmZjOhWGBJdVjVQyebLI3r2R2sCdQCPr8uJG', 192, 1465730620, '2016-06-11 11:23:40', '0000-00-00 00:00:00'),
(193, 'Vv4CRDqk4HVYgZMFB8pgaz06vIgcVn3HE7ytDNBV', 193, 1465731524, '2016-06-11 11:38:44', '0000-00-00 00:00:00'),
(194, 'g0X1b891rTYpCX0KNZYCktvgk5G5ckJWU8cdY9Ay', 194, 1465731614, '2016-06-11 11:40:14', '0000-00-00 00:00:00'),
(195, '1HIqG59nQZ0Be3BtusHUk6QBQorxkKJgsstNdeC6', 195, 1465736641, '2016-06-11 13:04:01', '0000-00-00 00:00:00'),
(196, '60tWcVY9sYakqgLJsOoJuvfet8OlGn7mmzkAiTf1', 196, 1465737163, '2016-06-11 13:12:43', '0000-00-00 00:00:00'),
(197, 'MgjC3BPWJ8JV160G5HOtHfAx1xxo0e4TYvuRJD30', 197, 1465737243, '2016-06-11 13:14:03', '0000-00-00 00:00:00'),
(198, '17zoUCGc0goYXCj7SeF5b3GmfhY6Fllq9V6a4jXG', 198, 1465737501, '2016-06-11 13:18:21', '0000-00-00 00:00:00'),
(199, 'psxl7UnezIB8HS7rZ54mWzPptMZddKKy0xx5FBGS', 199, 1465737590, '2016-06-11 13:19:50', '0000-00-00 00:00:00'),
(200, '444fh20p65VGkoHMIIW7wEL8McC4Uga7G9QB5AhF', 200, 1465737757, '2016-06-11 13:22:37', '0000-00-00 00:00:00'),
(201, 'yTFDN7x8lNaJk2msma1XQzgfIJDanWCW7fLEOQaj', 201, 1465737962, '2016-06-11 13:26:02', '0000-00-00 00:00:00'),
(202, 'sisoMKn9l7ligAsyfk3frbwS9ff81oewCQ4go9iP', 202, 1465738248, '2016-06-11 13:30:48', '0000-00-00 00:00:00'),
(203, '7PehLoCR0xdiW6Kz5KYCpFog79w2NM1QAanveXGN', 203, 1465738433, '2016-06-11 13:33:53', '0000-00-00 00:00:00'),
(204, '8MjQWcHVS33w2x2qiJ70ZdQo2FEjyAidglBu5B3L', 204, 1465738684, '2016-06-11 13:38:04', '0000-00-00 00:00:00'),
(205, 'pODh75xgdnoMnYACuY6BEgnynjORzhwthYbSL0Ew', 205, 1465739875, '2016-06-11 13:57:55', '0000-00-00 00:00:00'),
(206, 'o2S4Gf4sVNeprGkcVEXzYPSpS1gBR1Hh5ZZLJ7qx', 206, 1465740051, '2016-06-11 14:00:51', '0000-00-00 00:00:00'),
(207, 'GQkQaDXDbsz7EnRhwTr003KlncN21qldBIIJQeIU', 207, 1465740600, '2016-06-11 14:10:00', '0000-00-00 00:00:00'),
(208, 'eDvqC2oWV4bMZ5rnsxugTsOlxGUscUZWuS1q7L8m', 208, 1465740831, '2016-06-11 14:13:51', '0000-00-00 00:00:00'),
(209, 'bpiaopqcuVohVqJNiwdSZCrTiBml4ir10J8BN2F6', 209, 1465741580, '2016-06-11 14:26:20', '0000-00-00 00:00:00'),
(210, 'v7TcgTJSvYcnsamjDJl46UUu0EVcvWEjJSZv0gD9', 210, 1465741722, '2016-06-11 14:28:42', '0000-00-00 00:00:00'),
(211, 'afn4DmPzaEqurT8MvKmsoAT45lkQC56sFUNVnAcv', 211, 1465742996, '2016-06-11 14:49:56', '0000-00-00 00:00:00'),
(212, 'jCbtnU36jFi0vWR2JIajkZaIea6qM5ybF2QW9QlJ', 212, 1465743446, '2016-06-11 14:57:26', '0000-00-00 00:00:00'),
(213, 'cXG3FPumt3IZiLtyoVyEihpezPqQNJ4PaR3qXwtM', 213, 1465743858, '2016-06-11 15:04:18', '0000-00-00 00:00:00'),
(214, 'r6V3q3LTwvTuD5RFZGrKB3JCE26tsHFUD77Wi7aK', 214, 1465744116, '2016-06-11 15:08:36', '0000-00-00 00:00:00'),
(215, 'qact05D5c5VxSlGC3MUcynEcXzO80brXQFjdLAeL', 215, 1465744828, '2016-06-11 15:20:28', '0000-00-00 00:00:00'),
(216, 'R5ZF1vmouaSzVnBJ4wRJIoFUZq3mO5J5pPLW50t0', 216, 1465745263, '2016-06-11 15:27:43', '0000-00-00 00:00:00'),
(217, 'Jkx8h1McprD1gN05WGCwjOf3zcmFRKSV8SsEEnAf', 217, 1465745410, '2016-06-11 15:30:10', '0000-00-00 00:00:00'),
(218, 'NyYxBLk63njmDdqwE4RCXISzUvfO1XTLFH023M77', 218, 1465745529, '2016-06-11 15:32:09', '0000-00-00 00:00:00'),
(219, '5oJseKlXEzaPgx8cfAdcial5iVnHMHHp1QF3wXyG', 219, 1465745689, '2016-06-11 15:34:49', '0000-00-00 00:00:00'),
(220, 'cxmbXYF8mF6cgb95ixslRK5uuxs61eD3CEpVH6or', 220, 1465880124, '2016-06-13 04:55:24', '0000-00-00 00:00:00'),
(221, 'EhaAHbx8VjAYDQgJMZSGkNHTOiwcI5GoSSp1D2yU', 221, 1465881561, '2016-06-13 05:19:21', '0000-00-00 00:00:00'),
(222, 'ZK9xUAAOpLvJtu8DQ9b8XXporOBbxHfjss3qYeKj', 222, 1465885737, '2016-06-13 06:28:57', '0000-00-00 00:00:00'),
(223, 'ojL5pYRjrNr1chDdy7Dhwq7NxoHEQoyWOQSsYcVK', 223, 1465886399, '2016-06-13 06:39:59', '0000-00-00 00:00:00'),
(224, 'mlLzTxesAKQXinxcRBjf82AypGAmKRE1xnGmX2pq', 224, 1465886746, '2016-06-13 06:45:46', '0000-00-00 00:00:00'),
(225, 'kBf4LFQ1H2Ux5zynw6Ty0X3CqeWVfc0AUW1Pz7f2', 225, 1465888724, '2016-06-13 07:18:44', '0000-00-00 00:00:00'),
(226, '7UAgRHmeC5RGRQlCEQhJt3lb6JPnT7mnUCQIOUMv', 226, 1465889826, '2016-06-13 07:37:06', '0000-00-00 00:00:00'),
(227, 'SZ1u0bLkw3W7qGBbQe0mlxITzGP6j33N7mcb12Vv', 227, 1465889987, '2016-06-13 07:39:47', '0000-00-00 00:00:00'),
(228, 'hBX26CEag3STX37xtK4GB6VLWcCMRJE2qMF9QIEx', 228, 1465924799, '2016-06-13 17:19:59', '0000-00-00 00:00:00'),
(229, 'pEH56yHDczz80GJ7gTscivgUgFI4sWKsh1R9Tyc2', 229, 1465968562, '2016-06-14 05:29:22', '0000-00-00 00:00:00'),
(230, 'dWBVfOPzGS2SuP10BENHPi8UyH9ei3kUiVYc2s4Y', 230, 1465968651, '2016-06-14 05:30:51', '0000-00-00 00:00:00'),
(231, 'kos1JWlIBf7r9bvwUbBt2HfhXbQSasDetwOmOHtj', 231, 1465968783, '2016-06-14 05:33:03', '0000-00-00 00:00:00'),
(232, 'Y1t52IEgaey6ODUjy01s9njcNX8Dk6L4GTQAKje7', 232, 1465968923, '2016-06-14 05:35:23', '0000-00-00 00:00:00'),
(233, 'jjjvbvEx17MDxFPylD8V9bwYbRh14jMtozVFHZRB', 233, 1465969142, '2016-06-14 05:39:02', '0000-00-00 00:00:00'),
(234, 'oeRYacoOHs40nRrkGNZCBfUi6Upwpcr9uLc86Hzf', 234, 1465969407, '2016-06-14 05:43:27', '0000-00-00 00:00:00'),
(235, 'BbHwyykISg4sOSmMkGiO72eZE8RWep6Woed9yneJ', 235, 1465969457, '2016-06-14 05:44:17', '0000-00-00 00:00:00'),
(236, 'BLcYnxe7AoixV7WiLWi2G7mjvJ84qKQRMa49atUQ', 236, 1465970763, '2016-06-14 06:06:03', '0000-00-00 00:00:00'),
(237, 'HIuVBb5GfGLO1UOna0BwW5CqMVqWpEdb0ejd5Thl', 237, 1465970844, '2016-06-14 06:07:24', '0000-00-00 00:00:00'),
(238, 'Kb0QqmFUxnDKgy79kqJVB1o1sN0NVB1xcNS7mnD8', 238, 1466054085, '2016-06-15 05:14:45', '0000-00-00 00:00:00'),
(239, 'VuNfH8Rh6W442wEgd4RQgdmfS6fkISRbBYsIlhv6', 239, 1466055250, '2016-06-15 05:34:10', '0000-00-00 00:00:00'),
(240, 'bSd65cOG5q6rjOpzd17alI3AHpIKTr0R3hsINHRB', 240, 1466056487, '2016-06-15 05:54:47', '0000-00-00 00:00:00'),
(241, 'oo7w4F3JAUvuswwefq3ZIGVnaTRL2Qpvq7pFl10q', 241, 1466056751, '2016-06-15 05:59:11', '0000-00-00 00:00:00'),
(242, 'f43ol9osUv1WuxtZLlNEMWLCaTLGxumMcEXSooLg', 242, 1466056811, '2016-06-15 06:00:11', '0000-00-00 00:00:00'),
(243, 'sQ3KwpOrilU4ucUEYflYEaZsvE4qRUK6YGlJbjEB', 243, 1466077153, '2016-06-15 11:39:13', '0000-00-00 00:00:00'),
(244, 'SFpalnmfoF5XOnN3b6z2ZGzykptIzPDObNShstOo', 244, 1466078027, '2016-06-15 11:53:47', '0000-00-00 00:00:00'),
(245, 'ydP6aZFkRULjvbJwwNf2vcGN7x3CRPU1TJWT3ne0', 245, 1466087028, '2016-06-15 14:23:48', '0000-00-00 00:00:00'),
(246, 'RGkWSFEHzj5Ccy2XVpmtN2sMIZiiJxVBhamhlN1B', 246, 1466165465, '2016-06-16 12:11:05', '0000-00-00 00:00:00'),
(247, '0ShE0DOXvhFwddTHm74a1zieWkN1gKfUIo0oF7vY', 247, 1466165639, '2016-06-16 12:13:59', '0000-00-00 00:00:00'),
(248, 'f92G8pbPaXE8qk4wYIyAiqmeWDg9xpjpwEAQkUn3', 248, 1466166259, '2016-06-16 12:24:19', '0000-00-00 00:00:00'),
(249, 'qC7yKazfB30vCrYmK124sni3Vcvju8TDzrYO43L1', 249, 1466182684, '2016-06-16 16:58:04', '0000-00-00 00:00:00'),
(250, '5p1vh6dKkQRj38Fc3c5TP7MLSYRn4CtfojvJTtEW', 250, 1466183410, '2016-06-16 17:10:10', '0000-00-00 00:00:00'),
(251, '2TdKWEFd6natvtUPde8zclWEDdiJN22xcsuSJt3K', 251, 1466184199, '2016-06-16 17:23:19', '0000-00-00 00:00:00'),
(252, '1ldgwC6CZNjunvApCqKLWAJjQHPEP8PwzcbEJSbZ', 252, 1466184671, '2016-06-16 17:31:11', '0000-00-00 00:00:00'),
(253, 'ZJN5YT2KKVEBvKQZzVK5BX9cpPCtTKHyPbMrgLEm', 253, 1466184730, '2016-06-16 17:32:10', '0000-00-00 00:00:00'),
(254, 'REhuboSpwJ28UZWEhJB5LbWIVpIG9SfSqihHlQTh', 254, 1466185343, '2016-06-16 17:42:23', '0000-00-00 00:00:00'),
(255, 'OgKQfBNL4LwPxfMeq9LSptJWUmtwzJfcN81agGgP', 255, 1466185937, '2016-06-16 17:52:17', '0000-00-00 00:00:00'),
(256, 'KQmharzP7stxWG0IPpMZgMDS3CT9lANyqMpG0NZt', 256, 1466186094, '2016-06-16 17:54:54', '0000-00-00 00:00:00'),
(257, 'zeKpimPcWzS1n3xqow17PW7Clbltg4MLhjBn0dsd', 257, 1466186312, '2016-06-16 17:58:32', '0000-00-00 00:00:00'),
(258, 'GzY16E2IxaH86zsmUKcwclJpybvpDqrgGnfy3Gr7', 258, 1466187071, '2016-06-16 18:11:11', '0000-00-00 00:00:00'),
(259, 'Ml5V1D06yxXBUNaPIBs3y4OSWVL0b0MZlPhPRYK3', 259, 1466187431, '2016-06-16 18:17:11', '0000-00-00 00:00:00'),
(260, 'BxFdmzeA7uPV0EeTcH1EIuwcdvHIfYpZhDHflpX9', 260, 1466259784, '2016-06-17 14:23:04', '0000-00-00 00:00:00'),
(261, 'Z82apsLMIDursxNAalsodB11K3y07Wg2Ct27af3g', 261, 1466314999, '2016-06-18 05:43:19', '0000-00-00 00:00:00'),
(262, '1PpOdAglDiQPbcwUFgypqC4KuYB8l5F4cQEzjWE1', 262, 1466316374, '2016-06-18 06:06:14', '0000-00-00 00:00:00'),
(263, 'fVhBCRUcTep0UEjqfDnF8H12NG3RI5rfTZU111yz', 263, 1466318182, '2016-06-18 06:36:22', '0000-00-00 00:00:00'),
(264, 'wDq1TGCHFrGspc3doNF0dII9k4Q45tCmsuC5MRhX', 264, 1466318238, '2016-06-18 06:37:18', '0000-00-00 00:00:00'),
(265, 'Jo1twDvpMnWaPFEQrCBi6YhwbECx5R3KV5Bk8IFo', 265, 1466318366, '2016-06-18 06:39:26', '0000-00-00 00:00:00'),
(266, 'pbPSSfHvzYHkciR4zHtXaU9escuBu35VsBt6gnmx', 266, 1466318533, '2016-06-18 06:42:13', '0000-00-00 00:00:00'),
(267, 'P8jSk59jSylaRQxG7E0GuHJFesSdiKzyaji4Lhj8', 267, 1466318907, '2016-06-18 06:48:27', '0000-00-00 00:00:00'),
(268, 'TgZehEtKTQtkuYGvPRBB3jefXmJx1EgRuNY8mvHS', 268, 1466318959, '2016-06-18 06:49:19', '0000-00-00 00:00:00'),
(269, '9SjgqMXe5aQOH9oSF1jfeXaSrvLNi944lgNHGXWJ', 269, 1466319081, '2016-06-18 06:51:21', '0000-00-00 00:00:00'),
(270, 'e6MwZZy8EkBbEoKEBGCunSgtvo7wiM2WCTcQ7NVA', 270, 1466319779, '2016-06-18 07:02:59', '0000-00-00 00:00:00'),
(271, 'kP74fdk1amPNBdHtb4Rmv60ep1otYes2eM0hnVZV', 271, 1466319926, '2016-06-18 07:05:26', '0000-00-00 00:00:00'),
(272, 'L1k5XgWADiiOVfo8IzG441HiNdqgI7E0BlBAqycm', 272, 1466320044, '2016-06-18 07:07:24', '0000-00-00 00:00:00'),
(273, '1fe5gJMQy3byDxthjQ6uVP3TmodxuidWJNE9bmfe', 273, 1466320336, '2016-06-18 07:12:16', '0000-00-00 00:00:00'),
(274, 'lw3fawmmiAwV40AJlN7qV9Y7ZFjqFJkZ0BoFu53y', 274, 1466320450, '2016-06-18 07:14:10', '0000-00-00 00:00:00'),
(275, 'VE0l3KWNMCoO1S4ILE5WmiQHABKgFoDkP2Uk3JQR', 275, 1466320751, '2016-06-18 07:19:11', '0000-00-00 00:00:00'),
(276, 'OStkuso0RisXgY0fuwL0Me6HV1FZ8u1kVu4fOJ0q', 276, 1466320896, '2016-06-18 07:21:36', '0000-00-00 00:00:00'),
(277, 'RDOipYn2Ks6wMPa6iwsiWFKS4rzVE7ash4bz2yox', 277, 1466320984, '2016-06-18 07:23:04', '0000-00-00 00:00:00'),
(278, 'LWa0B9bCdrb8GbafwfIOZIhmCWv3jXYrP9W76htL', 278, 1466321090, '2016-06-18 07:24:50', '0000-00-00 00:00:00'),
(279, 'HbNmXFC1xkOpCaJh60kpCAPCfWijZQPjl5DknDcw', 279, 1466330404, '2016-06-18 10:00:04', '0000-00-00 00:00:00'),
(280, 'BeAQnI46YmnwW1SCPRgn4dh1i18Q86B5DKvzeUOg', 280, 1466330829, '2016-06-18 10:07:09', '0000-00-00 00:00:00'),
(281, 'saXw36xCxKqlFhWZwbSgDu9BeWW6FEBnwqypQu8Q', 281, 1466333872, '2016-06-18 10:57:52', '0000-00-00 00:00:00'),
(282, 'WZtEZlM7XwhW1LBDMkLG4W1CthWj7hWUul1Jp6Oi', 282, 1466334205, '2016-06-18 11:03:25', '0000-00-00 00:00:00'),
(283, 'J26Tj5TsCKh79PRq3dWGPI35CrkHwe1kqesz6EH1', 283, 1466345282, '2016-06-18 14:08:02', '0000-00-00 00:00:00'),
(284, 'js641OW4PbvLbOKGF0jeREa5yHrIA5Oo0TsSMUHE', 284, 1466347415, '2016-06-18 14:43:35', '0000-00-00 00:00:00'),
(285, 'qOPaho4YWJYWXuWFvECX0sfeUoW0vS4CguREIX4N', 285, 1466486091, '2016-06-20 05:14:51', '0000-00-00 00:00:00'),
(286, 'ntg5Pqn16jaxeCV72rHkMECgP5ETYSe3IFrvKNAY', 286, 1466494039, '2016-06-20 07:27:19', '0000-00-00 00:00:00'),
(287, 'jqI1gTndmlj1gwGrjJjpu6GD89t9W4Wfb0kazWjc', 287, 1466504470, '2016-06-20 10:21:10', '0000-00-00 00:00:00'),
(288, 'BQbYkYbpVfxpcP4syEQxdFKUi5DFuwuv3ZX82Xil', 288, 1466504966, '2016-06-20 10:29:26', '0000-00-00 00:00:00'),
(289, 'eySldQMCGNZg0lYoTgt32OM4polyEFhw8dFEOEYR', 289, 1466504971, '2016-06-20 10:29:31', '0000-00-00 00:00:00'),
(290, 'vFk1CRdC49h0Ob1dOTZmnvwjBuv5BAh3x0xoKVSB', 290, 1466504973, '2016-06-20 10:29:33', '0000-00-00 00:00:00'),
(291, 'V5uZN39GQUBbpJihPAu9RStnKEpL4dPn5KhqGdFA', 291, 1466504976, '2016-06-20 10:29:36', '0000-00-00 00:00:00'),
(292, 'tAlwwib5ABUGgadQimdIFRMUveqftaRt5RLcURZs', 292, 1466504988, '2016-06-20 10:29:48', '0000-00-00 00:00:00'),
(293, 'vYlb6PvCofT0eFCPK1nXqMlQ24cq57s7tOz9u2nq', 293, 1466507140, '2016-06-20 11:05:40', '0000-00-00 00:00:00'),
(294, '2qByng5AWhxvejcKdU8ALy3G7OLo96lsNMLIXl3E', 294, 1466509145, '2016-06-20 11:39:05', '0000-00-00 00:00:00'),
(295, 'LMFwdP8Qmfz2yGg6juWukHwywK5QPD2zpvfQCKcH', 295, 1466575913, '2016-06-21 06:11:53', '0000-00-00 00:00:00'),
(296, 'Rnvm7iCRzfMwmeqruEMdt3xiPD9OhBhvY85bB0EG', 296, 1466577947, '2016-06-21 06:45:47', '0000-00-00 00:00:00'),
(297, 'RMXnjm1gGUcaxyYe3HJgx6rx8Y0oeKACVakpZOof', 297, 1466586033, '2016-06-21 09:00:33', '0000-00-00 00:00:00'),
(298, 'RqpEn5giNzVvZT2IOWBupMtLFTG33als7tnysBVH', 298, 1466586589, '2016-06-21 09:09:49', '0000-00-00 00:00:00'),
(299, '2UfkeYytgFeQRE70r58fZARs26W6NrwtBcGK98d9', 299, 1466587357, '2016-06-21 09:22:37', '0000-00-00 00:00:00'),
(300, 'GrGOTUiA7j2YPNa34F1h6JUIjaFmwbXzeydKAjrm', 300, 1466615598, '2016-06-21 17:13:18', '0000-00-00 00:00:00'),
(301, 'vRG0BHSWrvxjmoqaIeLQJ8IR4pborHJHO5K6NNsn', 301, 1466616006, '2016-06-21 17:20:06', '0000-00-00 00:00:00'),
(302, 'xTkcTj7MhJygYI3WtF26oA4IUFLNOu1398FlFdMz', 302, 1466617365, '2016-06-21 17:42:45', '0000-00-00 00:00:00'),
(303, 'z9pNOg43T4E7AyZ3GxbEvf6X9iHfosx48Kkqa1bE', 303, 1466617588, '2016-06-21 17:46:28', '0000-00-00 00:00:00'),
(304, 'rk03laDJeOOwtIoATTBf0t01uRtULY1QYXZnrpMd', 304, 1466617710, '2016-06-21 17:48:30', '0000-00-00 00:00:00'),
(305, 'dhPxcjDQBnNjwQt5o0xb1o4WN0A6sSvAQApc0Vp5', 305, 1466617817, '2016-06-21 17:50:17', '0000-00-00 00:00:00'),
(306, 'ubNsIkOZMsrMvfdLAnVVPB0CgRoti8gxZCSwhXBJ', 306, 1466618069, '2016-06-21 17:54:29', '0000-00-00 00:00:00'),
(307, 'ntJA1v3GOnS2KmP1PLduqYUauufcMzMyMSHAmB9T', 307, 1466618176, '2016-06-21 17:56:16', '0000-00-00 00:00:00'),
(308, 'xL7ihHXeNnKj2FwlpctiWD1micfURgFF4kKc8TAy', 308, 1466963888, '2016-06-25 17:58:08', '0000-00-00 00:00:00'),
(309, 'wKZLJnENSw2tTINw2LYmdCHHTHFRBoPrr7etZWM7', 309, 1467108487, '2016-06-27 10:08:07', '0000-00-00 00:00:00'),
(310, '1uT4GYcMkDcLNMmC0HD0fgqvSEXkhHXNGnO1wE9V', 310, 1467262635, '2016-06-29 04:57:15', '0000-00-00 00:00:00'),
(311, 'p6SflIEnCQBMLrGA3Ma1N7V1L150yv38CLFWH8mq', 311, 1467262804, '2016-06-29 05:00:04', '0000-00-00 00:00:00'),
(312, 'cwDFGkXwp2uLuU3xh9RNJOqbUWUFLDy1J4nOQwZd', 312, 1467263367, '2016-06-29 05:09:27', '0000-00-00 00:00:00'),
(313, 'HLwu8shs8wvf25FhsTsRs5kCNGqXcFt6wfJx0vYM', 313, 1467346445, '2016-06-30 04:14:05', '0000-00-00 00:00:00'),
(314, 'r5LqVaJKvf9DWJYkjtDY7QcHMQxvItA3jCbwZZig', 314, 1467351213, '2016-06-30 05:33:33', '0000-00-00 00:00:00'),
(315, 'qLwnLsnKQWKOBFFq2Wz1jVJDKhB66yuBM4X8XBKD', 315, 1467454137, '2016-07-01 10:08:57', '0000-00-00 00:00:00'),
(316, 'QBiCPXc9TimPrxgMxF7qAOxI35ORJVzhSkBtRLhT', 316, 1467527779, '2016-07-02 06:36:19', '0000-00-00 00:00:00'),
(317, '01kcCQXBUlCD5TrhYiVXi366mrH0zpEQIZG79RCq', 317, 1467541333, '2016-07-02 10:22:13', '0000-00-00 00:00:00'),
(318, 'gXtMUK6hpMUm3qujlVgsOjxyXbViWeIIwy3f6Qtk', 318, 1467541691, '2016-07-02 10:28:11', '0000-00-00 00:00:00'),
(319, '4TjcWezDUu5B2nS5a9IObBcmJkCA0AhOc0lHhlw2', 319, 1467542089, '2016-07-02 10:34:49', '0000-00-00 00:00:00'),
(320, 'O6arryNRN0Pb0Orxyr9efNum2gS9h6IROPnwOQP1', 320, 1467700590, '2016-07-04 06:36:30', '0000-00-00 00:00:00'),
(321, 'ebP6wr1a7GtrvkULEEHpanA8PHSFa6GiTqx3nS0f', 321, 1467701137, '2016-07-04 06:45:37', '0000-00-00 00:00:00'),
(322, 'gzeYJL8yjD1b0YWQQWXnacOdbJLXE6nPJPoQDpUP', 322, 1467701375, '2016-07-04 06:49:35', '0000-00-00 00:00:00'),
(323, 'rAaks9rgH5NHfJF30QLiVioujajK6UFEWFuSLU3I', 323, 1467783243, '2016-07-05 05:34:03', '0000-00-00 00:00:00'),
(324, '8PQ02oCMK0PCfS0MdCh0EUFTaLlJgVYS4wgmfBuI', 324, 1467783381, '2016-07-05 05:36:21', '0000-00-00 00:00:00'),
(325, 'zEGYyHtJtRewTTzJ1pKeHMAwS2ELEDKhWHRpqkFO', 325, 1467819936, '2016-07-05 15:45:36', '0000-00-00 00:00:00'),
(326, 'n2QYoynKDnYVslnYqG0qWMa0GYR4kEpdP3x2P8Rq', 326, 1467916832, '2016-07-06 18:40:32', '0000-00-00 00:00:00'),
(327, '1PHwc6zNGiTHNPVJTs4G7tvb1qFYWLxgkgN5het3', 327, 1467916918, '2016-07-06 18:41:58', '0000-00-00 00:00:00'),
(328, 'yPpE4BvOHyY75k2ttfaBsv1wLmEp2SsWNk52EVGf', 328, 1467917024, '2016-07-06 18:43:44', '0000-00-00 00:00:00'),
(329, '9nMl2ZBT33mZ9GuYsggrbmpby0eewTEIrpk0ZEeq', 329, 1467917047, '2016-07-06 18:44:07', '0000-00-00 00:00:00'),
(330, 'SBNJAwWSO6Sjybot42TxcqNPwSutdPtFsMLwFTwW', 330, 1467917218, '2016-07-06 18:46:58', '0000-00-00 00:00:00'),
(331, 'FbkMHXkfjCcxPbFnUJ2MaSyP7topMNH6hzk4N7Ol', 331, 1467917252, '2016-07-06 18:47:32', '0000-00-00 00:00:00'),
(332, '4DloCNehyU1dsJEyYGoSXZD8GPT5Rw1nFBQLwrmH', 332, 1467917285, '2016-07-06 18:48:05', '0000-00-00 00:00:00'),
(333, 'JfbPWwCuFpkAxk8l9nS5hTyxzx7WlAGta6ByBWoD', 333, 1467917321, '2016-07-06 18:48:41', '0000-00-00 00:00:00'),
(334, 'unFcHPRkCdadPctYWvGbdRQ7XxDJEGF8uw6wvK7M', 334, 1467918618, '2016-07-06 19:10:18', '0000-00-00 00:00:00'),
(335, '0jAKkmeE8Eq5KpmDINZxRS61JJ2pXErqJluJhqJk', 335, 1467918640, '2016-07-06 19:10:40', '0000-00-00 00:00:00'),
(336, 'wuaBh9f6EgsZkGtw9hPPcKNNjaZHLEwvqrdzsi9u', 336, 1467918700, '2016-07-06 19:11:40', '0000-00-00 00:00:00'),
(337, 'OYmBjRBwQr4InjbnfVXHcsXnItviSd8EFXUncW1G', 337, 1467918863, '2016-07-06 19:14:23', '0000-00-00 00:00:00'),
(338, 'FCNEeUwUOQkUMTGUDcnkCXxI5fEQRBYCCDv0PMLe', 338, 1467955456, '2016-07-07 05:24:16', '0000-00-00 00:00:00'),
(339, 'AxiRwWzr6UQlVZg8hIbFdxNqIVSAvMMzdnooazje', 339, 1467959871, '2016-07-07 06:37:51', '0000-00-00 00:00:00'),
(340, 'z3WfWAFw2laWMXTYx0jUnhng5UqBfOGQlNEa7Khu', 340, 1467960402, '2016-07-07 06:46:42', '0000-00-00 00:00:00'),
(341, '7TzeNks2wtpCQOua0XbTOG9SErPoZYvGinvwamA8', 341, 1467971061, '2016-07-07 09:44:21', '0000-00-00 00:00:00'),
(342, 'RyJXNtoI4scQevVg9fgDrY44I7Sn4t5M8tJ4mgYw', 342, 1467971156, '2016-07-07 09:45:56', '0000-00-00 00:00:00'),
(343, 'PxutbrLftCyoJfO2znbdbKD5LiEUWelUAnCNNq57', 343, 1468309311, '2016-07-11 07:41:52', '0000-00-00 00:00:00'),
(344, '9MWBtTwSJXxJpSuoh8tT8YpUkgBQ7vZbW38DHrCE', 344, 1468374224, '2016-07-12 01:43:44', '0000-00-00 00:00:00'),
(345, 'nxXbiWzErKlx8FBzGyNS7E8CeVB0lVbA94iOvmcO', 345, 1468375830, '2016-07-12 02:10:30', '0000-00-00 00:00:00'),
(346, 'BK6vO0P6uFVrVdCi3d7is4hNl0Kk3gqtQKHMw2d9', 346, 1468379017, '2016-07-12 03:03:37', '0000-00-00 00:00:00'),
(347, 'M340TJ5RsOXudIdurVqFWDFjb8MhzVjQUvPc5qyr', 347, 1468385683, '2016-07-12 04:54:43', '0000-00-00 00:00:00'),
(348, 'SoY96A7MgV7W3bMVJJoEl7A2NoT7KrHqc5896aJm', 348, 1468387233, '2016-07-12 05:20:33', '0000-00-00 00:00:00'),
(349, 'YcrtU4fYrb55feizeFdm8Cy3lkLcm753TgNR8lJe', 349, 1468387766, '2016-07-12 05:29:26', '0000-00-00 00:00:00'),
(350, 'c6uZJJLtpGbuZeGz6ndwP0XjiDZuDtttKRmCp7D9', 350, 1468388030, '2016-07-12 05:33:51', '0000-00-00 00:00:00'),
(351, 'g7k7NPLUERwsPwOEyMowIqY5zzzs5UWzhYfcGhBs', 351, 1468388105, '2016-07-12 05:35:05', '0000-00-00 00:00:00'),
(352, 'q8vXsLX17MkXuleFQ1t71rfSD89LbEQ6WZIsm44O', 352, 1468388246, '2016-07-12 05:37:26', '0000-00-00 00:00:00'),
(353, '6BUEXWBswfNYpoECcq5IL0l7GgP1REhQX0ZJJ2kb', 353, 1468388883, '2016-07-12 05:48:03', '0000-00-00 00:00:00'),
(354, 'HcW1TRg0W2FKupgxONhIuFgih7qZZddVxr6Vrac8', 354, 1468389048, '2016-07-12 05:50:48', '0000-00-00 00:00:00'),
(355, 'sdaqF7NjtRihOKoL9WkaFln5mP8EEdnFeW0BzDxg', 355, 1468400386, '2016-07-12 08:59:46', '0000-00-00 00:00:00'),
(356, '82yxL65hiRrM4op0Ytww1mUIEwh5dpavfpmj0Feu', 356, 1468403248, '2016-07-12 09:47:28', '0000-00-00 00:00:00'),
(357, 'HpkyHwXr09tIN4VBTlLjlmyftWIxWcZHOpZXJa7i', 357, 1468403671, '2016-07-12 09:54:31', '0000-00-00 00:00:00'),
(358, '4wlsaoyc8YPNvmNVqisz63uYRtKF8M7a4OCAUdMF', 358, 1468403804, '2016-07-12 09:56:44', '0000-00-00 00:00:00'),
(359, 'js01QJyUYFw2zyn4MmszUZ6ZVN8OfagrJHR6f4r6', 359, 1468404463, '2016-07-12 10:07:43', '0000-00-00 00:00:00'),
(360, 'lDD3viU9z7Nl5ws0y9XCLEXZvytfi4vyplNUscDS', 360, 1468427668, '2016-07-12 16:34:28', '0000-00-00 00:00:00'),
(361, 'QGi0B5BCerEEOsYoBPItkyLjRVTEwBIaxqnUxFlV', 361, 1468471217, '2016-07-13 04:40:17', '0000-00-00 00:00:00'),
(362, 'au4D6C7G5JXo8jrC9jj3WRGPrkibMd4gDqqJOKwq', 362, 1468605547, '2016-07-14 17:59:07', '0000-00-00 00:00:00'),
(363, 'VHSXvqPDoU4Xv2gbx7ewy1Ir8aGuBpc0MLQbvE9U', 363, 1468608422, '2016-07-14 18:47:02', '0000-00-00 00:00:00'),
(364, 'A8QpwL4qRqUVOcYKj6O9rsG8yCv3k4pQxsLjXKNs', 364, 1468608513, '2016-07-14 18:48:33', '0000-00-00 00:00:00'),
(365, 'ZChtd7lm18OJmOmKQlp8wqjm9WPE85jfTsbQAprF', 365, 1468608705, '2016-07-14 18:51:45', '0000-00-00 00:00:00'),
(366, 'vEPULUldp64NcaohuOgxucmZY8i1pECTJoynba2a', 366, 1468608936, '2016-07-14 18:55:36', '0000-00-00 00:00:00'),
(367, 'Ucrp2sUXzZTZepxWAkbv5f9uvzgLhFgU10KuejQC', 367, 1468609922, '2016-07-14 19:12:02', '0000-00-00 00:00:00'),
(368, 'OWwFlkFvdCw7jvDyUc8FNnxbClxlZbi8DgZZFcBK', 368, 1468610005, '2016-07-14 19:13:25', '0000-00-00 00:00:00'),
(369, 'RReb24HHSuUUUUOH49GWWpwOWSID4gJsDBmSpTBa', 369, 1468610202, '2016-07-14 19:16:42', '0000-00-00 00:00:00'),
(370, 'rgWZ4MX9OkNghkGqlobLze1KW5a6r3INfdZJBsiq', 370, 1468610280, '2016-07-14 19:18:00', '0000-00-00 00:00:00'),
(371, 'yrSgqT6JCJMLovBhbza8zaXowQJpJUmPV4CS6aI4', 371, 1468611180, '2016-07-14 19:33:00', '0000-00-00 00:00:00'),
(372, 'eGGFS7RhOUU86giuYJUvea12N5UzJfWgWTlOcg89', 372, 1468689444, '2016-07-15 17:17:24', '0000-00-00 00:00:00'),
(373, 'hPSRxHSov6pLRWsm9o5tXatIKMmLp4yO5TGDW7oL', 373, 1468689728, '2016-07-15 17:22:08', '0000-00-00 00:00:00'),
(374, 'mAGZ1hfFJrL347CtVQSvkGh4adNUCgogr1aJ0EQG', 374, 1468690171, '2016-07-15 17:29:31', '0000-00-00 00:00:00'),
(375, 'AWs8853i2Uo5kwqgsqMK2XzwYVb7R0iD9QtJsMRY', 375, 1468690257, '2016-07-15 17:30:57', '0000-00-00 00:00:00'),
(376, 'RbGeEsTQ1zamQfLlxfVwCHn6ZO8VQxZ9mFYDPU1b', 376, 1468776697, '2016-07-16 17:31:37', '0000-00-00 00:00:00'),
(377, 'MkN2TCsXrjNxaElj0kE5YdWGkNND751ny3lLYpIW', 377, 1468777411, '2016-07-16 17:43:31', '0000-00-00 00:00:00'),
(378, 'LGdxd0shKye6PQmiJ4YlqnwO1X4vx85ydjPuMbsi', 378, 1468777640, '2016-07-16 17:47:20', '0000-00-00 00:00:00'),
(379, 'XtAc8VfHLiDyKPS49euMdWniioOnfOzI5wCbOTaZ', 379, 1468778159, '2016-07-16 17:55:59', '0000-00-00 00:00:00'),
(380, 'Mftgw8ya0tJSW5SjF2SuHNJ7qVAg3VdjpgiMKrIy', 380, 1468780372, '2016-07-16 18:32:52', '0000-00-00 00:00:00'),
(381, 'GnRhVcxqbWiDnYl4UC5II1uQ6P43D36zEtDYehD6', 381, 1468780521, '2016-07-16 18:35:21', '0000-00-00 00:00:00'),
(382, '5MdYkHGRzEiM93ZFDgQDLNuA82w23Ic3gIy5ZMpy', 382, 1468780956, '2016-07-16 18:42:36', '0000-00-00 00:00:00'),
(383, 'f8ss3T269mi4jLcxiwermWAA0yhYyUG0NlUPFDc4', 383, 1468783622, '2016-07-16 19:27:02', '0000-00-00 00:00:00'),
(384, 'PMrwNdeJtOtE11jn7gDuNx93czHklkpqGAuvIxJl', 384, 1468784161, '2016-07-16 19:36:01', '0000-00-00 00:00:00'),
(385, 'ZR87P6S2AZwNOgvRPtHWbqeWcez4FWTaULigoa3A', 385, 1468785318, '2016-07-16 19:55:18', '0000-00-00 00:00:00'),
(386, 'b7XBZ8eHBL7xoX8UTrgdravhnw1ivgPRmAfjggvQ', 386, 1468904587, '2016-07-18 05:03:07', '0000-00-00 00:00:00'),
(387, 'IJ6TftPSoOJFkiKNQmXSUAwzQGPTTViaiGoxrxvv', 387, 1468904793, '2016-07-18 05:06:33', '0000-00-00 00:00:00'),
(388, 'rZGeOK3x6sLDM5TzxRBp9gwgXjKVv50W1ZQ0LDDa', 388, 1468944601, '2016-07-18 16:10:01', '0000-00-00 00:00:00'),
(389, 'rTOpr76H6aFWgSWh4C80Wwq9dF51Komms5yOfzzi', 389, 1468946381, '2016-07-18 16:39:41', '0000-00-00 00:00:00'),
(390, 'SxdTPGKOxfooCTuSKs0eKE10GqFZOmAJZiaogiFl', 390, 1468946451, '2016-07-18 16:40:51', '0000-00-00 00:00:00'),
(391, 'XcMEMlvblZAsI4IDSdOfsCRDoVE8PjHeTVFDJipb', 391, 1468946455, '2016-07-18 16:40:55', '0000-00-00 00:00:00'),
(392, 'BSDM22mjIGPcYL2GHS9Qx9jVMdAR5XwF7YWzYUPK', 392, 1468946469, '2016-07-18 16:41:09', '0000-00-00 00:00:00'),
(393, 'B6yRNb6QfWFdZr2q577I7ayavpIdyz3j59UxdoSb', 393, 1468946478, '2016-07-18 16:41:18', '0000-00-00 00:00:00'),
(394, 'rM4mLebgBS7185SngDACoylMYoDKWYIOyRBifdJi', 394, 1468946644, '2016-07-18 16:44:04', '0000-00-00 00:00:00'),
(395, '4mttBMk7rzm6x32ArGE7F6qCU7zrCz9wtLEkndPU', 395, 1468946667, '2016-07-18 16:44:27', '0000-00-00 00:00:00'),
(396, 'mQDDPvIPQgElSb1EDvUGZGfdHoWVsydSc0jvY6yU', 396, 1468946713, '2016-07-18 16:45:13', '0000-00-00 00:00:00'),
(397, 'Lgl2ReEpxm65tvfPAsrsVuXMJfSWey6SddBJyblG', 397, 1468946755, '2016-07-18 16:45:55', '0000-00-00 00:00:00'),
(398, 'TFgrkH0acaERdIIYoz4YLfgoS5o7FdlmbWUxUVry', 398, 1468946829, '2016-07-18 16:47:09', '0000-00-00 00:00:00'),
(399, '192FUzycibPsyUjCaDbz5hkVNFX41oNQoRjFHQ4f', 399, 1468946855, '2016-07-18 16:47:35', '0000-00-00 00:00:00'),
(400, '1rhq4PZ7M4vzby37Utdc9yJHTeNeS5G9VK7WKiyc', 400, 1468946858, '2016-07-18 16:47:38', '0000-00-00 00:00:00'),
(401, 'vcGB5Boq51Cqf3n2qmoSU756CbF6Dyk0Iri8mRBA', 401, 1468946859, '2016-07-18 16:47:40', '0000-00-00 00:00:00'),
(402, 'aNJYQbDUpjMaHZpooDyoduJ8zgwFrZQIEmyMehTt', 402, 1468946861, '2016-07-18 16:47:42', '0000-00-00 00:00:00'),
(403, 'jL2qYrdZZzWNf38A2ZQjYm8UgPfXOSeGHJxyWJTD', 403, 1468946998, '2016-07-18 16:49:58', '0000-00-00 00:00:00'),
(404, 'gvfroognQRSRfuI9KCU9hDuA0n9EY4eLA3pG2RBQ', 404, 1468947010, '2016-07-18 16:50:10', '0000-00-00 00:00:00'),
(405, 'G4GG5mf7L7Zr0BRhLIC0xTjMLTfP1Fc0oQ4HfU8E', 405, 1468947367, '2016-07-18 16:56:07', '0000-00-00 00:00:00'),
(406, '1yuGVczAgoXKyEoh2BdWHv5OuzDzm18nFBX7F8QB', 406, 1468947414, '2016-07-18 16:56:54', '0000-00-00 00:00:00'),
(407, 'Bf67XVYsSTtNKFCgqTMIAxHBZBHHLGLVq9fQBa8b', 407, 1468947429, '2016-07-18 16:57:09', '0000-00-00 00:00:00'),
(408, '4TgxN0FT96wRtnQeXHo7GLH7fXn4wmJAbaxRgysb', 408, 1468947663, '2016-07-18 17:01:03', '0000-00-00 00:00:00'),
(409, 'rfViwNuF1Zh5IC4SF0Ghq1wmVUTSkNg0pXvppwtz', 409, 1468947665, '2016-07-18 17:01:05', '0000-00-00 00:00:00'),
(410, 'x6Kg8ffYGqrIcriteHOmZpgy2hBcfeiVEkdUPwTY', 410, 1468947747, '2016-07-18 17:02:27', '0000-00-00 00:00:00'),
(411, 'meP5CIJ6KyiUsSWaa7gi0IvFtqBMAVKb6AVQaAfT', 411, 1468947796, '2016-07-18 17:03:16', '0000-00-00 00:00:00'),
(412, 'hC0fyBTfqKNtzRthA2ydmgIqzY0AGVAyc2TgqAHe', 412, 1468988735, '2016-07-19 04:25:36', '0000-00-00 00:00:00'),
(413, 'dm2v0cGscTtibSprZcTsYdc9k3WaJxq93fkGRte5', 413, 1469000950, '2016-07-19 07:49:10', '0000-00-00 00:00:00'),
(414, 'IvriHLDImBmGctHDdct2G1fJmkPNDRFDSaHw5bku', 414, 1469001080, '2016-07-19 07:51:20', '0000-00-00 00:00:00'),
(415, 'vnuoPfcsQTDJKLHURQ7g1WIWKndi3BcRlAJdqlT9', 415, 1469005264, '2016-07-19 09:01:04', '0000-00-00 00:00:00'),
(416, 'E4YhEEKwc750Ymaw30Mc5BWwpHqJxBBlHu6wRaQW', 416, 1469023023, '2016-07-19 13:57:03', '0000-00-00 00:00:00'),
(417, 'ENe3tKUMPz2oxbZfuDQWS1GIDFXG2lpSx0cimQG1', 417, 1469025555, '2016-07-19 14:39:15', '0000-00-00 00:00:00'),
(418, 'E7NMBRSGqk1of3GjFZjnm17tPWiFL9QaYJM7RabR', 418, 1469026798, '2016-07-19 14:59:58', '0000-00-00 00:00:00'),
(419, 'esjI4hMAhzTIF8Ag2U6Gm1pHKN3EumDrLMJQis19', 419, 1469026900, '2016-07-19 15:01:40', '0000-00-00 00:00:00'),
(420, 'uW2XGxf8rLS3Awbz0LLd2pLxfCSePNkKbfwYEPUJ', 420, 1469026928, '2016-07-19 15:02:08', '0000-00-00 00:00:00'),
(421, 'YWCXW90l7mcrfdIbWrp7wHfoCzdbzKeEcDT93LK2', 421, 1469027036, '2016-07-19 15:03:56', '0000-00-00 00:00:00'),
(422, 'H1GhtTB8Y73zkBB6ipyijquiFgsd6W57lpC5xqmy', 422, 1469074981, '2016-07-20 04:23:01', '0000-00-00 00:00:00'),
(423, 'QozfLHJj1d2E0al8zBwZbkdxD5e4zt8pMfg5ykgS', 423, 1469075418, '2016-07-20 04:30:18', '0000-00-00 00:00:00'),
(424, 'hqoVImBwplk4m8aIsXzHJzWdfidH8PWafNw29izc', 424, 1469075939, '2016-07-20 04:38:59', '0000-00-00 00:00:00'),
(425, 'sXzxEAVq1822sQlJra1KfEIrV6CUOUELbRiUnbcM', 425, 1469076048, '2016-07-20 04:40:48', '0000-00-00 00:00:00'),
(426, 'GiYefXFE2fcVGZlSC91zPDLwegfs4w0e1lqAi8cV', 426, 1469076510, '2016-07-20 04:48:30', '0000-00-00 00:00:00'),
(427, 'WSbnGcm3TEVqic6v80XuFrWIAVr0UlLPwe9lFZaP', 427, 1469076681, '2016-07-20 04:51:21', '0000-00-00 00:00:00'),
(428, '4tc231qeXnfcGWpZzw8Dl9PLanIxii8VBLfk0KdS', 428, 1469078322, '2016-07-20 05:18:42', '0000-00-00 00:00:00'),
(429, 'DFRkGhzUOEVuVCSi9FswbmWq87UThchqpWPBR7U7', 429, 1469079877, '2016-07-20 05:44:37', '0000-00-00 00:00:00'),
(430, 'wV8hHq22CD1M22f32JrPv7uD0lQThpG8RjUosqtD', 430, 1469080263, '2016-07-20 05:51:03', '0000-00-00 00:00:00'),
(431, 'grlRMgRPQeATFEEiAU1oorUodCRUHHw8CLD9dmg9', 431, 1469081062, '2016-07-20 06:04:22', '0000-00-00 00:00:00'),
(432, 'HSVlt4JLWewCIzXzSbZ70Sdaje6Zjhyp4bWE5tzI', 432, 1469083448, '2016-07-20 06:44:08', '0000-00-00 00:00:00'),
(433, 'd4fNZJXEi1uR5oz2sH2J5JPixb6FKwoaPBZKE8mC', 433, 1469084253, '2016-07-20 06:57:33', '0000-00-00 00:00:00'),
(434, 'oqeInp4iWhADdMgE3ZZPoguyiDsbcM6tTMllJPwI', 434, 1469086150, '2016-07-20 07:29:10', '0000-00-00 00:00:00'),
(435, 'nwYGVMUnuK6VLP0dCajpUfGy8wYqmwPbi05rI4mJ', 435, 1469086507, '2016-07-20 07:35:07', '0000-00-00 00:00:00'),
(436, 'QbRyllntEOaODa5jKhe5xYY8y3GbTzB2LtuoRYuG', 436, 1469102042, '2016-07-20 11:54:02', '0000-00-00 00:00:00'),
(437, 'R3b0oyjmRPgjCeKoznYkb6NJmrwiGyWs3lrhUg0C', 437, 1469102070, '2016-07-20 11:54:30', '0000-00-00 00:00:00'),
(438, 'aCJyCGgrzIbC94BA0mWZGK0AT2m9cvNXEHqkNO5c', 438, 1469112235, '2016-07-20 14:43:55', '0000-00-00 00:00:00'),
(439, 'NB6WvjibdLGg0BcfFU7iHIbU7ewlCvumIG6DEet8', 439, 1469115602, '2016-07-20 15:40:02', '0000-00-00 00:00:00'),
(440, 'n5d5pSr84XFYeaogCJfjRs0KyzkqOk3f9x9tbm6b', 440, 1469115688, '2016-07-20 15:41:28', '0000-00-00 00:00:00'),
(441, 'QcCdd5TWMqnWGDweP9iL37yoR3Ev8QFEo4Mi3Je0', 441, 1469115803, '2016-07-20 15:43:23', '0000-00-00 00:00:00'),
(442, 'Ka45jKjsDLf0Iu2X9JxH6Gii7xupjykxhBCQVhN4', 442, 1469120868, '2016-07-20 17:07:48', '0000-00-00 00:00:00'),
(443, 'f6koPtHlucM0W0ZuorpO54HO5Hv2qAksYjJTCZl0', 443, 1469120915, '2016-07-20 17:08:35', '0000-00-00 00:00:00'),
(444, 'mj7WSkU529otlPD72NArnoIeDPxnFVtMaO7txIg2', 444, 1469120946, '2016-07-20 17:09:06', '0000-00-00 00:00:00'),
(445, 'fmyL1WAHES23il3wSqpiMAZ2Ew49PHIoh6AoEdoj', 445, 1469181347, '2016-07-21 09:55:47', '0000-00-00 00:00:00'),
(446, 'UYq8yoFIWSN6fWXZUU2Am3T26qKViQ9IiSTIFte8', 446, 1469187443, '2016-07-21 11:37:23', '0000-00-00 00:00:00'),
(447, 'F5DDVH1f8zwMEGtOan6K51jCjafmYaow8HV88pqG', 447, 1469187559, '2016-07-21 11:39:19', '0000-00-00 00:00:00');
INSERT INTO `oauth_access_tokens` (`id`, `access_token`, `session_id`, `expire_time`, `created_at`, `updated_at`) VALUES
(448, 'Btg5fTh8dMlRWbp9lcNVIbgjztbk8BT9c1xT6lZK', 448, 1469189262, '2016-07-21 12:07:42', '0000-00-00 00:00:00'),
(449, 'XqQ8G32DKOttH3cuF0XyaEq4wUL361FYwkLjJwig', 449, 1469266010, '2016-07-22 09:26:50', '0000-00-00 00:00:00'),
(450, 'qA5eMcHwVYkkdUAeuawufACgHyALb2Cch3pMCHMh', 450, 1469266340, '2016-07-22 09:32:20', '0000-00-00 00:00:00'),
(451, 'c7noAFOQIM62CJUQ6vcOzywbD0l0zjiuOwICIwHA', 451, 1469267095, '2016-07-22 09:44:55', '0000-00-00 00:00:00'),
(452, '9TJw0JHxZYAwa3Pk7BBD7BYNBE5zBN0wIBRpM8m9', 452, 1469267106, '2016-07-22 09:45:06', '0000-00-00 00:00:00'),
(453, 'ww6FGfhuldbECwtCG2XerWD35ba09EtsaYnp1y29', 453, 1469267447, '2016-07-22 09:50:47', '0000-00-00 00:00:00'),
(454, 'WcqABeW6QIkaEu1bHcsUJXqUCM9oCLvItBRO9psU', 454, 1469267528, '2016-07-22 09:52:08', '0000-00-00 00:00:00'),
(455, 'Fep257VlsS0lBaUeQaGYDJEI81Ox00jlQ69kHVwJ', 455, 1469339368, '2016-07-23 05:49:29', '0000-00-00 00:00:00'),
(456, '1Trdo50TdFYw8G78ZNcOF5an5vo3gzO02CG0Ln02', 456, 1469339406, '2016-07-23 05:50:06', '0000-00-00 00:00:00'),
(457, 'LWXsjObz0WfBLWAYpUBiWGWcTJ2zLIIrSElboaMK', 457, 1469341845, '2016-07-23 06:30:45', '0000-00-00 00:00:00'),
(458, '4E3Kud9F5O084aRDFKdVHn5TBtn1a4HgRRtiCSM1', 458, 1469341900, '2016-07-23 06:31:40', '0000-00-00 00:00:00'),
(459, 'eULynpXsB8wOqLStFuRbuw8o8itdzMKcmoBn6euC', 459, 1469342415, '2016-07-23 06:40:15', '0000-00-00 00:00:00'),
(460, 'wkR7V35q4upVfd0sYOt4RRgnGA8d3CrwUHrSDXnH', 460, 1469342629, '2016-07-23 06:43:49', '0000-00-00 00:00:00'),
(461, 'KsGYvShPaTjw3DyfkuakUlUmjVQuA2rtzT6k3a6G', 461, 1469343210, '2016-07-23 06:53:30', '0000-00-00 00:00:00'),
(462, 'pCrVpQdeQ867y4gAZ9ZGsQbEGrVJVmBwsujE6ie2', 462, 1469354316, '2016-07-23 09:58:36', '0000-00-00 00:00:00'),
(463, '6l9aTEOI0wuW3QRNroV1rlS4eqX122IZJVgh7XEf', 463, 1469363104, '2016-07-23 12:25:04', '0000-00-00 00:00:00'),
(464, 'yTkDrvZyZm1J6NF90QTkts7aZQ8jjCLyZ1E6QwYY', 464, 1469363119, '2016-07-23 12:25:19', '0000-00-00 00:00:00'),
(465, 'CdVdXDfG6R6TkmhXxoI1Z0rP2PpDJGSYjJWosxDV', 465, 1469363203, '2016-07-23 12:26:43', '0000-00-00 00:00:00'),
(466, 'a3gZ3Lj9iDKzTJmACxpI73MKIDJiAumbmbqs9BKt', 466, 1469426983, '2016-07-24 06:09:44', '0000-00-00 00:00:00'),
(467, '0KL4vH9zP6z2y8hUgeaMVzyueZQ5QhCXuRcMS7UI', 467, 1469430204, '2016-07-24 07:03:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_token_scopes`
--

CREATE TABLE IF NOT EXISTS `oauth_access_token_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `access_token_id` int(11) NOT NULL,
  `scope_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `oauth_access_token_scopes_access_token_id_index` (`access_token_id`),
  KEY `oauth_access_token_scopes_scope_id_index` (`scope_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(10) unsigned NOT NULL,
  `redirect_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expire_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_session_id_index` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_code_scopes`
--

CREATE TABLE IF NOT EXISTS `oauth_auth_code_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `auth_code_id` int(11) NOT NULL,
  `scope_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_code_scopes_auth_code_id_index` (`auth_code_id`),
  KEY `oauth_auth_code_scopes_scope_id_index` (`scope_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `secret` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_clients_id_secret_unique` (`id`,`secret`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `secret`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '21f4dabaf109153bc9b4', 'Admin ', '2016-04-16 17:55:06', '0000-00-00 00:00:00'),
(2, 3, 'f6f22039827db3bed0e3', 'basha basha', '2016-04-20 17:03:41', '0000-00-00 00:00:00'),
(3, 26, '0b37c105a72c4f999879', 'malli1 t', '2016-05-13 04:00:11', '0000-00-00 00:00:00'),
(4, 39, '176888854c2680a4d109', 'malli t', '2016-05-27 11:04:42', '0000-00-00 00:00:00'),
(5, 36, 'bc2eb91e346f21f48cf7', 'Arif Adoni', '2016-05-30 14:29:39', '0000-00-00 00:00:00'),
(6, 42, '43e97404260b9a5820b6', 'Ganga Raju', '2016-06-01 18:29:09', '0000-00-00 00:00:00'),
(7, 43, '2e86a946e19a187a1f8b', 'Ganga Raju', '2016-06-01 19:49:53', '0000-00-00 00:00:00'),
(8, 44, 'ee45414b0b87284000c9', 'Ganga Raju', '2016-06-01 19:53:31', '0000-00-00 00:00:00'),
(9, 46, '00d223e8adaaf978a30d', 'mallikarjun t', '2016-06-08 09:12:42', '0000-00-00 00:00:00'),
(10, 53, 'c279e1b9b3d636b7f713', 'Nexus Lg', '2016-06-13 06:28:57', '0000-00-00 00:00:00'),
(11, 54, '91c0985d7c79d59fdb7b', 'Test 999', '2016-06-13 07:18:44', '0000-00-00 00:00:00'),
(12, 22, '5bf49f24e29dd6e12768', 'abdullah ', '2016-06-14 05:29:22', '0000-00-00 00:00:00'),
(13, 57, '73fcbc58970fa7da7fe1', 'testindo Indonesia', '2016-06-25 17:58:08', '0000-00-00 00:00:00'),
(14, 58, '9a32f3da661a175ab94e', 'Bbb Hhhh', '2016-07-06 18:43:44', '0000-00-00 00:00:00'),
(15, 61, 'a33b6f3a2bb9fc10254e', 'malli3 malli', '2016-07-12 09:47:28', '0000-00-00 00:00:00'),
(16, 63, 'be35fb3a0416fbee3f4d', 'malli6 malli', '2016-07-18 05:03:07', '0000-00-00 00:00:00'),
(17, 64, '3b11d9e89fa4ac6e94ff', 'malli9 malli', '2016-07-18 05:06:33', '0000-00-00 00:00:00'),
(18, 65, '7f27ac07f802935c5d4c', 'malli5 malli5', '2016-07-18 16:10:00', '0000-00-00 00:00:00'),
(19, 66, 'c51449e67424502f97fe', 'saleg Dabil', '2016-07-19 15:01:40', '0000-00-00 00:00:00'),
(20, 68, '30b7b550b093d88209e9', 'malli9 malli11', '2016-07-20 04:30:18', '0000-00-00 00:00:00'),
(21, 69, 'eaa247216fed94035e38', 'malli12 malli12', '2016-07-20 04:40:48', '0000-00-00 00:00:00'),
(22, 70, 'fa58b35f36abdb40a131', 'malli13 malli13', '2016-07-20 04:48:30', '0000-00-00 00:00:00'),
(23, 71, '7f346c45457f9f362ffc', 'malli14 malli14', '2016-07-20 04:51:21', '0000-00-00 00:00:00'),
(24, 72, '357b0ead7024aa195680', 'malli15 malli15', '2016-07-20 05:18:42', '0000-00-00 00:00:00'),
(25, 73, '1ec21c018afd2b4bb72a', 'malli16 malli16', '2016-07-20 05:44:37', '0000-00-00 00:00:00'),
(26, 74, 'f0c20c07f1c9fd94a989', 'malli17 malli17', '2016-07-20 05:51:03', '0000-00-00 00:00:00'),
(27, 75, '6fcaac91c1e057203bf4', 'malli18 malli18', '2016-07-20 06:04:22', '0000-00-00 00:00:00'),
(28, 76, '6c708f5c97cfdf42c882', 'Malli99 Malli99', '2016-07-20 06:44:08', '0000-00-00 00:00:00'),
(29, 77, 'eec0176c8060ea56e704', 'malli19 malli19', '2016-07-20 07:29:10', '0000-00-00 00:00:00'),
(30, 78, '6cd29b5f109716dc2a01', 'malli20 malli20', '2016-07-20 07:35:07', '0000-00-00 00:00:00'),
(31, 86, '8c4dfe8d495c6e3eae14', 'malli21 malli21', '2016-07-20 11:54:01', '0000-00-00 00:00:00'),
(32, 87, '28cc101dcb40212cc397', 'Malli66 Malli66', '2016-07-21 11:37:23', '0000-00-00 00:00:00'),
(33, 88, '149c0a899565df009b6c', 'Malli33 Malli33', '2016-07-21 11:39:19', '0000-00-00 00:00:00'),
(34, 89, '1c99e5468562eaa89b93', 'Malli44 Malli44', '2016-07-21 12:07:41', '0000-00-00 00:00:00'),
(35, 92, '7cdcae4cbf8e1a391c87', 'malli101 malli101', '2016-07-22 09:26:49', '0000-00-00 00:00:00'),
(36, 93, '006ffc1ccf108fc5efc6', 'malli102 malli102', '2016-07-22 09:32:20', '0000-00-00 00:00:00'),
(37, 95, '25c64e12276ddba44cd8', 'malli104 malli104', '2016-07-22 09:44:55', '0000-00-00 00:00:00'),
(38, 94, '45de4faf24e98c30ffd0', 'malli103 malli103', '2016-07-22 09:45:06', '0000-00-00 00:00:00'),
(39, 96, 'c1d42bc71b1002aec2f4', 'malli105 malli105', '2016-07-22 09:50:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_client_endpoints`
--

CREATE TABLE IF NOT EXISTS `oauth_client_endpoints` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `redirect_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_client_endpoints_client_id_redirect_uri_unique` (`client_id`,`redirect_uri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_client_grants`
--

CREATE TABLE IF NOT EXISTS `oauth_client_grants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `grant_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `oauth_client_grants_client_id_index` (`client_id`),
  KEY `oauth_client_grants_grant_id_index` (`grant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_client_scopes`
--

CREATE TABLE IF NOT EXISTS `oauth_client_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `scope_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `oauth_client_scopes_client_id_index` (`client_id`),
  KEY `oauth_client_scopes_scope_id_index` (`scope_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_grants`
--

CREATE TABLE IF NOT EXISTS `oauth_grants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_grant_scopes`
--

CREATE TABLE IF NOT EXISTS `oauth_grant_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grant_id` int(11) NOT NULL,
  `scope_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `oauth_grant_scopes_grant_id_index` (`grant_id`),
  KEY `oauth_grant_scopes_scope_id_index` (`scope_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_token_id` int(11) NOT NULL,
  `expire_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_refresh_tokens_id_unique` (`id`),
  KEY `access_token_id` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_scopes`
--

CREATE TABLE IF NOT EXISTS `oauth_scopes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_sessions`
--

CREATE TABLE IF NOT EXISTS `oauth_sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `owner_type` enum('client','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `owner_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_redirect_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_browser` text COLLATE utf8_unicode_ci,
  `client_remote_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_sessions_client_id_owner_type_owner_id_index` (`client_id`,`owner_type`,`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=468 ;

--
-- Dumping data for table `oauth_sessions`
--

INSERT INTO `oauth_sessions` (`id`, `client_id`, `owner_type`, `owner_id`, `client_redirect_uri`, `client_browser`, `client_remote_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'client', '1', NULL, 'Mozilla/5.0 (Windows NT 6.1; rv:45.0) Gecko/20100101 Firefox/45.0', '127.0.0.1', '2016-04-16 17:55:07', '0000-00-00 00:00:00'),
(2, 1, 'client', '1', NULL, 'Mozilla/5.0 (Windows NT 6.1; rv:45.0) Gecko/20100101 Firefox/45.0', '127.0.0.1', '2016-04-16 17:58:50', '0000-00-00 00:00:00'),
(3, 1, 'client', '1', NULL, 'Mozilla/5.0 (Windows NT 6.1; rv:45.0) Gecko/20100101 Firefox/45.0', '127.0.0.1', '2016-04-17 04:53:02', '0000-00-00 00:00:00'),
(4, 1, 'client', '1', NULL, 'Mozilla/5.0 (Windows NT 6.1; rv:45.0) Gecko/20100101 Firefox/45.0', '127.0.0.1', '2016-04-17 04:53:38', '0000-00-00 00:00:00'),
(5, 1, 'client', '1', NULL, 'Mozilla/5.0 (Windows NT 6.1; rv:45.0) Gecko/20100101 Firefox/45.0', '127.0.0.1', '2016-04-17 04:53:57', '0000-00-00 00:00:00'),
(6, 2, 'client', '2', NULL, 'Mozilla/5.0 (Windows NT 6.1; rv:45.0) Gecko/20100101 Firefox/45.0', '103.232.131.7', '2016-04-20 17:03:41', '0000-00-00 00:00:00'),
(7, 1, 'client', '1', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36', '183.82.219.1', '2016-04-21 16:53:22', '0000-00-00 00:00:00'),
(8, 1, 'client', '1', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36', '183.82.219.1', '2016-04-21 17:18:29', '0000-00-00 00:00:00'),
(9, 1, 'client', '1', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36', '183.82.219.1', '2016-04-21 17:21:37', '0000-00-00 00:00:00'),
(10, 1, 'client', '1', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36', '183.82.219.1', '2016-04-21 17:21:59', '0000-00-00 00:00:00'),
(11, 1, 'client', '1', NULL, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36', '183.83.160.166', '2016-04-21 17:22:30', '0000-00-00 00:00:00'),
(12, 1, 'client', '1', NULL, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36', '202.78.251.130', '2016-05-09 10:52:46', '0000-00-00 00:00:00'),
(13, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-09 11:59:08', '0000-00-00 00:00:00'),
(14, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-09 12:09:02', '0000-00-00 00:00:00'),
(15, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-09 12:11:17', '0000-00-00 00:00:00'),
(16, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-09 12:24:02', '0000-00-00 00:00:00'),
(17, 1, 'client', '1', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36', '183.82.219.1', '2016-05-11 16:24:36', '0000-00-00 00:00:00'),
(18, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30H)', '202.78.251.151', '2016-05-12 05:13:46', '0000-00-00 00:00:00'),
(19, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30H)', '202.78.251.151', '2016-05-12 05:19:37', '0000-00-00 00:00:00'),
(20, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30H)', '202.78.251.151', '2016-05-12 05:24:39', '0000-00-00 00:00:00'),
(21, 1, 'client', '1', NULL, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36', '202.78.251.130', '2016-05-12 05:30:04', '0000-00-00 00:00:00'),
(22, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30H)', '202.78.251.151', '2016-05-12 06:00:14', '0000-00-00 00:00:00'),
(23, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30H)', '202.78.251.151', '2016-05-12 07:08:05', '0000-00-00 00:00:00'),
(24, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 12:18:01', '0000-00-00 00:00:00'),
(25, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 12:22:17', '0000-00-00 00:00:00'),
(26, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 12:37:22', '0000-00-00 00:00:00'),
(27, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 12:38:44', '0000-00-00 00:00:00'),
(28, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 12:40:26', '0000-00-00 00:00:00'),
(29, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 12:42:36', '0000-00-00 00:00:00'),
(30, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 12:45:56', '0000-00-00 00:00:00'),
(31, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 12:48:25', '0000-00-00 00:00:00'),
(32, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 12:50:05', '0000-00-00 00:00:00'),
(33, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 12:51:37', '0000-00-00 00:00:00'),
(34, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 12:54:38', '0000-00-00 00:00:00'),
(35, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 12:56:20', '0000-00-00 00:00:00'),
(36, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 12:59:03', '0000-00-00 00:00:00'),
(37, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 13:00:44', '0000-00-00 00:00:00'),
(38, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 13:01:53', '0000-00-00 00:00:00'),
(39, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 13:03:33', '0000-00-00 00:00:00'),
(40, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 13:04:29', '0000-00-00 00:00:00'),
(41, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 13:05:52', '0000-00-00 00:00:00'),
(42, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 13:08:26', '0000-00-00 00:00:00'),
(43, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 13:11:52', '0000-00-00 00:00:00'),
(44, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 13:13:20', '0000-00-00 00:00:00'),
(45, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 13:15:10', '0000-00-00 00:00:00'),
(46, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 13:18:10', '0000-00-00 00:00:00'),
(47, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-12 13:20:42', '0000-00-00 00:00:00'),
(48, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-13 03:50:34', '0000-00-00 00:00:00'),
(49, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-13 03:52:11', '0000-00-00 00:00:00'),
(50, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-13 03:55:42', '0000-00-00 00:00:00'),
(51, 1, 'client', '1', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-13 03:58:12', '0000-00-00 00:00:00'),
(52, 3, 'client', '3', NULL, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36', '202.78.251.130', '2016-05-13 04:00:11', '0000-00-00 00:00:00'),
(53, 3, 'client', '3', NULL, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36', '202.78.251.130', '2016-05-13 04:02:37', '0000-00-00 00:00:00'),
(54, 3, 'client', '3', NULL, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36', '202.78.251.130', '2016-05-13 04:16:11', '0000-00-00 00:00:00'),
(55, 3, 'client', '3', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30H)', '202.78.251.151', '2016-05-13 04:44:46', '0000-00-00 00:00:00'),
(56, 3, 'client', '3', NULL, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36', '202.78.251.130', '2016-05-13 04:47:32', '0000-00-00 00:00:00'),
(57, 3, 'client', '3', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30H)', '202.78.251.151', '2016-05-13 05:23:34', '0000-00-00 00:00:00'),
(58, 3, 'client', '3', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30H)', '202.78.251.151', '2016-05-13 05:35:09', '0000-00-00 00:00:00'),
(59, 3, 'client', '3', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-05-13 06:21:07', '0000-00-00 00:00:00'),
(60, 3, 'client', '3', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-13 08:49:54', '0000-00-00 00:00:00'),
(61, 3, 'client', '3', NULL, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36', '202.78.251.130', '2016-05-13 09:00:45', '0000-00-00 00:00:00'),
(62, 3, 'client', '3', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-13 09:05:08', '0000-00-00 00:00:00'),
(63, 1, 'client', '1', NULL, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '122.170.251.217', '2016-05-14 11:23:02', '0000-00-00 00:00:00'),
(64, 1, 'client', '1', NULL, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '122.170.251.217', '2016-05-14 14:08:59', '0000-00-00 00:00:00'),
(65, 1, 'client', '1', NULL, 'LawyersInfo/1 CFNetwork/758.2.8 Darwin/14.5.0', '122.170.251.217', '2016-05-14 14:41:51', '0000-00-00 00:00:00'),
(66, 1, 'client', '1', NULL, 'LawyersInfo/1 CFNetwork/758.2.8 Darwin/14.5.0', '122.170.251.217', '2016-05-14 14:41:53', '0000-00-00 00:00:00'),
(67, 1, 'client', '1', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.251.217', '2016-05-14 14:52:29', '0000-00-00 00:00:00'),
(68, 1, 'client', '1', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.251.217', '2016-05-14 14:54:56', '0000-00-00 00:00:00'),
(69, 1, 'client', '1', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.251.217', '2016-05-14 14:55:22', '0000-00-00 00:00:00'),
(70, 1, 'client', '1', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.251.217', '2016-05-14 15:02:48', '0000-00-00 00:00:00'),
(71, 1, 'client', '1', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.251.217', '2016-05-14 15:03:07', '0000-00-00 00:00:00'),
(72, 1, 'client', '1', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.251.217', '2016-05-14 15:08:59', '0000-00-00 00:00:00'),
(73, 1, 'client', '1', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.251.217', '2016-05-14 15:23:34', '0000-00-00 00:00:00'),
(74, 1, 'client', '1', NULL, 'LawyersInfo/1 CFNetwork/758.2.8 Darwin/14.5.0', '110.224.231.160', '2016-05-16 04:51:54', '0000-00-00 00:00:00'),
(75, 1, 'client', '1', NULL, 'LawyersInfo/1 CFNetwork/758.2.8 Darwin/14.5.0', '110.224.231.160', '2016-05-16 05:01:38', '0000-00-00 00:00:00'),
(76, 1, 'client', '1', NULL, 'LawyersInfo/1 CFNetwork/758.2.8 Darwin/14.5.0', '110.224.231.160', '2016-05-16 05:05:14', '0000-00-00 00:00:00'),
(77, 3, 'client', '3', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-05-16 07:20:55', '0000-00-00 00:00:00'),
(78, 1, 'client', '1', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.9.234', '2016-05-16 16:51:44', '0000-00-00 00:00:00'),
(79, 1, 'client', '1', NULL, 'LawyersInfo/1 CFNetwork/758.2.8 Darwin/14.5.0', '110.224.227.98', '2016-05-17 03:52:43', '0000-00-00 00:00:00'),
(80, 1, 'client', '1', NULL, 'LawyersInfo/1 CFNetwork/758.2.8 Darwin/14.5.0', '110.224.227.98', '2016-05-17 03:52:43', '0000-00-00 00:00:00'),
(81, 1, 'client', '1', NULL, 'LawyersInfo/1 CFNetwork/758.2.8 Darwin/14.5.0', '110.224.227.98', '2016-05-17 03:53:02', '0000-00-00 00:00:00'),
(82, 1, 'client', '1', NULL, 'LawyersInfo/1 CFNetwork/758.2.8 Darwin/14.5.0', '110.224.233.238', '2016-05-17 04:54:09', '0000-00-00 00:00:00'),
(83, 1, 'client', '1', NULL, 'LawyersInfo/1 CFNetwork/758.2.8 Darwin/14.5.0', '110.224.233.238', '2016-05-17 05:35:24', '0000-00-00 00:00:00'),
(84, 1, 'client', '1', NULL, 'LawyersInfo/1 CFNetwork/758.2.8 Darwin/14.5.0', '110.224.233.238', '2016-05-17 05:35:36', '0000-00-00 00:00:00'),
(85, 4, 'client', '4', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '202.78.251.130', '2016-05-27 11:04:42', '0000-00-00 00:00:00'),
(86, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-05-27 11:05:02', '0000-00-00 00:00:00'),
(87, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30H)', '183.82.113.201', '2016-05-30 13:49:04', '0000-00-00 00:00:00'),
(88, 5, 'client', '5', NULL, 'Dalvik/2.1.0 (Linux; U; Android 5.1.1; C6902 Build/14.6.A.1.236)', '183.82.113.201', '2016-05-30 14:29:39', '0000-00-00 00:00:00'),
(89, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30H)', '183.82.113.201', '2016-05-30 14:54:57', '0000-00-00 00:00:00'),
(90, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30H)', '202.78.251.151', '2016-05-31 04:42:22', '0000-00-00 00:00:00'),
(91, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 18:29:09', '0000-00-00 00:00:00'),
(92, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 18:30:54', '0000-00-00 00:00:00'),
(93, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 18:49:33', '0000-00-00 00:00:00'),
(94, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 18:49:39', '0000-00-00 00:00:00'),
(95, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:07:44', '0000-00-00 00:00:00'),
(96, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:11:53', '0000-00-00 00:00:00'),
(97, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:14:33', '0000-00-00 00:00:00'),
(98, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:22:38', '0000-00-00 00:00:00'),
(99, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:24:27', '0000-00-00 00:00:00'),
(100, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:28:30', '0000-00-00 00:00:00'),
(101, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:32:23', '0000-00-00 00:00:00'),
(102, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:35:05', '0000-00-00 00:00:00'),
(103, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:37:01', '0000-00-00 00:00:00'),
(104, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:39:27', '0000-00-00 00:00:00'),
(105, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:43:19', '0000-00-00 00:00:00'),
(106, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:45:48', '0000-00-00 00:00:00'),
(107, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:47:07', '0000-00-00 00:00:00'),
(108, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:49:11', '0000-00-00 00:00:00'),
(109, 7, 'client', '7', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:49:53', '0000-00-00 00:00:00'),
(110, 7, 'client', '7', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:53:10', '0000-00-00 00:00:00'),
(111, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 19:53:31', '0000-00-00 00:00:00'),
(112, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 20:00:02', '0000-00-00 00:00:00'),
(113, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 20:01:51', '0000-00-00 00:00:00'),
(114, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 20:23:35', '0000-00-00 00:00:00'),
(115, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 20:24:35', '0000-00-00 00:00:00'),
(116, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 20:27:40', '0000-00-00 00:00:00'),
(117, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 20:32:59', '0000-00-00 00:00:00'),
(118, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 20:35:53', '0000-00-00 00:00:00'),
(119, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-01 20:37:06', '0000-00-00 00:00:00'),
(120, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 17:30:17', '0000-00-00 00:00:00'),
(121, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 17:47:48', '0000-00-00 00:00:00'),
(122, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 17:49:10', '0000-00-00 00:00:00'),
(123, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 17:54:20', '0000-00-00 00:00:00'),
(124, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 17:59:17', '0000-00-00 00:00:00'),
(125, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 18:20:15', '0000-00-00 00:00:00'),
(126, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 18:22:13', '0000-00-00 00:00:00'),
(127, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 18:23:37', '0000-00-00 00:00:00'),
(128, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 18:24:02', '0000-00-00 00:00:00'),
(129, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 18:28:05', '0000-00-00 00:00:00'),
(130, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 18:34:41', '0000-00-00 00:00:00'),
(131, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 18:46:50', '0000-00-00 00:00:00'),
(132, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 18:55:44', '0000-00-00 00:00:00'),
(133, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 19:11:58', '0000-00-00 00:00:00'),
(134, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 19:13:07', '0000-00-00 00:00:00'),
(135, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 19:13:51', '0000-00-00 00:00:00'),
(136, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.254.53', '2016-06-02 19:14:54', '0000-00-00 00:00:00'),
(137, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-04 05:01:22', '0000-00-00 00:00:00'),
(138, 6, 'client', '6', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.80.193', '2016-06-05 02:35:44', '0000-00-00 00:00:00'),
(139, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.80.193', '2016-06-05 02:43:42', '0000-00-00 00:00:00'),
(140, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.80.193', '2016-06-05 02:44:42', '0000-00-00 00:00:00'),
(141, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.80.193', '2016-06-05 02:52:28', '0000-00-00 00:00:00'),
(142, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.80.193', '2016-06-05 03:25:02', '0000-00-00 00:00:00'),
(143, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.80.193', '2016-06-05 03:39:30', '0000-00-00 00:00:00'),
(144, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.80.193', '2016-06-05 03:43:43', '0000-00-00 00:00:00'),
(145, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.80.193', '2016-06-05 04:04:51', '0000-00-00 00:00:00'),
(146, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.80.193', '2016-06-05 04:12:16', '0000-00-00 00:00:00'),
(147, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.80.193', '2016-06-05 04:30:14', '0000-00-00 00:00:00'),
(148, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.80.193', '2016-06-05 04:38:12', '0000-00-00 00:00:00'),
(149, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.80.193', '2016-06-05 04:42:59', '0000-00-00 00:00:00'),
(150, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.80.193', '2016-06-05 04:53:33', '0000-00-00 00:00:00'),
(151, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '106.220.227.26', '2016-06-05 07:31:30', '0000-00-00 00:00:00'),
(152, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.234.197', '2016-06-05 14:40:44', '0000-00-00 00:00:00'),
(153, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.234.197', '2016-06-05 14:44:29', '0000-00-00 00:00:00'),
(154, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.234.197', '2016-06-05 15:35:09', '0000-00-00 00:00:00'),
(155, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.234.197', '2016-06-05 15:37:14', '0000-00-00 00:00:00'),
(156, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.234.197', '2016-06-05 15:47:51', '0000-00-00 00:00:00'),
(157, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.170.234.197', '2016-06-05 15:53:58', '0000-00-00 00:00:00'),
(158, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-07 05:58:45', '0000-00-00 00:00:00'),
(159, 9, 'client', '9', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '202.78.251.130', '2016-06-08 09:12:42', '0000-00-00 00:00:00'),
(160, 9, 'client', '9', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '202.78.251.130', '2016-06-08 10:09:31', '0000-00-00 00:00:00'),
(161, 3, 'client', '3', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-08 10:23:22', '0000-00-00 00:00:00'),
(162, 3, 'client', '3', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-09 06:33:30', '0000-00-00 00:00:00'),
(163, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-09 06:35:02', '0000-00-00 00:00:00'),
(164, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-09 06:38:17', '0000-00-00 00:00:00'),
(165, 3, 'client', '3', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-09 06:45:56', '0000-00-00 00:00:00'),
(166, 3, 'client', '3', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '202.78.251.130', '2016-06-10 05:39:56', '0000-00-00 00:00:00'),
(167, 9, 'client', '9', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '202.78.251.130', '2016-06-10 05:42:44', '0000-00-00 00:00:00'),
(168, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.59.202', '2016-06-10 13:53:37', '0000-00-00 00:00:00'),
(169, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.59.202', '2016-06-10 14:25:04', '0000-00-00 00:00:00'),
(170, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.59.202', '2016-06-10 14:37:37', '0000-00-00 00:00:00'),
(171, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.59.202', '2016-06-10 15:14:31', '0000-00-00 00:00:00'),
(172, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.59.202', '2016-06-10 15:15:26', '0000-00-00 00:00:00'),
(173, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.59.202', '2016-06-10 15:28:45', '0000-00-00 00:00:00'),
(174, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.59.202', '2016-06-10 15:34:21', '0000-00-00 00:00:00'),
(175, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.59.202', '2016-06-10 15:35:52', '0000-00-00 00:00:00'),
(176, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.59.202', '2016-06-10 15:38:05', '0000-00-00 00:00:00'),
(177, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.59.202', '2016-06-10 15:40:54', '0000-00-00 00:00:00'),
(178, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '122.175.59.202', '2016-06-10 15:42:17', '0000-00-00 00:00:00'),
(179, 3, 'client', '3', NULL, 'Dalvik/2.1.0 (Linux; U; Android 5.1.1; Android SDK built for x86 Build/LMY48X)', '202.78.251.130', '2016-06-11 06:27:44', '0000-00-00 00:00:00'),
(180, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 07:38:46', '0000-00-00 00:00:00'),
(181, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 07:59:29', '0000-00-00 00:00:00'),
(182, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 08:00:58', '0000-00-00 00:00:00'),
(183, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 08:04:23', '0000-00-00 00:00:00'),
(184, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 08:12:47', '0000-00-00 00:00:00'),
(185, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 08:14:58', '0000-00-00 00:00:00'),
(186, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 10:52:53', '0000-00-00 00:00:00'),
(187, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 10:58:52', '0000-00-00 00:00:00'),
(188, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 11:07:07', '0000-00-00 00:00:00'),
(189, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 11:09:13', '0000-00-00 00:00:00'),
(190, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 11:14:35', '0000-00-00 00:00:00'),
(191, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 11:22:36', '0000-00-00 00:00:00'),
(192, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 11:23:40', '0000-00-00 00:00:00'),
(193, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 11:38:44', '0000-00-00 00:00:00'),
(194, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 11:40:14', '0000-00-00 00:00:00'),
(195, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 13:04:01', '0000-00-00 00:00:00'),
(196, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 13:12:43', '0000-00-00 00:00:00'),
(197, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 13:14:03', '0000-00-00 00:00:00'),
(198, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 13:18:21', '0000-00-00 00:00:00'),
(199, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 13:19:50', '0000-00-00 00:00:00'),
(200, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 13:22:37', '0000-00-00 00:00:00'),
(201, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 13:26:02', '0000-00-00 00:00:00'),
(202, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 13:30:48', '0000-00-00 00:00:00'),
(203, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 13:33:53', '0000-00-00 00:00:00'),
(204, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 13:38:04', '0000-00-00 00:00:00'),
(205, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 13:57:55', '0000-00-00 00:00:00'),
(206, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 14:00:51', '0000-00-00 00:00:00'),
(207, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 14:10:00', '0000-00-00 00:00:00'),
(208, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 14:13:51', '0000-00-00 00:00:00'),
(209, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 14:26:20', '0000-00-00 00:00:00'),
(210, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 14:28:42', '0000-00-00 00:00:00'),
(211, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 14:49:56', '0000-00-00 00:00:00'),
(212, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 14:57:26', '0000-00-00 00:00:00'),
(213, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 15:04:18', '0000-00-00 00:00:00'),
(214, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 15:08:36', '0000-00-00 00:00:00'),
(215, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 15:20:28', '0000-00-00 00:00:00'),
(216, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 15:27:43', '0000-00-00 00:00:00'),
(217, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 15:30:10', '0000-00-00 00:00:00'),
(218, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 15:32:09', '0000-00-00 00:00:00'),
(219, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '117.98.132.170', '2016-06-11 15:34:49', '0000-00-00 00:00:00'),
(220, 3, 'client', '3', NULL, 'Dalvik/2.1.0 (Linux; U; Android 5.1.1; C6902 Build/14.6.A.1.236)', '182.73.145.138', '2016-06-13 04:55:24', '0000-00-00 00:00:00'),
(221, 3, 'client', '3', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '182.73.145.138', '2016-06-13 05:19:21', '0000-00-00 00:00:00'),
(222, 10, 'client', '10', NULL, 'Dalvik/1.6.0 (Linux; U; Android 4.4.2; Brace-X1 Build/KOT49H)', '202.78.251.151', '2016-06-13 06:28:57', '0000-00-00 00:00:00'),
(223, 10, 'client', '10', NULL, 'Dalvik/1.6.0 (Linux; U; Android 4.4.2; Brace-X1 Build/KOT49H)', '202.78.251.151', '2016-06-13 06:39:59', '0000-00-00 00:00:00'),
(224, 10, 'client', '10', NULL, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', '202.78.251.130', '2016-06-13 06:45:46', '0000-00-00 00:00:00'),
(225, 11, 'client', '11', NULL, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', '202.78.251.130', '2016-06-13 07:18:44', '0000-00-00 00:00:00'),
(226, 11, 'client', '11', NULL, 'Dalvik/1.6.0 (Linux; U; Android 4.4.2; Brace-X1 Build/KOT49H)', '202.78.251.151', '2016-06-13 07:37:06', '0000-00-00 00:00:00'),
(227, 11, 'client', '11', NULL, 'Dalvik/1.6.0 (Linux; U; Android 4.4.2; Brace-X1 Build/KOT49H)', '202.78.251.151', '2016-06-13 07:39:47', '0000-00-00 00:00:00'),
(228, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.231.204', '2016-06-13 17:19:59', '0000-00-00 00:00:00'),
(229, 12, 'client', '12', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', '202.78.251.130', '2016-06-14 05:29:22', '0000-00-00 00:00:00'),
(230, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-14 05:30:51', '0000-00-00 00:00:00'),
(231, 4, 'client', '4', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', '202.78.251.130', '2016-06-14 05:33:03', '0000-00-00 00:00:00'),
(232, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-14 05:35:23', '0000-00-00 00:00:00'),
(233, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-14 05:39:02', '0000-00-00 00:00:00'),
(234, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-14 05:43:27', '0000-00-00 00:00:00'),
(235, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-14 05:44:17', '0000-00-00 00:00:00'),
(236, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30H)', '202.78.251.151', '2016-06-14 06:06:03', '0000-00-00 00:00:00'),
(237, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30H)', '106.220.196.73', '2016-06-14 06:07:24', '0000-00-00 00:00:00'),
(238, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.231.204', '2016-06-15 05:14:45', '0000-00-00 00:00:00'),
(239, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.231.204', '2016-06-15 05:34:10', '0000-00-00 00:00:00'),
(240, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.231.204', '2016-06-15 05:54:47', '0000-00-00 00:00:00'),
(241, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.231.204', '2016-06-15 05:59:11', '0000-00-00 00:00:00'),
(242, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.231.204', '2016-06-15 06:00:11', '0000-00-00 00:00:00'),
(243, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30M)', '202.78.251.151', '2016-06-15 11:39:13', '0000-00-00 00:00:00'),
(244, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-15 11:53:47', '0000-00-00 00:00:00'),
(245, 5, 'client', '5', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-15 14:23:48', '0000-00-00 00:00:00'),
(246, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '94.98.232.20', '2016-06-16 12:11:05', '0000-00-00 00:00:00'),
(247, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '94.98.232.20', '2016-06-16 12:13:59', '0000-00-00 00:00:00'),
(248, 5, 'client', '5', NULL, 'Dalvik/2.1.0 (Linux; U; Android 5.1.1; C6902 Build/14.6.A.1.236)', '182.73.145.138', '2016-06-16 12:24:19', '0000-00-00 00:00:00'),
(249, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.232.79', '2016-06-16 16:58:04', '0000-00-00 00:00:00'),
(250, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.232.79', '2016-06-16 17:10:10', '0000-00-00 00:00:00'),
(251, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.232.79', '2016-06-16 17:23:19', '0000-00-00 00:00:00'),
(252, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.232.79', '2016-06-16 17:31:11', '0000-00-00 00:00:00'),
(253, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.232.79', '2016-06-16 17:32:10', '0000-00-00 00:00:00'),
(254, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.232.79', '2016-06-16 17:42:23', '0000-00-00 00:00:00'),
(255, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.232.79', '2016-06-16 17:52:17', '0000-00-00 00:00:00'),
(256, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.232.79', '2016-06-16 17:54:54', '0000-00-00 00:00:00'),
(257, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.232.79', '2016-06-16 17:58:32', '0000-00-00 00:00:00'),
(258, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.232.79', '2016-06-16 18:11:11', '0000-00-00 00:00:00'),
(259, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.232.79', '2016-06-16 18:17:11', '0000-00-00 00:00:00'),
(260, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30M)', '183.82.75.250', '2016-06-17 14:23:04', '0000-00-00 00:00:00'),
(261, 10, 'client', '10', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30M)', '202.78.251.151', '2016-06-18 05:43:19', '0000-00-00 00:00:00'),
(262, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 06:06:14', '0000-00-00 00:00:00'),
(263, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 06:36:22', '0000-00-00 00:00:00'),
(264, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 06:37:18', '0000-00-00 00:00:00'),
(265, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 06:39:26', '0000-00-00 00:00:00'),
(266, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 06:42:13', '0000-00-00 00:00:00'),
(267, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 06:48:27', '0000-00-00 00:00:00'),
(268, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 06:49:19', '0000-00-00 00:00:00'),
(269, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 06:51:21', '0000-00-00 00:00:00'),
(270, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 07:02:59', '0000-00-00 00:00:00'),
(271, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 07:05:26', '0000-00-00 00:00:00'),
(272, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 07:07:24', '0000-00-00 00:00:00'),
(273, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 07:12:16', '0000-00-00 00:00:00'),
(274, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 07:14:10', '0000-00-00 00:00:00'),
(275, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 07:19:11', '0000-00-00 00:00:00'),
(276, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 07:21:36', '0000-00-00 00:00:00'),
(277, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 07:23:04', '0000-00-00 00:00:00'),
(278, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.139.29', '2016-06-18 07:24:50', '0000-00-00 00:00:00'),
(279, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30M)', '183.82.113.202', '2016-06-18 10:00:04', '0000-00-00 00:00:00'),
(280, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30M)', '183.82.113.202', '2016-06-18 10:07:09', '0000-00-00 00:00:00'),
(281, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '78.95.143.102', '2016-06-18 10:57:52', '0000-00-00 00:00:00'),
(282, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '78.95.143.102', '2016-06-18 11:03:25', '0000-00-00 00:00:00'),
(283, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 5.1.1; C6902 Build/14.6.A.1.236)', '49.207.135.135', '2016-06-18 14:08:02', '0000-00-00 00:00:00'),
(284, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '78.95.143.102', '2016-06-18 14:43:35', '0000-00-00 00:00:00'),
(285, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-20 05:14:51', '0000-00-00 00:00:00'),
(286, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-20 07:27:19', '0000-00-00 00:00:00'),
(287, 9, 'client', '9', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-06-20 10:21:10', '0000-00-00 00:00:00'),
(288, 9, 'client', '9', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-06-20 10:29:26', '0000-00-00 00:00:00'),
(289, 9, 'client', '9', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-06-20 10:29:31', '0000-00-00 00:00:00'),
(290, 9, 'client', '9', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-06-20 10:29:33', '0000-00-00 00:00:00'),
(291, 9, 'client', '9', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-06-20 10:29:36', '0000-00-00 00:00:00'),
(292, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-06-20 10:29:48', '0000-00-00 00:00:00'),
(293, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-06-20 11:05:40', '0000-00-00 00:00:00'),
(294, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-06-20 11:39:05', '0000-00-00 00:00:00'),
(295, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-21 06:11:53', '0000-00-00 00:00:00'),
(296, 9, 'client', '9', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-06-21 06:45:47', '0000-00-00 00:00:00'),
(297, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-06-21 09:00:33', '0000-00-00 00:00:00'),
(298, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-06-21 09:09:49', '0000-00-00 00:00:00'),
(299, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30M)', '202.78.251.151', '2016-06-21 09:22:37', '0000-00-00 00:00:00'),
(300, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.245.205', '2016-06-21 17:13:18', '0000-00-00 00:00:00'),
(301, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.245.205', '2016-06-21 17:20:06', '0000-00-00 00:00:00'),
(302, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.245.205', '2016-06-21 17:42:45', '0000-00-00 00:00:00'),
(303, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.245.205', '2016-06-21 17:46:28', '0000-00-00 00:00:00'),
(304, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.245.205', '2016-06-21 17:48:30', '0000-00-00 00:00:00'),
(305, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.245.205', '2016-06-21 17:50:17', '0000-00-00 00:00:00'),
(306, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.245.205', '2016-06-21 17:54:29', '0000-00-00 00:00:00'),
(307, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.4.0', '110.224.245.205', '2016-06-21 17:56:16', '0000-00-00 00:00:00'),
(308, 13, 'client', '13', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '61.94.12.54', '2016-06-25 17:58:08', '0000-00-00 00:00:00'),
(309, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-27 10:08:07', '0000-00-00 00:00:00'),
(310, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '114.4.21.200', '2016-06-29 04:57:15', '0000-00-00 00:00:00'),
(311, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-29 05:00:04', '0000-00-00 00:00:00'),
(312, 9, 'client', '9', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-06-29 05:09:27', '0000-00-00 00:00:00'),
(313, 9, 'client', '9', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-06-30 04:14:05', '0000-00-00 00:00:00'),
(314, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-06-30 05:33:33', '0000-00-00 00:00:00'),
(315, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '114.4.21.200', '2016-07-01 10:08:57', '0000-00-00 00:00:00'),
(316, 4, 'client', '4', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-02 06:36:19', '0000-00-00 00:00:00'),
(317, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-07-02 10:22:13', '0000-00-00 00:00:00');
INSERT INTO `oauth_sessions` (`id`, `client_id`, `owner_type`, `owner_id`, `client_redirect_uri`, `client_browser`, `client_remote_address`, `created_at`, `updated_at`) VALUES
(318, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-07-02 10:28:11', '0000-00-00 00:00:00'),
(319, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; Android SDK built for x86 Build/MASTER)', '202.78.251.130', '2016-07-02 10:34:49', '0000-00-00 00:00:00'),
(320, 4, 'client', '4', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-04 06:36:30', '0000-00-00 00:00:00'),
(321, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-07-04 06:45:37', '0000-00-00 00:00:00'),
(322, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-07-04 06:49:35', '0000-00-00 00:00:00'),
(323, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30M)', '202.78.251.151', '2016-07-05 05:34:03', '0000-00-00 00:00:00'),
(324, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30M)', '202.78.251.151', '2016-07-05 05:36:21', '0000-00-00 00:00:00'),
(325, 4, 'client', '4', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '183.82.113.201', '2016-07-05 15:45:36', '0000-00-00 00:00:00'),
(326, 12, 'client', '12', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-06 18:40:32', '0000-00-00 00:00:00'),
(327, 12, 'client', '12', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-06 18:41:58', '0000-00-00 00:00:00'),
(328, 14, 'client', '14', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-06 18:43:44', '0000-00-00 00:00:00'),
(329, 14, 'client', '14', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-06 18:44:07', '0000-00-00 00:00:00'),
(330, 14, 'client', '14', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-06 18:46:58', '0000-00-00 00:00:00'),
(331, 14, 'client', '14', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-06 18:47:32', '0000-00-00 00:00:00'),
(332, 14, 'client', '14', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-06 18:48:05', '0000-00-00 00:00:00'),
(333, 14, 'client', '14', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-06 18:48:41', '0000-00-00 00:00:00'),
(334, 14, 'client', '14', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-06 19:10:18', '0000-00-00 00:00:00'),
(335, 14, 'client', '14', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-06 19:10:40', '0000-00-00 00:00:00'),
(336, 14, 'client', '14', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-06 19:11:40', '0000-00-00 00:00:00'),
(337, 14, 'client', '14', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-06 19:14:23', '0000-00-00 00:00:00'),
(338, 4, 'client', '4', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-07 05:24:16', '0000-00-00 00:00:00'),
(339, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-07-07 06:37:51', '0000-00-00 00:00:00'),
(340, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-07-07 06:46:42', '0000-00-00 00:00:00'),
(341, 14, 'client', '14', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-07 09:44:21', '0000-00-00 00:00:00'),
(342, 14, 'client', '14', NULL, 'Lawyer/1 CFNetwork/758.4.3 Darwin/15.5.0', '36.70.12.83', '2016-07-07 09:45:56', '0000-00-00 00:00:00'),
(343, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '36.70.12.83', '2016-07-11 07:41:51', '0000-00-00 00:00:00'),
(344, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.137.47', '2016-07-12 01:43:44', '0000-00-00 00:00:00'),
(345, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.137.47', '2016-07-12 02:10:30', '0000-00-00 00:00:00'),
(346, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.137.47', '2016-07-12 03:03:37', '0000-00-00 00:00:00'),
(347, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.137.47', '2016-07-12 04:54:43', '0000-00-00 00:00:00'),
(348, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.137.47', '2016-07-12 05:20:33', '0000-00-00 00:00:00'),
(349, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.137.47', '2016-07-12 05:29:26', '0000-00-00 00:00:00'),
(350, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.137.47', '2016-07-12 05:33:50', '0000-00-00 00:00:00'),
(351, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.137.47', '2016-07-12 05:35:05', '0000-00-00 00:00:00'),
(352, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.137.47', '2016-07-12 05:37:26', '0000-00-00 00:00:00'),
(353, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.137.47', '2016-07-12 05:48:03', '0000-00-00 00:00:00'),
(354, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.137.47', '2016-07-12 05:50:48', '0000-00-00 00:00:00'),
(355, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-07-12 08:59:46', '0000-00-00 00:00:00'),
(356, 15, 'client', '15', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-12 09:47:28', '0000-00-00 00:00:00'),
(357, 15, 'client', '15', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-12 09:54:31', '0000-00-00 00:00:00'),
(358, 15, 'client', '15', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-12 09:56:44', '0000-00-00 00:00:00'),
(359, 15, 'client', '15', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-12 10:07:43', '0000-00-00 00:00:00'),
(360, 8, 'client', '8', NULL, 'Dalvik/1.6.0 (Linux; U; Android 4.4.4; XT1022 Build/KXC21.5-40)', '117.98.130.185', '2016-07-12 16:34:28', '0000-00-00 00:00:00'),
(361, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '117.98.130.185', '2016-07-13 04:40:17', '0000-00-00 00:00:00'),
(362, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '117.98.130.185', '2016-07-14 17:59:07', '0000-00-00 00:00:00'),
(363, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '117.98.130.185', '2016-07-14 18:47:02', '0000-00-00 00:00:00'),
(364, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '117.98.130.185', '2016-07-14 18:48:33', '0000-00-00 00:00:00'),
(365, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '117.98.130.185', '2016-07-14 18:51:45', '0000-00-00 00:00:00'),
(366, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '117.98.130.185', '2016-07-14 18:55:36', '0000-00-00 00:00:00'),
(367, 8, 'client', '8', NULL, 'Dalvik/1.6.0 (Linux; U; Android 4.4.4; XT1022 Build/KXC21.5-40)', '117.98.130.185', '2016-07-14 19:12:02', '0000-00-00 00:00:00'),
(368, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '117.98.130.185', '2016-07-14 19:13:25', '0000-00-00 00:00:00'),
(369, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '117.98.130.185', '2016-07-14 19:16:42', '0000-00-00 00:00:00'),
(370, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '117.98.130.185', '2016-07-14 19:18:00', '0000-00-00 00:00:00'),
(371, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '117.98.130.185', '2016-07-14 19:33:00', '0000-00-00 00:00:00'),
(372, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '111.68.121.15', '2016-07-15 17:17:24', '0000-00-00 00:00:00'),
(373, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '111.68.121.15', '2016-07-15 17:22:08', '0000-00-00 00:00:00'),
(374, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '111.68.121.15', '2016-07-15 17:29:31', '0000-00-00 00:00:00'),
(375, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '111.68.121.15', '2016-07-15 17:30:57', '0000-00-00 00:00:00'),
(376, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.226.163', '2016-07-16 17:31:37', '0000-00-00 00:00:00'),
(377, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.226.163', '2016-07-16 17:43:31', '0000-00-00 00:00:00'),
(378, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.226.163', '2016-07-16 17:47:20', '0000-00-00 00:00:00'),
(379, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.226.163', '2016-07-16 17:55:59', '0000-00-00 00:00:00'),
(380, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.226.163', '2016-07-16 18:32:52', '0000-00-00 00:00:00'),
(381, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.226.163', '2016-07-16 18:35:21', '0000-00-00 00:00:00'),
(382, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.226.163', '2016-07-16 18:42:36', '0000-00-00 00:00:00'),
(383, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.226.163', '2016-07-16 19:27:02', '0000-00-00 00:00:00'),
(384, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.226.163', '2016-07-16 19:36:01', '0000-00-00 00:00:00'),
(385, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.226.163', '2016-07-16 19:55:18', '0000-00-00 00:00:00'),
(386, 16, 'client', '16', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-18 05:03:07', '0000-00-00 00:00:00'),
(387, 17, 'client', '17', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-18 05:06:33', '0000-00-00 00:00:00'),
(388, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '183.83.144.80', '2016-07-18 16:10:01', '0000-00-00 00:00:00'),
(389, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0', '103.232.131.7', '2016-07-18 16:39:41', '0000-00-00 00:00:00'),
(390, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0', '103.232.131.7', '2016-07-18 16:40:51', '0000-00-00 00:00:00'),
(391, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0', '103.232.131.7', '2016-07-18 16:40:55', '0000-00-00 00:00:00'),
(392, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0', '103.232.131.7', '2016-07-18 16:41:09', '0000-00-00 00:00:00'),
(393, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0', '103.232.131.7', '2016-07-18 16:41:18', '0000-00-00 00:00:00'),
(394, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 16:44:04', '0000-00-00 00:00:00'),
(395, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 16:44:27', '0000-00-00 00:00:00'),
(396, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 16:45:13', '0000-00-00 00:00:00'),
(397, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 16:45:55', '0000-00-00 00:00:00'),
(398, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 16:47:09', '0000-00-00 00:00:00'),
(399, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 16:47:35', '0000-00-00 00:00:00'),
(400, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 16:47:38', '0000-00-00 00:00:00'),
(401, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 16:47:40', '0000-00-00 00:00:00'),
(402, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 16:47:41', '0000-00-00 00:00:00'),
(403, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 16:49:58', '0000-00-00 00:00:00'),
(404, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 16:50:10', '0000-00-00 00:00:00'),
(405, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '183.83.144.80', '2016-07-18 16:56:07', '0000-00-00 00:00:00'),
(406, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 16:56:54', '0000-00-00 00:00:00'),
(407, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 16:57:09', '0000-00-00 00:00:00'),
(408, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 17:01:03', '0000-00-00 00:00:00'),
(409, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 17:01:05', '0000-00-00 00:00:00'),
(410, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 17:02:27', '0000-00-00 00:00:00'),
(411, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '103.232.131.7', '2016-07-18 17:03:16', '0000-00-00 00:00:00'),
(412, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-19 04:25:35', '0000-00-00 00:00:00'),
(413, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '183.82.97.231', '2016-07-19 07:49:10', '0000-00-00 00:00:00'),
(414, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '183.82.97.231', '2016-07-19 07:51:20', '0000-00-00 00:00:00'),
(415, 18, 'client', '18', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-19 09:01:04', '0000-00-00 00:00:00'),
(416, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 5.1.1; C6902 Build/14.6.A.1.236)', '106.220.224.133', '2016-07-19 13:57:03', '0000-00-00 00:00:00'),
(417, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 5.1.1; C6902 Build/14.6.A.1.236)', '183.82.113.202', '2016-07-19 14:39:15', '0000-00-00 00:00:00'),
(418, 12, 'client', '12', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '93.168.160.92', '2016-07-19 14:59:58', '0000-00-00 00:00:00'),
(419, 19, 'client', '19', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '93.168.160.92', '2016-07-19 15:01:40', '0000-00-00 00:00:00'),
(420, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30P)', '183.82.113.202', '2016-07-19 15:02:08', '0000-00-00 00:00:00'),
(421, 19, 'client', '19', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; SM-G900F Build/MMB29M)', '93.168.160.92', '2016-07-19 15:03:56', '0000-00-00 00:00:00'),
(422, 16, 'client', '16', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 04:23:01', '0000-00-00 00:00:00'),
(423, 20, 'client', '20', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 04:30:18', '0000-00-00 00:00:00'),
(424, 20, 'client', '20', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 04:38:59', '0000-00-00 00:00:00'),
(425, 21, 'client', '21', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 04:40:48', '0000-00-00 00:00:00'),
(426, 22, 'client', '22', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 04:48:30', '0000-00-00 00:00:00'),
(427, 23, 'client', '23', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 04:51:21', '0000-00-00 00:00:00'),
(428, 24, 'client', '24', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 05:18:42', '0000-00-00 00:00:00'),
(429, 25, 'client', '25', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 05:44:37', '0000-00-00 00:00:00'),
(430, 26, 'client', '26', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 05:51:03', '0000-00-00 00:00:00'),
(431, 27, 'client', '27', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 06:04:22', '0000-00-00 00:00:00'),
(432, 28, 'client', '28', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 06:44:08', '0000-00-00 00:00:00'),
(433, 26, 'client', '26', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 06:57:33', '0000-00-00 00:00:00'),
(434, 29, 'client', '29', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 07:29:10', '0000-00-00 00:00:00'),
(435, 30, 'client', '30', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 07:35:07', '0000-00-00 00:00:00'),
(436, 31, 'client', '31', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 11:54:02', '0000-00-00 00:00:00'),
(437, 31, 'client', '31', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-20 11:54:30', '0000-00-00 00:00:00'),
(438, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.236.14', '2016-07-20 14:43:55', '0000-00-00 00:00:00'),
(439, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.236.14', '2016-07-20 15:40:02', '0000-00-00 00:00:00'),
(440, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.236.14', '2016-07-20 15:41:28', '0000-00-00 00:00:00'),
(441, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.236.14', '2016-07-20 15:43:23', '0000-00-00 00:00:00'),
(442, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.236.14', '2016-07-20 17:07:48', '0000-00-00 00:00:00'),
(443, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.236.14', '2016-07-20 17:08:35', '0000-00-00 00:00:00'),
(444, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.236.14', '2016-07-20 17:09:06', '0000-00-00 00:00:00'),
(445, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0; PREVIEW - Google Nexus 5X - 6.0.0 - API 23 - 1080x1920 Build/MRA58K)', '202.78.251.130', '2016-07-21 09:55:47', '0000-00-00 00:00:00'),
(446, 32, 'client', '32', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-21 11:37:23', '0000-00-00 00:00:00'),
(447, 33, 'client', '33', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-21 11:39:19', '0000-00-00 00:00:00'),
(448, 34, 'client', '34', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-21 12:07:42', '0000-00-00 00:00:00'),
(449, 35, 'client', '35', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-22 09:26:50', '0000-00-00 00:00:00'),
(450, 36, 'client', '36', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-22 09:32:20', '0000-00-00 00:00:00'),
(451, 37, 'client', '37', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-22 09:44:55', '0000-00-00 00:00:00'),
(452, 38, 'client', '38', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-22 09:45:06', '0000-00-00 00:00:00'),
(453, 39, 'client', '39', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-22 09:50:47', '0000-00-00 00:00:00'),
(454, 39, 'client', '39', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30P)', '202.78.251.151', '2016-07-22 09:52:08', '0000-00-00 00:00:00'),
(455, 4, 'client', '4', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30P)', '183.82.113.202', '2016-07-23 05:49:28', '0000-00-00 00:00:00'),
(456, 9, 'client', '9', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30P)', '183.82.113.202', '2016-07-23 05:50:06', '0000-00-00 00:00:00'),
(457, 8, 'client', '8', NULL, 'Dalvik/1.6.0 (Linux; U; Android 4.4.2; ASUS_T00J Build/KVT49L)', '183.82.113.202', '2016-07-23 06:30:45', '0000-00-00 00:00:00'),
(458, 39, 'client', '39', NULL, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '202.78.251.130', '2016-07-23 06:31:40', '0000-00-00 00:00:00'),
(459, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '183.82.113.202', '2016-07-23 06:40:15', '0000-00-00 00:00:00'),
(460, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '183.82.113.202', '2016-07-23 06:43:49', '0000-00-00 00:00:00'),
(461, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '183.82.113.202', '2016-07-23 06:53:30', '0000-00-00 00:00:00'),
(462, 39, 'client', '39', NULL, 'Dalvik/2.1.0 (Linux; U; Android 6.0.1; Nexus 5 Build/MOB30P)', '202.78.251.151', '2016-07-23 09:58:36', '0000-00-00 00:00:00'),
(463, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.133.153', '2016-07-23 12:25:04', '0000-00-00 00:00:00'),
(464, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.133.153', '2016-07-23 12:25:19', '0000-00-00 00:00:00'),
(465, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.133.153', '2016-07-23 12:26:43', '0000-00-00 00:00:00'),
(466, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.236.128', '2016-07-24 06:09:43', '0000-00-00 00:00:00'),
(467, 8, 'client', '8', NULL, 'Lawyer/1 CFNetwork/758.3.15 Darwin/15.5.0', '110.224.236.128', '2016-07-24 07:03:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_session_scopes`
--

CREATE TABLE IF NOT EXISTS `oauth_session_scopes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` int(10) unsigned NOT NULL,
  `scope_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `oauth_session_scopes_session_id_index` (`session_id`),
  KEY `oauth_session_scopes_scope_id_index` (`scope_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id_rating` int(11) NOT NULL AUTO_INCREMENT,
  `lawyer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rating`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `lawyer_id`, `user_id`, `rating`, `created_date_time`) VALUES
(1, 7, 8, 4, '2016-08-13 10:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) DEFAULT NULL,
  `service_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `service_flag` int(11) DEFAULT NULL,
  `service_status` tinyint(255) DEFAULT '1',
  PRIMARY KEY (`id_service`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `language_id`, `service_title`, `service_flag`, `service_status`) VALUES
(3, 1, 'Consultation', 1, 1),
(4, 2, 'تشاور', 1, 1),
(5, 1, 'Contract Writing', 2, 1),
(6, 2, 'Contract Writing', 2, 1),
(7, 1, 'Establish Company', 3, 1),
(8, 2, 'Establish Company', 3, 1),
(9, 1, 'Appeal', 4, 1),
(10, 2, 'Appeal', 4, 1),
(11, 1, 'Rewrite legal notes', 5, 1),
(12, 2, 'صياغة مذكرة دعوى', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE IF NOT EXISTS `speciality` (
  `id_speciality` int(11) NOT NULL AUTO_INCREMENT,
  `speciality` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_speciality`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`id_speciality`, `speciality`) VALUES
(1, 'Speciality');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `first_name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(45) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(45) CHARACTER SET utf8 NOT NULL,
  `speciality_id` int(11) DEFAULT NULL,
  `is_certification` tinyint(2) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `user_image` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `experience` int(11) NOT NULL,
  `certification_attachment` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `user_status` tinyint(2) NOT NULL DEFAULT '0',
  `created_date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`) USING BTREE,
  KEY `fk_users_user_role_idx` (`user_type_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user_type_id`, `first_name`, `father_name`, `last_name`, `email`, `username`, `password`, `gender`, `speciality_id`, `is_certification`, `mobile_number`, `country_id`, `user_image`, `experience`, `certification_attachment`, `user_status`, `created_date_time`) VALUES
(1, 3, 'Abdullah', 'Saleh', 'Dabil', 'asdabil@gmail.com', 'asdabil', 'e10adc3949ba59abbe56e057f20f883e', 'male', NULL, 0, 966553478499, 1, NULL, 0, NULL, 1, '2016-08-13 06:30:26'),
(2, 1, 'admin', NULL, NULL, 'admin@lawm.sa', 'Admin', 'e10adc3949ba59abbe56e057f20f883e', '', NULL, 0, 0, NULL, NULL, 0, NULL, 0, '2016-08-13 06:38:04'),
(3, 2, 'sthanka', 'subhani', 'shaik', 'sthanka9@gmail.com', 'sthanka', 'e10adc3949ba59abbe56e057f20f883e', 'male', 1, 0, 123465789, 0, NULL, 2, '', 1, '2016-08-13 07:46:34'),
(4, 3, 'sthanka', '', '', 'sthanka9@gmail.com', 'sthanka', 'e10adc3949ba59abbe56e057f20f883e', 'male', NULL, 0, 0, 0, NULL, 0, NULL, 1, '2016-08-13 07:49:46'),
(5, 2, 'Abdullah', 'Dabil', 'Saleh', 'asdabil@gmail.com', 'asdabil', 'e10adc3949ba59abbe56e057f20f883e', 'Select Gender', 1, 1, 966553478499, 1, 'http://lawm.sa/uploads/1471083423.jpg', 6, 'http://lawm.sa/uploads/1471083423.jpg', 1, '2016-08-13 10:17:03'),
(6, 3, 'Mohammed Arif', 'Firoz', 'Adoni', 'mdarif@yahoo.com', 'mdarif', 'e10adc3949ba59abbe56e057f20f883e', 'male', NULL, 0, 919849333201, 1, 'http://lawm.sa/uploads/1471083942.jpg', 0, NULL, 1, '2016-08-13 10:25:42'),
(7, 2, 'Mohammed Arif', 'Firoz', 'Adoni', 'mdarif@yahoo.com', 'mdarif', 'e10adc3949ba59abbe56e057f20f883e', 'male', 1, 0, 919849333201, 1, NULL, 3, '', 1, '2016-08-13 10:33:14'),
(8, 3, 'malli', 'malli', 'malli', 'malli@gmail.com', 'malli', 'e10adc3949ba59abbe56e057f20f883e', 'male', NULL, 0, 1111111111, 1, NULL, 0, NULL, 1, '2016-08-13 10:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id_user_type` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id_user_type`, `user_type`, `created_date_time`) VALUES
(1, 'Admin', '2016-04-16 16:44:48'),
(2, 'Lawyer', '2016-04-16 16:44:58'),
(3, 'Client', '2016-04-16 16:45:10');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `oauth_grant_scopes`
--
ALTER TABLE `oauth_grant_scopes`
  ADD CONSTRAINT `oauth_grant_scopes_ibfk_1` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`),
  ADD CONSTRAINT `oauth_grant_scopes_ibfk_2` FOREIGN KEY (`grant_id`) REFERENCES `oauth_grants` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id_user_type`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

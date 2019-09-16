-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 05:10 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cleanzeedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(25) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `admin_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `user_name`, `passwd`, `admin_type`) VALUES
(7, 'jyoti', '1411a3e2bd0e7c77fd51adc1e17a834e', 'admin'),
(8, 'brijesh', '9db077197b5f4184cd9eb439086fbdef', 'super');

-- --------------------------------------------------------

--
-- Table structure for table `carttbl`
--

CREATE TABLE `carttbl` (
  `id` int(10) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `servicename` varchar(50) NOT NULL,
  `housesize` varchar(50) NOT NULL,
  `frequence` varchar(50) NOT NULL,
  `totalprice` int(10) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `job` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'AVL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `f_name`, `l_name`, `gender`, `address`, `city`, `state`, `phone`, `email`, `date_of_birth`, `job`, `status`, `created_at`, `updated_at`) VALUES
(38, 'Palle', 'Ibsen', 'female', 'Smagsløget 45', '', 'Maharashtra', '9975245588', 'Palle@gmail.com', '1991-06-17', 'Painter', 'AVL', NULL, '2018-01-14 17:11:42'),
(40, 'Matti', ' Karttunen', 'female', 'Keskuskatu 45', '', 'Maharashtra', '845555125', 'abc@abc.com', '1984-06-19', 'Beautician', 'AVL', NULL, NULL),
(41, 'jyoti', 'singh', 'female', 'amrut nagar', '', 'Maharashtra', '9221021193', 'js4406235@gmail.com', '2018-03-09', 'Painter', 'AVL', '2018-03-27 06:53:56', NULL),
(42, 'raju', 'vishwakarma', 'male', 'chauko', '', 'Madhya pradesh', '9221021193', 'raju@gmail.com', '2018-03-24', 'Beautician', 'AVL', '2018-03-27 06:54:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `rating` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newuser`
--

CREATE TABLE `newuser` (
  `userid` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newuser`
--

INSERT INTO `newuser` (`userid`, `fname`, `lname`, `email`, `phone`, `password`) VALUES
(1, 'Brijesh', 'Vishwakarma', 'b@gmail.com', '9221021193', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `shippingadd`
--

CREATE TABLE `shippingadd` (
  `fname` varchar(50) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(40) NOT NULL,
  `postalcode` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timg`
--

CREATE TABLE `timg` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` longblob NOT NULL,
  `price` int(11) NOT NULL,
  `des1` varchar(200) NOT NULL,
  `des2` varchar(200) NOT NULL,
  `des3` varchar(200) NOT NULL,
  `des4` varchar(200) NOT NULL,
  `des5` varchar(200) NOT NULL,
  `des6` varchar(200) NOT NULL,
  `des7` varchar(200) NOT NULL,
  `des8` varchar(200) NOT NULL,
  `des9` varchar(200) NOT NULL,
  `des10` varchar(200) NOT NULL,
  `des11` varchar(200) NOT NULL,
  `des12` varchar(200) NOT NULL,
  `des13` varchar(200) NOT NULL,
  `des14` varchar(200) NOT NULL,
  `des15` varchar(200) NOT NULL,
  `des16` varchar(200) NOT NULL,
  `des17` varchar(200) NOT NULL,
  `des18` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timg`
--

INSERT INTO `timg` (`id`, `name`, `img`, `price`, `des1`, `des2`, `des3`, `des4`, `des5`, `des6`, `des7`, `des8`, `des9`, `des10`, `des11`, `des12`, `des13`, `des14`, `des15`, `des16`, `des17`, `des18`) VALUES
(1, 'Deep Home Cleaning', 0x89504e470d0a1a0a0000000d4948445200000060000000600806000000e29877380000000473424954080808087c086488000000097048597300001baf00001baf015e1a911c0000001974455874536f667477617265007777772e696e6b73636170652e6f72679bee3c1a00000ec349444154789ced9d797455d5bdc7bfbf73ce1d6212b8978004c360296aad628b5afb149c8d503404321544e2c22e75bdd62480cff20456d75d0e3c5d54c254eb7a0e594822252314db222af6bd5a1fead35a95571588880c210c212121b9c3d9bff747a6734eeecdbde7ceaedecf5fecefddfbb7b7fb97b3cfdefbb7f711489122458a142952a4489122458a142952a448f1cf0225ba0166797673e3a592c4f74844b7317005805151307b0e400b802f007cc4e0dd3956756f4949891a05dbc3f2ad71c0dadada34c9a3ac05f02000290e551e67d0461b599efff9c2bbdb6255c9b7c2014fd7d68eb47b943700fc2801d59f2660d538abef85583c11f1f84b8a0897cb25d93dca7624a6f301208b81df1ef7587655563539a26d3ce99f8075d50d3f07e8375a8d81af415829b37d67f9bdb33b22b1ef72b9a4cccb7e98433e5c2c434c61c26d00f20164fac9fe3909dfcc8ad292c391d4a925a91de0aaadb53adcca1110c668e43f5bacbebc5f949474c6aadecaaa260759f130989703c830fcfc9904fbf4481ddf4f523b60dd96a64210d7f7a7096857bcbeeffd6271494b3cea5fbbb9364792956d00a66b750676e7587db3a3f14e48ea7700112fd6a699784bbc3a1f0096dd5772543a63bf9d807aad4ec09d47dd4a4534ea485a07fcfad59da31998a9d548c85be3dd8ef2f2d9ee11def64500feaa6b0bf1e395350d9323b59fb40e9055cf5c00caa0c25f95df9bff3f8968cbe2c58b7b7c92652e80d64195d209783652db49eb0010156b934c52351171a29af36ff7e49d22f0529dc83477c3d6fa6991d84d4a075456353908b845ab492ad726a83903942f2cd80a40f7140a212d89c466523a40b28a3c00d60181f1494569c167896b512f44c4447846273216acadad0d7b3f2a291d20980ab56922c4fde51b88b6fd9fec44efa65d3f1672cb05e1da4b3a07ac79e5f57402eed46a3e158d896a8f1197cb2508f4b25623894ac2b597740e50e87c2e80348db4ef91fb0abe4c547bfc410a1a7402e3d6e76a5e7386632be91c4024f27569607ba2da1288f2f9f30e82e96f1a49710bf70de1d84a2a07b8de7e5b01688e5623593404ca9f4898c41bda3411dd1c8e9da47280e3d8991ba08b70d1e1b2f9851f27ac41c341f49e5ee0e9fe330e4f5239002ccd33288d895c7c0d874fc53b7a85a6b95c2ed3fd995c0e80b85b9b2212bf4f544b82f16869412b80e31a296df425532798b593340e585bbd7d2a40530604c6c97116f5bf13d8a450d0ae07a00abadcac81a47180c46a9e4e20fe433c4e254402110e68d32ce152b33692c60144946f4827ddf473084cfb0de989664d28c1b3c49e67b76e9fc0aad006ddcfd169fbae48ed1696fdfb340994c744330818c7c417020031b572eff8fd1792b0b36eddeab0665a0c1c33a42f346b23291c20ab6a1e40daf0e8aef2f2d9ee30cd5171c5ca12c1fc380197f64fa1180098faff7d21802b01e4b2c0e345e52bbe60e0570d1b56d7f5670da922e653ac693581c704ceed9fa4700083f2b5bd4fe0b0869fc2f2559710782b335f6332d87d1901db8a2a563c2a0b69feb68d4f1e0ca9944427c13a7f997e0212fe0e78e6a51d99c4d0ae22bd16b2fdc9ac9dc2b2957904f121c0d784dd18c6b52a89bf15553c7677f0cc809070da60c0f47e50c21d60b3f9668360eb4f13e8bfcc1e052c5ab2ea16ea3d3da13fcbc338c0448f0be0360b21dbea15a3ac5e31ca42c82621dd0ee009b07e260320134c0d05152b6f0a56afcfcbe7f50aa5f9cf1998241882f4b31f26de69a6f44fcb567d5715a21eba000eef035145fdc6d56f0d53f404803d007e5558b6ea0e82ba0e4457f4fd6695981b8a1f5e755ddda627bf0a644051c903493704d902e50d44429f80decd37ccd26a924c7f3061825412af02c8d2684d9465bbba7ec3b09dafa361e3936f5296ed6a62ddceeb6896443586393b758147f1e815b6facf1998843a60e4376d3701d08e9b9f95cf9f17da0b104071d9638500aed36a2453599dcbe509502420752e9747b650b941bea1b87ce5dc40659cce6ec34c8dec66eb4dec1044f8892ecd30f5d7cf444f1845d5a3ff6f2a2a7bec46405a0449fc0b98fa67292718d82b116da95bffd4c0a69ac7eb6589f45dc2e0270134f96bc0ff8d19438ea3bad795e9957b421d204998a39dc5b18c1da1962d58b2621a04be67d46559bc58fcf0aa07850485209e02500cf0c01aa08fb1045cc5cc0f16553cb65508f597bded519ef7b30af8febcb2e53f68daf8ccdf8d3fa43577a41946fdf3c63cc1489803d6d7d45fc2acdb3b6969fff293f702163020a954083f3bd50cba0392680e791dc0b4402265415f61bfc824170218ea804cb75d78745dd8156ab5fd24ec1dc090f4c30f61b7cbe512a15b10618500c382fc075bb84717bb06917907246e0862e8438f6c72f54b94135235cce86a6f4357fb59f83cbdef66c56a45bac389f4114efd06484023feeb12248fd6166741df0e073cf3d28e4cb03a636082c770f77894374d9a19172c83eaf3e2e491c3f0ba7b74baa7a71b9e966e749e6dc3989c899095a0dd7051286d2032ae8c83939021c86af3cdd4ae7e41d8b3fc67f9e74c9a315e9cd0c12cfc76be166f4f374e1dfd1a86fd1c7ff8bb2d03181c20583407336424210e904086e927fd31da7574b6b50ddbf9fd787a7a70eeec99f02a9124fdfe3f4987cc9a88fb10e472b92466e469d697ac2a14f2f433184484f40bd2902e13a64cbe184ea71376fb05902d32644982c7edc5871fecc5b1a34707ca9c3fd78e4c67d6305603d4c57c852e0df34f40dc1de09832f51a4073e78bf1e9230be67e13894d4992e11c99892c8703a39c0e28c38ce956ab0dd7fef87afcbe71f0d28bd71d6ee801fa18b0900f993510770730e32eedcc8308a636dfb4d8ac56e4646763ec982cc8b21c72b9685c8cabaaaab2b70353349237ad5bfed4ac9db83b8020cdd1ae7854214c075fd6bcf27a7acb8903c8193b169264ee35d6dd7d1e1fbca7bf6863b19adec2418775c4f5605834d2c70f3d9497dc2be10dd50de305f8871ae9e8d245851f2e2b0ddd46e596a65b88ba5e9a302ef02cd4e75371a6ed0c4e9e68416747073adadb71aef31c58303c9ea1c34dfa48f3f7af99e9468314d6f5a9b83a409034133cb82943c0eb664ebeaddbd2f010887f0360c878e3f5f970f2d419b49e3e8dceae2e80192d5f37079d0959edf6b01c40a01b59f3241338e46d142d711e82c4ddda115850e8bb9febaa1b1e01e8d746dde3f5e2c8f1e368693d092134be24c298f113875d0b58ec69189d331114d2727890b5b5b5a3d8c3da30aa50bcea1e5346fa889b03aaaaaaeced8cdc0181e1f689f4d74329bbbebaf13e06d618f5e3adadf8eaf01108e17f0b49562c183b69f2c05684a7cf11569bdddc568401f2287301ddf8ff4eb8f797e3e680766be6cd604a1f1008ef3eba6866d0bd93b5d5dba732c46fa19bbc70d7e7fb9bd34fb5050f1d1311321ca390e188c66785fa6c824ab41309e6d0b7d18dc46d25cc2cdfa54d1321e8ead7e5724912f366e86fcc74b3a039a1747e2ca8dcda7431c0b91a891556fc066c42216e0e20b0ce012a89a0474f9c975c550262fd3d5cc27d4b4b0bc21a6fa301097e00fa7edb53563a2760e03e187171c0fa571aaf043078ad9f7170d93d45fb829563d0230669d792850575516e5ec83c57f39a138c87b51a33574662332e0e6063ec97f04680ac033cbbb9f152305fab9104588ee85274a47884fb5f018cd048cded073f357d884c4b7c1c00e8861f214941c77f4982fe741ae1ad258bf2bf08903de66cdadc9805323c914c95e6a2784389f92c68d3e6c62c1f6186463a0fc51334f842c64f94090a7a5b6644460672675c8749178d439adddc19a9ee1e370e1f6bc15bef7e80b68ea1df62f2c9780afa2f34fee3ec78c7f3a62af143cc1da02ac8050fae5c19786759494977d082842b7569a60f86cb3e2223030ffc341f769be9c369008034bb0d974d9e844939d97861db7674740e9921ff4cd71ca6275cb7deea0bab320db11f82847e2891420fbe8cd6267c8a3cec81addc19d785ddf95aec361b72a7ffd8df4f037fac04bcdf7ef0efdb22ae0c317680ebedb71526ccd655c8726817ef5877620e99e78eb50f97fd3b13428ad187c477c6070a0103003a05f18248c7fe7e623a04f5defba5818e24c29721cf9949bfe1d6e5742a00bc81b2db2c96403ff937ef5391fdf24e38dfec1dd9daeef8115aeecf032b326cb6618e7812562e5d58683af21588d8be03581ffb154c21edfd0000015d0c8c1c30a55a4703882872a625fbe59d185b33780baaffdfc71f0c7814140cec6edfffc9a668b50188fd3b4077f647065e0bb520ebefe04256d5ec68350a0046ed1aba7def4fd3b0cfe3968ba235f4f41333076caa699804e0fb1ae97ca6f76cc8f77e89597f0391684680ace161f2fe3d0b1487717426283173806a38f906e0cdc58b17073f27d207037b0d426e80ac6171e627d70fd5660dd5fa595a5af08f68d6df4fcc1cc090f4bb9f80a9253b4992f17d71e7ba57ebaf8ab8617db4dc9f87130b67c1e7c880cf9181130b67a1e5febce005a34c5807048a2b964f64c89560dc04c37c3d0c4e01f80bc9e29775954febee6badab6edc07fd30f6d64556dfcc929212b5a87cc57968b6a91f7da014564b74e6141e8f176b5edca2957aea37ac367dff2b144c3f01c515cb2732cb1f835180c83b1f7d36e6b12abd3f7fd94addc72e88f86943dedb8f7b94ffe4deb8b22e0275e8c831448be66f8e1aa5567ff9a281690730e44ae8af15450ba7cfc76bb542dbfe4f6b60386dc0c0fd1b6a9a76a6a5a5e9ceebefd9fbbfe809ff80d500dd6e37def8eb90f8fafb111b0e80f97740945f863a486fdbe57209c172291827f54dc05d3fb8fcb2495aed74db59bcb06d073e6f3e04b737e07a2d201e8f179f371fc28b7ef68198e877a60d8648388366a093c291c3830baf7e962dca3f50b9a5611681fe04cd4d744551a665391d1f9f6e3b3b70cea8a3b3130dbba21e2c7b7faad3d214abefa625fca276282c5d54f811135f0ff0bb5afdf2295326a4a5d9a3f63f5330c2c041f279f3a3bdf8d2f2ad7000002c5d58d87c9155bd8909f702f8080040c8bafaaa2b33b2475f18d6a1a820ecb012a6d73db726a69fcb373d0d2d2a5f11d36fb8d56f581d529b2a6b1a264b826e06e11a304f74fb7cea89d653b6d367dbc67777f77c5715e20293557b001c00f16e067ed7b0fe3f62e1d4142952a4489122458a142952a4489122458a14ffc4fc3f34b3e9a539182e270000000049454e44ae426082, 5000, 'Complete Deep Cleaning of all areas of the house inlcuding Bathroom, Kitchen, Dining Room, Bedroom & Balcony.', 'Deep Cleaning and cleaning of curtains, sofa set and chairs using Professional grade cleaning solutions.', 'Cleaning equipment and vacuum cleaners by professionals cleaning staff.', 'Deep Cleaning of external surfaces, cabinets and appliance exteriors, and removal of grease and oil stains.', 'Deep cleaning of floor, WC seat, sink, fittings and walls.', 'Deep cleaning of floor, windows, furniture and light fittings', 'Deep cleaning Floor, grill work and windows.', 'Dry vacuum cleaning of sofa, carpets, and curtains.', 'Cleaning of doors, cupboards, handles and wardrobe exteriors.', 'Cleaning of fans, lights, windows, railings, cabinets and switchboards.', 'Professional Grade cleaning solutions by Diversey.', 'Single Disk Machine, Steam Machine, Vacuum Cleaner, Scotch Brite Scrubber, Small Wipers, Bucket, Mugs.', 'Toilet Brush, Disposable Bags Hard Cloth Duster, Microfiber Duster', 'Cleaning of Utensils in kitchen cleaning', 'Walls and ceiling washing', '', '', ''),
(2, 'Furniture Polishing & Cleaning', 0x89504e470d0a1a0a0000000d4948445200000060000000600806000000e29877380000000473424954080808087c086488000000097048597300001baf00001baf015e1a911c0000001974455874536f667477617265007777772e696e6b73636170652e6f72679bee3c1a0000021749444154789ceddcbf6a53711c86f1f724e9699afea1a1383934a0a4a942a94ebd06411c84828eedd016d42b70f50a74705171ede0d20b70ad834104a14a26874211915029daf4f073123ad5aa5f7d8ff1f9cce14d729e9c2404722400000000000000000000c0b0caa207372f6ee6fb47a32b496955d23949cde8fbf8cb3e654abd94658f8af1bdc76b2fd70691e3a1019eb6b7ce0e2ac596922e45ee964552ea5654b9bafaf6da6ed466588027ade7f562b4ff42d242d46649bd3a28f2a53bbd2b5f23c62a11239254e4fd0d0dffc197a4c54675b01e35161640996e866d955d966e444dc50590e603b7ca2de942d4546480f1c0adb29b8c1a8a0c805f400033029811c08c006604302380d90f7f0beadedf49a719ea3ed8f9fd47f30fb97cab73badbddee9c788c3903cc0860460033029811c08c0066043023801901cc6a9163f566aeb9e596a6cf4f2a9f089db63bfc7ca47e6f5fef9ebdd7c1872f61bb6147a9deccb5747741238d6ad464a9e413359d596c6aba3da5ed7bafc376c3de82e6965b437bf08f1b6954d5be3e1bb6171660a6331535557a33f371cf352c40b53efcaffeef6a63719f6f7c0b3223801901cc0860460033029811c02cec0bedc737fda8a9ff0a67801901cc0860460033029811c08c0066043023801901cc0860460033029811c08c006604302380d94f5f332e3dd489ff1bced6e3afc45826d1cf9f33c08c00660400000000000000000000f0077d034a6e4e5ffde2d7570000000049454e44ae426082, 3000, 'Dry Vacuuming using vacuum cleaner to remove dust', 'Shampooing using biodegradable solution', 'Wet vacuuming post shampooing for removing dirt', 'Polishing is done for leather sofas', 'Cleaning Time: 1-2 Hours', 'Cleaning Staff: 1', 'Polishing ', 'Dry Cleaning', 'Complete Cleaning of Sofa', 'overall cleaning of dining table and chairs', 'Chemical: Biodegradable chemicals like Taski etc', 'Vacuum Cleaner(Wet and dry) and hand brushes', 'Air Blower for removing dust.', 'Any other furniture that are not mention will not be consider in service', 'Polishing Done only on required stuff that are made by furniture.', '', '', ''),
(3, 'Manual Cleaning', 0x89504e470d0a1a0a0000000d4948445200000060000000600806000000e29877380000000473424954080808087c086488000000097048597300001baf00001baf015e1a911c0000001974455874536f667477617265007777772e696e6b73636170652e6f72679bee3c1a00000bf449444154789ced9c7b741cd579c07fdf9dddd54ab23106645bb2ad809362a81fb8800b0e96258726c43636203004484f7aa03d89f9ab248492f4c4c179b4a1a140521a1e090468021462b9c1b112a771246c4c80008752ecb8e0821fc18f82225bd85aedeeccfdfa8764508d1e3bb377d75299df397bf69c9dfb3de6fb66ee7b2fc4c4c4c4c4c4c4c4c4c4c4c4c4c4c4c4c47c509028426bf768bddae0761116f4fdb4c95aefc68ba6ca7687be8d38ce5bf6d33acf4b7c459065a04960afc0231ed9ef6f58d3dc114567e804acdda3f568f01230fea84b9d01de19174f96dd511c19e97c6cf9dac9816f9e05260f70f94d2372455bcbe2cd61f59ab0026a83db797ff001c67b12dc1656dfe840c5f7e541060e3ec0648bae9f7fc9ba53c36a0e9d00113e3ec4e5a1ae8d5a1a9b5b3f2dc8f9431652aa3de5ab61752722f83378b5a5835f7bfe794deeadf5bf0672655fe1476af726569e7db6e423f850361a9a7f518b0677145458183a490310fe0d800d435cfce56097fa827f13f0a1de8fdcb47792bf2aacfd72231adc059c5060f15458fde1db00f16e023a07b8f48740bdcf0f2a28f299f75b97bf086bbf9c2c685e7795c045854bc8fab036422760699d6c43bc39aab400ef005d28ab03bc3943f68086a89e46224dcdad5344f95e0811b546fe3eac9d286d004beb6417706938297da0af0a7a0fab0f44b15f0eaceadd02e30a2daf2abfdcb47ad1cb61ed444a40146af72656eeadf501b9b6f717bdaf765f2274afa11c3436affb7394256164c4d85ba2d81a55d54239e81b70bd021c1f42ec9927d72c9917c55ee836e0ff3b816fee265cf031caad51edc509e8c782e67557011786147bb56dce6fd744b51927a08fa6e5eb2689ca77c34bcaaddc7cb38d6ab7648df0635b345539ce5ea3a2d70a7c180065bb22f7d5ed33f78fb411b0fa720fe88921c5f656f5f05031764bd208afddad9331762de89f0c62f6451b98a517d5cb9e52d80fcb82e6d62b44f5d1b072025f6a5fb3e45bc5d8765e05b5bda1698c6d1d3cf8007aa6f1ecbad6d7b4c2b5fdb09cbfeca71345f5ce08a207333d1266a03620ce13f04ed2ae009d3d7c499d1354dbcfb9b61f16df4bfe13705204d17b9ffdf9e2ae62edbb6f8445af2abcb05ee9dc7e089a9a5b2f035d1e41b447123859fb709e0081d30b2eacfcb16bfb85f2d14bd64f50d5bba2c88af0e3f6c797ec73e1c707b61b9ac4bf8368558f15df7cdb951fee13a06c0d517a8b73fb05b0f0e2759702d1aa3fe189b62716fd972b5fdc8f03441e049d5b505195a2fad003d178d1cf1a10992f22d3151554778ab0d523f7ef1bd63477342c6fadb17eb4aa07c05a1b7aca79289c8f035a5fd38aa0ca3e377c4f485eca1c30e75c3e43722eec2eb8e467cd827c1d066d57acc26f40bb0589b6762d3cfd64cb92f3223b3900cedf80c57f24d9b5bb757121033117c19fb1fcb1548d5ffd5d85cf0e53d4089c57cc33a762be195978104a361d7dd454c42c0094975d4e453435b525f484ee1694a5453b3c3c5b9f5cb3782688ba545ab2b9a0bea7fbeebe4f49b0c71ffeb6a89423f8207ccb75f0611477439b2e6ebd5844feba4ce6761e3a6962e8b9a242189509386751eb718a7ea75cf654b9fd857bcf2ec9eceda84c4065855d89505f26736f1f0eecf74ba57cd425e085db6637248c3f5c8fc71dca4b63df19e3a4ab3c10a36a513e7b97f7a9607ff0636b3cfd4947f3eb0fecfacc471429c73db449a26a59fbe30b0fb9563c6a1290b9ddbbda7606ff827dcfe74caaaafb96d76fec78eee0dca9a5b6afe80633aefac2f60716f6b8d4ebb954562ab2779a2f071df6cefec1074806f964d3b8f671174cd9d0f17ce7995d5dfeb831a5f24190696473753bb73dfc845bbd239cdc0fcc3fe677d9cf33dcb2b727fc26376ff72dafde5893b3c974a9fc5163966c5cbda8d595be11db086b1b09dd985e2563ccf5c3061f2050e6794f4f5d33bb39b9e2e47b7fe76123ef54180ab1f66f9cea73a9cc15da969c83981f21cc40a1e7b91cb62bdc20345b5199bdf5f52fecdf7c609eebeeaa7ac229bf6e59b2d385b211f506a862b4bde23a8cd98c30030081d4e9c9d09e566433157f3be51bf50f9d79cdbedad4be371dba29412005ac7917c6884980b625e7b031b519e19f81aafed7cc7142c5ec64f82e83c249d9fd937e70da5f4efeda69ab76549a6cb70b5f45f8900b3d300212a09b9267697bc55a8c7911e4dcc1ca793586f49fa6f06ac2bb2c8172b6f7dcc93f39e3b2f48a69f76c133428c6672b14bd1be25ddf5c290a832a86f68a4f60f81cbd7b31433ddbdaadf8fb2cf6b0855cafb4e6c01e2cacdded4957666ed97ec3be670f9e7b4a78efc118fd64dbea0b43ff1b6620ca9a006d4fce05b31cc3e5a8bbd71840734a66538e827a4c00021da9096fddb4f51bd9377b264f09612a9f4ca46a7ef5f8c70f46f1730037a2a36da999a0096ce22d5299f7ea577fac87e9998ac88781d3513907f45c90b07b2f4391ff6f9ffceb216b17035becac37beba6de589dd41d5710548b43db966c9c722393800c52dc81833017403c682edb7cbd0e40003ffa7e758fa972d392d813da8041d2186001666f09fa73c3ef30a5ddf75c1aeefed5831c5576fd08646857f75e1eb118a6a84a5b1e7d740e4bdf1ce1148cd4ee29d10a1a1f6ad7cb2eae7f52d675ee69f5fd3b66d90623b0f9f34f1fee29c3cca6eb10a74537a1a56b700251bfe8746c1df1390df1ea0b968ab881de90907bfb27555cf8e4cfdc423bf89e8f5ed2d1716f6a7ed0271522f687bfaef10fd920b5dc31bebfb2ec4730b41a7c5765ab407d4f60adb0e8bfa05c81bd86e4efdfd975ff97ad5a160cc5b876a26ce72bd32e62601cf701cd98aad0c7e98851b14f49045c616377cc9bfe693df11a2b14e18fb8bfcb215977ef3dfee2dcaf000386b19b5ad723ec6b653a2296ecd28fa5680999a28da6bcd43cfe61c9a2fac7a92b4642b7d1d233753c87b130a6723615998790ac2ff53bc10ecfe00fb868fa9f39c3c3292848a398982ef3e315eee2c45f0c171df50b790e2edf4d3a06715adcc82ed08d0fd010878d3939070db950df65bb25bf230446d64c6c8e1f4341d27970f552a3a4ee7826406393cbd5a331a6dd22b003d60b13b7cfc97b2d81d3e24056f7aca79f001bc8986f43929bc8966e0480878e3135f2c55f0fb4cb82778c8acb29dba522a05a9144809782047055103858ca23d7ddfd97e75b280a94b606add543bc3a179c5762af61d8be6e8ed6d1979b9e2b3fe19a5b45bb25bf3eff71ed53f0457449195b106333581541fd3f5a2c3f866ba9c9f71b996f03e4a361d9db826f8948cf37e1b4646c61abc8f24f14e4bba0d7e94c549d57f2875f0a1c42fb72a9ebdcfbc6a0fd869833a5025c8f10639d143d28eddd1de3645c6877ecef660b3d36521cef7011d4d498fab1121d0c7ece918f3822a331190a44085f406beca946e634c0076b78fa98f708ba25f2847f0a14ceb01aa089b2a6e4519fc483397f6b2da3b6e98ea21d5a19ffe1669cc863c8c2a3a655992144169c8de00d18f75290805bb3720782587991429f85d60cab5e51d28e39ab0082a8dd92f227a25e06471bc3f9a5182d7f2d8dffb98ba04727c845b53b9411a33653df9f7d8ac09b757ce43ec6aa0b6685d19c5bee9a39dbd5d1d539fc04c8cd0b008bfa2217b8148a43e53648e59475b9faaaa23081e051a420b5bd02edb3b5571c0bedbcd349313bdf345e1791bcf3b43e67797fdf496633ad25145d898fe2bd0db80ea210be715edb26897620f58f0fb8d9a0d782727901323055f1116c982ac935d0e6119115b13b52d3593401ed69ccec22af8a0be42b66f9aa2fba8698a7e48a5604e296ae0768f34668fd9a92d23220100fa3c49fb3bef7edb61afc2d7e15b50d3375734a9a8b9a2174966e7cb47c944d6502423260147d0072b4eb5b97c8bedb2331864bd44aa04539f287665ec7ff0cc5c999fd9558c92621971093842fee1c47cd36defb207edcc771391144c9d879950f4f0398b354db230f34cb18a8a65c426e008faa3e4dcc0b7df312798d932d6543b19b928d7495336f2811d2e19f1093882aea79a74fa6a54af4328668efe0e69cc5eefccb122193509e88fb6a56622e672449703a7152c28fa431a72d78a0cd6ba949f519980fee8c63135d85c13227f8670c1a09b7e451ea1a1e7d3e51ee90ec7a84f407f54313c959c85f5ce029d45ef292db380ffe07076a92c267b8c5d8c89898989898989898989898989898989f900f3bf081c36d20dc38ed70000000049454e44ae426082, 9000, 'Manual Cleaning is done by person only', 'Manual Cleaning is basic manual cleaning process where person not use any advanced equipment', 'Cleaning Time: 2-3 Hours', 'Manul Cleaning of all areas of the house inlcuding Bathroom, Kitchen, Living Room, Dining Room, Bedroom.', 'Manual Cleaning and cleaning of curtains, sofa set and chairs', 'Manual Cleaning of external surfaces, cabinets and removal of grease and oil stains.', 'Cleaning of floor, WC seat, sink, fittings and walls.', 'Cleaning of floor, windows, furniture and light fittings.', 'Cleaning Floor, grill work and windows.', 'Cleaning of doors, cupboards, handles and wardrobe exteriors.', 'Professional Grade cleaning solutions by Diversey.', 'Vimbar, colin,dettole,harpick', 'Sweeper,Cotton towel', 'Cleaning of Utensils in kitchen cleaning', 'Walls and ceiling washing', '', '', ''),
(4, 'Floor Scubbing', 0x89504e470d0a1a0a0000000d4948445200000060000000600806000000e29877380000000473424954080808087c086488000000097048597300001baf00001baf015e1a911c0000001974455874536f667477617265007777772e696e6b73636170652e6f72679bee3c1a0000027d49444154789cedddb16a146114c5f1737796318576829508ea8232baa86c6f2149155fc05608820882ef2142888528e97c02414d2a7b418d4c148c165616824214e2b8b3d756bbdc6f673dd999f3eb02b993e1fbef8470530c2022222222222222225d61d35ee0cdf6ceb949cfafc36c118e63008e36705f07d957005fe0b66993c9a30bc5a09ce662c901cab2ccabdec25d98df00904d731373ac36c3fdf1eef73ba3d1e877ca05920294659957fdfc09dc1653e6dbc736f27aef6a51145574b297f2e3aafea1551dfedf7ca9caf27b2993e12760ebddc7f3b5f96b24c66bb1da331f5e1a0cb62343e1431cf77c2565ae0332ab6d253a143e48735c89ce7448f86c523ec9c71366bae244742025c0e18499ae38121dd0ef72b2feac2e3cb8796d5fdff761edf13f5fbf78b9b5afb9cba32175ae297a02c814804c01c814804c01c814804c01c814804c01c8c2ff0f78f57ec76771236d71f1cce9d099ea092053003205209bd9363475cb382f5bd4a6e809205300320520530032052053003205205300320520d336b461da86ce1905205300b203b70d9d972d6a53f404902900990290290099029029009902902900990290691bda306d43e78c02902900596bb6a1ff7b8bda143d01640a40a600640a40a600640a40a600640a40a60064da86364cdbd0399310c07e367f1badb11b1d4808e09fe3331d61089f4d3c80dbb3f04c57389e4647c20132601dc0243ad701b567be1e1d0a07189e3df5168687d1b9f6f307d1770700897f05e5e35fb760be9932db4eb691d7d5ed94c9a400455154f9b85a86db1a803ae51a2d519b61b5fef16d39e5fd314093afb1725b32c3490716a6bde64166c09e3b3e01f6bc89d75889888888888888884877fc01114baff3728981560000000049454e44ae426082, 4000, 'Removal of stains and spots', 'Loosening of ground-in soils', 'Shampooing', 'Drying using vacuuming', '1-3 Hours', 'Servicemen: 1', 'Any hard/major stains may not immediately be removed', 'Wet vacuuming post shampooing for removing dirt.', 'Complete Cleaning of Floor', 'Cleaning of carpet', 'Professional grade cleaning solutions by Diversey.', 'Vacuum Cleaner', 'Hand Brushes', 'Wall Cleaning is not included', 'Window cleaning is not included', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carttbl`
--
ALTER TABLE `carttbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newuser`
--
ALTER TABLE `newuser`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `timg`
--
ALTER TABLE `timg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carttbl`
--
ALTER TABLE `carttbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newuser`
--
ALTER TABLE `newuser`
  MODIFY `userid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timg`
--
ALTER TABLE `timg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

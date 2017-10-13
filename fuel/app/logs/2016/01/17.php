<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

ERROR - 2016-01-17 02:05:12 --> Error - The requested view could not be found: welcome/index.php in /Library/WebServer/Documents/wisekeepr/site/fuel/core/classes/view.php on line 398
ERROR - 2016-01-17 19:33:37 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/model/user.php on line 4
ERROR - 2016-01-17 19:34:26 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/model/user.php on line 4
ERROR - 2016-01-17 19:37:21 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/model/user.php on line 4
ERROR - 2016-01-17 19:37:33 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/model/user.php on line 4
ERROR - 2016-01-17 19:38:05 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/model/user.php on line 4
ERROR - 2016-01-17 19:38:17 --> Fatal Error - Class 'Orm\Model' not found in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/model/user.php on line 4
ERROR - 2016-01-17 19:44:26 --> Runtime Notice - Non-static method IPAPI::communicate() should not be called statically in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/ip_api.php on line 11
ERROR - 2016-01-17 19:44:58 --> Fatal Error - Call to undefined function xcache_isset() in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/ip_api.php on line 21
ERROR - 2016-01-17 19:45:02 --> Fatal Error - Call to undefined function xcache_isset() in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/ip_api.php on line 21
ERROR - 2016-01-17 19:49:37 --> Notice - Undefined variable: Input in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/home.php on line 31
ERROR - 2016-01-17 19:53:19 --> Warning - Creating default object from empty value in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/home.php on line 31
ERROR - 2016-01-17 19:57:49 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'zip_path' cannot be null with query: "INSERT INTO `queue` (`id_user`, `url`, `date_time`, `processed`, `zip_path`) VALUES ('4', 'http://conversio.themetwins.com/', '2016-01-17 19:57:49', '0', null)" in /Library/WebServer/Documents/wisekeepr/site/fuel/core/classes/database/pdo/connection.php on line 272
ERROR - 2016-01-17 20:51:53 --> Warning - include_once(captchar/simple-php-captchar.php): failed to open stream: No such file or directory in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/captchar.php on line 13
ERROR - 2016-01-17 20:51:58 --> Warning - include_once(captchar/simple-php-captchar.php): failed to open stream: No such file or directory in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/captchar.php on line 13
ERROR - 2016-01-17 20:52:14 --> Warning - include(simple-php-captcha.php): failed to open stream: No such file or directory in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/captchar.php on line 24
ERROR - 2016-01-17 20:52:21 --> Warning - include_once(./captchar/simple-php-captcha.php): failed to open stream: No such file or directory in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/captchar.php on line 13
ERROR - 2016-01-17 20:52:23 --> Warning - include(simple-php-captcha.php): failed to open stream: No such file or directory in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/captchar.php on line 24
ERROR - 2016-01-17 20:52:54 --> Warning - include(simple-php-captcha.php): failed to open stream: No such file or directory in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/captchar.php on line 24
ERROR - 2016-01-17 20:53:37 --> Notice - Array to string conversion in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/captchar.php on line 24
ERROR - 2016-01-17 20:55:36 --> Notice - Array to string conversion in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/captchar.php on line 26
ERROR - 2016-01-17 20:57:20 --> Fatal Error - Call to undefined function imagettfbbox() in /Library/WebServer/Documents/wisekeepr/site/fuel/app/classes/controller/captcha/simple-php-captcha.php on line 140
ERROR - 2016-01-17 22:52:14 --> Fatal Error - Using $this when not in object context in /Library/WebServer/Documents/wisekeepr/site/fuel/app/tasks/sucker.php on line 44
ERROR - 2016-01-17 22:52:40 --> Fatal Error - Using $this when not in object context in /Library/WebServer/Documents/wisekeepr/site/fuel/app/tasks/sucker.php on line 44
ERROR - 2016-01-17 22:52:44 --> Fatal Error - Using $this when not in object context in /Library/WebServer/Documents/wisekeepr/site/fuel/app/tasks/sucker.php on line 44
ERROR - 2016-01-17 22:56:51 --> Fatal Error - Class 'Fuel\Tasks\Model_Queue' not found in /Library/WebServer/Documents/wisekeepr/site/fuel/app/tasks/sucker.php on line 48
ERROR - 2016-01-17 22:57:20 --> Fatal Error - Class 'Fuel\Tasks\Model_Queue' not found in /Library/WebServer/Documents/wisekeepr/site/fuel/app/tasks/sucker.php on line 48
ERROR - 2016-01-17 23:06:21 --> Fatal Error - Call to undefined method Fuel\Tasks\Sucker::Wget() in /Library/WebServer/Documents/wisekeepr/site/fuel/app/tasks/sucker.php on line 56
ERROR - 2016-01-17 23:06:48 --> Fatal Error - Class 'Fuel\Tasks\Sucker_Processor' not found in /Library/WebServer/Documents/wisekeepr/site/fuel/app/tasks/sucker.php on line 56
ERROR - 2016-01-17 23:14:46 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'email_sent' cannot be null with query: "INSERT INTO `queue` (`id_user`, `url`, `date_time`, `processed`, `email_sent`, `zip_path`) VALUES ('1', 'https://www.mozilla.org/pt-BR/about/', '2016-01-17 23:14:46', '0', null, null)" in /Library/WebServer/Documents/wisekeepr/site/fuel/core/classes/database/pdo/connection.php on line 272
ERROR - 2016-01-17 23:15:12 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'email_sent' cannot be null with query: "INSERT INTO `queue` (`id_user`, `url`, `date_time`, `processed`, `email_sent`, `zip_path`) VALUES ('1', 'https://www.mozilla.org/pt-BR/about/', '2016-01-17 23:15:12', '0', null, null)" in /Library/WebServer/Documents/wisekeepr/site/fuel/core/classes/database/pdo/connection.php on line 272
ERROR - 2016-01-17 23:16:45 --> Fatal Error - Class 'Thread' not found in /Library/WebServer/Documents/wisekeepr/site/fuel/app/tasks/sucker.thread.class.php on line 5
ERROR - 2016-01-17 23:17:00 --> Fatal Error - Class 'Thread' not found in /Library/WebServer/Documents/wisekeepr/site/fuel/app/tasks/sucker.thread.class.php on line 5
ERROR - 2016-01-17 23:17:03 --> Fatal Error - Class 'Thread' not found in /Library/WebServer/Documents/wisekeepr/site/fuel/app/tasks/sucker.thread.class.php on line 5

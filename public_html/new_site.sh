#!/bin/bash
TERM=linux
mysqlpass=`cat /etc/mysqlpass`
site_count=`mysql -u root -p$mysqlpass i -e "select count(site_id) from websites" -N | sed 's/ +//g' `
site_count=site_count+1
echo "This will be site" $site_count
if [ $(id -u) -eq 0 ]; then
	read -p "Enter new website name: " username
	#read -s -p "Enter password : " password
	egrep "^$username" /etc/passwd >/dev/null
	if [ $? -eq 0 ]; then
		echo "The website $username.doap.com already exists!"
		exit 1
	else
		pass=$(perl -e 'print crypt($ARGV[0], "password")' 'abc12345')
		useradd -m -p $pass $username
		mkdir /home/$username/public_html
		cp -rf /home/wordpress/public_html/* /home/$username/public_html
		#mysql -u root -p$mysqlpass i -e "INSERT INTO `websites` (`site_id`, `group_id`, `dev_id`, `skills_req`, `skills_r`, `short_name`, `company`, `Username`, `url`, `gurl`, `audience`, `Address`, `City`, `surrounding_cities`, `geo_placenames`, `zip_list`, `areacode_list`, `State`, `Zip`, `Phone`, `Fax`, `email`, `Territory_Manager`, `Website`, `About_us`, `keywords`, `map_link`, `Page_bg_color`, `Domain_name`, `Type`, `analytics_code`, `Logo`, `CMS`, `Cms_id`, `group`, `Pass`, `Dir_built`, `Welcome_sent`, `UserAcct`, `Creation_date`, `Last_login`, `session_id`, `status`, `customer_offer`, `grade`) VALUES (1000, 7, 1, '1', 0, 'Kohana PHP Framework', 'Doap.com', 'dave', 'http://dave.doap.com', 'thehvac.net', 'CMS''ers', 'Kilometre 9 Carretera Vieja Leon a la izquerda a rotulo "Puerta de Hierro" Casa 2 Mano izquerda, Nejapa', 'Managua', 'Granada, San Juan del Sur, Boaco', NULL, NULL, NULL, NULL, 0, '805-426-5216', NULL, 'dave@doap.com', 'David Menache', 'http://doap.com', 'This is an experimental site utilizing OO PHP.  Seems very hard to use.', 'cms, open source, kahana', 'http:.//maps.thehvac.net', '#ffffff', 'doap.com', 1, NULL, 'http://doap.com/images/d5.png', 'Kohana', 6, '', 'd', 'Yes', 'Yes', 'Yes', '0000-00-00 00:00:00', '2011-09-03 13:52:53', '', '1', '0', 80)" 
mysql -u root -p$mysqlpass i -e "update websites set Dir_built = 'Yes' where Username = '$username'"
		mysqladmin -u root -pfr1ck0ff create $username
		[ $? -eq 0 ] && echo "Web root folder, mysql database $username was deployed, and the user $username have all been added to system!" || echo "Failed to create the new website root folder!"
	fi
else
	echo "Only dave or bobby may add a website to the system with this script."
	exit 2
fi

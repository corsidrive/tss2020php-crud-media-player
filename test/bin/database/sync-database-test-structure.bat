mysqldump --no-data -u root --add-drop-table -pfiacca media_library > ./media_library_structure.sql

mysql -u root -pfiacca -e "drop database media_library_test" 
mysql -u root -pfiacca -e "create database media_library_test" 
mysql -u root -pfiacca media_library_test < ./media_library_structure.sql
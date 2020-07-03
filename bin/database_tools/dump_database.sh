echo "Note per il backup: ?"
read note
echo "Database ?"
read db
echo $db
echo $note
mkdir ./backup/
mysqldump -u root -pfiacca $db > "./backup/$(date +%Y-%m-%d-%H)-$db-backup.sql"
echo "$note" > ./backup/$(date +%Y-%m-%d-%H)-$db-backup.txt
ls ./backup/
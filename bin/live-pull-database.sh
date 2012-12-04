#! /bin/sh
set -x

# get directories specified by user in set-variables.sh
. set-variables.sh

# heroku live db pull
cd ..
heroku maintenance:on
cd "database-backup"
"$xampp_dir/mysql/bin/mysqldump.exe" --host $live_db_host --user $live_db_user --password=$live_db_password $live_db_name > $db_name.sql ;
cd ..
git status
"$bin_dir/ContinueOrExit.sh"
if [ "$?" == 1 ]; then
  cd database-backup
  git checkout HEAD $database_name.sql
  exit
fi
git add .
echo -n "write commit message: "
read message
git commit -m "$message"
# git push origin master
git push heroku master
heroku maintenance:off

# update local database
cd "database-backup"
"$xampp_dir/mysql/bin/mysql.exe" --user $local_db_user --password=$local_db_password $local_db_name -e ""show tables"" | grep -v Tables_in | grep -v ""+"" | gawk '{print ""drop table "" $1 "";""}' | "$xampp_dir/mysql/bin/mysql.exe" --user $local_db_user --password=$local_db_password $local_db_name ;
"$xampp_dir/mysql/bin/mysql.exe" --user $local_db_user --password=$local_db_password $local_db_name < $db_name.sql ;
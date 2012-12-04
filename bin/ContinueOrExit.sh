#!/bin/sh

# Usage:
#   ContinueOrExit 'command to run before exiting'
#   if [ "$?" == 1 ]; then
#     exit
#   fi

set +x
while true
do
echo -n "Continue? (y or n or command to run before): "
read CONFIRM
case $CONFIRM in
y|Y|YES|yes|Yes) break ;;
n|N|no|NO|No)
if [ "$#" -gt 0 ]; then
	$1
fi
echo Aborting - you entered $CONFIRM
exit 1
;;
*) $CONFIRM
echo.
echo Please enter y or n to continue/exit
esac
done
echo You entered $CONFIRM. Continuing ...
set -x
#!/bin/bash
#subscribe the broker localhost and the topic is iut/#
mosquitto_sub -h localhost -t iut/# -C 4 -v > /home/xzhao/Documents/sae23/data.txt
#upload the data into phpmyadmin
while read rows
	do
		echo $rows > /home/xzhao/Documents/sae23/data2.txt
	capteur=$(head -1 /home/xzhao/Documents/sae23/data2.txt | cut -d"/" -f3 | cut -d" " -f1)
	let valeur=`head -1 /home/xzhao/Documents/sae23/data2.txt | cut -d" " -f2`
	/home/xzhao/Documents/sae23/script_upload.sh $valeur $capteur
done < /home/xzhao/Documents/sae23/data.txt

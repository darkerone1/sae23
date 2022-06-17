#!/bin/bash
sleep 5s
#publish a value of temperature
mosquitto_pub -t iut/RT/E208_temperature -m $[$RANDOM%40]
#publish a value of CO2
mosquitto_pub -t iut/RT/E208_co2 -m $[$RANDOM%2000]
#publish a value of temperature
mosquitto_pub -t iut/informatique/D101_temperature -m $[$RANDOM%40]
#publish a value of CO2
mosquitto_pub -t iut/informatique/D101_co2 -m $[$RANDOM%2000]




#!/usr/bin/env python3
import LCD1602
import os
import time
import mysql.connector
LCD1602.init(0x27, 1)	# init(slave address, background light)

mydb = mysql.connector.connect(
  	host="localhost",
  	database="SiteTemperature_HT_EB"
)

mycursor = mydb.cursor()

def setup():
	global ds18b20
	for i in os.listdir('/sys/bus/w1/devices'):
		if i != 'w1_bus_master1':
			ds18b20 = '28-012037b92b12'

def readCelsius():
#	global ds18b20
	location = '/sys/bus/w1/devices/' + ds18b20 + '/w1_slave'
	tfile = open(location)
	text = tfile.read()
	tfile.close()
	secondline = text.split("\n")[1]
	temperaturedata = secondline.split(" ")[9]
	temperature = float(temperaturedata[2:])
	temperature = temperature / 1000
	return temperature

def readFahrenheit():
	temperature = readCelsius()
	temperature = (temperature * 1.8) + 32
	return temperature
setup()
while True:
    if readCelsius() != None:
        temperature = readCelsius()
        temperatureKelvin = temperature + 273.15
        temperatureFahren = (temperature * 1.8) + 32
        LCD1602.write(0, 0,"Celsius : %0.3f " % temperature)
        LCD1602.write(0,1,"Fahren : %0.3f" % temperatureFahren)
        print("Kelvin : %0.3f" % temperatureKelvin)
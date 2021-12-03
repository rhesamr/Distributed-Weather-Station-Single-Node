import os
import threading
import pymysql
import sys
import datetime
import Adafruit_DHT
from rainmeter import RainDeterminator


#function for reading data from sensor
def readSensor():

    global temperature
    global humidity
    
    humidity, temperature = Adafruit_DHT.read_retry(11, 17)

def readDateTime():
    
    global realDateTime

    realDateTime = datetime.datetime.now()
    

#function for sending data from sensor to sql
def sendDataToSQL():
    global temperature
    global humidity
    global realDateTime

    threading.Timer(600,sendDataToSQL).start()
    print("Sensing...")

    #read date and time
    readDateTime()
    print(realDateTime.strftime('%Y-%m-%d %H:%M:%S'))
    upDatetoSQL = realDateTime.strftime('%Y%m%d%H%M%S')

    #reading data from sensor using readSensor function
    readSensor()
    temperature = round(temperature,1)
    print(temperature," C")
    print(humidity," %")
    temp= "%.1f" %temperature
    hum ="%.1f" %humidity

    #reading data from rain sensor
    rainsts=RainDeterminator()
    print(rainsts)

    #connect to sql server
    comm = pymysql.connect(
        host = '127.0.0.1',
        port = 3306,
        user = 'admin',
        passwd = 'terserah',
        db = "WeatherData")
    cursor = comm.cursor()

    #send data to sql server
    sql = "INSERT INTO data (date, rainstatus, temperature, humidity) VALUES (%s, '%s', %s, %s);"%(upDatetoSQL, rainsts, temp, hum)
    cursor.execute(sql)
    comm.commit()

sendDataToSQL()

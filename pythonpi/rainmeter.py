import os
import time
import busio
import digitalio
import board
import adafruit_mcp3xxx.mcp3008 as MCP
from adafruit_mcp3xxx.analog_in import AnalogIn

# create the spi bus
spi = busio.SPI(clock=board.SCK, MISO=board.MISO, MOSI=board.MOSI)

# create the cs (chip select)
cs = digitalio.DigitalInOut(board.D22)

# create the mcp object
mcp = MCP.MCP3008(spi, cs)

def VCheck():
    global chan0
    # create an analog input channel on pin 0
    chan0 = AnalogIn(mcp, MCP.P0)

    #print('Raw ADC Value: ', chan0.value)
    #print('ADC Voltage: ' + str(chan0.voltage) + 'V')

#function for making data
def RainDeterminator():
    global chan0

    VCheck()

    if chan0.voltage >=3:
        raindata = "No Rain"
    elif (chan0.voltage >=1.5 and chan0.voltage <3):
        raindata = "Light Rain"
    else:
        rainfata = "Heavy Rain"

    return raindata

#print(RainDeterminator())


    

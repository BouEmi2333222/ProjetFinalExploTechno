#!/usr/bin/env python3
import LCD1602
import time
LCD1602.init(0x27, 1)	# init(slave address, background light)
stuff = 'Write Something'
LCD1602.write(0, 0, stuff)
while True:
    
    stuff = input()
    LCD1602.clear()
    LCD1602.write(0, 0, stuff)
    stuff = input()
    LCD1602.write(0, 1, stuff)
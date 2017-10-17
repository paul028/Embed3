import cv2
import numpy as np

cap = cv2.VideoCapture(0)

while(1):
    _, frame = cap.read()
    hsv = cv2.cvtColor(frame, cv2.COLOR_BGR2HSV)
    
    lower_red = np.array([160,150,20])
    upper_red = np.array([190,255,50])
    
    lower_blue = np.array([110,150,100])
    upper_blue = np.array([120,2250,255])

    lower_green = np.array([30,160,80])
    upper_green = np.array([60,220,160])
    
    mask1 = cv2.inRange(hsv, lower_red, upper_red)
    mask2 = cv2.inRange(hsv, lower_blue, upper_blue)
    mask3 = cv2.inRange(hsv, lower_green, upper_green)
    res1 = cv2.bitwise_and(frame,frame, mask= mask1)
    res2 = cv2.bitwise_and(frame,frame, mask= mask2)
    res3 = cv2.bitwise_and(frame,frame, mask= mask3)
    

        
    cv2.imshow('frame',frame)
    cv2.imshow('maskRED',mask1)
    cv2.imshow('red',res1)
    cv2.imshow('blue',res2)
    cv2.imshow('green',res3)
    
    k = cv2.waitKey(5) & 0xFF
    if k == 27:
        break

cv2.destroyAllWindows()
cap.release()

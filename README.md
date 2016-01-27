Project Title: Make-Me-Coffee:Cloud Enabling Coffee Maker. 
Project by : Ejike Amarachi and  Adeoye Oludotun




Hardware:1 Arduino
         1 Power Switch tail
         1 Arduino Ethernet Shield
         1 computer running Arduino IDE and Python
         1 coffee maker
         
Software appplication: Arduino IDE
                       Net Bean IDE  
                       Android Studio
					   
					   

Project Configuration and Structure:

Mobile Device: A mobile device(Android App) sends a signal to the cloud to trigger up an event in a webservice 
call(on/off). The occurence triggers in a on and off signal to the cloud system where the webservice is hosted on.


Cloud:Cloud host the webservice protocol,It provides effective communications with the hardware devices, it  ensures thats the service code is listening to signals from both mobile device 
and a Arduino web call.

Arduino Ethernet: This listens to a webservice call from the cloud through a modem and on the ON event, it triggers
 on the arduino to power on the coffee maker through power switch tail. This is achieved through the concept of Thread in which an event is running as a background service and its listening to a call from the webservice.

					   

         


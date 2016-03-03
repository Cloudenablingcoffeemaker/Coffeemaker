Project Title: Make-Me-Coffee:Cloud Enabling Coffee Maker. 
Project by : Ejike Amarachi and  Adeoye Oludotun(Dotmons)

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


Project

Motivation:
  Over a 100 million people drink coffee everyday and most people even take coffee more than once a day.
Apart from the addictive smell and delectable taste of coffee, it also has it health benefits which contribute to its high rate of consumption. 
Some people take coffee in the morning to kick start their day, some  to feel warm in the very cold weather condition, some  while at work, 
at the gym, while playing games, when watching movies, reading etc.  After a long stretched night, hard day’s work or even the cold weather etc
we just want to take a cup of coffee to calm our nerves. Since drinking coffee is somewhat part of our everyday’s life, imagine having your coffeemaker 
prepare you a cup of coffee while on your way back from work, gym etc by just sending an email or you set the coffeemaker to make you a cup of coffee at 
a preprogrammed time. It would be ideal because it would save time and energy. 

  This is possible in this present time of internet and cloud computing. The user sends a request to the coffeemaker in the form of an email which goes to
the cloud server, the cloud server receives the user’s request and sends it to  the coffeemaker for processing to give the required output.


					   

         


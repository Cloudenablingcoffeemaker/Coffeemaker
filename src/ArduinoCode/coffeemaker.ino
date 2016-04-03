#include <OneSheeld.h>
#define CUSTOM_SETTINGS
#define INCLUDE_GPS_SHIELD

boolean isInRange = false;

String datt;

//First you create a HTTPRequest object:
HttpRequest oneSheeldRequest("http://www.dotmons.com/coffeemaker/coffeemaker.php");

void setup() 
{
 //Start 1Sheeld 
pinMode(7, OUTPUT);
Serial.begin(9600);
pinMode(13, OUTPUT);
 OneSheeld.begin();
 /* Attach the function */
 oneSheeldRequest.setOnSuccess(&onSuccess);
}
void loop()
{
  float distance = GPS.getDistance(-104.5917069,50.4183685);
 /* Perform the GET request */
 Serial.println(distance); 
 Internet.performGet(oneSheeldRequest);

  if (datt=="81")
  {
    Terminal.println("Coffee maker start up!!!");
    digitalWrite(13, HIGH);
  }
  if ((distance >= 14110184.00) && ((distance < 14110189.00))) 
  {
     Serial.println("In Range ooo:");         
     digitalWrite(13, HIGH);
     delay(5000);
  } 
 /* Optional 1 second delay */
 delay(10000);
 digitalWrite(13, OFF);
}
//the function that will be called when the response comes back
void onSuccess(HttpResponse &response)
{
 /* You can handle the response here using functions from the 1Sheeld library
    Print out the data on the terminal using the 1Sheeld's terminal shield. */
 datt = response.getBytes();
 Terminal.println(datt);
 /* Ask for the next 64 bytes. */
 response.getNextBytes();
}





#Sends a txt message to a phone number

from twilio.rest import TwilioRestClient

# put your own credentials here
ACCOUNT_SID = "AC8fdb536a495615a4abdd3806b0944c88"
AUTH_TOKEN = "d968b61f779c2344175b1b295a685911"
client = TwilioRestClient(ACCOUNT_SID, AUTH_TOKEN)
client.messages.create(
  to="+14697662098",
  from_="+14692759500",
  body="This is Todd on Twilio!",
  media_url="https://climacons.herokuapp.com/clear.png",
)

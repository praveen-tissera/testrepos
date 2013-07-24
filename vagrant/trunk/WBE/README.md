# Web Booking Engin Virtual Machine

The following steps will illustrate how to setup a dev environment of Web Booking Engin for PHP under a Vagrant VM on your local machine. 

## Step 1: ##

Checkout WBE SVN from: (select current release branch)
https://aumeldevdb01.intrepidtravel.local:8443/svn/IntrepidTravel/Peak_WebEngine/branches/

Check it out under folder name 'C:\Development\project\WBE'


## Step 2: ##

Checkout PeakWeb project:
https://aumeldevdb01.intrepidtravel.local:8443/svn/IntrepidTravel/PeakWeb
  
Check it out under folder name 'C:\Development\PeakWeb'

## Step 3: ##

Then go to tools folder C:\Development\projects\PeakWeb\tools.
deleat all the folders and checkout new source from git
https://github.com/peak-adventure-travel/tools.git

## Step 4: ##

Copy the Vagrantfile from this folder and paste it to 'C:\Development\virtual_machines\wbe' directory path (or whereever you wish to run your vagrant info from)

## Step 5: ##

Open command prompt in windows and go to the location specified in Step 4, then fire up vagrant using command 'vagrant up'

This will create a virtual machine with the WBE runtime environment.(This will take a while to create VM – also puppet provisioning can take forever for first install so be patient)

## Step 6: ##

When Step 5 is finished (you'll know everything is provisioned when it returns to command prompt), open putty and log into your new VM with IP 10.0.0.10 – Username: vagrant and Password: vagrant

## Step 7: ##

In your Putty terminal, go to '/opt/projects/peak_WebEngine' 
Enter sudo su -
Go to cd libraries/toolsAndAPI/
Execute php GenerateCountryDataForBookingEngine.php -b1 -r1


## Step 8: ##

When you finish Step 7, update your hosts file in your machine which is located in ‘C:\Windows\System32\drivers\etc’ in Windows, or /etc/hosts for Mac and add a new entry:

   10.0.0.10 bookings.intrepidtravel.dev
   10.0.0.10 bookings.geckosadventures.dev
   10.0.0.10 bookings.peregrineadventures.dev
   10.0.0.10 bookings.exodus.dev
   10.0.0.10 bookings.adventuretours.dev
   10.0.0.10 bookings.adventurecompany.dev

Then save the file.

**NB:** You may have to run notepad as administrator to be sure you have permission to edit the file.

Open your browser and go to:

	http://bookings.peakadventuretravel.dev/en_AU/booking_engine/addDeparture/1176348
	
## Step 9: ##	
### How to test a booking ###
Go to http://www.intrepidtravel.com/trips/ttsn/availability
When you hover over any book button, right click and copy the link location - the link will be looking something like this:https://bookings.intrepidtravel.com/booking_engine/?action=add&id=1176348
Now paste the url you you copied and change the domain https://bookings.intrepidtravel.com to  http://bookings.intrepidtravel.dev 
Final testing URL will look like this:  http://bookings.intrepidtravel.dev/booking_engine/?action=add&id=1176348


If it loads you are good to go!



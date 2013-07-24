# PHP: Setup Developer Environment (Holodeck) #

The following steps will illustrate how to setup a dev environment of Holodeck for PHP under a Vagrant VM on your local machine. This allows full editing of the web booking engine environment locally.

## Step 1: ##

Checkout Holodeck SVN from:
https://aumeldevdb01.intrepidtravel.local:8443/svn/IntrepidTravel/PeakWeb/projects/Holodeck/branches/13.06.05

Check it out under folder name 'C:\Development\project\Holodeck'

## Step 2: ##

Download and install following vagrant and virtual box from following URLs:

- VirtualBox 4.2.8 from  https://www.virtualbox.org/wiki/Download_Old_Builds_4_2 
- Vagrant 1.0.6 from http://downloads.vagrantup.com/tags/v1.0.6
- Putty as SSH client from http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html

**NB:** The version of VirtualBox is quite important as the VM toolset requires the right version of guest addition tools to get networking functional. The version of putty and vagrant is not so significant (but for best results get 1.0.6)

## Step 3: ##

Checkout PeakWeb project from:
https://aumeldevdb01.intrepidtravel.local:8443/svn/IntrepidTravel/PeakWeb
  
Check it out under folder name 'C:\Development\PeakWeb'

## Step 4: ##

Copy the Vagrantfile from this folder and paste it to 'C:\Development\VMs\Holodeck' directory path (or whereever you wish to run your vagrant info from)

## Step 5: ##

Open command prompt in windows and go to the location specified in Step 4, then fire up vagrant using command 'vagrant up'

This will create a virtual machine with the Holodeck runtime environment.(This will take a while to create VM – also puppet provisioning can take forever for first install so be patient)

## Step 6: ##

When Step 5 is finished (you'll know everything is provisioned when it returns to command prompt), open putty and log into your new VM with IP 10.0.0.12 – Username: vagrant and Password: vagrant

## Step 7: ##

In your Putty terminal, go to '/opt/projects/Holodeck' and run 'composer - -dev install'

* Note – above command may not be successful - it may output a Runtime Exception with issue in SVN credentials and/or a missing certificate.  In such cases please follow the below steps, which will save your SVN credentials and accept the certificate. 
* If so, run the following:
  *	'svn list *address*' where *address* is the URL the cert is failing upon
  * Accept cert permanently with ‘p’
  * Enter your LDAP username and password (SVN username and password) and allow storing it unencrypted.
  * Then rerun the composer command specified in Step 7

## Step 8: ##

When you finish Step 7, update your hosts file in your machine which is located in ‘C:\Windows\System32\drivers\etc’ in Windows, or /etc/hosts for Mac and add a new entry:

	10.0.0.12 bookings.peakadventuretravel.dev

Then save the file.

**NB:** You may have to run notepad as administrator to be sure you have permission to edit the file.

Open your browser and go to:

	http://bookings.peakadventuretravel.dev/en_AU/booking_engine/addDeparture/1176348

If it loads you are good to go!

edited..............






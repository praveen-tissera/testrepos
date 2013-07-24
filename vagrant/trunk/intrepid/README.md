# Intrepid Travel Virtual Machine

This *sample* vagrant file sets out the the way that the virtual machine should be built.

Note that the files in here are the basis of your virtual machine, they are not to be used as-is as most machines
require some form of adjustment for operating system or machine differences.

## Installation Instructions

Note that these install instructions assume that you are running under windows. If you aren't, you will need to make
adjustments to your Vagrantfile and follow different instructiosn for installing the tools but this has been tested
on both Mac and Linux ( Ubuntu ) and works.

 - Ensure that you are either on the PEAK network or able to connect to it via the VPN
 - Ensure that you can correctly resolve the following hostnames:
  - aumeldevcms02.intrepidtravel.local
  - aumeldevcms02
  - aumeldevdb01.intrepidtravel.local
  - aumeldevdb01.intrepidtravel
  - aumeluatapp01.intrepidtravel.local
  - aumeluatapp01
 - Ensure that you have Subversion for windows installed ( TortoiseSVN is fine )
 - Ensure that you have putty for windows installed to allow SSH access
 - Ensure that you have Virtualbox for windows installed
 - Ensure that you have installed *vagrant* following the instructions on [VagrantUp](http://www.vagrantup.com/)
 - Ensure you have the following directory and file structure setup
    C:\Development
        PeakWeb ( SVN Checkout of https://aumeldevdb01.intrepidtravel.local:8443/svn/IntrepidTravel/PeakWeb )
        projects
            intrepidtravel.local
                trunk ( SVN Checkout of https://aumeldevdb01.intrepidtravel.local:8443/svn/IntrepidTravel/Web/trunk )
        virtual_machines
            intrepidtravel
 - Copy the sample Vagrantfile in this directory into C:\Development\virtual_machines\intrepidtravel
 - Edit the copied file and ensure that directory specifications defined at the top of the file point to correct
   locations
 - Open a dos command prompt ( Start -> Run -> cmd.exe )
 - Navigate to your virtual machine directory ( cd C:\Development\virtual_machines\intrepidtravel )
 - Start up your virtual machine with the command ( vagrant up ). If you see any errors in the output logs then you
   will not have a working virtual machine
 - SSH into your new virtual machine ( check the IP defined in the Vagrantfile ) with the username 'vagrant' and the
   password 'vagrant'
 - Prime up the virtual machine svn command with a saved password and accepted security certificate by running
   ( svn list https://aumeldevdb01.intrepidtravel.local:8443/svn/IntrepidTravel )
 - Start a data sync with the command ( drush @vm pull-data ). Note that this will take some time to complete
   as it is remote synchronising the static assets and setting up the drupal database based off the user acceptance
   testing server in Melbourne.

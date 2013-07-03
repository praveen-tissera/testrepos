# Exodus Drupal 7 Virtual Machine

This *sample* vagrant file sets out the the way that the virtual machine should be built.

Note that the files in here are the basis of your virtual machine, they are not to be used as-is as most machines
require some form of adjustment for operating system or machine differences. Copy the Vagrantfile.dist file 
to a local path and make any requirements to your copy. The only change that should be required is to modify
the dirPuppet value at the top of the Vagrantfile.

## Installation Instructions

Note that these install instructions assume that you are running under windows. If you aren't, you will need to make
adjustments to your Vagrantfile and follow different instructiosn for installing the tools but this has been tested
on both Mac and Linux ( Ubuntu ) and works.

 - Ensure that you are either on the PEAK network or able to connect to it via the VPN
 - Add the following entry to your local hosts file
  - 10.0.0.14 exodus.dev
 - Move a copy of Vagrantfile.dist to a path outside the SVN checkout as Vagrantfile.
  - Modify dirPuppet to correspond to wherever the puppet SVN files have been checked out.
 - From the directory that a copy of the Vagrantfile was checked out run "vagrant up".
 
This will build a basic running VM. Because of permissions requirements which aren't supported by Virtual Box shared
folders, the following manual steps need to be completed from within the VM.

<<<<<<< HEAD
 - cd /opt/projects/exodus/trunk
 - svn checkout https://aumeldevdb01.intrepidtravel.local:8443/svn/IntrepidTravel/PeakWeb/projects/exodus/trunk/drupal .
 - drush upwd --password=vagrant admin
 - composer --dev install
 - chmod u+x sites/all/modules/peak/peak_import/regenwsdl.sh
 - chown -R :apache sites/default/files && chmod -R 775 sites/default/files
 - drush -y en peak_product
 - drush vset theme_default exodus
 - drush -y en admin_menu
=======
 - cd /opt/projects/
 - git clone https://<username>@github.com/peak-adventure-travel/exodus-d7.git
    - e.g. git clone https://anthony-malkoun@github.com/peak-adventure-travel/exodus-d7.git
 - cd /opt/projects/exodus-d7/drupal
 - drush upwd --password=vagrant admin
 - composer --dev install
 - chmod u+x sites/all/modules/peak/peak_import/regenwsdl.sh
 - drush dl brightcove
 - chmod -R 777 sites/default/files/
 - drush -y en peak_product
 - drush vset theme_default exodus
 - drush -y en admin_menu exodus_general
>>>>>>> 7c356c1798d2a3a2587beacb6ab98bc5f57f55b5
 - drush -y dis toolbar shortcut
 - drush -y features-revert peak_product
 - su -c 'rpm -Uvh http://dl.fedoraproject.org/pub/epel/6/x86_64/beanstalkd-1.4.6-2.el6.x86_64.rpm'
 - su -c 'yum install beanstalkd --enablerepo=epel-testing'
 
At this point there should be a working base Drupal install. The next step is to grab reference data from Starship and 
then import your first product. The following commands are run from a browser.

 - http://www.exodus.dev/peak_import/peak_references
 - http://www.exodus.dev/peak_import/peak_products?id=57407
<<<<<<< HEAD

 In case you need to re-activate peak_product module, uninstall all modules first:
 - drush dis -y peak_banner peak_departure_importer peak_departure_node peak_destination peak_destination_fields peak_booking_utils peak_event peak_fixed_price peak_localization_iso_country peak_link peak_location peak_queue_adapter peak_references_views peak_region peak_tracking peak_ua_departure
- drush dis peak_product -y
=======
>>>>>>> 7c356c1798d2a3a2587beacb6ab98bc5f57f55b5

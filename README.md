# wisekeepr
This is a automated website service used to download full locally working website copies. It uses the wget linux terminal command to download all files recursively. It will also send an email to the user once his download has finished.

It was built on top of FuelPHP framework. There is a main task which should be configured to automatically run every 5 minutes in the cron job's list of the server. Everytime this task is run it will process the queue in database of the next websites to be downloaded. It does not have any restrictions, so be adviced that heavy websites may be downloaded, consuming a big bandwith and filespace of the server.

Any ideias or suggestions are welcome.

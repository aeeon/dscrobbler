# Deezer scrobbler for last.fm
This project was created for the purpose of manual scrobbling albums through Deezer streaming service. The standard Deezer last.fm scrobbler has problems with artist name, especially this is the case with classical music, when many tracks have different performers. To solve this problem I writed this app that allows edit artist name for the whole album before scrobbling  it.

How it works:
- this app uses deezer and last.fm session keys in order to work. You need working deezer and last.fm account. Deezer session key is obtained automatically and it's stored in the browser, last.fm session key is obtained in semi-automatic way and is stored in the file. Last.fm session key should be put in configuration file config/services.yaml. Your last.fm username and subcriber parameter should be also changed there. 
- Look at the video below in order to receive instruction
 
WARNING:
- vendor files for Lastfm and Deezer API that I use in my project needed some minor editing, because they lacked proper functionality. So if you want this app to work, DONT use composer to install/update anything, instead download the whole app as it is. 
- you may need to delete files from var/cache/dev/* or change catalog permissions to 777
- the app was tested on PHP 8.2



https://github.com/aeeon/dscrobbler/assets/11815852/686686ab-ecc3-453e-8fd2-14ee78cde0bb


# curl -i -X POST -H "Content-Type: multipart/form-data" -d "title=value1&artist_id=1&genre_id=1" -F "filename=@01.mp3" http://localhost/tss2020php-crud-media-player/controller/song_add_controller.php



# curl -d "param1=value1&param2=value2" -X POST http://localhost/tss2020php-crud-media-player/test/post.test.php


#  curl -d "artist_name=sca con exec" -X POST http://localhost/tss2020php-crud-media-player/controller/artist_add_controller.php
# curl -d "artist_name=" -X POST http://localhost/tss2020php-crud-media-player/controller/artist_add_controller.php
# curl -d "artist_id=20&artist_name=ritenta" -X POST http://localhost/tss2020php-crud-media-player/controller/artist_edit_controller.php
# curl -d "artist_id=21&artist_name=ero il numero 4" -X POST http://localhost/tss2020php-crud-media-player/controller/artist_edit_controller.php

#  curl -i  -F "filename=@01.mp3"  -F "title=curl-04" -F "artist_id=1" -F "genre_id=1"  http://localhost/tss2020php-crud-media-player/test/post.test.php
#  curl -i  -F "filename=@01.mp3"  -F "title=curl-0last" -F "artist_id=15" -F "genre_id=8"  http://localhost/tss2020php-crud-media-player/controller/song_add_controller.php
#  curl -i  -F "filename=@01.mp3"  -F "title=curl-0last" -F "artist_id=15" -F "genre_id=8"  http://localhost/tss2020php-crud-media-player/controller/song_add_controller.php

curl  -F nome=paolo  http://localhost/tss2020php-crud-media-player/test/post.test.php 

drop table if exists Song;
drop table if exists Artist;
drop table if exists Genre;
drop table if exists Song;

create table if not exists Song (
    song_id int(11) not null auto_increment,
    filename varchar(255) not null,
    title varchar(255) not null,
    dataformat varchar(25) not null,
    track_number int(3),
    playtime_seconds float,
    
    album_id int(11) not null,
    genre_id int(11) not null,
    artist_id int(11) null, 
    primary key (song_id)
);

create table if not exists Album (
    album_id int(11) not null auto_increment primary key,
    name varchar(255) not null,
    year year(4),

    artist_id int(11) not null   
);

create table if not exists Genre
(
    genre_id int(11) not null auto_increment primary key,
    name varchar(20) not null,
    code int(3) not null
);

create table if not exists Artist
(
    artist_id int(11) not null auto_increment primary key,
    name varchar(255) not null
)





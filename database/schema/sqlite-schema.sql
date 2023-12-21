CREATE TABLE IF NOT EXISTS "migrations" ("id" integer primary key autoincrement not null, "migration" varchar not null, "batch" integer not null);
CREATE TABLE IF NOT EXISTS "users" ("id" integer primary key autoincrement not null, "name" varchar not null, "email" varchar not null, "email_verified_at" datetime, "password" varchar not null, "remember_token" varchar, "created_at" datetime, "updated_at" datetime);
CREATE UNIQUE INDEX "users_email_unique" on "users" ("email");
CREATE TABLE IF NOT EXISTS "password_reset_tokens" ("email" varchar not null, "token" varchar not null, "created_at" datetime, primary key ("email"));
CREATE TABLE IF NOT EXISTS "failed_jobs" ("id" integer primary key autoincrement not null, "uuid" varchar not null, "connection" text not null, "queue" text not null, "payload" text not null, "exception" text not null, "failed_at" datetime not null default CURRENT_TIMESTAMP);
CREATE UNIQUE INDEX "failed_jobs_uuid_unique" on "failed_jobs" ("uuid");
-- CREATE TABLE IF NOT EXISTS "personal_access_tokens" ("id" integer primary key autoincrement not null, "tokenable_type" varchar not null, "tokenable_id" integer not null, "name" varchar not null, "token" varchar not null, "abilities" text, "last_used_at" datetime, "expires_at" datetime, "created_at" datetime, "updated_at" datetime);
-- CREATE INDEX "personal_access_tokens_tokenable_type_tokenable_id_index" on "personal_access_tokens" ("tokenable_type", "tokenable_id");
-- CREATE UNIQUE INDEX "personal_access_tokens_token_unique" on "personal_access_tokens" ("token");
CREATE TABLE IF NOT EXISTS "people"(id serial not null, name varchar(255) not null, birthday date not null, nationality varchar(255) not null, imageReference varchar(255), biography varchar(255));
CREATE TABLE IF NOT EXISTS movies(id integer primary key, title varchar(255) not null, imageReference varchar(255) not null, duration Duration, releaseYear integer, descriptionShort varchar(255), descriptionLong varchar(255), rating float not null);
CREATE TABLE IF NOT EXISTS movieActorRelations(id serial primary key, actorId integer references "people"(id), movieId integer references movies(id));
CREATE TABLE IF NOT EXISTS producersMovieRelations(id serial primary key, movieId integer references movies(id), personId integer references "people"(id));
CREATE TABLE IF NOT EXISTS directorsMovieRelations(id serial primary key, movieId integer references movies(id), personId integer references "people"(id));
CREATE TABLE IF NOT EXISTS "comments" ("id" integer primary key autoincrement not null, "movieId" integer not null, "comment" varchar not null, "user" integer not null, "created_at" datetime, "updated_at" datetime);
INSERT INTO movies(title, imageReference, duration, releaseYear, descriptionShort, descriptionLong, rating)
VALUES ('The Dark Knight', 'movie-posters/dark_knight.jpg','2-34-0','2008','Im batman','The movie follows a superhero named batman', 5),
('Fight Club', 'movie-posters/fight_club.jpg','2-19-0',1999,'We fight in a club','This movie is about a club that fights', 4),
('Forrest Gump', 'movie-posters/forrest_gump.jpg','2-22-0',1994,'Forrest Gump runs a lot','This movie is about a man named Forrest Gump who runs a lot', 4),
('The Godfather','movie-posters/godfather.jpg','2-55-0',1972,'It is about a god who is a father','This movie is about a mafia where the leader is the godfather',5),
('The Godfather part 2','movie-posters/godfather2.jpg','3-22-0',1974,'It is about a god who is a father 2', 'This movie is about a mafia where the leader is the godfather the second time',3),
('Interstellar','movie-posters/interstellar.jpg','2-49-0',2014,'It is a space movie','When Earth becomes uninhabitable in the future, a farmer and ex-NASA pilot, Joseph Cooper, is tasked to pilot a spacecraft, along with a team of researchers, to find a new planet for humans.', 5),
('Pulp Fiction','movie-posters/pulp_fiction.jpg','2-34-0',1994,'It is a fiction about pulps','The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',3.5),
('Shawshank Redemption','movie-posters/shawshank_redemption.jpg','2-22-0',1994, 'It is a movie about jail','Over the course of several years, two convicts form a friendship, seeking consolation and, eventually, redemption through basic compassion.', 5);
INSERT INTO people(id,name, birthday, nationality, imageReference, biography) VALUES
(3,'Morgan Freeman', '01-06-1937', 'American','actor-pictures/Morgan_Freeman.jpg','With an authoritative voice and calm demeanor, this ever popular American actor has grown into one of the most respected figures in modern US cinema. Morgan was born on June 1, 1937 in Memphis, Tennessee, to Mayme Edna (Revere)'),
(4, 'Frank Darabont','28-01-1959', 'American', 'actor-pictures/Frank_Darabont.jpg','He is a director'),
(5, 'Niki Marvin','01-01-1963','English','actor-pictures/Niki_Marvin.jpg','She is an english film producer'),
(6,'Matthew McConaughey','4-11-1969','American','actor-pictures/Matthew_McConaughey.jpg','Matthew is an american actor');
INSERT INTO movieActorRelations(id,actorId, movieId) VALUES
(4,3, 10),
(6,6,8);
INSERT INTO directorsMovieRelations(id,personId, movieId) VALUES
(5,4, 10);
INSERT INTO producersMovieRelations(id,personId,movieId) VALUES
(6,5,10);
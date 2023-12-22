<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ActorMovieRelation;
use App\Models\DirectorsMovieRelation;
use App\Models\ProducersMovieRelation;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Person;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Movie::create([
            "title" => "The Dark Knight",
            "imageReference" => "movie-posters/dark_knight.jpg",
            "duration" => "2-34-0",
            "releaseYear" => 2008,
            "discriptionShort" => "Im batman",
            "discriptionLong" => "The movie follows a superhero named batman",
            "rating" => 5
        ]);
        Movie::create([
            "title" => "Fight Club",
            "imageReference" => "movie-posters/fight_club.jpg",
            "duration" => "2-19-0",
            "releaseYear" => 1999,
            "discriptionShort" => "We fight in a club",
            "discriptionLong" => "This movie is about a club that fights",
            "rating" => 4
        ]);
        Movie::create([
            "title" => "Forrest Gump",
            "imageReference" => "movie-posters/forrest_gump.jpg",
            "duration" => "2-22-0",
            "releaseYear" => 1994,
            "discriptionShort" => "Forrest Gump runs a lot",
            "discriptionLong" => "This movie is about a man named Forrest Gump who runs a lot",
            "rating" => 4
        ]);
        Movie::create([
            "title" => "The Godfather",
            "imageReference" => "movie-posters/godfather.jpg",
            "duration" => "2-55-0",
            "releaseYear" => 1972,
            "discriptionShort" => "It is about a god who is a father",
            "discriptionLong" => "This movie is about a mafia where the leader is the godfather",
            "rating" => 5
        ]);
        Movie::create([
            "title" => "The Godfather part 2",
            "imageReference" => "movie-posters/godfather2.jpg",
            "duration" => "3-22-0",
            "releaseYear" => 1974,
            "discriptionShort" => "It is about a god who is a father 2",
            "discriptionLong" => "This movie is about a mafia where the leader is the godfather the second time",
            "rating" => 3
        ]);
        Movie::create([
            "title" => "Interstellar",
            "imageReference" => "movie-posters/interstellar.jpg",
            "duration" => "2-49-0",
            "releaseYear" => 2014,
            "discriptionShort" => "It is a space movie",
            "discriptionLong" => "When Earth becomes uninhabitable in the future, a farmer and ex-NASA pilot, Joseph Cooper, is tasked to pilot a spacecraft, along with a team of researchers, to find a new planet for humans.",
            "rating" => 5
        ]);
        Movie::create([
            "title" => "Pulp Fiction",
            "imageReference" => "movie-posters/pulp_fiction.jpg",
            "duration" => "2-34-0",
            "releaseYear" => 1994,
            "discriptionShort" => "It is a fiction about pulps",
            "discriptionLong" => "The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.",
            "rating" => 3.5
        ]);
        Movie::create([
            "title" => "Shawshank Redemption",
            "imageReference" => "movie-posters/shawshank_redemption.jpg",
            "duration" => "2-22-0",
            "releaseYear" => 1994,
            "discriptionShort" => "It is a movie about jail",
            "discriptionLong" => "Over the course of several years, two convicts form a friendship, seeking consolation and, eventually, redemption through basic compassion.",
            "rating" => 5
        ]);

        Person::create([
            "name" => "Morgan Freeman",
            "birthday" => "01-06-1937",
            "nationality" => "American",
            "imageReference" => "actor-pictures/Morgan_Freeman.jpg",
            "biography" => "With an authoritative voice and calm demeanor, this ever popular American actor has grown into one of the most respected figures in modern US cinema. Morgan was born on June 1, 1937 in Memphis, Tennessee, to Mayme Edna (Revere)"
        ]);
        Person::create([
            "name" => "Frank Darabont",
            "birthday" => "28-01-1959",
            "nationality" => "American",
            "imageReference" => "actor-pictures/Frank_Darabont.jpg",
            "biography" => "He is a director"
        ]);
        Person::create([
            "name" => "Niki Marvin",
            "birthday" => "01-01-1963",
            "nationality" => "English",
            "imageReference" => "actor-pictures/Niki_Marvin.jpg",
            "biography" => "She is an english film producer"
        ]);
        Person::create([
            "name" => "Matthew McConaughey",
            "birthday" => "4-11-1969",
            "nationality" => "American",
            "imageReference" => "actor-pictures/Matthew_McConaughey.jpg",
            "biography" => "Matthew is an american actor"
        ]);

        ActorMovieRelation::create([
            "actorId" => 1,
            "movieId" => 1
        ]);
        ActorMovieRelation::create([
            "actorId" => 4,
            "movieId" => 6
        ]);
        DirectorsMovieRelation::create([
            "actorId" => 2,
            "movieId" => 7
        ]);
        ProducersMovieRelation::create([
            "actorId" => 3,
            "movieId" => 8
        ]);
    }
}

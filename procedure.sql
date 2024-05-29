DELIMITER //

CREATE PROCEDURE InsertMovie(
    IN movie_title VARCHAR(255),
    IN movie_director VARCHAR(255),
    IN release_year INT,
    IN movie_rating FLOAT,
    IN movie_comment VARCHAR(255),
    IN movie_url VARCHAR(255)
)
BEGIN
    INSERT INTO movies (title, director, release_year, rating, comment, url)
    VALUES (movie_title, movie_director, release_year, movie_rating, movie_comment, movie_url);
END //

DELIMITER ;

CREATE TABLE deleted_movies_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT NOT NULL,
    deleted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
DELIMITER $$
CREATE TRIGGER after_movie_deletion
AFTER DELETE ON movies
FOR EACH ROW
BEGIN
    INSERT INTO deleted_movies_log (movie_id) VALUES (OLD.id);
END$$
DELIMITER ;

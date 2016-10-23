CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` varchar(50) NOT NULL UNIQUE,
	`email` varchar(50) NOT NULL UNIQUE,
	`password` varchar(50) NOT NULL,
	`user_registered` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `image` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`url` varchar(255) NOT NULL UNIQUE,
	`uploaded_on` TIMESTAMP NOT NULL,
	`title` varchar(50) NOT NULL,
	`description` TEXT NOT NULL,
	`user_id` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `comment` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`timestamp` TIMESTAMP NOT NULL,
	`user_id` INT NOT NULL,
	`image_id` INT NOT NULL,
	`text` TEXT NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `image` ADD CONSTRAINT `image_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `comment` ADD CONSTRAINT `comment_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `comment` ADD CONSTRAINT `comment_fk1` FOREIGN KEY (`image_id`) REFERENCES `image`(`id`);

CREATE DATABASE focusFlow;

CREATE TABLE users (
    name varchar(255) not null,
    surname varchar(255) not null,
    email varchar(255) primary key,
    password varchar(255) not null,
    work_start time not null default "8:00",
    work_end time not null default "18:00",
    type varchar(255) not null default "worker"
);

CREATE TABLE tasks (
	ID_task int PRIMARY KEY AUTO_INCREMENT,
	user_email varchar(255) not null,
    FOREIGN KEY (user_email) REFERENCES users (email),
    task_date date not null,
    task_hour time not null,
    description varchar(255) not null
);

CREATE TABLE notes (
	ID_note int PRIMARY KEY AUTO_INCREMENT,
	user_email varchar(255) not null,
    FOREIGN KEY (user_email) REFERENCES users (email),
    description varchar(255) not null,
    title varchar(255) not null
);
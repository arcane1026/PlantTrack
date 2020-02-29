CREATE DATABASE IF NOT EXISTS plant_track;

USE plant_track;

CREATE TABLE businesses (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name				VARCHAR(255)	NOT NULL,
    street				VARCHAR(100)	NOT NULL,
    street2				VARCHAR(100),
    city				VARCHAR(30)		NOT NULL,
    state				VARCHAR(2)		NOT NULL,
    zip					VARCHAR(5)		NOT NULL,
    created				DATETIME,
    modified			DATETIME
);

CREATE TABLE users (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    business_id			INT 			UNSIGNED,
    username			VARCHAR(255)	NOT NULL,
    password			VARCHAR(255) 	NOT NULL,
    role				SMALLINT		UNSIGNED NOT NULL DEFAULT 0 COMMENT '0:Employee, 1:Manager, 2:Owner, 3:Site Admin',
    first_name			VARCHAR(30)		NOT NULL,
    last_name			VARCHAR(30)		NOT NULL,
    email				VARCHAR(50) 	NOT NULL,
    phone				VARCHAR(10)		NOT NULL,
    resource_path		VARCHAR(255),
    confirmed			BOOLEAN			NOT NULL DEFAULT 0,
    locked				BOOLEAN			NOT NULL DEFAULT 0,
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY business_key_users (business_id) REFERENCES businesses(id)
);

CREATE TABLE plants (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id				INT				UNSIGNED NOT NULL,
    business_id			INT 			UNSIGNED NOT NULL,
    name				VARCHAR(50)		NOT NULL,
    description			VARCHAR(100)	NOT NULL,
    resource_path		VARCHAR(255),
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY user_key_plants (user_id) REFERENCES users(id),
    FOREIGN KEY business_key_plants (business_id) REFERENCES businesses(id)
);

CREATE TABLE growth_profiles (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id				INT 			UNSIGNED NOT NULL,
    business_id			INT 			UNSIGNED NOT NULL,
    plant_id			INT 			UNSIGNED,
    name 				VARCHAR(30)		NOT NULL,
    description 		VARCHAR(100)	NOT NULL,
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY user_key_growth_profiles (user_id) REFERENCES users(id),
    FOREIGN KEY business_key_growth_profiles (business_id) REFERENCES businesses(id),
    FOREIGN KEY plant_key_growth_profiles (plant_id) REFERENCES plants(id)
);

CREATE TABLE stages (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    growth_profile_id	INT 			UNSIGNED NOT NULL,
    name 				VARCHAR(30)		NOT NULL,
    description 		VARCHAR(100)	NOT NULL,
    stage_order         INT             NOT NULL DEFAULT 0,
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY growth_profile_key_stages (growth_profile_id) REFERENCES growth_profiles(id)
);

CREATE TABLE steps (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    stage_id			INT 			UNSIGNED NOT NULL,
    name 	 	 		VARCHAR(30)		NOT NULL,
    description 		VARCHAR(100)	NOT NULL,
    duration			INT 			UNSIGNED NOT NULL COMMENT 'Duration of step in hours.',
    step_order          INT             NOT NULL DEFAULT 0,
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY stage_key_steps (stage_id) REFERENCES stages(id)
);

CREATE TABLE batches (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id				INT 			UNSIGNED NOT NULL,
    growth_profile_id	INT 			UNSIGNED NOT NULL,
    plant_id			INT 			UNSIGNED NOT NULL,
    business_id			INT 			UNSIGNED NOT NULL,
    step_id 			INT 			UNSIGNED,
    name 	 	 		VARCHAR(30)		NOT NULL,
    description 		VARCHAR(100)	NOT NULL,
    quantity			INT 			UNSIGNED NOT NULL,
    yield               DOUBLE          UNSIGNED,
    plant_date			DATETIME,
    harvest_date		DATETIME,
    watched				BOOLEAN			NOT NULL DEFAULT 0,
    testing_status		SMALLINT		UNSIGNED NOT NULL DEFAULT 0 COMMENT '0:Unsent, 1:Sent, 2:Passed, 3:Failed',
    testing_date        DATETIME,
    resource_path		VARCHAR(255),
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY user_key_batches (user_id) REFERENCES users(id),
    FOREIGN KEY growth_profile_key_batches (growth_profile_id) REFERENCES growth_profiles(id),
    FOREIGN KEY plant_key_batches (plant_id) REFERENCES plants(id),
    FOREIGN KEY step_key_batches (step_id) REFERENCES steps(id),
    FOREIGN KEY business_key_batches (business_id) REFERENCES businesses(id)
);

CREATE TABLE readings (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    step_id 			INT 			UNSIGNED NOT NULL,
    batch_id 			INT 			UNSIGNED NOT NULL,
    name 	 	 		VARCHAR(50)		NOT NULL,
    value 		 		VARCHAR(100)	NOT NULL,
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY step_key_readings (step_id) REFERENCES steps(id),
    FOREIGN KEY batch_key_readings (batch_id) REFERENCES batches(id)
);

CREATE TABLE notes (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id 			INT 			UNSIGNED NOT NULL,
    step_id 			INT 			UNSIGNED NOT NULL,
    batch_id 			INT 			UNSIGNED NOT NULL,
    body 		 		TEXT			NOT NULL,
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY user_key_notes (user_id) REFERENCES users(id),
    FOREIGN KEY step_key_notes (step_id) REFERENCES steps(id),
    FOREIGN KEY batch_key_notes (batch_id) REFERENCES batches(id)
);

CREATE TABLE reports (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id 			INT 			UNSIGNED NOT NULL,
    batch_id 			INT 			UNSIGNED NOT NULL,
    name 	 	 		VARCHAR(30)		NOT NULL,
    description 		VARCHAR(100)	NOT NULL,
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY user_key_reports (user_id) REFERENCES users(id),
    FOREIGN KEY batch_key_reports (batch_id) REFERENCES batches(id)
);

CREATE TABLE access_log (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username 	 		VARCHAR(255)	NOT NULL,
    password     		VARCHAR(255)	,
    ip_address          VARCHAR(30)     ,
    result              BOOLEAN         NOT NULL DEFAULT 0 COMMENT '0: Failure, 1: Success',
    created             DATETIME
);

CREATE TABLE employee_invites (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name			VARCHAR(30)		NOT NULL,
    last_name			VARCHAR(30)		NOT NULL,
    email				VARCHAR(50) 	NOT NULL,
    phone				VARCHAR(10)		NOT NULL,
    business_id         INT             NOT NULL,
    created				DATETIME,
    modified			DATETIME
);

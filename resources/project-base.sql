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
    business_id			INT 			UNSIGNED NOT NULL,
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
    FOREIGN KEY business_key (business_id) REFERENCES businesses(id)
);

CREATE TABLE plants (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id				INT				UNSIGNED NOT NULL,
    name				VARCHAR(50)		NOT NULL,
    description			VARCHAR(100)	NOT NULL,
    resource_path		VARCHAR(255),
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY user_key (user_id) REFERENCES users(id)
);

CREATE TABLE growth_profiles (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id				INT 			UNSIGNED NOT NULL,
    plant_id			INT 			UNSIGNED,
    name 				VARCHAR(30)		NOT NULL,
    description 		VARCHAR(100)	NOT NULL,
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY user_key (user_id) REFERENCES users(id),
    FOREIGN KEY plant_key (plant_id) REFERENCES plants(id)
);

CREATE TABLE stages (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    growth_profile_id	INT 			UNSIGNED NOT NULL,
    name 				VARCHAR(30)		NOT NULL,
    description 		VARCHAR(100)	NOT NULL,
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY growth_profile_key (growth_profile_id) REFERENCES growth_profiles(id)
);

CREATE TABLE steps (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    stage_id			INT 			UNSIGNED NOT NULL,
    name 	 	 		VARCHAR(30)		NOT NULL,
    description 		VARCHAR(100)	NOT NULL,
    duration			INT 			UNSIGNED NOT NULL COMMENT 'Duration of step in days.',
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY stage_key (stage_id) REFERENCES stages(id)
);

CREATE TABLE batches (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id				INT 			UNSIGNED NOT NULL,
    growth_profile_id	INT 			UNSIGNED NOT NULL,
    plant_id			INT 			UNSIGNED NOT NULL,
    name 	 	 		VARCHAR(30)		NOT NULL,
    description 		VARCHAR(100)	NOT NULL,
    quantity			INT 			UNSIGNED NOT NULL,
    plant_date			DATETIME,
    harvest_date		DATETIME,
    watched				BOOLEAN			NOT NULL DEFAULT 0,
    testing_status		SMALLINT		UNSIGNED NOT NULL DEFAULT 0 COMMENT '0:Unsent, 1:Sent, 2:Passed, 3:Failed',
    resource_path		VARCHAR(255),
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY user_key (user_id) REFERENCES users(id),
    FOREIGN KEY growth_profile_key (growth_profile_id) REFERENCES growth_profiles(id),
    FOREIGN KEY plant_key (plant_id) REFERENCES plants(id)
);

# RENAMED FROM step_values
CREATE TABLE readings (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    step_id 			INT 			UNSIGNED NOT NULL,
    batch_id 			INT 			UNSIGNED NOT NULL,
    name 	 	 		VARCHAR(50)		NOT NULL,
    value 		 		VARCHAR(100)	NOT NULL,
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY step_key (step_id) REFERENCES steps(id),
    FOREIGN KEY batch_key (batch_id) REFERENCES batches(id)
);

# RENAMED FROM step_notes
CREATE TABLE notes (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id 			INT 			UNSIGNED NOT NULL,
    step_id 			INT 			UNSIGNED NOT NULL,
    batch_id 			INT 			UNSIGNED NOT NULL,
    body 		 		TEXT			NOT NULL,
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY user_key (user_id) REFERENCES users(id),
    FOREIGN KEY step_key (step_id) REFERENCES steps(id),
    FOREIGN KEY batch_key (batch_id) REFERENCES batches(id)
);

# REPORTS - INCOMPLETE TABLE - NEEDS MORE FIELDS TO STORE DATA
CREATE TABLE reports (
    id					INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id 			INT 			UNSIGNED NOT NULL,
    batch_id 			INT 			UNSIGNED NOT NULL,
    name 	 	 		VARCHAR(30)		NOT NULL,
    description 		VARCHAR(100)	NOT NULL,
    created				DATETIME,
    modified			DATETIME,
    FOREIGN KEY user_key (user_id) REFERENCES users(id),
    FOREIGN KEY batch_key (batch_id) REFERENCES batches(id)
);
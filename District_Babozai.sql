CREATE DATABASE districtSwat;


CREATE TABLE DistrictTable (
    district_id INT AUTO_INCREMENT PRIMARY KEY,
    district_name VARCHAR(255) NOT NULL
);


CREATE TABLE TehsilTable (
    tehsil_id INT AUTO_INCREMENT PRIMARY KEY,
    tehsil_name VARCHAR(255) NOT NULL,
    district_id INT,
    FOREIGN KEY (district_id) REFERENCES DistrictTable(district_id)
);
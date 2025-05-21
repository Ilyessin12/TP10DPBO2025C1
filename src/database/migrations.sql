DROP DATABASE IF EXISTS anomaly_reports_system;
CREATE DATABASE anomaly_reports_system;
USE anomaly_reports_system;

CREATE TABLE locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    district VARCHAR(50), 
    description TEXT
);

CREATE TABLE phenomena_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(255) NOT NULL,
    reported_date DATE NOT NULL,
    location_id INT,
    description TEXT NOT NULL,
    reporter_alias VARCHAR(50),
    severity_level ENUM('Low', 'Medium', 'High', 'Critical') DEFAULT 'Medium',
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE SET NULL
);

CREATE TABLE related_evidence (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_id INT NOT NULL,
    evidence_type VARCHAR(50) NOT NULL,
    description TEXT,
    collected_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (report_id) REFERENCES phenomena_reports(id) ON DELETE CASCADE -
);

INSERT INTO locations (name, district, description) VALUES
('Radio Kaikan Building', 'Akihabara', 'Iconic electronics building, site of a crashed time machine and Future Gadget Lab relocation.'),
('Shibuya Crossing', 'Shibuya', 'Famous intersection, epicenter of New Generation Madness events and other psychic phenomena.'),
('Tanegashima Space Center', 'Tanegashima Island', 'JAXA facility, key location for Robotics;Notes club activities and Kimijima Reports.'),
('Inokashira Park', 'Kichijoji', 'Park near the Blue Light Cafe, frequented by occult enthusiasts and site of the mass disappearance.'),
;

INSERT INTO phenomena_reports (report_title, reported_date, location_id, description, reporter_alias, severity_level) VALUES
('Anomalous Satellite Crash & Dematerialization', '2010-07-28', 1, 'A satellite-like object crashed into the Radio Kaikan building. Object dematerialized shortly after impact. Time distortion reported.', 'KuriGohanAndKamehameha', 'Critical'),
('Return of the New Gen - Shibuya Psychic Incidents', '2015-09-07', 2, 'A series of bizarre deaths and psychic events mimicking the New Generation Madness, starting with a live streamer. Sumo stickers involved.', 'Hekiho Newspaper Club', 'Critical'),
('Project Atum - Unidentified Signal Burst & AR Malfunctions', '2019-08-21', 3, 'Massive electromagnetic pulse detected from Tanegashima, coinciding with reports of widespread AR system malfunctions and a localized ''solar flare''. Possible link to Kimijima Kou.', 'JAXA_InternalLeak', 'High')
;

INSERT INTO related_evidence (report_id, evidence_type, description, collected_date) VALUES
(1, 'Metal Fragment', 'Small, unidentifiable metallic piece found near crash site. Vanished before full analysis could be completed.', '2010-07-28 14:00:00'),
(1, 'Witness Testimony', 'Rintaro Okabe claims to have seen the object and its subsequent disappearance. Corroborated by Mayuri Shiina.', '2010-07-28 14:30:00'),
(2, 'Sumo Sticker (New Gen Variant)', 'A new variant of the Sumo Sticker found near the first victim. Different design from original New Gen.', '2015-09-07 10:00:00'),
(2, 'Video Footage', 'Live stream recording showing the victim moments before death. Contains distorted audio and visual glitches.', '2015-09-07 09:30:00'),
(3, 'Kimijima Report Fragment (Encrypted)', 'Encrypted data fragment recovered, referencing ''Project Atum'' and solar flare manipulation. Partial decryption suggests advanced EM weaponry.', '2019-08-21 18:00:00')
;
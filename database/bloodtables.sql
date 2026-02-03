CREATE TABLE Donor (
    DonorID INT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    DateOfBirth DATE,
    Gender CHAR(1),
    ContactNumber VARCHAR(15),
    Email VARCHAR(100),
    BloodType CHAR(3),
    HealthStatus VARCHAR(255),
    CHECK (Gender IN ('M', 'F'))  -- Only enforced from MySQL 8.0.16 onwards
);

INSERT INTO Donor VALUES
    (1, 'John', 'Doe', '1985-06-15', 'M', '1234567890', 'johndoe@example.com', 'O+', 'Healthy'),
    (2, 'Jane', 'Smith', '1990-04-22', 'F', '9876543210', 'janesmith@example.com', 'A-', 'Healthy'),
    (3, 'Robert', 'Brown', '1987-12-01', 'M', '5551234567', 'robert.brown@example.com', 'B+', 'No chronic issues'),
    (4, 'Emily', 'Davis', '1993-08-19', 'F', '5559876543', 'emily.davis@example.com', 'AB-', 'Allergies'),
    (5, 'Michael', 'Wilson', '1982-03-14', 'M', '5556781234', 'michael.wilson@example.com', 'O-', 'Healthy'),
    (6, 'Sarah', 'Taylor', '1995-07-30', 'F', '5554321567', 'sarah.taylor@example.com', 'A+', 'Asthma'),
    (7, 'David', 'Martinez', '1989-11-25', 'M', '5553219876', 'david.martinez@example.com', 'B-', 'No issues'),
    (8, 'Laura', 'Garcia', '1992-05-10', 'F', '5551237890', 'laura.garcia@example.com', 'AB+', 'Healthy'),
    (9, 'James', 'Miller', '1984-09-18', 'M', '5559873214', 'james.miller@example.com', 'O+', 'Healthy'),
    (10, 'Anna', 'Anderson', '1996-02-02', 'F', '5558765432', 'anna.anderson@example.com', 'A-', 'Healthy'),
    (11, 'Christopher', 'Hernandez', '1991-06-07', 'M', '5557654321', 'chris.hernandez@example.com', 'B+', 'Healthy'),
    (12, 'Olivia', 'Moore', '1988-10-12', 'F', '5552345678', 'olivia.moore@example.com', 'AB-', 'Migraines'),
    (13, 'Daniel', 'White', '1983-01-20', 'M', '5558761230', 'daniel.white@example.com', 'O-', 'Healthy'),
    (14, 'Sophia', 'Clark', '1994-04-17', 'F', '5554329871', 'sophia.clark@example.com', 'A+', 'No chronic issues'),
    (15, 'Matthew', 'Lee', '1986-09-05', 'M', '5556789123', 'matthew.lee@example.com', 'B-', 'Healthy'),
    (16, 'Grace', 'Hall', '1991-11-12', 'F', '5551236547', 'grace.hall@example.com', 'AB+', 'Seasonal Allergies'),
    (17, 'Henry', 'King', '1985-05-24', 'M', '5553456789', 'henry.king@example.com', 'A-', 'Occasional Migraines'),
    (18, 'Amelia', 'Scott', '1993-02-28', 'F', '5557891234', 'amelia.scott@example.com', 'O+', 'Healthy'),
    (19, 'Samuel', 'Green', '1987-07-11', 'M', '5556543219', 'samuel.green@example.com', 'B+', 'No chronic issues'),
    (20, 'Isabella', 'Young', '1994-03-16', 'F', '5558761298', 'isabella.young@example.com', 'AB-', 'Mild Asthma'),
    (21, 'Ethan', 'Baker', '1989-10-04', 'M', '5555432167', 'ethan.baker@example.com', 'O-', 'Healthy'),
    (22, 'Charlotte', 'Carter', '1992-01-19', 'F', '5553218765', 'charlotte.carter@example.com', 'A+', 'Allergic Rhinitis'),
    (23, 'Liam', 'Walker', '1988-12-08', 'M', '5552134567', 'liam.walker@example.com', 'B-', 'Healthy'),
    (24, 'Ava', 'Turner', '1986-08-23', 'F', '5556743210', 'ava.turner@example.com', 'AB+', 'Occasional Migraines'),
    (25, 'Mason', 'Collins', '1990-09-30', 'M', '5559087654', 'mason.collins@example.com', 'O+', 'Healthy'),
    (26, 'Harper', 'Edwards', '1995-04-01', 'F', '5554567890', 'harper.edwards@example.com', 'A-', 'Seasonal Allergies'),
    (27, 'Logan', 'Reed', '1983-06-12', 'M', '5559876541', 'logan.reed@example.com', 'B+', 'Healthy'),
    (28, 'Ella', 'Barnes', '1991-02-07', 'F', '5553219087', 'ella.barnes@example.com', 'AB-', 'Mild Asthma'),
    (29, 'Alexander', 'Murphy', '1988-05-15', 'M', '5554123657', 'alex.murphy@example.com', 'O-', 'Healthy'),
    (30, 'Mia', 'Rivera', '1996-11-03', 'F', '5552398761', 'mia.rivera@example.com', 'A+', 'Occasional Migraines');
-- Creating the Hospital Table
CREATE TABLE Hospital (
    HospitalID INT PRIMARY KEY,
    HospitalName VARCHAR(100),
    ContactNumber VARCHAR(15)
);

-- Inserting Values into the Hospital Table
INSERT INTO Hospital (HospitalID, HospitalName, ContactNumber) VALUES (1, 'City General Hospital', '1234000001');
INSERT INTO Hospital (HospitalID, HospitalName, ContactNumber) VALUES (2, 'River Valley Hospital', '1234000002');
INSERT INTO Hospital (HospitalID, HospitalName, ContactNumber) VALUES (3, 'Hillside Medical Center', '1234000003');
INSERT INTO Hospital (HospitalID, HospitalName, ContactNumber) VALUES (4, 'Downtown Health Clinic', '1234000004');
INSERT INTO Hospital (HospitalID, HospitalName, ContactNumber) VALUES (5, 'Lakeshore Hospital', '1234000005');
INSERT INTO Hospital (HospitalID, HospitalName, ContactNumber) VALUES (6, 'Mountain View Hospital', '1234000006');
INSERT INTO Hospital (HospitalID, HospitalName, ContactNumber) VALUES (7, 'Seaside Medical Center', '1234000007');
INSERT INTO Hospital (HospitalID, HospitalName, ContactNumber) VALUES (8, 'Greenfield Hospital', '1234000008');
INSERT INTO Hospital (HospitalID, HospitalName, ContactNumber) VALUES (9, 'Sunnyvale Hospital', '1234000009');
INSERT INTO Hospital (HospitalID, HospitalName, ContactNumber) VALUES (10, 'Metro City Hospital', '1234000010');
-- Creating the Recipient Table
CREATE TABLE Recipient (
    RecipientID INT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    Gender CHAR(1) CHECK (Gender IN ('M', 'F')),
    DateOfBirth DATE,
    BloodType CHAR(3),
    ContactNumber VARCHAR(15),
    HospitalID INT,
    FOREIGN KEY (HospitalID) REFERENCES Hospital(HospitalID)
);

-- Inserting Values into the Recipient Table
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (1, 'Alice', 'Brown', 'F', '1995-03-10', 'B+', '1234509876', 1);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (2, 'Bob', 'Johnson', 'M', '1980-07-22', 'A+', '5678901234', 2);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (3, 'Catherine', 'Wilson', 'F', '1987-12-10', 'O-', '9876543210', 1);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (4, 'David', 'Moore', 'M', '1992-11-05', 'AB+', '5553219876', 9);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (5, 'Eva', 'Miller', 'F', '1996-08-14', 'A-', '5559876543', 2);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (6, 'George', 'Taylor', 'M', '1990-04-10', 'B-', '5551237890', 4);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (7, 'Hannah', 'Garcia', 'F', '1989-06-02', 'AB-', '5558765432', 5);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (8, 'Ian', 'Hernandez', 'M', '1994-03-25', 'O+', '5554321567', 3);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (9, 'Jack', 'Martinez', 'M', '1982-01-15', 'A+', '5552345678', 4);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (10, 'Karen', 'Lee', 'F', '1993-11-22', 'B+', '5553219876', 7);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (11, 'Laura', 'Anderson', 'F', '1990-07-09', 'O-', '5554329871', 5);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (12, 'Mark', 'Davis', 'M', '1988-02-17', 'A+', '5556781234', 2);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (13, 'Nina', 'Clark', 'F', '1986-04-08', 'B-', '5558761230', 4);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (14, 'Oliver', 'White', 'M', '1995-05-13', 'AB+', '5557654321', 3);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (15, 'Paul', 'Brown', 'M', '1991-09-28', 'O+', '5558765432', 1);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (16, 'Quinn', 'Adams', 'F', '1992-12-01', 'B+', '5551234567', 6);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (17, 'Ryan', 'Baker', 'M', '1994-01-20', 'A-', '5556543210', 7);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (18, 'Sophia', 'Campbell', 'F', '1991-03-15', 'O+', '5552348765', 8);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (19, 'Thomas', 'Evans', 'M', '1989-10-23', 'AB-', '5556784321', 9);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (20, 'Uma', 'Foster', 'F', '1987-09-12', 'B-', '5559876543', 10);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (21, 'Victor', 'Green', 'M', '1993-06-18', 'A+', '5558761234', 1);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (22, 'Wendy', 'Hall', 'F', '1990-05-27', 'O-', '5554321987', 2);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (23, 'Xavier', 'Irving', 'M', '1988-07-04', 'B+', '5553216789', 3);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (24, 'Yvonne', 'Jackson', 'F', '1985-11-19', 'A-', '5558764321', 5);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (25, 'Zane', 'King', 'M', '1997-04-03', 'O+', '5555436789', 6);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (26, 'Alan', 'Lopez', 'M', '1984-03-29', 'AB+', '5553456789', 4);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (27, 'Bella', 'Morgan', 'F', '1996-02-08', 'B-', '5559871234', 2);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (28, 'Carlos', 'Nelson', 'M', '1990-12-24', 'A+', '5556547890', 10);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (29, 'Diana', 'Owens', 'F', '1993-10-13', 'O-', '5552345678', 5);
INSERT INTO Recipient (RecipientID, FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID) 
VALUES (30, 'Ethan', 'Perez', 'M', '1989-08-30', 'B+', '5559876543', 9);

-- Creating the Donation Table
CREATE TABLE Donation (
    DonationID INT PRIMARY KEY,
    DonorID INT,
    DateOfDonation DATE,
    Quantity INT,
    FOREIGN KEY (DonorID) REFERENCES Donor(DonorID)
);

INSERT INTO Donation VALUES (1, 1, STR_TO_DATE('2024-01-15', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (2, 2, STR_TO_DATE('2024-01-10', '%Y-%m-%d'), 500);
INSERT INTO Donation VALUES (3, 3, STR_TO_DATE('2024-01-05', '%Y-%m-%d'), 300);

INSERT INTO Donation VALUES (4, 7, STR_TO_DATE('2024-02-20', '%Y-%m-%d'), 400);
INSERT INTO Donation VALUES (5, 8, STR_TO_DATE('2024-02-18', '%Y-%m-%d'), 350);
INSERT INTO Donation VALUES (6, 12, STR_TO_DATE('2024-02-22', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (7, 13, STR_TO_DATE('2024-02-28', '%Y-%m-%d'), 500);
INSERT INTO Donation VALUES (8, 29, STR_TO_DATE('2024-02-09', '%Y-%m-%d'), 400);

INSERT INTO Donation VALUES (9, 23, STR_TO_DATE('2024-03-14', '%Y-%m-%d'), 300);
INSERT INTO Donation VALUES (10, 14, STR_TO_DATE('2024-03-05', '%Y-%m-%d'), 350);
INSERT INTO Donation VALUES (11, 15, STR_TO_DATE('2024-03-11', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (12, 24, STR_TO_DATE('2024-03-01', '%Y-%m-%d'), 400);
INSERT INTO Donation VALUES (13, 16, STR_TO_DATE('2024-03-10', '%Y-%m-%d'), 300);
INSERT INTO Donation VALUES (14, 18, STR_TO_DATE('2024-03-12', '%Y-%m-%d'), 500);
INSERT INTO Donation VALUES (15, 19, STR_TO_DATE('2024-03-15', '%Y-%m-%d'), 450);

INSERT INTO Donation VALUES (16, 11, STR_TO_DATE('2024-04-30', '%Y-%m-%d'), 400);
INSERT INTO Donation VALUES (17, 12, STR_TO_DATE('2024-04-10', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (18, 13, STR_TO_DATE('2024-04-15', '%Y-%m-%d'), 500);
INSERT INTO Donation VALUES (19, 17, STR_TO_DATE('2024-04-22', '%Y-%m-%d'), 350);

INSERT INTO Donation VALUES (20, 20, STR_TO_DATE('2024-05-05', '%Y-%m-%d'), 400);
INSERT INTO Donation VALUES (21, 22, STR_TO_DATE('2024-05-10', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (22, 27, STR_TO_DATE('2024-05-25', '%Y-%m-%d'), 350);
INSERT INTO Donation VALUES (23, 25, STR_TO_DATE('2024-05-10', '%Y-%m-%d'), 400);
INSERT INTO Donation VALUES (24, 30, STR_TO_DATE('2024-05-20', '%Y-%m-%d'), 300);

INSERT INTO Donation VALUES (25, 1, STR_TO_DATE('2024-06-01', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (26, 5, STR_TO_DATE('2024-06-05', '%Y-%m-%d'), 500);
INSERT INTO Donation VALUES (27, 13, STR_TO_DATE('2024-06-07', '%Y-%m-%d'), 400);
INSERT INTO Donation VALUES (28, 29, STR_TO_DATE('2024-06-09', '%Y-%m-%d'), 300);
INSERT INTO Donation VALUES (29, 8, STR_TO_DATE('2024-06-16', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (30, 28, STR_TO_DATE('2024-06-12', '%Y-%m-%d'), 400);
INSERT INTO Donation VALUES (31, 2, STR_TO_DATE('2024-06-17', '%Y-%m-%d'), 350);
INSERT INTO Donation VALUES (32, 4, STR_TO_DATE('2024-06-23', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (33, 6, STR_TO_DATE('2024-06-30', '%Y-%m-%d'), 500);

INSERT INTO Donation VALUES (34, 3, STR_TO_DATE('2024-07-15', '%Y-%m-%d'), 350);
INSERT INTO Donation VALUES (35, 23, STR_TO_DATE('2024-07-20', '%Y-%m-%d'), 400);
INSERT INTO Donation VALUES (36, 9, STR_TO_DATE('2024-07-12', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (37, 10, STR_TO_DATE('2024-07-15', '%Y-%m-%d'), 300);
INSERT INTO Donation VALUES (38, 16, STR_TO_DATE('2024-07-17', '%Y-%m-%d'), 350);
INSERT INTO Donation VALUES (39, 21, STR_TO_DATE('2024-07-01', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (40, 24, STR_TO_DATE('2024-07-04', '%Y-%m-%d'), 400);

INSERT INTO Donation VALUES (41, 11, STR_TO_DATE('2024-08-06', '%Y-%m-%d'), 500);
INSERT INTO Donation VALUES (42, 26, STR_TO_DATE('2024-08-08', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (43, 17, STR_TO_DATE('2024-08-09', '%Y-%m-%d'), 400);
INSERT INTO Donation VALUES (44, 30, STR_TO_DATE('2024-08-10', '%Y-%m-%d'), 500);
INSERT INTO Donation VALUES (45, 19, STR_TO_DATE('2024-08-11', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (46, 4, STR_TO_DATE('2024-08-22', '%Y-%m-%d'), 400);

INSERT INTO Donation VALUES (47, 25, STR_TO_DATE('2024-09-12', '%Y-%m-%d'), 350);
INSERT INTO Donation VALUES (48, 12, STR_TO_DATE('2024-09-14', '%Y-%m-%d'), 400);
INSERT INTO Donation VALUES (49, 27, STR_TO_DATE('2024-09-18', '%Y-%m-%d'), 300);

INSERT INTO Donation VALUES (50, 7, STR_TO_DATE('2024-10-11', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (51, 29, STR_TO_DATE('2024-10-17', '%Y-%m-%d'), 400);
INSERT INTO Donation VALUES (52, 8, STR_TO_DATE('2024-10-20', '%Y-%m-%d'), 500);
INSERT INTO Donation VALUES (53, 18, STR_TO_DATE('2024-10-22', '%Y-%m-%d'), 350);
INSERT INTO Donation VALUES (54, 14, STR_TO_DATE('2024-10-29', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (55, 15, STR_TO_DATE('2024-10-05', '%Y-%m-%d'), 400);

INSERT INTO Donation VALUES (56, 1, STR_TO_DATE('2024-11-01', '%Y-%m-%d'), 500);
INSERT INTO Donation VALUES (57, 10, STR_TO_DATE('2024-11-11', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (58, 20, STR_TO_DATE('2024-11-23', '%Y-%m-%d'), 400);

INSERT INTO Donation VALUES (59, 21, STR_TO_DATE('2024-12-12', '%Y-%m-%d'), 500);
INSERT INTO Donation VALUES (60, 2, STR_TO_DATE('2024-12-15', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (61, 19, STR_TO_DATE('2024-12-14', '%Y-%m-%d'), 400);
INSERT INTO Donation VALUES (62, 4, STR_TO_DATE('2024-12-18', '%Y-%m-%d'), 450);
INSERT INTO Donation VALUES (63, 5, STR_TO_DATE('2024-12-25', '%Y-%m-%d'), 350);
INSERT INTO Donation VALUES (64, 28, STR_TO_DATE('2024-12-01', '%Y-%m-%d'), 400);
INSERT INTO Donation VALUES (65, 30, STR_TO_DATE('2024-12-10', '%Y-%m-%d'), 450);

-- Creating the Blood Sample Table
CREATE TABLE BloodSample (
    SampleID INT PRIMARY KEY,
    DonationID INT,
    BloodType CHAR(3),
    RhFactor CHAR(1) CHECK (RhFactor IN ('+', '-')),
    StorageLocation VARCHAR(100),
    QuantityAvailable INT,
    ExpirationDate DATE,
    FOREIGN KEY (DonationID) REFERENCES Donation(DonationID)
);

INSERT INTO BloodSample VALUES (1, 1, 'O+', '+', 'Storage A1', 450, STR_TO_DATE('2024-02-26', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (2, 2, 'A-', '-', 'Storage B2', 500, STR_TO_DATE('2024-02-21', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (3, 3, 'B+', '+', 'Storage A3', 300, STR_TO_DATE('2024-02-16', '%Y-%m-%d'));

INSERT INTO BloodSample VALUES (4, 4, 'B-', '-', 'Storage C1', 400, STR_TO_DATE('2024-04-02', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (5, 5, 'AB+', '+', 'Storage A2', 350, STR_TO_DATE('2024-04-01', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (6, 6, 'AB-', '-', 'Storage B1', 450, STR_TO_DATE('2024-04-04', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (7, 7, 'O-', '-', 'Storage C2', 500, STR_TO_DATE('2024-04-10', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (8, 8, 'O-', '-', 'Storage A3', 400, STR_TO_DATE('2024-04-22', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (9, 9, 'B-', '-', 'Storage B3', 300, STR_TO_DATE('2024-04-25', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (10, 10, 'A+', '+', 'Storage C3', 350, STR_TO_DATE('2024-04-16', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (11, 11, 'B-', '-', 'Storage A2', 450, STR_TO_DATE('2024-04-22', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (12, 12, 'AB+', '+', 'Storage B2', 400, STR_TO_DATE('2024-04-12', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (13, 13, 'AB+', '+', 'Storage C1', 300, STR_TO_DATE('2024-04-21', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (14, 14, 'O+', '+', 'Storage A3', 500, STR_TO_DATE('2024-04-23', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (15, 15, 'B+', '+', 'Storage B1', 450, STR_TO_DATE('2024-04-26', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (16, 16, 'B+', '+', 'Storage C2', 400, STR_TO_DATE('2024-06-11', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (17, 17, 'AB-', '-', 'Storage A1', 450, STR_TO_DATE('2024-05-22', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (18, 18, 'O-', '-', 'Storage B3', 500, STR_TO_DATE('2024-05-27', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (19, 19, 'A-', '-', 'Storage C2', 350, STR_TO_DATE('2024-06-03', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (20, 20, 'AB-', '-', 'Storage A1', 400, STR_TO_DATE('2024-06-16', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (21, 21, 'A+', '+', 'Storage B2', 450, STR_TO_DATE('2024-06-21', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (22, 22, 'B+', '+', 'Storage C2', 350, STR_TO_DATE('2024-07-06', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (23, 23, 'O+', '+', 'Storage A3', 400, STR_TO_DATE('2024-06-21', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (24, 24, 'A+', '+', 'Storage B2', 300, STR_TO_DATE('2024-07-01', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (25, 25, 'O+', '+', 'Storage C3', 450, STR_TO_DATE('2024-07-13', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (26, 26, 'O-', '-', 'Storage A2', 500, STR_TO_DATE('2024-07-17', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (27, 27, 'O-', '-', 'Storage B3', 400, STR_TO_DATE('2024-07-19', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (28, 28, 'O-', '-', 'Storage C2', 300, STR_TO_DATE('2024-07-21', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (29, 29, 'AB+', '+', 'Storage A1', 450, STR_TO_DATE('2024-07-28', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (30, 30, 'AB-', '-', 'Storage B1', 400, STR_TO_DATE('2024-07-24', '%Y-%m-%d'));

INSERT INTO BloodSample VALUES (31, 31, 'A-', '-', 'Storage C2', 350, STR_TO_DATE('2024-07-29', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (32, 32, 'AB-', '-', 'Storage A3', 450, STR_TO_DATE('2024-08-04', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (33, 33, 'A+', '+', 'Storage B3', 500, STR_TO_DATE('2024-08-11', '%Y-%m-%d'));

INSERT INTO BloodSample VALUES (34, 34, 'B+', '+', 'Storage C1', 350, STR_TO_DATE('2024-08-26', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (35, 35, 'B-', '-', 'Storage A3', 400, STR_TO_DATE('2024-08-31', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (36, 36, 'O+', '+', 'Storage B1', 450, STR_TO_DATE('2024-08-23', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (37, 37, 'A-', '-', 'Storage C1', 300, STR_TO_DATE('2024-08-26', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (38, 38, 'AB+', '+', 'Storage A1', 350, STR_TO_DATE('2024-08-28', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (39, 39, 'O-', '-', 'Storage B1', 450, STR_TO_DATE('2024-08-12', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (40, 40, 'AB+', '+', 'Storage C3', 400, STR_TO_DATE('2024-08-15', '%Y-%m-%d'));

INSERT INTO BloodSample VALUES (41, 41, 'B+', '+', 'Storage C2', 500, STR_TO_DATE('2024-09-17', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (42, 42, 'A-', '-', 'Storage A1', 450, STR_TO_DATE('2024-09-19', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (43, 43, 'A-', '-', 'Storage B3', 400, STR_TO_DATE('2024-09-20', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (44, 44, 'A+', '+', 'Storage C3', 500, STR_TO_DATE('2024-09-21', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (45, 45, 'B+', '+', 'Storage A3', 450, STR_TO_DATE('2024-09-22', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (46, 46, 'AB-', '-', 'Storage B2', 400, STR_TO_DATE('2024-09-24', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (47, 47, 'O+', '+', 'Storage C3', 350, STR_TO_DATE('2024-10-24', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (48, 48, 'AB-', '-', 'Storage A3', 400, STR_TO_DATE('2024-10-26', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (49, 49, 'B+', '+', 'Storage B3', 300, STR_TO_DATE('2024-10-30', '%Y-%m-%d'));

INSERT INTO BloodSample VALUES (50, 50, 'B-', '-', 'Storage C3', 450, STR_TO_DATE('2024-11-22', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (51, 51, 'O-', '-', 'Storage C1', 400, STR_TO_DATE('2024-11-28', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (52, 52, 'AB+', '+', 'Storage A1', 500, STR_TO_DATE('2024-12-01', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (53, 53, 'O+', '+', 'Storage B1', 350, STR_TO_DATE('2024-12-03', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (54, 54, 'A+', '+', 'Storage C1', 450, STR_TO_DATE('2024-12-10', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (55, 55, 'B-', '-', 'Storage A3', 400, STR_TO_DATE('2024-11-16', '%Y-%m-%d'));

INSERT INTO BloodSample VALUES (56, 56, 'O+', '+', 'Storage B2', 500, STR_TO_DATE('2024-12-13', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (57, 57, 'A-', '-', 'Storage C2', 450, STR_TO_DATE('2024-12-23', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (58, 58, 'AB-', '-', 'Storage A2', 400, STR_TO_DATE('2025-01-04', '%Y-%m-%d'));

INSERT INTO BloodSample VALUES (59, 59, 'O-', '-', 'Storage B3', 500, STR_TO_DATE('2025-01-23', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (60, 60, 'A-', '-', 'Storage C2', 450, STR_TO_DATE('2025-01-26', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (61, 61, 'B+', '+', 'Storage C1', 400, STR_TO_DATE('2025-01-25', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (62, 62, 'AB-', '-', 'Storage A3', 450, STR_TO_DATE('2025-01-29', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (63, 63, 'O-', '-', 'Storage B2', 300, STR_TO_DATE('2025-01-26', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (64, 64, 'AB-', '-', 'Storage C2', 400, STR_TO_DATE('2025-01-12', '%Y-%m-%d'));
INSERT INTO BloodSample VALUES (65, 65, 'A+', '+', 'Storage A1', 450, STR_TO_DATE('2025-01-21', '%Y-%m-%d'));

-- Creating the Test Table
CREATE TABLE Test (
    TestID INT PRIMARY KEY,
    TestName VARCHAR(100),
    Description VARCHAR(255)
);

-- Inserting sample test data
INSERT INTO Test (TestID, TestName, Description) VALUES (1, 'HIV Test', 'Check for HIV');
INSERT INTO Test (TestID, TestName, Description) VALUES (2, 'Hepatitis Test', 'Check for Hepatitis');
INSERT INTO Test (TestID, TestName, Description) VALUES (3, 'Blood Sugar Test', 'Measure glucose levels in the blood');
INSERT INTO Test (TestID, TestName, Description) VALUES (4, 'Diabetes Test', 'Screen for or monitor diabetes');
INSERT INTO Test (TestID, TestName, Description) VALUES (5, 'Syphilis Test', 'Check for syphilis infection');
INSERT INTO Test (TestID, TestName, Description) VALUES (6, 'Malaria Test', 'Check for malaria parasites in the blood');
INSERT INTO Test (TestID, TestName, Description) VALUES (7, 'Chagas Disease Test', 'Check for Chagas disease infection');
INSERT INTO Test (TestID, TestName, Description) VALUES (8, 'West Nile Virus Test', 'Check for West Nile virus infection');
INSERT INTO Test (TestID, TestName, Description) VALUES (9, 'CMV (Cytomegalovirus) Test', 'Check for Cytomegalovirus infection');
INSERT INTO Test (TestID, TestName, Description) VALUES (10, 'Bacterial Contamination Test', 'Detect bacterial contamination in blood samples');

-- Creating the Blood Test Result Table
CREATE TABLE BloodTestResult (
    ResultID INT PRIMARY KEY,
    SampleID INT,
    TestID INT,
    TestDate DATE,
    ResultStatus ENUM('Pass', 'Fail', 'Pending'),
    Remarks VARCHAR(255),
    FOREIGN KEY (SampleID) REFERENCES BloodSample(SampleID),
    FOREIGN KEY (TestID) REFERENCES Test(TestID)
);

INSERT INTO BloodTestResult (ResultID, SampleID, TestID, TestDate, ResultStatus, Remarks) VALUES
(1, 1, 1, '2024-01-20', 'Pass', 'No issues'),
(2, 2, 2, '2024-01-15', 'Pass', 'No issues'),
(3, 3, 3, '2024-01-11', 'Pass', 'No issues'),
(4, 4, 5, '2024-02-25', 'Pass', 'No issues'),
(5, 5, 6, '2024-02-22', 'Pass', 'No issues'),
(6, 6, 8, '2024-02-26', 'Pass', 'No issues'),
(7, 7, 7, '2024-03-01', 'Pass', 'No issues'),
(8, 8, 9, '2024-02-13', 'Pass', 'No issues'),
(9, 9, 10, '2024-03-20', 'Fail', 'Bacterial Contamination found'),
(10, 10, 10, '2024-03-11', 'Pass', 'No bacterial contamination'),
(11, 11, 1, '2024-03-16', 'Pass', 'No issues'),
(12, 12, 2, '2024-03-06', 'Pass', 'Healthy'),
(13, 13, 3, '2024-03-15', 'Pass', 'No issues'),
(14, 14, 4, '2024-03-18', 'Pass', 'No issues'),
(15, 15, 5, '2024-03-20', 'Pass', 'No issues'),
(16, 16, 6, '2024-05-04', 'Pass', 'No issues'),
(17, 17, 7, '2024-04-15', 'Pass', 'No issues'),
(18, 18, 8, '2024-04-20', 'Pass', 'No issues'),
(19, 19, 9, '2024-04-28', 'Pass', 'No issues'),
(20, 20, 10, '2024-05-10', 'Pass', 'Safe for use'),
(21, 21, 1, '2024-05-15', 'Pass', 'Healthy'),
(22, 22, 4, '2024-05-29', 'Pass', 'No issues'),
(23, 23, 5, '2024-05-15', 'Pass', 'No issues'),
(24, 24, 6, '2024-05-24', 'Pass', 'No issues'),
(25, 25, 7, '2024-06-06', 'Pass', 'No issues'),
(26, 26, 8, '2024-06-10', 'Pass', 'No issues'),
(27, 27, 7, '2024-06-12', 'Pass', 'No issues'),
(28, 28, 8, '2024-06-14', 'Fail', 'West Nile detected'),
(29, 29, 10, '2024-06-21', 'Pass', 'No issues'),
(30, 30, 3, '2024-06-17', 'Pass', 'No issues'),
(31, 31, 3, '2024-06-22', 'Pass', 'No issues'),
(32, 32, 4, '2024-06-27', 'Fail', 'No issues'),
(33, 33, 2, '2024-07-05', 'Fail', 'Hepatitis Detected'),
(34, 34, 4, '2024-07-20', 'Pass', 'No issues'),
(35, 35, 5, '2024-07-25', 'Pass', 'No issues'),
(36, 36, 6, '2024-07-17', 'Pass', 'No issues'),
(37, 37, 7, '2024-07-29', 'Pass', 'No issues'),
(38, 38, 8, '2024-07-22', 'Fail', 'Virus Detected'),
(39, 39, 4, '2024-07-06', 'Pass', 'No issues'),
(40, 40, 10, '2024-07-04', 'Pass', 'No issues'),
(41, 41, 10, '2024-08-11', 'Pass', 'No issues'),
(42, 42, 1, '2024-08-12', 'Pass', 'No issues'),
(43, 43, 3, '2024-08-13', 'Pass', 'No issues'),
(44, 44, 5, '2024-08-16', 'Pass', 'No issues'),
(45, 45, 5, '2024-08-16', 'Fail', 'Syphilus Detected'),
(46, 46, 2, '2024-08-28', 'Pass', 'No issues'),
(47, 47, 2, '2024-09-17', 'Pass', 'No issues'),
(48, 48, 4, '2024-09-18', 'Pass', 'No issues'),
(49, 49, 3, '2024-09-22', 'Pass', 'No issues'),
(50, 50, 5, '2024-10-16', 'Pass', 'No issues'),
(51, 51, 1, '2024-10-22', 'Pass', 'No issues'),
(52, 52, 2, '2024-10-25', 'Pass', 'No issues'),
(53, 53, 3, '2024-10-27', 'Fail', 'Glucose level high'),
(54, 54, 4, '2024-11-03', 'Pass', 'No issues'),
(55, 55, 5, '2024-10-10', 'Pass', 'No issues'),
(56, 56, 9, '2024-11-05', 'Pass', 'No issues'),
(57, 57, 1, '2024-11-15', 'Pass', 'No issues'),
(58, 58, 2, '2024-11-27', 'Pass', 'No issues'),
(59, 59, 3, '2024-12-17', 'Pass', 'No issues'),
(60, 60, 4, '2024-12-20', 'Pending', 'Evaluation Pending'),
(61, 61, 5, '2024-12-19', 'Pass', 'No issues'),
(62, 62, 1, '2024-12-22', 'Pending', 'Sample evaluation pending'),
(63, 63, 2, '2024-12-20', 'Pass', 'No issues'),
(64, 64, 3, '2024-12-05', 'Pending', 'Medical review pending'),
(65, 65, 4, '2024-12-15', 'Pending', 'Under expert review');

CREATE TABLE Request (
    RequestID INT PRIMARY KEY,
    HospitalID INT,
    RecipientID INT,
    BloodType CHAR(3),
    QuantityRequested INT,
    DateOfRequest DATE,
    RequestStatus VARCHAR(50),
    RequestPriority VARCHAR(20),
    FOREIGN KEY (RecipientID) REFERENCES Recipient(RecipientID),
    FOREIGN KEY (HospitalID) REFERENCES Hospital(HospitalID),
    CHECK (RequestPriority IN ('Normal', 'Urgent', 'Critical'))
);

INSERT INTO Request (RequestID, HospitalID, RecipientID, BloodType, QuantityRequested, DateOfRequest, RequestStatus, RequestPriority) 
VALUES 
(1, 1, 5, 'A-', 450, '2024-01-25', 'Approved', 'Urgent'),
(2, 2, 10, 'B+', 400, '2024-01-30', 'Approved', 'Normal'),
(3, 3, 4, 'AB+', 400, '2024-01-07', 'Rejected', 'Normal'),
(4, 4, 3, 'O-', 450, '2024-02-23', 'Approved', 'Urgent'),
(5, 5, 11, 'O-', 400, '2024-02-28', 'Approved', 'Normal'),
(6, 6, 21, 'A+', 350, '2024-03-16', 'Approved', 'Critical'),
(7, 7, 13, 'B-', 450, '2024-03-22', 'Approved', 'Normal'),
(8, 8, 14, 'AB+', 300, '2024-03-25', 'Approved', 'Urgent'),
(9, 9, 15, 'O+', 500, '2024-03-30', 'Approved', 'Normal'),
(10, 10, 29, 'O-', 450, '2024-04-14', 'Approved', 'Critical'),
(11, 1, 30, 'B+', 300, '2024-04-15', 'Approved', 'Normal'),
(12, 2, 19, 'AB-', 400, '2024-04-16', 'Approved', 'Urgent'),
(13, 3, 2, 'A+', 350, '2024-05-17', 'Approved', 'Critical'),
(14, 4, 15, 'O+', 400, '2024-05-18', 'Approved', 'Normal'),
(15, 5, 27, 'B-', 400, '2024-05-19', 'Rejected', 'Urgent'),
(16, 6, 26, 'AB+', 400, '2024-05-20', 'Approved', 'Critical'),
(17, 7, 22, 'O-', 400, '2024-05-21', 'Rejected', 'Normal'),
(18, 8, 3, 'O-', 500, '2024-06-22', 'Approved', 'Urgent'),
(19, 9, 16, 'B+', 300, '2024-06-23', 'Rejected', 'Normal'),
(20, 10, 7, 'AB-', 400, '2024-06-24', 'Approved', 'Critical'),
(21, 1, 24, 'A-', 400, '2024-06-25', 'Approved', 'Urgent'),
(22, 2, 25, 'O+', 400, '2024-06-26', 'Approved', 'Normal'),
(23, 3, 6, 'B-', 400, '2024-06-27', 'Rejected', 'Critical'),
(24, 4, 4, 'AB+', 450, '2024-06-28', 'Approved', 'Urgent'),
(25, 5, 21, 'A+', 300, '2024-06-29', 'Approved', 'Normal'),
(26, 6, 25, 'O+', 400, '2024-07-22', 'Approved', 'Critical'),
(27, 7, 10, 'B+', 300, '2024-07-23', 'Approved', 'Urgent'),
(28, 8, 13, 'B-', 400, '2024-07-25', 'Approved', 'Normal'),
(29, 9, 14, 'AB+', 400, '2024-07-19', 'Approved', 'Critical'),
(30, 10, 12, 'A+', 350, '2024-08-12', 'Rejected', 'Urgent'),
(31, 1, 17, 'A-', 400, '2024-08-15', 'Approved', 'Normal'),
(32, 2, 9, 'A+', 400, '2024-08-16', 'Approved', 'Critical'),
(33, 3, 10, 'B+', 300, '2024-10-10', 'Approved', 'Urgent'),
(34, 4, 18, 'O+', 450, '2024-10-13', 'Approved', 'Normal'),
(35, 5, 7, 'AB-', 400, '2024-10-19', 'Approved', 'Critical'),
(36, 6, 19, 'AB-', 200, '2024-11-22', 'Approved', 'Urgent'),
(37, 7, 5, 'A-', 300, '2024-11-23', 'Rejected', 'Normal'),
(38, 8, 8, 'O+', 400, '2024-12-12', 'Approved', 'Critical'),
(39, 9, 6, 'B-', 400, '2024-12-13', 'Pending', 'Urgent'),
(40, 10, 14, 'AB+', 200, '2024-12-14', 'Approved', 'Normal'),
(41, 1, 12, 'A+', 400, '2024-12-15', 'Pending', 'Critical'),
(42, 2, 19, 'AB-', 300, '2024-12-16', 'Pending', 'Urgent'),
(43, 3, 22, 'O-', 300, '2024-12-17', 'Pending', 'Normal'),
(44, 4, 16, 'B+', 400, '2024-12-18', 'Approved', 'Critical'),
(45, 5, 24, 'A-', 500, '2024-12-19', 'Rejected', 'Normal'),
(46, 1, 7, 'AB-', 300, '2024-12-25', 'Pending', 'Critical'),
(47, 2, 26, 'AB+', 400, '2024-12-26', 'Pending', 'Urgent'),
(48, 3, 2, 'A+', 400, '2024-12-27', 'Pending', 'Normal'),
(49, 4, 13, 'B-', 300, '2024-12-28', 'Approved', 'Critical'),
(50, 5, 22, 'O-', 450, '2024-12-29', 'Approved', 'Critical');

-- Creating the Blood Transfusion Table
CREATE TABLE BloodTransfusion (
    TransfusionID INT PRIMARY KEY,
    RequestID INT,
    RecipientID INT,
    SampleID INT,
    DateOfTransfusion DATE,
    QuantityTransfused INT,
    FOREIGN KEY (RequestID) REFERENCES Request(RequestID),
    FOREIGN KEY (RecipientID) REFERENCES Recipient(RecipientID),
    FOREIGN KEY (SampleID) REFERENCES BloodSample(SampleID)
);

INSERT INTO BloodTransfusion VALUES (1, 1, 5, 2, '2024-01-26', 450);
INSERT INTO BloodTransfusion VALUES (2, 2, 10, 3, '2024-01-30', 400);

INSERT INTO BloodTransfusion VALUES (3, 4, 3, 7, '2024-02-24', 450);
INSERT INTO BloodTransfusion VALUES (4, 5, 11, 8, '2024-02-29', 400);

INSERT INTO BloodTransfusion VALUES (5, 6, 21, 10, '2024-03-20', 350);
INSERT INTO BloodTransfusion VALUES (6, 7, 13, 11, '2024-03-24', 450);
INSERT INTO BloodTransfusion VALUES (7, 8, 14, 13, '2024-03-25', 300);
INSERT INTO BloodTransfusion VALUES (8, 9, 15, 14, '2024-04-01', 500);

INSERT INTO BloodTransfusion VALUES (9, 10, 29, 18, '2024-04-16', 500);
INSERT INTO BloodTransfusion VALUES (10, 11, 30, 15, '2024-04-17', 450);
INSERT INTO BloodTransfusion VALUES (11, 12, 19, 17, '2024-04-18', 300);

INSERT INTO BloodTransfusion VALUES (12, 13, 2, 21, '2024-05-19', 400);
INSERT INTO BloodTransfusion VALUES (13, 14, 15, 23, '2024-05-19', 350);
INSERT INTO BloodTransfusion VALUES (14, 16, 26, 20, '2024-05-21', 400);

INSERT INTO BloodTransfusion VALUES (15, 18, 3, 26, '2024-06-23', 500);
INSERT INTO BloodTransfusion VALUES (16, 20, 7, 30, '2024-06-24', 400);
INSERT INTO BloodTransfusion VALUES (17, 21, 24, 31, '2024-06-26', 350);
INSERT INTO BloodTransfusion VALUES (18, 22, 25, 25, '2024-06-27', 400);
INSERT INTO BloodTransfusion VALUES (19, 24, 4, 29, '2024-06-29', 450);
INSERT INTO BloodTransfusion VALUES (20, 25, 21, 24, '2024-06-29', 300);

INSERT INTO BloodTransfusion VALUES (21, 26, 25, 27, '2024-07-20', 400);
INSERT INTO BloodTransfusion VALUES (22, 27, 10, 34, '2024-07-24', 300);
INSERT INTO BloodTransfusion VALUES (23, 28, 13, 35, '2024-07-26', 400);
INSERT INTO BloodTransfusion VALUES (24, 29, 14, 40, '2024-07-20', 400);

INSERT INTO BloodTransfusion VALUES (25, 31, 17, 37, '2024-08-20', 300);
INSERT INTO BloodTransfusion VALUES (26, 32, 9, 44, '2024-08-21', 400);

INSERT INTO BloodTransfusion VALUES (27, 33, 10, 49, '2024-10-10', 300);
INSERT INTO BloodTransfusion VALUES (28, 34, 18, 47, '2024-10-15', 400);
INSERT INTO BloodTransfusion VALUES (29, 35, 7, 48, '2024-10-22', 400);

INSERT INTO BloodTransfusion VALUES (30, 36, 19, 58, '2024-11-23', 200);
INSERT INTO BloodTransfusion VALUES (31, 38, 8, 56, '2024-12-12', 400);
INSERT INTO BloodTransfusion VALUES (32, 44, 16, 61, '2024-12-25', 400);
INSERT INTO BloodTransfusion VALUES (33, 49, 13, 63, '2024-12-29', 300);
INSERT INTO BloodTransfusion VALUES (34, 50, 22, 59, '2024-12-30', 450);
INSERT INTO BloodTransfusion VALUES (35, 40, 14, 58, '2024-12-16', 200);

CREATE TABLE Address (
    AddressID INT PRIMARY KEY,
    Street VARCHAR(100),
    Area VARCHAR(100),
    AreaCode VARCHAR(20),
    City VARCHAR(100),
    HospitalID INT,
    DonorID INT,
    RecipientID INT,
    FOREIGN KEY (HospitalID) REFERENCES Hospital(HospitalID),
    FOREIGN KEY (DonorID) REFERENCES Donor(DonorID),
    FOREIGN KEY (RecipientID) REFERENCES Recipient(RecipientID),
    CHECK (
        (HospitalID IS NOT NULL AND DonorID IS NULL AND RecipientID IS NULL) OR
        (HospitalID IS NULL AND DonorID IS NOT NULL AND RecipientID IS NULL) OR
        (HospitalID IS NULL AND DonorID IS NULL AND RecipientID IS NOT NULL)
    )
);

INSERT INTO Address VALUES (1, '123 Main St', 'Downtown', '10001', 'Metropolis', NULL, 1, NULL);
INSERT INTO Address VALUES (2, '456 Elm St', 'Uptown', '10002', 'Metropolis', NULL, 2, NULL);
INSERT INTO Address VALUES (3, '789 Pine St', 'Central Park', '10003', 'Metropolis', NULL, 3, NULL);
INSERT INTO Address VALUES (4, '101 Maple Ave', 'East Side', '10004', 'Metropolis', NULL, 4, NULL);
INSERT INTO Address VALUES (5, '202 Oak Dr', 'West Coast', '10005', 'Metropolis', NULL, 5, NULL);
INSERT INTO Address VALUES (6, '303 Cedar Ln', 'Downtown', '10001', 'Metropolis', NULL, 6, NULL);
INSERT INTO Address VALUES (7, '404 Birch Blvd', 'Uptown', '10002', 'Metropolis', NULL, 7, NULL);
INSERT INTO Address VALUES (8, '505 Spruce Ct', 'Central Park', '10003', 'Metropolis', NULL, 8, NULL);
INSERT INTO Address VALUES (9, '606 Willow Rd', 'East Side', '10004', 'Metropolis', NULL, 9, NULL);
INSERT INTO Address VALUES (10, '707 Aspen Way', 'West Coast', '10005', 'Metropolis', NULL, 10, NULL);
INSERT INTO Address VALUES (11, '808 Magnolia St', 'Downtown', '10001', 'Metropolis', NULL, 11, NULL);
INSERT INTO Address VALUES (12, '909 Redwood Ave', 'Uptown', '10002', 'Metropolis', NULL, 12, NULL);
INSERT INTO Address VALUES (13, '1010 Cypress Ln', 'Central Park', '10003', 'Metropolis', NULL, 13, NULL);
INSERT INTO Address VALUES (14, '1111 Sycamore Blvd', 'East Side', '10004', 'Metropolis', NULL, 14, NULL);
INSERT INTO Address VALUES (15, '1212 Palm Dr', 'West Coast', '10005', 'Metropolis', NULL, 15, NULL);
INSERT INTO Address VALUES (16, '2323 Birchwood Dr', 'Downtown', '10001', 'Metropolis', NULL, 16, NULL);
INSERT INTO Address VALUES (17, '3434 Pinehurst Rd', 'Uptown', '10002', 'Metropolis', NULL, 17, NULL);
INSERT INTO Address VALUES (18, '4545 Highland Blvd', 'Central Park', '10003', 'Metropolis', NULL, 18, NULL);
INSERT INTO Address VALUES (19, '5656 Laurel St', 'East Side', '10004', 'Metropolis', NULL, 19, NULL);
INSERT INTO Address VALUES (20, '6767 Sprucewood Rd', 'West Coast', '10005', 'Metropolis', NULL, 20, NULL);
INSERT INTO Address VALUES (21, '7878 Maple St', 'Downtown', '10001', 'Metropolis', NULL, 21, NULL);
INSERT INTO Address VALUES (22, '8989 Oakwood Dr', 'Uptown', '10002', 'Metropolis', NULL, 22, NULL);
INSERT INTO Address VALUES (23, '9090 Willow Ln', 'Central Park', '10003', 'Metropolis', NULL, 23, NULL);
INSERT INTO Address VALUES (24, '10101 Cedarwood Rd', 'East Side', '10004', 'Metropolis', NULL, 24, NULL);
INSERT INTO Address VALUES (25, '11212 Pine Rd', 'West Coast', '10005', 'Metropolis', NULL, 25, NULL);
INSERT INTO Address VALUES (26, '12312 Birch Dr', 'Downtown', '10001', 'Metropolis', NULL, 26, NULL);
INSERT INTO Address VALUES (27, '13413 Aspen Blvd', 'Uptown', '10002', 'Metropolis', NULL, 27, NULL);
INSERT INTO Address VALUES (28, '14514 Cedar Rd', 'Central Park', '10003', 'Metropolis', NULL, 28, NULL);
INSERT INTO Address VALUES (29, '15615 Magnolia Ave', 'East Side', '10004', 'Metropolis', NULL, 29, NULL);
INSERT INTO Address VALUES (30, '16716 Redwood Blvd', 'West Coast', '10005', 'Metropolis', NULL, 30, NULL);

INSERT INTO Address VALUES (31, '123 Main St', 'Downtown', '10001', 'Metropolis', 1, NULL, NULL);
INSERT INTO Address VALUES (32, '456 Elm St', 'Uptown', '10002', 'Metropolis', 2, NULL, NULL);
INSERT INTO Address VALUES (33, '789 Pine St', 'Central Park', '10003', 'Metropolis', 3, NULL, NULL);
INSERT INTO Address VALUES (34, '101 Maple Ave', 'East Side', '10004', 'Metropolis', 4, NULL, NULL);
INSERT INTO Address VALUES (35, '202 Oak Dr', 'West Coast', '10005', 'Metropolis', 5, NULL, NULL);
INSERT INTO Address VALUES (36, '303 Cedar Ln', 'Downtown', '10001', 'Metropolis', 6, NULL, NULL);
INSERT INTO Address VALUES (37, '404 Birch Blvd', 'Uptown', '10002', 'Metropolis', 7, NULL, NULL);
INSERT INTO Address VALUES (38, '505 Spruce Ct', 'Central Park', '10003', 'Metropolis', 8, NULL, NULL);
INSERT INTO Address VALUES (39, '606 Willow Rd', 'East Side', '10004', 'Metropolis', 9, NULL, NULL);
INSERT INTO Address VALUES (40, '707 Aspen Way', 'West Coast', '10005', 'Metropolis', 10, NULL, NULL);

INSERT INTO Address VALUES (41, '123 Oak St', 'Downtown', '10001', 'Metropolis', NULL, NULL, 1);
INSERT INTO Address VALUES (42, '456 Birch St', 'Uptown', '10002', 'Metropolis', NULL, NULL, 2);
INSERT INTO Address VALUES (43, '789 Maple St', 'Central Park', '10003', 'Metropolis', NULL, NULL, 3);
INSERT INTO Address VALUES (44, '101 Pine Ave', 'East Side', '10004', 'Metropolis', NULL, NULL, 4);
INSERT INTO Address VALUES (45, '202 Cedar Dr', 'West Coast', '10005', 'Metropolis', NULL, NULL, 5);
INSERT INTO Address VALUES (46, '303 Oak Blvd', 'Downtown', '10001', 'Metropolis', NULL, NULL, 6);
INSERT INTO Address VALUES (47, '404 Pine Ln', 'Uptown', '10002', 'Metropolis', NULL, NULL, 7);
INSERT INTO Address VALUES (48, '505 Cedar Ct', 'Central Park', '10003', 'Metropolis', NULL, NULL, 8);
INSERT INTO Address VALUES (49, '606 Maple Rd', 'East Side', '10004', 'Metropolis', NULL, NULL, 9);
INSERT INTO Address VALUES (50, '707 Birch Ave', 'West Coast', '10005', 'Metropolis', NULL, NULL, 10);
INSERT INTO Address VALUES (51, '808 Oak Rd', 'Downtown', '10001', 'Metropolis', NULL, NULL, 11);
INSERT INTO Address VALUES (52, '909 Pine Blvd', 'Uptown', '10002', 'Metropolis', NULL, NULL, 12);
INSERT INTO Address VALUES (53, '1010 Cedar St', 'Central Park', '10003', 'Metropolis', NULL, NULL, 13);
INSERT INTO Address VALUES (54, '1111 Maple Dr', 'East Side', '10004', 'Metropolis', NULL, NULL, 14);
INSERT INTO Address VALUES (55, '1212 Birch Blvd', 'West Coast', '10005', 'Metropolis', NULL, NULL, 15);
INSERT INTO Address VALUES (56, '2323 Pine Dr', 'Downtown', '10001', 'Metropolis', NULL, NULL, 16);
INSERT INTO Address VALUES (57, '3434 Cedar Blvd', 'Uptown', '10002', 'Metropolis', NULL, NULL, 17);
INSERT INTO Address VALUES (58, '4545 Oak St', 'Central Park', '10003', 'Metropolis', NULL, NULL, 18);
INSERT INTO Address VALUES (59, '5656 Birch Rd', 'East Side', '10004', 'Metropolis', NULL, NULL, 19);
INSERT INTO Address VALUES (60, '6767 Pine Blvd', 'West Coast', '10005', 'Metropolis', NULL, NULL, 20);
INSERT INTO Address VALUES (61, '7878 Cedar Ln', 'Downtown', '10001', 'Metropolis', NULL, NULL, 21);
INSERT INTO Address VALUES (62, '8989 Oak Rd', 'Uptown', '10002', 'Metropolis', NULL, NULL, 22);
INSERT INTO Address VALUES (63, '9090 Maple Blvd', 'Central Park', '10003', 'Metropolis', NULL, NULL, 23);
INSERT INTO Address VALUES (64, '10101 Pine Ave', 'East Side', '10004', 'Metropolis', NULL, NULL, 24);
INSERT INTO Address VALUES (65, '11212 Birch St', 'West Coast', '10005', 'Metropolis', NULL, NULL, 25);
INSERT INTO Address VALUES (66, '12312 Oak Rd', 'Downtown', '10001', 'Metropolis', NULL, NULL, 26);
INSERT INTO Address VALUES (67, '13413 Cedar Dr', 'Uptown', '10002', 'Metropolis', NULL, NULL, 27);
INSERT INTO Address VALUES (68, '14514 Pine St', 'Central Park', '10003', 'Metropolis', NULL, NULL, 28);
INSERT INTO Address VALUES (69, '15615 Birch Ln', 'East Side', '10004', 'Metropolis', NULL, NULL, 29);
INSERT INTO Address VALUES (70, '16716 Oak Dr', 'West Coast', '10005', 'Metropolis', NULL, NULL, 30);



-- This SQL script is a conversion of the provided Prisma schema, specifically adapted for MariaDB/MySQL.
-- It includes database creation, tables with appropriate types, and uses native features for automatic timestamp updates.

-- 1. Database Creation (run this command separately in your terminal or a DB tool)
-- Connect to your MariaDB/MySQL instance and run this first.
CREATE DATABASE IF NOT EXISTS `note` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- After creating the database, connect to it before running the rest of the script.
-- In the command line client, you would use: USE note;

-- 2. Create the User table
-- Note: We use CHAR(36) for UUIDs and the native `ON UPDATE CURRENT_TIMESTAMP` for the `updatedAt` field.
CREATE TABLE `User` (
    `id` CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
    `name` TEXT NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` TEXT NOT NULL,
    `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- An index is automatically created for the UNIQUE constraint on `email`.

-- 3. Create the Note table
CREATE TABLE `Note` (
    `id` CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
    `title` TEXT NOT NULL,
    `content` TEXT,
    `isEncrypted` BOOLEAN NOT NULL DEFAULT FALSE,
    `hexColor` VARCHAR(7) NOT NULL DEFAULT '#3f3f3f',
    `userId` CHAR(36) NOT NULL,
    `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT `Note_userId_fkey` FOREIGN KEY (`userId`) REFERENCES `User` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);

-- 4. Create the Image table
CREATE TABLE `Image` (
    `id` CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
    `url` TEXT NOT NULL,
    `fileName` TEXT NOT NULL,
    `userId` CHAR(36) NOT NULL,
    `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT `Image_userId_fkey` FOREIGN KEY (`userId`) REFERENCES `User` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);
-- Note: Image table doesn't have an 'updatedAt' field in the original schema.

-- 5. Create the Relation table
-- The ENUM type is defined directly inside the table definition in MariaDB/MySQL.
CREATE TABLE `Relation` (
    `id` CHAR(36) NOT NULL PRIMARY KEY DEFAULT (UUID()),
    `senderId` CHAR(36) NOT NULL,
    `recieverId` CHAR(36) NOT NULL,
    `status` ENUM('accepted', 'pending', 'blocked') NOT NULL,
    `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT `Relation_senderId_fkey` FOREIGN KEY (`senderId`) REFERENCES `User` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT `Relation_recieverId_fkey` FOREIGN KEY (`recieverId`) REFERENCES `User` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);


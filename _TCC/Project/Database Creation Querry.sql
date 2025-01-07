-- CRIANDO O BANCO SQL SERVER

IF EXISTS (SELECT name FROM master.sys.databases WHERE name = N'ParkFlow')
    DROP DATABASE [ParkFlow];

GO  
CREATE DATABASE [ParkFlow]
ON 
PRIMARY (
    NAME = ParkFlow,
    filename = 'C:\data\parkflow.mdf'),
FILEGROUP FileStreamProjectE CONTAINS FILESTREAM  (
    NAME = ParkFlow_stream,
    filename = 'C:\data\filestreamParkflow')
LOG ON ( 
    NAME = ParkFlow_log,
    filename = 'C:\data\parkFlow.ldf');

GO
USE [ParkFlow]

GO 
CREATE TABLE [role] (
    [id] INT PRIMARY KEY IDENTITY(1,1),
    [is_active] BIT DEFAULT(1),
    [role] int not null
)

GO
CREATE TABLE [address] (
    [id] INT PRIMARY KEY IDENTITY(1,1),
    [is_active] BIT DEFAULT(1),
    [cep] VARCHAR(12) NOT NULL,
    [country] VARCHAR(255) NOT NULL,
    [state] VARCHAR(255) NOT NULL,
    [city] VARCHAR(255) NOT NULL,
    [neighborhood] VARCHAR(255),
    [street] VARCHAR(MAX) NOT NULL,
    [number] int not null,
)

GO
CREATE TABLE [image] (
    [id] INT PRIMARY KEY IDENTITY(1,1),
    [is_active] BIT DEFAULT(1),
    [data] VARBINARY(MAX) NOT NULL
)

GO
CREATE TABLE [plan] (
    [id] INT PRIMARY KEY IDENTITY(1,1),
    [is_active] BIT DEFAULT(1),
    [plan] INT NOT NULL,
    [title] VARCHAR(255) NOT NULL,
    [description] VARCHAR(MAX),
    [price] MONEY,
)

GO
CREATE TABLE [company_settings](
    [id] INT PRIMARY KEY IDENTITY(1,1),
    [is_active] BIT DEFAULT(1),
    [vehicle_per_user] INT
)

GO
CREATE TABLE [company] (
    [id] INT PRIMARY KEY IDENTITY(1,1),
    [is_active] BIT DEFAULT(1),
    [name] VARCHAR(MAX) NOT NULL,
    [cnpj] VARCHAR(14) NOT NULL,
    [id_address] INT FOREIGN KEY REFERENCES [address](id),
    [id_plan] INT FOREIGN KEY REFERENCES [plan] (id),
    [id_settings] INT FOREIGN KEY REFERENCES [company_settings] (id)
)

GO
CREATE TABLE [user] (
    [id] INT PRIMARY KEY IDENTITY(1,1),
    [is_active] BIT DEFAULT(1),
    [name] VARCHAR(550) NOT NULL,
    [document] VARCHAR(75) NOT NULL,
    [email] VARCHAR(255),
    [hash] VARCHAR(255),
    [phone] VARCHAR(25),
    [id_address] INT FOREIGN KEY REFERENCES [address](id),
    [id_role] INT FOREIGN KEY REFERENCES [role](id),
    [id_image] INT FOREIGN KEY REFERENCES [image](id),
    [id_company] INT FOREIGN KEY REFERENCES [company](id)
)


GO
CREATE TABLE [google_authentication] (
    [id] INT PRIMARY KEY IDENTITY(1,1),
    [is_active] BIT DEFAULT(1),
    [token] VARCHAR(500),
    [id_user] INT FOREIGN KEY REFERENCES [user] (id)
)

GO
CREATE TABLE [vehicle] (
    [id] INT PRIMARY KEY IDENTITY(1,1),
    [is_active] BIT DEFAULT(1),
    [plate] VARCHAR(10) NOT NULL,
    [brand] VARCHAR(255) NOT NULL,
    [model] VARCHAR(550) NOT NULL,
    [year] int,
    [color] VARCHAR(100),
    [id_image] INT FOREIGN KEY REFERENCES [image] (id),
    [id_user] INT FOREIGN KEY REFERENCES [user] (id)
)

GO
CREATE TABLE [vehicle_access_log] (
    [id] INT PRIMARY KEY IDENTITY(1,1),
    [is_active] BIT DEFAULT(1),
    [in] DATE NOT NULL,
    [out] DATE,
    [id_vehicle] INT FOREIGN KEY REFERENCES [vehicle] (id)
)

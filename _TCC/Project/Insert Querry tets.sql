-- INSERINDO DADOS DE BASE 

use [ParkFlow]
GO

INSERT INTO [address] VALUES (1,'12345-678','Brasil','Sao Paulo','Campinas','Centro','Rua Exemplo, 123',123);
INSERT INTO [address] VALUES (1,'12345-678','Brasil','Parana','Curitiba','Centro','Rua Exemplo, 123',123 );
INSERT INTO [address] VALUES (1,'12345-678','Brasil','Parana','Colombo','Centro','Rua Exemplo, 123',123 );
GO

INSERT INTO [plan] VALUES (1, 1, 'Base', 'Plano Base Oferece apenas o básico', 10)
GO

INSERT INTO [role] VALUES (1,1);
INSERT INTO [role] VALUES (2,1);
GO

INSERT INTO [image] VALUES (0x,1);
INSERT INTO [image] VALUES (0x,1);
GO

INSERT into [company_settings] values (1,1)
GO

INSERT INTO [company] VALUES (1, 'ParkFlow - Campinas','12345678000195',1,1,1);
INSERT INTO [company] VALUES (1, 'ParkFlow - Colombo','12345678000195',3,1,1);
INSERT INTO [company] VALUES (1, 'ParkFlow - Curitiba','12345678000195',2,1,1);
GO

INSERT INTO [user] VALUES (1, 'Nycollas Sobolevski','123123','email@exemplo.com','123','41 9999-0000',2,1,2,2);
INSERT INTO [user] VALUES (1, 'João da Silva','12345678901','joao.silva@exemplo.com','senha','41 9999-0000',1,1,2,1);
 
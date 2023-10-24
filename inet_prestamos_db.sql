USE [master]
GO
/****** Object:  Database [inet_prestamos_db]    Script Date: 19/10/2023 9:34:37 a. m. ******/
CREATE DATABASE [inet_prestamos_db]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'inet_prestamo_db', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\inet_prestamo_db.mdf' , SIZE = 73728KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'inet_prestamo_db_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\inet_prestamo_db_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT, LEDGER = OFF
GO
ALTER DATABASE [inet_prestamos_db] SET COMPATIBILITY_LEVEL = 160
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [inet_prestamos_db].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [inet_prestamos_db] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET ARITHABORT OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET AUTO_CLOSE ON 
GO
ALTER DATABASE [inet_prestamos_db] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [inet_prestamos_db] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [inet_prestamos_db] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET  ENABLE_BROKER 
GO
ALTER DATABASE [inet_prestamos_db] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [inet_prestamos_db] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [inet_prestamos_db] SET  MULTI_USER 
GO
ALTER DATABASE [inet_prestamos_db] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [inet_prestamos_db] SET DB_CHAINING OFF 
GO
ALTER DATABASE [inet_prestamos_db] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [inet_prestamos_db] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [inet_prestamos_db] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [inet_prestamos_db] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [inet_prestamos_db] SET QUERY_STORE = ON
GO
ALTER DATABASE [inet_prestamos_db] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 1000, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
USE [inet_prestamos_db]
GO
/****** Object:  Table [dbo].[tbl_clientes]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_clientes](
	[idcliente] [int] IDENTITY(1,1) NOT NULL,
	[identificacion] [varchar](20) NOT NULL,
	[nombres] [varchar](50) NOT NULL,
	[apellidos] [varchar](50) NOT NULL,
	[genero] [int] NOT NULL,
	[telefono] [varchar](15) NOT NULL,
	[email] [varchar](100) NOT NULL,
	[direccion] [varchar](80) NULL,
	[ciudad] [varchar](30) NOT NULL,
	[fecha_creado] [datetime] NOT NULL,
	[estado] [int] NOT NULL,
	[prestamo] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idcliente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_prestamos]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_prestamos](
	[idprestamo] [int] IDENTITY(1,1) NOT NULL,
	[clienteid] [int] NOT NULL,
	[fecha_prestamo] [date] NOT NULL,
	[monto_prestamo] [int] NOT NULL,
	[nro_cuotas] [int] NOT NULL,
	[interes] [int] NOT NULL,
	[valor_cuota] [int] NOT NULL,
	[total_interes] [int] NOT NULL,
	[total_pagar] [int] NOT NULL,
	[forma_pago] [varchar](15) NOT NULL,
	[moneda] [varchar](5) NOT NULL,
	[estado] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idprestamo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbL_amortizacion]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbL_amortizacion](
	[idamortizacion] [int] IDENTITY(1,1) NOT NULL,
	[prestamoid] [int] NOT NULL,
	[nro_cuota] [int] NOT NULL,
	[fecha_cuota] [date] NOT NULL,
	[valor_cuota] [int] NOT NULL,
	[interes] [int] NOT NULL,
	[capital] [int] NOT NULL,
	[saldo] [int] NOT NULL,
	[estado] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idamortizacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  View [dbo].[view_reportePrestamos]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [dbo].[view_reportePrestamos]
AS 
SELECT p.idprestamo, CONCAT(c.nombres,' ', c.apellidos) as cliente, p.fecha_prestamo, p.monto_prestamo, p.forma_pago, p.nro_cuotas,p.valor_cuota, p.total_interes,
p.total_pagar, SUM(CASE WHEN a.estado = 0 THEN a.valor_cuota ELSE 0 END) AS abonos, p.estado
FROM tbl_prestamos p
INNER JOIN tbl_clientes c
ON c.idcliente =  p.clienteid
INNER JOIN tbl_amortizacion a
ON a.prestamoid = p.idprestamo
GROUP BY a.prestamoid,p.idprestamo,c.nombres,c.apellidos,p.fecha_prestamo,p.monto_prestamo,p.forma_pago,p.nro_cuotas,p.total_interes,p.valor_cuota,p.total_pagar,
p.estado;
GO
/****** Object:  View [dbo].[view_reporteRecaudo]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [dbo].[view_reporteRecaudo]
AS
SELECT COALESCE (SUM(total_pagar), 0) AS prestamos, COALESCE (SUM(abonos), 0) AS abonos
FROM view_reportePrestamos
WHERE estado = 1;
GO
/****** Object:  View [dbo].[view_saldoPrestamos]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [dbo].[view_saldoPrestamos]
AS
SELECT p.idprestamo,c.idcliente, c.nombres, c.apellidos, p.fecha_prestamo, p.monto_prestamo, p.forma_pago, p.nro_cuotas,p.valor_cuota, p.total_interes,
p.total_pagar, SUM(CASE WHEN a.estado = 0 THEN a.capital ELSE 0 END) AS abonos, p.estado
FROM tbl_prestamos p
INNER JOIN tbl_clientes c
ON c.idcliente =  p.clienteid
INNER JOIN tbl_amortizacion a
ON a.prestamoid = p.idprestamo
GROUP BY a.prestamoid,p.idprestamo,c.idcliente,c.nombres,c.apellidos,p.fecha_prestamo,p.monto_prestamo,p.forma_pago,p.nro_cuotas,p.total_interes,p.valor_cuota,p.total_pagar,
p.estado;
GO
/****** Object:  Table [dbo].[tbl_capital]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_capital](
	[idcapital] [int] IDENTITY(1,1) NOT NULL,
	[fecha] [date] NOT NULL,
	[capital] [int] NOT NULL,
	[cuenta] [varchar](50) NOT NULL,
	[descripcion] [varchar](max) NULL,
PRIMARY KEY CLUSTERED 
(
	[idcapital] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_modulos]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_modulos](
	[idmodulo] [int] IDENTITY(1,1) NOT NULL,
	[titulo] [varchar](50) NOT NULL,
	[descripcion] [text] NOT NULL,
	[estado] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idmodulo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_pagos]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_pagos](
	[idpago] [int] IDENTITY(1,1) NOT NULL,
	[prestamoid] [int] NOT NULL,
	[clienteid] [int] NOT NULL,
	[fecha_pago] [datetime] NOT NULL,
	[monto_pagado] [int] NOT NULL,
	[cuota_pagada] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idpago] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_permisos]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_permisos](
	[idpermiso] [int] IDENTITY(1,1) NOT NULL,
	[rolid] [int] NOT NULL,
	[moduloid] [int] NOT NULL,
	[r] [int] NOT NULL,
	[w] [int] NOT NULL,
	[u] [int] NOT NULL,
	[d] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idpermiso] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_rol]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_rol](
	[idrol] [int] IDENTITY(1,1) NOT NULL,
	[nombrerol] [varchar](50) NOT NULL,
	[descripcion] [text] NOT NULL,
	[estado] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idrol] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_usuarios]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_usuarios](
	[idusuario] [int] IDENTITY(1,1) NOT NULL,
	[identificacion] [varchar](20) NOT NULL,
	[nombres] [varchar](80) NOT NULL,
	[apellidos] [varchar](80) NOT NULL,
	[foto] [varchar](100) NULL,
	[direccion] [varchar](100) NOT NULL,
	[telefono] [varchar](15) NOT NULL,
	[email_user] [varchar](80) NOT NULL,
	[password] [varchar](100) NOT NULL,
	[token] [varchar](100) NULL,
	[rolid] [int] NOT NULL,
	[fecha_creado] [datetime] NOT NULL,
	[estado] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idusuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[tbL_amortizacion] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[tbl_clientes] ADD  DEFAULT (getdate()) FOR [fecha_creado]
GO
ALTER TABLE [dbo].[tbl_clientes] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[tbl_clientes] ADD  DEFAULT ((0)) FOR [prestamo]
GO
ALTER TABLE [dbo].[tbl_modulos] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[tbl_pagos] ADD  DEFAULT (getdate()) FOR [fecha_pago]
GO
ALTER TABLE [dbo].[tbl_prestamos] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[tbl_rol] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[tbl_usuarios] ADD  DEFAULT (getdate()) FOR [fecha_creado]
GO
ALTER TABLE [dbo].[tbl_usuarios] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[tbL_amortizacion]  WITH CHECK ADD  CONSTRAINT [FK_tbL_amortizacion_tbl_prestamos] FOREIGN KEY([prestamoid])
REFERENCES [dbo].[tbl_prestamos] ([idprestamo])
GO
ALTER TABLE [dbo].[tbL_amortizacion] CHECK CONSTRAINT [FK_tbL_amortizacion_tbl_prestamos]
GO
ALTER TABLE [dbo].[tbl_pagos]  WITH CHECK ADD  CONSTRAINT [FK_tbl_pagos_tbl_clientes] FOREIGN KEY([clienteid])
REFERENCES [dbo].[tbl_clientes] ([idcliente])
GO
ALTER TABLE [dbo].[tbl_pagos] CHECK CONSTRAINT [FK_tbl_pagos_tbl_clientes]
GO
ALTER TABLE [dbo].[tbl_pagos]  WITH CHECK ADD  CONSTRAINT [FK_tbl_pagos_tbl_prestamos] FOREIGN KEY([prestamoid])
REFERENCES [dbo].[tbl_prestamos] ([idprestamo])
GO
ALTER TABLE [dbo].[tbl_pagos] CHECK CONSTRAINT [FK_tbl_pagos_tbl_prestamos]
GO
ALTER TABLE [dbo].[tbl_permisos]  WITH CHECK ADD  CONSTRAINT [FK_tbl_permisos_tbl_modulos] FOREIGN KEY([moduloid])
REFERENCES [dbo].[tbl_modulos] ([idmodulo])
GO
ALTER TABLE [dbo].[tbl_permisos] CHECK CONSTRAINT [FK_tbl_permisos_tbl_modulos]
GO
ALTER TABLE [dbo].[tbl_permisos]  WITH CHECK ADD  CONSTRAINT [FK_tbl_permisos_tbl_rol] FOREIGN KEY([rolid])
REFERENCES [dbo].[tbl_rol] ([idrol])
GO
ALTER TABLE [dbo].[tbl_permisos] CHECK CONSTRAINT [FK_tbl_permisos_tbl_rol]
GO
ALTER TABLE [dbo].[tbl_prestamos]  WITH CHECK ADD  CONSTRAINT [FK_tbl_prestamos_tbl_clientes] FOREIGN KEY([clienteid])
REFERENCES [dbo].[tbl_clientes] ([idcliente])
GO
ALTER TABLE [dbo].[tbl_prestamos] CHECK CONSTRAINT [FK_tbl_prestamos_tbl_clientes]
GO
ALTER TABLE [dbo].[tbl_usuarios]  WITH CHECK ADD  CONSTRAINT [FK_tbl_usuarios_tbl_rol] FOREIGN KEY([rolid])
REFERENCES [dbo].[tbl_rol] ([idrol])
GO
ALTER TABLE [dbo].[tbl_usuarios] CHECK CONSTRAINT [FK_tbl_usuarios_tbl_rol]
GO
/****** Object:  StoredProcedure [dbo].[proc_consecutivoPrestamo]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[proc_consecutivoPrestamo]
AS 
SELECT ISNULL(MAX(idprestamo),0) as consecutivo FROM tbl_prestamos;
GO
/****** Object:  StoredProcedure [dbo].[proc_pagoPrestamos]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[proc_pagoPrestamos]
@CodPrestamo AS INT
AS

SELECT sum(estado) as estado FROM tbl_amortizacion WHERE prestamoid = @CodPrestamo
GO
/****** Object:  StoredProcedure [dbo].[proc_recaudoPrestamos]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[proc_recaudoPrestamos]
AS

SELECT 'prestamos' AS nombre, SUM(total_pagar) AS total FROM view_reportePrestamos
WHERE estado = 1 
UNION ALL 
SELECT 'abonos' AS nombre, SUM(abonos) AS total FROM view_reportePrestamos
WHERE estado = 1
ORDER BY nombre DESC;
GO
/****** Object:  StoredProcedure [dbo].[proc_saldoPrestamos]    Script Date: 19/10/2023 9:34:37 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[proc_saldoPrestamos]
AS
SELECT ISNULL(SUM(monto_prestamo) - SUM(abonos),0) AS total FROM view_saldoprestamos
WHERE estado != 0;
GO
USE [master]
GO
ALTER DATABASE [inet_prestamos_db] SET  READ_WRITE 
GO

USE [master]
GO
/****** Object:  Database [inet_prestamos_db]    Script Date: 29/02/2024 10:05:51 a. m. ******/
CREATE DATABASE [inet_prestamos_db]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'inet_prestamo_db', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\inet_prestamo_db.mdf' , SIZE = 73728KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'inet_prestamo_db_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\inet_prestamo_db_log.ldf' , SIZE = 73728KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
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
/****** Object:  Table [dbo].[tbl_clientes]    Script Date: 29/02/2024 10:05:52 a. m. ******/
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
/****** Object:  Table [dbo].[tbL_amortizacion]    Script Date: 29/02/2024 10:05:52 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbL_amortizacion](
	[idamortizacion] [int] IDENTITY(1,1) NOT NULL,
	[prestamoid] [int] NOT NULL,
	[nro_cuota] [int] NOT NULL,
	[fecha_cuota] [date] NOT NULL,
	[valor_cuota] [decimal](12, 2) NOT NULL,
	[interes] [decimal](12, 2) NOT NULL,
	[capital] [decimal](12, 2) NOT NULL,
	[saldo] [decimal](12, 2) NOT NULL,
	[estado] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idamortizacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_prestamos]    Script Date: 29/02/2024 10:05:52 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_prestamos](
	[idprestamo] [int] IDENTITY(1,1) NOT NULL,
	[clienteid] [int] NOT NULL,
	[detalle] [varchar](250) NULL,
	[fecha_prestamo] [date] NOT NULL,
	[monto_prestamo] [decimal](12, 2) NOT NULL,
	[nro_cuotas] [int] NOT NULL,
	[interes] [decimal](5, 2) NOT NULL,
	[valor_cuota] [decimal](12, 2) NOT NULL,
	[total_interes] [decimal](12, 2) NOT NULL,
	[total_pagar] [decimal](12, 2) NOT NULL,
	[forma_pago] [varchar](15) NOT NULL,
	[moneda] [varchar](5) NOT NULL,
	[estado] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idprestamo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  View [dbo].[view_reportePrestamos]    Script Date: 29/02/2024 10:05:52 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [dbo].[view_reportePrestamos] AS

SELECT p.idprestamo, CONCAT(c.nombres, ' ', c.apellidos) AS cliente, p.detalle, p.fecha_prestamo, p.monto_prestamo, p.forma_pago, p.nro_cuotas, p.valor_cuota, p.total_interes, p.total_pagar, 
                         SUM(CASE WHEN a.estado = 0 THEN a.valor_cuota ELSE 0 END) AS abonos, p.estado
FROM tbl_prestamos AS p INNER JOIN
                         dbo.tbl_clientes AS c ON c.idcliente = p.clienteid INNER JOIN
                         dbo.tbL_amortizacion AS a ON a.prestamoid = p.idprestamo
GROUP BY a.prestamoid, p.idprestamo, c.nombres, c.apellidos,p.detalle, p.fecha_prestamo, p.monto_prestamo, p.forma_pago, p.nro_cuotas, p.total_interes, p.valor_cuota, p.total_pagar, p.estado
GO
/****** Object:  View [dbo].[view_reporteRecaudo]    Script Date: 29/02/2024 10:05:52 a. m. ******/
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
/****** Object:  View [dbo].[view_saldoPrestamos]    Script Date: 29/02/2024 10:05:52 a. m. ******/
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
/****** Object:  Table [dbo].[tbl_capital]    Script Date: 29/02/2024 10:05:52 a. m. ******/
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
	[estado] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idcapital] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_modulos]    Script Date: 29/02/2024 10:05:52 a. m. ******/
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
/****** Object:  Table [dbo].[tbl_pagos]    Script Date: 29/02/2024 10:05:52 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_pagos](
	[idpago] [int] IDENTITY(1,1) NOT NULL,
	[prestamoid] [int] NOT NULL,
	[clienteid] [int] NOT NULL,
	[fecha_pago] [datetime] NOT NULL,
	[monto_pagado] [decimal](12, 2) NOT NULL,
	[cuota_pagada] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idpago] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_permisos]    Script Date: 29/02/2024 10:05:52 a. m. ******/
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
/****** Object:  Table [dbo].[tbl_rol]    Script Date: 29/02/2024 10:05:52 a. m. ******/
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
/****** Object:  Table [dbo].[tbl_usuarios]    Script Date: 29/02/2024 10:05:52 a. m. ******/
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
ALTER TABLE [dbo].[tbl_capital] ADD  DEFAULT ((1)) FOR [estado]
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
/****** Object:  StoredProcedure [dbo].[proc_consecutivoPrestamo]    Script Date: 29/02/2024 10:05:52 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[proc_consecutivoPrestamo]
AS 
SELECT ISNULL(MAX(idprestamo),0) as consecutivo FROM tbl_prestamos;
GO
/****** Object:  StoredProcedure [dbo].[proc_datosDashboard]    Script Date: 29/02/2024 10:05:52 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[proc_datosDashboard]
@anio INT
AS 
BEGIN
DECLARE @totalPrestamos NUMERIC(12,2);
DECLARE @cantidadPrestamos INT;
DECLARE @totalCapital NUMERIC(12,2);
DECLARE @interesPendiente NUMERIC(12,2);
DECLARE @pagosHoy INT;
DECLARE @totalInteres NUMERIC(12,2);
DECLARE @totalCaja NUMERIC(12,2);

SET @totalPrestamos = (SELECT ISNULL((SUM(monto_prestamo)-SUM(abonos)),0) AS total FROM view_saldoPrestamos WHERE estado != 0);
SET @cantidadPrestamos = (SELECT COUNT(*) FROM tbl_prestamos WHERE estado = 1);
SET @totalCapital = (SELECT ISNULL(SUM(capital),0) AS totalCapital FROM tbl_capital);
SET @pagosHoy = (SELECT COUNT(valor_cuota) pagos_hoy FROM tbl_amortizacion WHERE fecha_cuota <= GETDATE() AND estado != 0);
SET @interesPendiente = (SELECT ISNULL(SUM(interes),0) AS interesPendiente FROM tbL_amortizacion WHERE estado = 1);
SET @totalInteres = (SELECT ISNULL(SUM(interes),0) AS interes FROM tbl_amortizacion WHERE estado = 0);


SELECT ISNULL(@totalPrestamos,0) AS totalPrestamos,
	   ISNULL(@cantidadPrestamos,0) AS cantidadPrestamos,
	   ISNULL(@totalCapital,0) AS totalCapital,
	   ISNULL(@interesPendiente,0) AS interesPendiente,
	   ISNULL(@pagosHoy,0) AS pagosHoy,
	   ISNULL(@totalCapital-@TotalPrestamos+@totalInteres,0) AS totalCaja

END;
GO
/****** Object:  StoredProcedure [dbo].[proc_flujoCaja]    Script Date: 29/02/2024 10:05:52 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[proc_flujoCaja]
@anio INT
AS 
BEGIN
DECLARE @totalCapital INT;
DECLARE @totalAbonos INT;
DECLARE @totalInteres INT;
DECLARE @totalIngresosAnio INT; -- año actual
DECLARE @totalIngresos INT;
DECLARE @totalPrestamosAnio INT; -- año actual
DECLARE @totalPrestamos INT;
DECLARE @balanceEfectivo INT;
DECLARE @totalPrestamosBalance INT;
DECLARE @totalIngresosBalance INT;
DECLARE @balanceAnterior INT; -- saldo año anterior

SET @totalCapital = (SELECT ISNULL(SUM(capital),0) AS totalCapital FROM tbl_capital WHERE YEAR(fecha) = @anio)
SET @totalAbonos = (SELECT ISNULL(SUM(capital),0) AS pagos FROM tbl_amortizacion WHERE estado = 0 AND YEAR(fecha_cuota) = @anio)
SET @totalInteres = (SELECT ISNULL(SUM(interes),0) AS interes FROM tbl_amortizacion WHERE estado = 0 AND YEAR(fecha_cuota) = @anio)
SET @totalIngresosAnio = (SELECT 
	(SELECT ISNULL(SUM(capital),0) AS totalCapital FROM tbl_capital WHERE YEAR(fecha) = @anio) +
	(SELECT ISNULL(SUM(capital),0) AS pagos FROM tbl_amortizacion WHERE estado = 0 AND YEAR(fecha_cuota) = @anio)+
	(SELECT ISNULL(SUM(interes),0) AS interes FROM tbl_amortizacion WHERE estado = 0 AND YEAR(fecha_cuota) = @anio) AS ingresos)
	-- SELET para mostrar moimientos del año anterios ----
	SET @totalIngresos = (SELECT 
	(SELECT ISNULL(SUM(capital),0) AS totalCapital FROM tbl_capital WHERE YEAR(fecha) = @anio-1) +
	(SELECT ISNULL(SUM(capital),0) AS pagos FROM tbl_amortizacion WHERE estado = 0 AND YEAR(fecha_cuota) = @anio-1)+
	(SELECT ISNULL(SUM(interes),0) AS interes FROM tbl_amortizacion WHERE estado = 0 AND YEAR(fecha_cuota) = @anio-1) AS ingresos)
SET @totalPrestamosAnio = (SELECT ISNULL(SUM(monto_prestamo),0) AS pretamos FROM tbl_Prestamos WHERE YEAR(fecha_prestamo) = @anio);
-- SELET para mostrar moimientos del año anterios ----
SET @totalPrestamos = (SELECT ISNULL(SUM(monto_prestamo),0) AS pretamos FROM tbl_Prestamos WHERE YEAR(fecha_prestamo) = @anio-1);

-- SELECT Balance
SET @totalIngresosBalance = (SELECT 
	(SELECT ISNULL(SUM(capital),0) AS totalCapital FROM tbl_capital) +
	(SELECT ISNULL(SUM(capital),0) AS pagos FROM tbl_amortizacion WHERE estado = 0)+
	(SELECT ISNULL(SUM(interes),0) AS interes FROM tbl_amortizacion WHERE estado = 0) AS ingresos)

SET @totalPrestamosBalance = (SELECT ISNULL(SUM(monto_prestamo),0) AS pretamos FROM tbl_Prestamos);

	SELECT ISNULL(@totalCapital,0) AS totalCapital,
	   ISNULL(@totalAbonos,0) AS totalAbonos,
	   ISNULL(@totalInteres,0) AS totalInteres,
	   ISNULL(@totalIngresosAnio,0) AS totalIngresos,
	   ISNULL(@totalPrestamosAnio,0)AS totalPrestamos,
	    ISNULL(@totalIngresosAnio-@totalPrestamosAnio,0) AS balanceEfectivo,
	   ISNULL(@totalIngresos-@totalPrestamos,0) AS balanceAnterior,
	   ISNULL(@totalIngresosBalance-@totalPrestamosBalance,0) AS totalBalance;
	  
END;
GO
/****** Object:  StoredProcedure [dbo].[proc_hojaBalance]    Script Date: 29/02/2024 10:05:52 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[proc_hojaBalance]
AS 
BEGIN
DECLARE @totalEfectivo INT;
DECLARE @totalCapital INT;
DECLARE @totalInteres INT;
DECLARE @totalPrestamos INT;
DECLARE @totalActivos INT;
DECLARE @totalPatrimonio INT;

SET @totalCapital = (SELECT ISNULL(SUM(capital),0) AS totalCapital FROM tbl_capital)
SET @totalInteres = (SELECT ISNULL(SUM(interes),0) AS interes FROM tbl_amortizacion WHERE estado = 0)
SET @totalPrestamos = (SELECT ISNULL(SUM(capital),0) AS totalPrestamos FROM tbL_amortizacion WHERE estado = 1)

SELECT ISNULL(@totalCapital+@totalInteres-@totalprestamos,0) AS totalEfectivo,
	   ISNULL(@totalCapital,0) AS totalCapital,
	   ISNULL(@totalInteres,0) AS totalInteres,
	   ISNULL(@totalPrestamos,0)AS totalPrestamos,
	   ISNULL((@totalCapital+@totalInteres-@totalprestamos)+@totalPrestamos,0) AS totalActivos,
	   ISNULL(@totalCapital+@totalInteres,0)AS totalPatrimonio;

END;
GO
/****** Object:  StoredProcedure [dbo].[proc_obtenerCapital]    Script Date: 29/02/2024 10:05:52 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[proc_obtenerCapital]
AS
BEGIN 
SELECT ISNULL(SUM(capital),0)AS total FROM tbl_capital
WHERE estado != 0
END;
GO
/****** Object:  StoredProcedure [dbo].[proc_pagoPrestamos]    Script Date: 29/02/2024 10:05:52 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[proc_pagoPrestamos]
@CodPrestamo AS INT
AS

SELECT sum(estado) as estado FROM tbl_amortizacion WHERE prestamoid = @CodPrestamo
GO
/****** Object:  StoredProcedure [dbo].[proc_recaudoPrestamos]    Script Date: 29/02/2024 10:05:52 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[proc_recaudoPrestamos]
@anio INT
AS

SELECT 'prestamos' AS nombre, ISNULL((SUM(monto_prestamo)-SUM(abonos)),0) AS total FROM view_saldoPrestamos
WHERE estado != 0
UNION ALL 
SELECT 'abonos' AS nombre, ISNULL(SUM(monto_pagado),0) AS pagos FROM tbl_pagos
WHERE YEAR(fecha_pago) = @anio
ORDER BY nombre DESC;
GO
/****** Object:  StoredProcedure [dbo].[proc_saldoPrestamos]    Script Date: 29/02/2024 10:05:52 a. m. ******/
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

CREATE TABLE unidades(
	[id] VARCHAR(5) NOT NULL,
	[nombre] VARCHAR(100) NOT NULL
CONSTRAINT [PK_unidades] PRIMARY KEY CLUSTERED ([id] ASC))
GO

CREATE TABLE categorias(
	[id] INT IDENTITY(1,1) NOT NULL,
	[nombre] VARCHAR(100) NOT NULL,
	[descripcion] TEXT
CONSTRAINT [PK_categorias] PRIMARY KEY CLUSTERED ([id] ASC))
GO

CREATE TABLE productos(
	[id] INT IDENTITY(1,1) NOT NULL,
	[codigo] VARCHAR(20) NOT NULL,
	[nombre] VARCHAR(100) NOT NULL,
	[marca] VARCHAR(100) NULL,
	[descripcion] TEXT,
	[unidad_id] VARCHAR(5) NOT NULL,
	[categoria_id] INT NOT NULL,
	[precio] DECIMAL(8,2) NULL,
	[created_at] DATETIME NOT NULL,
	[updated_at] DATETIME NOT NULL
CONSTRAINT [PK_productos] PRIMARY KEY CLUSTERED ([id] ASC))
GO

ALTER TABLE [productos] WITH CHECK ADD CONSTRAINT [FK_productos_unidades] FOREIGN KEY([unidad_id])
REFERENCES [unidades] ([id]) ON UPDATE CASCADE ON DELETE CASCADE
GO
ALTER TABLE [productos] CHECK CONSTRAINT [FK_productos_unidades]
GO

ALTER TABLE [productos] WITH CHECK ADD CONSTRAINT [FK_productos_categorias] FOREIGN KEY([categoria_id])
REFERENCES [categorias] ([id]) ON UPDATE CASCADE ON DELETE CASCADE
GO
ALTER TABLE [productos] CHECK CONSTRAINT [FK_productos_categorias]
GO

CREATE PROCEDURE [listar_unidades] AS
BEGIN
	select * from unidades order by nombre;
END
GO

CREATE PROCEDURE [registrar_unidad](@id VARCHAR(5), @nombre VARCHAR(100)) AS
BEGIN
	insert into unidades (id, nombre) values(@id, @nombre);
END
GO

CREATE PROCEDURE [listar_categorias] AS
BEGIN
	select * from categorias order by nombre;
END
GO

CREATE PROCEDURE [registrar_categoria](@nombre VARCHAR(100)) AS
BEGIN
	insert into unidades (nombre) values(@nombre);
END
GO

CREATE PROCEDURE [listar_productos] (@order_by VARCHAR(20)) AS
BEGIN
	select p.*, c.nombre as categoria_nombre, u.nombre as unidad_nombre from productos p
	left join categorias c on p.categoria_id = c.id
	left join unidades u on p.unidad_id = u.id
	order by case @order_by
			 when 'codigo' then p.codigo
			 when 'fecha' then p.fecha_registro
             else p.nombre end
END
GO

CREATE PROCEDURE [registrar_producto](@nombre VARCHAR(100), @marca VARCHAR(100), @unidad INT, @categoria INT, @precio DECIMAL(8,2)) AS
BEGIN
	insert into productos (nombre, marca, unidad_id, categoria_id, precio) values(@nombre, @marca, @unidad, @categoria, @precio);
END
GO
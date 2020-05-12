USE tp3;

CREATE TABLE turno (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nombre text NOT NULL,
    email text NOT NULL,
    telefono text NOT NULL,
    edad text NOT NULL,
    talla text NOT NULL,  
    altura text NOT NULL,
    fecha_nacimiento date NOT NULL,
    color_pelo text NOT NULL,
    fecha_turno date NOT NULL,
    hora_turno time NOT NULL,
    imagen text NOT NULL);

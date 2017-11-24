CREATE OR REPLACE TABLE producto(id_producto int unsigned auto_increment primary key,nombre varchar(50),descripcion text,precio DOUBLE, id_categoria int, id_imagen int, disponible int);
CREATE OR REPLACE TABLE articulo(id_articulo int unsigned auto_increment primary key,titulo varchar(50),descripcion text,texto text,id_imagen varchar(50), disponible int);
CREATE OR REPLACE TABLE video(id_video INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,titulo VARCHAR(50),descripcion TEXT,url VARCHAR(50), disponible int);
CREATE OR REPLACE TABLE imagen(id_imagen INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,url VARCHAR(50));
CREATE OR REPLACE TABLE categoria(id_categoria INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(50));
CREATE OR REPLACE TABLE workshop(id_workshop INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,titulo VARCHAR(50),descripcion TEXT,fecha VARCHAR(15),lugar VARCHAR(50), disponible int);
CREATE OR REPLACE TABLE tutorial(id_tutorial INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,nombre varchar(50),descripcion TEXT, disponible int);
CREATE OR REPLACE TABLE video_es_parte_de_tutorial(id_video int,id_tutorial int);
CREATE OR REPLACE TABLE video_es_workshop(id_video int,id_workshop int);
CREATE OR REPLACE TABLE usuario_admin(correo varchar(100) primary key, password varchar(50));


INSERT INTO usuario_admin VALUES('iocdesign@gmail.com','iocdesign2017');

INSERT INTO categoria VALUES(DEFAULT,"Flayers");
INSERT INTO categoria VALUES(DEFAULT,"Merchandising");
INSERT INTO categoria VALUES(DEFAULT,'Logos');
INSERT INTO categoria VALUES(DEFAULT,'Pendones');
INSERT INTO producto VALUES(DEFAULT,'Sin pituto 1','Logo estudio creativo version blanco y negro',20000,3,1,1);
INSERT INTO producto VALUES(DEFAULT,'Sin pituto 2','Logo estudio creativo version multiples colores',21000,3,2,1);
INSERT INTO producto VALUES(DEFAULT,'Ecobolsita 1','Ecobolsita Congreso de emprendedores version flayer.',15000,2,3,1);
INSERT INTO producto VALUES(DEFAULT,'Ecobolsita 2','Ecobolsita Congreso de emprendedores',12000,2,4,1);
INSERT INTO producto VALUES(DEFAULT,'Ioc Design','Logo Ioc Design',10000,3,5,1);
INSERT INTO producto VALUES(DEFAULT,'Credenciales congreso Emprendedores','Credencial congreso emprendedores 2017',5000,2,6,1);
INSERT INTO producto VALUES(DEFAULT,'Congreso Emprendedores invitacion a evento','Flayer de invitacion Congreso emprendedores 2017',7000,1,7,1);
INSERT INTO producto VALUES(DEFAULT,'Congreso Emprendedores invitacion a evento 2','Flayer de invitacion Congreso emprendedores 2017',7000,1,8,1);
INSERT INTO producto VALUES(DEFAULT,'Pendon Congreso Emprendedores  2017 1','Pendon Congreso de Emprendedores 2017 version white ',30000,4,9,1);
INSERT INTO producto VALUES(DEFAULT,'Pendon Congreso Emprendedores  2017 2','Pendon Congreso de Emprendedores 2017 version black',30000,4,10,1);


INSERT INTO imagen VALUES(DEFAULT,'Sin pituto 1.jpg');
INSERT INTO imagen VALUES(DEFAULT,'Sin pituto 2.jpg');
INSERT INTO imagen VALUES(DEFAULT,'Ecobolsita 1.jpg');
INSERT INTO imagen VALUES(DEFAULT,'Ecobolsita 2.jpg');
INSERT INTO imagen VALUES(DEFAULT,'Ioc Design.jpg');
INSERT INTO imagen VALUES(DEFAULT,'Credenciales congreso Emprendedores.jpg');
INSERT INTO imagen VALUES(DEFAULT,'Congreso Emprendedores invitacion a evento.jpg');
INSERT INTO imagen VALUES(DEFAULT,'Congreso Emprendedores invitacion a evento 2.jpg');
INSERT INTO imagen VALUES(DEFAULT,'Pendon Congreso Emprendedores  2017 1.jpg');
INSERT INTO imagen VALUES(DEFAULT,'Pendon Congreso Emprendedores  2017 2.jpg');


INSERT INTO imagen VALUES(DEFAULT,'articulo_1.jpg');
INSERT INTO imagen VALUES(DEFAULT,'articulo_2.jpg');
INSERT INTO imagen VALUES(DEFAULT,'articulo_3.jpg');
INSERT INTO imagen VALUES(DEFAULT,'articulo_4.jpg');
INSERT INTO imagen VALUES(DEFAULT,'articulo_5.jpg');
INSERT INTO articulo VALUES(DEFAULT,'“El diseño es tan importante para la economía como la investigación”','Piensa sus creaciones como un filósofo, las trabaja como un científico y las dibuja como un artista...','Piensa sus creaciones como un filósofo, las trabaja como un científico y las dibuja como un artista. En esta manera de afrontar las cosas (que en realidad podría servir a cualquiera que se tome su trabajo con rigor) está la clave del éxito de Manuel Estrada. Este madrileño, serio, irónico y sagaz, que por una tímida coquetería prefiere no revelar su edad, acaba de recibir el Premio Nacional de Diseño 2017 por la magia de sus creaciones, realizadas en los últimos 30 años. Una magia que aporta mucho más que mera estética, aunque resulta innegable que sus diseños entran por los ojos. “He aprendido a base de hacerme preguntas sobre las cosas que no era capaz de resolver y buscando soluciones, leyendo, conociendo a profesionales muy buenos, viendo cómo trabajaban…”. Leía y hablaba, sobre todo, de tipografías, del uso del color, de las formas.  ¿Su referente? “El primero, la Bauhaus, claro. En aquella época había que resolver las cosas uniendo la función con la forma. Aunque considero que la primera es inseparable de la segunda, después la forma también me ha apasionado”.  La mayoría de las personas y empresas sigue viendo el diseño como algo prescindible. “Hay mucha gente que no entiende que, frente a la crisis, el diseño es un elemento estratégico. El diseño es tan importante para la economía como la investigación, piensas un producto que es un todo, cuyo valor es estratégico, no cosmético. Como decía el profesor de estética italiano Gillo Dorfles, el diseño es el arte de la sociedad industrial”.  ¿Por ejemplo? “Hacer un logo es complicado, primero hay que recopilar mucha información, luego procesarla y, finalmente, sintetizarla en un mensaje sencillo, pero que transmita todo ese contenido. Cuando el CEO de IBM presentó, en los años cincuenta el espléndido logo diseñado por Paul Rand, que no han tocado 60 años después, dijo entonces: "Good design is good business". Y que el póster diseñado por Rand para IBM forme parte de la colección permanente del MOMA es una expresión del valor cultural de ese éxito empresarial”.  Estrada ha expuesto sus diseños por medio mundo. Y para muestra, varios botones. El logo de Museo del Ejército son tres simples palitos horizontales sobre los que se levantan dos finas torres; la divertida portada de  La histeria, de Sigmund Freud (de Alianza Editorial), es media manzana verde con alambres clavados a modo de pelo electrizado, y la imagen del Premio Cervantes es la silueta del pintor configurada a base de letras.  Estrada dice que el trabajo en la imagen de una compañía es de largo recorrido. “Durante los últimos cinco años, tiempos de crisis y adversos para el mundo del libro, hemos estado diseñando las cubiertas de la colección de bolsillo de Alianza Editorial y los resultados para la empresa, razonablemente positivos para estos tiempos, me producen más satisfacción que las críticas positivas que suscitan las cubiertas”.  Llegado a este punto, sacamos a relucir a Carmencita. La marca española de especias es un buen ejemplo de lo que Estrada explica. La empresa ha disparado sus ventas desde que su estudio cambió el diseño de sus tarritos. “Tiene una significación cultural, es la marca que usaba tu abuela. Entonces mantuvimos el caracol en la frente que tenía la niña de la imagen, a lo Estrellita Castro, pero con un diseño limpio, que hace que el mensaje se entienda más rápido”.',11,1);
INSERT INTO articulo VALUES(DEFAULT,'5 aplicaciones esenciales para estudiantes de Diseño Gráfico','Convierte a las nuevas tecnologías en tus grandes aliadas con estas 5 aplicaciones esenciales para estudiantes del Diseño Gráfico','El Diseño Gráfico, como todas las carreras creativas en la actualidad, está estrechamente ligado al uso de la tecnología. Su avance vertiginoso permite que ahora puedas tener todas tus herramientas de diseñador en tu smartphone. Aquí te dejamos las 5 aplicaciones esenciales para estudiantes de Diseño Gráfico que no puedes dejar de descargar.',12,1);
INSERT INTO articulo VALUES(DEFAULT,'Recoleta recibe a los diseñadores y emprendedores de Chile en el VI encuentro de creadores','La muestra finaliza este domingo 22, con talleres gratuitos para todas las edades.','"Un asistencia estimada en 1500 personas y renovadas ilusiones para los proyectos sustentantes en el futuro, fue el balance del primer día de actividades del VI encuentro de creadores, productores y emprendedores de la industria del diseño y la manufactura en Chile, que culmina este domingo en el Espacio iF Blanco de Recoleta. "Estamos muy contentos con la respuesta del público en general y de los diseñadores. Tenemos una muestra de 35 expositores y 7 stands de comida. Hay talleres gratuitos, que ha concitado a estudiantes de diseño, fundamentalmente por los contenido de la muestra"", expresó Fabiola López, fundadora de la iniciativa y directora e DiF, en conversación con Publimetro. De esta manera, el evento planteará una mirada a largo plazo de lo que se quiere para el país en materia de diseño y la creatividad, como motores de la innovación necesaria para resolver desafíos y problemas actuales. Es por eso que Local será la instancia que dará inicio al Mes del Diseño, promovido por el Consejo Nacional de la Cultura y las Artes (CNCA) y ProChile. La respuesta de las familias, que incluso llenaron los espacios de la muestra con sus pequeños hijos, llenó de satisfacción a Fabiola López. ""En particular, me llamaron la atención los proyectos Barrro Pequeño, Trusken (greda y vidrio) y los de cerámica"".  El 6° Encuentro Local tendrá un nutrido programa de talleres para profesionales del diseño, público general y la familia. Entre los destacados, Chile Diseño, asociación sin fines de lucro que vela por el desarrollo de la disciplina en Chile, dictará charlas para capacitar a quienes recién inician proyectos de emprendimiento, especialmente en materias de branding express, punto de venta, diseño de negocios y packaging. Encuentro Local mantendrá sus puertas abiertas entre las 11:00 y las 20:00 horas en Puma 1180, Recoleta y la entrada es liberada."',13,1);
INSERT INTO articulo VALUES(DEFAULT,'Chile Diseño reconoce a los mejores proyectos del año','En el marco de la Sexta Bienal de Diseño, que se desarrolló en enero en el Centro Cultural Estación Mapocho, la asociación que reúne a las principales empresas y personalidades de la industria, Chile Diseño, reconoció las propuestas más representativas, destacadas e innovadoras del diseño profesional en nuestro país en sus distintos formatos.','"Los premios Chile Diseño 2017 recayeron en 14 proyectos que fueron evaluados por aportar una nueva mirada al diseño nacional, varios de los cuales cuentan con una fuerte participación de productos impresos.  “En este espacio de celebración no nos preocupa distinguir lo que es tuyo, de lo que es mío. Hoy nos preocupa lo que es nuestro, aquello que nos representa como grupo. No estamos para lamentar aquello que nos falta, más bien, queremos reconocer lo que se ha logrado, no seguir hablando de lo que nos separa, más bien pensando en lo que nos une. Hoy, aunque parezca paradójico, hemos aprendido que se compite mejor colaborando y esa es justamente la esencia de una asociación”, explicó Roberto Concha, presidente de Chile Diseño. Por su parte, el vicepresidente de la entidad, Agustín Quiroga, señaló que “esta versión de los premios Bienal Chile Diseño fue especial en muchos sentidos. Sentimos que marca el inicio de una nueva era, donde todos los esfuerzos de las diferentes instituciones, personas y empresas se están haciendo tangibles, se ven avances concretos en materia de diseño a nivel país”."',14,1);
INSERT INTO articulo VALUES(DEFAULT,'Presentan ponencia sobre Allan Browne en Bienal de Diseño','Profesor Alvaro Huirimilla expuso sobre el aporte del destacado académico al diseño nacional.','“Allan Browne: de la ilustración al diseño. Anotaciones visuales del aporte de su obra al desarrollo del diseño gráfico en Chile”, fue el nombre de la ponencia que el profesor de la Escuela de Diseño UV Alvaro Huirimilla expuso en la 6ª Bienal de Diseño, que se desarrolla en el Centro Cultural Estación Mapocho, en Santiago. La investigación recoge y analiza tanto la obra de diseño editorial realizada por el arquitecto Allan Browne Escobar, como también su pensamiento disciplinar, desarrollado principalmente en Ediciones Universitarias de Valparaíso y el Sello Editorial Universidad de Valparaíso. Tal como se señala en la presentación, ambas dimensiones de Browne se vinculan a su vez con su experiencia docente en la Escuela de Diseño de la Universidad de Valparaíso. A través de entrevistas a actores claves y una revisión de las publicaciones más relevantes realizadas por Browne como director de Arte es posible describir y reconstituir el escenario del diseño editorial universitario en Valparaíso entre las décadas de 1970 y 1990 en formato de documental audiovisual.',15,1);



INSERT INTO video VALUES(DEFAULT,'Introducción','Un video de introducción para conocer en qué consiste el curso','5YiU9dgB6ZQ',1);
INSERT INTO video VALUES(DEFAULT,'Sintaxis','En este video se muestra únicamente la sintaxis de CSS','DV42C-yyUyI',1);
INSERT INTO video VALUES(DEFAULT,'Presentación. Vídeo 1','Comenzamos un nuevo curso de HTML5. En este vídeo de presentación vemos los contenidos que se impartirán durante el curso.','QC9_8nRNNHA',1);
INSERT INTO video VALUES(DEFAULT,'Conceptos básicos. Vídeo 2','Comenzamos a ver algunos de los conceptos básicos de HTML 5. En qué consiste exactamente esta tecnología o estándar. Creamos ya nuestra primera página web en HTML 5.','CdfMG_Qy00E',1);
INSERT INTO video VALUES(DEFAULT,'Introducción e Instalación del AppServ','En este video, podran aprender como instalar el AppServ, el pack que contiene el servidor y Base de datos con el cual estaremos trabajando en los videos, ademas de una pequeña intro a lo que es el lenguaje PHP y como funciona.','sEfcmo-THjM',1);
INSERT INTO video VALUES(DEFAULT,'Editores e Imprimir Datos con Echo y Print','Aprende que editores puedes usar para trabajar en PHP y las sentencias que nos permiten imprimir datos en pantalla tales como la son echo y print.','feFxj6xz0hE',1);

INSERT INTO tutorial VALUES(DEFAULT, 'Curso CSS','Bienvenido al nuevo curso de CSS, aquí aprenderás todas las propiedades de las hojas de estilo que te permitirán crear impresionantes diseños en internet. Aprender·s desde lo básico hasta lo más nuevo de CSS3.',1);
INSERT INTO tutorial VALUES(DEFAULT,'Curso HTML5','Conoce y aprende a usar las nuevas etiquetas del estándar de HTML.',1);
INSERT INTO tutorial VALUES(DEFAULT,'Curso PHP','Este curso explica programación orientada a objetos desde cero, para verlo sólo requieres de: conocimientos básicos de PHP, un servidor (preferiblemente local) donde puedas ejecutar el código PHP y por supuesto muchos ánimos de aprender.',1);


INSERT INTO video_es_parte_de_tutorial VALUE(1,1);
INSERT INTO video_es_parte_de_tutorial VALUE(2,1);
INSERT INTO video_es_parte_de_tutorial VALUE(3,2);
INSERT INTO video_es_parte_de_tutorial VALUE(4,2);
INSERT INTO video_es_parte_de_tutorial VALUE(5,3);
INSERT INTO video_es_parte_de_tutorial VALUE(6,3);

INSERT INTO video VALUES(DEFAULT,'Architectural Workshop - Aprende los mejores programas de diseño','Aprende ON-LINE y Presencial - Completos los 7 programas más usados en la Arquitectura por solo $2,000.00 pesos (2 mil pesos) y Ex-alumnos con precio especial!','M8uulPtlYXE',1);
INSERT INTO video VALUES(DEFAULT,'Diseño Editorial Workshop by Oscar Amado','video promocional de Workshop','3nVLVNRuuwQ',1);
INSERT INTO video VALUES(DEFAULT,'Director de Revistas Alternativas Académicas - Juan Emilio Henríquez - Diseñador ULS','Juan Emilio Henríquez, egresado de la carrera Diseño, nos habla acerca de su paso por la Universidad de La Serena y además nos cuenta sobre su innovador emprendimiento regional y su paso por uno de los Seminarios más importantes de Sudamérica como expositor. Te invitamos a revisarla!.','ki8UkdVq3-w',1);

INSERT INTO video_es_workshop VALUE(7,1);
INSERT INTO video_es_workshop VALUE(8,2);
INSERT INTO video_es_workshop VALUE(9,3);

INSERT INTO workshop VALUE(DEFAULT,'Architectural Workshop','Aprende ON-LINE y Presencial - Completos los 7 programas más usados en la Arquitectura por solo $2,000.00 pesos (2 mil pesos) y Ex-alumnos con precio especial!','26 de octubre','Estudio V Legaria',1);
INSERT INTO workshop VALUE(DEFAULT,'Diseño Editorial Workshop','Workshop de Diseño Editorial','27 de septiembre','Hornopirén 800',1);
INSERT INTO workshop VALUE(DEFAULT,'Director de Revistas Alternativas Académicas','Juan Emilio Henríquez, egresado de la carrera Diseño, nos habla acerca de su paso por la Universidad de La Serena y además nos cuenta sobre su innovador emprendimiento regional y su paso por uno de los Seminarios más importantes de Sudamérica como expositor. Te invitamos a revisarla!.','20 de agosto','Universidad de La Serena',1);

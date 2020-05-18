# PAW2020-TP3-Salinas-Garrós
 Entrega del trabajo práctico 3 para Programación Web de Luján.

*Objetivo: Construir una aplicación web que utilice un servicio de persistencia externo (SGBD) y buenas prácticas de código basadas en patrones conocidos, como MVC y OOP.*

**1. Extienda el sistema de gestión de turnos médicos para que los datos sean persistidos sobre una base de datos MySQL usando PDO. La generación del número de turno debe hacerse vía motor de base de datos. ¿Qué cambios hubo que realizar para la generación del id?**

Los cambios realizados en el código del sistema fue eliminar el ID de la clase turno y en la base de datos agregar que autogenere los ID correspondientes. También en la clase QueryBuilder.php se agregó una función de PDO para que devuelva el ultimo id ingresado en la base de datos.

**2. Modifique el sistema para permitir que las imágenes sean persistidas sobre la base de datos. El software debe permitir cargar imágenes de hasta 10 MB. Si la imagen pesa más, se le debe informar al usuario este inconveniente, y pre-cargando el formulario con los datos ingresados, solicitar una nueva imagen.**

**3. Implemente Modificación y Baja de los registros del sistema de turnos.**

**4. Cada acción del ABM debe ser registrada usando el Logger del framework. Cada log debe ser de tipo INFO y almacenar fecha y hora, operación (ABM), y turno afectado (id). En los casos de modificación y baja, almacene el registro completo. ¿Considera esto util? ¿En que casos puede llegar a utilizarse?**

La herramienta utilizada en el framework para el log utiliza la instancia logger, la cual es muy útil para llevar un registro de las operaciones realizadas en el sistema, por ejemplo al eliminar un registro de forma física y no lógica, se almacena este para llevar un posible control del registro eliminado o si se desea recuperar.

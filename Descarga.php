<?php
// Creamos un instancia de la clase ZipArchive
 $zip = new ZipArchive();
// Creamos y abrimos un archivo zip temporal
 $zip->open("Curriculums.zip",ZipArchive::CREATE);
 // Añadimos un directorio
 $dir = 'CVS';

 $directorio = 'CVS';
 $archivos =array_slice(scandir($directorio),2);
 foreach($archivos as $archivo){
    //Añadimos un archivo dentro del directorio que hemos creado
    $zip->addFile("CVS/".$archivo);
}

 // Una vez añadido los archivos deseados cerramos el zip.
 $zip->close();
 // Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
 header("Content-type: application/octet-stream");
 header("Content-disposition: attachment; filename=Curriculums.zip");
 // leemos el archivo creado
 readfile('Curriculums.zip');
 // Por último eliminamos el archivo temporal creado
 unlink('Curriculums.zip');//Destruye el archivo temporal

?>
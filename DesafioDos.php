<?php 
require_once 'Database.php';

class DesafioDos {
    // El tipo de datos en el parametro debe se ser de tipo string la cual modifique
    public static function retriveLotes(string $loteID):void {

        Database::setDB(); 

        echo(json_encode(self::getLotes($loteID)));
    }
    
    // El tipo de datos en el parametro debe se ser de tipo string la cual modifique
    private static function getLotes (string $loteID){
        $lotes = [];
        $cnx = Database::getConnection();

        //Elimino la cláusula  LIMIT 2 ya que este limita el número de filas devueltas
        $stmt = $cnx->query("SELECT * FROM debts WHERE lote = '$loteID' ");
        while($rows = $stmt->fetchArray(SQLITE3_ASSOC)){
            $lotes[] = (object) $rows;
        }
        return $lotes;
    }
}

DesafioDos::retriveLotes('00148');
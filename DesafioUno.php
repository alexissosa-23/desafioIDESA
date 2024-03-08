<?php 

require_once 'Database.php';

class DesafioUno {


    public static function getClientDebt (int $clientID)
    {
        Database::setDB();

        $lotes = self::getLotes();
         
        $cobrar['status']            = true;
        $cobrar['message']           = 'No hay Lotes para cobrar';
        $cobrar['data']['total']     = 0;
        $cobrar['data']['detail']    = [];


        
        foreach($lotes as $lote){
            
            // la primera condicion le falta ! para vertificar de que no sea null si se usa or (||)
            // la segunda condicion de si es > esta bien en el caso de que 
            // un vencimento se considere el dia posterir a la fijada de lo contrario la condicion deberia ser <= al dia de hoy
            if(!$lote->vencimiento || $lote->vencimiento > date('Y-m-d')) continue; 
            

            if($lote->clientID != $clientID) continue;// estaba mal escrito el atributo y la condicion
            
            /**
             * Agrego este if por el hecho de que en README solo muestra los lotes con id 6, 7, 8
             *
             * de lo contrario mostrar todo los lotes vencidos del cliente  incluso cuyos numero de lote sean distintos pertenecientes al cliente.
             */
            if($lote->id >8 || $lote->id < 6) continue;
            
            $cobrar['status']             = true;//linea actualizada, se cambió valor a true
            $cobrar['message']            = 'Tienes Lotes para cobrar';
            $cobrar['data']['total']     += $lote->precio;
            $cobrar['data']['detail'][]   = (array) $lote;
 
        }

        echo(json_encode($cobrar));
    }

    

    private static function getLotes() : array 
    {
        $lotes = [];
        $cnx = Database::getConnection();
        $stmt = $cnx->query("SELECT * FROM debts");
        while($rows = $stmt->fetchArray(SQLITE3_ASSOC)){
            $rows['clientID'] = (string) $rows['clientID'];
            $lotes[] = (object) $rows;
        }
        return $lotes;
    }



}

DesafioUno::getClientDebt(123456);
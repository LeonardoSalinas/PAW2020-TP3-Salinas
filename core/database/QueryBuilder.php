<?php

namespace App\Core\Database;

use PDO;
use Exception;

class QueryBuilder
{
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     */
    public function __construct($pdo, $logger = null)
    {
        $this->pdo = $pdo;
        $this->logger = ($logger) ? $logger : null;
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function selectItem($table,$item)
    {
        $statement = $this->pdo->prepare("select * from {$table} where id={$item}");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
 
    /**
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert($table, $parameters)
    {
        $parameters = $this->cleanParameterName($parameters);
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
           
            $statement->execute($parameters);
            return  $this->pdo->lastInsertId();
        } catch (Exception $e) {
            $this->sendToLog($e);
        }
    }

    public function delete($table,$item){
        try {
            $statement = $this->pdo->prepare("delete from {$table} where id={$item}");
            $statement->execute();
          //  return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $this->sendToLog($e);
        }
            
        
    }


    public function update($table, $parameters,$filtro)
    {
        $parameters = $this->cleanParameterName($parameters);
       
        $sql = sprintf(
            'update %s set %s =? where %s= %s',
            $table,
            implode('=?, ', array_keys($parameters)),
            $filtro,
            $parameters['id']
        );
        try {
            $statement = $this->pdo->prepare($sql);
           
          
            $statement->execute(array_values( $parameters));
            
        } catch (Exception $e) {
            $this->sendToLog($e);
        }
    }

    private function sendToLog(Exception $e)
    {
        if ($this->logger) {
            $this->logger->error('Error', ["Error" => $e]);
        }
    }

    /**
     * Limpia guiones - que puedan venir en los nombre de los parametros
     * ya que esto no funciona con PDO
     *
     * Ver: http://php.net/manual/en/pdo.prepared-statements.php#97162
     */
    private function cleanParameterName($parameters)
    {
        $cleaned_params = [];
        foreach ($parameters as $name => $value) {
            $cleaned_params[str_replace('-', '', $name)] = $value ;
        }
        return $cleaned_params;
    }
}

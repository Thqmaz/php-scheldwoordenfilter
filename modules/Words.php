<?php
class Words extends Database
{
    private $column;
    private $tableName;
    private $returnColumn;
    private $active;

    public function __construct()
    {
        $this->getConnection();
    }

    public function read(String $column, String $tableName, String $returnColumn, $active)
    {
        $this->column = $column;
        $this->tableName = $tableName;
        $this->returnColumn = $returnColumn;
        $this->active = $active;

        $query = "SELECT $this->column FROM $this->tableName WHERE `active`=$this->active";
        $result = $this->connection->query($query);
        $array = array();
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row[$this->returnColumn]);
        }
        return ($array);
    }

    public function replace(String $inputText, array $swearWords)
    {
        $filtered_text = str_replace($swearWords, "****", $inputText);
        return $filtered_text;
    }
}

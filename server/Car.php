<?php
class Car
{
    protected $conn;

    public function __construct()
    {
        $this->user = USER;
        $this->dB = DB;
        $this->host = HOST;
        $this->password = PASSWORD;
    }

    public function getConn()
    {
        try {
            if (!isset($this->user) || !isset($this->dB) || !isset($this->host) || !isset($this->password)) {
                throw new Exception('Something wrong with filds connect to DB mysql');
            } else {
                $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->dB);
                if ($this->conn) {
                    echo "Connect";
                }
            }
        } catch (Exception $connectExeption) {
            echo $connectExeption->getMessage(), "\n";
        }
        return $this->conn;
    }

    public function getListOfCars()
    {
        $result = mysqli_query($this->conn, "SELECT id, marka, model FROM AutoShop");
        while ($row[] = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        }
        return $row;


    }
    
     public function getListOfCarsById($id)
    {
        $result = mysqli_query($this->conn, "SELECT id, marka, model, year_car, engine_capacity, color, max_speed, price FROM AutoShop where id = $id ");
        while ($row[] = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        }
        return $row;

    }
    
     public function getListOfCarsByParams()
    {
        $conditions = array();
        $columns = array();
        for ($i = 0; $i < 9; $i++) {
        if (!empty(${'s' . $i})) {
         $conditions[] = sprintf("%s = '%s'", $columns[$i], ${'s' . $i});
        }
        }
            $query = mysqli_query($this->conn, 'SELECT * FROM AutoShop');
        if (sizeof($conditions)) {
        $query .= ' WHERE ' . implode(' AND ', $conditions);
        }
          while ($row[] = mysqli_fetch_array($query, MYSQL_ASSOC)) {
        }
        return $row;
         
         
         
         
         
         
      /*   
        $result = mysqli_query($this->conn, "SELECT id, marka, model, year, engine_capacity, color, max_speed, price FROM AutoShop where id = $id");
        while ($row[] = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        }
        return $row;

*/
    }
}
?>

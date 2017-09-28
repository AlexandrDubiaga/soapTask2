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
    
     public function getListOfCarsByParams($searchcontact)
    {
         
         $sql="select AutoShop.id, AutoShop.marka, AutoShop.model, AutoShop.year_car, AutoShop.engine_capacity, AutoShop.color, AutoShop.max_speed, AutoShop.price  (AutoShop.id like '%$searchcontact%')
         AS sovp1, (AutoShop.marka like '%$searchcontact%') AS sovp2, (AutoShop.model like '%$searchcontact%') AS sovp3, (AutoShop.year_car like '%$searchcontact%') AS sovp4, (AutoShop.engine_capacity like '%$searchcontact%') AS sovp5, (AutoShop.color like '%$searchcontact%') AS sovp6, (AutoShop.max_speed like '%$searchcontact%') AS sovp7, (AutoShop.price like '%$searchcontact%')  HAVING sovp1+sovp2+sovp3+sovp4+sovp5+sovp6+sovp7>=2;"
          while ($row[] = mysqli_fetch_array($sql, MYSQL_ASSOC)) {
        }
        return $row;
         
        /* $conditions = array();
        $columns = array('one', 'two', 'three', 'four', 'five', 'six', 'seven');
        for ($i = 0; $i < 8; $i++) {
        if (!empty(${'s' . $i})) {
         $conditions[] = sprintf("%s = '%s'", $columns[$i], ${'s' . $i});
        }
        }
            $query = 'SELECT * FROM invoices';
        if (sizeof($conditions)) {
     $query .= ' WHERE ' . implode(' AND ', $conditions);
}
         */
         
         
         
         
         
      /*   
        $result = mysqli_query($this->conn, "SELECT id, marka, model, year, engine_capacity, color, max_speed, price FROM AutoShop where id = $id");
        while ($row[] = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        }
        return $row;

*/
    }
}
?>

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
                    return true;
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
        if(!empty($id) && isset($id))
        {
            $result = mysqli_query($this->conn, "SELECT id, marka, model, year_car, engine_capacity, color, max_speed, price FROM AutoShop where id = $id ");
            while ($row[] = mysqli_fetch_array($result, MYSQL_ASSOC))
            {}
            return $row;
        }
        else
        {
            return false;
        }
        return false;
     }
    
     public function getListOfCarsByParams($arr)
     {
       foreach ($arr as $field => $value) {
            if ($value) {
            $conditions[] = sprintf("%s = '%s'", $field, $value);  
            }
        }
            $res = implode(' AND ',   $conditions); 
            if (sizeof($res))
            {
            $result = mysqli_query($this->conn, "SELECT * FROM AutoShop WHERE $res");
            while ($row[] = mysqli_fetch_array($result, MYSQL_ASSOC)) {}
            return $row;
            }
      }

    public function getOrderCar($arr)
    {
        if (!empty($arr['id_car']) && !empty($arr['name']) && !empty($arr['sername']) && !empty($arr['pay']))
        {
            $sql = mysqli_query($this->conn,"INSERT INTO Orders (id_car, name, sername, pay) VALUES (" .$arr['id_car'].", ".$arr['name'].", ".$arr['sername'].", ".$arr['pay'].")");
            var_dump($sql);
            if($sql)
            {
                echo "OK";
            }
            return true;
        }
        else
        {
           return false;
        }
        return false;
    }




}
?>

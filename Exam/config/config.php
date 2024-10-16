<?php

class Config
{
    private $HOST_NAME = "localhost";
    private $USER_NAME = "root";
    private $PASSWORD = "";
    private $DB_NAME = "exam";

    public $conn;
    function initConfig()
    {
        $this->conn = mysqli_connect($this->HOST_NAME, $this->USER_NAME, $this->PASSWORD, $this->DB_NAME);
    }

    function addUser($name, $email, $ph_no, $address)
    {
        $this->initConfig();

        $query = "INSERT INTO users(user_name,user_email,ph_no,address) VALUES('$name','$email',$ph_no,'$address');";

        $res = mysqli_query($this->conn, $query);
        return $res;
    }

    function fetchSingleUser($id)
    {
        $this->initConfig();

        $query = "SELECT * FROM users WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    function fetchAllUser()
    {
        $this->initConfig();

        $query = "SELECT * FROM users;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    function updateUser($name, $email, $ph_no, $address, $id)
    {

        $this->initConfig();

        $query = "UPDATE users SET user_name='$name', user_email='$email', ph_no=$ph_no, address='$address' WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    function deleteUser($id)
    {

        $this->initConfig();

        $query = "DELETE FROM users WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    function addTrain($train_name, $seat_count, $runs_on_days)
    {
        $this->initConfig();

        $query = "INSERT INTO train(train_name,seat_count,runs_on_days) VALUES('$train_name',$seat_count,'$runs_on_days');";

        $res = mysqli_query($this->conn, $query);
        return $res;
    }

    function fetchSingleTrain($id)
    {
        $this->initConfig();

        $query = "SELECT * FROM train WHERE train_id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    function fetchAllTrains()
    {
        $this->initConfig();

        $query = "SELECT * FROM train;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    function updateTrain($name, $seat_count, $runs_on_days,$id)
    {

        $this->initConfig();

        $query = "UPDATE train SET train_name='$name', seat_count=$seat_count,runs_on_days='$runs_on_days' WHERE train_id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    function deletetrain($id)
    {

        $this->initConfig();

        $query = "DELETE FROM train WHERE train_id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

}


?>
<?php
class User
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'task1';
    public $conn;
    public $userTable = 'tbl_users';


    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function addUser($userName, $cPass, $fullName, $birthDate, $imageAvatar, $status, $createTime)

    {
        $sql = "INSERT INTO $this->userTable(v_username,v_password,v_fullname,d_birth_of_day,v_avatar,f_is_active, d_created_time ) VALUES('$userName','$cPass','$fullName','$birthDate','$imageAvatar','$status','$createTime')";
        $query = $this->conn->query($sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function getAllData()
    {
        $sql = "SELECT * FROM $this->userTable ORDER BY n_id  DESC";
        $query = $this->conn->query($sql);
        $data = array();
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    public function deleteUser($idUser)
    {
        $sql = "DELETE FROM $this->userTable WHERE n_id=$idUser";
        $query = $this->conn->query($sql);
        /*         $data = array(); */
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function updateUser($idUser, $userName, $fullName, $birthDate, $imageAvatar, $d_updated_time)
    {
        echo $sql = "UPDATE $this->userTable SET v_username='$userName', v_fullname='$fullName', d_birth_of_day='$birthDate',v_avatar='$imageAvatar',d_updated_time='$d_updated_time' WHERE n_id=$idUser";
        $query = $this->conn->query($sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function checkInput($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    public function listUsers($counter, $idUser, $userName, $fullName, $birthDay, $avatar, $created)
    {
        $element = '<tr>
        <td> ' . $counter . '</td>
        <td id="name' . $idUser . '">' . $userName . '</td>
        <td id="full' . $idUser . '">' . $fullName . '</td>
        <td id="day' . $idUser . '">' . $birthDay . '</td>
        <td id="img' . $idUser . '">' . $avatar . '</td>
        <td>' . $created . '</td>
        <td>
       <div class="row m-0 p-0">
       <div class="col p-0"><a  data-id="' . $idUser . '" class="btn-sm btn-success btn-view">View</a></div>
       <div class="col p-0"><a  data-id="' . $idUser . '" class="m-1 btn-sm btn-warning btn-edit"> Edit</a></div>
       <div class="col p-0"><a  data-id="' . $idUser . '" class="btn-sm btn-danger btn-delete">Delete</a></div>
       </div>
    </td>
        </tr>';
        echo $element;
    }
}

<?php

class Sessions {

    public $APP_TITLE = "Internally Displaced Person Information Tracking";
    public $APP_SYMBOL = "I.D.P.I.T";
    private $DB_USER = "root";
    private $DB_PASSWORD = "";
    private $DB_DSN = "mysql:host=localhost;dbname=idpinformation";

    private function getConnection() { //create database connection
        try {
            $conn = new PDO($this->DB_DSN, $this->DB_USER, $this->DB_PASSWORD);
            return $conn;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function checkUsername($uname) {
        $conn = $this->getConnection();
        $query = "SELECT * FROM login WHERE loginid = ?";
        $ps = $conn->prepare($query);
        $ps->bindParam(1, $uname);
        $ps->execute();
        $result = $ps->fetchAll();
        $res = NULL;
        foreach ($result as $r) {
            $res = $r;
        }
        return ($res == NULL);
    }

    public function userLogin($username, $password) {
        $conn = $this->getConnection();
        $query = "SELECT * FROM login WHERE loginid = ? and password = ?";
        $ps = $conn->prepare($query);
        $ps->bindParam(1, $username);
        $ps->bindParam(2, $password);
        $ps->execute();
        $result = $ps->fetchAll();
        $res = NULL;
        foreach ($result as $r) {
            $res = $r;
        }
        return $res;
    }

    public function newLogin($userid, $password, $role, $camp) {
        try {
            $conn = $this->getConnection();
            $query = "INSERT INTO login VALUES(?,?,?,?)";
            $ps = $conn->prepare($query);
            $ps->bindParam(1, $userid);
            $ps->bindParam(2, $password);
            $ps->bindParam(3, $role);
            $ps->bindParam(4, $camp);
            $ps->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function removeSingleLogin($loginid) {
        try {
            $conn = $this->getConnection();
            $query = "DELETE FROM login WHERE loginid = ?";
            $ps = $conn->prepare($query);
            $ps->bindParam(1, $loginid);
            return $ps->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function newCamp($camp_name, $address, $state, $lga, $admin_fullname, $email, $mobile) {
        try {
            $conn = $this->getConnection();
            $query = "INSERT INTO camp(camp_name,address,state,lga,admin_fullname,"
                    . "email,mobile) VALUES(?,?,?,?,?,?,?)";
            $ps = $conn->prepare($query);
            $ps->bindParam(1, $camp_name);
            $ps->bindParam(2, $address);
            $ps->bindParam(3, $state);
            $ps->bindParam(4, $lga);
            $ps->bindParam(5, $admin_fullname);
            $ps->bindParam(6, $email);
            $ps->bindParam(7, $mobile);
            $ps->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getSingleCamp($campid) {
        try {
            $conn = $this->getConnection();
            $query = "SELECT * FROM camp WHERE campid = ?";
            $ps = $conn->prepare($query);
            $ps->bindParam(1, $campid);
            $ps->execute();
            $result = $ps->fetchAll();
            $res = NULL;
            foreach ($result as $r) {
                $res = $r;
            }
            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getSingleCampByAdmin($email) {
        try {
            $conn = $this->getConnection();
            $query = "SELECT * FROM camp WHERE email = ?";
            $ps = $conn->prepare($query);
            $ps->bindParam(1, $email);
            $ps->execute();
            $result = $ps->fetchAll();
            $res = NULL;
            foreach ($result as $r) {
                $res = $r;
            }
            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getAllCamp() {
        try {
            $conn = $this->getConnection();
            $query = "SELECT * FROM camp";
            $ps = $conn->prepare($query);
            $ps->execute();
            return $ps->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function newIDP($fullname, $email, $mobile, $dob, $state, $lga, $village, $gender, $camp, $img_url, $last_home_address) {
        $reg_date = date("d M Y");
        try {
            $conn = $this->getConnection();
            $query = "INSERT INTO idp(fullname,email,mobile,dob,state,lga,village,"
                    . "gender,camp,img_url,last_home_address,reg_date) "
                    . "VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
            $ps = $conn->prepare($query);
            $ps->bindParam(1, $fullname);
            $ps->bindParam(2, $email);
            $ps->bindParam(3, $mobile);
            $ps->bindParam(4, $dob);
            $ps->bindParam(5, $state);
            $ps->bindParam(6, $lga);
            $ps->bindParam(7, $village);
            $ps->bindParam(8, $gender);
            $ps->bindParam(9, $camp);
            $ps->bindParam(10, $img_url);
            $ps->bindParam(11, $last_home_address);
            $ps->bindParam(12, $reg_date);
            $ps->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getSingleIDP($id) {
        try {
            $conn = $this->getConnection();
            $query = "SELECT * FROM idp WHERE idpid = ?";
            $ps = $conn->prepare($query);
            $ps->bindParam(1, $id);
            $ps->execute();
            $result = $ps->fetchAll();
            $res = NULL;
            foreach ($result as $r) {
                $res = $r;
            }
            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getAllIDP() {
        try {
            $conn = $this->getConnection();
            $query = "SELECT * FROM idp";
            $ps = $conn->prepare($query);
            $ps->execute();
            return $ps->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getAllIDPByCamp($camp) {
        try {
            $conn = $this->getConnection();
            $query = "SELECT * FROM idp WHERE camp = ?";
            $ps = $conn->prepare($query);
            $ps->bindParam(1, $camp);
            $ps->execute();
            return $ps->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function getAllIDPByGender($gender) {
        try {
            $conn = $this->getConnection();
            $query = "SELECT * FROM idp WHERE gender = ?";
            $ps = $conn->prepare($query);
            $ps->bindParam(1, $gender);
            $ps->execute();
            return $ps->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function searchIDP($search_string) {
        try {
            $conn = $this->getConnection();
            $query = "SELECT * FROM idp WHERE fullname LIKE '%$search_string%'";
            $ps = $conn->prepare($query);
            $ps->execute();
            return $ps->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function newStaff($email, $fullname, $mobile, $camp) {
        try {
            $conn = $this->getConnection();
            $query = "INSERT INTO staff VALUES(?,?,?,?)";
            $ps = $conn->prepare($query);
            $ps->bindParam(1, $email);
            $ps->bindParam(2, $fullname);
            $ps->bindParam(3, $mobile);
            $ps->bindParam(4, $camp);
            $ps->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getSingleStaff($email) {
        try {
            $conn = $this->getConnection();
            $query = "SELECT * FROM staff WHERE email = ?";
            $ps = $conn->prepare($query);
            $ps->bindParam(1, $email);
            $ps->execute();
            $result = $ps->fetchAll();
            $res = NULL;
            foreach ($result as $r) {
                $res = $r;
            }
            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getAllStaff() {
        try {
            $conn = $this->getConnection();
            $query = "SELECT * FROM staff";
            $ps = $conn->prepare($query);
            $ps->execute();
            return $ps->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getAllStaffByCamp($camp) {
        try {
            $conn = $this->getConnection();
            $query = "SELECT * FROM staff WHERE camp = ?";
            $ps = $conn->prepare($query);
            $ps->bindParam(1, $camp);
            $ps->execute();
            return $ps->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function removeSingleStaff($email) {
        try {
            $conn = $this->getConnection();
            $query = "DELETE FROM staff WHERE email = ?";
            $ps = $conn->prepare($query);
            $ps->bindParam(1, $email);
            return $ps->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

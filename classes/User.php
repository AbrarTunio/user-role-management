<?php

class User 
{

   
    public $name;
    public $email;
    public $password;
    public $role;


    public static function getAllUsers( $conn ){
        $query = "SELECT id, email , password FROM users";
        $result = mysqli_query( $conn , $query );
        return mysqli_fetch_all(  $result , MYSQLI_ASSOC  );
    }


    public static function getLimitedUsers( $conn , $count ){
        $query = "SELECT users.id, users.name, users.status, users.email, users.role_id, roles.role FROM users 
                  LEFT JOIN roles ON users.role_id = roles.id ORDER BY users.id DESC LIMIT ?";
        $stmt = mysqli_prepare( $conn , $query );
        mysqli_stmt_bind_param( $stmt , 'i' , $count );
        if ( mysqli_stmt_execute( $stmt ) ){
            $result = mysqli_stmt_get_result( $stmt );
            return mysqli_fetch_all( $result , MYSQLI_ASSOC );
        }
    }

    public static function getById($conn , $id){
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = mysqli_prepare( $conn , $query );
        mysqli_stmt_bind_param( $stmt , 'i' , $id );
        if ( mysqli_stmt_execute( $stmt ) ){
            $result = mysqli_stmt_get_result( $stmt );
            return mysqli_fetch_assoc( $result );
        }
    }

    public static function authenticate( $conn , $email ){
        $query = "SELECT name , email , password, status, roles.role FROM users JOIN roles ON users.role_id = roles.id WHERE email = ? ";
        $stmt = mysqli_prepare( $conn , $query );

        mysqli_stmt_bind_param( $stmt , 's' , $email );

        if ( mysqli_stmt_execute($stmt ) ){
            $data = mysqli_stmt_get_result( $stmt );
            return mysqli_fetch_assoc( $data );        
        }
    }

    public static function getRoles($conn){
        $query = "SELECT id , role FROM roles";
        $result = mysqli_query( $conn , $query );
        return mysqli_fetch_all( $result , MYSQLI_ASSOC );
    }

    public function createOne( $conn ){
        $query = "INSERT INTO users ( name , email , password   ) VALUES( ? , ? , ?  ) ";
        $stmt = mysqli_prepare( $conn , $query );

        mysqli_stmt_bind_param( $stmt , 'sss' , $this->name , $this->email , $this->password  )
        ;

        if ( mysqli_stmt_execute( $stmt ) ){
            // return mysqli_insert_id( $conn );
            return true;
        }

    }

    public static function updateStatusAndRole($conn , $role_id , $status , $id ){
        $query = "UPDATE users SET users.role_id = ? , users.status = ?  WHERE users.id = ?";
        $stmt = mysqli_prepare( $conn , $query );

        mysqli_stmt_bind_param( $stmt , 'iii' , $role_id , $status , $id  );

        if ( mysqli_stmt_execute( $stmt ) ){
            // return mysqli_insert_id( $conn );
            return true;
        }
    }



}
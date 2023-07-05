<?php


class Categoria extends Connect{


    public function get_categoria(){
        $connect=parent::Connection();

        parent::set_name();
    
        $sql="SELECT * FROM tm_categoria WHERE status=1";
        $sql=$connect->prepare($sql);
        $sql->execute();
    
        return $result=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_categoria_per_id($id){
        $connect=parent::Connection();

        parent::set_name();
    

        $statement=$connect->prepare("SELECT * FROM tm_categoria WHERE cat_id = :cat_id");
        $statement->bindParam(":cat_id",$id);
        
        $statement->execute();
    
        return $result=$statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function new_categoria($name,$obs){
        $connect=parent::Connection();

        parent::set_name();
    

        $statement=$connect->prepare("INSERT INTO tm_categoria (cat_id, cat_name, cat_obs, status) VALUES (NULL, :name, :obs, 1)");
        $statement->bindParam(":name",$name);
        $statement->bindParam(":obs",$obs);
        
        return $statement->execute();

    }

    public function update_categoria($id,$name,$obs){
        $connect=parent::Connection();

        parent::set_name();

        $statement=$connect->prepare("UPDATE tm_categoria SET cat_name = :name, cat_obs = :obs WHERE `tm_categoria`.`cat_id` = :id");
        $statement->bindParam(":name",$name);
        $statement->bindParam(":obs",$obs);
        $statement->bindParam(":id",$id);
        return $statement->execute();

    }

    public function toggle_categoria($id,$status){
        $connect=parent::Connection();

        parent::set_name();
        
        $statement=$connect->prepare("UPDATE tm_categoria SET status = :status WHERE `tm_categoria`.`cat_id` = :id");
        $statement->bindParam(":status",$status);
        $statement->bindParam(":id",$id);
        return $statement->execute();

    }
  
}
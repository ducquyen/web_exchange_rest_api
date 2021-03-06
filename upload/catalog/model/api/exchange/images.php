<?php

/**
 * Class ModelApiExchangeImages
 */

class ModelApiExchangeImages extends Model {

    /**
     * Checking image by name, is image already present in table
     * @param $img_name String
     * @return bool
     */
    function isImagePresent($img_name){
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "images` WHERE `img_name` LIKE '$img_name'");
        if ($query->num_rows === 0){
            return false;
        } else return true;
    }

    /**
     * Inserting image name and hash in to database
     * @param $img_name String
     * @param $hash String
     */
    function insertImage($img_name, $hash){
        $this->db->query("INSERT INTO `" . DB_PREFIX . "images` (img_name, hash) VALUES('$img_name', '$hash')");
    }

    /**
     * Updating image hash by name
     * @param $img_name String
     * @param $hash String
     */
    function updateImageHashByName($img_name, $hash){
        $this->db->query("UPDATE `" . DB_PREFIX . "images` SET `hash`='$hash' WHERE `img_name` LIKE '$img_name'");
    }

    /**
     * Deleting image by name
     * @param $img_name
     */
    function deleteImageByName($img_name){
        $this->db->query("DELETE FROM `" . DB_PREFIX . "images` WHERE `img_name` = '$img_name'");
    }

    /**
     * Getting all images from table 'images'
     * @return mixed
     */
    function getAllImages(){
        return $this->db->query("SELECT * FROM `" . DB_PREFIX . "images` WHERE 1");
    }

}
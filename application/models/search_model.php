<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    //Extract Cities containing airports 
    class search_model extends CI_Model{
        public function extract(){
            $this->load->database(); // load the database
            $query=$this->db->query("select * from airports"); //select cities from database
            if($query->num_rows()>0){ 
                return $query->result(); //return the data
            }
        }
        // Extract the destination cities containing airports 
        public function destination($city){
            $this->load->database();
            $query=$this->db->query("select * from airports where city!='$city'");//select cities from database where city is not equal to source city
            if($query->num_rows()>0){ 
                return $query->result();
            }
        }
        // Extract Details of flights with respect to source and destination
        public function displaydetails($source,$destination,$date,$passengers){
            $this->load->database();
            $query=$this->db->query("select * from details where source='$source' and destination='$destination'");//search the flights connecting source and destination
            if($query->num_rows()>0){ 
                return $query->result();
            }
        }
        //Store the booked infromation
        public function insert($name,$source,$destination,$passengers,$date){
            $this->load->database();
            $query=$this->db->query("insert into booked(name,source,destination,passengers,date,confirm) values('$name','$source','$destination','$passengers','$date','Booked')");
            //insert the details of filghts booked
        
        }

    }
?> 
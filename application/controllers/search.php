<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
//class for the controller which control the web-application
class search extends CI_Controller{
    //constructor to auto load the modules,libraries,helpers,database etc,
    public function __construct(){
        parent ::__construct();
        $this->load->helper(array('url','form'));
        $this->load->database();//loading the database
        $this->load->model('search_model'); //load the model(database connecter) 
        $this->load->library(array('form_validation'));
    }
    //extract the source cities and load the home page for searching the flights
    public function index(){
        $data['airports']=$this->search_model->extract(); //extracting the cities
        $this->load->view('search_view',$data); // loading search page with details
    }
    //source city is selected and destination cities are refreshed using ajax call
    public function destination(){
    $city=$this->input->post('city'); //posting the source city
    $data1=$this->search_model->destination($city);//calling the modal function to select destination
    //Loop the data extracted from the modal and put it in the option tag
    if(count($data1)>0){
        $box='';
        foreach($data1 as $d){
            $box .='<option value="'.$d->city.'">'.$d->city.'</option>';
        }
    }
    //displaying the data of option
    echo $box;
    }
    //Extract the details of flights and load the details page to display results
    public function details(){
        $source=$this->input->post("source"); //source city
        $destination=$this->input->post("destination"); //destination city
        $date=$this->input->post("date");   //date of journey
        $passengers=$this->input->post('passengers'); //no.of passengers
        $data['date']=$date; //storing the details for furture use
        $data['passengers']=$passengers;
        //extracting the details of flights with respect to source and destination
        $data['details']=$this->search_model->displaydetails($source,$destination,$date,$passengers);
        $this->load->view("flight_details_view",$data);//loading flight details page with details
    }
    //Storing the details of flights booked
    public function insert($data){
        $details=explode("%7C",$data); //spliting the details from the URL
        //inserting details from the details array
        $this->search_model->insert($details[0],$details[1],$details[2],$details[3],$details[4]);
        $this->load->view('confirm');//loading the confirmation page
    }
}
?>
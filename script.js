var mylatLng ={lat: 21.6338 ,lng: 82.7525};
var mapOptions={
    center: mylatLng,
    zoom: 3,
    maptypeId:google.maps.MapTypeId.ROADMAP
};




var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);


//create a direction service object 
var directionsService = new google.maps.DirectionsService();


//create a Directions Renderer object while we'll use to display routes

var directionsDisplay = new google.maps.DirectionsRenderer();


// bind the directionRenderer to map

directionsDisplay.setMap(map);

//funtion 

function calcRoute(){
    //create request
   


    var request={
        origin: document.getElementById("from").value,
        destination: document.getElementById("to").value,
        travelMode: google.maps.TravelMode.DRIVING,// WALKING , BYCYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.metric
    }

    // pass the request to the route method
    directionsService.route(request,(result,status)=>{
        if(status==google.maps.DirectionsStatus.OK) {
            //get distance and time
            let carfar=result.routes[0].legs[0].distance.text ;
            // console.log(typeof(carfar))
            
           let carfar1=carfar.replace(/\,/g,'');
            carfar1=parseInt(carfar1, 10);
            // console.log(carfar1);

            let totalfare=calcfare();
            const output=document.querySelector('#output');
            output.innerHTML="<div class='output-area' ><h1>Your Ride Details</h1><div class='output-info'>from: " +
             document.getElementById("from").value+ 
             ".<br /> To: " + document.getElementById("to").value + 
             ".<br/> Driving Distance :"+result.routes[0].legs[0].distance.text +
              ".<br/> Duration :"+ result.routes[0].legs[0].duration.text + 
              ".</div><div class'fare-distribution'></div>";
           const fareArea=document.querySelector('#fare');
           fare.innerHTML="<div class='totalfare-area'><h1>Fare for your Ride</h1><br><div class='totalfare'> "+calcfare()+"</div>";
            // console.log(typeof (totalfare))

//display routes

directionsDisplay.setDirections(result); 
// let fare = calcfare();
// console.log(calcfare());

function calcfare(){
let curDistance=0;
let distance=carfar1;
let farefirst=0;
let fare2nd=0;
let fare3rd=0;
let fare1=0 ,fare2=0, fare3=0;

if(distance>=10){
  fare1=10*5;
  curDistance=distance-10;
   farefirst=fare1;
  console.log("1st 10km fare : "+fare1);
}else{
  fare1=distance*5;
   farefirst=fare1;
  console.log("1st 10km fare : "+fare1);
}

// console.log("1st "+distance)
if(curDistance>=20){
  
  fare2=20*2;
  curDistance=curDistance-20;
   fare2nd=fare2;
    console.log("upto 20km fare : "+fare2);
} else{
  fare2=curDistance*2;
  curDistance=0;
   fare2nd=fare2;
    console.log(" upto 20km fare : "+fare2);
}

if(curDistance!=0){
  fare3=curDistance*1
   fare3rd=fare3;
    console.log("above 30km fare : "+fare3);
}

const totalFare=fare1 + fare2 + fare3;

// console.log("total fare : "+totalFare);
return "fare for 1st 10km:-<i class='fa-solid fa-indian-rupee-sign'></i>"+farefirst+
"<br>fare for 2nd 20km :-<i class='fa-solid fa-indian-rupee-sign'></i>"+fare2nd+
"<br>fare for rest Distance:-<i class='fa-solid fa-indian-rupee-sign'></i> "+fare3rd+
"<br>Total Fare for your Ride:-<i class='fa-solid fa-indian-rupee-sign'></i>"+totalFare; 

}}
       else{
        directionsDisplay.setDirections({ routes: []});

       // center map 
        map.setCenter(mylatLng);

        //Show error msg 
        output.innerHTML="<div class='alert-danger'>Could Not Retrieve driving distance.</div";

       } 
    });
    
    
}


//create autocomplete objects for all input

var options={
    types: ['(cities)']
}
var input1=document.getElementById("from");
var autocomplete1=new google.maps.places.Autocomplete(input1,options)


var input2=document.getElementById("to");
var autocomplete2=new google.maps.places.Autocomplete(input2,options)











import { Component, OnInit } from '@angular/core';
import {ActivatedRoute   } from '@angular/router';
import { HttpClient } from '@angular/common/http';

import * as moment  from 'moment' ;

@Component({
  selector: 'app-weather-details',
  templateUrl: './weather-details.component.html',
  styleUrls: ['./weather-details.component.css']
})
export class WeatherDetailsComponent implements OnInit {

  city: string;
  consolidated_weather: object;

  constructor(private route: ActivatedRoute, private http: HttpClient) { 
  	//this.params.subscribe(res => console.log(res));

  }

  ngOnInit() {
  	this.route.paramMap.subscribe(res => {
  		console.log(res.params.woeid);
  		var woeid = res.params.woeid;

  		var baseurl = 'http://02pg.com/';
  		var location_url = baseurl+'weather.php?command=location&woeid='+woeid;
  		this.http.get(location_url).subscribe(locationdata => {
	          	console.log(locationdata);
	          	this.city = locationdata.title;
	  			this.consolidated_weather = locationdata.consolidated_weather;
	  			

		  		// console.log(locationdata.consolidated_weather[0].weather_state_abbr);		      	
		   // });
	      	// console.log(data);
	      	// console.log(data[0].title);
	    });
  	});
  	//this.route.params.subscribe(res => console.log(res.params.woeid));	
  }

  public function toNumber(string){
  	return parseInt(string);
  } 

  public function toDate(string){
  	var  mydate = moment(string).format('dddd Do MMM');
  	return mydate;
  }

}

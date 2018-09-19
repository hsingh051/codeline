import { Component, OnInit, Input, HostListener } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';

@Component({
  selector: 'weather',
  templateUrl: './weather.component.html',
  styleUrls: ['./weather.component.css']
})
export class WeatherComponent implements OnInit {
  
  @Input() city: string;
  weather_state_name: string;
  weather_img_url: string;
  current_temp: number;
  max_temp: number;
  min_temp: number;
  woeid: number;

  // @HostListener('click')
  // click() {
  //   console.log(this.city);
  // }

  constructor(private http: HttpClient, private router: Router) { 

  }
  redirect() {
    console.log(this.woeid);
    this.router.navigate(['/weather/', this.woeid]); 
  }

	ngOnInit() {
		var baseurl = 'http://02pg.com/';
		var search_url = baseurl+'weather.php?command=search&keyword='+this.city;
	  	
	  	this.http.get(search_url).subscribe(data => {
	  		
	  		var woeid = data[0].woeid;
	  		var location_url = baseurl+'weather.php?command=location&woeid='+woeid;
	  		this.woeid = woeid;

	  		this.http.get(location_url).subscribe(locationdata => {
	          	console.log(locationdata);
	          	this.city = locationdata.title;
	  			this.weather_state_name = locationdata.consolidated_weather[0].weather_state_name;
	  			this.weather_img_url = 'https://www.metaweather.com/static/img/weather/'+locationdata.consolidated_weather[0].weather_state_abbr+'.svg';
	  			this.current_temp = parseInt(locationdata.consolidated_weather[0].the_temp);
	  			this.max_temp = parseInt(locationdata.consolidated_weather[0].max_temp);
	  			this.min_temp = parseInt(locationdata.consolidated_weather[0].min_temp);

		  		// console.log(locationdata.consolidated_weather[0].weather_state_abbr);		      	
		   // });
	      	// console.log(data);
	      	// console.log(data[0].title);
	    });
	}

}

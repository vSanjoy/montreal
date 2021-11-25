import { Injectable } from '@angular/core';
import { environment } from './../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class GlobalConstantService {

  constructor() { }

  API_URL = environment.api_url;

  public apiModules: any= {
    header:{
      url:environment.api_url + '/header/',
      methods:[
        {name: 'list', type:'get', url:'header-details'},
      ]
    },
    home:{
      url:environment.api_url + '/home/',
      methods:[
        {name: 'list', type:'get', url:'home-page-details'},
      ]
    },
    capture_enquiry:{
      url:environment.api_url + '/capture/',
      methods:[
        {name: 'create', type:'post', url:'enquiry'},
      ]
    },
    footer:{
      url:environment.api_url + '/footer/',
      methods:[
        {name: 'list', type:'get', url:'footer-details'},
      ]
    },
  }

}

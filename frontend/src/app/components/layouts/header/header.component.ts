import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpService } from './../../../services/http.service';
import { environment } from './../../../../environments/environment';
import { ToastrService } from 'ngx-toastr';

declare const sticky_header:any;
declare const responsiveMenu:any;

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {
  headerLogo:any;
  headerDetails:any = [];
  services:any = [];

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route,
  ) { }

  ngOnInit(): void {
    this.headerSectionDetails();
    sticky_header();
    responsiveMenu();
  }

  headerSectionDetails() {
  	this.http.setModule('header').list({}).subscribe((response) => {
      this.headerLogo = environment.image_url + response.header_details.data.image_source + response.header_details.data.site_settings.logo;
      this.services = response.header_details.data.services.list;
    });
  }

}

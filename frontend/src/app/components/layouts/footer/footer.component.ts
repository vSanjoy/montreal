import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpService } from './../../../services/http.service';
import { environment } from './../../../../environments/environment';

declare const scroll_top_top:any;

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent implements OnInit {
  footerLogo:any;
  footerDetails:any = [];
  serviceList:any = [];

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route
  ) { }

  ngOnInit(): void {
    this.footerSectionDetails();
    scroll_top_top();
  }

  footerSectionDetails() {
  	this.http.setModule('footer').list({}).subscribe((response) => {
      this.footerLogo = environment.image_url + response.footer_details.data.image_source + response.footer_details.data.site_settings.footer_logo;
      this.footerDetails = response.footer_details.data.site_settings;
      this.serviceList = response.footer_details.data.service.list;
    });
  }

}

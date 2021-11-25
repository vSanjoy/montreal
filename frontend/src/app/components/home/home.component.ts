import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpService } from './../../services/http.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { CustomValidator } from './../../shared/validator/validator';
import { environment } from './../../../environments/environment';
import { ToastrService } from 'ngx-toastr';
import { OwlOptions } from 'ngx-owl-carousel-o';

declare const equelHeight:any;

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  bannerShortDescription:any;
  bannerImage:any;
  phoneNumber:any;
  homeDetails:any = [];
  serviceWidgets:any = [];
  aboutImage:any;
  aboutDetails:any = [];
  portfolios:any = [];
  websiteSettingsDetails:any = [];
  
  enquiryForm: FormGroup;
  public submitted = false;

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route,
    private formBuilder: FormBuilder,
    private toastr: ToastrService
  ) { }

  ngOnInit(): void {
    this.homePageDetails();
    // Enquiry form
    this.enquiryForm = this.formBuilder.group({
      name: ['', Validators.required],
      phone_number: ['', Validators.required],
      email: ['', [Validators.required,CustomValidator.email]],
      message: ['', Validators.required],
    });
  }

  // Getting home page details
  homePageDetails() {
    this.http.setModule('home').list({}).subscribe((response) => {
      if (response.home_page_details.status == 200) {
        // Home page details
        this.homeDetails = response.home_page_details.data.cms_page.list[0];
        // Banner
        this.bannerImage = environment.image_url + response.home_page_details.data.cms_page.image_source + this.homeDetails.banner_image;
        this.bannerShortDescription = this.homeDetails.banner_short_description;
        this.phoneNumber = response.home_page_details.data.phone_number;
        // Service widgets
        this.serviceWidgets = response.home_page_details.data.service.list;
        this.serviceWidgets.map((el) => {
          el.image = environment.image_url + response.home_page_details.data.service.image_source + el.image;
        });
        // About details
        this.aboutDetails = response.home_page_details.data.cms_page.list[1];
        this.aboutImage = environment.image_url + response.home_page_details.data.cms_page.image_source + this.aboutDetails.featured_image;
        // Portfolio
        this.portfolios = response.home_page_details.data.portfolio.list;
        this.portfolios.map((el) => {
          el.image = environment.image_url + response.home_page_details.data.portfolio.image_source + el.image;
        });
        // Website settings
        this.websiteSettingsDetails = response.home_page_details.data.site_setting;
        
        equelHeight();        
      } else {
        this.toastr.error('Oops! Something went wrong, please try again later.', 'Error!');
      }
    });
  }

  // Enquiry form submit
  get enquiryFormVal() {
    return this.enquiryForm.controls;
  }
  submitEnquiryForm() {
    this.submitted = true;
    if (this.enquiryForm.invalid) {
      return;
    } else {
      this.http.setModule('capture_enquiry').create(this.enquiryForm.value).subscribe((response) => {
        if (response.enquiry_form_details.status == 200) {
          this.toastr.success('Thank you for contacting with us, we will get back to you soon.', 'Success!');
          this.enquiryForm.reset();
          this.submitted = false;
        } else {
          this.toastr.error('Oops! Something went wrong, please try again later.', 'Error!');
          this.submitted = false;
        }
      }, (error) => {
        this.toastr.error(error.error.message, 'Error!');
        this.submitted = false;
      });
    }
  }

  customOptions: OwlOptions = {
    loop: true,
    mouseDrag: true,
    touchDrag: true,
    pullDrag: false,
    dots: false,
    autoplay:true,
    autoplayTimeout:9000,
    navSpeed: 700,
    margin:20,
    navText: ['Previous', 'Next'],
    responsive: {
      0: {
        items: 1 
      },
      400: {
        items: 1
      },
      740: {
        items: 3
      },
      1199: {
        items: 4
      }
    },
    nav: false
  };

}

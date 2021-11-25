import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { LayoutComponent } from './components/layouts/layout/layout.component';
import { HomeComponent } from './components/home/home.component';
import { ServicesComponent } from './components/services/services.component';
import { ContactComponent } from './components/contact/contact.component';
import { PortfolioComponent } from './components/portfolio/portfolio.component';
import { TestimonialsComponent } from './components/testimonials/testimonials.component';
import { FrancaisComponent } from './components/francais/francais.component';

const routes: Routes = [
  {
    path: '', component: LayoutComponent,
    children: [
      {
        path: '', component: HomeComponent
      },
      {
        path: 'services', component: ServicesComponent
      },
      {
        path: 'contact' , component: ContactComponent
      },
      {
        path: 'portfolio' , component: PortfolioComponent
      },
      {
        path: 'testimonials' , component: TestimonialsComponent
      },
      {
        path: 'francais' , component: FrancaisComponent
      },
    ]
  },
  // otherwise redirect to home
  { 
    path: '**',
    redirectTo: ''
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes, {
    scrollPositionRestoration: 'enabled'
  })],
  exports: [RouterModule]
})
export class AppRoutingModule { }

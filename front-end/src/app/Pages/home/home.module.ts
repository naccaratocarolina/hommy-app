import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { HomePageRoutingModule } from './home-routing.module';

import { HomePage } from './home.page';
import { RepublicScrollBarComponent } from '../../Components/republic-scroll-bar/republic-scroll-bar.component';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    HomePageRoutingModule
  ],
  entryComponents: [RepublicScrollBarComponent],
  declarations: [HomePage, RepublicScrollBarComponent]
})
export class HomePageModule {}

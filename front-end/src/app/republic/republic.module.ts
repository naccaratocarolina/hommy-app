import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { RepublicPageRoutingModule } from './republic-routing.module';

import { RepublicPage } from './republic.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RepublicPageRoutingModule
  ],
  declarations: [RepublicPage]
})
export class RepublicPageModule {}

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { RepublicPageRoutingModule } from './republic-routing.module';

import { RepublicPage } from './republic.page';

import { ReactiveFormsModule } from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RepublicPageRoutingModule,
    ReactiveFormsModule
  ],
  declarations: [RepublicPage]
})
export class RepublicPageModule {}

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { FavoritasPageRoutingModule } from './favoritas-routing.module';

import { FavoritasPage } from './favoritas.page';
import { RepublicScrollBarComponent } from '../../Components/republic-scroll-bar/republic-scroll-bar.component';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    FavoritasPageRoutingModule
  ],
  entryComponents: [RepublicScrollBarComponent],
  declarations: [FavoritasPage, RepublicScrollBarComponent]
})
export class FavoritasPageModule {}

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { FolderPageRoutingModule } from './folder-routing.module';

import { FolderPage } from './folder.page';
import { RepublicScrollBarComponent } from '../Components/republic-scroll-bar/republic-scroll-bar.component'

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    FolderPageRoutingModule,
  ],
  entryComponents: [RepublicScrollBarComponent],
  declarations: [FolderPage, RepublicScrollBarComponent]
})
export class FolderPageModule {}

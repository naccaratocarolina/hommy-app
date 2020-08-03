import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { RepublicPage } from './republic.page';

const routes: Routes = [
  {
    path: '',
    component: RepublicPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class RepublicPageRoutingModule {}

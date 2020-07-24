import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { FavoritasPage } from './favoritas.page';

const routes: Routes = [
  {
    path: '',
    component: FavoritasPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class FavoritasPageRoutingModule {}

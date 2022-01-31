import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ResiduoNewPage } from './residuo-new.page';

const routes: Routes = [
  {
    path: '',
    component: ResiduoNewPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ResiduoNewPageRoutingModule {}

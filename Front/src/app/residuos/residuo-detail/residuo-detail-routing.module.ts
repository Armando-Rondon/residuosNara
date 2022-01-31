import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ResiduoDetailPage } from './residuo-detail.page';

const routes: Routes = [
  {
    path: '',
    component: ResiduoDetailPage,
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ResiduoDetailPageRoutingModule {}

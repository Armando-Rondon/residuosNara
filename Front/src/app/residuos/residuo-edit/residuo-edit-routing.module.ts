import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ResiduoEditPage } from './residuo-edit.page';

const routes: Routes = [
  {
    path: '',
    component: ResiduoEditPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ResiduoEditPageRoutingModule {}

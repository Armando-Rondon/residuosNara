import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ResiduoDetailPage } from './residuo-detail/residuo-detail.page';
import { ResiduoEditPage } from './residuo-edit/residuo-edit.page';
import { ResiduoNewPage } from './residuo-new/residuo-new.page';

const routes: Routes = [
  {
    path: '',
    loadChildren: () =>
      import('./residuo-new/residuo-new.module').then(
        (m) => m.ResiduoNewPageModule
      ),
  },
  {
    path: '',
    loadChildren: () =>
      import('./residuo-detail/residuo-detail.module').then(
        (m) => m.ResiduoDetailPageModule
      ),
  },
  { path: '', component: ResiduoEditPage },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ResiduosRoutingModule {}

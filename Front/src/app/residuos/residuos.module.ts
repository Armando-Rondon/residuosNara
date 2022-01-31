import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ResiduosRoutingModule } from './residuos-routing.module';
import { ResiduoItemComponent } from './residuo-item/residuo-item.component';
import { SharedModule } from '../shared/shared.module';
import { ResiduoNewPage } from './residuo-new/residuo-new.page';
import { ResiduoEditPage } from './residuo-edit/residuo-edit.page';
import { ResiduoDetailPage } from './residuo-detail/residuo-detail.page';
import { ResiduoDetailPageModule } from './residuo-detail/residuo-detail.module';
import { CoreModule } from '../core/core.module';

@NgModule({
  declarations: [ResiduoNewPage, ResiduoItemComponent, ResiduoEditPage],
  imports: [
    CommonModule,
    ResiduosRoutingModule,
    SharedModule,
    ResiduoDetailPageModule,
    CoreModule
  ],
  exports: [ResiduoItemComponent],
})
export class ResiduosModule {}

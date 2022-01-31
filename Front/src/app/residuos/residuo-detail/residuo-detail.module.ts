import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ResiduoDetailPageRoutingModule } from './residuo-detail-routing.module';

import { ResiduoDetailPage } from './residuo-detail.page';
import { ResiduoService } from 'src/app/core/residuo/residuo.service';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ResiduoDetailPageRoutingModule,
    
  ],
  declarations: [ResiduoDetailPage],
    
})
export class ResiduoDetailPageModule {}

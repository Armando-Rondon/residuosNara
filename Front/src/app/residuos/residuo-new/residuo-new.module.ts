import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ResiduoNewPageRoutingModule } from './residuo-new-routing.module';

import { ResiduoNewPage } from './residuo-new.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ResiduoNewPageRoutingModule,
    ReactiveFormsModule
  ],
  declarations: [ResiduoNewPage],
})
export class ResiduoNewPageModule {}

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ResiduoEditPageRoutingModule } from './residuo-edit-routing.module';

import { ResiduoEditPage } from './residuo-edit.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ResiduoEditPageRoutingModule,
    ReactiveFormsModule,
  ],
  declarations: [ResiduoEditPage],
})
export class ResiduoEditPageModule {}

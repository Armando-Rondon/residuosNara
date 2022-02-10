import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { RegistarPageRoutingModule } from './registar-routing.module';

import { RegistarPage } from './registar.page';
import { AuthService } from '../shared/auth.service';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ReactiveFormsModule,
    RegistarPageRoutingModule,
  ],
  declarations: [RegistarPage],
  providers: [AuthService],
})
export class RegistarPageModule {}

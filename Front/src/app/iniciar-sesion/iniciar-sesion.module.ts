import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { IniciarSesionPageRoutingModule } from './iniciar-sesion-routing.module';

import { IniciarSesionPage } from './iniciar-sesion.page';
import { SharedModule } from '../shared/shared.module';
import { AuthService } from '../shared/auth.service';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    IniciarSesionPageRoutingModule,
    ReactiveFormsModule,
    
  ],
  declarations: [IniciarSesionPage],
  exports: [IniciarSesionPage],
  providers: [
    AuthService
],
})
export class IniciarSesionPageModule {}

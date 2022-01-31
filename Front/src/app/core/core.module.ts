import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ResiduoService } from './residuo/residuo.service';
import { HttpClientModule } from '@angular/common/http';

// Import for loading & configuring in-memory web api
import { InMemoryWebApiModule } from 'angular-in-memory-web-api';
//import { ResiduoData } from './residuo/residuo-data';

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    HttpClientModule,
    //InMemoryWebApiModule.forRoot(ResiduoData),
  ],
  providers: [ResiduoService],
})
export class CoreModule {}

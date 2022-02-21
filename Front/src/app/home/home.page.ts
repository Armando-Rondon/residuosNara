import { Component } from '@angular/core';

import { ResiduoService } from '../core/residuo/residuo.service';
import { Ler } from '../shared/ler';
import { Residuo } from '../shared/residuo';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  residuos: Residuo[] = [];
  lers: Ler[] = [];

  constructor(private residuoService: ResiduoService) {}
  ngOnInit() {
    this.residuoService
      .getResiduos()
      .subscribe((data: Residuo[]) => (this.residuos = data));
    this.residuoService
      .getLers()
      .subscribe((data: Ler[]) => (this.lers = data));
  }

  ionViewDidEnter() {
    this.residuoService
      .getResiduos()
      .subscribe((data: Residuo[]) => (this.residuos = data));
  }
  Hello($event) {
    this.residuoService
      .getResiduosByLers($event.detail.value)
      .subscribe((data: Residuo[]) => (this.residuos = data));
  }
}

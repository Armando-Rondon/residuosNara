import { Component } from '@angular/core';
import { ResiduoService } from '../core/residuo/residuo.service';
import { Residuo } from '../shared/residuo';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  residuos: Residuo[] = [];
  constructor(private residuoService: ResiduoService) {}
  ngOnInit() {
    this.residuoService
      .getResiduos()
      .subscribe((data: Residuo[]) => (this.residuos = data));
  }
  ionViewDidEnter() {
    this.residuoService
      .getResiduos()
      .subscribe((data: Residuo[]) => (this.residuos = data));
  }
}

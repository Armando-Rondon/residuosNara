import { Component, OnInit } from '@angular/core';
import { ResiduoService } from '../../core/residuo/residuo.service';
import { Residuo } from '../../shared/residuo';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-residuo-detail',
  templateUrl: './residuo-detail.page.html',
  styleUrls: ['./residuo-detail.page.scss'],
})
export class ResiduoDetailPage implements OnInit {
  residuo: Residuo = {
    id: 0,
    ler: 0,
    comentario: 'Algo',
   peligro: 0,
    categoria_peligrosidad: 0,
    tipo: 'Algo',
    cantidad: 0,
    precio: 0,
    unidad: 'Algo',
    imagen:
      'https://www.veolia.com/latamib/sites/g/files/dvc3286/files/styles/default/public/image/2020/04/valoriz.jpg?itok=9EusnEnY',
  };
  resId: number = 0;

  constructor(
    private activatedroute: ActivatedRoute,
    private router: Router,
    private residuoService: ResiduoService
  ) {}

  ngOnInit() {
    this.resId = parseInt(this.activatedroute.snapshot.params['residuoId']);
    this.residuoService
      .getResiduoById(this.resId)
      .subscribe((data: Residuo) => (this.residuo = data[0]));
  }
  goEdit(): void {
    this.router.navigate(['/residuos', this.resId, 'edit']);
  }
  onBack(): void {
    this.router.navigate(['']);
  }
}

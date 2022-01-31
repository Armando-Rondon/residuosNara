import { Component, Input } from '@angular/core';
import { Router } from '@angular/router';
import { Residuo } from '../../shared/residuo';

@Component({
  selector: 'app-residuo-item',
  templateUrl: './residuo-item.component.html',
  styleUrls: ['./residuo-item.component.scss'],
})
export class ResiduoItemComponent {
  constructor(private router: Router) {}
  @Input() residuo: Residuo = {
    id: 0,
    ler: 0,
    comentario: 'Algo',
   peligro: 0,
    categoria_peligrosidad: 0,
    tipo: 'Algo',
    cantidad: 0,
    precio: 0,
    unidad: 'Algo',
    imagen: '',
  };
}

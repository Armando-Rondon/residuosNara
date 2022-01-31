import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  FormControl,
  FormArray,
  Validators,
  FormControlName,
} from '@angular/forms';

import { Residuo } from '../../shared/residuo';
import { ResiduoService } from '../../core/residuo/residuo.service';

import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-residuos-edit',
  templateUrl: './residuo-edit.page.html',
  styleUrls: ['./residuo-edit.page.scss'],
})
export class ResiduoEditPage implements OnInit {
  pageOrigin = 'Residuo Edit';
  errorMessage: string = '';
  residuoForm: any;
  isLoading: boolean;
  residuoId: number = 0;
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
    imagen: '',
  };

  constructor(
    private fb: FormBuilder,
    private activatedroute: ActivatedRoute,
    private router: Router,
    private residuoService: ResiduoService
  ) {}

  ngOnInit(): void {
    this.residuoForm = this.fb.group({
      ler: 0,
      comentario: '',
      peligro: 0,
      categoria: 0,
      tipo: 'Algo',
      categoria_peligrosidad: 0,
      cantidad: 0,
      precio: 0,
      unidad: 'Algo',
      imagen:
        'https://www.veolia.com/latamib/sites/g/files/dvc3286/files/styles/default/public/image/2020/04/valoriz.jpg?itok=9EusnEnY',
    });

    // Read the residuo Id from the route parameter
    this.residuoId = parseInt(this.activatedroute.snapshot.params['id']);
    this.getResiduo(this.residuoId);
  }

  getResiduo(id: number): void {
    this.isLoading = true;
    this.residuoService.getResiduoById(id).subscribe(
      (residuo: Residuo) => this.displayResiduo(residuo),
      (error: any) => (this.errorMessage = <any>error)
    );
    this.isLoading = false;
  }

  displayResiduo(residuo: Residuo): void {
    if (this.residuoForm) {
      this.residuoForm.reset();
    }
    this.residuo = residuo[0];
    this.pageOrigin = `Editar Residuo`;

    // Update the data on the form
    this.residuoForm.patchValue({
      ler: this.residuo.ler,
      comentario: this.residuo.comentario,
      peligro: this.residuo.peligro,
      categoria_peligrosidad: this.residuo.categoria_peligrosidad,
      tipo: this.residuo.tipo,
      cantidad: this.residuo.cantidad,
      precio: this.residuo.precio,
      unidad: this.residuo.unidad,
    });
  }

  deleteResiduo(): void {
    if (this.residuo.id === 0) {
      // Don't delete, it was never saved.
      this.onSaveComplete();
    } else {
      if (confirm(`Really delete the residuo: ${this.residuo.id}?`)) {
        this.residuoService.deleteResiduo(this.residuo.id).subscribe(
          () => this.onSaveComplete(),
          (error: any) => (this.errorMessage = <any>error)
        );
      }
    }
  }

  saveResiduo(): void {
    if (this.residuoForm.valid) {
      if (this.residuoForm.dirty) {
        this.residuo = this.residuoForm.value;
        this.residuo.id = this.residuoId;
        this.residuoService
          .updateResiduo(this.residuo)
          .subscribe((code: any) =>
            code.code == 100
              ? (this.errorMessage = code.message)
              : this.onSaveComplete()
          );
      } else {
        this.onSaveComplete();
      }
    } else {
      this.errorMessage = 'Please correct the validation errors.';
    }
  }

  onSaveComplete(): void {
    // Reset the form to clear the flags
    this.residuoForm.reset();
    this.router.navigate(['']);
  }
}

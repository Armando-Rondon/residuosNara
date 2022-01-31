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
  selector: 'app-residuos-new',
  templateUrl: './residuo-new.page.html',
  styleUrls: ['./residuo-new.page.scss'],
})
export class ResiduoNewPage implements OnInit {
  pageOrigin = 'Residuo New';
  errorMessage: string = '';
  residuoForm: FormGroup;
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
      categoria_peligrosidad: 0,
      tipo: '',
      cantidad: 0,
      precio: 0,
      unidad: '',
      imagen: '',
    });
    // Read the residuo Id from the route parameter
    this.residuoId = parseInt(this.activatedroute.snapshot.params['id']);
  }

  saveResiduo(): void {
    if (this.residuoForm.valid) {
      if (this.residuoForm.dirty) {
        this.residuo = this.residuoForm.value;
        this.residuo.id = this.residuoId;

        this.residuoService.createResiduo(this.residuo).subscribe(
          (code: any) =>  code.code == 200 ? this.onSaveComplete() :  this.errorMessage = code.message
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

import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { Empresas } from '../shared/empresas';

@Component({
  selector: 'app-iniciar-sesion',
  templateUrl: './iniciar-sesion.page.html',
  styleUrls: ['./iniciar-sesion.page.scss'],
})
export class IniciarSesionPage implements OnInit {
  pageOrigin = 'Iniciar Sesion';
  errorMessage: string = '';
  iniciarSesionForm: FormGroup;
  isLoading: boolean;
  empresa: Empresas = {
    id: null,
    nif: null,
    nombre: null,
    rediduos: null,
    sector: null,
    localidad: null,
    direccion: null,
    contrasena: null,
  };

  constructor(
    private fb: FormBuilder,
    private activatedroute: ActivatedRoute,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.iniciarSesionForm = this.fb.group({
      nif: '',
      contrasena: '',
    });
  }

  iniciarSesion(): void {}
}

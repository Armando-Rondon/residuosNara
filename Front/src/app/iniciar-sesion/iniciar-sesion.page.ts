import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { Empresas } from '../shared/empresas';
import * as moment from 'moment';
import { AuthService } from '../shared/auth.service';

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
  form: FormGroup;
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
    private router: Router,
    private authService: AuthService,
  ) {
    this.form = this.fb.group({
      username: ['',  Validators.required],
      password: ['', Validators.required]
    });
  }

  ngOnInit(): void {
    this.form = this.fb.group({
      username: '',
      password: '',
    });
  }

  login() {
    const val = this.form.value;

    if (val.username && val.password) {
      this.authService.login(val.username, val.password)
        .subscribe(
          data => {
            data = {
              ...data,
              u: val.username,
            }
            // Save session: Generate expiration date
            const expire_moment = moment().add(1, 'days');
            data.expires_at = JSON.stringify(expire_moment.valueOf())
            this.authService.role(val.username, val.password).subscribe(r => {
              data = {
                ...data,
                r: r[r.length - 1]
              }
              this.authService.setSession(data);
            }
            )
            console.log("User is logged in");
            this.router.navigateByUrl('/');
          }
        );
    }
  }
}
